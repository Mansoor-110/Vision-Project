<?php 
include '../includes/header.php';
include '../includes/connection.php';

// Initialize variables
$order_success = false;
$order_data = null;
$errors = [];

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $required_fields = ['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'payment_method'];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }
    
    // Email validation
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    
    // Payment method validation
    $valid_payment_methods = ['jazzcash', 'easypaisa', 'card', 'bank'];
    if (!empty($_POST['payment_method']) && !in_array($_POST['payment_method'], $valid_payment_methods)) {
        $errors[] = 'Invalid payment method';
    }
    
    // Payment method specific validation
    if (!empty($_POST['payment_method'])) {
        switch ($_POST['payment_method']) {
            case 'jazzcash':
                if (empty($_POST['jazzcash_number']) || empty($_POST['jazzcash_pin'])) {
                    $errors[] = 'JazzCash number and PIN are required';
                }
                break;
            case 'easypaisa':
                if (empty($_POST['easypaisa_number']) || empty($_POST['easypaisa_pin'])) {
                    $errors[] = 'EasyPaisa number and PIN are required';
                }
                break;
            case 'card':
                if (empty($_POST['card_number']) || empty($_POST['card_name']) || 
                    empty($_POST['card_expiry']) || empty($_POST['card_cvv'])) {
                    $errors[] = 'All card details are required';
                }
                break;
            case 'bank':
                if (empty($_POST['selected_bank'])) {
                    $errors[] = 'Please select a bank';
                }
                break;
        }
    }
    
    // If no errors, process the order
    if (empty($errors)) {
        $order_data = processOrder($_POST, $user_id, $conn);
        if ($order_data['success']) {
            $order_success = true;
        } else {
            $errors[] = $order_data['message'];
        }
    }
}

// Get cart data
$query = "SELECT * FROM cart WHERE user_id='$user_id'";
$sql = mysqli_query($conn, $query);
$total_items = mysqli_num_rows($sql);
$subtotal = 0;
$cart_data = [];

if ($total_items == 0 && !$order_success) {
    echo '<div class="empty-state">
            <i class="fas fa-shopping-cart"></i>
            <h3>Your cart is empty</h3>
            <p>Add some items to your cart before proceeding to checkout</p>
            <a href="../pages/index.php">Start Shopping</a>
          </div>';
    exit;
}

// Fetch cart data
while ($data = mysqli_fetch_assoc($sql)) {
    $item_total = (float)$data['product_price'] * (int)$data['quantity'];
    $subtotal += $item_total;
    $cart_data[] = $data;
}

// Calculate totals
$discount = 50.00;
$shipping = 150;
$total_amount = $subtotal - $discount + $shipping;

// Function to process order
function processOrder($form_data, $user_id, $conn) {
    try {
        // Get cart data
        $cart_query = "SELECT * FROM cart WHERE user_id = '$user_id'";
        $cart_result = mysqli_query($conn, $cart_query);
        
        if (mysqli_num_rows($cart_result) == 0) {
            return ['success' => false, 'message' => 'Cart is empty'];
        }
        
        // Calculate totals
        $subtotal = 0;
        $cart_items = [];
        while ($item = mysqli_fetch_assoc($cart_result)) {
            $item_total = (float)$item['product_price'] * (int)$item['quantity'];
            $subtotal += $item_total;
            $cart_items[] = $item;
        }
        
        $discount = 50.00;
        $shipping = 150.00;
        $total_amount = $subtotal - $discount + $shipping;
        
        // Generate unique order number
        $order_number = 'ORD' . date('Ymd') . rand(1000, 9999);
        
        // Begin transaction
        mysqli_autocommit($conn, false);
        
        // Insert order
        $order_sql = "INSERT INTO orders (
            user_id, order_number, first_name, last_name, email, phone, 
            address, city, postal_code, payment_method, 
            subtotal, shipping_cost, discount_amount, total_amount
        ) VALUES (
            '$user_id', '$order_number', '" . mysqli_real_escape_string($conn, $form_data['first_name']) . "', 
            '" . mysqli_real_escape_string($conn, $form_data['last_name']) . "', 
            '" . mysqli_real_escape_string($conn, $form_data['email']) . "',
            '" . mysqli_real_escape_string($conn, $form_data['phone']) . "',
            '" . mysqli_real_escape_string($conn, $form_data['address']) . "',
            '" . mysqli_real_escape_string($conn, $form_data['city']) . "',
            '" . mysqli_real_escape_string($conn, $form_data['postal_code'] ?? '') . "',
            '" . mysqli_real_escape_string($conn, $form_data['payment_method']) . "',
            '$subtotal', '$shipping', '$discount', '$total_amount'
        )";
        
        if (!mysqli_query($conn, $order_sql)) {
            throw new Exception('Failed to create order: ' . mysqli_error($conn));
        }
        
        $order_id = mysqli_insert_id($conn);
        
        // Insert order items - FIXED: using 'item' instead of 'product_id'
        foreach ($cart_items as $item) {
            $item_total = (float)$item['product_price'] * (int)$item['quantity'];
            
            $item_sql = "INSERT INTO order_items (
                order_id, product_id, product_name, product_image, 
                product_price, quantity, total_price
            ) VALUES (
                '$order_id', '" . $item['item'] . "', 
                '" . mysqli_real_escape_string($conn, $item['product_name']) . "',
                '" . mysqli_real_escape_string($conn, $item['product_image']) . "',
                '" . $item['product_price'] . "', '" . $item['quantity'] . "', '$item_total'
            )";
            
            if (!mysqli_query($conn, $item_sql)) {
                throw new Exception('Failed to add order item: ' . mysqli_error($conn));
            }
        }
        
        // Simulate payment processing
        $payment_success = simulatePayment($form_data['payment_method'], $total_amount);
        
        if ($payment_success['success']) {
            // Update order with transaction ID
            $transaction_id = $payment_success['transaction_id'];
            $update_sql = "UPDATE orders SET transaction_id = '$transaction_id', 
                          payment_status = 'completed', order_status = 'confirmed' 
                          WHERE id = '$order_id'";
            mysqli_query($conn, $update_sql);
            
            // Clear user's cart
            $clear_cart_sql = "DELETE FROM cart WHERE user_id = '$user_id'";
            mysqli_query($conn, $clear_cart_sql);
            
            // Commit transaction
            mysqli_commit($conn);
            
            return [
                'success' => true,
                'order_id' => $order_id,
                'order_number' => $order_number,
                'transaction_id' => $transaction_id,
                'total_amount' => $total_amount,
                'payment_method' => $form_data['payment_method']
            ];
            
        } else {
            // Payment failed but keep order record
            $update_sql = "UPDATE orders SET payment_status = 'failed' WHERE id = '$order_id'";
            mysqli_query($conn, $update_sql);
            mysqli_commit($conn);
            
            return [
                'success' => false,
                'message' => $payment_success['message'] ?? 'Payment processing failed'
            ];
        }
        
    } catch (Exception $e) {
        mysqli_rollback($conn);
        return ['success' => false, 'message' => $e->getMessage()];
    } finally {
        mysqli_autocommit($conn, true);
    }
}

// Function to simulate payment processing
function simulatePayment($method, $amount) {
    // Simulate success/failure (90% success rate)
    $success = rand(1, 100) <= 90;
    
    if ($success) {
        return [
            'success' => true,
            'transaction_id' => 'TXN' . strtoupper($method) . date('YmdHis') . rand(100, 999),
            'message' => 'Payment processed successfully'
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Payment declined. Please check your payment details and try again.'
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Your Store</title>
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

        .checkout-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            padding: 0 20px;
        }

        .main-content {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .checkout-header {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .checkout-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .checkout-header p {
            opacity: 0.9;
            font-size: 16px;
        }

        .success-message {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 40px;
            text-align: center;
            border-radius: 20px;
            margin: 20px;
        }

        .success-message h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .success-message .order-details {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .success-message .order-details p {
            margin: 10px 0;
            font-size: 18px;
        }

        .success-actions {
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: white;
            color: #28a745;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .error-alert {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 10px;
            margin: 20px;
            border: 1px solid #f5c6cb;
        }

        .error-alert ul {
            margin: 10px 0 0 20px;
        }

        .checkout-form {
            padding: 40px;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 22px;
            color: #2c2c2c;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #800020;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: #800020;
            background: white;
            box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
        }

        .form-input.error {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .payment-method {
            border: 2px solid #e1e8ed;
            border-radius: 15px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            text-align: center;
        }

        .payment-method:hover {
            border-color: #800020;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(128, 0, 32, 0.1);
        }

        .payment-method.selected {
            border-color: #800020;
            background: rgba(128, 0, 32, 0.05);
        }

        .payment-method input {
            display: none;
        }

        .payment-icon {
            font-size: 32px;
            margin-bottom: 10px;
            color: #800020;
        }

        .payment-method .jazzcash {
            color: #e74c3c;
        }

        .payment-method .easypaisa {
            color: #27ae60;
        }

        .payment-method .card {
            color: #3498db;
        }

        .payment-method .bank {
            color: #9b59b6;
        }

        .payment-name {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .payment-desc {
            font-size: 12px;
            color: #666;
        }

        .payment-details {
            display: none;
            margin-top: 30px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 15px;
            border: 2px solid #e1e8ed;
        }

        .payment-details.active {
            display: block;
        }

        .card-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 15px;
        }

        .bank-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
        }

        .bank-option {
            padding: 15px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .bank-option:hover,
        .bank-option.selected {
            border-color: #800020;
            background: rgba(128, 0, 32, 0.05);
        }

        .place-order-btn {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .place-order-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(128, 0, 32, 0.3);
        }

        /* Order Summary Sidebar */
        .order-summary {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .summary-header {
            padding: 25px;
            border-bottom: 2px solid #f0f0f0;
        }

        .summary-header h2 {
            color: #2c2c2c;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-items {
            padding: 20px 25px;
            max-height: 400px;
            overflow-y: auto;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #f0f0f0;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: #2c2c2c;
            margin-bottom: 5px;
        }

        .item-delivery {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }

        .item-stock {
            font-size: 12px;
            color: #28a745;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }

        .quantity-display {
            font-weight: 600;
            min-width: 20px;
            text-align: center;
            background: #f0f0f0;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .item-price {
            font-weight: 700;
            color: #800020;
            font-size: 16px;
        }

        .summary-totals {
            padding: 25px;
            border-top: 2px solid #f0f0f0;
            background: #f8f9fa;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .total-row.final {
            font-size: 20px;
            font-weight: 700;
            color: #800020;
            padding-top: 15px;
            border-top: 2px solid #e0e0e0;
        }

        .discount {
            color: #28a745;
        }

        @media (max-width: 1024px) {
            .checkout-container {
                grid-template-columns: 1fr;
                max-width: 800px;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .card-row {
                grid-template-columns: 1fr;
            }
            
            .payment-methods {
                grid-template-columns: 1fr;
            }
            
            .checkout-form {
                padding: 20px;
            }

            .success-actions .btn {
                display: block;
                margin: 10px 0;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <?php if ($order_success): ?>
        <!-- Success Message -->
        <div class="success-message">
            <h2><i class="fas fa-check-circle"></i> Order Placed Successfully!</h2>
            <div class="order-details">
                <p><strong>Order Number:</strong> <?php echo $order_data['order_number']; ?></p>
                <p><strong>Transaction ID:</strong> <?php echo $order_data['transaction_id']; ?></p>
                <p><strong>Total Amount:</strong> Rs. <?php echo number_format($order_data['total_amount'], 2); ?></p>
                <p><strong>Payment Method:</strong> <?php echo ucfirst($order_data['payment_method']); ?></p>
            </div>
            <p>Thank you for your purchase! Your order has been confirmed and will be processed within 24 hours.</p>
            <div class="success-actions">
                <a href="../pages/index.php" class="btn btn-primary">Continue Shopping</a>
                <a href="../orders/order_history.php" class="btn btn-secondary">View Orders</a>
            </div>
        </div>
    <?php else: ?>
        <div class="checkout-container mt-5">
            <!-- Main Checkout Form -->
            <div class="main-content">
                <div class="checkout-header">
                    <h1><i class="fas fa-shopping-cart"></i> Secure Checkout</h1>
                    <p>Complete your purchase safely and securely - <?php echo $total_items; ?> items</p>
                </div>

                <?php if (!empty($errors)): ?>
                    <div class="error-alert">
                        <strong>Please fix the following errors:</strong>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="checkout-form" method="POST">
                    <!-- Shipping Information -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-shipping-fast"></i>
                            Shipping Information
                        </h2>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-input" name="first_name" 
                                       value="<?php echo htmlspecialchars($_POST['first_name'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-input" name="last_name" 
                                       value="<?php echo htmlspecialchars($_POST['last_name'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-input" name="email" 
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" class="form-input" name="phone" 
                                   value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" 
                                   placeholder="+92 300 1234567" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Complete Address *</label>
                            <input type="text" class="form-input" name="address" 
                                   value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>"
                                   placeholder="Street Address, Area, City" required>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">City *</label>
                                <input type="text" class="form-input" name="city" 
                                       value="<?php echo htmlspecialchars($_POST['city'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Postal Code</label>
                                <input type="text" class="form-input" name="postal_code"
                                       value="<?php echo htmlspecialchars($_POST['postal_code'] ?? ''); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-credit-card"></i>
                            Payment Method
                        </h2>

                        <div class="payment-methods">
                            <label class="payment-method <?php echo (($_POST['payment_method'] ?? '') === 'jazzcash') ? 'selected' : ''; ?>">
                                <input type="radio" name="payment_method" value="jazzcash" 
                                       <?php echo (($_POST['payment_method'] ?? '') === 'jazzcash') ? 'checked' : ''; ?>>
                                <div class="payment-icon jazzcash">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="payment-name">JazzCash</div>
                                <div class="payment-desc">Pay with JazzCash wallet</div>
                            </label>

                            <label class="payment-method <?php echo (($_POST['payment_method'] ?? '') === 'easypaisa') ? 'selected' : ''; ?>">
                                <input type="radio" name="payment_method" value="easypaisa"
                                       <?php echo (($_POST['payment_method'] ?? '') === 'easypaisa') ? 'checked' : ''; ?>>
                                <div class="payment-icon easypaisa">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <div class="payment-name">EasyPaisa</div>
                                <div class="payment-desc">Pay with EasyPaisa wallet</div>
                            </label>

                            <label class="payment-method <?php echo (($_POST['payment_method'] ?? '') === 'card') ? 'selected' : ''; ?>">
                                <input type="radio" name="payment_method" value="card"
                                       <?php echo (($_POST['payment_method'] ?? '') === 'card') ? 'checked' : ''; ?>>
                                <div class="payment-icon card">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="payment-name">Credit/Debit Card</div>
                                <div class="payment-desc">Visa, MasterCard accepted</div>
                            </label>

                            <label class="payment-method <?php echo (($_POST['payment_method'] ?? '') === 'bank') ? 'selected' : ''; ?>">
                                <input type="radio" name="payment_method" value="bank"
                                       <?php echo (($_POST['payment_method'] ?? '') === 'bank') ? 'checked' : ''; ?>>
                                <div class="payment-icon bank">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div class="payment-name">Bank Transfer</div>
                                <div class="payment-desc">Direct bank transfer</div>
                            </label>
                        </div>

                        <!-- Payment Details Sections -->
                        <div class="payment-details <?php echo (($_POST['payment_method'] ?? '') === 'jazzcash') ? 'active' : ''; ?>">
                            <h3 style="margin-bottom: 15px; color: #e74c3c;">
                                <i class="fas fa-mobile-alt"></i> JazzCash Payment
                            </h3>
                            <div class="form-group">
                                <label class="form-label">JazzCash Mobile Number *</label>
                                <input type="tel" class="form-input" name="jazzcash_number" 
                                       value="<?php echo htmlspecialchars($_POST['jazzcash_number'] ?? ''); ?>"
                                       placeholder="03XX XXXXXXX">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Transaction PIN *</label>
                                <input type="password" class="form-input" name="jazzcash_pin" 
                                       placeholder="Enter your JazzCash PIN" maxlength="4">
                            </div>
                        </div>

                        <div class="payment-details <?php echo (($_POST['payment_method'] ?? '') === 'easypaisa') ? 'active' : ''; ?>">
                            <h3 style="margin-bottom: 15px; color: #27ae60;">
                                <i class="fas fa-wallet"></i> EasyPaisa Payment
                            </h3>
                            <div class="form-group">
                                <label class="form-label">EasyPaisa Mobile Number *</label>
                                <input type="tel" class="form-input" name="easypaisa_number" 
                                       value="<?php echo htmlspecialchars($_POST['easypaisa_number'] ?? ''); ?>"
                                       placeholder="03XX XXXXXXX">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Transaction PIN *</label>
                                <input type="password" class="form-input" name="easypaisa_pin" 
                                       placeholder="Enter your EasyPaisa PIN" maxlength="4">
                            </div>
                        </div>

                        <div class="payment-details <?php echo (($_POST['payment_method'] ?? '') === 'card') ? 'active' : ''; ?>">
                            <h3 style="margin-bottom: 15px; color: #3498db;">
                                <i class="fas fa-credit-card"></i> Card Payment
                            </h3>
                            <div class="form-group">
                                <label class="form-label">Card Number *</label>
                                <input type="text" class="form-input" name="card_number" 
                                       value="<?php echo htmlspecialchars($_POST['card_number'] ?? ''); ?>"
                                       placeholder="1234 5678 9012 3456" maxlength="19">
                            </div>
                            <div class="card-row">
                                <div class="form-group">
                                    <label class="form-label">Cardholder Name *</label>
                                    <input type="text" class="form-input" name="card_name" 
                                           value="<?php echo htmlspecialchars($_POST['card_name'] ?? ''); ?>"
                                           placeholder="John Doe">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Expiry Date *</label>
                                    <input type="text" class="form-input" name="card_expiry" 
                                           value="<?php echo htmlspecialchars($_POST['card_expiry'] ?? ''); ?>"
                                           placeholder="MM/YY" maxlength="5">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">CVV *</label>
                                    <input type="text" class="form-input" name="card_cvv" 
                                           placeholder="123" maxlength="4">
                                </div>
                            </div>
                        </div>

                        <div class="payment-details <?php echo (($_POST['payment_method'] ?? '') === 'bank') ? 'active' : ''; ?>">
                            <h3 style="margin-bottom: 15px; color: #9b59b6;">
                                <i class="fas fa-university"></i> Bank Transfer
                            </h3>
                            <p style="margin-bottom: 20px; color: #666;">Select your bank for direct transfer:</p>
                            <div class="bank-options">
                                <div class="bank-option <?php echo (($_POST['selected_bank'] ?? '') === 'hbl') ? 'selected' : ''; ?>" 
                                     onclick="selectBank('hbl')">
                                    <strong>HBL</strong><br>
                                    <small>Habib Bank Limited</small>
                                </div>
                                <div class="bank-option <?php echo (($_POST['selected_bank'] ?? '') === 'ubl') ? 'selected' : ''; ?>" 
                                     onclick="selectBank('ubl')">
                                    <strong>UBL</strong><br>
                                    <small>United Bank Limited</small>
                                </div>
                                <div class="bank-option <?php echo (($_POST['selected_bank'] ?? '') === 'mcb') ? 'selected' : ''; ?>" 
                                     onclick="selectBank('mcb')">
                                    <strong>MCB</strong><br>
                                    <small>Muslim Commercial Bank</small>
                                </div>
                                <div class="bank-option <?php echo (($_POST['selected_bank'] ?? '') === 'allied') ? 'selected' : ''; ?>" 
                                     onclick="selectBank('allied')">
                                    <strong>Allied Bank</strong><br>
                                    <small>Allied Bank Limited</small>
                                </div>
                            </div>
                            <input type="hidden" name="selected_bank" id="selectedBank" 
                                   value="<?php echo htmlspecialchars($_POST['selected_bank'] ?? ''); ?>">
                        </div>
                    </div>

                    <button type="submit" class="place-order-btn">
                        <i class="fas fa-lock"></i>
                        Place Order Securely
                    </button>
                </form>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="order-summary">
                <div class="summary-header">
                    <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                </div>

                <div class="cart-items">
                    <?php foreach ($cart_data as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo htmlspecialchars($item['product_image']); ?>" 
                             alt="<?php echo htmlspecialchars($item['product_name']); ?>" class="item-image">
                        <div class="item-details">
                            <div class="item-name"><?php echo htmlspecialchars($item['product_name']); ?></div>
                            <div class="item-delivery">
                                <?php
                                if($item['product_name'] == "Customized jewellery"){
                                    echo "Delivery in 7-14 business days";
                                } else {
                                    echo "Delivery in 3-5 business days";
                                }
                                ?>
                            </div>
                            <div class="item-stock">
                                <i class="fas fa-check-circle"></i>
                                In Stock
                            </div>
                            <div class="item-quantity">
                                <span class="quantity-display">Qty: <?php echo $item['quantity']; ?></span>
                            </div>
                        </div>
                        <div class="item-price">Rs. <?php echo number_format($item['product_price']); ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="summary-totals">
                    <div class="total-row">
                        <span>Subtotal (<?php echo $total_items; ?> items):</span>
                        <span>Rs. <?php echo number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="total-row">
                        <span>Shipping:</span>
                        <span>Rs. <?php echo number_format($shipping, 2); ?></span>
                    </div>
                    <div class="total-row discount">
                        <span>Discount:</span>
                        <span>-Rs. <?php echo number_format($discount, 2); ?></span>
                    </div>
                    <div class="total-row final">
                        <span>Total:</span>
                        <span>Rs. <?php echo number_format($total_amount, 2); ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        // Simple JavaScript for UI interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Payment method selection
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    // Hide all payment details
                    document.querySelectorAll('.payment-details').forEach(detail => {
                        detail.classList.remove('active');
                    });
                    
                    // Show selected payment details
                    const selectedDetails = document.querySelector('.payment-details:nth-of-type(' + 
                        (Array.from(paymentMethods).indexOf(this) + 2) + ')');
                    if (selectedDetails) {
                        selectedDetails.classList.add('active');
                    }
                    
                    // Update payment method labels
                    document.querySelectorAll('.payment-method').forEach(label => {
                        label.classList.remove('selected');
                    });
                    this.closest('.payment-method').classList.add('selected');
                });
            });
            
            // Format phone number
            const phoneInput = document.querySelector('input[name="phone"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '');
                    if (value.startsWith('92')) {
                        value = '+' + value;
                    } else if (value.startsWith('0')) {
                        value = '+92' + value.substring(1);
                    } else if (!value.startsWith('+92') && value.length > 0) {
                        value = '+92' + value;
                    }
                    this.value = value;
                });
            }
            
            // Format card number
            const cardNumberInput = document.querySelector('input[name="card_number"]');
            if (cardNumberInput) {
                cardNumberInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '');
                    value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
                    this.value = value;
                });
            }
            
            // Format expiry date
            const expiryInput = document.querySelector('input[name="card_expiry"]');
            if (expiryInput) {
                expiryInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '');
                    if (value.length >= 2) {
                        value = value.substring(0, 2) + '/' + value.substring(2, 4);
                    }
                    this.value = value;
                });
            }
        });
        
        function selectBank(bank) {
            // Remove selected class from all bank options
            document.querySelectorAll('.bank-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to clicked bank
            event.target.closest('.bank-option').classList.add('selected');
            
            // Set hidden input value
            document.getElementById('selectedBank').value = bank;
        }
        
        // Auto-redirect after successful order
        <?php if ($order_success): ?>
        setTimeout(function() {
            window.location.href = '../pages/index.php';
        }, 10000);
        <?php endif; ?>
    </script>
</body>
</html>