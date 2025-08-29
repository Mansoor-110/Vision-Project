<?php
session_start();
include '../includes/connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

// Get order ID from URL
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
$print_mode = isset($_GET['print']) && $_GET['print'] == '1';
$download_mode = isset($_GET['download']) && $_GET['download'] == '1';

if (!$order_id) {
    header('Location: order_history.php');
    exit;
}

// Get order details
$order_query = "SELECT o.*, CONCAT(o.first_name, ' ', o.last_name) as customer_name 
                FROM orders o 
                WHERE o.id = ? AND o.user_id = ?";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("ii", $order_id, $_SESSION['user_id']);
$order_stmt->execute();
$order = $order_stmt->get_result()->fetch_assoc();

if (!$order) {
    header('Location: order_history.php?error=order_not_found');
    exit;
}

// Get order items (simplified - no products table join needed)
$items_query = "SELECT oi.*
                FROM order_items oi 
                WHERE oi.order_id = ?
                ORDER BY oi.id";
$items_stmt = $conn->prepare($items_query);
$items_stmt->bind_param("i", $order_id);
$items_stmt->execute();
$order_items = $items_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Get company settings from database
$company_query = "SELECT setting_key, setting_value FROM company_settings";
$company_result = $conn->query($company_query);
$company = [];
while ($setting = $company_result->fetch_assoc()) {
    $company[$setting['setting_key']] = $setting['setting_value'];
}

// Default company settings if not in database
$default_company = [
    'company_name' => 'Your Store Name',
    'company_address' => '123 Business Street',
    'company_city' => 'Karachi, Sindh',
    'company_phone' => '+92 300 1234567',
    'company_email' => 'orders@yourstore.com',
    'company_website' => 'www.yourstore.com',
    'company_tax_number' => 'TAX123456789',
    'invoice_footer_note' => 'Thank you for your business! If you have any questions about this invoice, please contact us.'
];

$company = array_merge($default_company, $company);

// Track invoice access
$track_query = "INSERT INTO invoice_downloads (order_id, user_id, download_type, ip_address, user_agent) 
                VALUES (?, ?, ?, ?, ?)";
$track_stmt = $conn->prepare($track_query);
$download_type = $download_mode ? 'download' : ($print_mode ? 'print' : 'view');
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$track_stmt->bind_param("iisss", $order_id, $_SESSION['user_id'], $download_type, $ip_address, $user_agent);
$track_stmt->execute();

// Function to generate QR code URL (optional)
function generateQRCodeURL($data) {
    return "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . urlencode($data);
}

// Generate verification URL for invoice
$verification_url = "https://" . $_SERVER['HTTP_HOST'] . "/verify_invoice.php?order=" . $order['order_number'] . "&hash=" . md5($order['id'] . $order['created_at']);

// Function to format currency
function formatCurrency($amount) {
    return 'Rs. ' . number_format($amount, 2);
}

// Generate HTML
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #<?php echo htmlspecialchars($order['order_number']); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background: #f8fafc;
        }
        
        .invoice-container {
            max-width: 900px;
            margin: 20px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .invoice-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 30px;
            align-items: start;
        }
        
        .company-section h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .company-details {
            opacity: 0.9;
            line-height: 1.8;
        }
        
        .invoice-meta {
            text-align: right;
        }
        
        .invoice-title {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .invoice-number {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 8px;
        }
        
        .invoice-date {
            font-size: 16px;
            opacity: 0.8;
        }
        
        .status-badges {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            justify-content: flex-end;
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }
        
        .content-section {
            padding: 40px;
        }
        
        .billing-section {
            display: grid;
            grid-template-columns: 1fr 1fr 200px;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            color: #667eea;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }
        
        .address-card {
            background: #f8fafc;
            padding: 25px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }
        
        .customer-name {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .address-details {
            color: #64748b;
            line-height: 1.7;
        }
        
        .qr-section {
            text-align: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
            border: 2px dashed #e2e8f0;
        }
        
        .qr-code {
            width: 100px;
            height: 100px;
            margin: 0 auto 10px;
        }
        
        .verification-text {
            font-size: 12px;
            color: #64748b;
        }
        
        .order-summary {
            background: #f1f5f9;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .summary-item {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .summary-label {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .summary-value {
            font-size: 20px;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .items-section {
            margin: 40px 0;
        }
        
        .items-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .items-table th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        
        .items-table td {
            padding: 20px 15px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }
        
        .items-table tbody tr:hover {
            background: #f8fafc;
        }
        
        .items-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .item-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .item-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            background: #f1f5f9;
        }
        
        .item-details h4 {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 4px;
        }
        
        .item-description {
            font-size: 13px;
            color: #64748b;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .quantity-badge {
            background: #667eea;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .price-cell {
            text-align: right;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .totals-section {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            margin: 30px 0;
        }
        
        .totals-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            font-size: 18px;
            font-weight: 600;
        }
        
        .totals-body {
            padding: 30px;
        }
        
        .totals-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 16px;
        }
        
        .totals-row:last-child {
            margin-bottom: 0;
        }
        
        .totals-row.subtotal {
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .totals-row.total {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            padding-top: 15px;
            border-top: 2px solid #667eea;
        }
        
        .discount-amount {
            color: #10b981;
        }
        
        .payment-info {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin: 30px 0;
        }
        
        .payment-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .payment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .payment-item {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }
        
        .payment-label {
            font-size: 13px;
            opacity: 0.8;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .payment-value {
            font-size: 16px;
            font-weight: 600;
        }
        
        .footer {
            background: #1e293b;
            color: white;
            padding: 40px;
            text-align: center;
        }
        
        .footer-note {
            font-size: 16px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }
        
        .actions-bar {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 1000;
        }
        
        .action-btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .btn-print {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-download {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        
        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        }
        
        @media print {
            body { 
                background: white;
                font-size: 12px;
            }
            
            .invoice-container { 
                max-width: none;
                margin: 0;
                border-radius: 0;
                box-shadow: none;
            }
            
            .actions-bar { 
                display: none;
            }
            
            .content-section {
                padding: 20px;
            }
            
            .billing-section {
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }
            
            .qr-section {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .invoice-header {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 20px;
            }
            
            .billing-section {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .actions-bar {
                position: static;
                justify-content: center;
                margin: 20px;
            }
            
            .items-table {
                font-size: 14px;
            }
            
            .item-info {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <?php if (!$print_mode): ?>
    <div class="actions-bar">
        <a href="order_history.php" class="action-btn btn-back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <button onclick="window.print()" class="action-btn btn-print">
            <i class="fas fa-print"></i> Print
        </button>
        <a href="?order_id=<?php echo $order_id; ?>&download=1" class="action-btn btn-download">
            <i class="fas fa-download"></i> Download
        </a>
    </div>
    <?php endif; ?>
    
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div class="company-section">
                <h1><?php echo htmlspecialchars($company['company_name']); ?></h1>
                <div class="company-details">
                    <?php echo htmlspecialchars($company['company_address']); ?><br>
                    <?php echo htmlspecialchars($company['company_city']); ?><br>
                    <i class="fas fa-phone"></i> <?php echo htmlspecialchars($company['company_phone']); ?><br>
                    <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($company['company_email']); ?><br>
                    <i class="fas fa-globe"></i> <?php echo htmlspecialchars($company['company_website']); ?>
                </div>
            </div>
            <div class="invoice-meta">
                <div class="invoice-title">INVOICE</div>
                <div class="invoice-number">#<?php echo htmlspecialchars($order['order_number']); ?></div>
                <div class="invoice-date"><?php echo date('M d, Y', strtotime($order['created_at'])); ?></div>
                <div class="status-badges">
                    <span class="status-badge"><?php echo ucfirst($order['order_status']); ?></span>
                    <span class="status-badge"><?php echo ucfirst($order['payment_status']); ?></span>
                </div>
            </div>
        </div>

        <div class="content-section">
            <!-- Billing Information -->
            <div class="billing-section">
                <div class="address-card">
                    <div class="section-title">Bill To</div>
                    <div class="customer-name"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                    <div class="address-details">
                        <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($order['email']); ?><br>
                        <i class="fas fa-phone"></i> <?php echo htmlspecialchars($order['phone']); ?>
                    </div>
                </div>
                
                <div class="address-card">
                    <div class="section-title">Ship To</div>
                    <div class="customer-name"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                    <div class="address-details">
                        <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($order['address']); ?><br>
                        <i class="fas fa-city"></i> <?php echo htmlspecialchars($order['city']); ?><br>
                        <i class="fas fa-phone"></i> <?php echo htmlspecialchars($order['phone']); ?>
                    </div>
                </div>
                
                <div class="qr-section">
                    <img src="<?php echo generateQRCodeURL($verification_url); ?>" alt="QR Code" class="qr-code">
                    <div class="verification-text">
                        Scan to verify<br>invoice authenticity
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="summary-grid">
                    <div class="summary-item">
                        <div class="summary-label">Items</div>
                        <div class="summary-value"><?php echo count($order_items); ?></div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Order Date</div>
                        <div class="summary-value"><?php echo date('M d, Y', strtotime($order['created_at'])); ?></div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Payment Method</div>
                        <div class="summary-value"><?php echo ucfirst($order['payment_method']); ?></div>
                    </div>
                    <?php if ($order['transaction_id']): ?>
                    <div class="summary-item">
                        <div class="summary-label">Transaction ID</div>
                        <div class="summary-value"><?php echo htmlspecialchars($order['transaction_id']); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Items Table -->
            <div class="items-section">
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Item Details</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order_items as $item): ?>
                        <tr>
                            <td>
                                <div class="item-info">
                                    <?php if ($item['product_image']): ?>
                                    <img src="<?php echo htmlspecialchars($item['product_image']); ?>" 
                                         alt="<?php echo htmlspecialchars($item['product_name']); ?>" 
                                         class="item-image">
                                    <?php endif; ?>
                                    <div class="item-details">
                                        <h4><?php echo htmlspecialchars($item['product_name']); ?></h4>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="quantity-badge"><?php echo $item['quantity']; ?></span>
                            </td>
                            <td class="price-cell">
                                <?php echo formatCurrency($item['product_price']); ?>
                            </td>
                            <td class="price-cell">
                                <?php echo formatCurrency($item['total_price']); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Totals -->
            <div class="totals-section">
                <div class="totals-header">
                    <i class="fas fa-calculator"></i> Order Summary
                </div>
                <div class="totals-body">
                    <div class="totals-row subtotal">
                        <span>Subtotal:</span>
                        <span><?php echo formatCurrency($order['subtotal']); ?></span>
                    </div>
                    <div class="totals-row">
                        <span>Shipping & Handling:</span>
                        <span><?php echo formatCurrency($order['shipping_cost']); ?></span>
                    </div>
                    <?php if ($order['discount_amount'] > 0): ?>
                    <div class="totals-row">
                        <span>Discount Applied:</span>
                        <span class="discount-amount">-<?php echo formatCurrency($order['discount_amount']); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="totals-row total">
                        <span>Total Amount:</span>
                        <span><?php echo formatCurrency($order['total_amount']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="payment-info">
                <div class="payment-title">
                    <i class="fas fa-credit-card"></i>
                    Payment Information
                </div>
                <div class="payment-grid">
                    <div class="payment-item">
                        <div class="payment-label">Payment Method</div>
                        <div class="payment-value"><?php echo ucfirst($order['payment_method']); ?></div>
                    </div>
                    <div class="payment-item">
                        <div class="payment-label">Payment Status</div>
                        <div class="payment-value"><?php echo ucfirst($order['payment_status']); ?></div>
                    </div>
                    <?php if ($order['transaction_id']): ?>
                    <div class="payment-item">
                        <div class="payment-label">Transaction ID</div>
                        <div class="payment-value"><?php echo htmlspecialchars($order['transaction_id']); ?></div>
                    </div>
                    <?php endif; ?>
                    <div class="payment-item">
                        <div class="payment-label">Order Date</div>
                        <div class="payment-value"><?php echo date('M d, Y H:i A', strtotime($order['created_at'])); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-note">
                <?php echo htmlspecialchars($company['invoice_footer_note']); ?>
            </div>
            
            <div class="contact-grid">
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span><?php echo htmlspecialchars($company['company_email']); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span><?php echo htmlspecialchars($company['company_phone']); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-globe"></i>
                    <span><?php echo htmlspecialchars($company['company_website']); ?></span>
                </div>
                <?php if (!empty($company['company_tax_number'])): ?>
                <div class="contact-item">
                    <i class="fas fa-receipt"></i>
                    <span>Tax ID: <?php echo htmlspecialchars($company['company_tax_number']); ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 12px; opacity: 0.7;">
                Invoice generated on <?php echo date('M d, Y H:i A'); ?> | 
                Verification URL: <?php echo $verification_url; ?>
            </div>
        </div>
    </div>

    <script>
        // Auto print if in print mode
        <?php if ($print_mode): ?>
        window.onload = function() {
            window.print();
            window.onafterprint = function() {
                window.close();
            };
        };
        <?php endif; ?>

        // Enhanced print functionality
        function printInvoice() {
            // Hide action buttons
            document.querySelectorAll('.actions-bar').forEach(el => el.style.display = 'none');
            
            // Print
            window.print();
            
            // Show action buttons after print dialog
            setTimeout(() => {
                document.querySelectorAll('.actions-bar').forEach(el => el.style.display = 'flex');
            }, 1000);
        }

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + P for print
            if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                e.preventDefault();
                printInvoice();
            }
            
            // Escape to go back
            if (e.key === 'Escape') {
                window.history.back();
            }
        });

        // Add smooth scrolling for better UX
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation
            document.querySelector('.invoice-container').style.opacity = '0';
            document.querySelector('.invoice-container').style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                document.querySelector('.invoice-container').style.transition = 'all 0.6s ease';
                document.querySelector('.invoice-container').style.opacity = '1';
                document.querySelector('.invoice-container').style.transform = 'translateY(0)';
            }, 100);
        });

        // Add tooltips for better UX (optional)
        function addTooltips() {
            const tooltipElements = document.querySelectorAll('[title]');
            tooltipElements.forEach(el => {
                el.addEventListener('mouseenter', function() {
                    const tooltip = document.createElement('div');
                    tooltip.className = 'custom-tooltip';
                    tooltip.textContent = this.getAttribute('title');
                    tooltip.style.cssText = `
                        position: absolute;
                        background: #2c3e50;
                        color: white;
                        padding: 8px 12px;
                        border-radius: 4px;
                        font-size: 12px;
                        z-index: 1001;
                        pointer-events: none;
                        white-space: nowrap;
                    `;
                    document.body.appendChild(tooltip);
                    
                    const rect = this.getBoundingClientRect();
                    tooltip.style.left = rect.left + 'px';
                    tooltip.style.top = (rect.top - tooltip.offsetHeight - 5) + 'px';
                });
                
                el.addEventListener('mouseleave', function() {
                    const tooltip = document.querySelector('.custom-tooltip');
                    if (tooltip) tooltip.remove();
                });
                
                // Remove the title attribute to prevent default tooltip
                el.removeAttribute('title');
                el.setAttribute('data-tooltip', el.getAttribute('title'));
            });
        }

        // Initialize tooltips
        addTooltips();
    </script>
</body>
</html>
<?php
$html = ob_get_clean();

// Handle download request
if ($download_mode) {
    $filename = 'invoice_' . $order['order_number'] . '_' . date('Y-m-d') . '.html';
    
    // Add print-friendly styles for download
    $downloadHtml = str_replace('</head>', '
    <style>
        @media screen {
            body { margin: 0; padding: 0; }
            .actions-bar { display: none !important; }
            .invoice-container { margin: 0; border-radius: 0; }
        }
        @page { 
            margin: 0.5in;
            size: A4;
        }
    </style>
    </head>', $html);
    
    // Set headers for download
    header('Content-Type: text/html; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($downloadHtml));
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    
    echo $downloadHtml;
    exit;
}

// Display the invoice
echo $html;
?>