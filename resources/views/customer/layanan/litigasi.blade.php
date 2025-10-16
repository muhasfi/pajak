@extends('layouts.master')

@section('title', 'Litigasi & Sengketa Perpajakan')

@section('content')
<section class="litigation-service">
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
                        <span class="title-line">Litigasi &</span>
                        <span class="title-line highlight">Sengketa Perpajakan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi komprehensif untuk penyelesaian sengketa pajak dengan pendekatan <span class="text-highlight">strategis</span>, 
                        <span class="text-highlight">profesional</span>, dan <span class="text-highlight">berpengalaman</span>
                    </p>
                    <p class="hero-description">
                        Tim ahli litigasi pajak kami siap mendampingi Anda dalam setiap tahap sengketa perpajakan, 
                        dari banding hingga pengadilan pajak. Dapatkan perlindungan hukum terbaik untuk hak perpajakan Anda.
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
                            <i class="fas fa-balance-scale"></i>
                            <span>Pengadilan Pajak</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-file-contract"></i>
                            <span>Banding & Gugatan</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-user-tie"></i>
                            <span>Konsultan Hukum</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Layanan Litigasi Perpajakan</h2>
                <p class="section-subtitle">Komprehensif solusi hukum untuk setiap tahap sengketa perpajakan</p>
            </div>

            <div class="services-grid">
                <!-- Service 1 -->
                @foreach($litigasi as $item)
                <div class="service-card">
                    <div class="card-header">
                        <div class="service-icon">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <h3>{{ $item->judul }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $item->details->first()->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
                        <ul class="feature-list">
                            @if($item->details->first() && $item->details->first()->benefit)
                                @foreach($item->details->first()->benefit as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            @else
                                <li>Belum ada benefit tersedia</li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer">
                        {{-- <span class="price">Rp {{ number_format($item->harga, 0, ',', '.') }}</span> --}}
                        <a href="#" class="btn btn-primary">
                            <span>Rp.{{ number_format($item->harga, 0, ',', '.') }}</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('litigasi.show', $item->id) }}" class="btn btn-outline">
                            <span>Detail Layanan</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Proses Penanganan Sengketa</h2>
                <p class="section-subtitle">Tahapan sistematis untuk penyelesaian sengketa perpajakan yang optimal</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h4>Konsultasi Awal</h4>
                        <p>Analisis dokumen dan identifikasi masalah hukum untuk menentukan strategi terbaik</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h4>Penyusunan Dokumen</h4>
                        <p>Pembuatan memorandum banding, gugatan, atau tanggapan hukum yang komprehensif</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h4>Proses Hukum</h4>
                        <p>Pendampingan dalam setiap tahap proses hukum dari banding hingga pengadilan</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">04</div>
                    <div class="step-content">
                        <h4>Monitoring & Evaluasi</h4>
                        <p>Pemantauan berkelanjutan dan evaluasi perkembangan kasus untuk hasil optimal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary-blue: #2563eb;
        --secondary-blue: #1d4ed8;
        --dark-blue: #1e3a8a;
        --light-blue: #dbeafe;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-800: #1e293b;
        --gray-600: #475569;
        --gray-400: #94a3b8;
        --success: #10b981;
        --warning: #f59e0b;
    }

    .litigation-service {
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* =========================
       MODERN HERO SECTION
       ========================= */
    .modern-hero {
        min-height: 100vh;
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
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
        width: 300px;
        height: 300px;
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        top: 60%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape-3 {
        width: 150px;
        height: 150px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .shape-4 {
        width: 100px;
        height: 100px;
        top: 20%;
        right: 20%;
        animation-delay: 1s;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        padding: 120px 0 80px;
    }

    .hero-text {
        max-width: 600px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
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
        font-size: 1.3rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fbbf24;
    }

    .hero-description {
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 2.5rem;
        opacity: 0.8;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-visual {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .floating-cards {
        position: relative;
        width: 300px;
        height: 300px;
    }

    .floating-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        color: var(--white);
        animation: float 3s ease-in-out infinite;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .floating-card i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .floating-card span {
        font-size: 0.9rem;
        font-weight: 600;
        text-align: center;
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

    .hero-stats {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        padding: 3rem 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-item {
        text-align: center;
        background: transparent;
    }

    .stat-number {
        display: block;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: var(--white);
    }

    .stat-label {
        font-size: 0.9rem;
        font-weight: 500;
        opacity: 0.8;
        color: var(--white);
    }

    /* =========================
       SERVICES SECTION
       ========================= */
    .services-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .section-subtitle {
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
        color: var(--gray-600);
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
    }

    .service-card {
        position: relative;
        overflow: hidden;
        padding: 2.5rem;
        border-radius: 20px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card.featured {
        border: 2px solid var(--primary-blue);
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--light-blue) 100%);
    }

    .card-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--white);
        background: #dc2626;
        border-radius: 20px;
        text-transform: uppercase;
    }

    .card-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .service-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--primary-blue);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-blue) 0%, #eff6ff 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    }

    .service-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .card-body p {
        margin-bottom: 1.5rem;
        line-height: 1.6;
        color: var(--gray-600);
    }

    .feature-list {
        margin: 1.5rem 0;
        padding: 0;
        list-style: none;
    }

    .feature-list li {
        position: relative;
        padding: 0.5rem 0 0.5rem 1.5rem;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .feature-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        font-weight: 600;
        color: var(--success);
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-top: 2rem;
    }

    /* =========================
       PROCESS SECTION
       ========================= */
    .process-section {
        padding: 100px 0;
        background: var(--white);
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .process-step {
        text-align: center;
        padding: 2rem;
        position: relative;
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 auto 1.5rem;
    }

    .step-content h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .step-content p {
        line-height: 1.6;
        color: var(--gray-600);
    }

    /* =========================
       CASE STUDIES
       ========================= */
    .case-studies {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .cases-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .case-card {
        background: var(--white);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .case-card:hover {
        transform: translateY(-5px);
    }

    .case-header {
        display: flex;
        justify-content: between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .case-header h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
        flex: 1;
        margin-right: 1rem;
    }

    .case-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .case-badge.success {
        background: #d1fae5;
        color: #065f46;
    }

    .case-body p {
        line-height: 1.6;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
    }

    .case-details {
        display: grid;
        gap: 0.75rem;
    }

    .case-detail {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid var(--gray-100);
    }

    .case-detail:last-child {
        border-bottom: none;
    }

    .label {
        font-size: 0.9rem;
        color: var(--gray-600);
    }

    .value {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--gray-800);
    }

    /* =========================
       BUTTONS
       ========================= */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid transparent;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-primary {
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-blue);
        border-color: var(--primary-blue);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-blue);
        background: var(--white);
        transform: translateY(-2px);
    }

    .btn-light {
        color: var(--gray-800);
        background: var(--white);
    }

    .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* =========================
       CTA SECTION
       ========================= */
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
        color: var(--white);
        text-align: center;
    }

    .cta-content h3 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--white);
    }

    .cta-content p {
        font-size: 1.2rem;
        margin: 0 auto 2.5rem;
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
            transform: translateY(-20px);
        }
    }

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

    /* =========================
       RESPONSIVE DESIGN
       ========================= */
    @media (max-width: 1024px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
        }

        .hero-title {
            font-size: 3rem;
        }

        .floating-cards {
            width: 250px;
            height: 250px;
        }
    }

    @media (max-width: 768px) {
        .modern-hero {
            min-height: 90vh;
        }

        .hero-content {
            padding: 100px 0 60px;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .hero-stats {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .section-title {
            font-size: 2.2rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .service-card {
            padding: 2rem;
        }

        .process-steps {
            grid-template-columns: 1fr;
        }

        .cases-grid {
            grid-template-columns: 1fr;
        }

        .cta-content h3 {
            font-size: 2rem;
        }

        .hero-actions {
            justify-content: center;
        }

        .btn {
            padding: 0.875rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .hero-stats {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .service-card {
            padding: 1.5rem;
        }

        .cta-section {
            padding: 80px 0;
        }

        .cta-content h3 {
            font-size: 1.75rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn {
            width: 100%;
            max-width: 300px;
        }

        .floating-cards {
            display: none;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection