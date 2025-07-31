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
            --white-primary: #ffffff;
            --white-off: #fafafa;
            --black-subtle: rgba(0, 0, 0, 0.8);
            --shadow-light: rgba(0, 0, 0, 0.08);
            --shadow-medium: rgba(0, 0, 0, 0.12);
            --green-success: #16a34a;
            --red-danger: #dc2626;
        }

        body {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Subtle black dot texture */
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(0,0,0,0.04) 1px, transparent 0),
                radial-gradient(circle at 15px 15px, rgba(0,0,0,0.02) 1px, transparent 0);
            background-size: 20px 20px, 40px 40px;
        }

        .cart-wrapper {
            padding: 60px 0;
        }

        .page-header {
            background: linear-gradient(135deg, var(--maroon-primary) 0%, var(--maroon-light) 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            /* Black texture overlay */
            background-image: 
                radial-gradient(circle at 2px 2px, rgba(0,0,0,0.1) 1px, transparent 0);
            background-size: 25px 25px;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.05) 50%, transparent 70%);
            pointer-events: none;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            color : black;
        }

        .page-header p {
            color : black;
            font-size: 1.1rem;
            margin: 10px 0 0 0;
            opacity: 0.9;
        }

        .cart-count {
            width: 100%;
            max-width: 170px;
            background: var(--maroon-primary);
            color: white;
            padding: 30px 60px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-left: 12px;
        }

        .product-card {
            background: var(--white-primary);
            border-radius: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid rgba(128, 0, 32, 0.1);
            box-shadow: 0 4px 12px var(--shadow-light);
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--maroon-primary), var(--maroon-light));
        }

        .cart-header {
            background: rgba(128, 0, 32, 0.05);
            font-weight: 600;
            color: var(--maroon-primary);
            border-radius: 12px 12px 0 0;
            margin: -1px -1px 0 -1px;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--shadow-medium);
            border-color: var(--maroon-primary);
        }

        .product-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--black-subtle);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .product-meta {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .stock-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--green-success);
        }

        .delivery-info {
            color: #666;
            font-size: 0.85rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(128, 0, 32, 0.05);
            padding: 8px 16px;
            border-radius: 25px;
            border: 1px solid rgba(128, 0, 32, 0.1);
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
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .quantity-btn:hover {
            background: var(--maroon-light);
            transform: scale(1.1);
            color: white;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: none;
            background: transparent;
            font-weight: 600;
            color: var(--black-subtle);
            font-size: 1rem;
        }

        .price-display {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--maroon-primary);
        }

        .remove-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--red-danger), #ef4444);
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            text-decoration: none;
        }

        .remove-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
            color: white;
        }

        .summary-card {
            background: var(--white-primary);
            border-radius: 20px;
            border: 2px solid rgba(128, 0, 32, 0.1);
            box-shadow: 0 8px 30px var(--shadow-light);
            position: sticky;
            top: 20px;
            overflow: hidden;
            /* Subtle black texture */
            background-image: 
                radial-gradient(circle at 3px 3px, rgba(0,0,0,0.02) 1px, transparent 0);
            background-size: 30px 30px;
        }

        .summary-header {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
            color: white;
            padding: 20px;
            margin: -1px -1px 20px -1px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .summary-row {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 15px;
            padding: 0 20px;
        }

        .summary-row span:first-child {
            color: #666;
        }

        .summary-row span:last-child {
            font-weight: 600;
            color: var(--black-subtle);
        }

        .discount-amount {
            color: var(--green-success) !important;
        }

        .total-row {
            background: rgba(128, 0, 32, 0.05);
            margin: 20px -1px -1px -1px;
            padding: 20px;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .total-amount {
            color: var(--maroon-primary) !important;
        }

        .checkout-btn {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
            border: none;
            padding: 18px 0;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            color: var(--maroon-primary);
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(128, 0, 32, 0.3);
            margin: 20px 0;
            /* Black texture */
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(0,0,0,0.1) 1px, transparent 0);
            background-size: 20px 20px;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.4);
            background: red;
            color: white;
        }

        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: black;
            font-size: 0.9rem;
            padding: 0 20px 20px;
        }

        .empty-state {
            background: var(--white-primary);
            border-radius: 20px;
            padding: 60px 40px;
            text-align: center;
            border: 2px solid rgba(128, 0, 32, 0.1);
            box-shadow: 0 8px 30px var(--shadow-light);
            /* Subtle black texture */
            background-image: 
                radial-gradient(circle at 3px 3px, rgba(0,0,0,0.02) 1px, transparent 0);
            background-size: 30px 30px;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--maroon-primary);
            margin-bottom: 25px;
            opacity: 0.8;
        }

        .empty-state h4 {
            color: var(--black-subtle);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
            border: none;
            padding: 15px 35px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
            color: white;
        }

        .warning-btn {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            border: none;
            padding: 15px 35px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .warning-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header {
                padding: 30px 20px;
                margin: 0 15px 30px;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .product-card {
                margin: 0 15px 20px;
            }
            
            .product-image {
                width: 100px;
                height: 100px;
            }
            
            .quantity-controls {
                gap: 8px;
                padding: 6px 12px;
            }
            
            .summary-card {
                position: relative;
                margin: 30px 15px 0;
            }
            
            .empty-state {
                margin: 0 15px;
                padding: 40px 20px;
            }

            .cart-header {
                font-size: 0.8rem;
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
                                        <p class="delivery-info">Delivery in 3-5 business days</p>
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