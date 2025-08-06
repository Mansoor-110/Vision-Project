<?php include '../includes/header.php' ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Checkout</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --maroon-primary: #800020;
            --maroon-light: #a0002a;
            --maroon-dark: #600018;
            --maroon-ultra-light: rgba(128, 0, 32, 0.05);
            --white-primary: #ffffff;
            --white-off: #fafafa;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --black-subtle: rgba(0, 0, 0, 0.85);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --green-success: #059669;
            --red-danger: #dc2626;
            --blue-info: #2563eb;
            --border-radius-sm: 8px;
            --border-radius-md: 12px;
            --border-radius-lg: 16px;
            --border-radius-xl: 20px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffffff 0%, var(--gray-50) 100%);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--gray-900);
            line-height: 1.6;
        }

        .checkout-wrapper {
            padding: 2rem 0 4rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--maroon-primary) 0%, var(--maroon-light) 100%);
            color: white;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            border-radius: var(--border-radius-xl);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.08) 50%, transparent 70%);
            pointer-events: none;
        }

        .page-header-content {
            position: relative;
            z-index: 1;
        }

        .page-header h1 {
            font-size: 2.75rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            color: white;
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.125rem;
            margin: 0;
            font-weight: 400;
        }

        /* Progress Steps */
        .progress-steps {
            background: var(--white-primary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
        }

        .steps-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .step-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .step.active .step-circle {
            background: var(--maroon-primary);
            color: white;
            box-shadow: 0 0 0 4px rgba(128, 0, 32, 0.2);
        }

        .step.completed .step-circle {
            background: var(--green-success);
            color: white;
        }

        .step.pending .step-circle {
            background: var(--gray-300);
            color: var(--gray-600);
        }

        .step-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-600);
            text-align: center;
        }

        .step.active .step-label {
            color: var(--maroon-primary);
            font-weight: 600;
        }

        .progress-line {
            position: absolute;
            top: 24px;
            left: 24px;
            right: 24px;
            height: 2px;
            background: var(--gray-300);
            z-index: 1;
        }

        .progress-line::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 33%;
            background: var(--maroon-primary);
            transition: width 0.3s ease;
        }

        /* Section Cards */
        .section-card {
            background: var(--white-primary);
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .section-header {
            background: var(--gray-50);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-header h3 {
            margin: 0;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .section-header .step-number {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--maroon-primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .section-content {
            padding: 1.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: var(--border-radius-sm);
            font-size: 1rem;
            transition: all 0.2s ease;
            background: var(--white-primary);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--maroon-primary);
            box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-row-3 {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
        }

        /* Payment Methods */
        .payment-methods {
            display: grid;
            gap: 1rem;
        }

        .payment-option {
            border: 2px solid var(--gray-200);
            border-radius: var(--border-radius-md);
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--white-primary);
        }

        .payment-option:hover {
            border-color: var(--maroon-light);
            background: var(--maroon-ultra-light);
        }

        .payment-option.selected {
            border-color: var(--maroon-primary);
            background: var(--maroon-ultra-light);
        }

        .payment-option-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .payment-radio {
            width: 20px;
            height: 20px;
            border: 2px solid var(--gray-300);
            border-radius: 50%;
            position: relative;
            flex-shrink: 0;
        }

        .payment-option.selected .payment-radio {
            border-color: var(--maroon-primary);
        }

        .payment-option.selected .payment-radio::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            background: var(--maroon-primary);
            border-radius: 50%;
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            background: var(--gray-100);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--gray-600);
        }

        .payment-details h4 {
            margin: 0 0 0.25rem 0;
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .payment-details p {
            margin: 0;
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Order Summary */
        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--gray-200);
        }

        .order-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: var(--border-radius-sm);
            border: 1px solid var(--gray-200);
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
        }

        .item-meta {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .item-price {
            font-weight: 600;
            color: var(--maroon-primary);
            text-align: right;
        }

        .summary-totals {
            border-top: 1px solid var(--gray-200);
            margin-top: 1rem;
            padding-top: 1rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-row span:first-child {
            color: var(--gray-600);
            font-weight: 500;
        }

        .summary-row span:last-child {
            font-weight: 600;
            color: var(--gray-900);
        }

        .discount-amount {
            color: var(--green-success) !important;
        }

        .total-row {
            background: var(--maroon-ultra-light);
            margin: 1rem -1.5rem -1.5rem;
            padding: 1.5rem;
            font-size: 1.125rem;
            font-weight: 700;
            border-top: 2px solid var(--maroon-primary);
        }

        .total-amount {
            color: var(--maroon-primary) !important;
            font-size: 1.25rem;
        }

        /* Action Buttons */
        .checkout-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-md);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        .btn-secondary {
            background: var(--white-primary);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .btn-secondary:hover {
            background: var(--gray-50);
            transform: translateY(-2px);
            color: var(--gray-700);
        }

        /* Security Badge */
        .security-info {
            background: var(--gray-50);
            border-radius: var(--border-radius-md);
            padding: 1rem;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .security-info i {
            color: var(--green-success);
            font-size: 1.25rem;
        }

        .security-text {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 0.75rem;
            }

            .page-header {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }

            .form-row, .form-row-3 {
                grid-template-columns: 1fr;
            }

            .steps-container {
                flex-direction: column;
                gap: 1rem;
            }

            .progress-line {
                display: none;
            }

            .checkout-actions {
                flex-direction: column;
            }

            .section-content {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.75rem;
            }

            .step-label {
                font-size: 0.75rem;
            }
        }

        /* Animation */
        .section-card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .section-card:nth-child(1) { animation-delay: 0.1s; }
        .section-card:nth-child(2) { animation-delay: 0.2s; }
        .section-card:nth-child(3) { animation-delay: 0.3s; }
        .section-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Credit Card Form */
        .card-form {
            display: none;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .card-form.active {
            display: block;
        }

        .card-icons {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .card-icon {
            width: 32px;
            height: 20px;
            background: var(--gray-200);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            color: var(--gray-600);
        }
    </style>
</head>
<body>

<div class="checkout-wrapper">
    <div class="container">
        <?php
        include '../includes/connection.php';
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM cart WHERE user_id='$user_id'";
            $sql = mysqli_query($conn, $query);
            $total = mysqli_num_rows($sql);
            $subtotal = 0;
            
            if ($total > 0) {
                echo '<div class="page-header">
                        <div class="page-header-content">
                            <h1>
                                <i class="fas fa-credit-card"></i> 
                                Secure Checkout
                            </h1>
                            <p>Complete your purchase securely and safely</p>
                        </div>
                      </div>';
                ?>
                
                <!-- Progress Steps -->
                <div class="progress-steps">
                    <div class="steps-container">
                        <div class="progress-line"></div>
                        <div class="step completed">
                            <div class="step-circle">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="step-label">Shopping Cart</div>
                        </div>
                        <div class="step active">
                            <div class="step-circle">2</div>
                            <div class="step-label">Checkout</div>
                        </div>
                        <div class="step pending">
                            <div class="step-circle">3</div>
                            <div class="step-label">Order Complete</div>
                        </div>
                    </div>
                </div>

                <form id="checkoutForm" method="POST" action="process_order.php">
                    <div class="row g-4">
                        <!-- LEFT: Checkout Form -->
                        <div class="col-lg-8">
                            
                            <!-- Shipping Information -->
                            <div class="section-card">
                                <div class="section-header">
                                    <div class="step-number">1</div>
                                    <h3>Shipping Information</h3>
                                </div>
                                <div class="section-content">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="firstName">First Name *</label>
                                            <input type="text" id="firstName" name="first_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name *</label>
                                            <input type="text" id="lastName" name="last_name" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Email Address *</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone">Phone Number *</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address">Street Address *</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="House number and street name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address2">Apartment, suite, etc. (optional)</label>
                                        <input type="text" id="address2" name="address2" class="form-control">
                                    </div>
                                    
                                    <div class="form-row-3">
                                        <div class="form-group">
                                            <label for="city">City *</label>
                                            <input type="text" id="city" name="city" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="postalCode">Postal Code *</label>
                                            <input type="text" id="postalCode" name="postal_code" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="country">Country *</label>
                                        <select id="country" name="country" class="form-control" required>
                                            <option value="">Select Country</option>
                                            <option value="PK" selected>Pakistan</option>
                                            <option value="IN">India</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="US">United States</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="CA">Canada</option>
                                            <option value="AU">Australia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="section-card">
                                <div class="section-header">
                                    <div class="step-number">2</div>
                                    <h3>Payment Method</h3>
                                </div>
                                <div class="section-content">
                                    <div class="payment-methods">
                                        <div class="payment-option selected" data-method="card">
                                            <div class="payment-option-content">
                                                <div class="payment-radio"></div>
                                                <div class="payment-icon">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>
                                                <div class="payment-details">
                                                    <h4>Credit/Debit Card</h4>
                                                    <p>Pay securely with your card</p>
                                                </div>
                                            </div>
                                            
                                            <div class="card-form active">
                                                <div class="form-group">
                                                    <label for="cardNumber">Card Number *</label>
                                                    <input type="text" id="cardNumber" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19">
                                                    <div class="card-icons">
                                                        <div class="card-icon">VISA</div>
                                                        <div class="card-icon">MC</div>
                                                        <div class="card-icon">AMEX</div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group">
                                                        <label for="expiryDate">Expiry Date *</label>
                                                        <input type="text" id="expiryDate" name="expiry_date" class="form-control" placeholder="MM/YY" maxlength="5">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cvv">CVV *</label>
                                                        <input type="text" id="cvv" name="cvv" class="form-control" placeholder="123" maxlength="4">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cardName">Name on Card *</label>
                                                    <input type="text" id="cardName" name="card_name" class="form-control" placeholder="John Doe">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="payment-option" data-method="cod">
                                            <div class="payment-option-content">
                                                <div class="payment-radio"></div>
                                                <div class="payment-icon">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </div>
                                                <div class="payment-details">
                                                    <h4>Cash on Delivery</h4>
                                                    <p>Pay when your order arrives</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="payment-option" data-method="bank">
                                            <div class="payment-option-content">
                                                <div class="payment-radio"></div>
                                                <div class="payment-icon">
                                                    <i class="fas fa-university"></i>
                                                </div>
                                                <div class="payment-details">
                                                    <h4>Bank Transfer</h4>
                                                    <p>Direct bank account transfer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="security-info">
                                        <i class="fas fa-shield-alt"></i>
                                        <div class="security-text">
                                            <strong>Your payment information is secure.</strong><br>
                                            We use industry-standard encryption to protect your data.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- RIGHT: Order Summary -->
                        <div class="col-lg-4">
                            <div class="section-card">
                                <div class="section-header">
                                    <i class="fas fa-receipt"></i>
                                    <h3>Order Summary</h3>
                                </div>
                                
                                <div class="section-content">
                                    <div class="order-items">
                                        <?php
                                        // Reset the result pointer
                                        mysqli_data_seek($sql, 0);
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            $item_total = (float)$data['product_price'] * (int)$data['quantity'];
                                            $subtotal += $item_total;
                                            ?>
                                            <div class="order-item">
                                                <img src="<?php echo $data['product_image'] ?>" alt="<?php echo $data['product_name'] ?>" class="item-image">
                                                <div class="item-details">
                                                    <div class="item-name"><?php echo $data['product_name'] ?></div>
                                                    <div class="item-meta">Qty: <?php echo $data['quantity'] ?></div>
                                                </div>
                                                <div class="item-price">Rs. <?php echo number_format($item_total, 2) ?></div>
                                            </div>
                                            <?php
                                        }

                                        $discount = 50.00;
                                        $shipping = 150;
                                        $Total = $subtotal - $discount + $shipping;
                                        ?>
                                    </div>
                                    
                                    <div class="summary-totals">
                                        <div class="summary-row">
                                            <span>Shipping Fee</span>
                                            <span>Rs. <?php echo number_format($shipping, 2); ?></span>
                                        </div>
                                        
                                        <div class="total-row summary-row">
                                            <span>Total Amount</span>
                                            <span class="total-amount">Rs. <?php echo number_format($Total, 2); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Checkout Actions -->
                    <div class="checkout-actions">
                        <a href="cart.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Cart
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-lock"></i> Complete Order
                        </button>
                    </div>
                </form>
                
                <?php
            } else {
                ?>
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Your cart is empty</h4>
                    <p>Add some items to your cart before proceeding to checkout</p>
                    <a href='../pages/index.php' class='btn btn-primary'>
                        <i class="fas fa-shopping-bag"></i> Start Shopping
                    </a>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-user-lock"></i>
                </div>
                <h4>Please log in to checkout</h4>
                <p>Sign in to complete your purchase</p>
                <a href='../auth/login.php' class='btn btn-primary'>
                    <i class="fas fa-sign-in-alt"></i> Login Now
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Payment method selection
    const paymentOptions = document.querySelectorAll('.payment-option');
    const cardForm = document.querySelector('.card-form');
    
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options
            paymentOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
            
            // Show/hide card form based on selection
            if (this.dataset.method === 'card') {
                cardForm.classList.add('active');
                cardForm.style.display = 'block';
            } else {
                cardForm.classList.remove('active');
                cardForm.style.display = 'none';
            }
        });
    });
    
    // Card number formatting
    const cardNumberInput = document.getElementById('cardNumber');
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedInputValue = value.match(/.{1,4}/g)?.join(' ') || '';
            if (formattedInputValue.length > 19) {
                formattedInputValue = formattedInputValue.substr(0, 19);
            }
            e.target.value = formattedInputValue;
        });
    }
    
    // Expiry date formatting
    const expiryInput = document.getElementById('expiryDate');
    if (expiryInput) {
        expiryInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });
    }
    
    // CVV formatting
    const cvvInput = document.getElementById('cvv');
    if (cvvInput) {
        cvvInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });
    }
    
    // Form validation
    const checkoutForm = document.getElementById('checkoutForm');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            const selectedPayment = document.querySelector('.payment-option.selected');
            
            if (selectedPayment && selectedPayment.dataset.method === 'card') {
                const cardNumber = document.getElementById('cardNumber').value.replace(/\s/g, '');
                const expiryDate = document.getElementById('expiryDate').value;
                const cvv = document.getElementById('cvv').value;
                const cardName = document.getElementById('cardName').value;
                
                if (!cardNumber || cardNumber.length < 13) {
                    alert('Please enter a valid card number');
                    e.preventDefault();
                    return false;
                }
                
                if (!expiryDate || expiryDate.length !== 5) {
                    alert('Please enter a valid expiry date (MM/YY)');
                    e.preventDefault();
                    return false;
                }
                
                if (!cvv || cvv.length < 3) {
                    alert('Please enter a valid CVV');
                    e.preventDefault();
                    return false;
                }
                
                if (!cardName.trim()) {
                    alert('Please enter the name on card');
                    e.preventDefault();
                    return false;
                }
            }
            
            // Add loading state
            const submitBtn = checkoutForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                submitBtn.disabled = true;
            }
        });
    }
    
    // Auto-fill country based on user location (you can integrate with a geolocation service)
    const countrySelect = document.getElementById('country');
    if (countrySelect && !countrySelect.value) {
        // Default to Pakistan as mentioned in the user location
        countrySelect.value = 'PK';
    }
});

// Smooth scroll to form errors
function scrollToError(element) {
    element.scrollIntoView({ 
        behavior: 'smooth', 
        block: 'center' 
    });
    element.focus();
}

// Add some basic form validation styling
document.addEventListener('DOMContentLoaded', function() {
    const requiredInputs = document.querySelectorAll('input[required], select[required]');
    
    requiredInputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.style.borderColor = 'var(--red-danger)';
            } else {
                this.style.borderColor = 'var(--green-success)';
            }
        });
        
        input.addEventListener('input', function() {
            if (this.value.trim()) {
                this.style.borderColor = 'var(--green-success)';
            }
        });
    });
});
</script>

</body>
</html>
<?php include '../includes/footer.php'?>