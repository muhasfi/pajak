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

    <!-- Services Grid -->
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

<<<<<<< HEAD:resources/views/product/layanan/audit.blade.php
                                            <li class="benefit-item">
                                                <i class="fas fa-{{ $isNegative ? 'times text-danger' : 'check text-success' }} me-2"></i>
                                                {{ $text }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="no-benefit">Benefit belum tersedia.</p>
                            @endif
=======
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
>>>>>>> 57a570d935c2354eaad6227ce1f0de83c30beef7:resources/views/product/layanan/audit/audit.blade.php
                        </div>
                        <div class="card-footer">
                            <button type="button" 
                                class="btn btn-primary"
                                onclick="addToCart({{ $audit->id }}, 'ItemAudit')">
                                <span>Mulai Layanan</span>
                            </button>
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

    <!-- Audit Standards Section -->
    <div class="standards-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Standar Audit yang Kami Terapkan</h2>
                <p class="section-subtitle">Mengikuti standar profesional tertinggi untuk menjamin kualitas audit</p>
            </div>
            <div class="standards-grid">
                <div class="standard-card">
                    <div class="standard-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h4>International Standards</h4>
                    <p>Menerapkan International Standards on Auditing (ISA) dan IFRS untuk konsistensi global</p>
                    <ul>
                        <li>ISA 200 - Overall Objectives</li>
                        <li>ISA 300 - Planning</li>
                        <li>ISA 500 - Audit Evidence</li>
                        <li>ISA 700 - Forming Opinion</li>
                    </ul>
                </div>
                <div class="standard-card">
                    <div class="standard-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h4>National Standards</h4>
                    <p>Kepatuhan terhadap Standar Profesional Akuntan Publik (SPAP) Indonesia</p>
                    <ul>
                        <li>SA 200 - Tujuan Keseluruhan</li>
                        <li>SA 300 - Perencanaan Audit</li>
                        <li>SA 500 - Bukti Audit</li>
                        <li>SA 700 - Laporan Auditor</li>
                    </ul>
                </div>
                <div class="standard-card">
                    <div class="standard-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h4>Quality Control</h4>
                    <p>Sistem kendali mutu yang ketat untuk memastikan independensi dan profesionalisme</p>
                    <ul>
                        <li>Peer review system</li>
                        <li>Quality assurance</li>
                        <li>Independence monitoring</li>
                        <li>Continuous training</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Industries -->
    <div class="industries-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Industri yang Kami Layani</h2>
                <p class="section-subtitle">Pengalaman luas dalam berbagai sektor industri dan bisnis</p>
            </div>
            <div class="industries-grid">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h4>Manufaktur</h4>
                    <p>Audit untuk perusahaan manufaktur dengan kompleksitas inventory dan cost accounting</p>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Retail & E-commerce</h4>
                    <p>Audit perusahaan retail dengan multi-channel revenue recognition</p>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h4>Keuangan & Perbankan</h4>
                    <p>Audit lembaga keuangan dengan regulasi khusus dan risk management</p>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-hard-hat"></i>
                    </div>
                    <h4>Konstruksi & Property</h4>
                    <p>Audit perusahaan konstruksi dengan percentage of completion method</p>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4>Logistik & Transportasi</h4>
                    <p>Audit perusahaan logistik dengan asset-heavy operations</p>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Teknologi & Startup</h4>
                    <p>Audit perusahaan teknologi dengan revenue model yang inovatif</p>
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

    /* PERBAIKAN: Grid yang memaksa ukuran card tetap kecil */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
        justify-content: center;
        max-width: 1000px;
        margin: 0 auto;
    }

    /* PERBAIKAN: Membatasi lebar maksimum card */
    .service-card {
        position: relative;
        overflow: hidden;
        padding: clamp(1.5rem, 3vw, 2rem);
        border-radius: 20px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 400px;
        margin: 0 auto;
        width: 100%;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
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

    .card-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .service-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        font-size: 1.75rem;
        color: var(--primary-purple);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-purple) 0%, #f3f4f6 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
    }

    .service-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
        line-height: 1.3;
    }

    .service-price {
        display: inline-block;
        margin-top: 0.5rem;
        font-size: 1.4rem;
        font-weight: 800;
        background: linear-gradient(135deg, #7e22ce, #9333ea, #a855f7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .service-card:hover .service-price {
        transform: scale(1.05);
    }

    .service-description {
        text-align: center;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .benefit-list {
        margin: 1.5rem 0;
        padding: 0;
        list-style: none;
    }

    .benefit-item {
        position: relative;
        padding: 0.5rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .benefit-item:last-child {
        border-bottom: none;
    }

    .no-benefit {
        text-align: center;
        color: var(--gray-600);
        font-style: italic;
        font-size: 0.9rem;
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-top: auto;
        padding-top: 1.5rem;
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
       STANDARDS SECTION
       ========================= */
    .standards-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--gray-50);
    }

    .standards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 350px), 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
    }

    .standard-card {
        background: var(--white);
        border-radius: 16px;
        padding: clamp(2rem, 3vw, 2.5rem) clamp(1.5rem, 2vw, 2rem);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .standard-card:hover {
        transform: translateY(-5px);
    }

    .standard-icon {
        width: clamp(60px, 8vw, 80px);
        height: clamp(60px, 8vw, 80px);
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        color: var(--white);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1.5rem, 2.5vw, 2rem);
        margin-bottom: 1.5rem;
    }

    .standard-card h4 {
        font-size: clamp(1.1rem, 1.5vw, 1.25rem);
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .standard-card p {
        line-height: 1.6;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
        font-size: clamp(0.9rem, 1.2vw, 1rem);
    }

    .standard-card ul {
        list-style: none;
        padding: 0;
    }

    .standard-card li {
        padding: 0.5rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
        font-size: clamp(0.85rem, 1.1vw, 0.9rem);
    }

    .standard-card li:last-child {
        border-bottom: none;
    }

    .standard-card li::before {
        content: '•';
        color: var(--primary-purple);
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }

    /* =========================
       INDUSTRIES SECTION
       ========================= */
    .industries-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--white);
    }

    .industries-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 250px), 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
    }

    .industry-card {
        text-align: center;
        padding: clamp(1.5rem, 2vw, 2rem) clamp(1rem, 1.5vw, 1.5rem);
        background: var(--gray-50);
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .industry-card:hover {
        transform: translateY(-5px);
        background: var(--light-purple);
    }

    .industry-icon {
        width: clamp(50px, 7vw, 70px);
        height: clamp(50px, 7vw, 70px);
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        color: var(--white);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1.25rem, 2vw, 1.5rem);
        margin: 0 auto 1rem;
    }

    .industry-card h4 {
        font-size: clamp(1rem, 1.3vw, 1.1rem);
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--gray-800);
    }

    .industry-card p {
        line-height: 1.5;
        color: var(--gray-600);
        font-size: clamp(0.85rem, 1.1vw, 0.9rem);
    }

    /* =========================
       BUTTONS
       ========================= */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: clamp(0.875rem, 2vw, 1rem) clamp(1.5rem, 3vw, 2rem);
        font-size: clamp(0.9rem, 1.5vw, 1rem);
        font-weight: 600;
        text-decoration: none;
        border: 2px solid transparent;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        min-height: 50px;
    }

    .btn-primary {
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
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
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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
            font-size: clamp(2.5rem, 5vw, 3rem);
        }

        .floating-cards {
            width: clamp(180px, 25vw, 250px);
            height: clamp(180px, 25vw, 250px);
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

        .cart-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .cart-summary {
            position: static;
        }

        /* PERBAIKAN: Tetap kecil di tablet */
        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            max-width: 900px;
        }
    }

    @media (max-width: 768px) {
        .modern-hero {
            min-height: 90vh;
        }

        .hero-content {
            padding: clamp(80px, 10vw, 100px) 0 clamp(40px, 6vw, 60px);
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 2.5rem);
        }

        .hero-subtitle {
            font-size: clamp(1rem, 1.8vw, 1.1rem);
        }

        .section-title {
            font-size: clamp(1.8rem, 3vw, 2.2rem);
        }

        /* PERBAIKAN: Tetap kecil di mobile */
        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            max-width: 400px;
        }

        .service-card {
            padding: 1.5rem;
            max-width: 100%;
        }

        .standards-grid {
            grid-template-columns: 1fr;
        }

        .industries-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .cta-content h3 {
            font-size: clamp(1.75rem, 3vw, 2rem);
        }

        .hero-actions {
            justify-content: center;
        }

        .btn {
            padding: 0.875rem 1.5rem;
            min-height: 44px;
        }

        .card-footer {
            flex-direction: column;
        }

        .cart-item {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .cart-item-actions {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 12px;
        }

        .hero-title {
            font-size: clamp(1.8rem, 3vw, 2rem);
        }

        .hero-subtitle {
            font-size: clamp(0.9rem, 1.5vw, 1rem);
        }

        .section-title {
            font-size: clamp(1.5rem, 2.5vw, 1.8rem);
        }

        .service-card {
            padding: 1.25rem;
        }

        .industries-grid {
            grid-template-columns: 1fr;
        }

        .cta-section {
            padding: 60px 0;
        }

        .cta-content h3 {
            font-size: clamp(1.5rem, 2.5vw, 1.75rem);
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn {
            width: 100%;
            max-width: 280px;
        }

        .floating-cards {
            display: none;
        }
        
        .hero-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .hero-actions .btn {
            width: 100%;
            max-width: 280px;
        }

        .cart-summary {
            padding: 1.5rem;
        }
    }

    @media (max-width: 360px) {
        .service-card {
            padding: 1rem;
        }
        
        .hero-title {
            font-size: 1.6rem;
        }
        
        .section-title {
            font-size: 1.4rem;
        }
        
        .btn {
            min-height: 42px;
            font-size: 0.85rem;
            padding: 0.75rem 1rem;
        }
        
        .service-icon {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
        }

        /* PERBAIKAN: Tetap kecil di layar sangat kecil */
        .services-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Improve touch targets on mobile */
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Cart functionality
    let cart = JSON.parse(localStorage.getItem('audit_cart')) || [];

    function addToCart(id, type) {
        fetch("{{ route('cart.add', [], false) }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id: id, type: type }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Add to local cart for UI
                const service = {
                    id: id,
                    type: type,
                    name: data.item_name || 'Layanan Audit',
                    price: data.item_price || 0,
                    quantity: 1
                };
                
                const existingItem = cart.find(item => item.id === id && item.type === type);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push(service);
                }
                
                localStorage.setItem('audit_cart', JSON.stringify(cart));
                updateCartUI();
                
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message
                });
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    function updateCartUI() {
        const cartItems = document.querySelector('.cart-items');
        const cartSubtotal = document.getElementById('cart-subtotal');
        const cartTax = document.getElementById('cart-tax');
        const cartTotal = document.getElementById('cart-total');
        
        if (cart.length === 0) {
            cartItems.innerHTML = `
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <h3>Keranjang Kosong</h3>
                    <p>Tambahkan layanan audit ke keranjang Anda</p>
                </div>
            `;
            cartSubtotal.textContent = 'Rp 0';
            cartTax.textContent = 'Rp 0';
            cartTotal.textContent = 'Rp 0';
            return;
        }
        
        let subtotal = 0;
        cartItems.innerHTML = '';
        
        cart.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;
            
            const cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            cartItem.innerHTML = `
                <div class="cart-item-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div class="cart-item-details">
                    <h4 class="cart-item-title">${item.name}</h4>
                    <div class="cart-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                </div>
                <div class="cart-item-actions">
                    <div class="quantity-control">
                        <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" class="quantity-input" value="${item.quantity}" min="1" 
                               onchange="updateQuantityInput(${index}, this.value)">
                        <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <button class="remove-btn" onclick="removeFromCart(${index})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            cartItems.appendChild(cartItem);
        });
        
        const tax = subtotal * 0.1;
        const total = subtotal + tax;
        
        cartSubtotal.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        cartTax.textContent = `Rp ${tax.toLocaleString('id-ID')}`;
        cartTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;
    }

    function updateQuantity(index, change) {
        cart[index].quantity += change;
        if (cart[index].quantity < 1) {
            cart[index].quantity = 1;
        }
        localStorage.setItem('audit_cart', JSON.stringify(cart));
        updateCartUI();
    }

    function updateQuantityInput(index, value) {
        const quantity = parseInt(value);
        if (quantity > 0) {
            cart[index].quantity = quantity;
            localStorage.setItem('audit_cart', JSON.stringify(cart));
            updateCartUI();
        }
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        localStorage.setItem('audit_cart', JSON.stringify(cart));
        updateCartUI();
        
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Item berhasil dihapus dari keranjang',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function clearCart() {
        cart = [];
        localStorage.setItem('audit_cart', JSON.stringify(cart));
        updateCartUI();
        
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Keranjang berhasil dikosongkan',
            timer: 1500,
            showConfirmButton: false
        });
    }

    function checkout() {
        if (cart.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Keranjang Kosong',
                text: 'Tambahkan layanan ke keranjang sebelum melanjutkan'
            });
            return;
        }
        
        // Redirect to checkout page or show checkout modal
        window.location.href = '/checkout';
    }

    // Initialize cart UI when page loads
    document.addEventListener('DOMContentLoaded', function() {
        updateCartUI();
        
        // Add event listeners for cart buttons
        document.getElementById('clear-cart-btn').addEventListener('click', clearCart);
        document.getElementById('checkout-btn').addEventListener('click', checkout);
    });
</script>