<?php include '../includes/header.php' ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Shopping Cart</title>
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
            --gray-500: #6b7280;
            --gray-700: #374151;
            --gray-900: #111827;
            --black-subtle: rgba(0, 0, 0, 0.85);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --green-success: #059669;
            --red-danger: #dc2626;
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

        .cart-wrapper {
            padding: 2.5rem 0 4rem;
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

        .cart-count {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 2rem 2rem;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Product Cards */
        .products-section {
            margin-bottom: 2rem;
        }

        .cart-header-card {
            background: var(--white-primary);
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            margin-bottom: 1rem;
        }

        .cart-header {
            background: var(--gray-50);
            font-weight: 600;
            color: var(--gray-700);
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
            border-bottom: 1px solid var(--gray-200);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .product-card {
            background: var(--white-primary);
            border-radius: var(--border-radius-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            margin-bottom: 1rem;
            overflow: hidden;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            border-color: var(--maroon-primary);
        }

        .product-card-content {
            padding: 1.5rem;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: var(--border-radius-md);
            border: 1px solid var(--gray-200);
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.02);
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .product-meta {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .delivery-info {
            color: var(--gray-500);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stock-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--green-success);
        }

        /* Quantity Controls */
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--gray-50);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            border: 1px solid var(--gray-200);
            width: fit-content;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: var(--maroon-primary);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .quantity-btn:hover {
            background: var(--maroon-light);
            transform: scale(1.05);
            color: white;
        }

        .quantity-btn:active {
            transform: scale(0.95);
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: none;
            background: transparent;
            font-weight: 600;
            color: var(--gray-900);
            font-size: 1rem;
        }

        .price-display {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--maroon-primary);
            text-align: right;
        }

        .remove-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--red-danger);
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .remove-btn:hover {
            background: #b91c1c;
            transform: scale(1.05);
            color: white;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        /* Summary Card */
        .summary-section {
            position: sticky;
            top: 2rem;
        }

        .summary-card {
            background: var(--white-primary);
            border-radius: var(--border-radius-xl);
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .summary-header {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
            color: white;
            padding: 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .summary-content {
            padding: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.95rem;
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

        .summary-divider {
            height: 1px;
            background: var(--gray-200);
            margin: 1.5rem 0;
        }

        .total-row {
            background: var(--maroon-ultra-light);
            margin: 0 -1.5rem;
            padding: 1.5rem;
            font-size: 1.125rem;
            font-weight: 700;
            border-top: 1px solid var(--gray-200);
        }

        .total-amount {
            color: var(--maroon-primary) !important;
            font-size: 1.25rem;
        }

        .checkout-btn {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
            border: none;
            padding: 1rem 0;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
            margin: 1.5rem 0 1rem;
            cursor: pointer;
        }

        .checkout-btn a{
            text-decoration: none;
            color: white;
            
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--maroon-light), var(--maroon-primary));
        }

        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: var(--gray-600);
            font-size: 0.875rem;
            padding-bottom: 0.5rem;
        }

        /* Empty State */
        .empty-state {
            background: var(--white-primary);
            border-radius: var(--border-radius-xl);
            padding: 4rem 2rem;
            text-align: center;
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-lg);
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--maroon-primary);
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .empty-state h4 {
            color: var(--gray-900);
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--gray-600);
            font-size: 1.125rem;
            margin-bottom: 2rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .primary-btn, .warning-btn {
            border: none;
            padding: 0.875rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .warning-btn {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
        }

        .warning-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .summary-section {
                position: relative;
                top: 0;
                margin-top: 2rem;
            }
        }

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
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .cart-count {
                margin-left: 0;
            }
            
            .product-card-content {
                padding: 1rem;
            }
            
            .product-image {
                width: 80px;
                height: 80px;
            }
            
            .cart-header {
                font-size: 0.75rem;
                padding: 0.75rem 1rem;
            }

            .cart-header .row > div {
                font-size: 0.75rem;
            }

            .price-display {
                font-size: 1.125rem;
                text-align: left;
                margin-top: 0.5rem;
            }

            .quantity-controls {
                margin: 0.75rem 0;
            }
            
            .empty-state {
                padding: 2.5rem 1.5rem;
            }

            .empty-state h4 {
                font-size: 1.5rem;
            }

            .summary-content {
                padding: 1rem;
            }

            .total-row {
                margin: 0 -1rem;
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.75rem;
            }

            .product-name {
                font-size: 1rem;
            }

            .cart-header .row > div:nth-child(n+4) {
                display: none;
            }
        }

        /* Animation for page load */
        .product-card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Loading states */
        .loading-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            background-size: 200px 100%;
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: 200px 0; }
        }
    </style>
</head>
<body>

<div class="cart-wrapper">
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
                        <div class="container">
                            <h1><i class="fas fa-shopping-cart"></i> Shopping Cart<span class="cart-count">' . $total . ' items</span></h1>
                            <p>Review your selected items and proceed to checkout</p>
                        </div>
                      </div>';
                ?>
                
                <div class="row g-4">
                    <!-- LEFT: Product list -->
                    <div class="col-lg-8">
                        <!-- Header Row -->
                        <div class="product-card p-3 mb-3">
                            <div class="cart-header p-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">Product</div>
                                    <div class="col-md-4">Details</div>
                                    <div class="col-md-3 text-center">Quantity</div>
                                    <div class="col-md-2 text-center">Price</div>
                                    <div class="col-md-1 text-center">Remove</div>
                                </div>
                            </div>
                        </div>

                        <?php
                        while ($data = mysqli_fetch_assoc($sql)) {
                            $item_total = (float)$data['product_price'] * (int)$data['quantity'];
                            $subtotal += $item_total;
                            ?>
                            <div class='product-card p-4'>
                                <div class='row align-items-center'>
                                    <div class='col-lg-2 col-md-3 mb-3 mb-md-0'>
                                        <img src="<?php echo $data['product_image'] ?>" alt='<?php echo $data['product_name'] ?>' class='product-image'>
                                    </div>
                                    <div class='col-lg-4 col-md-5 mb-3 mb-md-0'>
                                        <h6 class='product-name'><?php echo $data['product_name'] ?></h6>
                                        <p class="delivery-info"><?php
                                        if($data['product_name']=="Customized jewellery"){
                                            echo"Delivery in 7-14 business days";
                                        }else{
                                            echo"Delivery in 3-5 business days";
                                        }
                                        ?></p>
                                        <div class="stock-status">
                                            <i class="fas fa-check-circle"></i>
                                            <span>In Stock</span>
                                        </div>
                                    </div>
                                    <div class='col-lg-3 col-md-2 mb-3 mb-md-0'>
                                        <div class='quantity-controls'>
                                            <a href="minusone.php?item=<?php echo $data['item'] ?>" class='quantity-btn'>
                                                <i class="fas fa-minus"></i>
                                            </a>
                                            <input type='text' class='quantity-input' value="<?php echo $data['quantity'] ?>" readonly>
                                            <a href="addone.php?item=<?php echo $data['item'] ?>" class='quantity-btn'>
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='col-lg-2 col-md-1 mb-3 mb-md-0'>
                                        <div class='price-display'>Rs. <?php echo number_format($data['product_price']); ?></div>
                                    </div>
                                    <div class='col-lg-1 col-md-1'>
                                        <a href="remove.php?item=<?php echo $data['item'] ?>" class="remove-btn" onclick="return confirm('Are you sure you want to remove this item from your cart?')" title="Remove from cart">
                                            <i class='fas fa-trash-alt'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        $discount = 50.00;
                        $shipping = 150;
                        $Total = $subtotal - $discount + $shipping;
                        ?>
                    </div>

                    <!-- RIGHT: Summary Section -->
                    <div class='col-lg-4'>
                        <div class='summary-card'>
                            <div class='summary-header'>
                                <i class="fas fa-receipt"></i> Order Summary
                            </div>
                            
                            <div class='summary-row'>
                                <span>Subtotal (<?php echo $total; ?> items)</span>
                                <span>Rs. <?php echo number_format($subtotal, 2); ?></span>
                            </div>
                            
                            <div class='summary-row'>
                                <span>Discount</span>
                                <span class='discount-amount'>-Rs. <?php echo number_format($discount, 2); ?></span>
                            </div>
                            
                            <div class='summary-row'>
                                <span>Shipping Fee</span>
                                <span>Rs. <?php echo number_format($shipping, 2); ?></span>
                            </div>
                            
                            <div class='total-row summary-row'>
                                <span>Total Amount</span>
                                <span class='total-amount'>Rs. <?php echo number_format($Total, 2); ?></span>
                            </div>
                            
                            <button class='checkout-btn'>
                                <i class="fas fa-credit-card"></i> Proceed to Checkout
                            </button>
                            
                            <div class='security-badge'>
                                <i class='fas fa-shield-alt'></i>
                                <span>100% Secure Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
            } else {
                ?>
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Your cart is empty</h4>
                    <p>Looks like you haven't added anything to your cart yet. Start shopping to fill it up!</p>
                    <a href='../pages/index.php' class='primary-btn'>
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
                <h4>Please log in to view your cart</h4>
                <p>Sign in to access your shopping cart and saved items</p>
                <a href='../auth/login.php' class='warning-btn'>
                    <i class="fas fa-sign-in-alt"></i> Login Now
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</div>

</body>
</html>
<?php include '../includes/footer.php'?>