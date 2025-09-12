<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Solusi Perpajakan Terpercaya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --dark-color: #1f2937;
            --light-gray: #f8fafc;
            --medium-gray: #64748b;
            --border-color: #e2e8f0;
            --white: #ffffff;
            --success-color: #059669;
            --warning-color: #d97706;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background: var(--white);
        }

        /* Header & Navigation */
        header {
            background: var(--white);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            border-bottom: 1px solid var(--border-color);
            backdrop-filter: blur(20px);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .logo i {
            font-size: 1.8rem;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--dark-color);
            text-decoration: none;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-link:hover {
            background: var(--light-gray);
            color: var(--primary-color);
        }

        /* Dropdown */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--white);
            min-width: 220px;
            box-shadow: var(--shadow-xl);
            border-radius: 12px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            color: var(--dark-color);
            text-decoration: none;
            transition: all 0.2s ease;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        .dropdown a:hover {
            background: var(--light-gray);
            color: var(--primary-color);
        }

        .dropdown a:last-child {
            border-bottom: none;
        }

        .login-btn {
            background: var(--primary-color);
            color: var(--white) !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 8px;
            font-weight: 600;
            margin-left: 1rem;
        }

        .login-btn:hover {
            background: var(--secondary-color) !important;
            transform: translateY(-1px);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
            padding: 0.5rem;
        }

        .mobile-menu-btn span {
            width: 24px;
            height: 2px;
            background: var(--dark-color);
            transition: 0.3s;
            border-radius: 1px;
        }

        /* Hero Section */
        .hero {
            background: var(--white);
            padding: 120px 0 80px;
            position: relative;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero-content .subtitle {
            font-size: 1.25rem;
            color: var(--medium-gray);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .cta-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cta-primary {
            background: var(--primary-color);
            color: var(--white);
            box-shadow: var(--shadow-lg);
        }

        .cta-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .cta-secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .cta-secondary:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }

        .hero-stat-label {
            font-size: 0.9rem;
            color: var(--medium-gray);
        }

        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
        }

        /* Stats Section */
        .stats-section {
            background: var(--light-gray);
            padding: 4rem 0;
        }

        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: var(--light-gray);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--medium-gray);
            font-weight: 500;
        }

        /* Features Section */
        .features {
            padding: 6rem 0;
            background: var(--white);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.2rem;
            color: var(--medium-gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--light-gray);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: var(--primary-color);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .feature-card p {
            color: var(--medium-gray);
            line-height: 1.7;
        }

        /* Services Section */
        .services {
            padding: 6rem 0;
            background: var(--light-gray);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .service-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
        }

        .service-image {
            height: 200px;
            background: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--primary-color);
        }

        .service-content {
            padding: 2rem;
        }

        .service-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .service-content p {
            color: var(--medium-gray);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .service-btn {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .service-btn:hover {
            background: var(--secondary-color);
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: var(--white);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
        }

        .about-text p {
            font-size: 1.1rem;
            color: var(--medium-gray);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .about-features {
            display: grid;
            gap: 1rem;
            margin-top: 2rem;
        }

        .about-feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--light-gray);
            border-radius: 12px;
        }

        .about-feature-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            flex-shrink: 0;
        }

        .about-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-image-placeholder {
            width: 100%;
            max-width: 500px;
            height: 400px;
            background: var(--light-gray);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        /* Footer */
        footer {
            background: var(--dark-color);
            color: var(--white);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            margin-bottom: 1.5rem;
            color: var(--white);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            margin-bottom: 0.75rem;
            display: block;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: var(--white);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            backdrop-filter: blur(10px);
        }

        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
        }

        .footer-bottom p {
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }
            
            .hero-content h1 {
                font-size: 2.8rem;
            }
            
            .about-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: flex;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                flex-direction: column;
                padding: 1rem;
                box-shadow: var(--shadow-lg);
                border-top: 1px solid var(--border-color);
            }

            .nav-menu.active {
                display: flex;
            }

            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-stats {
                justify-content: center;
                gap: 1rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .features-grid,
            .services-grid {
                grid-template-columns: 1fr;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
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

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="#home" class="logo">
                <i class="fas fa-calculator"></i>
                <span>Paham Pajak</span>
            </a>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#home" class="nav-link">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#layanan" class="nav-link">
                        <i class="fas fa-briefcase"></i> Layanan <i class="fas fa-chevron-down" style="font-size: 0.75rem;"></i>
                    </a>
                    <div class="dropdown">
                        <a href="#buku"><i class="fas fa-book"></i> Buku & Panduan</a>
                        <a href="#artikel"><i class="fas fa-newspaper"></i> Artikel & Blog</a>
                        <a href="#konsultasi"><i class="fas fa-handshake"></i> Konsultasi</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#pelatihan" class="nav-link">
                        <i class="fas fa-graduation-cap"></i> Pelatihan <i class="fas fa-chevron-down" style="font-size: 0.75rem;"></i>
                    </a>
                    <div class="dropdown">
                        <a href="#kelas"><i class="fas fa-chalkboard-teacher"></i> Kelas Online</a>
                        <a href="#workshop"><i class="fas fa-tools"></i> Workshop</a>
                        <a href="#seminar"><i class="fas fa-microphone"></i> Seminar</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#tentang" class="nav-link">
                        <i class="fas fa-info-circle"></i> Tentang
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#kontak" class="nav-link">
                        <i class="fas fa-envelope"></i> Kontak
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#login" class="nav-link login-btn">
                        <i class="fas fa-sign-in-alt"></i> Masuk
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
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Solusi Perpajakan Terpercaya & Profesional</h1>
                    <p class="subtitle">Dapatkan pemahaman pajak yang mendalam dengan panduan praktis dari ahli berpengalaman. Konsultasi, pelatihan, dan layanan pajak lengkap untuk individu dan perusahaan.</p>
                    
                    <div class="cta-buttons">
                        <a href="#layanan" class="cta-btn cta-primary">
                            <i class="fas fa-rocket"></i> Mulai Sekarang
                        </a>
                        <a href="#kontak" class="cta-btn cta-secondary">
                            <i class="fas fa-phone"></i> Konsultasi Gratis
                        </a>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="hero-stat-number">5000+</span>
                            <span class="hero-stat-label">Klien Terpuaskan</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-number">15+</span>
                            <span class="hero-stat-label">Tahun Pengalaman</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-number">99%</span>
                            <span class="hero-stat-label">Tingkat Kepuasan</span>
                        </div>
                    </div>
                </div>
                
                <div class="hero-image">
                    <div style="width: 100%; max-width: 500px; height: 400px; background: var(--light-gray); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 4rem; color: var(--primary-color); box-shadow: var(--shadow-xl);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="stats-container">
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">5000+</div>
                    <div class="stat-label">Klien Terlayani</div>
                </div>
                
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
                
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Konsultan Ahli</div>
                </div>
                
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <div class="stat-number">99%</div>
                    <div class="stat-label">Tingkat Kepuasan</div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <div class="section-title">
                    <h2>Mengapa Memilih Paham Pajak?</h2>
                    <p>Kami menyediakan solusi perpajakan terlengkap dengan dukungan teknologi modern dan tim ahli berpengalaman</p>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Terpercaya & Tersertifikasi</h3>
                        <p>Semua layanan kami telah tersertifikasi dan sesuai dengan regulasi perpajakan terbaru. Dijamin aman dan legal untuk semua jenis transaksi perpajakan Anda.</p>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Tim Ahli Berpengalaman</h3>
                        <p>Didukung oleh konsultan pajak profesional dengan sertifikasi resmi dan pengalaman lebih dari 15 tahun dalam menangani berbagai kasus perpajakan.</p>
                    </div>
                    
                    <div class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Dukungan 24/7</h3>
                        <p>Layanan konsultasi dan dukungan tersedia 24 jam setiap hari melalui berbagai channel komunikasi untuk membantu kebutuhan perpajakan Anda.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="layanan" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Layanan Unggulan Kami</h2>
                    <p>Dapatkan solusi perpajakan terlengkap sesuai kebutuhan Anda</p>
                </div>
                
                <div class="services-grid">
                    <div class="service-card animate-on-scroll">
                        <div class="service-image">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="service-content">
                            <h3>Buku & Panduan Pajak</h3>
                            <p>Koleksi lengkap buku dan panduan perpajakan terkini yang ditulis oleh ahli pajak berpengalaman untuk membantu pemahaman Anda.</p>
                            <a href="#buku" class="service-btn">
                                <i class="fas fa-arrow-right"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card animate-on-scroll">
                        <div class="service-image">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="service-content">
                            <h3>Pelatihan & Workshop</h3>
                            <p>Program pelatihan komprehensif dengan metode pembelajaran interaktif dan studi kasus nyata dari dunia industri.</p>
                            <a href="#pelatihan" class="service-btn">
                                <i class="fas fa-arrow-right"></i> Daftar Sekarang
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card animate-on-scroll">
                        <div class="service-image">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="service-content">
                            <h3>Konsultasi Pajak</h3>
                            <p>Layanan konsultasi personal dengan konsultan pajak bersertifikat untuk menyelesaikan permasalahan perpajakan Anda.</p>
                            <a href="#konsultasi" class="service-btn">
                                <i class="fas fa-arrow-right"></i> Konsultasi Gratis
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card animate-on-scroll">
                        <div class="service-image">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="service-content">
                            <h3>Aplikasi Pajak Digital</h3>
                            <p>Platform digital terintegrasi untuk memudahkan perhitungan, pelaporan, dan pengelolaan pajak secara online.</p>
                            <a href="#aplikasi" class="service-btn">
                                <i class="fas fa-arrow-right"></i> Download App
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card animate-on-scroll">
                        <div class="service-image">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="service-content">
                            <h3>Audit & Compliance</h3>
                            <p>Layanan audit pajak profesional dan pendampingan compliance untuk memastikan kepatuhan perpajakan perusahaan Anda.</p>
                            <a href="#audit" class="service-btn">
                                <i class="fas fa-arrow-right"></i> Pelajari Lebih
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card animate-on-scroll">
                        <div class="service-image">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="service-content">
                            <h3>Artikel & Berita Pajak</h3>
                            <p>Update terbaru seputar peraturan perpajakan, tips praktis, dan analisis mendalam dari para ahli pajak terpercaya.</p>
                            <a href="#artikel" class="service-btn">
                                <i class="fas fa-arrow-right"></i> Baca Artikel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="tentang" class="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>Tentang Paham Pajak</h2>
                        <p>Paham Pajak hadir sebagai solusi terdepan dalam memberikan layanan perpajakan terpadu di Indonesia. Dengan pengalaman lebih dari 15 tahun, kami telah membantu ribuan individu dan perusahaan dalam memahami dan mengelola kewajiban perpajakan mereka.</p>
                        
                        <p>Visi kami adalah menjadi mitra terpercaya yang memberikan solusi perpajakan inovatif, mudah dipahami, dan dapat diakses oleh semua kalangan masyarakat Indonesia.</p>
                        
                        <div class="about-features">
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <strong>Konsultan Bersertifikat</strong><br>
                                    <span style="color: var(--medium-gray);">Tim ahli dengan sertifikasi resmi Brevet AB</span>
                                </div>
                            </div>
                            
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <strong>Teknologi Terdepan</strong><br>
                                    <span style="color: var(--medium-gray);">Platform digital terintegrasi dengan sistem pajak</span>
                                </div>
                            </div>
                            
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <strong>Jaminan Keamanan</strong><br>
                                    <span style="color: var(--medium-gray);">Data terlindungi dengan enkripsi tingkat bank</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-image">
                        <div class="about-image-placeholder">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials" style="padding: 6rem 0; background: var(--light-gray);">
            <div class="container">
                <div class="section-title">
                    <h2>Apa Kata Klien Kami?</h2>
                    <p>Testimoni nyata dari klien yang telah merasakan layanan terbaik kami</p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 3rem;">
                    <div class="testimonial-card animate-on-scroll" style="background: var(--white); padding: 2rem; border-radius: 20px; box-shadow: var(--shadow-md); border: 1px solid var(--border-color);">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <div style="width: 60px; height: 60px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--white); font-size: 1.5rem;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--dark-color); margin: 0; font-weight: 600;">Budi Santoso</h4>
                                <p style="color: var(--medium-gray); margin: 0; font-size: 0.9rem;">CEO PT. Maju Jaya</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 0.25rem; margin-bottom: 1rem;">
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                        </div>
                        <p style="color: var(--medium-gray); line-height: 1.6; font-style: italic;">"Layanan Paham Pajak sangat membantu perusahaan kami dalam mengelola pajak. Tim konsultannya profesional dan responsif. Highly recommended!"</p>
                    </div>
                    
                    <div class="testimonial-card animate-on-scroll" style="background: var(--white); padding: 2rem; border-radius: 20px; box-shadow: var(--shadow-md); border: 1px solid var(--border-color);">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <div style="width: 60px; height: 60px; background: var(--success-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--white); font-size: 1.5rem;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--dark-color); margin: 0; font-weight: 600;">Sari Dewi</h4>
                                <p style="color: var(--medium-gray); margin: 0; font-size: 0.9rem;">Pengusaha UMKM</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 0.25rem; margin-bottom: 1rem;">
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                        </div>
                        <p style="color: var(--medium-gray); line-height: 1.6; font-style: italic;">"Sebagai UMKM, saya sangat terbantu dengan panduan pajak yang mudah dipahami. Pelayanannya ramah dan harga terjangkau."</p>
                    </div>
                    
                    <div class="testimonial-card animate-on-scroll" style="background: var(--white); padding: 2rem; border-radius: 20px; box-shadow: var(--shadow-md); border: 1px solid var(--border-color);">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <div style="width: 60px; height: 60px; background: var(--warning-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--white); font-size: 1.5rem;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 style="color: var(--dark-color); margin: 0; font-weight: 600;">Ahmad Rahman</h4>
                                <p style="color: var(--medium-gray); margin: 0; font-size: 0.9rem;">Karyawan Swasta</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 0.25rem; margin-bottom: 1rem;">
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                            <i class="fas fa-star" style="color: #fbbf24;"></i>
                        </div>
                        <p style="color: var(--medium-gray); line-height: 1.6; font-style: italic;">"Workshop pajaknya sangat informatif dan aplikatif. Sekarang saya lebih paham tentang kewajiban pajak pribadi. Terima kasih Paham Pajak!"</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" style="padding: 6rem 0; background: var(--primary-color); color: var(--white); text-align: center;">
            <div class="container">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700;">Siap Mengelola Pajak dengan Lebih Baik?</h2>
                <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">Bergabunglah dengan ribuan klien yang telah merasakan kemudahan mengelola pajak bersama Paham Pajak</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#kontak" style="background: var(--white); color: var(--primary-color); padding: 1rem 2rem; border-radius: 12px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.2s ease;">
                        <i class="fas fa-phone"></i> Konsultasi Gratis
                    </a>
                    <a href="#layanan" style="background: transparent; color: var(--white); padding: 1rem 2rem; border: 2px solid var(--white); border-radius: 12px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.2s ease;">
                        <i class="fas fa-eye"></i> Lihat Layanan
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer id="kontak">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Paham Pajak</h3>
                    <p>Solusi perpajakan terpercaya untuk semua kebutuhan Anda. Kami berkomitmen memberikan layanan terbaik dengan dukungan teknologi modern dan tim ahli berpengalaman.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Layanan Kami</h3>
                    <a href="#buku">Buku & Panduan</a>
                    <a href="#pelatihan">Pelatihan & Workshop</a>
                    <a href="#konsultasi">Konsultasi Pajak</a>
                    <a href="#aplikasi">Aplikasi Digital</a>
                    <a href="#audit">Audit & Compliance</a>
                </div>
                
                <div class="footer-section">
                    <h3>Perusahaan</h3>
                    <a href="#tentang">Tentang Kami</a>
                    <a href="#tim">Tim Ahli</a>
                    <a href="#karir">Karir</a>
                    <a href="#berita">Berita & Artikel</a>
                    <a href="#kebijakan">Kebijakan Privasi</a>
                </div>
                
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Sudirman Kav. 52-53, Jakarta Pusat 10250</p>
                    <p><i class="fas fa-phone"></i> +62 21 2922 5678</p>
                    <p><i class="fas fa-envelope"></i> info@pahampajak.com</p>
                    <p><i class="fas fa-whatsapp"></i> +62 812 3456 7890</p>
                    <p><i class="fas fa-clock"></i> Senin - Jumat: 08:00 - 18:00 WIB</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 Paham Pajak. Hak cipta dilindungi undang-undang. | Dibuat dengan ❤️ untuk kemudahan perpajakan Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navMenu = document.querySelector('.nav-menu');
        let isMenuOpen = false;

        mobileMenuBtn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            navMenu.classList.toggle('active');
            
            // Animate hamburger menu
            const spans = mobileMenuBtn.querySelectorAll('span');
            if (isMenuOpen) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navMenu.contains(e.target) && !mobileMenuBtn.contains(e.target) && isMenuOpen) {
                isMenuOpen = false;
                navMenu.classList.remove('active');
                const spans = mobileMenuBtn.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (isMenuOpen) {
                        isMenuOpen = false;
                        navMenu.classList.remove('active');
                        const spans = mobileMenuBtn.querySelectorAll('span');
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                    }
                }
            });
        });

        // Header background change on scroll
        let lastScrollY = window.scrollY;
        const header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(20px)';
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.background = 'var(--white)';
                header.style.backdropFilter = 'none';
                header.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
            }
            
            // Hide/show header on scroll
            if (window.scrollY > lastScrollY && window.scrollY > 100) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }
            lastScrollY = window.scrollY;
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        // Observe all elements with animate-on-scroll class
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number, .hero-stat-number');
            const speed = 200; // The lower the slower

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.textContent.replace(/[^\d]/g, '');
                    const count = +counter.getAttribute('data-count') || 0;
                    const inc = target / speed;

                    if (count < target) {
                        counter.setAttribute('data-count', count + inc);
                        if (counter.textContent.includes('+')) {
                            counter.textContent = Math.ceil(count + inc) + '+';
                        } else if (counter.textContent.includes('%')) {
                            counter.textContent = Math.ceil(count + inc) + '%';
                        } else {
                            counter.textContent = Math.ceil(count + inc).toLocaleString();
                        }
                        setTimeout(updateCount, 1);
                    } else {
                        if (counter.textContent.includes('+')) {
                            counter.textContent = target.toLocaleString() + '+';
                        } else if (counter.textContent.includes('%')) {
                            counter.textContent = target + '%';
                        } else {
                            counter.textContent = target.toLocaleString();
                        }
                    }
                };

                // Start animation when element is visible
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !counter.getAttribute('data-animated')) {
                            counter.setAttribute('data-animated', 'true');
                            counter.setAttribute('data-count', '0');
                            updateCount();
                        }
                    });
                });

                counterObserver.observe(counter);
            });
        }

        animateCounters();

        // Lazy loading for images (when you add real images)
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });

        // Add hover effects for service cards
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click to call functionality
        document.querySelectorAll('a[href*="tel:"], a[href*="mailto:"]').forEach(link => {
            link.addEventListener('click', (e) => {
                // Add analytics tracking here if needed
                console.log('Contact method clicked:', link.href);
            });
        });
    </script>
</body>
</html>