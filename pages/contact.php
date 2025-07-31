<?php
include "../includes/header.php";

if(isset($_SESSION['submited'])){
    ?>
    <div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check" style="font-size:18px;"></i>
  <strong><?php echo $_SESSION['submited'];?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
<?php
unset($_SESSION['submited']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Scoped styles to avoid conflicts with header */
.contact-page-body {
    font-family: 'Georgia', serif;
    line-height: 1.6;
    color: #333333;
    background: #ffffff;
}

/* Hero Section */
.contact-hero {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 248, 248, 0.9)), 
                radial-gradient(circle at 20% 50%, rgba(139, 69, 19, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(165, 42, 42, 0.1) 0%, transparent 50%);
    color: #333333;
    padding: 100px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
    border-bottom: 2px solid #f0f0f0;
}

.contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="1" fill="rgba(139,69,19,0.2)"/><circle cx="80" cy="40" r="2" fill="rgba(165,42,42,0.3)"/><circle cx="40" cy="80" r="1.5" fill="rgba(139,69,19,0.2)"/><circle cx="60" cy="10" r="1" fill="rgba(165,42,42,0.4)"/></svg>');
    animation: contact-float 25s ease-in-out infinite;
}

@keyframes contact-float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(180deg); }
}

.contact-hero-content {
    position: relative;
    z-index: 2;
}

.contact-hero h1 {
    font-size: 56px;
    margin-bottom: 20px;
    font-weight: 700;
    background: linear-gradient(135deg, #8B4513 0%, #A52A2A 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 0 30px rgba(139, 69, 19, 0.3);
}

.contact-hero p {
    font-size: 22px;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
    color: #666666;
}

/* Contact Section */
.contact-main-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
}

.contact-section-title {
    text-align: center;
    margin-bottom: 60px;
}

.contact-section-title h2 {
    font-size: 48px;
    color: #8B4513;
    margin-bottom: 15px;
    font-weight: 700;
}

.contact-section-title p {
    font-size: 18px;
    color: #666666;
    max-width: 600px;
    margin: 0 auto;
}

.contact-main-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    margin-top: 60px;
}

/* Contact Info */
.contact-info-panel {
    background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
    padding: 50px;
    border-radius: 25px;
    box-shadow: 0 20px 60px rgba(139, 69, 19, 0.1);
    height: fit-content;
    border: 1px solid rgba(139, 69, 19, 0.2);
    position: relative;
    overflow: hidden;
}

.contact-info-panel::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #8B4513 0%, #A52A2A 100%);
}

.contact-info-panel h2 {
    color: #8B4513;
    margin-bottom: 40px;
    font-size: 32px;
    font-weight: 700;
}

.contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 35px;
    padding: 25px;
    background: rgba(139, 69, 19, 0.05);
    border-radius: 20px;
    transition: all 0.3s;
    border: 1px solid rgba(139, 69, 19, 0.1);
}

.contact-info-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(139, 69, 19, 0.2);
    border-color: rgba(139, 69, 19, 0.3);
}

.contact-info-icon {
    background: linear-gradient(135deg, #8B4513 0%, #A52A2A 100%);
    color: #ffffff;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3);
}

.contact-info-details h3 {
    color: #8B4513;
    margin-bottom: 8px;
    font-size: 20px;
    font-weight: 600;
}

.contact-info-details p {
    color: #666666;
    margin: 0;
    font-size: 16px;
}

/* Contact Form */
.contact-form-panel {
    background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
    padding: 50px;
    border-radius: 25px;
    box-shadow: 0 20px 60px rgba(139, 69, 19, 0.1);
    border: 1px solid rgba(139, 69, 19, 0.2);
    position: relative;
    overflow: hidden;
}

.contact-form-panel::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #8B4513 0%, #A52A2A 100%);
}

.contact-form-panel h2 {
    color: #8B4513;
    margin-bottom: 40px;
    font-size: 32px;
    font-weight: 700;
}

.contact-form-group {
    margin-bottom: 30px;
}

.contact-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}

.contact-form-panel label {
    display: block;
    margin-bottom: 10px;
    color: #8B4513;
    font-weight: 600;
    font-size: 16px;
}

.contact-form-panel input[type="text"],
.contact-form-panel input[type="email"],
.contact-form-panel input[type="tel"],
.contact-form-panel select,
.contact-form-panel textarea {
    width: 100%;
    padding: 18px;
    border: 2px solid rgba(139, 69, 19, 0.2);
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s;
    outline: none;
    background: rgba(255, 255, 255, 0.8);
    color: #333333;
    backdrop-filter: blur(5px);
}

.contact-form-panel input::placeholder,
.contact-form-panel textarea::placeholder {
    color: #999999;
}

.contact-form-panel input:focus,
.contact-form-panel select:focus,
.contact-form-panel textarea:focus {
    border-color: #8B4513;
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 0 0 4px rgba(139, 69, 19, 0.1);
    transform: translateY(-2px);
}

.contact-form-panel select {
    cursor: pointer;
}

.contact-form-panel select option {
    background: #ffffff;
    color: #333333;
}

.contact-form-panel textarea {
    resize: vertical;
    min-height: 140px;
}

.contact-submit-btn {
    background: linear-gradient(135deg, #8B4513 0%, #A52A2A 100%);
    color: #ffffff;
    padding: 18px 45px;
    border: none;
    border-radius: 30px;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    width: 100%;
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3);
}

.contact-submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.contact-submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(139, 69, 19, 0.4);
}

.contact-submit-btn:hover::before {
    left: 100%;
}

.contact-submit-btn:active {
    transform: translateY(-1px);
}

/* Map Section */
.contact-map-section {
    background: #f8f8f8;
    padding: 100px 0;
}

.contact-map-container {
    background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
    height: 450px;
    border-radius: 25px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8B4513;
    font-size: 20px;
    font-weight: 600;
    border: 1px solid rgba(139, 69, 19, 0.2);
    box-shadow: 0 20px 60px rgba(139, 69, 19, 0.1);
}

.contact-map-title {
    text-align: center; 
    color: #A52A2A; 
    margin-bottom: 50px; 
    font-size: 36px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-hero h1 {
        font-size: 42px;
    }

    .contact-hero p {
        font-size: 20px;
    }

    .contact-main-grid {
        grid-template-columns: 1fr;
        gap: 50px;
    }

    .contact-info-panel,
    .contact-form-panel {
        padding: 40px 25px;
    }

    .contact-form-row {
        grid-template-columns: 1fr;
    }

    .contact-info-item {
        padding: 20px;
    }

    .contact-section-title h2 {
        font-size: 36px;
    }
}

@media (max-width: 480px) {
    .contact-hero {
        padding: 80px 0;
    }

    .contact-hero h1 {
        font-size: 32px;
    }

    .contact-hero p {
        font-size: 18px;
    }

    .contact-main-section,
    .contact-map-section {
        padding: 70px 0;
    }

    .contact-info-panel,
    .contact-form-panel {
        padding: 30px 20px;
    }

    .contact-section-title h2 {
        font-size: 28px;
    }

    .contact-map-title {
        font-size: 28px;
    }
}

    </style>
</head>

<body class="contact-page-body">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <div class="container">
                <h1>Get in Touch</h1>
                <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-main-section">
        <div class="container">
            <div class="contact-main-grid">
                <!-- Contact Form -->
                <div class="contact-form-panel">
                    <h2>Send Us a Message</h2>
                    <form action = "../crud/contactcrud.php" method="POST">
                        <div class="contact-form-row">
                            <div class="contact-form-group">
                                <label for="firstName">First Name *</label>
                                <input type="text" id="firstName" name="FirstName" required>
                            </div>
                            <div class="contact-form-group">
                                <label for="lastName">Last Name *</label>
                                <input type="text" id="lastName" name="LastName" required>
                            </div>
                        </div>

                        <div class="contact-form-row">
                            <div class="contact-form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="Email" required>
                            </div>
                            <div class="contact-form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="Phnum">
                            </div>
                        </div>

                        <div class="contact-form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Jewelry Questions">Jewelry Questions</option>
                                <option value="Cosmetics Questions">Cosmetics Questions</option>
                                <option value="Order Support">Order Support</option>
                                <option value="Returns & Exchanges">Returns & Exchanges</option>
                                <option value="Wholesale Inquiries">Wholesale Inquiries</option>
                            </select>
                        </div>

                        <div class="contact-form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" placeholder="Tell us how we can help you..." required></textarea>
                        </div>

                        <input type="submit" class="contact-submit-btn" name = "submitbtn" value="Send Message">
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info-panel">
                    <h2>Contact Information</h2>
                    
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-info-details">
                            <h3>Visit Our Store</h3>
                            <p>123 Beauty Boulevard<br>Fashion District, NY 10001<br>United States</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-info-details">
                            <h3>Call Us</h3>
                            <p>Main: +1 (555) 123-4567<br>Customer Service: +1 (555) 123-4568</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-details">
                            <h3>Email Us</h3>
                            <p>info@lumina.com<br>support@lumina.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-info-details">
                            <h3>Store Hours</h3>
                            <p>Mon-Fri: 9:00 AM - 8:00 PM<br>Sat-Sun: 10:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="contact-map-section">
        <div class="container">
            <h2 class="contact-map-title">Find Our Store</h2>
            <div class="contact-map-container">
                <div style="text-align: center;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1155.668063126448!2d-5.927687801605224!3d54.598071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48610855b8138877%3A0x72156933d434e68d!2sGoldsmiths!5e0!3m2!1suz!2s!4v1751474802595!5m2!1suz!2s" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const firstName = formData.get('firstName');
            const lastName = formData.get('lastName');
            const email = formData.get('email');
            const subject = formData.get('subject');
            const message = formData.get('message');
            
            // Simple validation
            if (!firstName || !lastName || !email || !subject || !message) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Simulate form submission
            const submitBtn = this.querySelector('.contact-submit-btn');
            const originalText = submitBtn.value;
            
            submitBtn.value = 'Sending...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert(`Thank you ${firstName}! Your message has been sent successfully. We'll get back to you soon.`);
                this.reset();
                submitBtn.value = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Form field animations
        document.querySelectorAll('.contact-form-panel input, .contact-form-panel select, .contact-form-panel textarea').forEach(field => {
            field.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            field.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
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
    </script>
</body>

</html>

<?php
include "../includes/footer.php";
?>