<?php include "../includes/header.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Your Jewellery - Choose Your Category</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            color: #333333;
            background: #ffffff;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Hero Section */
        .design-hero {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 248, 248, 0.9)), 
                        radial-gradient(circle at 20% 50%, rgba(139, 69, 19, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(165, 42, 42, 0.1) 0%, transparent 50%);
            color: #333333;
            padding: 120px 0 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 2px solid #f0f0f0;
            margin-top: 0;
            z-index: 1;
            clear: both;
        }

        .design-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="1" fill="rgba(139,69,19,0.2)"/><circle cx="80" cy="40" r="2" fill="rgba(165,42,42,0.3)"/><circle cx="40" cy="80" r="1.5" fill="rgba(139,69,19,0.2)"/><circle cx="60" cy="10" r="1" fill="rgba(165,42,42,0.4)"/></svg>');
            animation: design-float 25s ease-in-out infinite;
        }

        @keyframes design-float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        .design-hero-content {
            position: relative;
            z-index: 2;
        }

        .design-hero h1 {
            font-size: 56px;
            margin-bottom: 20px;
            font-weight: 700;
            background: linear-gradient(135deg, #980000 0%, #A52A2A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(139, 69, 19, 0.3);
        }

        .design-hero p {
            font-size: 22px;
            opacity: 0.8;
            max-width: 700px;
            margin: 0 auto 30px auto;
            color: #666666;
        }

        .steps-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: #980000;
            font-weight: 600;
        }

        .step-number {
            background: linear-gradient(135deg, #980000 0%, #A52A2A 100%);
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }

        .step.active .step-number {
            background: linear-gradient(135deg, #A52A2A 0%, #980000 100%);
            box-shadow: 0 0 20px rgba(139, 69, 19, 0.4);
        }

        .step-arrow {
            color: #980000;
            font-size: 18px;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        /* Selection Section */
        .jewelry-selection {
            padding: 100px 0;
            background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
            position: relative;
            z-index: 1;
            margin-top: 0;
        }

        .selection-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .selection-title h2 {
            font-size: 48px;
            color: #980000;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .selection-title p {
            font-size: 18px;
            color: #666666;
            max-width: 650px;
            margin: 0 auto;
        }

        /* Grid Layout */
        .jewelry-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        /* Selection Cards */
        .jewelry-selection-card {
            background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
            border-radius: 25px;
            padding: 10px 10px;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: 0 15px 40px rgba(139, 69, 19, 0.08);
            border: 2px solid rgba(139, 69, 19, 0.1);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .jewelry-selection-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #980000 0%, #A52A2A 100%);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .jewelry-selection-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(139, 69, 19, 0.15);
            border-color: rgba(139, 69, 19, 0.3);
            z-index: 10;
        }

        .jewelry-selection-card:hover::before {
            transform: scaleX(1);
        }

        .jewelry-icon-container {
            position: relative;
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(165, 42, 42, 0.05) 100%);
            border-radius: 15px;
            overflow: hidden;
        }

        .jewelry-card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            transition: all 0.4s ease;
            filter: brightness(1.1) saturate(1.1);
        }

        .jewelry-selection-card:hover .jewelry-card-image {
            transform: scale(1.1);
            filter: brightness(1.2) saturate(1.2);
        }

        .jewelry-icon {
            font-size: 80px;
            background: linear-gradient(135deg, #980000 0%, #A52A2A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.4s ease;
            filter: drop-shadow(0 5px 15px rgba(139, 69, 19, 0.2));
        }

        .jewelry-selection-card:hover .jewelry-icon {
            transform: scale(1.2) rotate(10deg);
            filter: drop-shadow(0 10px 25px rgba(139, 69, 19, 0.3));
        }

        .jewelry-selection-card h3 {
            font-size: 32px;
            color: #980000;
            margin-bottom: 15px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .jewelry-selection-card:hover h3 {
            color: #A52A2A;
            transform: translateY(-3px);
        }

        .jewelry-selection-card p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Start Design Button */
        .start-design-btn {
            background: linear-gradient(135deg, #980000 0%, #A52A2A 100%);
            color: #ffffff;
            padding: 15px 35px;
            border: none;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.2);
        }

        .start-design-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .jewelry-selection-card:hover .start-design-btn {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(139, 69, 19, 0.3);
        }

        .jewelry-selection-card:hover .start-design-btn::before {
            left: 100%;
        }

        /* Special styling for popular choice */
        .jewelry-selection-card.popular {
            border-color: #980000;
            box-shadow: 0 20px 50px rgba(165, 42, 42, 0.15);
            position: relative;
        }

        .jewelry-selection-card.popular::after {
            content: '⭐ Most Popular';
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #A52A2A 0%, #980000 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .design-hero h1 {
                font-size: 42px;
            }

            .design-hero p {
                font-size: 20px;
            }

            .steps-indicator {
                flex-wrap: wrap;
                gap: 15px;
            }

            .step {
                font-size: 14px;
            }

            .jewelry-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }

            .jewelry-selection-card {
                padding: 25px 20px;
            }

            .selection-title h2 {
                font-size: 36px;
            }

            .jewelry-selection {
                padding: 60px 0;
            }
        }

        @media (max-width: 480px) {
            .design-hero {
                padding: 80px 0 40px 0;
            }

            .design-hero h1 {
                font-size: 32px;
            }

            .design-hero p {
                font-size: 18px;
            }

            .steps-indicator {
                flex-direction: column;
                gap: 10px;
            }

            .step-arrow {
                transform: rotate(90deg);
            }

            .jewelry-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .jewelry-selection-card {
                padding: 25px 20px;
            }

            .jewelry-icon {
                font-size: 60px;
            }

            .jewelry-icon-container {
                height: 100px;
            }

            .selection-title h2 {
                font-size: 28px;
            }

            .jewelry-selection {
                padding: 50px 0;
            }
        }

        /* Animation for cards appearing */
        .jewelry-selection-card {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .jewelry-selection-card:nth-child(1) { animation-delay: 0.1s; }
        .jewelry-selection-card:nth-child(2) { animation-delay: 0.2s; }
        .jewelry-selection-card:nth-child(3) { animation-delay: 0.3s; }
        .jewelry-selection-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effect for the entire card */
        .jewelry-selection-card:active {
            transform: translateY(-15px) scale(0.98);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="design-hero">
        <div class="design-hero-content">
            <div class="container">
                <h1>Design Your Jewellery</h1>
                <p>Create your perfect piece of jewelry with our custom design process. Choose your category below to start your personalized jewelry journey.</p>
                
                <!-- Steps Indicator -->
                <div class="steps-indicator">
                    <div class="step active">
                        <div class="step-number">1</div>
                        <span>Choose Category</span>
                    </div>
                    <div class="step-arrow">→</div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <span>Customize Design</span>
                    </div>
                    <div class="step-arrow">→</div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <span>Review & Order</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jewelry Selection Section -->
    <section class="jewelry-selection">
        <div class="container">
            <div class="selection-title">
                <h2>Choose Your Jewelry Type</h2>
                <p>Select the type of jewelry you'd like to design. Each category offers unique customization options to create your perfect piece.</p>
            </div>

            <div class="jewelry-grid">
                <a href="../custom_jewellery/bodies.php?type=necklace" class="jewelry-selection-card">
                    <div class="jewelry-icon-container">
                        <img src="../product_images/will2.webp" alt="Necklaces" class="jewelry-card-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="jewelry-icon" style="display: none;">💎</div>
                    </div>
                    <h3>Necklaces</h3>
                    <div class="start-design-btn">Start Designing</div>
                </a>

                <a href="../custom_jewellery/bodies.php?type=ring" class="jewelry-selection-card popular">
                    <div class="jewelry-icon-container">
                        <img src="../product_images/4-qul 1.webp" alt="Rings" class="jewelry-card-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="jewelry-icon" style="display: none;">💍</div>
                    </div>
                    <h3>Rings</h3>
                   <div class="start-design-btn">Start Designing</div>
                </a>

                <a href="../custom_jewellery/bodies.php?type=earrings" class="jewelry-selection-card">
                    <div class="jewelry-icon-container">
                        <img src="../product_images/earnull1.webp" alt="Earrings" class="jewelry-card-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="jewelry-icon" style="display: none;">✨</div>
                    </div>
                    <h3>Earrings</h3>
                   <div class="start-design-btn">Start Designing</div>
                </a>

                <a href="../custom_jewellery/bodies.php?type=bracelet" class="jewelry-selection-card">
                    <div class="jewelry-icon-container">
                        <img src="../product_images/date1.webp" alt="Bracelets" class="jewelry-card-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="jewelry-icon" style="display: none;">🔗</div>
                    </div>
                    <h3>Bracelets</h3>
                   <div class="start-design-btn">Start Designing</div>
                </a>
            </div>
        </div>
    </section>

    <script>
        // Add click tracking for analytics (optional)
        document.querySelectorAll('.jewelry-selection-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Add any tracking code here
                console.log('User selected:', this.querySelector('h3').textContent);
            });
        });

        // Add subtle parallax effect to hero section (disabled to prevent conflicts)
        // window.addEventListener('scroll', () => {
        //     const scrolled = window.pageYOffset;
        //     const hero = document.querySelector('.design-hero');
        //     if (hero) {
        //         hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        //     }
        // });
    </script>
</body>
</html>

<?php
include "../includes/footer.php";
?>