<?php 
include"../includes/header.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns & Exchanges</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8f6f4 100%);
            color: #2c1810;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Subtle texture overlay */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(139, 69, 19, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 0, 0, 0.03) 0%, transparent 50%),
                linear-gradient(45deg, transparent 48%, rgba(0, 0, 0, 0.01) 49%, rgba(0, 0, 0, 0.01) 51%, transparent 52%);
            pointer-events: none;
            z-index: -1;
        }

        /* Floating Particles System */
        .particle {
            position: fixed;
            width: 4px;
            height: 4px;
            background: #8b4513;
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

        /* Page Header */
        .page-header {
            padding: 80px 20px 40px;
            text-align: center;
            position: relative;
            background: 
                radial-gradient(circle at center, rgba(139, 69, 19, 0.08) 0%, transparent 70%),
                linear-gradient(135deg, rgba(0, 0, 0, 0.02) 0%, transparent 50%);
            border-bottom: 1px solid rgba(139, 69, 19, 0.1);
        }

        .page-header h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #8b4513, #5d2e0a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleFloat 3s ease-in-out infinite;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        @keyframes titleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
            color: #5d4037;
        }

        /* Main Content */
        .returns-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px 80px;
        }

        .returns-section {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 69, 19, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .returns-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(139, 69, 19, 0.03), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .returns-section::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.02), transparent, rgba(139, 69, 19, 0.05));
            border-radius: 22px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .returns-section:hover::before {
            opacity: 1;
        }

        .returns-section:hover::after {
            opacity: 1;
        }

        .returns-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(139, 69, 19, 0.15);
            border-color: rgba(139, 69, 19, 0.3);
        }

        .section-title {
            font-size: 1.8rem;
            color: #8b4513;
            margin-bottom: 25px;
            font-weight: 400;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-icon {
            font-size: 1.5rem;
            width: 50px;
            height: 50px;
            background: rgba(139, 69, 19, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(139, 69, 19, 0.2);
            color: #8b4513;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .returns-text {
            color: #3e2723;
            line-height: 1.8;
            font-size: 1.05rem;
            margin-bottom: 20px;
        }

        .returns-list {
            list-style: none;
            margin: 20px 0;
        }

        .returns-list li {
            color: #4e342e;
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
            line-height: 1.6;
        }

        .returns-list li::before {
            content: '✦';
            color: #8b4513;
            position: absolute;
            left: 0;
            font-size: 0.9rem;
        }

        .policy-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        .policy-table th,
        .policy-table td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(139, 69, 19, 0.1);
        }

        .policy-table th {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.1), rgba(139, 69, 19, 0.05));
            color: #8b4513;
            font-weight: 500;
            letter-spacing: 0.5px;
            position: relative;
        }

        .policy-table th::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.02), transparent);
        }

        .policy-table td {
            color: #3e2723;
        }

        .policy-table tr:hover {
            background: rgba(139, 69, 19, 0.03);
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.08), rgba(139, 69, 19, 0.05));
            border: 1px solid rgba(139, 69, 19, 0.2);
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        .highlight-box::before {
            content: '⚠️';
            font-size: 2rem;
            display: block;
            margin-bottom: 15px;
        }

        .highlight-text {
            color: #8b4513;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .step-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }

        .step-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(139, 69, 19, 0.15);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #8b4513, transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .step-card:hover::before {
            opacity: 1;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(139, 69, 19, 0.15);
            border-color: #8b4513;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #8b4513, #5d2e0a);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0 auto 15px;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
        }

        .step-title {
            color: #8b4513;
            font-size: 1.2rem;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .step-description {
            color: #4e342e;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .action-button {
            display: inline-block;
            padding: 15px 40px;
            background: transparent;
            border: 2px solid #8b4513;
            color: #8b4513;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .action-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #8b4513, #5d2e0a);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .action-button:hover::before {
            left: 0;
        }

        .action-button:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(139, 69, 19, 0.25);
        }

        .secondary-button {
            border-color: rgba(139, 69, 19, 0.6);
            color: rgba(139, 69, 19, 0.8);
        }

        .secondary-button::before {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.8), rgba(93, 46, 10, 0.8));
        }

        .contact-section {
            text-align: center;
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.05), rgba(255, 255, 255, 0.9));
            border: 2px solid rgba(139, 69, 19, 0.15);
            border-radius: 20px;
            padding: 40px;
            margin-top: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 30% 70%, rgba(0, 0, 0, 0.02) 0%, transparent 50%),
                linear-gradient(45deg, transparent 48%, rgba(139, 69, 19, 0.01) 49%, rgba(139, 69, 19, 0.01) 51%, transparent 52%);
            border-radius: 18px;
            pointer-events: none;
        }

        .contact-title {
            font-size: 1.5rem;
            color: #8b4513;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .contact-info {
            color: #3e2723;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .warranty-info {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.08), rgba(255, 255, 255, 0.9));
            border-left: 4px solid #8b4513;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .warranty-title {
            color: #8b4513;
            font-size: 1.1rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header {
                padding: 60px 15px 30px;
            }

            .page-header h1 {
                font-size: 2.5rem;
            }

            .returns-content {
                padding: 30px 15px 60px;
            }

            .returns-section {
                padding: 30px 20px;
            }

            .section-title {
                font-size: 1.5rem;
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .policy-table {
                font-size: 0.9rem;
            }

            .policy-table th,
            .policy-table td {
                padding: 10px 15px;
            }

            .step-container {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .contact-section {
                padding: 30px 20px;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .returns-section {
                padding: 25px 15px;
            }

            .action-button {
                padding: 12px 30px;
                font-size: 1rem;
                width: 100%;
                max-width: 250px;
            }

            .policy-table th,
            .policy-table td {
                padding: 8px 10px;
                font-size: 0.8rem;
            }

            .step-card {
                padding: 20px 15px;
            }
        }
        
    </style>
</head>
<body>
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Page Header -->
    <section class="page-header">
        <h1>Returns & Exchanges</h1>
        <p>Your satisfaction is our priority. Learn about our hassle-free return policy</p>
    </section>

    <!-- Returns Content -->
    <div class="returns-content">
        
        <!-- Return Policy Overview -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">🔄</div>
                Return Policy Overview
            </h2>
            <p class="returns-text">
                At Lumina, we want you to be completely satisfied with your purchase. We offer a comprehensive return policy designed to give you peace of mind when shopping for luxury jewelry and cosmetics.
            </p>
            
            <table class="policy-table">
                <thead>
                    <tr>
                        <th>Product Category</th>
                        <th>Return Window</th>
                        <th>Condition Required</th>
                        <th>Refund Method</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jewelry</td>
                        <td>30 days</td>
                        <td>Original condition, tags attached</td>
                        <td>Full refund or exchange</td>
                    </tr>
                    <tr>
                        <td>Cosmetics (unopened)</td>
                        <td>30 days</td>
                        <td>Unopened, original packaging</td>
                        <td>Full refund or exchange</td>
                    </tr>
                    <tr>
                        <td>Cosmetics (opened)</td>
                        <td>14 days</td>
                        <td>Gently used, hygienic condition</td>
                        <td>Store credit or exchange</td>
                    </tr>
                    <tr>
                        <td>Custom Jewelry</td>
                        <td>N/A</td>
                        <td>Final sale (unless defective)</td>
                        <td>Repair or replacement only</td>
                    </tr>
                </tbody>
            </table>

            <div class="highlight-box">
                <div class="highlight-text">
                    All returns must be initiated within the specified timeframe from delivery date
                </div>
            </div>
        </div>

        <!-- What Can Be Returned -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">✅</div>
                What Can Be Returned
            </h2>
            <p class="returns-text">
                We accept returns for most items when they meet our return conditions:
            </p>
            <ul class="returns-list">
                <li><strong>Jewelry:</strong> All ready-to-ship jewelry in original condition with tags and certificates</li>
                <li><strong>Unopened Cosmetics:</strong> Any cosmetic product in original, unopened packaging</li>
                <li><strong>Opened Cosmetics:</strong> Gently used cosmetics within 14 days for hygiene reasons</li>
                <li><strong>Gift Items:</strong> Items purchased as gifts can be returned by the recipient</li>
                <li><strong>Sale Items:</strong> Most sale items are returnable unless marked as final sale</li>
                <li><strong>Defective Items:</strong> Any item with manufacturing defects or damage</li>
            </ul>
        </div>

        <!-- What Cannot Be Returned -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">❌</div>
                What Cannot Be Returned
            </h2>
            <p class="returns-text">
                For health, safety, and quality reasons, certain items cannot be returned:
            </p>
            <ul class="returns-list">
                <li><strong>Custom/Personalized Jewelry:</strong> Items made to order or with custom engraving</li>
                <li><strong>Piercing Jewelry:</strong> For hygiene reasons, cannot be returned once opened</li>
                <li><strong>Intimate Cosmetics:</strong> Items like lip plumpers that have been used</li>
                <li><strong>Final Sale Items:</strong> Items marked as final sale at time of purchase</li>
                <li><strong>Damaged by Customer:</strong> Items damaged through normal wear or misuse</li>
                <li><strong>Items Without Tags:</strong> Jewelry missing original tags or authenticity certificates</li>
            </ul>

            <div class="warranty-info">
                <div class="warranty-title">Lifetime Warranty Exception:</div>
                <p class="returns-text" style="margin-bottom: 0;">
                    While custom jewelry cannot be returned, all Lumina jewelry comes with a lifetime warranty covering manufacturing defects and craftsmanship issues.
                </p>
            </div>
        </div>

        <!-- Return Process -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">📋</div>
                How to Return Your Order
            </h2>
            <p class="returns-text">
                Follow these simple steps to return your Lumina purchase:
            </p>
            
            <div class="step-container">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-title">Initiate Return</div>
                    <div class="step-description">Contact our customer service team or use our online return portal to start your return request.</div>
                </div>
                
                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-title">Get Return Label</div>
                    <div class="step-description">We'll provide you with a prepaid return shipping label and detailed packing instructions.</div>
                </div>
                
                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-title">Pack Securely</div>
                    <div class="step-description">Package your items in the original Lumina packaging with all tags and certificates included.</div>
                </div>
                
                <div class="step-card">
                    <div class="step-number">4</div>
                    <div class="step-title">Ship & Track</div>
                    <div class="step-description">Drop off your package and track its progress back to our fulfillment center.</div>
                </div>
                
                <div class="step-card">
                    <div class="step-number">5</div>
                    <div class="step-title">Get Refund</div>
                    <div class="step-description">Once we receive and inspect your return, we'll process your refund within 5-7 business days.</div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="#" class="action-button">START RETURN</a>
                <a href="#" class="action-button secondary-button">TRACK RETURN</a>
            </div>
        </div>

        <!-- Exchange Policy -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">🔄</div>
                Exchange Policy
            </h2>
            <p class="returns-text">
                Need a different size, color, or style? We make exchanges easy:
            </p>
            <ul class="returns-list">
                <li><strong>Size Exchanges:</strong> Free exchanges for jewelry sizing within 30 days</li>
                <li><strong>Color/Style Exchanges:</strong> Available for most items within return window</li>
                <li><strong>Upgraded Items:</strong> Pay the difference for higher-value items</li>
                <li><strong>Express Exchanges:</strong> We can ship your new item before receiving the return</li>
                <li><strong>Gift Exchanges:</strong> Recipients can exchange gifts without original receipt</li>
            </ul>
            
            <div class="highlight-box">
                <div class="highlight-text">
                    Free exchanges available for jewelry sizing adjustments within 30 days
                </div>
            </div>
        </div>

        <!-- Refund Information -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">💰</div>
                Refund Information
            </h2>
            <p class="returns-text">
                Understanding our refund process helps ensure a smooth experience:
            </p>
            <ul class="returns-list">
                <li><strong>Processing Time:</strong> 5-7 business days after we receive your return</li>
                <li><strong>Refund Method:</strong> Refunds issued to original payment method</li>
                <li><strong>Shipping Costs:</strong> Original shipping costs are non-refundable (except for defective items)</li>
                <li><strong>International Returns:</strong> Customer responsible for return shipping costs</li>
                <li><strong>Store Credit:</strong> Available as alternative to refund (never expires)</li>
                <li><strong>Partial Refunds:</strong> May apply to items not in original condition</li>
            </ul>
            
            <div class="warranty-info">
                <div class="warranty-title">Refund Timeline:</div>
                <p class="returns-text" style="margin-bottom: 0;">
                    While we process refunds within 5-7 business days, it may take additional time for your financial institution to process the credit to your account.
                </p>
            </div>
        </div>

        <!-- Quality Guarantee -->
        <div class="returns-section">
            <h2 class="section-title">
                <div class="section-icon">🛡️</div>
                Quality Guarantee
            </h2>
            <p class="returns-text">
                Every Lumina product comes with our quality guarantee:
            </p>
            <ul class="returns-list">
                <li><strong>Lifetime Warranty:</strong> All jewelry covered against manufacturing defects</li>
                <li><strong>Authenticity Guarantee:</strong> All gemstones and precious metals certified authentic</li>
                <li><strong>Satisfaction Promise:</strong> If you're not completely satisfied, we'll make it right</li>
                <li><strong>Expert Inspection:</strong> Every item inspected by our quality team before shipping</li>
                <li><strong>Replacement Coverage:</strong> Immediate replacement for defective items</li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div class="contact-section">
            <h2 class="contact-title">Need Help with Your Return?</h2>
            <div class="contact-info">
                Our customer service team is here to assist you with any return questions or concerns.<br>
                <strong>Email:</strong> returns@lumina.com<br>
                <strong>Phone:</strong> 1-800-LUMINA-2<br>
                <strong>Hours:</strong> Monday - Friday, 9 AM - 6 PM EST<br>
                <strong>Live Chat:</strong> Available on our website during business hours
            </div>
            <div class="action-buttons">
                <a href="contact.php" class="action-button">CONTACT US</a>
                <a href="#" class="action-button secondary-button">LIVE CHAT</a>
            </div>
        </div>
    </div>

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

        // Create particles on section hover
        document.querySelectorAll('.returns-section, .step-card').forEach(section => {
            section.addEventListener('mouseenter', () => {
                const rect = section.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                // Create multiple particles around the section
                for (let i = 0; i < 3; i++) {
                    setTimeout(() => {
                        createParticle(
                            centerX + (Math.random() - 0.5) * 100,
                            centerY + (Math.random() - 0.5) * 100
                        );
                    }, i * 150);
                }
            });
        });

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

        // Random sparkle particles (ambient effect)
        setInterval(() => {
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * window.innerHeight;
            createParticle(x, y);
        }, 2000);

        // Add scroll animations
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

        // Observe all returns sections
        document.querySelectorAll('.returns-section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'all 0.6s ease';
            observer.observe(section);
        });

        // Stagger animation for step cards
        document.querySelectorAll('.step-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `all 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });
    </script>
</body>
</html>

<?php 
include"../includes/footer.php"
?>