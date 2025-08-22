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

        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 2px solid #800020;
            background: white;
            color: #800020;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .quantity-btn:hover {
            background: #800020;
            color: white;
        }

        .quantity-display {
            font-weight: 600;
            min-width: 20px;
            text-align: center;
        }

        .item-price {
            font-weight: 700;
            color: #800020;
            font-size: 16px;
        }

        .remove-item {
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 8px;
            cursor: pointer;
            font-size: 12px;
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

        /* Loading Spinner */
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

        /* Success Modal */
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

        /* Notification */
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

        /* Responsive Design */
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
    <div class="checkout-container">
        <!-- Main Checkout Form -->
        <div class="main-content">
            <div class="checkout-header">
                <h1><i class="fas fa-shopping-cart"></i> Secure Checkout</h1>
                <p>Complete your purchase safely and securely</p>
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

                    <!-- JazzCash Payment Details -->
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

                    <!-- EasyPaisa Payment Details -->
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

                    <!-- Card Payment Details -->
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

                    <!-- Bank Transfer Details -->
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

            <div class="cart-items" id="cartItems">
                <!-- Cart items will be populated by JavaScript -->
            </div>

            <div class="summary-totals">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span id="subtotal">Rs. 15,000</span>
                </div>
                <div class="total-row">
                    <span>Shipping:</span>
                    <span id="shipping">Rs. 200</span>
                </div>
                <div class="total-row discount">
                    <span>Discount:</span>
                    <span id="discount">-Rs. 500</span>
                </div>
                <div class="total-row final">
                    <span>Total:</span>
                    <span id="total">Rs. 14,700</span>
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
        // Cart data
        let cartData = [
            {
                id: 1,
                name: "PURPLE AMETHYST",
                price: 4000,
                quantity: 1,
                image: "https://via.placeholder.com/60x60/800020/FFFFFF?text=Earrings",
                delivery: "Delivery in 3-5 business days"
            },
            {
                id: 2,
                name: "Customized jewellery",
                price: 11000,
                quantity: 1,
                image: "https://via.placeholder.com/60x60/800020/FFFFFF?text=Custom",
                delivery: "Delivery in 7-14 business days"
            },
            {
                id: 3,
                name: "Mirror",
                price: 2500,
                quantity: 1,
                image: "https://via.placeholder.com/60x60/800020/FFFFFF?text=Mirror",
                delivery: "Delivery in 3-5 business days"
            }
        ];

        // Payment API configurations
        const PAYMENT_CONFIG = {
            jazzcash: {
                apiUrl: 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/Payment/DoTransaction',
                merchantId: 'MC12345', // Replace with actual merchant ID
                password: 'your_password', // Replace with actual password
                salt: 'your_salt' // Replace with actual salt
            },
            easypaisa: {
                apiUrl: 'https://easypaisa.com.pk/easypay/Index.jsf',
                storeId: 'your_store_id', // Replace with actual store ID
                merchantId: 'your_merchant_id' // Replace with actual merchant ID
            },
            card: {
                // Using a payment gateway like Stripe or local Pakistani gateway
                apiUrl: 'https://api.stripe.com/v1/payment_intents',
                publicKey: 'pk_test_your_key' // Replace with actual key
            }
        };

        // Initialize the checkout system
        document.addEventListener('DOMContentLoaded', function() {
            initializeCheckout();
            setupEventListeners();
            renderCartItems();
            updateTotals();
        });

        function initializeCheckout() {
            // Format phone number input
            const phoneInput = document.querySelector('input[name="phone"]');
            phoneInput.addEventListener('input', formatPhoneNumber);

            // Format card number input
            const cardNumberInput = document.querySelector('input[name="card_number"]');
            if (cardNumberInput) {
                cardNumberInput.addEventListener('input', formatCardNumber);
            }

            // Format expiry date input
            const expiryInput = document.querySelector('input[name="card_expiry"]');
            if (expiryInput) {
                expiryInput.addEventListener('input', formatExpiryDate);
            }

            // Format mobile wallet numbers
            const walletInputs = document.querySelectorAll('.mobile-wallet-input');
            walletInputs.forEach(input => {
                input.addEventListener('input', formatMobileNumber);
            });
        }

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
        }

        function renderCartItems() {
            const cartContainer = document.getElementById('cartItems');
            cartContainer.innerHTML = '';

            cartData.forEach(item => {
                const cartItem = createCartItemHTML(item);
                cartContainer.appendChild(cartItem);
            });
        }

        function createCartItemHTML(item) {
            const div = document.createElement('div');
            div.className = 'cart-item';
            div.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="item-image">
                <div class="item-details">
                    <div class="item-name">${item.name}</div>
                    <div class="item-delivery">${item.delivery}</div>
                    <div class="item-stock">
                        <i class="fas fa-check-circle"></i>
                        In Stock
                    </div>
                    <div class="item-quantity">
                        <button type="button" class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                        <span class="quantity-display" id="qty${item.id}">${item.quantity}</span>
                        <button type="button" class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                        <button type="button" class="remove-item" onclick="removeItem(${item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="item-price" id="price${item.id}">Rs. ${item.price.toLocaleString()}</div>
            `;
            return div;
        }

        function updateQuantity(itemId, change) {
            const item = cartData.find(i => i.id === itemId);
            if (item) {
                item.quantity = Math.max(1, item.quantity + change);
                document.getElementById(`qty${itemId}`).textContent = item.quantity;
                updateTotals();
            }
        }

        function removeItem(itemId) {
            cartData = cartData.filter(item => item.id !== itemId);
            renderCartItems();
            updateTotals();
            showNotification('Item removed from cart', 'info');
        }

        function updateTotals() {
            const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const shipping = subtotal > 10000 ? 0 : 200;
            const discount = subtotal > 15000 ? 500 : 0;
            const total = subtotal + shipping - discount;

            document.getElementById('subtotal').textContent = `Rs. ${subtotal.toLocaleString()}`;
            document.getElementById('shipping').textContent = shipping === 0 ? 'Free' : `Rs. ${shipping.toLocaleString()}`;
            document.getElementById('discount').textContent = discount > 0 ? `-Rs. ${discount.toLocaleString()}` : 'Rs. 0';
            document.getElementById('total').textContent = `Rs. ${total.toLocaleString()}`;
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
            
            // Format as +92 XXX XXXXXXX
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
            
            // Format as 03XX XXXXXXX
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
                // Process payment based on selected method
                const paymentResult = await processPayment(orderData);
                
                if (paymentResult.success) {
                    // Update step to confirmation
                    updateStepIndicator(4);
                    
                    // Show success modal
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

            // Check required fields
            requiredFields.forEach(field => {
                if (!orderData[field] || orderData[field].trim() === '') {
                    errors.push(`${field.replace('_', ' ')} is required`);
                    document.querySelector(`[name="${field}"]`).classList.add('error');
                } else {
                    document.querySelector(`[name="${field}"]`).classList.remove('error');
                }
            });

            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (orderData.email && !emailRegex.test(orderData.email)) {
                errors.push('Please enter a valid email address');
                document.querySelector('[name="email"]').classList.add('error');
            }

            // Validate payment method
            if (!orderData.payment_method) {
                errors.push('Please select a payment method');
            } else {
                // Validate payment-specific fields
                if (!validatePaymentFields(orderData)) {
                    errors.push('Please fill in all payment details');
                }
            }

            if (errors.length > 0) {
                showNotification(errors[0], 'error');
                return false;
            }

            return true;
        }

        function validatePaymentFields(orderData) {
            const paymentMethod = orderData.payment_method;
            
            switch (paymentMethod) {
                case 'jazzcash':
                    return orderData.jazzcash_number && orderData.jazzcash_pin;
                case 'easypaisa':
                    return orderData.easypaisa_number && orderData.easypaisa_pin;
                case 'card':
                    return orderData.card_number && orderData.card_name && 
                           orderData.card_expiry && orderData.card_cvv;
                case 'bank':
                    return orderData.selected_bank;
                default:
                    return false;
            }
        }

        async function processPayment(orderData) {
            const paymentMethod = orderData.payment_method;
            const totalAmount = calculateTotal();

            switch (paymentMethod) {
                case 'jazzcash':
                    return await processJazzCashPayment(orderData, totalAmount);
                case 'easypaisa':
                    return await processEasyPaisaPayment(orderData, totalAmount);
                case 'card':
                    return await processCardPayment(orderData, totalAmount);
                case 'bank':
                    return await processBankTransfer(orderData, totalAmount);
                default:
                    throw new Error('Invalid payment method');
            }
        }

        async function processJazzCashPayment(orderData, amount) {
            // Simulate JazzCash API integration
            // In a real implementation, you would call the actual JazzCash API
            
            const transactionId = generateTransactionId();
            
            // Simulate API call
            return new Promise((resolve) => {
                setTimeout(() => {
                    // Simulate success/failure
                    const isSuccess = Math.random() > 0.1; // 90% success rate for demo
                    
                    if (isSuccess) {
                        resolve({
                            success: true,
                            transactionId: transactionId,
                            method: 'JazzCash',
                            amount: amount,
                            message: 'Payment successful via JazzCash'
                        });
                    } else {
                        resolve({
                            success: false,
                            message: 'JazzCash payment failed. Please check your PIN and balance.'
                        });
                    }
                }, 2000);
            });
        }

        async function processEasyPaisaPayment(orderData, amount) {
            // Simulate EasyPaisa API integration
            const transactionId = generateTransactionId();
            
            return new Promise((resolve) => {
                setTimeout(() => {
                    const isSuccess = Math.random() > 0.1;
                    
                    if (isSuccess) {
                        resolve({
                            success: true,
                            transactionId: transactionId,
                            method: 'EasyPaisa',
                            amount: amount,
                            message: 'Payment successful via EasyPaisa'
                        });
                    } else {
                        resolve({
                            success: false,
                            message: 'EasyPaisa payment failed. Please verify your account details.'
                        });
                    }
                }, 2000);
            });
        }

        async function processCardPayment(orderData, amount) {
            // Simulate Card payment processing
            const transactionId = generateTransactionId();
            
            return new Promise((resolve) => {
                setTimeout(() => {
                    const isSuccess = Math.random() > 0.15; // 85% success rate
                    
                    if (isSuccess) {
                        resolve({
                            success: true,
                            transactionId: transactionId,
                            method: 'Card Payment',
                            amount: amount,
                            message: 'Card payment processed successfully'
                        });
                    } else {
                        resolve({
                            success: false,
                            message: 'Card payment declined. Please check your card details.'
                        });
                    }
                }, 3000);
            });
        }

        async function processBankTransfer(orderData, amount) {
            // Simulate Bank transfer processing
            const transactionId = generateTransactionId();
            
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve({
                        success: true,
                        transactionId: transactionId,
                        method: 'Bank Transfer',
                        amount: amount,
                        message: 'Bank transfer initiated successfully. Please complete the transfer within 24 hours.',
                        bankDetails: getBankDetails(orderData.selected_bank)
                    });
                }, 1500);
            });
        }

        function getBankDetails(bankCode) {
            const bankDetails = {
                hbl: {
                    name: 'Habib Bank Limited',
                    account: '1234567890',
                    iban: 'PK12HABB0000001234567890'
                },
                ubl: {
                    name: 'United Bank Limited',
                    account: '0987654321',
                    iban: 'PK34UNIL0000000987654321'
                },
                mcb: {
                    name: 'Muslim Commercial Bank',
                    account: '1122334455',
                    iban: 'PK56MUCB0000001122334455'
                },
                allied: {
                    name: 'Allied Bank Limited',
                    account: '5544332211',
                    iban: 'PK78ABPA0000005544332211'
                }
            };
            
            return bankDetails[bankCode] || bankDetails.hbl;
        }

        function calculateTotal() {
            const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const shipping = subtotal > 10000 ? 0 : 200;
            const discount = subtotal > 15000 ? 500 : 0;
            return subtotal + shipping - discount;
        }

        function generateTransactionId() {
            return 'TXN' + Date.now() + Math.random().toString(36).substr(2, 9).toUpperCase();
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
            const messageEl = modal.querySelector('.success-message');
            
            let message = `Your payment of Rs. ${paymentResult.amount.toLocaleString()} via ${paymentResult.method} was successful. `;
            message += `Transaction ID: ${paymentResult.transactionId}. `;
            
            if (paymentResult.bankDetails) {
                message += `Please transfer the amount to ${paymentResult.bankDetails.name} (Account: ${paymentResult.bankDetails.account}) within 24 hours.`;
            } else {
                message += 'You will receive a confirmation email shortly with tracking details.';
            }
            
            messageEl.textContent = message;
            modal.style.display = 'flex';
            
            // Auto close after 10 seconds
            setTimeout(() => {
                modal.style.display = 'none';
            }, 10000);
        }

        function showNotification(message, type = 'info') {
            // Remove existing notifications
            const existingNotifications = document.querySelectorAll('.notification');
            existingNotifications.forEach(notification => notification.remove());
            
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Show notification
            setTimeout(() => notification.classList.add('show'), 100);
            
            // Hide notification after 5 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 5000);
        }

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', function(event) {
            if (event.target === this) {
                this.style.display = 'none';
            }
        });

        // Initialize cart on page load
        window.onload = function() {
            renderCartItems();
            updateTotals();
        };
    </script>
</body>
</html>