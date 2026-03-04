<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="EVENTSETU - The Bridge to Perfect Events. India's trusted event management marketplace connecting customers with verified vendors.">
    <title>EVENTSETU - The Bridge to Perfect Events</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-logo">
                <img src="assets/images/logo.png" alt="EVENTSETU Logo">
                <span>EVENTSETU</span>
            </a>

            <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="navbar-menu" id="navbarMenu">
                <li class="navbar-button">
                    <a href="/login" class="btn btn-primary">Get Started</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/hero-bg.png') center/cover; min-height: 100vh; display: flex; align-items: center; justify-content: center; color: white; text-align: center; padding-top: 80px;">
        <div class="container" data-aos="fade-up">
            <h1 style="font-size: clamp(2.5rem, 6vw, 5rem); margin-bottom: 1.5rem; color: white;">The Bridge to Perfect
                Events</h1>
            <p
                style="font-size: clamp(1.25rem, 2vw, 1.5rem); margin-bottom: 2.5rem; max-width: 800px; margin-left: auto; margin-right: auto; color: rgba(255,255,255,0.95);">
                India's Most Trusted Event Management Platform. Connecting you with verified vendors through secure
                admin-controlled workflow.
            </p>
            <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                <a href="/login" class="btn btn-primary btn-lg" data-aos="zoom-in" data-aos-delay="200">Get
                    Started</a>
                <a href="#vision" class="btn btn-outline btn-lg" data-aos="zoom-in" data-aos-delay="300">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section id="vision" style="padding: 5rem 0; background: var(--primary-cream);">
        <div class="container container-narrow text-center">
            <h2 data-aos="fade-up" class="text-gradient">Our Vision</h2>
            <p data-aos="fade-up" data-aos-delay="100"
                style="font-size: 1.25rem; line-height: 1.8; color: var(--gray-700);">
                EVENTSETU acts as a <strong>trusted bridge</strong> between customers and vendors. We ensure
                <strong>privacy, trust, and commission protection</strong> through our admin-controlled marketplace.
                Every vendor is verified, every request is secure, and your personal information stays private.
            </p>

            <div class="grid grid-2" style="margin-top: 3rem;">
                <div class="card" data-aos="fade-up" data-aos-delay="200">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🛡️</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.75rem;">Trust & Security</h3>
                    <p>All vendors are admin-verified. Your data is protected and never shared directly.</p>
                </div>

                <div class="card" data-aos="fade-up" data-aos-delay="300">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌉</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.75rem;">Admin Bridge</h3>
                    <p>Admin manages all vendor-customer interactions ensuring quality and fairness.</p>
                </div>

                <div class="card" data-aos="fade-up" data-aos-delay="400">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">⭐</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.75rem;">Verified Vendors</h3>
                    <p>Only approved, professional vendors get access to serve your events.</p>
                </div>

                <div class="card" data-aos="fade-up" data-aos-delay="500">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔒</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.75rem;">Reliability</h3>
                    <p>Consistent service, transparent processes, and dependable vendors you can count on.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" style="padding: 5rem 0;">
        <div class="container">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h2 data-aos="fade-up">Our Services</h2>
                <p data-aos="fade-up" data-aos-delay="100"
                    style="font-size: 1.25rem; color: var(--gray-700); max-width: 700px; margin: 0 auto;">
                    Comprehensive event management solutions across multiple categories
                </p>
            </div>

            <div class="grid grid-4">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #8B5CF6, #F472B6);">
                        🎵
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">DJ Services</h3>
                        <p class="service-card-description">Professional DJs for your perfect event vibe</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #F59E0B, #EF4444);">
                        🏛️
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Venue Management</h3>
                        <p class="service-card-description">Beautiful venues for unforgettable moments</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #10B981, #3B82F6);">
                        🎨
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Decoration</h3>
                        <p class="service-card-description">Stunning decor to bring your vision to life</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #6366F1, #8B5CF6);">
                        📸
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Photography</h3>
                        <p class="service-card-description">Capture every precious moment professionally</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #EC4899, #F59E0B);">
                        🍽️
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Catering</h3>
                        <p class="service-card-description">Delicious food that delights every guest</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #FBBF24, #F59E0B);">
                        💡
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Sound & Lights</h3>
                        <p class="service-card-description">Premium audio-visual experiences</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #F472B6, #EC4899);">
                        💄
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Makeup & Beauty</h3>
                        <p class="service-card-description">Expert bridal and event makeup services</p>
                    </div>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-card-image" style="background: linear-gradient(135deg, #8B5CF6, #6366F1);">
                        💃
                    </div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">Choreography</h3>
                        <p class="service-card-description">Professional dance choreography services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>EVENTSETU</h3>
                    <p>The Bridge to Perfect Events</p>
                    <p>India's trusted event management marketplace connecting customers with verified vendors.</p>
                </div>

                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>📞 +91 9876543210</p>
                    <p>📧 contact@eventsetu.com</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon" aria-label="Instagram">📷</a>
                        <a href="#" class="social-icon" aria-label="Facebook">👤</a>
                        <a href="#" class="social-icon" aria-label="Twitter">🐦</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p style="color:#D4AF37">&copy; 2026 EVENTSETU. All rights reserved. | Built with ❤️ in India</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Mobile Menu Toggle
        const navbarToggle = document.getElementById('navbarToggle');
        const navbarMenu = document.getElementById('navbarMenu');

        if (navbarToggle && navbarMenu) {
            navbarToggle.addEventListener('click', function() {
                // Toggle active class on both button and menu
                this.classList.toggle('active');
                navbarMenu.classList.toggle('active');
            });

            // Close menu when clicking on a menu item
            const navbarLinks = navbarMenu.querySelectorAll('a');
            navbarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navbarToggle.classList.remove('active');
                    navbarMenu.classList.remove('active');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideNav = navbarToggle.contains(event.target) || navbarMenu.contains(event.target);
                if (!isClickInsideNav && navbarMenu.classList.contains('active')) {
                    navbarToggle.classList.remove('active');
                    navbarMenu.classList.remove('active');
                }
            });
        }
    </script>

</body>

</html>