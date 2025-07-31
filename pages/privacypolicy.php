<?php include"../includes/header.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
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
    color: #2c1810;
    background: linear-gradient(135deg, #ffffff 0%, #f8f6f6 50%, #f0ebe8 100%);
    overflow-x: hidden;
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
        radial-gradient(circle at 25% 75%, rgba(0, 0, 0, 0.02) 1px, transparent 1px),
        radial-gradient(circle at 75% 25%, rgba(0, 0, 0, 0.03) 1px, transparent 1px),
        radial-gradient(circle at 50% 50%, rgba(0, 0, 0, 0.01) 1px, transparent 1px);
    background-size: 60px 60px, 80px 80px, 100px 100px;
    pointer-events: none;
    z-index: 1;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

/* Hero Section */
.hero {
    background: 
        linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 246, 246, 0.95)), 
        radial-gradient(circle at 30% 70%, rgba(139, 21, 56, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(139, 21, 56, 0.06) 0%, transparent 50%);
    color: #2c1810;
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
    background: 
        linear-gradient(45deg, transparent 40%, rgba(139, 21, 56, 0.02) 50%, transparent 60%),
        linear-gradient(135deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: auto, 30px 30px;
    animation: maroonShimmer 15s ease-in-out infinite;
}

@keyframes maroonShimmer {
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
    background: linear-gradient(135deg, #8b1538 0%, #a91b47 50%, #c72156 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: -1px;
}

.hero .subtitle {
    font-size: 18px;
    margin-bottom: 30px;
    opacity: 0.8;
    font-weight: 300;
    color: #4a3228;
}

/* Main Content */
.content-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8f6f6 100%);
}

.content-wrapper {
    background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
    border: 1px solid rgba(139, 21, 56, 0.15);
    border-radius: 20px;
    padding: 60px 50px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.content-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #8b1538 0%, #a91b47 50%, #c72156 100%);
}

.content-wrapper::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: 25px 25px, 25px 25px;
    pointer-events: none;
}

.section-title {
    font-size: 32px;
    background: linear-gradient(135deg, #8b1538 0%, #a91b47 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 800;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(139, 21, 56, 0.2);
    position: relative;
    z-index: 3;
}

.section-subtitle {
    font-size: 20px;
    color: #8b1538;
    font-weight: 600;
    margin: 30px 0 15px;
    padding-left: 20px;
    position: relative;
    z-index: 3;
}

.section-subtitle::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 20px;
    background: linear-gradient(135deg, #8b1538 0%, #a91b47 100%);
    border-radius: 2px;
}

.content-text {
    color: rgba(44, 24, 16, 0.9);
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 20px;
    position: relative;
    z-index: 3;
}

.content-text strong {
    color: #8b1538;
    font-weight: 600;
}

.content-list {
    margin: 20px 0;
    padding-left: 20px;
    position: relative;
    z-index: 3;
}

.content-list li {
    color: rgba(44, 24, 16, 0.9);
    margin-bottom: 12px;
    position: relative;
    padding-left: 25px;
}

.content-list li::before {
    content: '→';
    color: #8b1538;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.highlight-box {
    background: 
        linear-gradient(135deg, rgba(139, 21, 56, 0.1) 0%, rgba(169, 27, 71, 0.05) 100%),
        linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: auto, 20px 20px;
    border: 1px solid rgba(139, 21, 56, 0.2);
    border-radius: 12px;
    padding: 25px;
    margin: 30px 0;
    position: relative;
    z-index: 3;
}

.highlight-box::before {
    content: '🔒';
    font-size: 20px;
    position: absolute;
    top: -10px;
    left: 20px;
    background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
    padding: 0 10px;
}

.contact-info {
    background: 
        linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(254, 254, 254, 0.9) 100%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: auto, 15px 15px;
    border: 1px solid rgba(139, 21, 56, 0.2);
    border-radius: 15px;
    padding: 30px;
    margin: 40px 0;
    text-align: center;
    position: relative;
    z-index: 3;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
}

.contact-info h3 {
    color: #8b1538;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 700;
}

.contact-info p {
    color: rgba(44, 24, 16, 0.9);
    margin-bottom: 10px;
    font-size: 16px;
}

.contact-info a {
    color: #8b1538;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.contact-info a:hover {
    color: #a91b47;
    text-shadow: 0 0 10px rgba(139, 21, 56, 0.3);
}

.last-updated {
    text-align: center;
    padding: 30px;
    background: 
        linear-gradient(135deg, rgba(248, 246, 246, 0.9) 0%, rgba(240, 235, 232, 0.9) 100%),
        linear-gradient(45deg, rgba(0, 0, 0, 0.02) 25%, transparent 25%);
    background-size: auto, 12px 12px;
    border-radius: 15px;
    margin-top: 40px;
    border: 1px solid rgba(139, 21, 56, 0.1);
    position: relative;
    z-index: 3;
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
    background: linear-gradient(135deg, #8b1538 0%, #a91b47 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(139, 21, 56, 0.3);
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    z-index: 1000;
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(139, 21, 56, 0.4);
    background: linear-gradient(135deg, #a91b47 0%, #8b1538 100%);
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
    width: 6px;
}

::-webkit-scrollbar-track {
    background: #f8f6f6;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #8b1538 0%, #a91b47 100%);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #a91b47 0%, #8b1538 100%);
}

    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Privacy Policy</h1>
                <p class="subtitle">Your privacy is our priority. Learn how we protect your information.</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content-section">
        <div class="container">
            <div class="content-wrapper">
                
                <div class="section-title">Privacy Policy</div>
                
                <p class="content-text">
                    At <strong>Premium Store</strong>, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and make purchases from our luxury jewelry and cosmetics collection.
                </p>

                <div class="highlight-box">
                    <p class="content-text">
                        <strong>Effective Date:</strong> This Privacy Policy is effective as of January 1, 2025, and applies to all users of our website and services.
                    </p>
                </div>

                <h2 class="section-subtitle">1. Information We Collect</h2>
                <p class="content-text">
                    We collect several types of information from and about users of our website, including:
                </p>
                <ul class="content-list">
                    <li><strong>Personal Information:</strong> Name, email address, phone number, billing and shipping addresses</li>
                    <li><strong>Payment Information:</strong> Credit card details, payment method preferences (processed securely through encrypted payment gateways)</li>
                    <li><strong>Account Information:</strong> Username, password, purchase history, wishlist items</li>
                    <li><strong>Technical Information:</strong> IP address, browser type, device information, cookies and tracking data</li>
                    <li><strong>Usage Information:</strong> Pages visited, products viewed, time spent on site, search queries</li>
                    <li><strong>Communication Data:</strong> Customer service interactions, newsletter subscriptions, marketing preferences</li>
                </ul>

                <h2 class="section-subtitle">2. How We Use Your Information</h2>
                <p class="content-text">
                    We use the information we collect for the following purposes:
                </p>
                <ul class="content-list">
                    <li>Processing and fulfilling your orders for jewelry and cosmetics</li>
                    <li>Providing customer service and support</li>
                    <li>Personalizing your shopping experience and product recommendations</li>
                    <li>Sending order confirmations, shipping notifications, and account updates</li>
                    <li>Marketing communications (with your consent) about new products, sales, and exclusive offers</li>
                    <li>Improving our website functionality and user experience</li>
                    <li>Preventing fraud and ensuring website security</li>
                    <li>Complying with legal obligations and resolving disputes</li>
                </ul>

                <h2 class="section-subtitle">3. Information Sharing and Disclosure</h2>
                <p class="content-text">
                    We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except in the following circumstances:
                </p>
                <ul class="content-list">
                    <li><strong>Service Providers:</strong> Trusted partners who assist with payment processing, shipping, email marketing, and website analytics</li>
                    <li><strong>Legal Requirements:</strong> When required by law, court order, or government regulation</li>
                    <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of business assets</li>
                    <li><strong>Protection of Rights:</strong> To protect our rights, property, or safety, or that of our customers</li>
                </ul>

                <h2 class="section-subtitle">4. Data Security</h2>
                <p class="content-text">
                    We implement industry-standard security measures to protect your personal information:
                </p>
                <ul class="content-list">
                    <li>SSL encryption for all data transmission</li>
                    <li>Secure payment processing through certified providers</li>
                    <li>Regular security audits and vulnerability assessments</li>
                    <li>Restricted access to personal information on a need-to-know basis</li>
                    <li>Secure data storage with backup and recovery procedures</li>
                </ul>

                <div class="highlight-box">
                    <p class="content-text">
                        <strong>Important:</strong> While we strive to protect your personal information, no method of transmission over the internet or electronic storage is 100% secure. We cannot guarantee absolute security but continuously work to enhance our security measures.
                    </p>
                </div>

                <h2 class="section-subtitle">5. Cookies and Tracking Technologies</h2>
                <p class="content-text">
                    We use cookies and similar tracking technologies to enhance your browsing experience:
                </p>
                <ul class="content-list">
                    <li><strong>Essential Cookies:</strong> Required for website functionality and security</li>
                    <li><strong>Performance Cookies:</strong> Help us understand how visitors interact with our website</li>
                    <li><strong>Functional Cookies:</strong> Enable personalized features and remember your preferences</li>
                    <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements and track campaign effectiveness</li>
                </ul>

                <h2 class="section-subtitle">6. Your Rights and Choices</h2>
                <p class="content-text">
                    You have the following rights regarding your personal information:
                </p>
                <ul class="content-list">
                    <li><strong>Access:</strong> Request a copy of the personal information we hold about you</li>
                    <li><strong>Correction:</strong> Update or correct inaccurate personal information</li>
                    <li><strong>Deletion:</strong> Request deletion of your personal information (subject to legal requirements)</li>
                    <li><strong>Portability:</strong> Receive your personal information in a structured, machine-readable format</li>
                    <li><strong>Opt-out:</strong> Unsubscribe from marketing communications at any time</li>
                    <li><strong>Cookie Control:</strong> Manage cookie preferences through your browser settings</li>
                </ul>

                <h2 class="section-subtitle">7. Children's Privacy</h2>
                <p class="content-text">
                    Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately so we can remove such information.
                </p>

                <h2 class="section-subtitle">8. International Data Transfers</h2>
                <p class="content-text">
                    If you are located outside of Pakistan, please note that your information may be transferred to and processed in Pakistan or other countries where our service providers operate. We ensure appropriate safeguards are in place to protect your personal information in accordance with applicable data protection laws.
                </p>

                <h2 class="section-subtitle">9. Data Retention</h2>
                <p class="content-text">
                    We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law. When we no longer need your personal information, we will securely delete or anonymize it.
                </p>

                <h2 class="section-subtitle">10. Changes to This Privacy Policy</h2>
                <p class="content-text">
                    We may update this Privacy Policy from time to time to reflect changes in our practices or applicable laws. We will notify you of any material changes by posting the updated Privacy Policy on our website and updating the "Last Updated" date. We encourage you to review this Privacy Policy periodically.
                </p>

                <div class="contact-info">
                    <h3>Contact Us</h3>
                    <p>If you have any questions about this Privacy Policy or our privacy practices, please contact us:</p>
                    <p><strong>Email:</strong> <a href="mailto:privacy@premiumstore.com">privacy@premiumstore.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+92-21-1234-5678">+92-21-1234-5678</a></p>
                    <p><strong>Address:</strong> Premium Store, Karachi, Sindh, Pakistan</p>
                </div>

                <div class="last-updated">
                    <p><strong>Last Updated:</strong> January 1, 2025</p>
                    <p>This Privacy Policy is part of our Terms of Service and governs your use of our website and services.</p>
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
        });
    </script>
</body>
</html>
<?php include"../includes/footer.php"?>