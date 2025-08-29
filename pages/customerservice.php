<?php
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
            color: #2c2c2c;
            overflow-x: hidden;
            min-height: 100vh;
            line-height: 1.6;
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
            width: 3px;
            height: 3px;
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

        /* Header */
        .header {
            padding: 40px 20px;
            text-align: center;
            position: relative;
            background: 
                radial-gradient(circle at center, rgba(139, 21, 56, 0.08) 0%, transparent 70%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-bottom: 2px solid rgba(139, 21, 56, 0.15);
            z-index: 2;
        }

        .header h1 {
            font-size: clamp(2rem, 6vw, 3.5rem);
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #8B1538, #2c2c2c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.8;
            max-width: 700px;
            margin: 0 auto 20px;
            color: #4a4a4a;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background: transparent;
            border: 1px solid #8B1538;
            color: #8B1538;
            text-decoration: none;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 2;
        }

        .back-link::before {
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

        .back-link:hover::before {
            left: 0;
        }

        .back-link:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        /* Content Container */
        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
            z-index: 2;
        }

        /* Contact Methods Grid */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .contact-card {
            background: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 20px;
            padding: 30px;
            border: 2px solid rgba(139, 21, 56, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .contact-card::before {
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

        .contact-card:hover::before {
            opacity: 1;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            border-color: #8B1538;
            box-shadow: 0 15px 40px rgba(139, 21, 56, 0.15);
        }

        .contact-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #8B1538;
        }

        .contact-card h3 {
            color: #8B1538;
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 400;
        }

        .contact-card p {
            color: rgba(44, 44, 44, 0.8);
            margin-bottom: 20px;
        }

        .contact-button {
            display: inline-block;
            padding: 12px 30px;
            background: transparent;
            border: 2px solid #8B1538;
            color: #8B1538;
            text-decoration: none;
            font-size: 1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .contact-button::before {
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

        .contact-button:hover::before {
            left: 0;
        }

        .contact-button:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        /* FAQ Section */
        .faq-section {
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 2.5rem;
            color: #8B1538;
            text-align: center;
            margin-bottom: 50px;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .faq-container {
            display: grid;
            gap: 20px;
        }

        .faq-item {
            background: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 15px;
            border: 1px solid rgba(139, 21, 56, 0.15);
            backdrop-filter: blur(10px);
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .faq-item:hover {
            border-color: rgba(139, 21, 56, 0.3);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            padding: 25px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: rgba(139, 21, 56, 0.05);
        }

        .faq-question h4 {
            color: #8B1538;
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 5px;
        }

        .faq-question::after {
            content: '+';
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            color: #8B1538;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .faq-question.active::after {
            transform: translateY(-50%) rotate(45deg);
        }

        .faq-answer {
            padding: 0 25px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-answer.active {
            max-height: 200px;
            padding: 0 25px 25px;
        }

        .faq-answer p {
            color: rgba(44, 44, 44, 0.8);
            line-height: 1.6;
        }

        /* Support Hours */
        .support-hours {
            background: 
                linear-gradient(135deg, rgba(139, 21, 56, 0.1) 0%, rgba(139, 21, 56, 0.05) 100%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 60px;
            border: 2px solid rgba(139, 21, 56, 0.2);
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .support-hours h3 {
            color: #8B1538;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .hours-item {
            background: rgba(0, 0, 0, 0.05);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid rgba(139, 21, 56, 0.1);
        }

        .hours-item h4 {
            color: #8B1538;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .hours-item p {
            color: rgba(44, 44, 44, 0.8);
        }

        /* Contact Form */
        .contact-form {
            background: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 20px;
            padding: 40px;
            border: 2px solid rgba(139, 21, 56, 0.1);
            backdrop-filter: blur(10px);
            margin-bottom: 60px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .contact-form h3 {
            color: #8B1538;
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 300;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            color: #8B1538;
            margin-bottom: 8px;
            font-size: 1rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(139, 21, 56, 0.2);
            border-radius: 10px;
            color: #2c2c2c;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #8B1538;
            box-shadow: 0 0 20px rgba(139, 21, 56, 0.15);
            background: rgba(255, 255, 255, 1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: transparent;
            border: 2px solid #8B1538;
            color: #8B1538;
            font-size: 1.1rem;
            font-family: 'Georgia', serif;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .submit-btn::before {
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

        .submit-btn:hover::before {
            left: 0;
        }

        .submit-btn:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        /* Emergency Contact */
        .emergency-contact {
            background: 
                linear-gradient(135deg, rgba(139, 21, 56, 0.1) 0%, rgba(139, 21, 56, 0.05) 100%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            border: 2px solid #8B1538;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px rgba(139, 21, 56, 0.1);
        }

        .emergency-contact h3 {
            color: #8B1538;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .emergency-contact .phone {
            color: #8B1538;
            font-size: 1.5rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .emergency-contact .phone:hover {
            color: #2c2c2c;
            text-shadow: 0 0 10px rgba(139, 21, 56, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 30px 15px;
            }

            .content {
                padding: 40px 15px;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .contact-card {
                padding: 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .contact-form {
                padding: 30px 20px;
            }

            .hours-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .contact-card {
                padding: 20px;
            }

            .support-hours {
                padding: 25px;
            }

            .contact-form {
                padding: 25px 15px;
            }
        }

        
    </style>
</head>
<body>
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Header -->
    <header class="header">
        <h1>Customer Service</h1>
        <p>We're here to help you with any questions about our jewelry and cosmetics collections. Your satisfaction is our priority.</p>
        <a href="../pages/index.php" class="back-link">← BACK TO LUMINA</a>
    </header>

    <!-- Content -->
    <div class="content">
        <!-- Contact Methods -->
        <section class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon">💬</div>
                <h3>Live Chat</h3>
                <p>Get instant help from our jewelry experts. Available during business hours.</p>
                <a href="../pages/contact.php" class="contact-button">START CHAT</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">📞</div>
                <h3>Phone Support</h3>
                <p>Speak directly with our customer service team for personalized assistance.</p>
                <a href="tel:+1-800-LUMINA" class="contact-button">CALL NOW</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">✉️</div>
                <h3>Email Support</h3>
                <p>Send us detailed questions and we'll respond within 24 hours.</p>
                <a href="mailto:support@lumina.com" class="contact-button">SEND EMAIL</a>
            </div>

        </section>

        <!-- Emergency Contact -->
        <div class="emergency-contact">
            <h3>Need Immediate Assistance?</h3>
            <p>For urgent jewelry repairs or product concerns, call our priority line:</p>
            <a href="tel:+1-800-URGENT" class="phone">1-800-URGENT</a>
            <p style="margin-top: 10px; font-size: 0.9rem; opacity: 0.8;">Available 24/7 for emergencies</p>
        </div>

        <!-- Support Hours -->
        <section class="support-hours">
            <h3>Support Hours</h3>
            <p>Our dedicated team is available to assist you during the following hours:</p>
            
            <div class="hours-grid">
                <div class="hours-item">
                    <h4>Phone & Chat Support</h4>
                    <p>Monday - Friday: 9:00 AM - 8:00 PM EST</p>
                    <p>Saturday: 10:00 AM - 6:00 PM EST</p>
                    <p>Sunday: 12:00 PM - 5:00 PM EST</p>
                </div>
                
                <div class="hours-item">
                    <h4>Email Support</h4>
                    <p>24/7 - We respond within 24 hours</p>
                    <p>Priority responses for VIP customers</p>
                </div>
                
                <div class="hours-item">
                    <h4>Showroom Hours</h4>
                    <p>Monday - Saturday: 10:00 AM - 8:00 PM</p>
                    <p>Sunday: 12:00 PM - 6:00 PM</p>
                    <p>Appointments available outside hours</p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <h2 class="section-title">Frequently Asked Questions</h2>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>How do I care for my jewelry?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Store jewelry in a cool, dry place away from direct sunlight. Clean with a soft cloth and avoid contact with chemicals, perfumes, or lotions. For professional cleaning, visit our showroom or contact our experts.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What is your return policy?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>We offer a 30-day return policy for unworn jewelry and unopened cosmetics. Items must be in original condition with all packaging. Custom pieces may have different return terms.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Do you offer jewelry repair services?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we provide professional jewelry repair services including resizing, stone replacement, and restoration. Contact us for a quote and estimated timeline for your specific needs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>How can I find the right shade for cosmetics?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Visit our showroom for professional color matching, or use our online shade finder tool. We also offer virtual consultations to help you find the perfect match from home.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Do you offer warranties on your products?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>All jewelry comes with a 1-year warranty covering manufacturing defects. Cosmetics are guaranteed for quality and satisfaction. Extended warranties are available for premium pieces.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Can I schedule a private consultation?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We offer private consultations for both jewelry selection and cosmetic consultations. Book an appointment through our website or call us directly.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Floating Particles System
        const particlesContainer = document.getElementById('particles-container');

        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = x + 'px';
            particle.style.top = y + 'px';
            
            const offsetX = (Math.random() - 0.5) * 15;
            const offsetY = (Math.random() - 0.5) * 15;
            
            particle.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
            particlesContainer.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 2000);
        }

        // Create ambient particles
        setInterval(() => {
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * window.innerHeight;
            createParticle(x, y);
        }, 2500);

        // Create particles on card hover
        document.querySelectorAll('.contact-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                const rect = card.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                for (let i = 0; i < 4; i++) {
                    setTimeout(() => {
                        createParticle(
                            centerX + (Math.random() - 0.5) * 60,
                            centerY + (Math.random() - 0.5) * 60
                        );
                    }, i * 150);
                }
            });
        });

        // FAQ Toggle Functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const isActive = question.classList.contains('active');
                
                // Close all other FAQ items
                document.querySelectorAll('.faq-question').forEach(q => {
                    q.classList.remove('active');
                    q.nextElementSibling.classList.remove('active');
                });
                
                // Toggle current item
                if (!isActive) {
                    question.classList.add('active');
                    answer.classList.add('active');
                }
            });
        });

        // Form Submission
        document.querySelector('.contact-form form').addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Create success particles
            for (let i = 0; i < 10; i++) {
                setTimeout(() => {
                    createParticle(
                        Math.random() * window.innerWidth,
                        Math.random() * window.innerHeight
                    );
                }, i * 100);
            }
            
            alert('Thank you for your message! We\'ll get back to you within 24 hours.');
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
    </script>

<?php
include "../includes/footer.php";
?>