<?php
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Policy</title>
</head>
<body>
    
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Georgia', serif;
    background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
    color: #2c2c2c;
    overflow-x: hidden;
    min-height: 100vh;
    line-height: 1.6;
    position: relative;
}

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(0, 0, 0, 0.02) 1px, transparent 1px),
        radial-gradient(circle at 70% 80%, rgba(139, 0, 0, 0.03) 1px, transparent 1px),
        linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: 40px 40px, 60px 60px, 20px 20px, 20px 20px;
    pointer-events: none;
    z-index: -1;
}

/* Floating Particles System */
.particle {
    position: fixed;
    width: 3px;
    height: 3px;
    background: #8b0000;
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
    background: radial-gradient(circle at center, rgba(139, 0, 0, 0.1) 0%, transparent 70%);
    border-bottom: 2px solid rgba(139, 0, 0, 0.15);
    backdrop-filter: blur(10px);
}

.header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(0, 0, 0, 0.02) 50%, transparent 60%);
    animation: darkShimmer 15s ease-in-out infinite;
}

@keyframes darkShimmer {
    0%, 100% { opacity: 0.3; transform: translateX(-30px); }
    50% { opacity: 0.6; transform: translateX(30px); }
}

.header h1 {
    font-size: clamp(2rem, 6vw, 3.5rem);
    font-weight: 300;
    letter-spacing: 2px;
    margin-bottom: 10px;
    background: linear-gradient(45deg, #8b0000, #a52a2a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    z-index: 2;
}

.header p {
    font-size: 1.1rem;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
    color: #4a4a4a;
    position: relative;
    z-index: 2;
}

.back-link {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 25px;
    background: transparent;
    border: 2px solid #8b0000;
    color: #8b0000;
    text-decoration: none;
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 2;
    border-radius: 5px;
}

.back-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    transition: left 0.3s ease;
    z-index: -1;
}

.back-link:hover::before {
    left: 0;
}

.back-link:hover {
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(139, 0, 0, 0.3);
}

/* Content Container */
.content {
    max-width: 900px;
    margin: 0 auto;
    padding: 60px 20px;
    position: relative;
    z-index: 2;
}

/* Policy Sections */
.policy-section {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
    border: 2px solid rgba(139, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.05), 0 2px 8px rgba(0, 0, 0, 0.03);
    position: relative;
    overflow: hidden;
}

.policy-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        linear-gradient(45deg, rgba(0, 0, 0, 0.005) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.005) 25%, transparent 25%);
    background-size: 15px 15px;
    pointer-events: none;
}

.policy-section:hover {
    border-color: rgba(139, 0, 0, 0.25);
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15), 0 4px 15px rgba(0, 0, 0, 0.05);
}

.policy-section h2 {
    color: #8b0000;
    font-size: 1.8rem;
    margin-bottom: 20px;
    font-weight: 400;
    letter-spacing: 1px;
    position: relative;
    z-index: 2;
}

.policy-section h3 {
    color: #8b0000;
    font-size: 1.4rem;
    margin-bottom: 15px;
    margin-top: 25px;
    font-weight: 400;
    position: relative;
    z-index: 2;
}

.policy-section p {
    margin-bottom: 15px;
    color: #2c2c2c;
    font-size: 1rem;
    position: relative;
    z-index: 2;
}

.policy-section ul {
    margin-left: 20px;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

.policy-section li {
    margin-bottom: 8px;
    color: #4a4a4a;
}

.policy-section li strong {
    color: #8b0000;
}

/* Cookie Types Table */
.cookie-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.08);
    border: 1px solid rgba(139, 0, 0, 0.1);
    position: relative;
    z-index: 2;
}

.cookie-table th,
.cookie-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
}

.cookie-table th {
    background: linear-gradient(135deg, #8b0000 0%, #a52a2a 100%);
    color: #ffffff;
    font-weight: 600;
    font-size: 1.1rem;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.cookie-table td {
    color: #2c2c2c;
    background: rgba(255, 255, 255, 0.8);
}

.cookie-table tr:hover td {
    background: rgba(139, 0, 0, 0.05);
    color: #1a1a1a;
}

.cookie-table tr:last-child td {
    border-bottom: none;
}

/* Contact Info */
.contact-info {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.08) 0%, rgba(139, 0, 0, 0.04) 100%);
    border-radius: 15px;
    padding: 25px;
    margin-top: 40px;
    border: 2px solid rgba(139, 0, 0, 0.15);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.1);
    position: relative;
    z-index: 2;
}

.contact-info::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 30% 70%, rgba(0, 0, 0, 0.02) 1px, transparent 1px);
    background-size: 25px 25px;
    pointer-events: none;
    border-radius: 15px;
}

.contact-info h3 {
    color: #8b0000;
    margin-bottom: 15px;
    font-size: 1.4rem;
    position: relative;
    z-index: 2;
}

.contact-info p {
    position: relative;
    z-index: 2;
    color: #2c2c2c;
}

.contact-info a {
    color: #8b0000;
    text-decoration: none;
    transition: all 0.3s ease;
    border-bottom: 1px solid transparent;
    font-weight: 600;
}

.contact-info a:hover {
    color: #a52a2a;
    border-bottom-color: #a52a2a;
    text-shadow: 0 0 8px rgba(139, 0, 0, 0.3);
}

/* Last Updated */
.last-updated {
    text-align: center;
    margin-top: 40px;
    padding: 20px;
    font-style: italic;
    color: #666;
    border-top: 2px solid rgba(139, 0, 0, 0.15);
    background: rgba(139, 0, 0, 0.02);
    border-radius: 10px;
    position: relative;
    z-index: 2;
}

/* Responsive Design */
@media (max-width: 768px) {
    .header {
        padding: 30px 15px;
    }

    .content {
        padding: 40px 15px;
    }

    .policy-section {
        padding: 20px;
    }

    .cookie-table {
        font-size: 0.9rem;
    }

    .cookie-table th,
    .cookie-table td {
        padding: 10px;
    }
}

@media (max-width: 480px) {
    .header h1 {
        font-size: 2rem;
    }

    .policy-section h2 {
        font-size: 1.5rem;
    }

    .policy-section h3 {
        font-size: 1.2rem;
    }

    .cookie-table {
        font-size: 0.8rem;
    }

    .cookie-table th,
    .cookie-table td {
        padding: 8px;
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
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Header -->
    <header class="header">
        <h1>Cookie Policy</h1>
        <p>Understanding how Lumina uses cookies to enhance your browsing experience</p>
        <a href="../pages/index.php" class="back-link">← BACK TO LUMINA</a>
    </header>

    <!-- Content -->
    <div class="content">
        <!-- Introduction -->
        <section class="policy-section">
            <h2>What Are Cookies?</h2>
            <p>Cookies are small text files that are placed on your computer or mobile device when you visit our website. They are widely used to make websites work more efficiently and to provide information to website owners.</p>
            <p>At Lumina, we use cookies to enhance your browsing experience, remember your preferences, and provide you with personalized content related to our jewelry and cosmetics collections.</p>
        </section>

        <!-- Types of Cookies -->
        <section class="policy-section">
            <h2>Types of Cookies We Use</h2>
            
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Cookie Type</th>
                        <th>Purpose</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Essential Cookies</strong></td>
                        <td>Enable basic website functionality and security</td>
                        <td>Session</td>
                    </tr>
                    <tr>
                        <td><strong>Performance Cookies</strong></td>
                        <td>Help us understand how visitors interact with our site</td>
                        <td>1-2 years</td>
                    </tr>
                    <tr>
                        <td><strong>Functionality Cookies</strong></td>
                        <td>Remember your preferences and settings</td>
                        <td>1 year</td>
                    </tr>
                    <tr>
                        <td><strong>Marketing Cookies</strong></td>
                        <td>Track visits across websites to deliver relevant ads</td>
                        <td>13 months</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Specific Cookie Usage -->
        <section class="policy-section">
            <h2>How We Use Cookies</h2>
            
            <h3>Essential Cookies</h3>
            <p>These cookies are necessary for our website to function properly. They include:</p>
            <ul>
                <li><strong>Session Management:</strong> Maintain your session as you browse through our jewelry and cosmetics collections</li>
                <li><strong>Security:</strong> Protect against fraudulent activity and ensure secure browsing</li>
                <li><strong>Load Balancing:</strong> Distribute traffic efficiently across our servers</li>
            </ul>

            <h3>Performance & Analytics Cookies</h3>
            <p>We use these cookies to understand how visitors use our website:</p>
            <ul>
                <li><strong>Google Analytics:</strong> Track website usage and performance metrics</li>
                <li><strong>Page Views:</strong> Monitor which products and pages are most popular</li>
                <li><strong>User Journey:</strong> Understand how customers navigate through our collections</li>
            </ul>

            <h3>Functionality Cookies</h3>
            <p>These cookies enhance your experience by remembering your choices:</p>
            <ul>
                <li><strong>Language Preferences:</strong> Remember your preferred language settings</li>
                <li><strong>Display Preferences:</strong> Maintain your view preferences for product listings</li>
                <li><strong>Recently Viewed:</strong> Show products you've recently viewed</li>
            </ul>

            <h3>Marketing Cookies</h3>
            <p>With your consent, we use marketing cookies to:</p>
            <ul>
                <li><strong>Personalized Content:</strong> Show you relevant jewelry and cosmetics based on your interests</li>
                <li><strong>Social Media Integration:</strong> Enable sharing of products on social platforms</li>
                <li><strong>Advertising:</strong> Display targeted advertisements for Lumina products</li>
            </ul>
        </section>

        <!-- Third-Party Cookies -->
        <section class="policy-section">
            <h2>Third-Party Cookies</h2>
            <p>We may also use third-party cookies from trusted partners to enhance your experience:</p>
            <ul>
                <li><strong>Google Analytics:</strong> Website performance and visitor analytics</li>
                <li><strong>Facebook Pixel:</strong> Social media integration and advertising</li>
                <li><strong>Instagram Integration:</strong> Display our latest jewelry and cosmetics posts</li>
                <li><strong>YouTube:</strong> Embed product videos and tutorials</li>
            </ul>
            <p>These third parties have their own privacy policies, and we recommend reviewing them to understand how they handle your data.</p>
        </section>

        <!-- Managing Cookies -->
        <section class="policy-section">
            <h2>Managing Your Cookie Preferences</h2>
            
            <h3>Browser Settings</h3>
            <p>You can control and manage cookies through your browser settings. Most browsers allow you to:</p>
            <ul>
                <li>View what cookies are stored on your device</li>
                <li>Delete cookies individually or all at once</li>
                <li>Block cookies from specific websites</li>
                <li>Block all cookies from being set</li>
                <li>Get notified when a cookie is set</li>
            </ul>

            <h3>Cookie Consent</h3>
            <p>When you first visit our website, you'll see a cookie consent banner. You can:</p>
            <ul>
                <li><strong>Accept All:</strong> Allow all cookies for the best experience</li>
                <li><strong>Necessary Only:</strong> Only accept essential cookies</li>
                <li><strong>Customize:</strong> Choose which types of cookies to accept</li>
            </ul>

            <h3>Impact of Disabling Cookies</h3>
            <p>Please note that disabling certain cookies may affect your experience on our website:</p>
            <ul>
                <li>Some features may not work properly</li>
                <li>Your preferences may not be saved</li>
                <li>You may see less relevant content</li>
                <li>Website performance may be affected</li>
            </ul>
        </section>

        <!-- Data Retention -->
        <section class="policy-section">
            <h2>Data Retention</h2>
            <p>We retain cookie data for different periods depending on the type:</p>
            <ul>
                <li><strong>Session Cookies:</strong> Deleted when you close your browser</li>
                <li><strong>Persistent Cookies:</strong> Stored for a specific period (ranging from 30 days to 2 years)</li>
                <li><strong>Analytics Data:</strong> Retained for up to 26 months</li>
                <li><strong>Marketing Data:</strong> Retained for up to 13 months</li>
            </ul>
        </section>

        <!-- Updates -->
        <section class="policy-section">
            <h2>Updates to This Policy</h2>
            <p>We may update this Cookie Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. When we make material changes, we will notify you by:</p>
            <ul>
                <li>Posting a notice on our website</li>
                <li>Sending an email notification (if you've provided your email)</li>
                <li>Updating the "Last Updated" date at the bottom of this policy</li>
            </ul>
        </section>

        <!-- Contact Information -->
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p>If you have any questions about our use of cookies or this Cookie Policy, please contact us:</p>
            <p><strong>Email:</strong> <a href="mailto:privacy@lumina.com">privacy@lumina.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+1-800-LUMINA">+1-800-LUMINA</a></p>
            <p><strong>Address:</strong> Lumina Privacy Team, 123 Elegance Avenue, New York, NY 10001</p>
        </div>

        <!-- Last Updated -->
        <div class="last-updated">
            <p>Last Updated: July 3, 2025</p>
        </div>
    </div>

    <script>
        // Floating Particles System (simplified for policy page)
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
        }, 3000);

        // Create particles on section hover
        document.querySelectorAll('.policy-section').forEach(section => {
            section.addEventListener('mouseenter', () => {
                const rect = section.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                for (let i = 0; i < 3; i++) {
                    setTimeout(() => {
                        createParticle(
                            centerX + (Math.random() - 0.5) * 50,
                            centerY + (Math.random() - 0.5) * 50
                        );
                    }, i * 200);
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
    </script>
</body>
</html>

<?php
include "../includes/footer.php";
?>