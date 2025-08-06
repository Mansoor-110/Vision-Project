<?php
include "../includes/header.php";
?>
   <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            color: #2c1810;
            background: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 248, 248, 0.9)), 
                        radial-gradient(circle at 25% 25%, rgba(128, 0, 32, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 75% 75%, rgba(165, 42, 42, 0.06) 0%, transparent 50%),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 400"><defs><pattern id="sparkles" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1.5" fill="rgba(128,0,32,0.15)"/><circle cx="80" cy="40" r="2" fill="rgba(165,42,42,0.2)"/><circle cx="40" cy="80" r="1" fill="rgba(128,0,32,0.1)"/><circle cx="70" cy="70" r="1.8" fill="rgba(165,42,42,0.18)"/></pattern></defs><rect width="1000" height="400" fill="url(%23sparkles)"/></svg>');
            color: #2c1810;
            padding: 120px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 70%, rgba(128, 0, 32, 0.03) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(165, 42, 42, 0.02) 0%, transparent 50%);
            animation: shimmer 10s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 64px;
            margin-bottom: 25px;
            font-weight: 700;
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 40px rgba(128, 0, 32, 0.1);
        }

        .hero p {
            font-size: 24px;
            opacity: 0.8;
            max-width: 700px;
            margin: 0 auto;
            color: #5a4a42;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Story Section */
        .story-section {
            padding: 120px 0;
            background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            margin-bottom: 80px;
        }

        .story-content h2 {
            color: #800020;
            font-size: 48px;
            margin-bottom: 35px;
            font-weight: 700;
            position: relative;
        }

        .story-content h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            border-radius: 2px;
        }

        .story-content p {
            font-size: 18px;
            line-height: 1.8;
            color: #4a4a4a;
            margin-bottom: 28px;
        }

        .story-highlight {
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.04) 0%, rgba(165, 42, 42, 0.02) 100%);
            padding: 35px;
            border-radius: 20px;
            border-left: 5px solid #800020;
            margin: 35px 0;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(128, 0, 32, 0.08);
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="subtle-texture" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="0.5" fill="rgba(0,0,0,0.02)"/><circle cx="18" cy="18" r="0.3" fill="rgba(0,0,0,0.01)"/></pattern></defs><rect width="100" height="100" fill="url(%23subtle-texture)"/></svg>');
        }

        .story-highlight p {
            margin: 0;
            font-style: italic;
            color: #800020;
            font-weight: 500;
            font-size: 20px;
        }

        .story-image {
            position: relative;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .story-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.1), rgba(165, 42, 42, 0.08));
            z-index: 1;
        }

        .image-placeholder {
            width: 100%;
            height: 450px;
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 56px;
            position: relative;
            font-weight: bold;
        }

        /* Values Section */
        .values-section {
            padding: 120px 0;
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.02) 0%, rgba(165, 42, 42, 0.01) 100%);
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="texture" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="rgba(0,0,0,0.015)"/><circle cx="35" cy="35" r="0.8" fill="rgba(0,0,0,0.01)"/><circle cx="20" cy="25" r="0.6" fill="rgba(0,0,0,0.008)"/></pattern></defs><rect width="200" height="200" fill="url(%23texture)"/></svg>');
        }

        .section-title {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-title h2 {
            color: #800020;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .section-title p {
            color: #666666;
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        .value-card {
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            padding: 45px 35px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(128, 0, 32, 0.1);
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(128, 0, 32, 0.02) 0%, transparent 70%);
            transition: all 0.4s ease;
            z-index: 1;
        }

        .value-card:hover::before {
            top: -60%;
            left: -60%;
            background: radial-gradient(circle, rgba(128, 0, 32, 0.04) 0%, transparent 70%);
        }

        .value-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 80px rgba(128, 0, 32, 0.15);
            border-color: rgba(128, 0, 32, 0.2);
        }

        .value-icon {
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            color: #ffffff;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 30px;
            position: relative;
            z-index: 2;
            box-shadow: 0 10px 30px rgba(128, 0, 32, 0.2);
        }

        .value-card h3 {
            color: #800020;
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }

        .value-card p {
            color: #555555;
            line-height: 1.7;
            position: relative;
            z-index: 2;
            font-size: 16px;
        }

        /* Timeline Section */
        .timeline-section {
            padding: 120px 0;
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .timeline {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(128, 0, 32, 0.2);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 60px;
            width: 45%;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            left: 55%;
            text-align: left;
        }

        .timeline-content {
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            border: 1px solid rgba(128, 0, 32, 0.15);
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            border-color: rgba(128, 0, 32, 0.3);
            box-shadow: 0 20px 50px rgba(128, 0, 32, 0.12);
        }

        .timeline-item:nth-child(odd) .timeline-content::after {
            content: '';
            position: absolute;
            right: -15px;
            top: 35px;
            width: 0;
            height: 0;
            border: 15px solid transparent;
            border-left-color: rgba(128, 0, 32, 0.15);
        }

        .timeline-item:nth-child(even) .timeline-content::after {
            content: '';
            position: absolute;
            left: -15px;
            top: 35px;
            width: 0;
            height: 0;
            border: 15px solid transparent;
            border-right-color: rgba(128, 0, 32, 0.15);
        }

        .timeline-year {
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            color: #ffffff;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 18px;
            box-shadow: 0 5px 15px rgba(128, 0, 32, 0.2);
        }

        .timeline-content h3 {
            color: #800020;
            font-size: 22px;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .timeline-content p {
            color: #555555;
            line-height: 1.7;
            margin: 0;
            font-size: 16px;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 35px;
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            border-radius: 50%;
            border: 4px solid #ffffff;
            box-shadow: 0 0 0 4px rgba(128, 0, 32, 0.15);
            z-index: 2;
        }

        /* Team Section */
        .team-section {
            padding: 120px 0;
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.02) 0%, rgba(165, 42, 42, 0.01) 100%);
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="team-texture" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="3" cy="3" r="0.8" fill="rgba(0,0,0,0.012)"/><circle cx="27" cy="27" r="0.6" fill="rgba(0,0,0,0.008)"/><circle cx="15" cy="20" r="0.4" fill="rgba(0,0,0,0.005)"/></pattern></defs><rect width="200" height="200" fill="url(%23team-texture)"/></svg>');
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
        }

        .team-member {
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 1px solid rgba(128, 0, 32, 0.1);
        }

        .team-member:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 80px rgba(128, 0, 32, 0.15);
            border-color: rgba(128, 0, 32, 0.2);
        }

        .member-image {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, #800020 0%, #a52a2a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 56px;
            position: relative;
            font-weight: bold;
        }

        .member-info {
            padding: 35px;
            text-align: center;
        }

        .member-info h3 {
            color: #800020;
            font-size: 26px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .member-role {
            color: #a52a2a;
            font-weight: 500;
            margin-bottom: 18px;
            font-size: 18px;
        }

        .member-info p {
            color: #555555;
            line-height: 1.7;
            font-size: 15px;
        }

        /* Stats Section */
        .stats-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item {
            padding: 30px;
            position: relative;
        }

        .stat-number {
            font-size: 56px;
            font-weight: 700;
            color: #800020;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(128, 0, 32, 0.1);
        }

        .stat-label {
            font-size: 18px;
            color: #666666;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 48px;
            }

            .hero p {
                font-size: 20px;
            }

            .story-grid {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .story-content h2,
            .section-title h2 {
                font-size: 36px;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-item {
                width: calc(100% - 80px);
                left: 60px !important;
                text-align: left !important;
            }

            .timeline-content::after {
                display: none;
            }

            .timeline-dot {
                left: 30px !important;
                transform: none !important;
            }

            .values-grid,
            .team-grid,
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 100px 0;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 18px;
            }

            .story-section,
            .values-section,
            .timeline-section,
            .team-section,
            .stats-section {
                padding: 80px 0;
            }

            .story-content h2,
            .section-title h2 {
                font-size: 32px;
            }

            .value-card,
            .timeline-content,
            .member-info {
                padding: 30px 25px;
            }

            .stat-number {
                font-size: 42px;
            }
        }

        /* Scroll animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="container">
                <h1>Our Story</h1>
                <p>Where timeless elegance meets modern beauty, crafting moments that sparkle with authenticity and grace</p>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <!-- Origin Story -->
            <div class="story-grid">
                <div class="story-content">
                    <h2>The Beginning</h2>
                    <p>In the heart of New York's bustling Fashion District, Lumina was born from a simple yet profound belief: every person deserves to feel luminous, both inside and out. Founded in 2018 by visionary entrepreneur Isabella Marie Chen, our journey began in a small atelier where dreams took shape through precious metals and carefully curated beauty formulations.</p>
                    
                    <div class="story-highlight">
                        <p>"I wanted to create more than just products – I wanted to craft experiences that would make people feel their most radiant selves." - Isabella Marie Chen, Founder & CEO</p>
                    </div>
                    
                    <p>Isabella's background in both jewelry design and cosmetic chemistry, combined with her travels across the globe studying traditional beauty rituals, inspired her to bridge the gap between luxury jewelry and premium cosmetics under one luminous brand.</p>
                </div>
                <div class="story-image">
                    <div class="image-placeholder">
                        <i class="fas fa-gem"></i>
                    </div>
                </div>
            </div>

            <!-- Mission Story -->
            <div class="story-grid">
                <div class="story-image">
                    <div class="image-placeholder">
                        <i class="fas fa-sparkles"></i>
                    </div>
                </div>
                <div class="story-content">
                    <h2>Our Mission</h2>
                    <p>From our humble beginnings in a 200-square-foot studio, Lumina has grown into a globally recognized brand, but our core mission remains unchanged: to ilLuminate the natural beauty within every individual through meticulously crafted jewelry and ethically sourced cosmetics.</p>
                    
                    <p>We believe that true beauty comes from confidence, and confidence comes from feeling authentically yourself. Whether it's the perfect necklace that complements your neckline or the ideal shade of lipstick that makes you smile brighter, Lumina exists to help you discover your most radiant self.</p>
                    
                    <div class="story-highlight">
                        <p>Every piece of jewelry tells a story. Every cosmetic product enhances your natural glow. Together, they create your unique Lumination.</p>
                    </div>
                </div>
            </div>

            <!-- Growth Story -->
            <div class="story-grid">
                <div class="story-content">
                    <h2>Growing Bright</h2>
                    <p>What started with Isabella hand-crafting jewelry pieces by day and formulating organic lip balms by night has blossomed into a comprehensive beauty and luxury brand. Our flagship store on Beauty Boulevard now welcomes thousands of customers who seek that perfect combination of elegance and authenticity.</p>
                    
                    <p>Today, Lumina is proud to serve customers worldwide, maintaining our commitment to premium quality, ethical sourcing, and exceptional customer service. Our jewelry pieces are worn by celebrities on red carpets, while our cosmetics grace the vanities of beauty enthusiasts across six continents.</p>
                    
                    <p>But growth hasn't changed our heart. We remain a family-owned business where every customer is treated like family, and every product is crafted with the same love and attention to detail that Isabella poured into her very first creation.</p>
                </div>
                <div class="story-image">
                    <div class="image-placeholder">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <h2>What Makes Us Shine</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Ethical Beauty</h3>
                    <p>All our cosmetics are cruelty-free, and our jewelry is sourced through fair-trade partnerships. Beauty should never come at the cost of compassion.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>From conflict-free diamonds to organic beauty ingredients, we never compromise on quality. Every product meets our exacting standards for excellence.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Inclusive Beauty</h3>
                    <p>Beauty has no boundaries. Our diverse product range celebrates all skin tones, styles, and individual expressions of beauty.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h3>Sustainable Practices</h3>
                    <p>We're committed to environmental responsibility through eco-friendly packaging, sustainable sourcing, and carbon-neutral shipping options.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Personal Service</h3>
                    <p>Every customer receives personalized attention. From custom jewelry consultations to beauty makeovers, we're here to make you shine.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Innovative Design</h3>
                    <p>Our design team constantly pushes boundaries, creating pieces that are both timeless and contemporary, classic yet revolutionary.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="container">
            <h2>Our Journey Through Time</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2018</div>
                        <h3>The Spark Ignites</h3>
                        <p>Isabella Chen opens Lumina's first atelier in a small Fashion District studio, hand-crafting her first jewelry collection while developing organic beauty formulations.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2019</div>
                        <h3>First Collection Launch</h3>
                        <p>The "Radiance" collection debuts featuring 25 handcrafted jewelry pieces and 15 premium cosmetic products, gaining immediate attention from local fashion influencers.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2020</div>
                        <h3>Digital Expansion</h3>
                        <p>Launching our e-commerce platform during the pandemic, we brought Lumina to customers' homes worldwide, introducing virtual jewelry consultations and beauty tutorials.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2021</div>
                        <h3>Celebrity Recognition</h3>
                        <p>Lumina jewelry pieces grace red carpets at major award shows, while our cosmetics line receives recognition from beauty industry professionals.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2022</div>
                        <h3>Flagship Store Opening</h3>
                        <p>Opening our beautiful flagship store at 123 Beauty Boulevard, creating an immersive shopping experience that combines jewelry showcases with beauty consultations.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2023</div>
                        <h3>Luxury Collections</h3>
                        <p>Introducing our exclusive luxury collections featuring rare gemstones and limited-edition beauty sets, establishing Lumina as a premium lifestyle brand.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h3>Global Recognition</h3>
                        <p>Achieving international acclaim with customers in over 30 countries, launching our sustainable packaging initiative, and becoming a certified B-Corporation.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2025</div>
                        <h3>Luminous Future</h3>
                        <p>Continuing to innovate with new collections, expanding our team of artisans, and maintaining our commitment to ethical beauty and sustainable luxury.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>The Faces Behind Lumina</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="member-info">
                        <h3>Isabella Marie Chen</h3>
                        <div class="member-role">Founder & CEO</div>
                        <p>With a Master's in Jewelry Design and 15 years in cosmetic chemistry, Isabella's vision drives Lumina's commitment to ethical luxury and innovative beauty.</p>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div class="member-info">
                        <h3>Marcus Rodriguez</h3>
                        <div class="member-role">Head of Design</div>
                        <p>Former apprentice to master jewelers in Florence, Marcus brings Old World craftsmanship to contemporary designs, creating pieces that are both timeless and modern.</p>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="member-info">
                        <h3>Dr. Sarah Kim</h3>
                        <div class="member-role">Chief Beauty Chemist</div>
                        <p>With a PhD in Cosmetic Science, Dr. Kim formulates our premium beauty products using cutting-edge research and the finest natural ingredients.</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Animate elements when they come into view
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.value-card, .timeline-item, .team-member').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Timeline dots animation
        const timelineDots = document.querySelectorAll('.timeline-dot');
        timelineDots.forEach((dot, index) => {
            setTimeout(() => {
                dot.style.animation = 'pulse 2s ease-in-out infinite';
            }, index * 200);
        });

        // Add pulse animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0% { transform: translateX(-50%) scale(1); }
                50% { transform: translateX(-50%) scale(1.2); }
                100% { transform: translateX(-50%) scale(1); }
            }
        `;
        document.head.appendChild(style);

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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

        // Add hover effects to story images
        document.querySelectorAll('.story-image').forEach(image => {
            image.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            image.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>

</html>

<?php
include "../includes/footer.php";
?>