<?php 
session_start();
if(!(isset($_SESSION['user_id']))){
$acc_title="Account";
}else{
$user_id=$_SESSION['user_id'];
include('../includes/connection.php');
$acc_query= "select * from user_acc where id='$user_id'";
$acc_sql=mysqli_query($conn,$acc_query);
$acc_data=mysqli_fetch_assoc($acc_sql);
$acc_title=$acc_data['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina - Jewelry & Cosmetics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            color: #2c2c2c;
            background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 50%, #ffffff 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            box-shadow: 0 4px 20px rgba(128, 0, 32, 0.15);
            position: sticky;
            top: 0;
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            z-index: 1000;
            border-bottom: 2px solid rgba(128, 0, 32, 0.2);
            transition: transform 0.3s ease;
        }

        .main-header {
            padding: 15px 0;
        }

        .main-header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #2c2c2c;
            font-weight: bold;
            font-size: 32px;
            transition: all 0.3s ease;
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.2);
            flex-shrink: 0;
        }

        .logo:hover {
            color: #800020;
            transform: scale(1.05);
            text-shadow: 0 0 15px rgba(128, 0, 32, 0.4);
        }

        .logo-icon {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #ffffff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
            transition: all 0.3s ease;
        }

        .logo:hover .logo-icon {
            box-shadow: 0 6px 20px rgba(128, 0, 32, 0.5);
            transform: rotate(360deg);
        }

        /* Search Bar */
        .search-bar {
            flex: 1;
            max-width: 500px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 15px 60px 15px 25px;
            border: 2px solid rgba(128, 0, 32, 0.2);
            border-radius: 30px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
            background: #ffffff;
            color: #2c2c2c;
        }

        .search-input::placeholder {
            color: rgba(44, 44, 44, 0.6);
        }

        .search-input:focus {
            border-color: #800020;
            box-shadow: 0 0 15px rgba(128, 0, 32, 0.2);
            transform: translateY(-2px);
        }

        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #ffffff;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(128, 0, 32, 0.3);
        }

        .search-btn:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 15px rgba(128, 0, 32, 0.4);
        }

        /* Header Actions */
        .header-actions {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-shrink: 0;
        }

        .action-btn {
            background: #ffffff;
            border: 2px solid rgba(128, 0, 32, 0.2);
            font-size: 18px;
            color: #2c2c2c;
            cursor: pointer;
            padding: 12px;
            border-radius: 50%;
            position: relative;
            transition: all 0.3s ease;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .action-btn:hover {
            background: rgba(128, 0, 32, 0.1);
            border-color: #800020;
            color: #800020;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(128, 0, 32, 0.2);
        }

        .action-btn .text-white {
            color: inherit !important;
            text-decoration: none;
        }

        .action-btn:hover .text-white {
            color: #800020 !important;
        }

        /* Auth Buttons */
        .auth-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-shrink: 0;
        }

        .auth-btn {
            background: #ffffff;
            border: 2px solid rgba(128, 0, 32, 0.2);
            color: #2c2c2c;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .auth-btn:hover {
            background: rgba(128, 0, 32, 0.1);
            border-color: #800020;
            color: #800020;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(128, 0, 32, 0.2);
            text-decoration: none;
        }

        .signup-btn {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #ffffff;
            border-color: #800020;
        }

        .signup-btn:hover {
            background: linear-gradient(135deg, #a0002a 0%, #800020 100%);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(128, 0, 32, 0.4);
        }

        /* Navigation */
        .navbar {
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
            border-bottom: 1px solid rgba(128, 0, 32, 0.2);
            position: relative;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 60px;
        }

        .mobile-menu-btn {
            display: none;
            background: rgba(128, 0, 32, 0.1);
            border: 2px solid rgba(128, 0, 32, 0.2);
            font-size: 20px;
            cursor: pointer;
            color: #800020;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            z-index: 1002;
            width: 44px;
            height: 44px;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-btn:hover {
            background: rgba(128, 0, 32, 0.2);
            border-color: #800020;
            transform: scale(1.05);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            justify-content: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: block;
            padding: 18px 20px;
            text-decoration: none;
            color: #2c2c2c;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            white-space: nowrap;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #800020, #a0002a);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover {
            color: #800020;
            background: rgba(128, 0, 32, 0.05);
        }

        .nav-link:hover::before {
            width: 80%;
        }

        /* Dropdown */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 220px;
            box-shadow: 0 10px 25px rgba(128, 0, 32, 0.2);
            border-radius: 12px;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-15px);
            transition: all 0.4s ease;
            z-index: 1000;
            border: 1px solid rgba(128, 0, 32, 0.2);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-link {
            display: block;
            padding: 15px 25px;
            text-decoration: none;
            color: #2c2c2c;
            border-bottom: 1px solid rgba(128, 0, 32, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .dropdown-link:hover {
            background: rgba(128, 0, 32, 0.1);
            color: #800020;
            padding-left: 35px;
        }

        .dropdown-link:last-child {
            border-bottom: none;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
            color: #2c2c2c;
            margin-top: auto;
            border-top: 2px solid rgba(128, 0, 32, 0.2);
            position: relative;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
        }

        .footer-content {
            padding: 60px 0 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
        }

        .cta-section {
            background: rgba(128, 0, 32, 0.1);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 2px solid rgba(128, 0, 32, 0.2);
        }

        .cta-text h2 {
            font-size: 32px;
            margin: 0 0 8px 0;
            color: #800020;
        }

        .cta-text h3 {
            font-size: 18px;
            margin: 0;
            color: #2c2c2c;
            font-weight: 300;
        }

        .btn-cta {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #ffffff;
            padding: 18px 35px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(128, 0, 32, 0.3);
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.4);
            color: #ffffff;
            text-decoration: none;
        }

        .footer-links {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr 2fr;
            gap: 50px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 25px;
            color: #800020;
            font-weight: 600;
        }

        .footer-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-list li {
            margin-bottom: 12px;
        }

        .footer-list a {
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .footer-list a:hover {
            color: #800020;
            padding-left: 8px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
            color: #2c2c2c;
        }

        .footer-description {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(128, 0, 32, 0.1);
            border: 2px solid rgba(128, 0, 32, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2c2c;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-links a:hover {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(128, 0, 32, 0.3);
        }

        .newsletter-form {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid rgba(128, 0, 32, 0.2);
            border-radius: 25px;
            background: #ffffff;
            color: #2c2c2c;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .newsletter-form input:focus {
            border-color: #800020;
            box-shadow: 0 0 10px rgba(128, 0, 32, 0.2);
        }

        .newsletter-form button {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            border: none;
            color: #ffffff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .newsletter-form button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(128, 0, 32, 0.4);
        }

        .footer-bottom {
            border-top: 1px solid rgba(128, 0, 32, 0.2);
            padding: 25px 0;
            text-align: center;
            background: rgba(128, 0, 32, 0.02);
        }

        .copyright {
            color: #666;
            margin: 0;
            font-size: 14px;
        }

        /* Mobile Responsive */
        @media (max-width: 992px) {
            .main-header .container {
                flex-wrap: wrap;
                gap: 15px;
            }
            
            .search-bar {
                order: 3;
                width: 100%;
                max-width: none;
            }
            
            .nav-link {
                padding: 15px 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            .main-header {
                padding: 15px 0;
            }
            
            .logo {
                font-size: 28px;
            }
            
            .logo-icon {
                width: 45px;
                height: 45px;
                font-size: 20px;
            }
            
            .action-btn {
                width: 44px;
                height: 44px;
                font-size: 16px;
            }

            .auth-btn {
                padding: 8px 16px;
                font-size: 13px;
            }
            
            .mobile-menu-btn {
                display: flex;
                justify-content: center;
            }

            .nav-container {
                display: flex;
                justify-content: flex-end;
                margin-left: 1rem;
            }

            .nav-menu {
                position: fixed;
                top: 200px;
                left: 0;
                right: 0;
                background: #ffffff;
                flex-direction: column;
                box-shadow: 0 10px 25px rgba(128, 0, 32, 0.2);
                opacity: 0;
                visibility: hidden;
                transform: translateY(-20px);
                transition: all 0.3s ease;
                border: 1px solid rgba(128, 0, 32, 0.2);
                border-top: none;
                max-height: calc(100vh - 150px);
                overflow-y: auto;
                z-index: 1000;
            }

            .nav-menu.active {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .nav-item {
                border-bottom: 1px solid rgba(128, 0, 32, 0.1);
                width: 100%;
            }
            
            .nav-link {
                padding: 18px 25px;
                font-size: 16px;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .nav-link::after {
                content: '';
                font-family: 'Font Awesome 6 Free';
                font-weight: 900;
                font-size: 14px;
                color: #800020;
                transition: transform 0.3s ease;
            }

            .nav-item:has(.dropdown) .nav-link::after {
                content: '\f107';
            }

            .nav-item.active .nav-link::after {
                transform: rotate(180deg);
            }

            .dropdown {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                background: rgba(128, 0, 32, 0.05);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s ease;
                border: none;
                border-radius: 0;
            }

            .nav-item.active .dropdown {
                max-height: 300px;
            }

            .dropdown-link {
                padding: 15px 45px;
                font-size: 15px;
                border-bottom: 1px solid rgba(128, 0, 32, 0.05);
            }

            .cta-section {
                flex-direction: column;
                text-align: center;
                gap: 25px;
                padding: 30px 25px;
            }

            .footer-links {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }

            .social-column {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 576px) {
            .logo {
                font-size: 24px;
            }
            
            .search-input {
                padding: 12px 45px 12px 20px;
                font-size: 14px;
            }

            .search-btn {
                width: 40px;
                height: 40px;
                right: 6px;
            }
            
            .action-btn {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }

            .auth-btn {
                padding: 6px 12px;
                font-size: 12px;
            }
            
            .nav-link {
                padding: 16px 20px;
                font-size: 15px;
            }
            
            .cta-section {
                padding: 25px 20px;
            }
            
            .cta-text h2 {
                font-size: 24px;
            }
            
            .footer-links {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .newsletter-form {
                flex-direction: column;
                gap: 10px;
            }
            
            .newsletter-form button {
                width: 100%;
                height: 45px;
                border-radius: 22px;
            }
        }

        /* Focus styles for accessibility */
        .search-input:focus,
        .auth-btn:focus,
        .action-btn:focus,
        .nav-link:focus {
            outline: 2px solid rgba(128, 0, 32, 0.5);
            outline-offset: 2px;
        }

        /* Smooth animations */
        .nav-item:hover .dropdown {
            animation: fadeInUp 0.4s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Loading animation */
        .btn-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 18px;
            height: 18px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Cart count badge */
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(128, 0, 32, 0.4);
        }
</style>


</head>

<body>
    <header class="header">
        <div class="main-header">
            <div class="container">
                <a href="#" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <span>LUMINA</span>
                </a>

                <div class="search-bar">
                    <form action="../pages/search.php" style="display:flex;" method="get">
                        <input type="text" class="search-input" placeholder="Search Products..." name="search">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <?php if(!(isset($_SESSION['login_success']))){ ?>
                    <div class="auth-buttons">
                        <a href="../auth/login.php" class="auth-btn login-btn">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </a>
                        <a href="../auth/signup.php" class="auth-btn signup-btn">
                            <i class="fas fa-user-plus"></i>
                            Sign Up
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="auth-buttons">
                        <a href="../auth/logout.php" class="auth-btn login-btn">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </a>
                    </div>
                <?php } ?>

                <div class="header-actions">
                    <button class="action-btn" title="Wishlist">
                        <a href="../wishlist/wishlist.php" class="text-white">   
                            <i class="fas fa-heart"></i>
                        </a>
                    </button>
                    <button class="action-btn" title="<?php echo $acc_title ?>">
                        <i class="fas fa-user"></i>
                    </button>
                    <button class="action-btn" title="Shopping Cart">
                        <a href="../cart/cart.php" class="text-white">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>

        <nav class="navbar">
    <div class="nav-container">
        <!-- Add ID to the mobile menu button -->
        <button class="mobile-menu-btn" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="../pages/index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                        <a href="../products/products.php?category=Jewellery" class="nav-link">Jewellery</a>
                        <div class="dropdown">
                            <a href="../products/products.php?category=Jewellery&subcategory=Necklaces" class="dropdown-link">Necklaces</a>
                            <a href="../products/products.php?category=Jewellery&subcategory=Earrings" class="dropdown-link">Earrings</a>
                            <a href="../products/products.php?category=Jewellery&subcategory=Rings" class="dropdown-link">Rings</a>
                            <a href="../products/products.php?category=Jewellery&subcategory=Bracelets" class="dropdown-link">Bracelets</a>
                        </div>
                    </li>

            <li class="nav-item">
                        <a href="../products/products.php?category=Cosmetics" class="nav-link">Cosmetics</a>
                        <div class="dropdown">
                            <a href="../products/products.php?category=Cosmetics&subcategory=Foundation" class="dropdown-link">Foundation</a>
                            <a href="../products/products.php?category=Cosmetics&subcategory=Lipstick" class="dropdown-link">Lipstick</a>
                            <a href="../products/products.php?category=Cosmetics&subcategory=Eyeshadow" class="dropdown-link">Eyeshadow</a>
                            <a href="../products/products.php?category=Cosmetics&subcategory=Skincare" class="dropdown-link">Skincare</a>
                            
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="../products/products.php?category=Beauty Tools" class="nav-link">Beauty Tools</a>
                        <div class="dropdown">
                            <a href="../products/products.php?category=Beauty Tools&subcategory=Brushes" class="dropdown-link">Brushes</a>
                            <a href="../products/products.php?category=Beauty Tools&subcategory=Mirrors" class="dropdown-link">Mirrors</a>
                            <a href="../products/products.php?category=Beauty Tools&subcategory=Accessories" class="dropdown-link">Accessories</a>
                        </div>
                    </li>

            <li class="nav-item">
                <a href="../pages/sale.php" class="nav-link">Sale</a>
            </li>
            <li class="nav-item">
                <a href="../pages/about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="../pages/contact.php" class="nav-link">Contact</a>
            </li>
        </ul>
    </div>
</nav>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FIXED: Use querySelector instead of getElementById, and add id to HTML button
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const navMenu = document.querySelector('.nav-menu');
            const navItems = document.querySelectorAll('.nav-item');
            const body = document.body;
            
            // Mobile menu toggle with improved functionality
            if (mobileMenuBtn && navMenu) {
                mobileMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    console.log('Mobile menu button clicked'); // Debug log
                    
                    navMenu.classList.toggle('active');
                    const icon = this.querySelector('i');
                    
                    if (navMenu.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                        body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                        body.style.overflow = ''; // Restore scrolling
                    }
                });
            }

            // Mobile dropdown toggle
            navItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                const dropdown = item.querySelector('.dropdown');
                
                if (dropdown && link) {
                    link.addEventListener('click', function(e) {
                        if (window.innerWidth <= 768) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            // Toggle current dropdown
                            item.classList.toggle('active');
                            
                            // Close other dropdowns
                            navItems.forEach(otherItem => {
                                if (otherItem !== item && otherItem.classList.contains('active')) {
                                    otherItem.classList.remove('active');
                                }
                            });
                        }
                    });
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (navMenu && navMenu.classList.contains('active')) {
                    if (!e.target.closest('.navbar')) {
                        navMenu.classList.remove('active');
                        if (mobileMenuBtn) {
                            const icon = mobileMenuBtn.querySelector('i');
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                        body.style.overflow = '';
                        
                        // Close all dropdowns
                        navItems.forEach(item => {
                            item.classList.remove('active');
                        });
                    }
                }
            });

            // Close mobile menu on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    if (navMenu && navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                        if (mobileMenuBtn) {
                            const icon = mobileMenuBtn.querySelector('i');
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                        body.style.overflow = '';
                    }
                    
                    // Remove active class from all nav items
                    navItems.forEach(item => {
                        item.classList.remove('active');
                    });
                }
            });

            // Prevent menu from closing when clicking inside it
            if (navMenu) {
                navMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }

            // Newsletter form
            const newsletterForm = document.querySelector('.newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const email = this.querySelector('input[type="email"]').value;
                    const button = this.querySelector('button');
                    
                    if (email) {
                        button.classList.add('btn-loading');
                        setTimeout(() => {
                            button.classList.remove('btn-loading');
                            alert('Thank you for subscribing!');
                            this.reset();
                        }, 1500);
                    }
                });
            }

            // Header scroll effect with improved performance
            let ticking = false;
            function updateHeader() {
                const currentScroll = window.pageYOffset;
                const header = document.querySelector('.header');
                
                if (currentScroll > 100) {
                    if (currentScroll > (updateHeader.lastScroll || 0)) {
                        header.style.transform = 'translateY(-100%)';
                    } else {
                        header.style.transform = 'translateY(0)';
                    }
                } else {
                    header.style.transform = 'translateY(0)';
                }
                
                updateHeader.lastScroll = currentScroll;
                ticking = false;
            }

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(updateHeader);
                    ticking = true;
                }
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Debug: Log when DOM is ready
            console.log('DOM loaded, mobile menu setup complete');
        });
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>