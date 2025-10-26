@extends('layouts.master')

@section('title', 'Audit Laporan Keuangan Profesional')

@section('content')
<section class="audit-service">
    <!-- Hero Section -->
    <div class="modern-hero">
        <div class="hero-background">
            <div class="hero-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="title-line">Audit Laporan</span>
                        <span class="title-line highlight">Keuangan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Jasa audit profesional untuk memastikan <span class="text-highlight">akurasi</span>, 
                        <span class="text-highlight">transparansi</span>, dan <span class="text-highlight">kepatuhan</span> 
                        laporan keuangan perusahaan Anda
                    </p>
                    <p class="hero-description">
                        Tim auditor berpengalaman kami memberikan opini wajar tanpa pengecualian 
                        dengan pendekatan komprehensif dan standar audit tertinggi.
                    </p>
                    <div class="hero-actions">
                        <a href="#services" class="btn btn-primary">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="/kontak" class="btn btn-outline-light">
                            <span>Konsultasi Gratis</span>
                            <i class="fas fa-calendar-check"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="floating-cards">
                        <div class="floating-card card-1">
                            <i class="fas fa-search-dollar"></i>
                            <span>Audit Evidence</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-clipboard-check"></i>
                            <span>Compliance Check</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-chart-bar"></i>
                            <span>Financial Analysis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid - PERBAIKAN UTAMA -->
    <div id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Jenis Layanan Audit</h2>
                <p class="section-subtitle">Solusi audit komprehensif untuk berbagai kebutuhan perusahaan</p>
            </div>

            <div class="services-grid">
                @forelse ($audits as $audit)
                    <div class="service-card">
                        <div class="card-header">
                            <div class="service-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h3>{{ $audit->judul }}</h3>
                            <span class="service-price">Rp {{ number_format($audit->harga, 0, ',', '.') }}</span>
                        </div>

                        <p class="service-description">{{ $audit->detail->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>

                        <div class="card-body">
                            @if (!empty($audit->detail->benefit))
                                <ul class="benefit-list">
                                    @foreach ($audit->detail->benefit as $benefit)
                                        @php
                                            $trimmed = trim($benefit);
                                        @endphp

                                        @if ($trimmed !== '')
                                            @php
                                                $isNegative = Str::startsWith($trimmed, '-');
                                                $text = ltrim($trimmed, '+- ');
                                            @endphp

                                            <li class="mb-2">
                                                <i class="fas fa-{{ $isNegative ? 'times text-danger' : 'check text-success' }} me-2"></i>
                                                {{ $text }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted fs-5">Benefit belum tersedia.</p>
                            @endif
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('audit.show', $audit->id) }}" class="btn btn-primary">
                                Pilih Layanan Ini
                            </a>
                            <a href="/kontak" class="btn btn-outline">
                                <span>Konsultasi</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="no-services">
                        <p>Tidak ada layanan audit yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Audit Process Section -->
    <div class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Proses Audit Kami</h2>
                <p class="section-subtitle">Tahapan sistematis yang menjamin kualitas dan akurasi hasil audit</p>
            </div>
            <div class="process-timeline">
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="process-content">
                        <h4>Perencanaan & Pemahaman</h4>
                        <p>Analisis risiko, pemahaman bisnis client, dan penyusunan program audit yang komprehensif</p>
                        <span class="process-duration">1-2 Minggu</span>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="process-content">
                        <h4>Pelaksanaan Audit</h4>
                        <p>Pengumpulan bukti audit, testing substantif, dan evaluasi pengendalian internal</p>
                        <span class="process-duration">2-4 Minggu</span>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="process-content">
                        <h4>Analisis & Evaluasi</h4>
                        <p>Analytical review, penilaian materialitas, dan evaluasi temuan audit</p>
                        <span class="process-duration">1 Minggu</span>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="process-content">
                        <h4>Pelaporan</h4>
                        <p>Penyusunan laporan audit, management letter, dan presentasi hasil kepada manajemen</p>
                        <span class="process-duration">1 Minggu</span>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="process-content">
                        <h4>Follow Up</h4>
                        <p>Monitoring implementasi rekomendasi dan evaluasi peningkatan sistem</p>
                        <span class="process-duration">Berkelanjutan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Audit Laporan Keuangan Perusahaan Anda?</h3>
                <p>Konsultasikan kebutuhan audit Anda dengan tim profesional kami dan dapatkan laporan audit yang akurat dan terpercaya</p>
                <div class="cta-buttons">
                    <a href="/kontak" class="btn btn-light">Mulai Audit Sekarang</a>
                    <a href="tel:+628123456789" class="btn btn-outline-light">Hubungi Konsultan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary-purple: #7c3aed;
        --secondary-purple: #6d28d9;
        --dark-purple: #5b21b6;
        --light-purple: #ede9fe;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-200: #e2e8f0;
        --gray-800: #1e293b;
        --gray-600: #475569;
        --gray-400: #94a3b8;
        --success: #10b981;
        --warning: #f59e0b;
    }

    .audit-service {
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 clamp(15px, 3vw, 20px);
    }

    /* =========================
       MODERN HERO SECTION
       ========================= */
    .modern-hero {
        min-height: 100vh;
        background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 50%, #8b5cf6 100%);
        color: var(--white);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }

    .hero-shapes {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
        width: clamp(150px, 25vw, 300px);
        height: clamp(150px, 25vw, 300px);
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: clamp(100px, 20vw, 200px);
        height: clamp(100px, 20vw, 200px);
        top: 60%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape-3 {
        width: clamp(80px, 15vw, 150px);
        height: clamp(80px, 15vw, 150px);
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .shape-4 {
        width: clamp(60px, 10vw, 100px);
        height: clamp(60px, 10vw, 100px);
        top: 20%;
        right: 20%;
        animation-delay: 1s;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: clamp(2rem, 4vw, 4rem);
        align-items: center;
        padding: clamp(80px, 10vw, 120px) 0 clamp(60px, 8vw, 80px);
    }

    .hero-text {
        max-width: 600px;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: clamp(1rem, 2vw, 1.5rem);
    }

    .title-line {
        display: block;
    }

    .title-line.highlight {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.3rem);
        line-height: 1.6;
        margin-bottom: clamp(1rem, 2vw, 1.5rem);
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fbbf24;
    }

    .hero-description {
        font-size: clamp(1rem, 1.5vw, 1.1rem);
        line-height: 1.7;
        margin-bottom: clamp(2rem, 3vw, 2.5rem);
        opacity: 0.8;
    }

    .hero-actions {
        display: flex;
        gap: clamp(0.75rem, 1.5vw, 1rem);
        flex-wrap: wrap;
    }

    .hero-visual {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .floating-cards {
        position: relative;
        width: clamp(200px, 30vw, 300px);
        height: clamp(200px, 30vw, 300px);
    }

    .floating-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: clamp(1rem, 2vw, 1.5rem);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        color: var(--white);
        animation: float 3s ease-in-out infinite;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .floating-card i {
        font-size: clamp(1.5rem, 3vw, 2rem);
        margin-bottom: 0.5rem;
    }

    .floating-card span {
        font-size: clamp(0.8rem, 1.5vw, 0.9rem);
        font-weight: 600;
    }

    .card-1 {
        top: 0;
        left: 0;
        animation-delay: 0s;
    }

    .card-2 {
        top: 20%;
        right: 0;
        animation-delay: 1s;
    }

    .card-3 {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        animation-delay: 2s;
    }

    /* =========================
       SERVICES SECTION - PERBAIKAN UTAMA
       ========================= */
    .services-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--gray-50);
    }

    .section-header {
        text-align: center;
        margin-bottom: clamp(2rem, 5vw, 4rem);
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .section-subtitle {
        font-size: clamp(1rem, 2vw, 1.2rem);
        max-width: 600px;
        margin: 0 auto;
        color: var(--gray-600);
    }

    /* PERBAIKAN UTAMA: Grid dengan 3 card per baris di desktop */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
        justify-content: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* PERBAIKAN: Membuat card lebih kecil dan konsisten */
    .service-card {
        position: relative;
        overflow: hidden;
        padding: clamp(1.25rem, 2vw, 1.5rem);
        border-radius: 16px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 380px;
        margin: 0 auto;
        width: 100%;
        min-height: 480px;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .card-header {
        text-align: center;
        margin-bottom: 1.25rem;
    }

    .service-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        margin: 0 auto 1.25rem;
        font-size: 1.5rem;
        color: var(--primary-purple);
        border-radius: 16px;
        background: linear-gradient(135deg, var(--light-purple) 0%, #f3f4f6 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.05);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
    }

    .service-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--gray-800);
        line-height: 1.3;
    }

    .service-price {
        display: inline-block;
        margin-top: 0.5rem;
        font-size: 1.3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #7e22ce, #9333ea, #a855f7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .service-card:hover .service-price {
        transform: scale(1.03);
    }

    .service-description {
        text-align: center;
        color: var(--gray-600);
        margin-bottom: 1.25rem;
        line-height: 1.5;
        font-size: 0.9rem;
        min-height: 60px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-body {
        flex: 1;
        margin-bottom: 1.25rem;
    }

    .benefit-list {
        margin: 1rem 0;
        padding: 0;
        list-style: none;
        max-height: 180px;
        overflow-y: auto;
    }

    .benefit-list li {
        position: relative;
        padding: 0.4rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .benefit-list li:last-child {
        border-bottom: none;
    }

    .benefit-list::-webkit-scrollbar {
        width: 4px;
    }

    .benefit-list::-webkit-scrollbar-track {
        background: var(--gray-100);
        border-radius: 2px;
    }

    .benefit-list::-webkit-scrollbar-thumb {
        background: var(--gray-400);
        border-radius: 2px;
    }

    .benefit-list::-webkit-scrollbar-thumb:hover {
        background: var(--gray-600);
    }

    .no-benefit {
        text-align: center;
        color: var(--gray-600);
        font-style: italic;
        font-size: 0.85rem;
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-top: auto;
        padding-top: 1.25rem;
        border-top: 1px solid var(--gray-100);
    }

    .no-services {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem;
        color: var(--gray-600);
    }

    /* =========================
       PROCESS TIMELINE
       ========================= */
    .process-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--white);
    }

    .process-timeline {
        max-width: 800px;
        margin: 0 auto;
    }

    .process-item {
        display: flex;
        align-items: flex-start;
        gap: clamp(1rem, 2vw, 2rem);
        margin-bottom: clamp(2rem, 3vw, 3rem);
        position: relative;
    }

    .process-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 40px;
        top: 80px;
        bottom: -3rem;
        width: 2px;
        background: var(--gray-200);
    }

    .process-icon {
        width: clamp(60px, 8vw, 80px);
        height: clamp(60px, 8vw, 80px);
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1.25rem, 2vw, 1.5rem);
        flex-shrink: 0;
    }

    .process-content {
        flex: 1;
    }

    .process-content h4 {
        font-size: clamp(1.1rem, 1.5vw, 1.25rem);
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--gray-800);
    }

    .process-content p {
        line-height: 1.6;
        color: var(--gray-600);
        margin-bottom: 0.5rem;
        font-size: clamp(0.9rem, 1.2vw, 1rem);
    }

    .process-duration {
        font-size: clamp(0.8rem, 1.1vw, 0.875rem);
        color: var(--primary-purple);
        font-weight: 600;
    }

    /* =========================
       BUTTONS
       ========================= */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: clamp(0.75rem, 1.5vw, 0.875rem) clamp(1.25rem, 2.5vw, 1.5rem);
        font-size: clamp(0.85rem, 1.3vw, 0.9rem);
        font-weight: 600;
        text-decoration: none;
        border: 2px solid transparent;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        min-height: 44px;
    }

    .btn-primary {
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(124, 58, 237, 0.25);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-purple);
        border-color: var(--primary-purple);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-purple);
        background: var(--white);
        transform: translateY(-2px);
    }

    .btn-light {
        color: var(--gray-800);
        background: var(--white);
    }

    .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    }

    /* =========================
       CTA SECTION
       ========================= */
    .cta-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: linear-gradient(135deg, var(--dark-purple) 0%, var(--primary-purple) 100%);
        color: var(--white);
        text-align: center;
    }

    .cta-content h3 {
        font-size: clamp(2rem, 4vw, 2.5rem);
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--white);
    }

    .cta-content p {
        font-size: clamp(1rem, 2vw, 1.2rem);
        margin: 0 auto clamp(2rem, 3vw, 2.5rem);
        max-width: 600px;
        opacity: 0.9;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    /* =========================
       ANIMATIONS
       ========================= */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =========================
       RESPONSIVE DESIGN - PERBAIKAN UTAMA
       ========================= */
    
    /* Desktop Large - 3 card per baris */
    @media (min-width: 1200px) {
        .services-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        
        .service-card {
            max-width: 100%;
            min-height: 460px;
        }
    }

    /* Desktop Medium - 3 card per baris */
    @media (min-width: 1024px) and (max-width: 1199px) {
        .services-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 1.75rem;
        }
        
        .service-card {
            max-width: 100%;
            min-height: 480px;
            padding: 1.25rem;
        }
        
        .service-icon {
            width: 55px;
            height: 55px;
            font-size: 1.4rem;
        }
        
        .service-card h3 {
            font-size: 1.15rem;
        }
        
        .service-price {
            font-size: 1.2rem;
        }
    }

    /* Tablet - 2 card per baris */
    @media (min-width: 768px) and (max-width: 1023px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .service-card {
            max-width: 100%;
            min-height: 460px;
        }
        
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
        }
    }

    /* Mobile - 1 card per baris */
    @media (max-width: 767px) {
        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            max-width: 400px;
        }
        
        .service-card {
            max-width: 100%;
            min-height: auto;
            padding: 1.25rem;
        }
        
        .hero-content {
            grid-template-columns: 1fr;
            gap: 2rem;
            text-align: center;
            padding: clamp(60px, 8vw, 80px) 0 clamp(40px, 6vw, 60px);
        }
        
        .hero-title {
            font-size: clamp(2rem, 4vw, 2.5rem);
        }
        
        .floating-cards {
            display: none;
        }
        
        .process-item {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .process-item:not(:last-child)::after {
            left: 50%;
            top: 80px;
            bottom: -3rem;
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            max-width: 280px;
        }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
        .container {
            padding: 0 12px;
        }
        
        .service-card {
            padding: 1rem;
        }
        
        .service-icon {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
        }
        
        .service-card h3 {
            font-size: 1.1rem;
        }
        
        .service-price {
            font-size: 1.1rem;
        }
        
        .benefit-list {
            max-height: 150px;
        }
    }

    /* Improve touch targets */
    @media (max-width: 768px) {
        .service-card .btn,
        .process-item,
        .floating-card {
            min-height: 44px;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Prevent horizontal scroll */
    body {
        overflow-x: hidden;
    }
</style>
@endsection