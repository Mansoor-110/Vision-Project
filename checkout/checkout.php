<?php include '../includes/header.php' ?>
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

        .checkout-steps {
            display: flex;
            justify-content: center;
            padding: 30px;
            background: #f8f9fa;
            border-bottom: 1px solid #eee;
        }

        .step {
            display: flex;
            align-items: center;
            margin: 0 20px;
            color: #666;
        }

        .step.active {
            color: #800020;
        }

        .step.completed {
            color: #28a745;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
            font-size: 14px;
        }

        .step.active .step-number {
            background: #800020;
            color: white;
        }

        .step.completed .step-number {
            background: #28a745;
            color: white;
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

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
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
            animation: slideDown 0.3s ease;
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

        .card-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 15px;
        }

        .mobile-wallet-input {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
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

        .security-info {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            background: #e8f5e8;
            border-radius: 10px;
            margin-top: 20px;
        }

        .security-info i {
            color: #28a745;
            font-size: 20px;
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

        .place-order-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
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

        .cart-item:last-child {
            border-bottom: none;
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

        .secure-checkout {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .secure-checkout i {
            color: #28a745;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .success-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .success-content {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 500px;
            margin: 20px;
            animation: modalAppear 0.3s ease;
        }

        @keyframes modalAppear {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(-50px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .success-icon {
            font-size: 64px;
            color: #28a745;
            margin-bottom: 20px;
        }

        .success-title {
            font-size: 28px;
            color: #2c2c2c;
            margin-bottom: 10px;
        }

        .success-message {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .success-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #800020;
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            z-index: 2000;
            transform: translateX(400px);
            transition: all 0.3s ease;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            background: #28a745;
        }

        .notification.error {
            background: #dc3545;
        }

        .notification.warning {
            background: #ffc107;
            color: #333;
        }

        .notification.info {
            background: #17a2b8;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-state i {
            font-size: 64px;
            color: #800020;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .empty-state p {
            margin-bottom: 30px;
        }

        .empty-state a {
            display: inline-block;
            padding: 12px 24px;
            background: #800020;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .empty-state a:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.3);
        }

        @media (max-width: 1024px) {
            .checkout-container {
                grid-template-columns: 1fr;
                max-width: 800px;
            }
            
            .order-summary {
                order: -1;
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

            .success-actions {
                flex-direction: column;
            }

            .checkout-steps {
                overflow-x: auto;
                justify-content: flex-start;
                padding: 20px;
            }

            .step {
                margin: 0 15px;
                white-space: nowrap;
            }
        }
    </style>
</head>
<body>
    <?php
    include '../includes/connection.php';
    
    if (!isset($_SESSION['user_id'])) {
        echo '<div class="empty-state">
                <i class="fas fa-user-lock"></i>
                <h3>Please log in to continue</h3>
                <p>Sign in to access checkout and complete your purchase</p>
                <a href="../auth/login.php">Login Now</a>
              </div>';
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM cart WHERE user_id='$user_id'";
    $sql = mysqli_query($conn, $query);
    $total_items = mysqli_num_rows($sql);
    $subtotal = 0;
    $cart_data = [];

    if ($total_items == 0) {
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
    ?>

    <div class="checkout-container mt-5">
        <!-- Main Checkout Form -->
        <div class="main-content">
            <div class="checkout-header">
                <h1><i class="fas fa-shopping-cart"></i> Secure Checkout</h1>
                <p>Complete your purchase safely and securely - <?php echo $total_items; ?> items</p>
            </div>

            <div class="checkout-steps">
                <div class="step completed">
                    <div class="step-number">1</div>
                    <span>Cart</span>
                </div>
                <div class="step active">
                    <div class="step-number">2</div>
                    <span>Checkout</span>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <span>Payment</span>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <span>Confirmation</span>
                </div>
            </div>

            <form class="checkout-form" id="checkoutForm">
                <!-- Shipping Information -->
                <div class="form-section">
                    <h2 class="section-title">
                        <i class="fas fa-truck"></i>
                        Shipping Information
                    </h2>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">First Name *</label>
                            <input type="text" class="form-input" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name *</label>
                            <input type="text" class="form-input" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-input" name="email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" class="form-input" name="phone" placeholder="+92 300 1234567" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Complete Address *</label>
                        <input type="text" class="form-input" name="address" placeholder="Street Address, Area, City" required>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">City *</label>
                            <input type="text" class="form-input" name="city" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Postal Code</label>
                            <input type="text" class="form-input" name="postal_code">
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
                        <label class="payment-method" for="jazzcash">
                            <input type="radio" id="jazzcash" name="payment_method" value="jazzcash">
                            <div class="payment-icon jazzcash">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="payment-name">JazzCash</div>
                            <div class="payment-desc">Pay with JazzCash wallet</div>
                        </label>

                        <label class="payment-method" for="easypaisa">
                            <input type="radio" id="easypaisa" name="payment_method" value="easypaisa">
                            <div class="payment-icon easypaisa">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="payment-name">EasyPaisa</div>
                            <div class="payment-desc">Pay with EasyPaisa wallet</div>
                        </label>

                        <label class="payment-method" for="card">
                            <input type="radio" id="card" name="payment_method" value="card">
                            <div class="payment-icon card">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="payment-name">Credit/Debit Card</div>
                            <div class="payment-desc">Visa, MasterCard accepted</div>
                        </label>

                        <label class="payment-method" for="bank">
                            <input type="radio" id="bank" name="payment_method" value="bank">
                            <div class="payment-icon bank">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="payment-name">Bank Transfer</div>
                            <div class="payment-desc">Direct bank transfer</div>
                        </label>
                    </div>

                    <!-- Payment Details Sections (keeping the same structure) -->
                    <div id="jazzcash-details" class="payment-details">
                        <h3 style="margin-bottom: 15px; color: #e74c3c;">
                            <i class="fas fa-mobile-alt"></i> JazzCash Payment
                        </h3>
                        <div class="form-group">
                            <label class="form-label">JazzCash Mobile Number *</label>
                            <input type="tel" class="form-input mobile-wallet-input" name="jazzcash_number" placeholder="03XX XXXXXXX">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Transaction PIN *</label>
                            <input type="password" class="form-input" name="jazzcash_pin" placeholder="Enter your JazzCash PIN" maxlength="4">
                        </div>
                    </div>

                    <div id="easypaisa-details" class="payment-details">
                        <h3 style="margin-bottom: 15px; color: #27ae60;">
                            <i class="fas fa-wallet"></i> EasyPaisa Payment
                        </h3>
                        <div class="form-group">
                            <label class="form-label">EasyPaisa Mobile Number *</label>
                            <input type="tel" class="form-input mobile-wallet-input" name="easypaisa_number" placeholder="03XX XXXXXXX">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Transaction PIN *</label>
                            <input type="password" class="form-input" name="easypaisa_pin" placeholder="Enter your EasyPaisa PIN" maxlength="4">
                        </div>
                    </div>

                    <div id="card-details" class="payment-details">
                        <h3 style="margin-bottom: 15px; color: #3498db;">
                            <i class="fas fa-credit-card"></i> Card Payment
                        </h3>
                        <div class="form-group">
                            <label class="form-label">Card Number *</label>
                            <input type="text" class="form-input" name="card_number" placeholder="1234 5678 9012 3456" maxlength="19">
                        </div>
                        <div class="card-row">
                            <div class="form-group">
                                <label class="form-label">Cardholder Name *</label>
                                <input type="text" class="form-input" name="card_name" placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Expiry Date *</label>
                                <input type="text" class="form-input" name="card_expiry" placeholder="MM/YY" maxlength="5">
                            </div>
                            <div class="form-group">
                                <label class="form-label">CVV *</label>
                                <input type="text" class="form-input" name="card_cvv" placeholder="123" maxlength="4">
                            </div>
                        </div>
                    </div>

                    <div id="bank-details" class="payment-details">
                        <h3 style="margin-bottom: 15px; color: #9b59b6;">
                            <i class="fas fa-university"></i> Bank Transfer
                        </h3>
                        <p style="margin-bottom: 20px; color: #666;">Select your bank for direct transfer:</p>
                        <div class="bank-options">
                            <div class="bank-option" data-bank="hbl">
                                <strong>HBL</strong><br>
                                <small>Habib Bank Limited</small>
                            </div>
                            <div class="bank-option" data-bank="ubl">
                                <strong>UBL</strong><br>
                                <small>United Bank Limited</small>
                            </div>
                            <div class="bank-option" data-bank="mcb">
                                <strong>MCB</strong><br>
                                <small>Muslim Commercial Bank</small>
                            </div>
                            <div class="bank-option" data-bank="allied">
                                <strong>Allied Bank</strong><br>
                                <small>Allied Bank Limited</small>
                            </div>
                        </div>
                        <input type="hidden" name="selected_bank" id="selectedBank">
                    </div>

                    <div class="security-info">
                        <i class="fas fa-shield-alt"></i>
                        <div>
                            <strong>100% Secure Checkout</strong><br>
                            <small>Your payment information is encrypted and secure</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="place-order-btn" id="placeOrderBtn">
                    <i class="fas fa-lock"></i>
                    Place Order Securely
                    <div class="loading-spinner" id="loadingSpinner"></div>
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
                    <img src="<?php echo $item['product_image']; ?>" alt="<?php echo $item['product_name']; ?>" class="item-image">
                    <div class="item-details">
                        <div class="item-name"><?php echo $item['product_name']; ?></div>
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

                <div class="secure-checkout">
                    <i class="fas fa-lock"></i>
                    <span>SSL Secured Checkout</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="success-modal" id="successModal">
        <div class="success-content">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="success-title">Order Placed Successfully!</h2>
            <p class="success-message">
                Thank you for your purchase. Your order has been confirmed and will be processed within 24 hours.
                You will receive a confirmation email shortly with tracking details.
            </p>
            <div class="success-actions">
                <a href="../pages/index.php" class="btn btn-secondary">Continue Shopping</a>
            </div>
        </div>
    </div>

    <script>
        // Pass PHP cart data to JavaScript
        const cartData = <?php echo json_encode($cart_data); ?>;
        const totalAmount = <?php echo $total_amount; ?>;
        const totalItems = <?php echo $total_items; ?>;

        // Initialize the checkout system
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
        });

        function setupEventListeners() {
            // Payment method selection
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
            paymentMethods.forEach(method => {
                method.addEventListener('change', handlePaymentMethodChange);
            });

            // Bank selection
            const bankOptions = document.querySelectorAll('.bank-option');
            bankOptions.forEach(option => {
                option.addEventListener('click', handleBankSelection);
            });

            // Form submission
            const checkoutForm = document.getElementById('checkoutForm');
            checkoutForm.addEventListener('submit', handleFormSubmission);

            // Payment method labels
            const paymentLabels = document.querySelectorAll('.payment-method');
            paymentLabels.forEach(label => {
                label.addEventListener('click', function() {
                    paymentLabels.forEach(l => l.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Format inputs
            const phoneInput = document.querySelector('input[name="phone"]');
            phoneInput.addEventListener('input', formatPhoneNumber);

            const cardNumberInput = document.querySelector('input[name="card_number"]');
            if (cardNumberInput) {
                cardNumberInput.addEventListener('input', formatCardNumber);
            }

            const expiryInput = document.querySelector('input[name="card_expiry"]');
            if (expiryInput) {
                expiryInput.addEventListener('input', formatExpiryDate);
            }

            const walletInputs = document.querySelectorAll('.mobile-wallet-input');
            walletInputs.forEach(input => {
                input.addEventListener('input', formatMobileNumber);
            });
        }

        function handlePaymentMethodChange(event) {
            // Hide all payment details
            const allDetails = document.querySelectorAll('.payment-details');
            allDetails.forEach(detail => detail.classList.remove('active'));

            // Show selected payment details
            const selectedMethod = event.target.value;
            const detailsElement = document.getElementById(`${selectedMethod}-details`);
            if (detailsElement) {
                detailsElement.classList.add('active');
            }

            // Update step indicator
            updateStepIndicator(3);
        }

        function handleBankSelection(event) {
            const bankOptions = document.querySelectorAll('.bank-option');
            bankOptions.forEach(option => option.classList.remove('selected'));
            
            event.currentTarget.classList.add('selected');
            const selectedBank = event.currentTarget.dataset.bank;
            document.getElementById('selectedBank').value = selectedBank;
        }

        function formatPhoneNumber(event) {
            let value = event.target.value.replace(/\D/g, '');
            if (value.startsWith('92')) {
                value = '+' + value;
            } else if (value.startsWith('0')) {
                value = '+92' + value.substring(1);
            } else if (!value.startsWith('+92')) {
                value = '+92' + value;
            }
            
            if (value.length > 3) {
                value = value.substring(0, 3) + ' ' + value.substring(3);
            }
            if (value.length > 7) {
                value = value.substring(0, 7) + ' ' + value.substring(7, 14);
            }
            
            event.target.value = value;
        }

        function formatMobileNumber(event) {
            let value = event.target.value.replace(/\D/g, '');
            
            if (value.length > 4) {
                value = value.substring(0, 4) + ' ' + value.substring(4, 11);
            }
            
            event.target.value = value;
        }

        function formatCardNumber(event) {
            let value = event.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
            event.target.value = value;
        }

        function formatExpiryDate(event) {
            let value = event.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            event.target.value = value;
        }

        function updateStepIndicator(step) {
            const steps = document.querySelectorAll('.step');
            steps.forEach((stepEl, index) => {
                stepEl.classList.remove('active', 'completed');
                if (index < step - 1) {
                    stepEl.classList.add('completed');
                } else if (index === step - 1) {
                    stepEl.classList.add('active');
                }
            });
        }

        async function handleFormSubmission(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const orderData = Object.fromEntries(formData.entries());
            
            // Validate form
            if (!validateForm(orderData)) {
                return;
            }

            // Show loading state
            showLoadingState(true);
            
            try {
                // Simulate payment processing
                const paymentResult = await processPayment(orderData);
                
                if (paymentResult.success) {
                    updateStepIndicator(4);
                    showSuccessModal(paymentResult);
                } else {
                    throw new Error(paymentResult.message || 'Payment failed');
                }
            } catch (error) {
                console.error('Payment processing failed:', error);
                showNotification(`Payment failed: ${error.message}`, 'error');
            } finally {
                showLoadingState(false);
            }
        }

        function validateForm(orderData) {
            const requiredFields = ['first_name', 'last_name', 'email', 'phone', 'address', 'city'];
            const errors = [];

            requiredFields.forEach(field => {
                if (!orderData[field] || orderData[field].trim() === '') {
                    errors.push(`${field.replace('_', ' ')} is required`);
                    document.querySelector(`[name="${field}"]`).classList.add('error');
                } else {
                    document.querySelector(`[name="${field}"]`).classList.remove('error');
                }
            });

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (orderData.email && !emailRegex.test(orderData.email)) {
                errors.push('Please enter a valid email address');
                document.querySelector('[name="email"]').classList.add('error');
            }

            if (!orderData.payment_method) {
                errors.push('Please select a payment method');
            }

            if (errors.length > 0) {
                showNotification(errors[0], 'error');
                return false;
            }

            return true;
        }

        async function processPayment(orderData) {
            const paymentMethod = orderData.payment_method;
            
            return new Promise((resolve) => {
                setTimeout(() => {
                    const isSuccess = Math.random() > 0.1;
                    
                    if (isSuccess) {
                        resolve({
                            success: true,
                            transactionId: 'TXN' + Date.now(),
                            method: paymentMethod,
                            amount: totalAmount,
                            message: `Payment successful via ${paymentMethod}`
                        });
                    } else {
                        resolve({
                            success: false,
                            message: 'Payment failed. Please try again.'
                        });
                    }
                }, 2000);
            });
        }

        function showLoadingState(show) {
            const btn = document.getElementById('placeOrderBtn');
            const spinner = document.getElementById('loadingSpinner');
            
            if (show) {
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-lock"></i> Processing Payment...';
                spinner.style.display = 'inline-block';
                btn.appendChild(spinner);
            } else {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-lock"></i> Place Order Securely';
                spinner.style.display = 'none';
            }
        }

        function showSuccessModal(paymentResult) {
            const modal = document.getElementById('successModal');
            modal.style.display = 'flex';
            
            setTimeout(() => {
                window.location.href = '../pages/index.php';
            }, 10000);
        }

        function showNotification(message, type = 'info') {
            const existingNotifications = document.querySelectorAll('.notification');
            existingNotifications.forEach(notification => notification.remove());
            
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => notification.classList.add('show'), 100);
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 5000);
        }

        document.getElementById('successModal').addEventListener('click', function(event) {
            if (event.target === this) {
                this.style.display = 'none';
            }
        });
    </script>
</body>
</html>
