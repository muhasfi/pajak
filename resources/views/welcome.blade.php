<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Solusi Perpajakan Terpercaya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2a5298;
            --secondary: #667eea;
            --accent: #ff6b6b;
            --light: #f8f9fa;
            --dark: #e8e8e8;
            --text: #d6d6d6;
            --gradient-primary: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --gradient-secondary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-accent: linear-gradient(45deg, #ff6b6b, #ee5a24);
            --shadow: 0 10px 30px rgba(0,0,0,0.1);
            --shadow-hover: 0 15px 40px rgba(0,0,0,0.15);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero {
            background: var(--gradient-secondary);
            color: #fff;
            padding: 160px 0 100px;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-text {
            animation: fadeInUp 1s ease-out;
            
        }

        .hero h1 {
            font-size: 3.2rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: #ffffff;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .cta-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cta-primary {
            background: #fff;
            color: var(--primary);
            box-shadow: 0 8px 25px rgba(255,255,255,0.3);
        }

        .cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255,255,255,0.4);
        }

        .cta-secondary {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255,255,255,0.5);
        }

        .cta-secondary:hover {
            background: #fff;
            color: var(--primary);
            transform: translateY(-3px);
        }

        .hero-image {
            animation: fadeInRight 1s ease-out;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .hero-image::after {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: var(--border-radius);
            z-index: -1;
            animation: pulse 3s infinite;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient-accent);
            border-radius: 2px;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 1.5rem auto 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: var(--border-radius);
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
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
            background: var(--gradient-secondary);
            transition: 0.5s;
            z-index: 1;
        }

        .feature-card:hover::before {
            left: 0;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: #fff;
            box-shadow: 0 10px 25px rgba(102,126,234,0.3);
            transition: var(--transition);
            position: relative;
            z-index: 2;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
            position: relative;
            z-index: 2;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
            position: relative;
            z-index: 2;
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
            color: var(--primary);
            margin-bottom: 1.5rem;
            position: relative;
        }

        .about-text h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: var(--gradient-accent);
            border-radius: 2px;
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
            background: var(--light);
            border-radius: var(--border-radius);
            transition: var(--transition);
            box-shadow: var(--shadow);
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .stat::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-secondary);
            transition: 0.5s;
            z-index: -1;
        }

        .stat:hover::before {
            left: 0;
        }

        .stat:hover {
            transform: translateY(-5px);
            color: #fff;
        }

        .stat:hover h4, .stat:hover p {
            color: #fff;
        }

        .stat h4 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .stat p {
            color: #666;
            transition: var(--transition);
        }

        .about-image {
            text-align: center;
            position: relative;
        }

        .about-image img {
            width: 100%;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .about-image::before {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            background: var(--gradient-secondary);
            border-radius: var(--border-radius);
            z-index: -1;
            opacity: 0.2;
        }

        /* Services Section */
        .services {
            padding: 100px 0;
            background: var(--light);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .service-card {
            background: #fff;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: var(--gradient-secondary);
            transition: 0.5s;
            z-index: 1;
        }

        .service-card:hover::before {
            left: 0;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .service-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .service-card:hover .service-image img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .service-content h3 {
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .service-content p {
            color: #666;
            margin-bottom: 1.2rem;
        }

        .service-link {
            display: inline-flex;
            align-items: center;
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .service-link:hover {
            color: var(--primary);
            gap: 0.5rem;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 100px 0;
            background: #fff;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .testimonial-card {
            background: var(--light);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: var(--gradient-secondary);
            transition: 0.5s;
            z-index: 1;
        }

        .testimonial-card:hover::before {
            left: 0;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .testimonial-card::after {
            content: '"';
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 5rem;
            color: rgba(0,0,0,0.05);
            font-family: serif;
            z-index: 0;
        }

        .testimonial-content {
            position: relative;
            z-index: 2;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #555;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            color: var(--primary);
            margin-bottom: 0.2rem;
        }

        .author-info p {
            color: #666;
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: var(--gradient-primary);
            color: #fff;
            text-align: center;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #ffffff; /* contoh warna kuning */
        }

        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
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

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }
            
            .hero h1 {
                font-size: 2.8rem;
            }
            
            .cta-buttons {
                justify-content: center;
            }
            
            .about-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 130px 0 80px;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .about-stats {
                grid-template-columns: 1fr;
            }
            
            .features-grid,
            .services-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .cta-content h2 {
                font-size: 2rem;
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
            background: var(--gradient-secondary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-primary);
        }
    </style>
</head>
<body>
    @extends('layouts.master')
    
    @section('content')
    <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Solusi Perpajakan Terpercaya untuk Bisnis Anda</h1>
                    <p>Konsultasi, pelatihan, dan layanan pajak profesional dengan tim ahli berpengalaman lebih dari 10 tahun.</p>
                    <div class="cta-buttons">
                        <a href="#produk" class="cta-btn cta-primary">
                            <i class="fas fa-rocket"></i> Mulai Sekarang
                        </a>
                        <a href="#kontak" class="cta-btn cta-secondary">
                            <i class="fas fa-phone"></i> Konsultasi Gratis
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Konsultasi Pajak">
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
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Tim Paham Pajak">
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="produk" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Layanan Kami</h2>
                    <p>Berbagai layanan perpajakan profesional untuk memenuhi kebutuhan Anda</p>
                </div>
                
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Konsultasi Pajak">
                        </div>
                        <div class="service-content">
                            <h3>Konsultasi Pajak</h3>
                            <p>Layanan konsultasi perpajakan profesional untuk individu dan perusahaan dengan solusi terbaik.</p>
                            <a href="#" class="service-link">
                                Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Pelatihan Pajak">
                        </div>
                        <div class="service-content">
                            <h3>Pelatihan & Workshop</h3>
                            <p>Program pelatihan dan workshop perpajakan untuk meningkatkan kompetensi tim keuangan Anda.</p>
                            <a href="#" class="service-link">
                                Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://images.unsplash.com/photo-1533750349088-cd871a92f312?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Kelas Online">
                        </div>
                        <div class="service-content">
                            <h3>Kelas Online</h3>
                            <p>Kelas bimbingan pajak online dengan materi terstruktur dan pengajar profesional.</p>
                            <a href="#" class="service-link">
                                Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container">
                <div class="section-title">
                    <h2>Apa Kata Klien Kami?</h2>
                    <p>Testimoni dari klien yang telah menggunakan layanan kami</p>
                </div>
                
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p class="testimonial-text">"Layanan konsultasi pajak dari Paham Pajak sangat membantu perusahaan kami dalam mengoptimalkan perencanaan pajak. Tim yang profesional dan responsif."</p>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Budi Santoso">
                                </div>
                                <div class="author-info">
                                    <h4>Budi Santoso</h4>
                                    <p>Direktur Finansial, PT ABC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p class="testimonial-text">"Pelatihan perpajakan yang diselenggarakan sangat informatif dan mudah dipahami. Materi yang disampaikan sesuai dengan kebutuhan praktis sehari-hari."</p>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Dewi Lestari">
                                </div>
                                <div class="author-info">
                                    <h4>Dewi Lestari</h4>
                                    <p>Manajer Keuangan, XYZ Corp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p class="testimonial-text">"Sebagai freelancer, saya sering bingung dengan perpajakan. Berkat Paham Pajak, sekarang saya bisa mengurus pajak dengan mudah dan benar."</p>
                            <div class="testimonial-author">
                                <div class="author-image">
                                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Rizky Pratama">
                                </div>
                                <div class="author-info">
                                    <h4>Rizky Pratama</h4>
                                    <p>Freelancer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2>Siap Mengoptimalkan Perpajakan Anda?</h2>
                    <p>Hubungi kami sekarang untuk konsultasi gratis dan temukan solusi terbaik untuk kebutuhan perpajakan Anda.</p>
                    <a href="#kontak" class="cta-btn cta-primary">
                        <i class="fas fa-envelope"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </section>
    </main>
    @endsection

    <script>
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

        document.querySelectorAll('.feature-card, .stat, .service-card, .testimonial-card').forEach(el => {
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