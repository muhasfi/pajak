<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Solusi Perpajakan Terpercaya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header & Navigation */
        header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-2px);
        }

        /* Dropdown */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            min-width: 200px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border-radius: 8px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown a {
            display: block;
            padding: 0.8rem 1.2rem;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid #eee;
        }

        .dropdown a:hover {
            background: #f8f9fa;
            color: #2a5298;
            padding-left: 1.5rem;
        }

        .dropdown a:last-child {
            border-bottom: none;
        }

        .login-btn {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            padding: 0.7rem 1.5rem !important;
            border-radius: 25px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255,107,107,0.3);
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255,107,107,0.4);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 3px;
        }

        .mobile-menu-btn span {
            width: 25px;
            height: 3px;
            background: #fff;
            transition: 0.3s;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 150px 0 100px;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .cta-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cta-primary {
            background: #fff;
            color: #2a5298;
            box-shadow: 0 8px 25px rgba(255,255,255,0.3);
        }

        .cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255,255,255,0.4);
        }

        .cta-secondary {
            background: transparent;
            color: #fff;
            border: 2px solid #fff;
        }

        .cta-secondary:hover {
            background: #fff;
            color: #2a5298;
            transform: translateY(-3px);
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #2a5298;
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: 0.5s;
        }

        .feature-card:hover::before {
            left: 0;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: #fff;
            box-shadow: 0 10px 25px rgba(102,126,234,0.3);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #2a5298;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* About Section */
        .about {
            padding: 100px 0;
            background: #fff;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text h2 {
            font-size: 2.5rem;
            color: #2a5298;
            margin-bottom: 1.5rem;
        }

        .about-text p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .about-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .stat {
            text-align: center;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .stat:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            transform: translateY(-5px);
        }

        .stat h4 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #2a5298;
        }

        .stat:hover h4 {
            color: #fff;
        }

        .about-image {
            text-align: center;
        }

        .about-image img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #fff;
            padding: 3rem 0 1rem;
            text-align: center;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #fff;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            margin-bottom: 0.5rem;
            display: block;
        }

        .footer-section a:hover {
            color: #fff;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #fff;
            color: #2a5298;
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1rem;
            margin-top: 2rem;
        }

        /* Animations */
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

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: flex;
            }

            .nav-menu {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-stats {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2, #667eea);
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="#home" class="logo">
                <i class="fas fa-calculator"></i> Paham Pajak
            </a>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#home" class="nav-link">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#produk" class="nav-link">
                        <i class="fas fa-box"></i> Produk <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <a href="{{ route('book') }}"><i class="fas fa-book"></i> Buku</a>
                        <a href="#artikel"><i class="fas fa-newspaper"></i> Artikel</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#kelas" class="nav-link">
                        <i class="fas fa-graduation-cap"></i> Kelas <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <a href="#bimble-a"><i class="fas fa-users"></i> Bimble A</a>
                        <a href="#bimble-b"><i class="fas fa-user-graduate"></i> Bimble B</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#pelatihan" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i> Pelatihan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <a href="#seminar"><i class="fas fa-microphone"></i> Seminar/Webinar</a>
                        <a href="#workshop"><i class="fas fa-tools"></i> Workshop</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#kontak" class="nav-link">
                        <i class="fas fa-envelope"></i> Kontak
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#login" class="nav-link login-btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            </ul>

            <div class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-content">
                <h1>Paham Pajak</h1>
                <p>Solusi perpajakan terpercaya untuk individu dan perusahaan. Konsultasi, pelatihan, dan layanan pajak profesional dengan tim ahli berpengalaman.</p>
                <div class="cta-buttons">
                    <a href="#produk" class="cta-btn cta-primary">
                        <i class="fas fa-rocket"></i> Mulai Sekarang
                    </a>
                    <a href="#kontak" class="cta-btn cta-secondary">
                        <i class="fas fa-phone"></i> Konsultasi Gratis
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <div class="section-title">
                    <h2>Mengapa Pilih Kami?</h2>
                    <p>Kami menyediakan layanan perpajakan lengkap dengan kualitas terbaik dan dukungan profesional</p>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Terpercaya & Legal</h3>
                        <p>Semua layanan kami telah tersertifikasi dan sesuai dengan regulasi perpajakan terbaru di Indonesia</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Tim Ahli Berpengalaman</h3>
                        <p>Didukung oleh konsultan pajak profesional dengan pengalaman lebih dari 10 tahun</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Layanan 24/7</h3>
                        <p>Konsultasi dan dukungan tersedia kapan saja untuk membantu kebutuhan perpajakan Anda</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>Tentang Paham Pajak</h2>
                        <p>Paham Pajak hadir sebagai solusi terpercaya dalam menangani berbagai kebutuhan perpajakan di Indonesia. Dengan pengalaman bertahun-tahun, kami telah membantu ribuan klien mulai dari individu hingga perusahaan multinasional.</p>
                        <p>Visi kami adalah menjadi mitra terbaik dalam memberikan pemahaman dan solusi perpajakan yang mudah dipahami dan diterapkan oleh semua kalangan.</p>
                        
                        <div class="about-stats">
                            <div class="stat">
                                <h4>1000+</h4>
                                <p>Klien Terlayani</p>
                            </div>
                            <div class="stat">
                                <h4>15+</h4>
                                <p>Tahun Pengalaman</p>
                            </div>
                            <div class="stat">
                                <h4>50+</h4>
                                <p>Konsultan Ahli</p>
                            </div>
                            <div class="stat">
                                <h4>99%</h4>
                                <p>Tingkat Kepuasan</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-image">
                        <div style="width: 400px; height: 300px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; margin: 0 auto;">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="kontak">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Paham Pajak</h3>
                    <p>Solusi perpajakan terpercaya untuk semua kebutuhan Anda. Konsultasi profesional dengan tim ahli berpengalaman.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Layanan</h3>
                    <a href="#produk">Buku & Artikel</a>
                    <a href="#kelas">Kelas Bimbingan</a>
                    <a href="#pelatihan">Pelatihan & Workshop</a>
                    <a href="#konsultasi">Konsultasi Pajak</a>
                </div>
                
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Pajak Raya No. 123, Jakarta</p>
                    <p><i class="fas fa-phone"></i> +62 21 1234 5678</p>
                    <p><i class="fas fa-envelope"></i> info@pahampajak.com</p>
                    <p><i class="fas fa-clock"></i> Senin - Jumat: 08:00 - 17:00</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 Paham Pajak. All rights reserved. | Made with ❤️ for better tax understanding</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navMenu = document.querySelector('.nav-menu');

        mobileMenuBtn.addEventListener('click', () => {
            navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
        });

        // Smooth scrolling for navigation links
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

        // Header background change on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(30, 60, 114, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'linear-gradient(135deg, #1e3c72 0%, #2a5298 100%)';
                header.style.backdropFilter = 'none';
            }
        });

        // Animation on scroll
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

        document.querySelectorAll('.feature-card, .stat').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.stat h4');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current) + (counter.textContent.includes('+') ? '+' : '') + (counter.textContent.includes('%') ? '%' : '');
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target + (counter.textContent.includes('+') ? '+' : '') + (counter.textContent.includes('%') ? '%' : '');
                    }
                };
                
                // Start animation when element is visible
                const statObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCounter();
                            statObserver.unobserve(entry.target);
                        }
                    });
                });
                
                statObserver.observe(counter.parentElement);
            });
        }

        animateCounters();
    </script>
</body>
</html>