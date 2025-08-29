<?php
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers</title>
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Georgia', serif;
    background: linear-gradient(135deg, #ffffff 0%, #f8f6f6 50%, #f0ebe8 100%);
    color: #2c1810;
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
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(0, 0, 0, 0.02) 1px, transparent 1px),
        radial-gradient(circle at 80% 20%, rgba(0, 0, 0, 0.03) 1px, transparent 1px),
        radial-gradient(circle at 40% 40%, rgba(0, 0, 0, 0.01) 1px, transparent 1px);
    background-size: 50px 50px, 60px 60px, 80px 80px;
    pointer-events: none;
    z-index: 1;
}

/* Floating Particles System */
.particle {
    position: fixed;
    width: 4px;
    height: 4px;
    background: #8b1538;
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

/* Hero Section */
.hero {
    padding: 80px 20px;
    text-align: center;
    position: relative;
    background: 
        radial-gradient(circle at center, rgba(139, 21, 56, 0.1) 0%, transparent 70%),
        linear-gradient(45deg, rgba(0, 0, 0, 0.02) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(0, 0, 0, 0.02) 25%, transparent 25%);
    background-size: auto, 20px 20px, 20px 20px;
    z-index: 2;
}

.hero h1 {
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 300;
    letter-spacing: 3px;
    margin-bottom: 20px;
    background: linear-gradient(45deg, #8b1538, #2c1810);
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
    font-size: 1.2rem;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto 40px;
    line-height: 1.6;
    color: #4a3228;
}

.ta-button {
    display: inline-block;
    padding: 15px 40px;
    background: transparent;
    border: 2px solid #8b1538;
    color: #8b1538;
    text-decoration: none;
    font-size: 1.1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 3;
}

.ta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: #8b1538;
    transition: left 0.3s ease;
    z-index: -1;
}

.ta-button:hover::before {
    left: 0;
}

.ta-button:hover {
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(139, 21, 56, 0.3);
}

/* Content Sections */
.content-section {
    padding: 80px 20px;
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 60px;
    color: #8b1538;
    font-weight: 300;
    letter-spacing: 2px;
}

.section-subtitle {
    text-align: center;
    font-size: 1.1rem;
    margin-bottom: 60px;
    color: rgba(44, 24, 16, 0.8);
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}

/* Job Listings */
.job-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.job-card {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(139, 21, 56, 0.1);
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.job-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        linear-gradient(45deg, transparent, rgba(139, 21, 56, 0.08), transparent),
        linear-gradient(135deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: auto, 15px 15px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.job-card:hover::before {
    opacity: 1;
}

.job-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(139, 21, 56, 0.15);
    border-color: #8b1538;
    background: rgba(255, 255, 255, 0.95);
}

.job-title {
    font-size: 1.4rem;
    color: #2c1810;
    margin-bottom: 10px;
    font-weight: 400;
}

.job-department {
    color: #8b1538;
    font-size: 0.9rem;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.job-description {
    color: rgba(44, 24, 16, 0.8);
    line-height: 1.6;
    margin-bottom: 20px;
}

.job-requirements {
    margin-bottom: 25px;
}

.job-requirements h4 {
    color: #8b1538;
    margin-bottom: 10px;
    font-size: 1rem;
}

.job-requirements ul {
    list-style: none;
    padding-left: 0;
}

.job-requirements li {
    color: rgba(44, 24, 16, 0.8);
    margin-bottom: 5px;
    padding-left: 20px;
    position: relative;
}

.job-requirements li::before {
    content: '•';
    color: #8b1538;
    position: absolute;
    left: 0;
}

.job-location {
    color: rgba(44, 24, 16, 0.6);
    font-size: 0.9rem;
    margin-bottom: 20px;
}

.apply-btn {
    display: inline-block;
    padding: 12px 30px;
    background: transparent;
    border: 1px solid rgba(139, 21, 56, 0.5);
    color: #8b1538;
    text-decoration: none;
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    border-radius: 5px;
}

.apply-btn:hover {
    background: #8b1538;
    color: #ffffff;
    transform: translateY(-2px);
}

/* Benefits Section */
.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.benefit-card {
    background: rgba(255, 255, 255, 0.7);
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(139, 21, 56, 0.1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    position: relative;
}

.benefit-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(-45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: 10px 10px;
    border-radius: 15px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.benefit-card:hover::before {
    opacity: 1;
}

.benefit-card:hover {
    transform: translateY(-5px);
    border-color: #8b1538;
    background: rgba(255, 255, 255, 0.9);
}

.benefit-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    display: block;
}

.benefit-title {
    color: #8b1538;
    font-size: 1.2rem;
    margin-bottom: 15px;
    font-weight: 400;
}

.benefit-description {
    color: rgba(44, 24, 16, 0.8);
    line-height: 1.6;
}

/* Culture Section */
.culture-text {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    color: rgba(44, 24, 16, 0.8);
    line-height: 1.8;
    font-size: 1.1rem;
}

/* Application Form */
.application-form {
    max-width: 600px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    padding: 40px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(139, 21, 56, 0.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    position: relative;
}

.application-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.01) 25%, transparent 25%);
    background-size: 20px 20px;
    border-radius: 20px;
}

.form-group {
    margin-bottom: 25px;
    position: relative;
    z-index: 2;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #8b1538;
    font-weight: 400;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(139, 21, 56, 0.3);
    border-radius: 8px;
    color: #2c1810;
    font-family: inherit;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #8b1538;
    box-shadow: 0 0 10px rgba(139, 21, 56, 0.2);
    background: rgba(255, 255, 255, 1);
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: rgba(44, 24, 16, 0.5);
}

.submit-btn {
    width: 100%;
    padding: 15px;
    background: transparent;
    border: 2px solid #8b1538;
    color: #8b1538;
    font-size: 1.1rem;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px;
    position: relative;
    overflow: hidden;
    z-index: 3;
}

.submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: #8b1538;
    transition: left 0.3s ease;
    z-index: -1;
}

.submit-btn:hover::before {
    left: 0;
}

.submit-btn:hover {
    color: #ffffff;
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

    .content-section {
        padding: 60px 15px;
    }

    .job-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .benefits-grid {
        grid-template-columns: 1fr;
    }

    .section-title {
        font-size: 2rem;
    }

    .application-form {
        padding: 30px 20px;
    }
}

@media (max-width: 480px) {
    .hero h1 {
        font-size: 2rem;
    }

    .job-card {
        padding: 20px;
    }

    .ta-button {
        padding: 12px 30px;
        font-size: 1rem;
    }
}

    </style>
</head>
<body>
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Hero Section -->
    <section class="hero">
        <h1>CAREERS</h1>
        <p>Join the Lumina family and become part of a team that creates beauty, elegance, and luxury for the world</p>
        <a href="#" class="ta-button">VIEW OPENINGS</a>
    </section>

    <!-- Why Join Lumina -->
    <section class="content-section">
        <h2 class="section-title">Why Join Lumina?</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <span class="benefit-icon">💎</span>
                <h3 class="benefit-title">Luxury Environment</h3>
                <p class="benefit-description">Work in an elegant, inspiring environment surrounded by the finest jewelry and cosmetics</p>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon">🌟</span>
                <h3 class="benefit-title">Growth Opportunities</h3>
                <p class="benefit-description">Advance your career with comprehensive training programs and mentorship</p>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon">🎨</span>
                <h3 class="benefit-title">Creative Freedom</h3>
                <p class="benefit-description">Express your creativity and contribute to innovative product development</p>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon">🏆</span>
                <h3 class="benefit-title">Competitive Benefits</h3>
                <p class="benefit-description">Enjoy excellent compensation, health benefits, and employee discounts</p>
            </div>
        </div>
    </section>

    <!-- Our Culture -->
    <section class="content-section">
        <h2 class="section-title">Our Culture</h2>
        <div class="culture-text">
            <p>At Lumina, we believe that beauty comes from within - both in our products and our people. We foster a culture of excellence, creativity, and mutual respect. Our team is passionate about crafting exceptional experiences for our customers while supporting each other's growth and success.</p>
            <br>
            <p>We value diversity, innovation, and the unique perspectives each team member brings. Whether you're designing the next stunning piece of jewelry or helping customers find their perfect look, you'll be part of something truly special.</p>
        </div>
    </section>

    <!-- Current Openings -->
    <section class="content-section" id="openings">
        <h2 class="section-title">Current Openings</h2>
        <p class="section-subtitle">Join our team of passionate professionals and help us create beauty that inspires</p>
        
        <div class="job-grid">
            <div class="job-card">
                <h3 class="job-title">Senior Jewelry Designer</h3>
                <div class="job-department">Design Team</div>
                <p class="job-description">Lead the creative development of our exclusive jewelry collections, working with precious metals and gemstones to create pieces that define luxury.</p>
                <div class="job-requirements">
                    <h4>Requirements:</h4>
                    <ul>
                        <li>5+ years jewelry design experience</li>
                        <li>Proficiency in CAD software</li>
                        <li>Knowledge of precious metals and gemstones</li>
                        <li>Strong portfolio of luxury pieces</li>
                    </ul>
                </div>
                <div class="job-location">📍 New York, NY</div>
                <a href="#application" class="apply-btn">APPLY NOW</a>
            </div>

            <div class="job-card">
                <h3 class="job-title">Cosmetics Brand Manager</h3>
                <div class="job-department">Marketing</div>
                <p class="job-description">Drive the strategic direction of our cosmetics line, managing product launches and building brand awareness in the luxury beauty market.</p>
                <div class="job-requirements">
                    <h4>Requirements:</h4>
                    <ul>
                        <li>3+ years brand management experience</li>
                        <li>Background in luxury cosmetics</li>
                        <li>Strong analytical and creative skills</li>
                        <li>MBA preferred</li>
                    </ul>
                </div>
                <div class="job-location">📍 Los Angeles, CA</div>
                <a href="#application" class="apply-btn">APPLY NOW</a>
            </div>

            <div class="job-card">
                <h3 class="job-title">Luxury Sales Consultant</h3>
                <div class="job-department">Retail</div>
                <p class="job-description">Provide exceptional customer service and product expertise to our discerning clientele, helping them find the perfect jewelry and cosmetics.</p>
                <div class="job-requirements">
                    <h4>Requirements:</h4>
                    <ul>
                        <li>2+ years luxury retail experience</li>
                        <li>Excellent communication skills</li>
                        <li>Passion for jewelry and cosmetics</li>
                        <li>Bilingual preferred</li>
                    </ul>
                </div>
                <div class="job-location">📍 Multiple Locations</div>
                <a href="#application" class="apply-btn">APPLY NOW</a>
            </div>

            <div class="job-card">
                <h3 class="job-title">Digital Marketing Specialist</h3>
                <div class="job-department">Digital Marketing</div>
                <p class="job-description">Develop and execute digital marketing strategies to enhance our online presence and drive customer engagement across all platforms.</p>
                <div class="job-requirements">
                    <h4>Requirements:</h4>
                    <ul>
                        <li>2+ years digital marketing experience</li>
                        <li>Social media management expertise</li>
                        <li>SEO/SEM knowledge</li>
                        <li>Analytics and reporting skills</li>
                    </ul>
                </div>
                <div class="job-location">📍 Remote/Hybrid</div>
                <a href="#application" class="apply-btn">APPLY NOW</a>
            </div>

            <div class="job-card">
                <h3 class="job-title">Product Development Manager</h3>
                <div class="job-department">R&D</div>
                <p class="job-description">Lead the development of innovative cosmetic formulations and jewelry designs, ensuring quality and luxury standards are met.</p>
                <div class="job-requirements">
                    <h4>Requirements:</h4>
                    <ul>
                        <li>5+ years product development experience</li>
                        <li>Chemistry or materials science background</li>
                        <li>Project management skills</li>
                        <li>Regulatory compliance knowledge</li>
                    </ul>
                </div>
                <div class="job-location">📍 Miami, FL</div>
                <a href="#application" class="apply-btn">APPLY NOW</a>
            </div>

            <div class="job-card">
                <h3 class="job-title">Visual Merchandiser</h3>
                <div class="job-department">Retail Operations</div>
                <p class="job-description">Create stunning visual displays that showcase our jewelry and cosmetics collections, enhancing the customer shopping experience.</p>
                <div class="job-requirements">
                    <h4>Requirements:</h4>
                    <ul>
                        <li>3+ years visual merchandising experience</li>
                        <li>Strong design and artistic skills</li>
                        <li>Knowledge of luxury retail standards</li>
                        <li>Attention to detail</li>
                    </ul>
                </div>
                <div class="job-location">📍 Chicago, IL</div>
                <a href="#application" class="apply-btn">APPLY NOW</a>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section class="content-section" id="application">
        <h2 class="section-title">Apply Today</h2>
        <p class="section-subtitle">Ready to join the Lumina family? Submit your application and take the first step toward an exciting career in luxury beauty</p>
        
        <form class="application-form" id="applicationForm">
            <div class="form-group">
                <label for="fullName">Full Name *</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            
            <div class="form-group">
                <label for="position">Position of Interest *</label>
                <select id="position" name="position" required>
                    <option value="">Select a position</option>
                    <option value="senior-jewelry-designer">Senior Jewelry Designer</option>
                    <option value="cosmetics-brand-manager">Cosmetics Brand Manager</option>
                    <option value="luxury-sales-consultant">Luxury Sales Consultant</option>
                    <option value="digital-marketing-specialist">Digital Marketing Specialist</option>
                    <option value="product-development-manager">Product Development Manager</option>
                    <option value="visual-merchandiser">Visual Merchandiser</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="experience">Years of Experience *</label>
                <select id="experience" name="experience" required>
                    <option value="">Select experience level</option>
                    <option value="0-1">0-1 years</option>
                    <option value="2-4">2-4 years</option>
                    <option value="5-9">5-9 years</option>
                    <option value="10+">10+ years</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="coverLetter">Cover Letter *</label>
                <textarea id="coverLetter" name="coverLetter" placeholder="Tell us why you want to join Lumina and what makes you the perfect fit for this role..." required></textarea>
            </div>
            
            <div class="form-group">
                <label for="resume">Resume/CV *</label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
            </div>
            
            <button type="submit" class="submit-btn">SUBMIT APPLICATION</button>
        </form>
    </section>

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
        document.querySelectorAll('.job-card, .benefit-card').forEach(card => {
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

        // Form submission handler
        document.getElementById('applicationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Create celebration particles
            for (let i = 0; i < 20; i++) {
                setTimeout(() => {
                    createParticle(
                        Math.random() * window.innerWidth,
                        Math.random() * window.innerHeight
                    );
                }, i * 50);
            }
            
            // Show success message
            alert('Thank you for your application! We will review your submission and get back to you soon.');
            
            // Reset form
            this.reset();
        });

        // File input styling
        const fileInput = document.getElementById('resume');
        fileInput.addEventListener('change', function() {
            const fileName = this.files[0]?.name || 'No file chosen';
            // You can add visual feedback here for the selected file
        });
    </script>
</body>
</html>

<?php
include "../includes/footer.php";
?>