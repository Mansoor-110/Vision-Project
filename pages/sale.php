<?php
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>Ruby - Exclusive Sale | Jewelry & Cosmetics</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Georgia', serif;
    background: linear-gradient(135deg, #ffffff 0%, #f8f4f4 100%);
    color: #2c1810;
    overflow-x: hidden;
    min-height: 100vh;
    position: relative;
}

/* Subtle black texture overlay */
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(0, 0, 0, 0.02) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 0, 0, 0.02) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(0, 0, 0, 0.02) 0%, transparent 50%);
    pointer-events: none;
    z-index: 1;
}

/* Floating Particles System */
.particle {
    position: fixed;
    width: 4px;
    height: 4px;
    background: #8b1538;
    border-radius: 50%;
    pointer-events: none;
    opacity: 0;
    z-index: 1000;
    animation: sparkle 2s ease-in-out infinite;
}

@keyframes sparkle {
    0% { opacity: 0; transform: scale(0); }
    50% { opacity: 1; transform: scale(1); }
    100% { opacity: 0; transform: scale(0); }
}

/* Sale Hero Section */
.sale-hero {
    padding: 80px 20px;
    text-align: center;
    position: relative;
    background: 
        radial-gradient(circle at center, rgba(139, 21, 56, 0.08) 0%, transparent 70%),
        linear-gradient(45deg, #ffffff 0%, #f9f5f5 100%);
    overflow: hidden;
    z-index: 2;
}

.sale-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(139, 21, 56, 0.05) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.sale-badge {
    display: inline-block;
    background: linear-gradient(45deg, #8b1538, #a91d42);
    color: #ffffff;
    padding: 10px 30px;
    border-radius: 50px;
    font-weight: bold;
    font-size: 1.1rem;
    margin-bottom: 20px;
    letter-spacing: 1px;
    animation: pulse 2s ease-in-out infinite;
    position: relative;
    z-index: 10;
    box-shadow: 0 4px 15px rgba(139, 21, 56, 0.3);
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.sale-hero h1 {
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 300;
    letter-spacing: 3px;
    margin-bottom: 20px;
    background: linear-gradient(45deg, #8b1538, #a91d42, #2c1810);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: titleFloat 3s ease-in-out infinite;
    position: relative;
    z-index: 10;
    text-shadow: 0 2px 4px rgba(139, 21, 56, 0.1);
}

@keyframes titleFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.sale-hero p {
    font-size: 1.3rem;
    opacity: 0.8;
    max-width: 700px;
    margin: 0 auto 40px;
    line-height: 1.6;
    position: relative;
    z-index: 10;
    color: #2c1810;
}

.countdown-timer {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 2px solid #8b1538;
    border-radius: 15px;
    padding: 20px;
    margin: 40px auto;
    max-width: 600px;
    position: relative;
    z-index: 10;
    box-shadow: 0 8px 25px rgba(139, 21, 56, 0.15);
}

.countdown-title {
    font-size: 1.2rem;
    color: #8b1538;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.countdown-display {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.countdown-item {
    text-align: center;
    min-width: 80px;
}

.countdown-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #8b1538;
    display: block;
    text-shadow: 0 0 10px rgba(139, 21, 56, 0.3);
}

.countdown-label {
    font-size: 0.9rem;
    color: rgba(44, 24, 16, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Sale Banner */
.sale-banner {
    background: linear-gradient(135deg, #8b1538, #a91d42);
    color: #ffffff;
    text-align: center;
    padding: 15px;
    font-weight: bold;
    font-size: 1.1rem;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
    z-index: 2;
}

.sale-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    animation: shine 3s ease-in-out infinite;
}

@keyframes shine {
    0% { left: -100%; }
    100% { left: 100%; }
}

.ta-button {
    display: inline-block;
    padding: 15px 40px;
    background: transparent;
    border: 2px solid #8b1538;
    color: #8b1538;
    text-decoration: none;
    font-size: 1.1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    z-index: 10;
    border-radius: 5px;
}

.ta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: #8b1538;
    transition: left 0.3s ease;
    z-index: -1;
}

.ta-button:hover::before {
    left: 0;
}

.ta-button:hover {
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(139, 21, 56, 0.3);
}

/* Products Section */
.products {
    padding: 80px 20px;
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 60px;
    color: #8b1538;
    font-weight: 300;
    letter-spacing: 2px;
}

.filter-tabs {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.filter-tab {
    padding: 12px 30px;
    background: transparent;
    border: 1px solid rgba(139, 21, 56, 0.3);
    color: rgba(44, 24, 16, 0.7);
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1rem;
    letter-spacing: 1px;
    border-radius: 25px;
}

.filter-tab:hover,
.filter-tab.active {
    background: rgba(139, 21, 56, 0.1);
    color: #8b1538;
    border-color: #8b1538;
    transform: translateY(-2px);
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.product-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(139, 21, 56, 0.1);
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.product-card::before {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(139, 21, 56, 0.05), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover::before {
    opacity: 1;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(139, 21, 56, 0.2);
    border-color: #8b1538;
}

.sale-badge-card {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(45deg, #8b1538, #a91d42);
    color: #ffffff;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: bold;
    font-size: 0.9rem;
    z-index: 10;
    animation: pulse 2s ease-in-out infinite;
}

.card-image {
    width: 100%;
    height: 250px;
    background: 
        linear-gradient(135deg, #f5f1f1, #e8e0e0),
        radial-gradient(circle at 30% 70%, rgba(0, 0, 0, 0.05) 0%, transparent 50%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #8b1538;
    text-shadow: 0 0 15px rgba(139, 21, 56, 0.3);
}

.card-image::after {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(139, 21, 56, 0.08), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .card-image::after {
    opacity: 1;
}

.card-content {
    padding: 25px;
    background: rgba(255, 255, 255, 0.98);
}

.card-title {
    font-size: 1.4rem;
    margin-bottom: 10px;
    color: #2c1810;
    font-weight: 400;
}

.card-description {
    color: rgba(44, 24, 16, 0.7);
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 0.95rem;
}

.price-section {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.original-price {
    font-size: 1.1rem;
    color: rgba(44, 24, 16, 0.5);
    text-decoration: line-through;
}

.sale-price {
    font-size: 1.4rem;
    color: #8b1538;
    font-weight: 600;
}

.discount-percent {
    background: linear-gradient(45deg, #8b1538, #a91d42);
    color: #ffffff;
    padding: 4px 8px;
    border-radius: 10px;
    font-size: 0.8rem;
    font-weight: bold;
}

.view-btn {
    display: inline-block;
    padding: 10px 25px;
    background: transparent;
    border: 1px solid rgba(139, 21, 56, 0.5);
    color: #8b1538;
    text-decoration: none;
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 10px;
}

.view-btn:hover {
    background: #8b1538;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(139, 21, 56, 0.3);
}

.add-to-cart-btn {
    display: inline-block;
    padding: 10px 25px;
    background: linear-gradient(45deg, #8b1538, #a91d42);
    color: #ffffff;
    text-decoration: none;
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 5px;
    border: none;
    font-weight: bold;
}

.add-to-cart-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(139, 21, 56, 0.4);
    background: linear-gradient(45deg, #a91d42, #c02550);
}

/* Special Offers Section */
.special-offers {
    background: 
        rgba(139, 21, 56, 0.03),
        linear-gradient(45deg, #ffffff 0%, #faf8f8 100%);
    padding: 60px 20px;
    margin: 80px 0;
    border-top: 1px solid rgba(139, 21, 56, 0.2);
    border-bottom: 1px solid rgba(139, 21, 56, 0.2);
    position: relative;
    z-index: 2;
}

.offers-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.offer-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    border: 1px solid rgba(139, 21, 56, 0.2);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.offer-card:hover {
    transform: translateY(-5px);
    border-color: #8b1538;
    box-shadow: 0 15px 30px rgba(139, 21, 56, 0.15);
}

.offer-icon {
    font-size: 3rem;
    color: #8b1538;
    margin-bottom: 20px;
}

.offer-title {
    font-size: 1.5rem;
    color: #8b1538;
    margin-bottom: 15px;
}

.offer-description {
    color: rgba(44, 24, 16, 0.8);
    line-height: 1.6;
    margin-bottom: 20px;
}

.offer-code {
    background: rgba(139, 21, 56, 0.1);
    color: #8b1538;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    font-family: monospace;
    letter-spacing: 1px;
    display: inline-block;
    border: 1px dashed #8b1538;
}

/* Category Sections */
.category-section {
    margin-bottom: 80px;
}

.category-title {
    font-size: 2rem;
    color: #8b1538;
    margin-bottom: 40px;
    text-align: center;
    font-weight: 300;
    letter-spacing: 1px;
}

/* Wishlist Icon */
.wishlist-icon i {
    color: #8b1538;
    font-size: 27px;
    transition: all 0.3s ease-in-out;
    text-shadow: 0 0 2px #8b1538, 0 0 4px #a91d42;
    margin-left: 10px;
    justify-content: center;
    align-items: center;
}

.wishlist-icon i:hover {
    transform: scale(1.15);
    text-shadow: 0 0 4px #8b1538, 0 0 8px #a91d42;
    color: #a91d42;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sale-hero {
        padding: 60px 15px;
    }

    .sale-hero h1 {
        font-size: 2.5rem;
        letter-spacing: 1px;
    }

    .countdown-display {
        gap: 15px;
    }

    .countdown-number {
        font-size: 2rem;
    }

    .filter-tabs {
        gap: 10px;
    }

    .filter-tab {
        padding: 10px 20px;
        font-size: 0.9rem;
    }

    .products {
        padding: 60px 15px;
    }

    .product-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .section-title {
        font-size: 2rem;
    }

    .category-title {
        font-size: 1.5rem;
    }

    .offers-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .sale-hero h1 {
        font-size: 2rem;
    }

    .card-content {
        padding: 20px;
    }

    .ta-button {
        padding: 12px 30px;
        font-size: 1rem;
    }

    .countdown-item {
        min-width: 60px;
    }

    .countdown-number {
        font-size: 1.5rem;
    }

    .price-section {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .view-btn, .add-to-cart-btn {
        display: block;
        text-align: center;
        margin: 5px 0;
    }
}
    </style>
</head>
<body>
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Sale Banner -->
    <div class="sale-banner">
        🔥 MEGA SALE NOW ON - UP TO 70% OFF ON SELECTED ITEMS 🔥
    </div>

    <!-- Sale Hero Section -->
    <section class="sale-hero">
        <div class="sale-badge">EXCLUSIVE SALE</div>
        <h1>RUBY SALE</h1>
        <p>Discover incredible deals on luxury jewelry and premium cosmetics. Limited time offers with unbeatable prices!</p>
        
        <div class="countdown-timer">
            <div class="countdown-title">Sale Ends In:</div>
            <div class="countdown-display">
                <div class="countdown-item">
                    <span class="countdown-number" id="days">15</span>
                    <span class="countdown-label">Days</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="hours">08</span>
                    <span class="countdown-label">Hours</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="minutes">45</span>
                    <span class="countdown-label">Minutes</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="seconds">30</span>
                    <span class="countdown-label">Seconds</span>
                </div>
            </div>
        </div>
        
        <a href="#products" class="ta-button">SHOP NOW</a>
    </section>

    <!-- Special Offers Section -->
    <section class="special-offers">
        <h2 class="section-title">Special Offers</h2>
        <div class="offers-container">
            <div class="offer-card">
                <div class="offer-icon">🎁</div>
                <h3 class="offer-title">Free Shipping</h3>
                <p class="offer-description">Free shipping on all orders over $200. No minimum purchase required for premium members.</p>
                <div class="offer-code">FREESHIP200</div>
            </div>
            <div class="offer-card">
                <div class="offer-icon">💎</div>
                <h3 class="offer-title">Bundle Deal</h3>
                <p class="offer-description">Buy 2 jewelry pieces and get 1 cosmetic item absolutely free. Mix and match from our entire collection.</p>
                <div class="offer-code">BUNDLE3FOR2</div>
            </div>
            <div class="offer-card">
                <div class="offer-icon">⭐</div>
                <h3 class="offer-title">First Purchase</h3>
                <p class="offer-description">Extra 15% off on your first purchase when you sign up for our newsletter. Welcome to Ruby family!</p>
                <div class="offer-code">WELCOME15</div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <h2 class="section-title">Sale Products</h2>
        
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">All Items</button>
            <button class="filter-tab" data-filter="jewelry">Jewelry</button>
            <button class="filter-tab" data-filter="cosmetics">Cosmetics</button>
            <button class="filter-tab" data-filter="luxurypicks">Luxury Picks</button>
            <button class="filter-tab" data-filter="trending">Trending</button>
            <button class="filter-tab" data-filter="newarrivals">New Arrivals</button>
        </div>

        <!-- Jewelry Section -->
        <div class="category-section" data-category="jewelry">
            <h3 class="category-title">Jewelry Sale</h3>
            <div class="product-grid">
                 <?php 
            include('../includes/connection.php');
            $jewellery_q="select * from add_product  where  product_category ='Jewellery' and product_tag ='Best Sellers'  limit 4 ";
            $jewellery_sql=mysqli_query($conn,$jewellery_q);
             while($j_data=mysqli_fetch_assoc($jewellery_sql)){
                $j_tag=$j_data['product_tag'];
                $sale_price = $j_data['product_price'] * 1.35;


                ?>
                
                <div class="product-card" style="max-width: 350px;">
                 <div class="sale-badge-card"><?php echo $j_tag?></div>
                    <div
                     class="card-image"
                      style="
                      background-image: url('<?php echo $j_data['product_image']?>');
                     background-size: cover;
                        background-position: center;
                        height: 250px;
                      border-radius: 20px;
                          "
                        ></div>
                     <div class="card-content">
                        <h3 class="card-title"><?php echo $j_data['product_name']?></h3>
                        <p class="card-description"><?php echo $j_data['product_description']?></p>
                        <div class="price-section">
                            <span class="original-price"><?php echo $sale_price?></span>
                            <span class="sale-price"><?php echo $j_data['product_price']?></span>
                            <span class="discount-percent">35% OFF</span>
                        </div>
                         <a href="../products/product_detail.php?id=<?php echo $j_data['product_id']?>"class="view-btn">VIEW DETAILS</a>
                               <a href="../wishlist/add_wishlist.php?id=<?php echo $j_data['product_id'] ?>" 
   class="wishlist-icon">
    <i class="fa-solid fa-heart"></i>
</a>
                        </div>
                </div>

                   <?php
             }
             ?> 

                
                
            </div>
        </div>

        <!-- Cosmetics Section -->
        <div class="category-section" data-category="cosmetics">
            <h3 class="category-title">Cosmetics Sale</h3>
            <div class="product-grid">
      <?php 
            $cosmetics_q="select * from add_product  where  product_category ='Cosmetics' and product_tag ='Best Sellers'  limit 4 ";
            $cosmetics_sql=mysqli_query($conn,$cosmetics_q);
             while($c_data=mysqli_fetch_assoc($cosmetics_sql)){
                $c_tag=$c_data['product_tag'];    
                $sale_price = $c_data['product_price'] * 1.35;


                ?>
                
                <div class="product-card" style="max-width: 350px;">
                 <div class="sale-badge-card"><?php echo $c_tag?></div>
                    <div
                     class="card-image"
                      style="
                      background-image: url('<?php echo $c_data['product_image']?>');
                     background-size: cover;
                        background-position: center;
                        height: 250px;
                      border-radius: 20px;
                          "
                        ></div>
                     <div class="card-content">
                        <h3 class="card-title"><?php echo $c_data['product_name']?></h3>
                        <p class="card-description"><?php echo $c_data['product_description']?></p>
                        <div class="price-section">
                            <span class="original-price"><?php echo $sale_price?></span>
                            <span class="sale-price"><?php echo $c_data['product_price']?></span>
                            <span class="discount-percent">35% OFF</span>
                        </div>
                         <a href="../products/product_detail.php?id=<?php echo $c_data['product_id']?>"class="view-btn">VIEW DETAILS</a>
                           <a href="../wishlist/add_wishlist.php?id=<?php echo $c_data['product_id'] ?>" 
   class="wishlist-icon">
    <i class="fa-solid fa-heart"></i>
</a>
                        </div>
                </div>

                   <?php
             }
             ?> 

            </div>
        </div>

        <!-- Best Sellers Section -->
        <div class="category-section" data-category="luxurypicks">
            <h3 class="category-title">Luxury Picks</h3>
            <div class="product-grid">
                    <?php 
            $luxury_q="select * from add_product  where  product_tag ='Luxury Picks'  limit 4 ";
            $luxury_sql=mysqli_query($conn,$luxury_q);
             while($luxury_data=mysqli_fetch_assoc($luxury_sql)){
                $l_tag=$luxury_data['product_tag'];    
                $sale_price = $luxury_data['product_price'] * 1.35;


                ?>
                
                <div class="product-card" style="max-width: 350px;">
                 <div class="sale-badge-card"><?php echo $l_tag?></div>
                    <div
                     class="card-image"
                      style="
                      background-image: url('<?php echo $luxury_data['product_image']?>');
                     background-size: cover;
                        background-position: center;
                        height: 250px;
                      border-radius: 20px;
                          "
                        ></div>
                     <div class="card-content">
                        <h3 class="card-title"><?php echo $luxury_data['product_name']?></h3>
                        <p class="card-description"><?php echo $luxury_data['product_description']?></p>
                        <div class="price-section">
                            <span class="original-price"><?php echo $sale_price?></span>
                            <span class="sale-price"><?php echo $luxury_data['product_price']?></span>
                            <span class="discount-percent">35% OFF</span>
                        </div>
                         <a href="../products/product_detail.php?id=<?php echo $luxury_data['product_id']?>"class="view-btn">VIEW DETAILS</a>
                           <a href="../wishlist/add_wishlist.php?id=<?php echo $luxury_data['product_id'] ?>" 
   class="wishlist-icon">
    <i class="fa-solid fa-heart"></i>
</a>
                        </div>
                </div>

                   <?php
             }
             ?> 
                </div>
            </div>
                    <!-- Trending Section -->
        <div class="category-section" data-category="trending">
            <h3 class="category-title">Trending</h3>
            <div class="product-grid">
      <?php 
            $trending_q="select * from add_product  where product_tag ='Trending'  limit 4 ";
            $trending_sql=mysqli_query($conn,$trending_q);
             while($t_data=mysqli_fetch_assoc($trending_sql)){
                $t_tag=$t_data['product_tag'];
                    $sale_price = $t_data['product_price'] * 1.35;


                ?>
                
                <div class="product-card" style="max-width: 350px;">
                 <div class="sale-badge-card"><?php echo $t_tag?></div>
                    <div
                     class="card-image"
                      style="
                      background-image: url('<?php echo $t_data['product_image']?>');
                     background-size: cover;
                        background-position: center;
                        height: 250px;
                      border-radius: 20px;
                          "
                        ></div>
                     <div class="card-content">
                        <h3 class="card-title"><?php echo $t_data['product_name']?></h3>
                        <p class="card-description"><?php echo $t_data['product_description']?></p>
                        <div class="price-section">
                            <span class="original-price"><?php echo $sale_price?></span>
                            <span class="sale-price"><?php echo $t_data['product_price']?></span>
                            <span class="discount-percent">35% OFF</span>
                        </div>
                         <a href="../products/product_detail.php?id=<?php echo $t_data['product_id']?>"class="view-btn">VIEW DETAILS</a>
                               <a href="../wishlist/add_wishlist.php?id=<?php echo $t_data['product_id'] ?>" 
   class="wishlist-icon">
    <i class="fa-solid fa-heart"></i>
</a>
                        </div>
                </div>

                   <?php
             }
             ?> 

            </div>
        </div>

                <!-- New Arrivals -->
        <div class="category-section" data-category="newarrivals">
            <h3 class="category-title">New Arrivals</h3>
            <div class="product-grid">
      <?php 
            $arrivals_q="select * from add_product  where  product_tag ='New Arrivals'  limit 4 ";
            $arrivals_sql=mysqli_query($conn,$arrivals_q);
             while($a_data=mysqli_fetch_assoc($arrivals_sql)){
                $a_tag=$a_data['product_tag'];
                 $sale_price = $a_data['product_price'] * 1.35;

                ?>
                
                <div class="product-card" style="max-width: 350px;">
                 <div class="sale-badge-card"><?php echo $a_tag?></div>
                    <div
                     class="card-image"
                      style="
                      background-image: url('<?php echo $a_data['product_image']?>');
                     background-size: cover;
                        background-position: center;
                        height: 250px;
                      border-radius: 20px;
                          "
                        ></div>
                     <div class="card-content">
                        <h3 class="card-title"><?php echo $a_data['product_name']?></h3>
                        <p class="card-description"><?php echo $a_data['product_description']?></p>
                        <div class="price-section">
                            <span class="original-price"><?php echo $sale_price?></span>
                            <span class="sale-price"><?php echo $a_data['product_price']?></span>
                            <span class="discount-percent">35% OFF</span>
                        </div>
                         <a href="../products/product_detail.php?id=<?php echo $a_data['product_id']?>"class="view-btn">VIEW DETAILS</a>
                           <a href="../wishlist/add_wishlist.php?id=<?php echo $a_data['product_id'] ?>" 
   class="wishlist-icon">
    <i class="fa-solid fa-heart"></i>
</a>
                        </div>
                </div>

                   <?php
             }
             ?> 

            </div>
        </div>


        </div>
    </section>

    <script>
       // Floating Particles System
function createParticle() {
    const particle = document.createElement('div');
    particle.className = 'particle';
    particle.style.left = Math.random() * 100 + 'vw';
    particle.style.top = Math.random() * 100 + 'vh';
    particle.style.animationDelay = Math.random() * 2 + 's';
    document.getElementById('particles-container').appendChild(particle);

    setTimeout(() => {
        particle.remove();
    }, 2000);
}
setInterval(createParticle, 300);

// ✅ Countdown Timer (fixed)
const saleEnd = new Date('2025-07-31T23:59:59').getTime(); // set your desired end date

function updateCountdown() {
    const now = new Date().getTime();
    const timeLeft = saleEnd - now;

    if (timeLeft <= 0) {
        document.querySelector('.countdown-display').innerHTML = "<strong>Sale Ended</strong>";
        return;
    }

    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    document.getElementById('days').textContent = String(days).padStart(2, '0');
    document.getElementById('hours').textContent = String(hours).padStart(2, '0');
    document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
    document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
}
setInterval(updateCountdown, 1000);
updateCountdown();

// Filter functionality
const filterTabs = document.querySelectorAll('.filter-tab');
const categorySections = document.querySelectorAll('.category-section');
filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const filter = tab.dataset.filter;
        categorySections.forEach(section => {
            if (filter === 'all' || section.dataset.category === filter) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    });
});

// Add to cart button animation
const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
addToCartButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        const productCard = e.target.closest('.product-card');
        const productTitle = productCard.querySelector('.card-title').textContent;

        button.textContent = 'ADDED!';
        button.style.background = '#4CAF50';
        setTimeout(() => {
            button.textContent = 'ADD TO CART';
            button.style.background = '';
        }, 2000);

        showNotification(`${productTitle} added to cart!`);
    });
});

// Newsletter form
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = e.target.querySelector('.newsletter-input').value;
        if (email) {
            showNotification('Thank you for subscribing!');
            e.target.reset();
        }
    });
}

// Notification popup
function showNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(45deg, #ff6b6b, #ffd700);
        color: #000;
        padding: 15px 25px;
        border-radius: 10px;
        font-weight: bold;
        z-index: 10000;
        animation: slideIn 0.3s ease-in-out;
    `;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Product card hover
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-15px) scale(1.02)';
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0) scale(1)';
    });
});

// Inject additional styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
`;
document.head.appendChild(style);
</script>
</body>
</html>

<?php
include "../includes/footer.php";
?>