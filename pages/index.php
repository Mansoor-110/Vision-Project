<?php
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>Lumina - Elegant Jewelry & Cosmetics</title>
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Georgia', serif;
    background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
    color: #333333;
    overflow-x: hidden;
    min-height: 100vh;
}

/* Hero Section */
.hero {
    padding: 80px 20px;
    text-align: center;
    position: relative;
    background: radial-gradient(circle at center, rgba(128, 0, 32, 0.1) 0%, transparent 70%);
}

.ta-button {
    display: inline-block;
    padding: 15px 40px;
    background: transparent;
    border: 2px solid #800020;
    color: #800020;
    text-decoration: none;
    font-size: 1.1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.ta-button::before {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: #800020;
    transition: left 0.3s ease;
    z-index: -1;
}

.ta-button:hover::before {
    left: 0;
}

.ta-button:hover {
    color: white;
    background: #800020;
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(128, 0, 32, 0.3);
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
    color: #800020;
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
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(128, 0, 32, 0.1);
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.product-card::before {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(128, 0, 32, 0.1), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover::before {
    opacity: 1;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(128, 0, 32, 0.2);
    border-color: #800020;
}

.card-image {
    width: 100%;
    height: 250px;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #800020;
    text-shadow: 0 0 15px rgba(128, 0, 32, 0.5);
}

.card-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(128, 0, 32, 0.1), transparent);
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
    color: #333;
    font-weight: 400;
}

.card-description {
    color: rgba(51, 51, 51, 0.7);
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 0.95rem;
}

.card-price {
    font-size: 1.3rem;
    color: #800020;
    font-weight: 600;
    margin-bottom: 15px;
}

.view-btn {
    display: inline-block;
    padding: 10px 25px;
    background: transparent;
    border: 1px solid rgba(128, 0, 32, 0.5);
    color: #800020;
    text-decoration: none;
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 5px;
}

.view-btn:hover {
    background: #800020;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(128, 0, 32, 0.3);
}

/* Category Sections */
.category-section {
    margin-bottom: 80px;
}

.category-title {
    font-size: 2rem;
    color: #800020;
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
}

.wishlist-icon i {
    color: #800020;
    font-size: 27px;
    transition: all 0.3s ease-in-out;
    text-shadow: 0 0 2px #800020, 0 0 4px #600015;
    margin-left: 10px;
    justify-content: center;
    align-items: center;
}

.wishlist-icon i:hover {
    transform: scale(1.15);
    text-shadow: 0 0 4px #a0002a, 0 0 8px #80001a;
}

/* Suggest Button Styles */
.suggest-button-section {
    padding: 40px 20px;
    text-align: center;
    background: rgba(128, 0, 32, 0.02);
}

.suggest-button-container {
    display: inline-block;
    position: relative;
}

.suggest-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 18px 35px;
    background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
    border: none;
    color: #ffffff;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500;
    letter-spacing: 1px;
    border-radius: 50px;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(128, 0, 32, 0.3);
    text-transform: uppercase;
}

.suggest-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.suggest-button:hover::before {
    left: 100%;
}

.suggest-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(128, 0, 32, 0.4);
    background: linear-gradient(135deg, #a0002a 0%, #800020 100%);
}

.suggest-button:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(128, 0, 32, 0.4);
}

.suggest-button-icon {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.suggest-button:hover .suggest-button-icon {
    transform: rotate(15deg) scale(1.1);
}

.suggest-button-text {
    font-family: 'Georgia', serif;
    font-weight: 400;
}

/* Suggest Button Glow Effect */
.suggest-button-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: radial-gradient(circle, rgba(128, 0, 32, 0.3) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.6s ease;
    pointer-events: none;
    z-index: -1;
}

.suggest-button:hover + .suggest-button-glow {
    width: 200px;
    height: 200px;
}

/* Suggest Button Pulse Animation */
.suggest-button-pulse {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    border: 2px solid rgba(128, 0, 32, 0.4);
    border-radius: 50px;
    transform: translate(-50%, -50%);
    animation: suggest-pulse 2s infinite;
    pointer-events: none;
}

@keyframes suggest-pulse {
    0% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }
    100% {
        transform: translate(-50%, -50%) scale(1.2);
        opacity: 0;
    }
}

/* Responsive Design for Suggest Button */
@media (max-width: 768px) {
    .suggest-button {
        padding: 15px 30px;
        font-size: 1rem;
    }

    .suggest-button-section {
        padding: 30px 15px;
    }
}

@media (max-width: 480px) {
    .suggest-button {
        padding: 12px 25px;
        font-size: 0.9rem;
        gap: 8px;
    }

    .suggest-button-icon {
        font-size: 1rem;
    }
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
    height: 740px;
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
    background: rgba(128, 0, 32, 0.9);
    border-radius: 50%;
    padding: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.play-button-container:hover {
    background: rgba(128, 0, 32, 1);
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
    color: #ffffff;
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
</head>

<body>

    <?php
    if (isset($_SESSION['welcome'])) {
    ?>
        <div class="container mt-5">

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check" style="font-size:18px;"></i>
                Welcome, <strong><?php echo $_SESSION['welcome']; ?></strong>. You're now logged in successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
        unset($_SESSION['welcome']);
    }
    ?>
    <?php
    if (isset($_SESSION['logout'])) {
    ?>
    <div class="container mt-5 ">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fa-sharp fa-solid fa-right-from-bracket"></i></strong> You are now logged out.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    <?php
        unset($_SESSION['logout']);
    }
    ?>

    
    <!-- Video Showcase -->
     <div class="video-showcase">
    <div class="video-container">
        <div class="video-wrapper">
            <!-- Video Element (autoplay enabled) -->
            <video id="carVideo" class="car-video" autoplay muted loop>
                <source src="../asset/jewel.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>

    <!-- Suggest Button Section -->
<div class="suggest-button-section">
    <div class="suggest-button-container">
        <a href="suggestions.php" class="suggest-button">
            <i class="fas fa-lightbulb suggest-button-icon"></i>
            <span class="suggest-button-text">Get Suggestions</span>
        </a>
        <div class="suggest-button-glow"></div>
        <div class="suggest-button-pulse"></div>
    </div>
</div>

    <!-- Products Section -->
    <section class="products" id="products">
        <h2 class="section-title">Our Collections</h2>

        <!-- Jewelry Section -->
        <div class="category-section">

            <h3 class="category-title">Jewellery</h3>
            <div class="product-grid">
                <?php
                include('../includes/connection.php');
                $jewellery_q = "select * from add_product  where  product_category ='Jewellery'   limit 3 ";
                $jewellery_sql = mysqli_query($conn, $jewellery_q);
                while ($j_data = mysqli_fetch_assoc($jewellery_sql)) {
                ?>


                    <div class="product-card">
                        <div
                            class="card-image"
                            style="
          background-image: url('<?php echo $j_data['product_image'] ?>');
          background-size: cover;
          background-position: center;
          height: 350px;
          border-radius: 20px;
        "></div>
                        <div class="card-content">
                            <h3 class="card-title"><?php echo $j_data['product_name'] ?></h3>
                            <p class="card-description"><?php echo $j_data['product_description'] ?></p>
                            <div class="card-price">Rs.<?php echo $j_data['product_price'] ?></div>
                            <a href="../products/product_detail.php?id=<?php echo $j_data['product_id'] ?>" class="view-btn">VIEW DETAILS</a>
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

            <!-- Cosmetics Section -->
            <div class="category-section">
                <h3 class="category-title">Cosmetics</h3>
                <div class="product-grid">
                    <?php
                    $cosmetics_q = "select * from add_product  where  product_category='Cosmetics'   limit 3";
                    $cosmetics_sql = mysqli_query($conn, $cosmetics_q);
                    while ($c_data = mysqli_fetch_assoc($cosmetics_sql)) {
                    ?>


                        <div class="product-card">
                            <div
                                class="card-image"
                                style="
          background-image: url('<?php echo $c_data['product_image'] ?>');
          background-size: cover;
          background-position: center;
          height: 350px;
          border-radius: 20px;
        "></div>
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $c_data['product_name'] ?></h3>
                                <p class="card-description"><?php echo $c_data['product_description'] ?></p>
                                <div class="card-price">Rs.<?php echo $c_data['product_price'] ?></div>
                                <a href="../products/product_detail.php?id=<?php echo $c_data['product_id'] ?>" class="view-btn">VIEW DETAILS</a>
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


            <div class="category-section">
                <h3 class="category-title">Beauty Tools</h3>
                <div class="product-grid">
                    <?php
                    $beauty_q = "select * from  add_product  where  product_category  ='Beauty Tools'   limit 3";
                    $beauty_sql = mysqli_query($conn, $beauty_q);
                    while ($b_data = mysqli_fetch_assoc($beauty_sql)) {
                    ?>


                        <div class="product-card">
                            <div
                                class="card-image"
                                style="
          background-image: url('<?php echo $b_data['product_image'] ?>');
          background-size: cover;
          background-position: center;
          height: 350px;
          border-radius: 20px;
        "></div>
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $b_data['product_name'] ?></h3>
                                <p class="card-description"><?php echo $b_data['product_description'] ?></p>
                                <div class="card-price">Rs.<?php echo $b_data['product_price'] ?></div>
                                <a href="../products/product_detail.php?id=<?php echo $b_data['product_id'] ?>" class="view-btn">VIEW DETAILS</a>
                                <a href="../wishlist/add_wishlist.php?id=<?php echo $b_data['product_id'] ?>"
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
    <?php
    include "../includes/footer.php";
    ?>


    <script>
        // Floating Particles System
        const particlesContainer = document.getElementById('particles-container');
        let mouseX = 0;
        let mouseY = 0;

        // Track mouse movement
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        // Create particles that follow cursor
        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = x + 'px';
            particle.style.top = y + 'px';

            // Random offset for natural movement
            const offsetX = (Math.random() - 0.5) * 20;
            const offsetY = (Math.random() - 0.5) * 20;

            particle.style.transform = `translate(${offsetX}px, ${offsetY}px)`;

            particlesContainer.appendChild(particle);

            // Remove particle after animation
            setTimeout(() => {
                particle.remove();
            }, 2000);
        }

        // Create particles on mouse move (throttled)
        let particleTimer = 0;
        document.addEventListener('mousemove', (e) => {
            if (Date.now() - particleTimer > 100) {
                createParticle(e.clientX, e.clientY);
                particleTimer = Date.now();
            }
        });

        // Create particles on card hover
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                const rect = card.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;

                // Create multiple particles around the card
                for (let i = 0; i < 5; i++) {
                    setTimeout(() => {
                        createParticle(
                            centerX + (Math.random() - 0.5) * 100,
                            centerY + (Math.random() - 0.5) * 100
                        );
                    }, i * 100);
                }
            });
        });

       // Updated JavaScript for autoplay video
document.addEventListener('DOMContentLoaded', function() {
    const carVideo = document.getElementById('carVideo');
    
    // Ensure video starts playing
    carVideo.play().catch(function(error) {
        console.log('Autoplay was prevented:', error);
    });
    
    // Optional: Handle play/pause on click
    carVideo.addEventListener('click', function() {
        if (carVideo.paused) {
            carVideo.play();
        } else {
            carVideo.pause();
        }
    });
});
    </script>
</body>

</html>