<?php 
include"../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Size Guide</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
            color: #2c2c2c;
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
            background: 
                radial-gradient(circle at 25% 25%, rgba(0, 0, 0, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(0, 0, 0, 0.02) 0%, transparent 50%),
                linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%, transparent 75%, rgba(0, 0, 0, 0.01) 75%);
            background-size: 300px 300px, 400px 400px, 60px 60px;
            pointer-events: none;
            z-index: 1;
        }

        /* Floating Particles System */
        .particle {
            position: fixed;
            width: 4px;
            height: 4px;
            background: #8B1538;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            z-index: 1000;
            animation: sparkle 2s ease-in-out infinite;
        }

        @keyframes sparkle {
            0% { opacity: 0; transform: scale(0); }
            50% { opacity: 0.8; transform: scale(1); }
            100% { opacity: 0; transform: scale(0); }
        }

        /* Hero Section */
        .hero {
            padding: 80px 20px 40px;
            text-align: center;
            position: relative;
            background: 
                radial-gradient(circle at center, rgba(139, 21, 56, 0.08) 0%, transparent 70%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            z-index: 2;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #8B1538, #2c2c2c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleFloat 3s ease-in-out infinite;
        }

        @keyframes titleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .hero p {
            font-size: 1.1rem;
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
            color: #4a4a4a;
        }

        /* Main Content */
        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
            position: relative;
            z-index: 2;
        }

        .guide-section {
            margin-bottom: 80px;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #8B1538;
            font-weight: 300;
            letter-spacing: 2px;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background: linear-gradient(45deg, #8B1538, transparent);
        }

        .subsection-title {
            font-size: 1.8rem;
            color: #8B1538;
            margin-bottom: 30px;
            font-weight: 300;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(139, 21, 56, 0.3);
            padding-bottom: 10px;
        }

        .guide-card {
            background: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(139, 21, 56, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .guide-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(139, 21, 56, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .guide-card:hover::before {
            opacity: 1;
        }

        .guide-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(139, 21, 56, 0.15);
            border-color: rgba(139, 21, 56, 0.3);
        }

        .size-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .size-table th,
        .size-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(139, 21, 56, 0.1);
        }

        .size-table th {
            background: rgba(139, 21, 56, 0.1);
            color: #8B1538;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .size-table tr:hover {
            background: rgba(139, 21, 56, 0.05);
        }

        .size-table td {
            color: rgba(44, 44, 44, 0.9);
        }

        .measurement-guide {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 30px 0;
        }

        .measurement-card {
            background: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.8) 100%);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(139, 21, 56, 0.15);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .measurement-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(139, 21, 56, 0.1);
            border-color: rgba(139, 21, 56, 0.3);
        }

        .measurement-card h4 {
            color: #8B1538;
            margin-bottom: 15px;
            font-size: 1.2rem;
            font-weight: 400;
        }

        .measurement-card p {
            color: rgba(44, 44, 44, 0.8);
            line-height: 1.6;
        }

        .tip-box {
            background: 
                linear-gradient(135deg, rgba(139, 21, 56, 0.1), rgba(139, 21, 56, 0.05)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            border: 2px solid rgba(139, 21, 56, 0.2);
            border-radius: 15px;
            padding: 20px;
            margin: 30px 0;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .tip-box::before {
            content: '💡';
            position: absolute;
            top: -10px;
            left: 20px;
            background: #ffffff;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 1.2rem;
            border: 1px solid rgba(139, 21, 56, 0.2);
        }

        .tip-box h4 {
            color: #8B1538;
            margin-bottom: 10px;
            font-weight: 400;
        }

        .tip-box p {
            color: rgba(44, 44, 44, 0.9);
            line-height: 1.5;
        }

        .visual-guide {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200px;
            background: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.8) 0%, rgba(248, 248, 248, 0.8) 100%);
            border-radius: 15px;
            margin: 20px 0;
            border: 1px solid rgba(139, 21, 56, 0.15);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .visual-guide::after {
            content: '📏';
            font-size: 3rem;
            opacity: 0.4;
            filter: sepia(1) hue-rotate(320deg) saturate(2);
        }

        .shade-finder {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .shade-sample {
            height: 80px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 400;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .shade-sample:hover {
            transform: scale(1.05);
            border-color: #8B1538;
            box-shadow: 0 8px 25px rgba(139, 21, 56, 0.2);
        }

        .shade-fair { background: linear-gradient(135deg, #fdbcb4, #f4a0a0); }
        .shade-light { background: linear-gradient(135deg, #f2d7ae, #e6c79a); }
        .shade-medium { background: linear-gradient(135deg, #d4a574, #c49968); }
        .shade-tan { background: linear-gradient(135deg, #c1956b, #b8865f); }
        .shade-deep { background: linear-gradient(135deg, #8b5a3c, #7a4d35); }
        .shade-rich { background: linear-gradient(135deg, #654321, #4a2c17); }

        .contact-section {
            text-align: center;
            padding: 40px;
            background: 
                linear-gradient(135deg, rgba(139, 21, 56, 0.08) 0%, rgba(139, 21, 56, 0.05) 100%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 20px;
            margin-top: 60px;
            border: 2px solid rgba(139, 21, 56, 0.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .contact-section h3 {
            color: #8B1538;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 300;
        }

        .contact-section p {
            color: rgba(44, 44, 44, 0.8);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .contact-btn {
            display: inline-block;
            padding: 12px 30px;
            background: transparent;
            border: 2px solid #8B1538;
            color: #8B1538;
            text-decoration: none;
            font-size: 1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .contact-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #8B1538;
            transition: left 0.3s ease;
            z-index: -1;
        }

        .contact-btn:hover::before {
            left: 0;
        }

        .contact-btn:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 21, 56, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                padding: 60px 15px 30px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .content {
                padding: 0 15px 60px;
            }

            .section-title {
                font-size: 2rem;
            }

            .subsection-title {
                font-size: 1.4rem;
            }

            .guide-card {
                padding: 20px;
            }

            .size-table th,
            .size-table td {
                padding: 10px;
                font-size: 0.9rem;
            }

            .measurement-guide {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .shade-finder {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                gap: 10px;
            }

            .shade-sample {
                height: 60px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .guide-card {
                padding: 15px;
            }

            .size-table {
                font-size: 0.8rem;
            }

            .size-table th,
            .size-table td {
                padding: 8px;
            }
        }
        
    </style>
</head>
<body>
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Hero Section -->
    <section class="hero">
        <h1>SIZE GUIDE</h1>
        <p>Find your perfect fit with our comprehensive sizing guide for jewelry and cosmetics</p>
    </section>

    <!-- Main Content -->
    <div class="content">
        <!-- Jewelry Size Guide -->
        <section class="guide-section">
            <h2 class="section-title">Jewelry Sizing</h2>
            
            <!-- Ring Sizing -->
            <div class="guide-card">
                <h3 class="subsection-title">Ring Sizing</h3>
                <div class="visual-guide"></div>
                
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>US Size</th>
                            <th>UK Size</th>
                            <th>EU Size</th>
                            <th>Diameter (mm)</th>
                            <th>Circumference (mm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4</td>
                            <td>H</td>
                            <td>47</td>
                            <td>14.9</td>
                            <td>46.8</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>J</td>
                            <td>49</td>
                            <td>15.6</td>
                            <td>49.0</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>L</td>
                            <td>51</td>
                            <td>16.3</td>
                            <td>51.2</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>N</td>
                            <td>54</td>
                            <td>17.0</td>
                            <td>53.4</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>P</td>
                            <td>56</td>
                            <td>17.7</td>
                            <td>55.7</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>R</td>
                            <td>58</td>
                            <td>18.4</td>
                            <td>57.9</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>T</td>
                            <td>60</td>
                            <td>19.1</td>
                            <td>60.1</td>
                        </tr>
                    </tbody>
                </table>

                <div class="measurement-guide">
                    <div class="measurement-card">
                        <h4>Method 1: String Method</h4>
                        <p>Wrap a string around your finger and mark where it meets. Measure the length with a ruler to get your circumference.</p>
                    </div>
                    <div class="measurement-card">
                        <h4>Method 2: Existing Ring</h4>
                        <p>Measure the inner diameter of a ring that fits well and compare with our size chart.</p>
                    </div>
                    <div class="measurement-card">
                        <h4>Method 3: Ring Sizer</h4>
                        <p>Use our complimentary ring sizer tool for the most accurate measurement.</p>
                    </div>
                </div>

                <div class="tip-box">
                    <h4>Ring Sizing Tips</h4>
                    <p>Measure your finger at the end of the day when it's at its largest. Consider the width of the ring - wider bands require a larger size. Temperature affects finger size, so avoid measuring when very hot or cold.</p>
                </div>
            </div>

            <!-- Necklace Sizing -->
            <div class="guide-card">
                <h3 class="subsection-title">Necklace Lengths</h3>
                
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Length</th>
                            <th>Style</th>
                            <th>Best For</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>14-16"</td>
                            <td>Choker</td>
                            <td>High necklines, petite frames</td>
                        </tr>
                        <tr>
                            <td>16-18"</td>
                            <td>Princess</td>
                            <td>Most popular, versatile length</td>
                        </tr>
                        <tr>
                            <td>18-20"</td>
                            <td>Matinee</td>
                            <td>Business attire, higher necklines</td>
                        </tr>
                        <tr>
                            <td>22-24"</td>
                            <td>Opera</td>
                            <td>Evening wear, can be doubled</td>
                        </tr>
                        <tr>
                            <td>30-36"</td>
                            <td>Rope</td>
                            <td>Casual wear, layering</td>
                        </tr>
                    </tbody>
                </table>

                <div class="tip-box">
                    <h4>Necklace Styling Tips</h4>
                    <p>Consider your neckline when choosing length. V-necks work well with princess length, while high necklines pair beautifully with longer chains. Layer different lengths for a modern look.</p>
                </div>
            </div>

            <!-- Bracelet Sizing -->
            <div class="guide-card">
                <h3 class="subsection-title">Bracelet Sizing</h3>
                
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Wrist Size</th>
                            <th>Recommended Bracelet Size</th>
                            <th>Fit Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>6"</td>
                            <td>7"</td>
                            <td>Comfortable</td>
                        </tr>
                        <tr>
                            <td>6.5"</td>
                            <td>7.5"</td>
                            <td>Comfortable</td>
                        </tr>
                        <tr>
                            <td>7"</td>
                            <td>8"</td>
                            <td>Comfortable</td>
                        </tr>
                        <tr>
                            <td>7.5"</td>
                            <td>8.5"</td>
                            <td>Comfortable</td>
                        </tr>
                        <tr>
                            <td>8"</td>
                            <td>9"</td>
                            <td>Comfortable</td>
                        </tr>
                    </tbody>
                </table>

                <div class="tip-box">
                    <h4>Bracelet Measurement</h4>
                    <p>Measure your wrist with a flexible measuring tape just below the wrist bone. Add 1" for a comfortable fit, or 0.5" for a snug fit. Tennis bracelets should fit more snugly than chain bracelets.</p>
                </div>
            </div>
        </section>

        <!-- Cosmetics Size Guide -->
        <section class="guide-section">
            <h2 class="section-title">Cosmetics Guide</h2>
            
            <!-- Foundation Shade Matching -->
            <div class="guide-card">
                <h3 class="subsection-title">Foundation Shade Matching</h3>
                
                <div class="shade-finder">
                    <div class="shade-sample shade-fair">Fair</div>
                    <div class="shade-sample shade-light">Light</div>
                    <div class="shade-sample shade-medium">Medium</div>
                    <div class="shade-sample shade-tan">Tan</div>
                    <div class="shade-sample shade-deep">Deep</div>
                    <div class="shade-sample shade-rich">Rich</div>
                </div>

                <div class="measurement-guide">
                    <div class="measurement-card">
                        <h4>Undertone Guide</h4>
                        <p><strong>Cool:</strong> Pink, red, or blue undertones<br>
                        <strong>Warm:</strong> Yellow, golden, or peachy undertones<br>
                        <strong>Neutral:</strong> Mix of warm and cool undertones</p>
                    </div>
                    <div class="measurement-card">
                        <h4>Testing Method</h4>
                        <p>Test foundation on your jawline in natural light. The right shade should blend seamlessly with your skin tone without leaving a line.</p>
                    </div>
                </div>

                <div class="tip-box">
                    <h4>Shade Matching Tips</h4>
                    <p>Your foundation shade may change with the seasons. Test multiple shades and blend them if needed. Consider your neck color as well as your face when selecting a shade.</p>
                </div>
            </div>

            <!-- Lipstick Guide -->
            <div class="guide-card">
                <h3 class="subsection-title">Lipstick Selection</h3>
                
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Skin Tone</th>
                            <th>Recommended Shades</th>
                            <th>Avoid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fair Cool</td>
                            <td>Berry, rose, cool reds</td>
                            <td>Orange-based colors</td>
                        </tr>
                        <tr>
                            <td>Fair Warm</td>
                            <td>Coral, peach, warm reds</td>
                            <td>Blue-based colors</td>
                        </tr>
                        <tr>
                            <td>Medium Cool</td>
                            <td>Mauve, pink, cherry</td>
                            <td>Golden undertones</td>
                        </tr>
                        <tr>
                            <td>Medium Warm</td>
                            <td>Brick red, orange, bronze</td>
                            <td>Ashy colors</td>
                        </tr>
                        <tr>
                            <td>Deep Cool</td>
                            <td>Plum, wine, deep berries</td>
                            <td>Pale colors</td>
                        </tr>
                        <tr>
                            <td>Deep Warm</td>
                            <td>Copper, warm browns, orange-reds</td>
                            <td>Cool purples</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Eyeshadow Guide -->
            <div class="guide-card">
                <h3 class="subsection-title">Eyeshadow for Eye Colors</h3>
                
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Eye Color</th>
                            <th>Enhancing Shades</th>
                            <th>Dramatic Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Blue Eyes</td>
                            <td>Bronze, copper, warm browns</td>
                            <td>Orange, coral, gold</td>
                        </tr>
                        <tr>
                            <td>Brown Eyes</td>
                            <td>Gold, bronze, purple</td>
                            <td>Blue, green, silver</td>
                        </tr>
                        <tr>
                            <td>Green Eyes</td>
                            <td>Purple, plum, burgundy</td>
                            <td>Red, pink, coral</td>
                        </tr>
                        <tr>
                            <td>Hazel Eyes</td>
                            <td>Gold, green, brown</td>
                            <td>Purple, plum, bronze</td>
                        </tr>
                        <tr>
                            <td>Gray Eyes</td>
                            <td>Silver, charcoal, navy</td>
                            <td>Purple, pink, blue</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Contact Section -->
        <div class="contact-section">
            <h3>Need Personal Assistance?</h3>
            <p>Our expert consultants are here to help you find the perfect size and shade. Schedule a virtual consultation or visit our showroom for personalized fitting.</p>
            <a href="contact.php" class="contact-btn">BOOK CONSULTATION</a>
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
            if (Date.now() - particleTimer > 150) {
                createParticle(e.clientX, e.clientY);
                particleTimer = Date.now();
            }
        });

        // Create particles on hover effects
        document.querySelectorAll('.guide-card, .measurement-card, .shade-sample').forEach(element => {
            element.addEventListener('mouseenter', () => {
                const rect = element.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                // Create particles around the element
                for (let i = 0; i < 3; i++) {
                    setTimeout(() => {
                        createParticle(
                            centerX + (Math.random() - 0.5) * 80,
                            centerY + (Math.random() - 0.5) * 80
                        );
                    }, i * 100);
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

        // Random ambient sparkle particles
        setInterval(() => {
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * window.innerHeight;
            createParticle(x, y);
        }, 2500);

        // Interactive shade samples
        document.querySelectorAll('.shade-sample').forEach(shade => {
            shade.addEventListener('click', function() {
                // Remove active class from all shades
                document.querySelectorAll('.shade-sample').forEach(s => s.classList.remove('active'));
                
                // Add active class to clicked shade
                this.classList.add('active');
                
                // Create burst of particles
                const rect = this.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                for (let i = 0; i < 8; i++) {
                    setTimeout(() => {
                        createParticle(
                            centerX + (Math.random() - 0.5) * 100,
                            centerY + (Math.random() - 0.5) * 100
                        );
                    }, i * 50);
                }
            });
        });
    </script>
</body>
</html>

<?php 
include"../includes/footer.php";
?>