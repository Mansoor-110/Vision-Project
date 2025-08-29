<?php 
include '../includes/header.php';
include '../includes/connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Pagination settings
$orders_per_page = 5;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $orders_per_page;

// Get total orders count
$count_query = "SELECT COUNT(*) as total FROM orders WHERE user_id = ?";
$count_stmt = $conn->prepare($count_query);
$count_stmt->bind_param("i", $user_id);
$count_stmt->execute();
$total_orders = $count_stmt->get_result()->fetch_assoc()['total'];
$total_pages = ceil($total_orders / $orders_per_page);

// Get orders with pagination
$orders_query = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT ? OFFSET ?";
$orders_stmt = $conn->prepare($orders_query);
$orders_stmt->bind_param("iii", $user_id, $orders_per_page, $offset);
$orders_stmt->execute();
$orders_result = $orders_stmt->get_result();

// Function to get order items
function getOrderItems($order_id, $conn) {
    $items_query = "SELECT * FROM order_items WHERE order_id = ?";
    $items_stmt = $conn->prepare($items_query);
    $items_stmt->bind_param("i", $order_id);
    $items_stmt->execute();
    return $items_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Function to get order status badge
function getStatusBadge($status) {
    $badges = [
        'pending' => ['class' => 'status-pending', 'text' => 'Pending', 'icon' => 'fas fa-clock'],
        'confirmed' => ['class' => 'status-confirmed', 'text' => 'Confirmed', 'icon' => 'fas fa-check-circle'],
        'processing' => ['class' => 'status-processing', 'text' => 'Processing', 'icon' => 'fas fa-cogs'],
        'shipped' => ['class' => 'status-shipped', 'text' => 'Shipped', 'icon' => 'fas fa-truck'],
        'delivered' => ['class' => 'status-delivered', 'text' => 'Delivered', 'icon' => 'fas fa-check-double'],
        'cancelled' => ['class' => 'status-cancelled', 'text' => 'Cancelled', 'icon' => 'fas fa-times-circle'],
        'refunded' => ['class' => 'status-refunded', 'text' => 'Refunded', 'icon' => 'fas fa-undo']
    ];
    
    return $badges[$status] ?? $badges['pending'];
}

// Function to get payment status badge
function getPaymentStatusBadge($status) {
    $badges = [
        'pending' => ['class' => 'payment-pending', 'text' => 'Pending'],
        'completed' => ['class' => 'payment-completed', 'text' => 'Paid'],
        'failed' => ['class' => 'payment-failed', 'text' => 'Failed'],
        'refunded' => ['class' => 'payment-refunded', 'text' => 'Refunded']
    ];
    
    return $badges[$status] ?? $badges['pending'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Your Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 30px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 32px;
            color: #2c2c2c;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .page-header h1 i {
            color: #800020;
        }

        .page-header p {
            color: #666;
            font-size: 16px;
        }

        .orders-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .orders-header {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: white;
            padding: 25px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .orders-header h2 {
            font-size: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .orders-count {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
        }

        .empty-state {
            text-align: center;
            padding: 80px 40px;
            color: #666;
        }

        .empty-state i {
            font-size: 64px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c2c2c;
        }

        .empty-state p {
            margin-bottom: 30px;
            font-size: 16px;
        }

        .empty-state a {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .empty-state a:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(128, 0, 32, 0.3);
        }

        .order-card {
            border-bottom: 2px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .order-card:last-child {
            border-bottom: none;
        }

        .order-card:hover {
            background: #f8f9fa;
        }

        .order-header {
            padding: 30px 40px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            gap: 20px;
            flex-wrap: wrap;
        }

        .order-info {
            flex: 1;
            min-width: 300px;
        }
            color: #2c2c2c;
            font-size: 20px;
            margin-bottom: 8px;
        }

        .order-meta {
            display: flex;
            gap: 20px;
            font-size: 14px;
            color: #666;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .order-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .order-total {
            text-align: right;
        }

        .total-amount {
            font-size: 24px;
            font-weight: 700;
            color: #800020;
            margin-bottom: 5px;
        }

        .total-items {
            font-size: 14px;
            color: #666;
        }

        .status-badge,
        .payment-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .status-pending { background: #fff3cd; color: #856404; }
        .status-confirmed { background: #d4edda; color: #155724; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-shipped { background: #e2e3ff; color: #383d41; }
        .status-delivered { background: #d1ecf1; color: #0c5460; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .status-refunded { background: #ffeaa7; color: #6c5ce7; }

        .payment-pending { background: #fff3cd; color: #856404; }
        .payment-completed { background: #d4edda; color: #155724; }
        .payment-failed { background: #f8d7da; color: #721c24; }
        .payment-refunded { background: #ffeaa7; color: #6c5ce7; }

        .order-toggle {
            background: none;
            border: none;
            color: #800020;
            font-size: 18px;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .order-toggle:hover {
            background: rgba(128, 0, 32, 0.1);
        }

        .order-details {
            display: none;
            padding: 0 40px 30px;
            animation: slideDown 0.3s ease;
        }

        .order-details.active {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 30px;
            margin-bottom: 30px;
        }

        .shipping-info,
        .payment-info {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #e9ecef;
        }

        .info-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c2c2c;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-title i {
            color: #800020;
        }

        .info-row {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            color: #666;
            font-weight: 500;
        }

        .info-value {
            color: #2c2c2c;
            font-weight: 600;
        }

        .order-items {
            margin-top: 20px;
        }

        .items-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c2c2c;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .items-title i {
            color: #800020;
        }

        .item-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
            border: 2px solid #f0f0f0;
        }

        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #f0f0f0;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-size: 18px;
            font-weight: 600;
            color: #2c2c2c;
            margin-bottom: 8px;
        }

        .item-meta {
            display: flex;
            gap: 20px;
            font-size: 14px;
            color: #666;
        }

        .item-price {
            text-align: right;
        }

        .item-unit-price {
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
        }

        .item-total-price {
            font-size: 20px;
            font-weight: 700;
            color: #800020;
        }

        .order-summary {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 2px solid #f0f0f0;
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-row.total {
            font-size: 20px;
            font-weight: 700;
            color: #800020;
            padding-top: 15px;
            border-top: 2px solid #e9ecef;
        }

        .discount {
            color: #28a745;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: white;
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e9ecef;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary:hover {
            box-shadow: 0 10px 25px rgba(128, 0, 32, 0.3);
        }

        .btn-secondary:hover {
            background: white;
            border-color: #800020;
            color: #800020;
        }

        .btn-danger:hover {
            box-shadow: 0 10px 25px rgba(220, 53, 69, 0.3);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 40px 0;
        }

        .pagination a,
        .pagination span {
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            text-decoration: none;
            color: #666;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            border-color: #800020;
            color: #800020;
            transform: translateY(-2px);
        }

        .pagination .current {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: white;
            border-color: #800020;
        }

        .pagination .disabled {
            opacity: 0.5;
            pointer-events: none;
        }

        @media (max-width: 1024px) {
            .details-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }

            .page-header,
            .orders-header {
                padding: 20px;
            }

            .order-header {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 20px;
            }

            .order-details {
                padding: 0 20px 20px;
            }

            .item-card {
                flex-direction: column;
                text-align: center;
            }

            .item-price {
                text-align: center;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-history"></i>Order History</h1>
            <p>Track and manage all your previous orders</p>
        </div>

        <!-- Orders Container -->
        <div class="orders-container">
            <div class="orders-header">
                <h2><i class="fas fa-receipt"></i>Your Orders</h2>
                <div class="orders-count"><?php echo $total_orders; ?> Total Orders</div>
            </div>

            <?php if ($total_orders == 0): ?>
                <!-- Empty State -->
                <div class="empty-state">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>No orders yet</h3>
                    <p>You haven't placed any orders yet. Start shopping to see your order history here!</p>
                    <a href="../pages/index.php">Start Shopping</a>
                </div>
            <?php else: ?>
                <!-- Orders List -->
                <?php while ($order = $orders_result->fetch_assoc()): ?>
                    <?php 
                    $order_items = getOrderItems($order['id'], $conn);
                    $status_badge = getStatusBadge($order['order_status']);
                    $payment_badge = getPaymentStatusBadge($order['payment_status']);
                    ?>
                    <div class="order-card">
                        <div class="order-header" onclick="toggleOrderDetails(<?php echo $order['id']; ?>)">
                            <div class="order-info">
                                <h3>Order #<?php echo $order['order_number']; ?></h3>
                                <div class="order-meta">
                                    <span><i class="fas fa-calendar"></i> <?php echo date('M d, Y', strtotime($order['created_at'])); ?></span>
                                    <span><i class="fas fa-box"></i> <?php echo count($order_items); ?> items</span>
                                    <?php if ($order['transaction_id']): ?>
                                        <span><i class="fas fa-receipt"></i> <?php echo $order['transaction_id']; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="order-badges">
                                <div class="status-badge <?php echo $status_badge['class']; ?>">
                                    <i class="<?php echo $status_badge['icon']; ?>"></i>
                                    <?php echo $status_badge['text']; ?>
                                </div>
                                <div class="payment-badge <?php echo $payment_badge['class']; ?>">
                                    <?php echo $payment_badge['text']; ?>
                                </div>
                            </div>
                            
                            <div class="order-total">
                                <div class="total-amount">Rs. <?php echo number_format($order['total_amount'], 2); ?></div>
                                <div class="total-items"><?php echo count($order_items); ?> items</div>
                            </div>
                            
                            <button class="order-toggle">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>

                        <div class="order-details" id="details-<?php echo $order['id']; ?>">
                            <div class="details-grid">
                                <div class="shipping-info">
                                    <div class="info-title">
                                        <i class="fas fa-shipping-fast"></i>
                                        Shipping Information
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Name:</span>
                                        <span class="info-value"><?php echo htmlspecialchars($order['first_name'] . ' ' . $order['last_name']); ?></span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Phone:</span>
                                        <span class="info-value"><?php echo htmlspecialchars($order['phone']); ?></span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Email:</span>
                                        <span class="info-value"><?php echo htmlspecialchars($order['email']); ?></span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Address:</span>
                                        <span class="info-value"><?php echo htmlspecialchars($order['address']); ?></span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">City:</span>
                                        <span class="info-value"><?php echo htmlspecialchars($order['city']); ?></span>
                                    </div>
                                </div>

                                <div class="payment-info">
                                    <div class="info-title">
                                        <i class="fas fa-credit-card"></i>
                                        Payment Information
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Method:</span>
                                        <span class="info-value"><?php echo ucfirst($order['payment_method']); ?></span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Status:</span>
                                        <span class="info-value payment-badge <?php echo $payment_badge['class']; ?>">
                                            <?php echo $payment_badge['text']; ?>
                                        </span>
                                    </div>
                                    <?php if ($order['transaction_id']): ?>
                                    <div class="info-row">
                                        <span class="info-label">Transaction ID:</span>
                                        <span class="info-value"><?php echo $order['transaction_id']; ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="info-row">
                                        <span class="info-label">Order Date:</span>
                                        <span class="info-value"><?php echo date('M d, Y H:i', strtotime($order['created_at'])); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="order-items">
                                <div class="items-title">
                                    <i class="fas fa-box-open"></i>
                                    Order Items
                                </div>
                                
                                <?php foreach ($order_items as $item): ?>
                                <div class="item-card">
                                    <img src="<?php echo htmlspecialchars($item['product_image']); ?>" 
                                         alt="<?php echo htmlspecialchars($item['product_name']); ?>" 
                                         class="item-image">
                                    <div class="item-info">
                                        <div class="item-name"><?php echo htmlspecialchars($item['product_name']); ?></div>
                                        <div class="item-meta">
                                            <span>Quantity: <?php echo $item['quantity']; ?></span>
                                            <span>Unit Price: Rs. <?php echo number_format($item['product_price'], 2); ?></span>
                                        </div>
                                    </div>
                                    <div class="item-price">
                                        <div class="item-total-price">Rs. <?php echo number_format($item['total_price'], 2); ?></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="order-summary">
                                <div class="summary-row">
                                    <span>Subtotal:</span>
                                    <span>Rs. <?php echo number_format($order['subtotal'], 2); ?></span>
                                </div>
                                <div class="summary-row">
                                    <span>Shipping:</span>
                                    <span>Rs. <?php echo number_format($order['shipping_cost'], 2); ?></span>
                                </div>
                                <div class="summary-row discount">
                                    <span>Discount:</span>
                                    <span>-Rs. <?php echo number_format($order['discount_amount'], 2); ?></span>
                                </div>
                                <div class="summary-row total">
                                    <span>Total:</span>
                                    <span>Rs. <?php echo number_format($order['total_amount'], 2); ?></span>
                                </div>
                            </div>

                            <div class="action-buttons">
                                <?php if ($order['order_status'] === 'pending' || $order['order_status'] === 'confirmed'): ?>
                                    <button class="btn btn-danger" onclick="cancelOrder(<?php echo $order['id']; ?>)">
                                        <i class="fas fa-times"></i>
                                        Cancel Order
                                    </button>
                                <?php endif; ?>
                                
                                <?php if ($order['order_status'] === 'delivered'): ?>
                                    <a href="review_order.php?order_id=<?php echo $order['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-star"></i>
                                        Write Review
                                    </a>
                                <?php endif; ?>
                                
                                <a href="invoice.php?order_id=<?php echo $order['id']; ?>" class="btn btn-secondary">
                                    <i class="fas fa-download"></i>
                                    Download Invoice
                                </a>
                                
                                <a href="../pages/index.php" class="btn btn-secondary">
                                    <i class="fas fa-shopping-cart"></i>
                                    Order Again
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">
                            <i class="fas fa-chevron-left"></i> Previous
                        </a>
                    <?php else: ?>
                        <span class="disabled">
                            <i class="fas fa-chevron-left"></i> Previous
                        </span>
                    <?php endif; ?>

                    <?php 
                    $start = max(1, $page - 2);
                    $end = min($total_pages, $page + 2);
                    
                    for ($i = $start; $i <= $end; $i++): 
                    ?>
                        <?php if ($i == $page): ?>
                            <span class="current"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>">
                            Next <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php else: ?>
                        <span class="disabled">
                            Next <i class="fas fa-chevron-right"></i>
                        </span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function toggleOrderDetails(orderId) {
    const details = document.getElementById('details-' + orderId);
    const toggleBtn = event.currentTarget.querySelector('.order-toggle i');
    
    if (details.classList.contains('active')) {
        // Close the details
        details.classList.remove('active');
        toggleBtn.classList.remove('fa-chevron-up');
        toggleBtn.classList.add('fa-chevron-down');
    } else {
        // Close all other details first
        document.querySelectorAll('.order-details.active').forEach(detail => {
            detail.classList.remove('active');
        });
        document.querySelectorAll('.order-toggle i').forEach(icon => {
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        });
        
        // Open clicked details
        details.classList.add('active');
        toggleBtn.classList.remove('fa-chevron-down');
        toggleBtn.classList.add('fa-chevron-up');
    }
}

function cancelOrder(orderId) {
    if (confirm('Are you sure you want to cancel this order? This action cannot be undone.')) {
        // Show loading state
        const btn = event.target;
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Cancelling...';
        btn.disabled = true;
        
        // Make AJAX request to cancel order
        fetch('cancel_order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ order_id: orderId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update UI to show cancelled status
                location.reload();
            } else {
                alert('Failed to cancel order: ' + data.message);
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while cancelling the order');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    }
}

// Auto-refresh order status every 30 seconds for pending orders
function refreshOrderStatus() {
    const pendingOrders = document.querySelectorAll('.status-pending, .status-processing');
    if (pendingOrders.length > 0) {
        fetch('check_order_status.php')
            .then(response => response.json())
            .then(data => {
                if (data.updated) {
                    location.reload();
                }
            })
            .catch(error => console.log('Status check failed:', error));
    }
}

// Set up auto-refresh
setInterval(refreshOrderStatus, 30000);

// Format payment method display
document.addEventListener('DOMContentLoaded', function() {
    const paymentMethods = document.querySelectorAll('.info-value');
    paymentMethods.forEach(element => {
        if (element.textContent.toLowerCase().includes('jazzcash')) {
            element.innerHTML = '<i class="fas fa-mobile-alt"></i> JazzCash';
        } else if (element.textContent.toLowerCase().includes('easypaisa')) {
            element.innerHTML = '<i class="fas fa-wallet"></i> EasyPaisa';
        } else if (element.textContent.toLowerCase().includes('card')) {
            element.innerHTML = '<i class="fas fa-credit-card"></i> Card Payment';
        } else if (element.textContent.toLowerCase().includes('bank')) {
            element.innerHTML = '<i class="fas fa-university"></i> Bank Transfer';
        }
    });
});

// Print functionality
function printInvoice(orderId) {
    window.open('invoice.php?order_id=' + orderId + '&print=1', '_blank');
}

// Search/Filter functionality
function filterOrders() {
    const searchTerm = document.getElementById('orderSearch').value.toLowerCase();
    const statusFilter = document.getElementById('statusFilter').value;
    const orderCards = document.querySelectorAll('.order-card');

    orderCards.forEach(card => {
        const orderNumber = card.querySelector('.order-info h3').textContent.toLowerCase();
        const orderStatus = card.querySelector('.status-badge').textContent.toLowerCase();
        
        const matchesSearch = orderNumber.includes(searchTerm);
        const matchesStatus = statusFilter === '' || orderStatus.includes(statusFilter.toLowerCase());
        
        if (matchesSearch && matchesStatus) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + F to focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
        e.preventDefault();
        const searchInput = document.getElementById('orderSearch');
        if (searchInput) {
            searchInput.focus();
        }
    }
});
    </script>
</body>
</html>