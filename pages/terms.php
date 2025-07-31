<?php include"../includes/header.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions</title>
</head>
<body>

    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #2c2c2c;
    background: #fafafa;
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.95), rgba(165, 42, 42, 0.95)), 
                radial-gradient(circle at 30% 70%, rgba(0, 0, 0, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(139, 0, 0, 0.06) 0%, transparent 50%);
    color: #ffffff;
    padding: 80px 0 60px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(0, 0, 0, 0.03) 50%, transparent 60%);
    animation: darkShimmer 15s ease-in-out infinite;
}

@keyframes darkShimmer {
    0%, 100% { opacity: 0.2; transform: translateX(-50px); }
    50% { opacity: 0.4; transform: translateX(50px); }
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
    font-weight: 900;
    background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 50%, #e8e8e8 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: -1px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.hero .subtitle {
    font-size: 18px;
    margin-bottom: 30px;
    opacity: 0.95;
    font-weight: 300;
    color: #f0f0f0;
}

/* Main Content */
.content-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
    position: relative;
}

.content-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 25% 25%, rgba(0, 0, 0, 0.02) 1px, transparent 1px),
        radial-gradient(circle at 75% 75%, rgba(139, 0, 0, 0.03) 1px, transparent 1px);
    background-size: 50px 50px, 30px 30px;
    opacity: 0.6;
}

.content-wrapper {
    background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
    border: 2px solid rgba(139, 0, 0, 0.15);
    border-radius: 20px;
    padding: 60px 50px;
    box-shadow: 0 20px 40px rgba(139, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
    z-index: 2;
}

.content-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #8b0000 0%, #a52a2a 50%, #b22222 100%);
}

.content-wrapper::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: 20px 20px;
    pointer-events: none;
    z-index: -1;
}

.section-title {
    font-size: 32px;
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 800;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid rgba(139, 0, 0, 0.2);
}

.section-subtitle {
    font-size: 20px;
    color: #8b0000;
    font-weight: 600;
    margin: 30px 0 15px;
    padding-left: 20px;
    position: relative;
}

.section-subtitle::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 20px;
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    border-radius: 2px;
}

.content-text {
    color: #2c2c2c;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 20px;
}

.content-text strong {
    color: #8b0000;
    font-weight: 600;
}

.content-list {
    margin: 20px 0;
    padding-left: 20px;
}

.content-list li {
    color: #2c2c2c;
    margin-bottom: 12px;
    position: relative;
    padding-left: 25px;
}

.content-list li::before {
    content: '→';
    color: #8b0000;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.highlight-box {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.08) 0%, rgba(165, 42, 42, 0.04) 100%);
    border: 2px solid rgba(139, 0, 0, 0.15);
    border-radius: 12px;
    padding: 25px;
    margin: 30px 0;
    position: relative;
}

.highlight-box::before {
    content: '⚖️';
    font-size: 20px;
    position: absolute;
    top: -10px;
    left: 20px;
    background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
    padding: 0 10px;
}

.warning-box {
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.08) 0%, rgba(220, 53, 69, 0.04) 100%);
    border: 2px solid rgba(220, 53, 69, 0.2);
    border-radius: 12px;
    padding: 25px;
    margin: 30px 0;
    position: relative;
}

.warning-box::before {
    content: '⚠️';
    font-size: 20px;
    position: absolute;
    top: -10px;
    left: 20px;
    background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
    padding: 0 10px;
}

.contact-info {
    background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
    border: 2px solid rgba(139, 0, 0, 0.15);
    border-radius: 15px;
    padding: 30px;
    margin: 40px 0;
    text-align: center;
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.08);
}

.contact-info h3 {
    color: #8b0000;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 700;
}

.contact-info p {
    color: #2c2c2c;
    margin-bottom: 10px;
    font-size: 16px;
}

.contact-info a {
    color: #8b0000;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border-bottom: 1px solid transparent;
}

.contact-info a:hover {
    color: #a52a2a;
    border-bottom-color: #a52a2a;
    text-shadow: 0 0 8px rgba(139, 0, 0, 0.3);
}

.last-updated {
    text-align: center;
    padding: 30px;
    background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
    border-radius: 15px;
    margin-top: 40px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.last-updated p {
    color: #666;
    font-size: 14px;
    margin-bottom: 10px;
}

.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3), 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(139, 0, 0, 0.4), 0 6px 12px rgba(0, 0, 0, 0.15);
    background: linear-gradient(135deg, #a52a2a 0%, #b22222 100%);
}

.table-container {
    background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
    border: 2px solid rgba(139, 0, 0, 0.15);
    border-radius: 12px;
    padding: 20px;
    margin: 25px 0;
    overflow-x: auto;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.06);
}

.policy-table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
}

.policy-table th,
.policy-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
}

.policy-table th {
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    color: #ffffff;
    font-weight: 600;
    font-size: 14px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.policy-table td {
    color: #2c2c2c;
    font-size: 14px;
}

.policy-table tr:hover td {
    background-color: rgba(139, 0, 0, 0.02);
}

.policy-table tr:last-child td {
    border-bottom: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 36px;
    }

    .hero .subtitle {
        font-size: 16px;
    }

    .content-wrapper {
        padding: 40px 30px;
    }

    .section-title {
        font-size: 28px;
    }

    .section-subtitle {
        font-size: 18px;
    }

    .content-text {
        font-size: 15px;
    }

    .policy-table {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .hero {
        padding: 60px 0 40px;
    }

    .hero h1 {
        font-size: 28px;
    }

    .content-section {
        padding: 60px 0;
    }

    .content-wrapper {
        padding: 30px 20px;
    }

    .section-title {
        font-size: 24px;
    }

    .back-to-top {
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
    }
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f5f5f5;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    border-radius: 10px;
    border: 2px solid #f5f5f5;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #a52a2a 0%, #b22222 100%);
}

    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Terms & Conditions</h1>
                <p class="subtitle">Please read these terms carefully before using our premium services.</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content-section">
        <div class="container">
            <div class="content-wrapper">
                
                <div class="section-title">Terms & Conditions</div>
                
                <p class="content-text">
                    Welcome to <strong>Premium Store</strong>. These Terms and Conditions ("Terms") govern your use of our website and the purchase of our luxury jewelry and cosmetics products. By accessing our website or making a purchase, you agree to be bound by these Terms.
                </p>

                <div class="highlight-box">
                    <p class="content-text">
                        <strong>Effective Date:</strong> These Terms are effective as of January 1, 2025, and apply to all users and customers of Premium Store.
                    </p>
                </div>

                <h2 class="section-subtitle">1. Acceptance of Terms</h2>
                <p class="content-text">
                    By accessing, browsing, or using our website, you acknowledge that you have read, understood, and agree to be bound by these Terms and our Privacy Policy. If you do not agree with these Terms, please do not use our website or services.
                </p>

                <h2 class="section-subtitle">2. Eligibility</h2>
                <p class="content-text">
                    To use our services and make purchases, you must:
                </p>
                <ul class="content-list">
                    <li>Be at least 18 years of age or have parental/guardian consent</li>
                    <li>Have the legal capacity to enter into binding contracts</li>
                    <li>Provide accurate and complete information during registration and checkout</li>
                    <li>Comply with all applicable laws and regulations</li>
                </ul>

                <h2 class="section-subtitle">3. Products and Services</h2>
                <p class="content-text">
                    <strong>Premium Store</strong> specializes in luxury jewelry and cosmetics. All products are subject to availability and we reserve the right to:
                </p>
                <ul class="content-list">
                    <li>Modify or discontinue products without prior notice</li>
                    <li>Limit quantities available for purchase</li>
                    <li>Refuse service to any customer at our discretion</li>
                    <li>Update product descriptions, prices, and availability</li>
                </ul>

                <h2 class="section-subtitle">4. Pricing and Payment</h2>
                <p class="content-text">
                    All prices are displayed in Pakistani Rupees (PKR) and are subject to change without notice. Payment terms include:
                </p>
                <ul class="content-list">
                    <li>Full payment required at time of purchase</li>
                    <li>Accepted payment methods: Credit/Debit cards, Bank transfers, Digital wallets</li>
                    <li>All transactions are processed securely through encrypted payment gateways</li>
                    <li>Prices include applicable taxes unless otherwise stated</li>
                    <li>Additional charges may apply for international shipping</li>
                </ul>

                <div class="table-container">
                    <table class="policy-table">
                        <thead>
                            <tr>
                                <th>Product Category</th>
                                <th>Price Range</th>
                                <th>Special Terms</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Luxury Jewelry</td>
                                <td>$299 - $1,999</td>
                                <td>Authenticity certificate included</td>
                            </tr>
                            <tr>
                                <td>Premium Cosmetics</td>
                                <td>$49 - $799</td>
                                <td>Expiry date guarantee</td>
                            </tr>
                            <tr>
                                <td>Beauty Tools</td>
                                <td>$99 - $599</td>
                                <td>1-year manufacturer warranty</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="section-subtitle">5. Order Processing and Fulfillment</h2>
                <p class="content-text">
                    Order processing follows these guidelines:
                </p>
                <ul class="content-list">
                    <li><strong>Order Confirmation:</strong> You will receive email confirmation within 24 hours</li>
                    <li><strong>Processing Time:</strong> 1-3 business days for order preparation</li>
                    <li><strong>Shipping:</strong> 3-7 business days for domestic delivery</li>
                    <li><strong>International Shipping:</strong> 7-14 business days depending on destination</li>
                    <li><strong>Tracking:</strong> Tracking information provided upon shipment</li>
                </ul>

                <h2 class="section-subtitle">6. Shipping and Delivery</h2>
                <p class="content-text">
                    We offer premium shipping services with the following terms:
                </p>
                <ul class="content-list">
                    <li>Free shipping on orders over $200 within Pakistan</li>
                    <li>Express shipping available for additional charges</li>
                    <li>Signature required for high-value jewelry items</li>
                    <li>Risk of loss transfers to buyer upon delivery</li>
                    <li>Delivery delays due to weather or customs are not our responsibility</li>
                </ul>

                <h2 class="section-subtitle">7. Returns and Exchanges</h2>
                <p class="content-text">
                    We want you to be completely satisfied with your purchase. Our return policy includes:
                </p>
                <ul class="content-list">
                    <li><strong>Return Period:</strong> 30 days from delivery date</li>
                    <li><strong>Condition:</strong> Items must be unused, in original packaging</li>
                    <li><strong>Jewelry:</strong> Must include authenticity certificate and original box</li>
                    <li><strong>Cosmetics:</strong> Must be unopened and sealed (hygiene regulations)</li>
                    <li><strong>Return Shipping:</strong> Customer responsible unless item is defective</li>
                    <li><strong>Refund Processing:</strong> 5-10 business days after return received</li>
                </ul>

                <div class="warning-box">
                    <p class="content-text">
                        <strong>Important:</strong> Custom or personalized jewelry items cannot be returned unless defective. All cosmetics returns must comply with health and safety regulations.
                    </p>
                </div>

                <h2 class="section-subtitle">8. Product Warranties</h2>
                <p class="content-text">
                    We provide the following warranties on our products:
                </p>
                <ul class="content-list">
                    <li><strong>Jewelry:</strong> 1-year warranty against manufacturing defects</li>
                    <li><strong>Cosmetics:</strong> Satisfaction guarantee until expiry date</li>
                    <li><strong>Beauty Tools:</strong> Manufacturer warranty as specified</li>
                    <li><strong>Exclusions:</strong> Damage from misuse, normal wear, or accidents</li>
                </ul>

                <h2 class="section-subtitle">9. Intellectual Property</h2>
                <p class="content-text">
                    All content on our website, including but not limited to text, graphics, logos, images, and software, is the property of Premium Store and is protected by copyright, trademark, and other intellectual property laws. You may not:
                </p>
                <ul class="content-list">
                    <li>Reproduce, distribute, or modify any content without permission</li>
                    <li>Use our trademarks or brand names without authorization</li>
                    <li>Reverse engineer or copy our website design or functionality</li>
                    <li>Create derivative works based on our content</li>
                </ul>

                <h2 class="section-subtitle">10. User Conduct</h2>
                <p class="content-text">
                    When using our website, you agree not to:
                </p>
                <ul class="content-list">
                    <li>Violate any applicable laws or regulations</li>
                    <li>Interfere with or disrupt our website or servers</li>
                    <li>Attempt to gain unauthorized access to our systems</li>
                    <li>Upload harmful or malicious content</li>
                    <li>Engage in fraudulent or deceptive practices</li>
                    <li>Harass or threaten other users or our staff</li>
                </ul>

                <h2 class="section-subtitle">11. Privacy and Data Protection</h2>
                <p class="content-text">
                    Your privacy is important to us. Our collection, use, and protection of your personal information is governed by our Privacy Policy, which is incorporated into these Terms by reference. By using our services, you consent to our privacy practices.
                </p>

                <h2 class="section-subtitle">12. Limitation of Liability</h2>
                <p class="content-text">
                    To the fullest extent permitted by law, Premium Store shall not be liable for:
                </p>
                <ul class="content-list">
                    <li>Indirect, incidental, or consequential damages</li>
                    <li>Loss of profits, data, or business opportunities</li>
                    <li>Damages exceeding the amount paid for the product</li>
                    <li>Delays or failures due to circumstances beyond our control</li>
                </ul>

                <h2 class="section-subtitle">13. Indemnification</h2>
                <p class="content-text">
                    You agree to indemnify and hold harmless Premium Store, its officers, directors, employees, and agents from any claims, damages, losses, or expenses arising from your use of our website or violation of these Terms.
                </p>

                <h2 class="section-subtitle">14. Force Majeure</h2>
                <p class="content-text">
                    We shall not be liable for any failure to perform our obligations under these Terms if such failure is due to circumstances beyond our reasonable control, including but not limited to acts of God, war, terrorism, pandemic, government actions, or natural disasters.
                </p>

                <h2 class="section-subtitle">15. Governing Law and Jurisdiction</h2>
                <p class="content-text">
                    These Terms shall be governed by and construed in accordance with the laws of Pakistan. Any disputes arising from these Terms or your use of our services shall be subject to the exclusive jurisdiction of the courts in Karachi, Sindh, Pakistan.
                </p>

                <h2 class="section-subtitle">16. Dispute Resolution</h2>
                <p class="content-text">
                    In the event of any dispute, we encourage you to first contact our customer service team. If the dispute cannot be resolved through direct communication, it may be subject to mediation or arbitration as permitted by law.
                </p>

                <h2 class="section-subtitle">17. Modifications to Terms</h2>
                <p class="content-text">
                    We reserve the right to modify these Terms at any time. Changes will be posted on our website with an updated effective date. Your continued use of our services after any modifications constitutes acceptance of the revised Terms.
                </p>

                <h2 class="section-subtitle">18. Severability</h2>
                <p class="content-text">
                    If any provision of these Terms is found to be invalid or unenforceable, the remaining provisions shall continue in full force and effect. The invalid provision shall be replaced with a valid provision that most closely reflects the original intent.
                </p>

                <h2 class="section-subtitle">19. Entire Agreement</h2>
                <p class="content-text">
                    These Terms, together with our Privacy Policy, constitute the entire agreement between you and Premium Store regarding your use of our services and supersede all prior agreements and understandings.
                </p>

                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p>For questions about these Terms & Conditions, please contact us:</p>
                    <p><strong>Email:</strong> <a href="mailto:legal@premiumstore.com">legal@premiumstore.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+92-21-1234-5678">+92-21-1234-5678</a></p>
                    <p><strong>Address:</strong> Premium Store, Karachi, Sindh, Pakistan</p>
                    <p><strong>Business Hours:</strong> Monday - Friday, 9:00 AM - 6:00 PM (PST)</p>
                </div>

                <div class="last-updated">
                    <p><strong>Last Updated:</strong> January 1, 2025</p>
                    <p>These Terms & Conditions are effective immediately and govern all transactions and interactions with Premium Store.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        ↑
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Back to top functionality
            const backToTopBtn = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            });

            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Smooth scrolling for internal links
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

            // Highlight important sections on scroll
            const sections = document.querySelectorAll('.section-subtitle');
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '-50px 0px'
            };

            const sectionObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.transform = 'translateX(5px)';
                        entry.target.style.transition = 'transform 0.3s ease';
                    } else {
                        entry.target.style.transform = 'translateX(0)';
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                sectionObserver.observe(section);
            });
        });
    </script>
</body>
</html>

<?php include"../includes/footer.php"?>