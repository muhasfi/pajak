@extends('layouts.master')

@section('title', 'Paham Pajak - Solusi Akuntansi & Perpajakan Terpercaya')

@section('style')
<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #64748b;
        --accent: #f59e0b;
        --light: #f8fafc;
        --dark: #1e293b;
        --success: #10b981;
        --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --radius: 8px;
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: var(--dark);
        background-color: #ffffff;
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        width: 100%;
    }

    .section {
        padding: 5rem 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark);
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
        background: var(--gradient-primary);
        border-radius: 2px;
    }

    .section-title p {
        font-size: 1.125rem;
        color: var(--secondary);
        max-width: 700px;
        margin: 1.5rem auto 0;
        line-height: 1.8;
    }

    /* Hero Section */
    .hero {
        background: #f8f9fa;
        padding: 100px 0 80px;
        position: relative;
        overflow: hidden;
        min-height: 600px;
        display: flex;
        align-items: center;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        width: 100%;
    }

    .hero-text {
        width: 100%;
    }

    .hero-text h1 {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        color: #1e293b;
    }

    .hero-text p {
        font-size: 1.25rem;
        margin-bottom: 2rem;
        color: #475569;
        line-height: 1.8;
    }

    .hero-features {
        margin: 2.5rem 0;
    }

    .hero-feature {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .hero-feature:hover {
        transform: translateX(5px);
    }

    .hero-feature i {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .hero-feature span {
        font-weight: 600;
        font-size: 1.05rem;
        color: #1e293b;
        line-height: 1.5;
        padding-top: 0.5rem;
    }

    .hero-image {
        position: relative;
        width: 100%;
    }

    .hero-image img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
        display: block;
    }

    .hero-buttons {
        margin-top: 2.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1rem 2rem;
        border-radius: var(--radius);
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        gap: 0.5rem;
        font-family: inherit;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        box-shadow: var(--shadow-lg);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-xl);
        background: var(--primary-dark);
    }

    .btn-secondary {
        background: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        box-shadow: var(--shadow);
    }

    .btn-secondary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
    }

    /* About Section */
    .about {
        background: white;
    }

    .about-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .about-image {
        position: relative;
    }

    .about-image img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
        display: block;
    }

    .about-image::before {
        content: '';
        position: absolute;
        top: -20px;
        left: -20px;
        width: 100%;
        height: 100%;
        border: 4px solid var(--primary);
        border-radius: 12px;
        z-index: -1;
        opacity: 0.3;
    }

    .about-text h2 {
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        color: var(--dark);
        font-weight: 700;
    }

    .about-text p {
        color: var(--secondary);
        margin-bottom: 1.5rem;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .about-features {
        margin: 2.5rem 0;
    }

    .about-feature {
        display: flex;
        align-items: center;
        margin-bottom: 1.25rem;
        transition: transform 0.3s ease;
    }

    .about-feature:hover {
        transform: translateX(5px);
    }

    .about-feature i {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 0.9rem;
        background: rgba(37, 99, 235, 0.1);
        color: var(--primary);
        flex-shrink: 0;
    }

    .about-feature span {
        font-weight: 600;
        color: var(--dark);
    }

    /* Services Section */
    .services {
        background: var(--light);
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
    }

    .service-card {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 12px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        text-align: center;
        position: relative;
        overflow: hidden;
        border-top: 4px solid transparent;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .service-card:nth-child(1) {
        border-top-color: #007bff;
    }

    .service-card:nth-child(2) {
        border-top-color: #28a745;
    }

    .service-card:nth-child(3) {
        border-top-color: #ffc107;
    }

    .service-card:nth-child(4) {
        border-top-color: #dc3545;
    }

    .service-card:nth-child(5) {
        border-top-color: #6f42c1;
    }

    .service-card:nth-child(6) {
        border-top-color: #20c997;
    }

    .service-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        transition: var(--transition);
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .service-card h3 {
        font-size: 1.4rem;
        margin-bottom: 1rem;
        color: var(--dark);
        font-weight: 700;
    }

    .service-card p {
        color: var(--secondary);
        margin-bottom: 1.5rem;
        line-height: 1.7;
    }

    .service-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s ease;
    }

    .service-link:hover {
        gap: 0.75rem;
    }

    /* Stats Section */
    .stats {
        background: var(--gradient-primary);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 2rem;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .stat-item {
    background-color: transparent;
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    color: #fff;
    }


    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-item h3 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: #ffffff;
    }

    .stat-item p {
        font-size: 1.1rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
    }

    .stats-footer {
        text-align: center;
        margin-top: 3rem;
        position: relative;
        z-index: 1;
    }

    .stats-footer h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
        color: white;
    }

    .stats-footer p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 800px;
        margin: 0 auto;
    }

    /* Consultation Section */
    .consultation {
        text-align: center;
        background: var(--light);
        padding: 5rem 0;
    }

    .consultation-content {
        max-width: 700px;
        margin: 0 auto;
    }

    .consultation-content h2 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        color: var(--dark);
        font-weight: 700;
    }

    .consultation-content p {
        font-size: 1.125rem;
        color: var(--secondary);
        margin-bottom: 2.5rem;
        line-height: 1.8;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .hero {
            padding: 80px 0 60px;
            min-height: auto;
        }

        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 3rem;
        }

        .hero-buttons {
            justify-content: center;
        }
        
        .about-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
        }
        
        .about-image::before {
            display: none;
        }
        
        .hero-text h1 {
            font-size: 2.5rem;
        }
        
        .hero-feature {
            justify-content: center;
            text-align: left;
        }
        
        .about-feature {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .section {
            padding: 4rem 0;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
        
        .hero {
            padding: 60px 0 40px;
        }
        
        .hero-text h1 {
            font-size: 2rem;
        }
        
        .hero-text p {
            font-size: 1.125rem;
        }

        .hero-feature i {
            width: 40px;
            height: 40px;
            font-size: 1.25rem;
        }

        .hero-feature span {
            font-size: 1rem;
        }
        
        .about-text h2 {
            font-size: 1.8rem;
        }

        .hero-buttons {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .services-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-text h1 {
            font-size: 1.75rem;
        }
        
        .section-title h2 {
            font-size: 1.75rem;
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            font-size: 1.8rem;
        }

        .stat-item h3 {
            font-size: 2.5rem;
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

    .animate-fade-in {
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection

@section('content')
<main>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="animate-fade-in">Solusi Permasalahan Akuntansi & Perpajakan Anda</h1>
                    <p class="animate-fade-in delay-100">Layanan profesional untuk membantu bisnis Anda tumbuh dengan dukungan konsultan berpengalaman.</p>
                    
                    <div class="hero-features">
                        <div class="hero-feature animate-fade-in delay-100">
                            <i class="fas fa-check-circle" style="color:#007bff; background: rgba(0, 123, 255, 0.1);"></i>
                            <span>Dukungan Kepatuhan Perpajakan sesuai Peraturan Terbaru</span>
                        </div>
                        <div class="hero-feature animate-fade-in delay-200">
                            <i class="fas fa-chart-line" style="color:#FAA533; background: rgba(250, 165, 51, 0.1);"></i>
                            <span>Jasa Pembukuan, Pelaporan Keuangan, serta Audit Terintegrasi</span>
                        </div>
                        <div class="hero-feature animate-fade-in delay-300">
                            <i class="fas fa-user-friends" style="color:#8FA31E; background: rgba(143, 163, 30, 0.1);"></i>
                            <span>Konsultasi 1-on-1 untuk Menentukan Strategi Perpajakan Anda</span>
                        </div>
                    </div>
                    
                    <div class="hero-buttons">
                        <a href="#services" class="btn btn-primary">
                            <i class="fas fa-rocket"></i> Lihat Layanan
                        </a>
                        <a href="#consultation" class="btn btn-secondary">
                            <i class="fas fa-calendar-check"></i> Konsultasi Gratis
                        </a>
                    </div>
                </div>
                
                <div class="hero-image animate-fade-in delay-200">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Konsultan Pajak Profesional">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="container">
            <div class="section-title">
                <h2>Tentang Paham Pajak</h2>
                <p>Mengenal lebih dekat layanan dan komitmen kami dalam memberikan solusi perpajakan terbaik</p>
            </div>
            
            <div class="about-content">
                <div class="about-image animate-fade-in">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Tentang Paham Pajak">
                </div>
                
                <div class="about-text">
                    <h2>Solusi Perpajakan Terpercaya</h2>
                    <p>Paham Pajak didirikan dengan misi untuk membantu pelaku usaha dan individu dalam mengelola kewajiban perpajakan mereka dengan cara yang mudah, transparan, dan sesuai dengan regulasi yang berlaku.</p>
                    
                    <p>Dengan pengalaman lebih dari satu dekade, kami telah membantu ribuan klien dari berbagai sektor industri untuk memastikan kepatuhan pajak sekaligus mengoptimalkan potensi penghematan pajak yang legal dan etis.</p>
                    
                    <div class="about-features">
                        <div class="about-feature animate-fade-in delay-100">
                            <i class="fas fa-check"></i>
                            <span>Konsultan pajak bersertifikat dan berpengalaman</span>
                        </div>
                        <div class="about-feature animate-fade-in delay-200">
                            <i class="fas fa-check"></i>
                            <span>Layanan komprehensif dari konsultasi hingga representasi</span>
                        </div>
                        <div class="about-feature animate-fade-in delay-300">
                            <i class="fas fa-check"></i>
                            <span>Pendekatan personal untuk setiap klien</span>
                        </div>
                        <div class="about-feature">
                            <i class="fas fa-check"></i>
                            <span>Update regulasi pajak terkini</span>
                        </div>
                    </div>
                    
                    <a href="#consultation" class="btn btn-primary">
                        <i class="fas fa-comments"></i> Konsultasi Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section services" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Layanan Pajak & Akuntansi Terintegrasi</h2>
                <p>Pahampajak menyediakan berbagai layanan perpajakan dan akuntansi terintegrasi untuk membantu menyelesaikan semua kebutuhan perpajakan Anda.</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card animate-fade-in">
                    <div class="service-icon" style="color: #007bff; background: rgba(0, 123, 255, 0.1);">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>Jasa Akuntansi</h3>
                    <p>Layanan pembukuan dan pelaporan keuangan yang akurat dan sesuai standar untuk kebutuhan bisnis Anda.</p>
                    <a href="#" class="service-link">
                        Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="service-card animate-fade-in delay-100">
                    <div class="service-icon" style="color: #28a745; background: rgba(40, 167, 69, 0.1);">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Konsultasi Pajak</h3>
                    <p>Dapatkan solusi perpajakan terbaik dengan bimbingan dari konsultan pajak berpengalaman.</p>
                    <a href="#" class="service-link">
                        Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="service-card animate-fade-in delay-200">
                    <div class="service-icon" style="color: #ffc107; background: rgba(255, 193, 7, 0.1);">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Pelatihan USKP</h3>
                    <p>Program bimbingan belajar untuk persiapan ujian sertifikasi konsultan pajak yang komprehensif.</p>
                    <a href="#" class="service-link">
                        Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="service-card animate-fade-in">
                    <div class="service-icon" style="color: #dc3545; background: rgba(220, 53, 69, 0.1);">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3>Litigasi Pajak</h3>
                    <p>Pendampingan dan penyelesaian sengketa pajak dengan strategi yang efektif.</p>
                    <a href="#" class="service-link">
                        Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="service-card animate-fade-in delay-100">
                    <div class="service-icon" style="color: #6f42c1; background: rgba(111, 66, 193, 0.1);">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Jasa Pembuatan PT</h3>
                    <p>Pendirian badan usaha dan pengurusan perizinan lengkap dengan konsultasi yang tepat.</p>
                    <a href="#" class="service-link">
                        Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="service-card animate-fade-in delay-200">
                    <div class="service-icon" style="color: #20c997; background: rgba(32, 201, 151, 0.1);">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Aplikasi Pajak</h3>
                    <p>Software perpajakan untuk memudahkan administrasi dan kepatuhan perpajakan Anda.</p>
                    <a href="#" class="service-link">
                        Pelajari Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section stats">
        <div class="container">
            <div class="section-title">
                <h2 style="color: white;">Pengalaman & Reputasi Terpercaya</h2>
                <p style="color: rgba(255, 255, 255, 0.9);">Pahampajak telah dipercaya oleh ratusan klien di seluruh Indonesia untuk menyelesaikan berbagai permasalahan perpajakan mereka.</p>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item animate-fade-in">
                    <h3 data-target="20">0+</h3>
                    <p>Konsultan Pajak Bersertifikat</p>
                </div>
                <div class="stat-item animate-fade-in delay-100">
                    <h3 data-target="150">0+</h3>
                    <p>Sesi Pelatihan Dilaksanakan</p>
                </div>
                <div class="stat-item animate-fade-in delay-200">
                    <h3 data-target="550">0+</h3>
                    <p>Kasus Sengketa Berhasil Diselesaikan</p>
                </div>
                <div class="stat-item animate-fade-in delay-300">
                    <h3 data-target="5000">0+</h3>
                    <p>Wajib Pajak Terlayani</p>
                </div>
            </div>
            
            <div class="stats-footer">
                <h3>Pahampajak</h3>
                <p>Memberikan solusi perpajakan yang komprehensif dengan jaringan luas dan didukung konsultan pajak berpengalaman.</p>
            </div>
        </div>
    </section>

    <!-- Consultation Section -->
    <section class="consultation" id="consultation">
        <div class="container">
            <div class="consultation-content">
                <h2>Konsultasi Gratis</h2>
                <p>Jadwalkan sesi konsultasi gratis dengan konsultan kami untuk membahas kebutuhan perpajakan dan akuntansi bisnis Anda.</p>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-calendar-alt"></i> Jadwalkan Sekarang
                </a>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation on scroll
        const animatedElements = document.querySelectorAll('.animate-fade-in');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { 
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => {
            observer.observe(el);
        });
        
        // Counter animation for stats
        const counters = document.querySelectorAll('.stat-item h3');
        let hasCounted = false;
        
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasCounted) {
                    hasCounted = true;
                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-target'));
                        let count = 0;
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        
                        const updateCount = () => {
                            if (count < target) {
                                count += increment;
                                counter.textContent = Math.ceil(count) + '+';
                                requestAnimationFrame(updateCount);
                            } else {
                                counter.textContent = target + '+';
                            }
                        };
                        
                        updateCount();
                    });
                }
            });
        }, { threshold: 0.5 });
        
        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            counterObserver.observe(statsSection);
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });
</script>
@endsection