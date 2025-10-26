@extends('layouts.master')

@section('title', 'Transfer Pricing Documentation')

@section('content')
<section class="transfer-pricing-service">
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
                        <span class="title-line">Transfer Pricing</span>
                        <span class="title-line highlight">Documentation</span>
                    </h1>
                    <p class="hero-subtitle">
                        Penyusunan dokumentasi transfer pricing yang <span class="text-highlight">komprehensif</span>, 
                        <span class="text-highlight">sesuai regulasi</span>, dan <span class="text-highlight">mematuhi standar OECD</span>
                    </p>
                    <p class="hero-description">
                        Tim ahli transfer pricing kami membantu perusahaan multinasional dan grup usaha 
                        dalam menyusun dokumentasi yang robust untuk meminimalkan risiko perpajakan.
                    </p>
                    <div class="hero-actions">
                        <a href="#services" class="btn btn-primary">
                            <span>Lihat Layanan</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="/kontak" class="btn btn-outline-light">
                            <span>Konsultasi Ahli</span>
                            <i class="fas fa-calendar-check"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="floating-cards">
                        <div class="floating-card card-1">
                            <i class="fas fa-file-contract"></i>
                            <span>Master File</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-chart-network"></i>
                            <span>Local File</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-globe"></i>
                            <span>CbC Report</span>
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
                <h2 class="section-title">Layanan Dokumentasi Transfer Pricing</h2>
                <p class="section-subtitle">Solusi lengkap untuk kepatuhan transfer pricing sesuai BEPS Action 13</p>
            </div>

            <div class="services-grid">
                @foreach ($transfers as $transfer)
                    <div class="service-card">
                        <div class="card-header">
                            <div class="service-icon">
                                @switch($loop->iteration)
                                    @case(1)
                                        <i class="fas fa-file-alt"></i>
                                        @break
                                    @case(2)
                                        <i class="fas fa-map-marked-alt"></i>
                                        @break
                                    @case(3)
                                        <i class="fas fa-globe-americas"></i>
                                        @break
                                    @default
                                        <i class="fas fa-briefcase"></i>
                                @endswitch
                            </div>
                            <h3 class="service-title">{{ $transfer->judul }}</h3>
                            <h4 class="service-price">
                                Rp{{ number_format($transfer->harga, 0, ',', '.') }}
                            </h4>
                        </div>
                        
                        <p class="service-description">
                            {{ $transfer->detail->deskripsi ?? 'Deskripsi tidak tersedia' }}
                        </p>

                        <div class="card-body">
                            @if (!empty($transfer->detail->benefit))
                                <ul class="benefits-list">
                                    @foreach ($transfer->detail->benefit as $benefit)
                                        @php
                                            $trimmed = trim($benefit);
                                        @endphp

                                        @if ($trimmed !== '')
                                            @php
                                                $isNegative = Str::startsWith($trimmed, '-');
                                                $text = ltrim($trimmed, '+- ');
                                            @endphp

                                            <li class="benefit-item">
                                                <i class="fas fa-{{ $isNegative ? 'times text-danger' : 'check text-success' }} me-2"></i>
                                                {{ $text }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="no-benefits">Benefit belum tersedia.</p>
                            @endif
                        </div>
                        <div class="card-footer mt-auto">
                            <a href="{{ route('transfer.show', $transfer->id) }}" class="btn btn-primary">
                                Pilih Layanan Ini
                            </a>
                            <a href="/kontak" class="btn btn-outline">
                                <span>Konsultasi</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Compliance Requirements -->
    <div class="compliance-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kewajiban Transfer Pricing di Indonesia</h2>
                <p class="section-subtitle">Pemahaman mendalam mengenai regulasi dan kewajiban dokumentasi</p>
            </div>
            <div class="compliance-grid">
                <div class="compliance-card">
                    <div class="compliance-header">
                        <h4>Kriteria Wajib Dokumen</h4>
                        <div class="compliance-badge mandatory">Wajib</div>
                    </div>
                    <div class="compliance-body">
                        <ul>
                            <li>Transaksi dengan pihak berelasi</li>
                            <li>Nilai transaksi > Rp 10 miliar</li>
                            <li>Perusahaan di dalam negeri</li>
                            <li>Transaksi lintas yurisdiksi</li>
                            <li>Bentuk transaksi tertentu</li>
                        </ul>
                    </div>
                </div>
                <div class="compliance-card">
                    <div class="compliance-header">
                        <h4>Batas Waktu Penyampaian</h4>
                        <div class="compliance-badge deadline">Timeline</div>
                    </div>
                    <div class="compliance-body">
                        <ul>
                            <li>Master File: 12 bulan setelah tahun buku</li>
                            <li>Local File: 4 bulan setelah tahun buku</li>
                            <li>CbC Report: 12 bulan setelah tahun buku</li>
                            <li>Dokumen tambahan sesuai permintaan</li>
                        </ul>
                    </div>
                </div>
                <div class="compliance-card">
                    <div class="compliance-header">
                        <h4>Sanksi Keterlambatan</h4>
                        <div class="compliance-badge penalty">Sanksi</div>
                    </div>
                    <div class="compliance-body">
                        <ul>
                            <li>Denda administratif 2% dari nilai transaksi</li>
                            <li>Koreksi fiskal oleh otoritas pajak</li>
                            <li>Penalti untuk ketidakpatuhan</li>
                            <li>Risiko pemeriksaan pajak</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Methodology Section -->
    <div class="methodology-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Metodologi Transfer Pricing</h2>
                <p class="section-subtitle">Pendekatan komprehensif berdasarkan OECD Transfer Pricing Guidelines</p>
            </div>
            <div class="methodology-steps">
                <div class="methodology-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Analisis Transaksi</h4>
                        <p>Identifikasi dan karakterisasi transaksi dengan pihak berelasi</p>
                        <ul>
                            <li>Analisis kontrak dan perjanjian</li>
                            <li>Pemetaan transaksi berelasi</li>
                            <li>Karakterisasi fungsi dan risiko</li>
                        </ul>
                    </div>
                </div>
                <div class="methodology-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Analisis Komparabilitas</h4>
                        <p>Pencarian dan analisis perusahaan pembanding independen</p>
                        <ul>
                            <li>Pencarian database komparabel</li>
                            <li>Analisis kriteria komparabilitas</li>
                            <li>Seleksi perusahaan pembanding</li>
                        </ul>
                    </div>
                </div>
                <div class="methodology-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Pemilihan Metode</h4>
                        <p>Seleksi metode transfer pricing yang paling sesuai</p>
                        <ul>
                            <li>Comparable Uncontrolled Price (CUP)</li>
                            <li>Resale Price Method</li>
                            <li>Cost Plus Method</li>
                            <li>Transactional Net Margin Method (TNMM)</li>
                            <li>Profit Split Method</li>
                        </ul>
                    </div>
                </div>
                <div class="methodology-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Penetapan Harga Wajar</h4>
                        <p>Penetapan rentang harga wajar berdasarkan analisis</p>
                        <ul>
                            <li>Perhitungan rentang kewajaran</li>
                            <li>Analisis titik tengah</li>
                            <li>Kesesuaian dengan arm's length principle</li>
                        </ul>
                    </div>
                </div>
                <div class="methodology-step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h4>Dokumentasi & Compliance</h4>
                        <p>Penyusunan dokumentasi lengkap untuk kepatuhan</p>
                        <ul>
                            <li>Penyusunan master file</li>
                            <li>Penyusunan local file</li>
                            <li>Pelaporan Country-by-Country</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industry Expertise -->
    <div class="industry-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Spesialisasi Industri</h2>
                <p class="section-subtitle">Pengalaman luas dalam berbagai sektor industri dengan kompleksitas transfer pricing</p>
            </div>
            <div class="industry-grid">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h4>Manufaktur</h4>
                    <p>Struktur supply chain yang kompleks dengan multiple transfer points</p>
                    <span class="industry-tag">Contract Manufacturing</span>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Teknologi & IT</h4>
                    <p>Valuasi intellectual property dan cost sharing arrangements</p>
                    <span class="industry-tag">IP Valuation</span>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h4>Farmasi & Healthcare</h4>
                    <p>R&D intensive dengan complex licensing agreements</p>
                    <span class="industry-tag">R&D Cost Sharing</span>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-gas-pump"></i>
                    </div>
                    <h4>Energi & Mining</h4>
                    <p>Commodity pricing dan long-term contracts dengan volatilitas tinggi</p>
                    <span class="industry-tag">Commodity Pricing</span>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h4>Jasa Keuangan</h4>
                    <p>Intra-group financing, guarantees, dan treasury operations</p>
                    <span class="industry-tag">Financial Services</span>
                </div>
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h4>Logistik & Distribusi</h4>
                    <p>Supply chain optimization dan margin distribution analysis</p>
                    <span class="industry-tag">Distribution Margin</span>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Memenuhi Kewajiban Transfer Pricing Perusahaan Anda?</h3>
                <p>Konsultasikan dengan ahli transfer pricing kami dan dapatkan dokumentasi yang robust untuk meminimalkan risiko perpajakan</p>
                <div class="cta-buttons">
                    <a href="/kontak" class="btn btn-light">
                        <span>Konsultasi Ahli</span>
                        <i class="fas fa-calendar-check"></i>
                    </a>
                    <a href="tel:+628123456789" class="btn btn-outline-light">
                        <span>Hubungi Spesialis</span>
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary-teal: #0d9488;
        --secondary-teal: #0f766e;
        --dark-teal: #115e59;
        --light-teal: #ccfbf1;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-800: #1e293b;
        --gray-600: #475569;
        --gray-400: #94a3b8;
        --success: #10b981;
        --warning: #f59e0b;
        --error: #ef4444;
    }

    .transfer-pricing-service {
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
        background: linear-gradient(135deg, #115e59 0%, #0d9488 50%, #14b8a6 100%);
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
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }

    .title-line {
        display: block;
    }

    .title-line.highlight {
        background: linear-gradient(135deg, #fde68a, #fcd34d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.3rem);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fde68a;
    }

    .hero-description {
        font-size: clamp(1rem, 1.5vw, 1.1rem);
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

    /* Services Grid - Responsive dengan jumlah card yang fleksibel */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        justify-items: center;
    }

    /* Service Card - Tetap konsisten ukurannya */
    .service-card {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 380px;
        min-height: 500px;
        padding: 2rem;
        border-radius: 20px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-teal), var(--secondary-teal));
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
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--primary-teal);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-teal) 0%, #ecfdf5 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-teal) 0%, var(--secondary-teal) 100%);
    }

    .service-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--gray-800);
    }

    .service-price {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-teal);
        margin: 0;
    }

    .service-description {
        text-align: center;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .card-body {
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }

    .benefits-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .benefit-item {
        padding: 0.5rem 0;
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.95rem;
    }

    .benefit-item:last-child {
        border-bottom: none;
    }

    .no-benefits {
        color: var(--gray-600);
        text-align: center;
        font-style: italic;
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    /* =========================
       COMPLIANCE SECTION
       ========================= */
    .compliance-section {
        padding: 100px 0;
        background: var(--white);
    }

    .compliance-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .compliance-card {
        background: var(--gray-50);
        border-radius: 16px;
        padding: 2rem;
        transition: transform 0.3s ease;
    }

    .compliance-card:hover {
        transform: translateY(-5px);
    }

    .compliance-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .compliance-header h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
        margin: 0;
    }

    .compliance-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .compliance-badge.mandatory {
        background: #fee2e2;
        color: #dc2626;
    }

    .compliance-badge.deadline {
        background: #fef3c7;
        color: #d97706;
    }

    .compliance-badge.penalty {
        background: #fecaca;
        color: #dc2626;
    }

    .compliance-body ul {
        list-style: none;
        padding: 0;
    }

    .compliance-body li {
        padding: 0.5rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
        position: relative;
        padding-left: 1rem;
    }

    .compliance-body li:last-child {
        border-bottom: none;
    }

    .compliance-body li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: var(--primary-teal);
        font-weight: bold;
    }

    /* =========================
       METHODOLOGY SECTION
       ========================= */
    .methodology-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .methodology-steps {
        max-width: 900px;
        margin: 0 auto;
    }

    .methodology-step {
        display: flex;
        align-items: flex-start;
        gap: 2rem;
        margin-bottom: 3rem;
        padding: 2rem;
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .methodology-step:hover {
        transform: translateY(-5px);
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-teal), var(--secondary-teal));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .step-content {
        flex: 1;
    }

    .step-content h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--gray-800);
    }

    .step-content p {
        line-height: 1.6;
        color: var(--gray-600);
        margin-bottom: 1rem;
    }

    .step-content ul {
        list-style: none;
        padding: 0;
    }

    .step-content li {
        padding: 0.25rem 0;
        color: var(--gray-600);
        position: relative;
        padding-left: 1rem;
    }

    .step-content li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: var(--primary-teal);
    }

    /* =========================
       INDUSTRY SECTION
       ========================= */
    .industry-section {
        padding: 100px 0;
        background: var(--white);
    }

    .industry-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }

    .industry-card {
        background: var(--gray-50);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .industry-card:hover {
        transform: translateY(-5px);
        background: var(--light-teal);
    }

    .industry-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-teal), var(--secondary-teal));
        color: var(--white);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }

    .industry-card h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--gray-800);
    }

    .industry-card p {
        line-height: 1.5;
        color: var(--gray-600);
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .industry-tag {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: var(--primary-teal);
        color: var(--white);
        border-radius: 20px;
        font-size: 0.75rem;
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
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid transparent;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        min-height: 54px;
    }

    .btn-primary {
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-teal) 0%, var(--secondary-teal) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-teal);
        border-color: var(--primary-teal);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-teal);
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
        background: linear-gradient(135deg, var(--dark-teal) 0%, var(--primary-teal) 100%);
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
    
    /* Tablet Landscape dan Desktop Kecil */
    @media (max-width: 1024px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
            padding: 100px 0 60px;
        }

        .hero-text {
            max-width: 100%;
        }

        .floating-cards {
            width: 250px;
            height: 250px;
        }

        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .methodology-step {
            gap: 1.5rem;
        }
    }

    /* Tablet Portrait */
    @media (max-width: 768px) {
        .modern-hero {
            min-height: 90vh;
        }

        .hero-content {
            padding: 80px 0 40px;
        }

        .hero-actions {
            justify-content: center;
        }

        .services-section {
            padding: 80px 0;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .service-card {
            max-width: 100%;
            min-height: auto;
            padding: 1.5rem;
        }

        .compliance-section {
            padding: 80px 0;
        }

        .compliance-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .methodology-section {
            padding: 80px 0;
        }

        .methodology-step {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
            padding: 1.5rem;
        }

        .step-number {
            margin: 0 auto 1rem;
        }

        .industry-section {
            padding: 80px 0;
        }

        .industry-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .cta-section {
            padding: 80px 0;
        }

        .btn {
            padding: 0.875rem 1.5rem;
            min-height: 48px;
        }
    }

    /* Mobile Devices */
    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }

        .hero-content {
            padding: 60px 0 30px;
        }

        .hero-actions {
            flex-direction: column;
            align-items: center;
        }

        .hero-actions .btn {
            width: 100%;
            max-width: 280px;
        }

        .floating-cards {
            display: none;
        }

        .services-section {
            padding: 60px 0;
        }

        .section-header {
            margin-bottom: 2.5rem;
        }

        .service-card {
            padding: 1.25rem;
            border-radius: 16px;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .service-title {
            font-size: 1.25rem;
        }

        .service-price {
            font-size: 1.1rem;
        }

        .service-description {
            font-size: 0.9rem;
        }

        .benefit-item {
            font-size: 0.85rem;
        }

        .card-footer {
            gap: 0.5rem;
        }

        .card-footer .btn {
            width: 100%;
        }

        .compliance-section {
            padding: 60px 0;
        }

        .compliance-card {
            padding: 1.5rem;
        }

        .compliance-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .methodology-section {
            padding: 60px 0;
        }

        .methodology-step {
            padding: 1.25rem;
            margin-bottom: 2rem;
        }

        .step-number {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
        }

        .step-content h4 {
            font-size: 1.1rem;
        }

        .step-content p {
            font-size: 0.9rem;
        }

        .industry-section {
            padding: 60px 0;
        }

        .industry-card {
            padding: 1.5rem;
        }

        .industry-icon {
            width: 60px;
            height: 60px;
            font-size: 1.25rem;
        }

        .industry-card h4 {
            font-size: 1.1rem;
        }

        .industry-card p {
            font-size: 0.85rem;
        }

        .cta-section {
            padding: 60px 0;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .cta-buttons .btn {
            width: 100%;
            max-width: 280px;
        }
    }

    /* Very Small Mobile Devices */
    @media (max-width: 360px) {
        .services-grid {
            grid-template-columns: 1fr;
        }

        .service-card {
            padding: 1rem;
        }

        .compliance-grid {
            grid-template-columns: 1fr;
        }

        .compliance-card {
            padding: 1.25rem;
        }

        .industry-grid {
            grid-template-columns: 1fr;
        }

        .industry-card {
            padding: 1.25rem;
        }

        .btn {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }
    }

    /* Touch device optimizations */
    @media (hover: none) {
        .service-card:hover {
            transform: none;
        }
        
        .compliance-card:hover {
            transform: none;
        }
        
        .methodology-step:hover {
            transform: none;
        }
        
        .industry-card:hover {
            transform: none;
        }
        
        .btn:hover {
            transform: none;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
</script>