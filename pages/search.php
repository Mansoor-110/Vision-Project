<?php
include('../includes/header.php');
include('../includes/connection.php');

if (isset($_GET['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM add_product 
              WHERE product_name LIKE '%$search_term%' 
              OR product_description LIKE '%$search_term%' 
              OR product_category LIKE '%$search_term%' 
              OR product_category LIKE '%$search_term%' 
              OR product_subcategory LIKE '%$search_term%' 
              OR seller_name LIKE '%$search_term%'";

    $sql = mysqli_query($conn, $query);
    $total = mysqli_num_rows($sql);
    ?>
     <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #ffffff;
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        @keyframes sparkle {
            0% {
                opacity: 0;
                transform: scale(0);
            }

            50% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0);
            }
        }

        /* Hero Section */
        .hero {
            padding: 80px 20px;
            text-align: center;
            position: relative;
            background: radial-gradient(circle at center, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
        }





        .ta-button {
            display: inline-block;
            padding: 15px 40px;
            background: transparent;
            border: 2px solid #ffd700;
            color: #ffd700;
            text-decoration: none;
            font-size: 1.1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            margin-left: 40%;
        }

        .ta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #ffd700;
            transition: left 0.3s ease;
            z-index: -1;
        }

        .ta-button:hover::before {
            left: 0;
        }

        .ta-button:hover {
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.3);
        }

        /* Featured Products Slider */
        .featured-slider {
            padding: 80px 20px;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            display: flex;
            align-items: center;
            padding: 60px;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, transparent 100%);
        }

        .slide-content {
            flex: 1;
            padding-right: 40px;
        }

        .slide-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 8rem;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        }

        .slide-title {
            font-size: 3rem;
            color: #ffd700;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .slide-description {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .slide-price {
            font-size: 2rem;
            color: #ffd700;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .nav-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 215, 0, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-dot.active {
            background: #ffd700;
            transform: scale(1.2);
        }

        .slider-arrows {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 215, 0, 0.2);
            color: #ffd700;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .slider-arrows:hover {
            background: #ffd700;
            color: #000;
            transform: translateY(-50%) scale(1.1);
        }

        .prev-arrow {
            left: 20px;
        }

        .next-arrow {
            right: 20px;
        }

        /* Products Section */
        .products {
            padding: 80px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: #ffd700;
            font-weight: 300;
            letter-spacing: 2px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .product-card {
            max-width:350px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.1);
            cursor: pointer;
        }

        .product-card::before {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 215, 0, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(255, 215, 0, 0.2);
            border-color: #ffd700;
        }

        .card-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #333, #555);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #ffd700;
            text-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
        }

        .card-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 215, 0, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover .card-image::after {
            opacity: 1;
        }

        .card-content {
            padding: 25px;
        }

        .card-title {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #fff;
            font-weight: 400;
        }

        .card-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .card-price {
            font-size: 1.3rem;
            color: #ffd700;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .view-btn {
            display: inline-block;
            padding: 10px 25px;
            background: transparent;
            border: 1px solid rgba(255, 215, 0, 0.5);
            color: #ffd700;
            text-decoration: none;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 5px;
        }

        .view-btn:hover {
            background: #ffd700;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        /* Category Sections */
        .category-section {
            margin-bottom: 80px;
        }

        .category-title {
            font-size: 2rem;
            color: #ffd700;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 300;
            letter-spacing: 1px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                padding: 60px 15px;
            }

            .hero h1 {
                font-size: 2.5rem;
                letter-spacing: 1px;
            }

            .hero p {
                font-size: 1rem;
            }

            .slide {
                flex-direction: column;
                text-align: center;
                padding: 40px 20px;
            }

            .slide-content {
                padding-right: 0;
                margin-bottom: 30px;
            }

            .slide-title {
                font-size: 2rem;
            }

            .slide-image {
                font-size: 5rem;
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

            .slider-arrows {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .prev-arrow {
                left: 10px;
            }

            .next-arrow {
                right: 10px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .card-content {
                padding: 20px;
            }

            .ta-button {
                padding: 12px 30px;
                font-size: 1rem;
            }

            .slide {
                padding: 30px 15px;
            }

            .slide-title {
                font-size: 1.5rem;
            }

            .slide-image {
                font-size: 4rem;
            }
        }

        .wishlist-icon i {
            color: #ff4d4d;
            /* Soft reddish tone */
            font-size: 27px;
            transition: all 0.3s ease-in-out;
            text-shadow: 0 0 2px #ff4d4d, 0 0 4px #e60000;
            margin-left: 10px;
            justify-content: center;
            align-items: center;
        }

        .wishlist-icon i:hover {
            transform: scale(1.15);
            text-shadow: 0 0 4px #ff1a1a, 0 0 8px #cc0000;
        }

        .video-showcase {
            display: flex;
            justify-content: center;
            padding: 70px 30px;
        }

        .video-container {
            width: 100%;
            max-width: 1600px;
            position: relative;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            height: 670px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .video-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .play-button-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            padding: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .play-button-container:hover {
            background: rgba(255, 255, 255, 1);
            transform: translate(-50%, -50%) scale(1.1);
        }

        .play-button-container a {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .play-button-container i {
            font-size: 48px;
            color: #333;
            margin: 0;
        }

    .car-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    display: block;
}

        /* Responsive Design */
        @media (max-width: 768px) {
            .video-wrapper {
                height: 350px;
            }

            .play-button-container {
                padding: 15px;
            }

            .play-button-container i {
                font-size: 36px;
            }
        }

        @media (max-width: 480px) {
            .video-wrapper {
                height: 280px;
            }

            .play-button-container {
                padding: 12px;
            }

            .play-button-container i {
                font-size: 30px;
            }
        }
    </style>

    <div class="container mt-5 mb-5">
        <h2 class="text-warning">Search Results for "<?php echo $search_term ?>"</h2>

        <div class="product-grid mt-4">
            <?php
            if ($total > 0) {
                while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                    <div class="product-card">
                        <div
                            class="card-image"
                            style="
                                background-image: url('<?php echo $data['product_image'] ?>');
                                background-size: cover;
                                background-position: center;
                                height: 350px;
                                border-radius: 20px;
                            ">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?php echo $data['product_name'] ?></h3>
                            <p class="card-description"><?php echo $data['product_description'] ?></p>
                            <div class="card-price">Rs.<?php echo $data['product_price'] ?></div>
                            <a href="../products/product_detail.php?id=<?php echo $data['product_id'] ?>" class="view-btn">VIEW DETAILS</a>
                            <a href="../wishlist/add_wishlist.php?id=<?php echo $data['product_id'] ?>" class="wishlist-icon">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-danger mt-4'>No products found matching \"$search_term\".</p>";
            }
            ?>
        </div>
    </div>

    <?php
}
include('../includes/footer.php');
?>
