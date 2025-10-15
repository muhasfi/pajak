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
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">200+</span>
                    <span class="stat-label">Dokumen Tersusun</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Compliance Rate</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Tahun Pengalaman</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Klien Multinasional</span>
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
                <!-- Service 1 -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="service-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3>Master File</h3>
                    </div>
                    <div class="card-body">
                        <p>Dokumentasi global yang menggambarkan keseluruhan grup usaha secara komprehensif.</p>
                        <ul class="feature-list">
                            <li>Struktur organisasi grup</li>
                            <li>Deskripsi bisnis global</li>
                            <li>Strategi transfer pricing</li>
                            <li>Analisis kontribusi nilai</li>
                            <li>Kebijakan intellectual property</li>
                            <li>Laporan keuangan konsolidasi</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <span>Detail Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="/kontak" class="btn btn-outline">
                            <span>Konsultasi</span>
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="service-card featured">
                    <div class="card-badge">Wajib</div>
                    <div class="card-header">
                        <div class="service-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3>Local File</h3>
                    </div>
                    <div class="card-body">
                        <p>Dokumentasi spesifik untuk setiap yurisdiksi dengan analisis transaksi terkait pihak berelasi.</p>
                        <ul class="feature-list">
                            <li>Analisis komparabilitas</li>
                            <li>Pemilihan metode transfer pricing</li>
                            <li>Penetapan rentang kewajaran</li>
                            <li>Dokumentasi transaksi spesifik</li>
                            <li>Analisis ekonomi dan finansial</li>
                            <li>Kesesuaian dengan regulasi lokal</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <span>Detail Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="/kontak" class="btn btn-outline">
                            <span>Konsultasi</span>
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="service-card">
                    <div class="card-header">
                        <div class="service-icon">
                            <i class="fas fa-globe-americas"></i>
                        </div>
                        <h3>Country-by-Country Report</h3>
                    </div>
                    <div class="card-body">
                        <p>Pelaporan informasi agregat mengenai alokasi pendapatan, laba, dan pajak per yurisdiksi.</p>
                        <ul class="feature-list">
                            <li>Pendapatan per yurisdiksi</li>
                            <li>Laba sebelum pajak</li>
                            <li>Pajak dibayar dan diperhitungkan</li>
                            <li>Jumlah karyawan</li>
                            <li>Modal dan retained earnings</li>
                            <li>Identitas entitas konstituen</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <span>Detail Layanan</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="/kontak" class="btn btn-outline">
                            <span>Konsultasi</span>
                        </a>
                    </div>
                </div>
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

    <!-- Case Studies -->
    <div class="case-studies-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Studi Kasus Berhasil</h2>
                <p class="section-subtitle">Bukti keberhasilan dalam menangani kompleksitas transfer pricing</p>
            </div>
            <div class="case-studies-grid">
                <div class="case-study-card">
                    <div class="case-header">
                        <h4>Perusahaan Teknologi Multinasional</h4>
                        <span class="case-year">2023</span>
                    </div>
                    <div class="case-body">
                        <p class="case-description">Penyusunan dokumentasi untuk R&D cost sharing arrangement senilai USD 50 juta dengan struktur IP holding yang kompleks.</p>
                        <div class="case-details">
                            <div class="case-detail">
                                <span class="label">Nilai Transaksi</span>
                                <span class="value">USD 50 Juta</span>
                            </div>
                            <div class="case-detail">
                                <span class="label">Yurisdiksi</span>
                                <span class="value">5 Negara</span>
                            </div>
                            <div class="case-detail">
                                <span class="label">Durasi</span>
                                <span class="value">3 Bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-card">
                    <div class="case-header">
                        <h4>Grup Manufaktur Otomotif</h4>
                        <span class="case-year">2023</span>
                    </div>
                    <div class="case-body">
                        <p class="case-description">Restrukturisasi transfer pricing policy untuk supply chain manufacturing dengan penghematan pajak 15%.</p>
                        <div class="case-details">
                            <div class="case-detail">
                                <span class="label">Nilai Transaksi</span>
                                <span class="value">Rp 200 Miliar</span>
                            </div>
                            <div class="case-detail">
                                <span class="label">Yurisdiksi</span>
                                <span class="value">ASEAN</span>
                            </div>
                            <div class="case-detail">
                                <span class="label">Durasi</span>
                                <span class="value">4 Bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-card">
                    <div class="case-header">
                        <h4>Perusahaan Farmasi Global</h4>
                        <span class="case-year">2024</span>
                    </div>
                    <div class="case-body">
                        <p class="case-description">Pertahanan succesful dalam tax audit untuk licensing agreement dengan nilai royalty USD 25 juta per tahun.</p>
                        <div class="case-details">
                            <div class="case-detail">
                                <span class="label">Nilai Transaksi</span>
                                <span class="value">USD 25 Juta/tahun</span>
                            </div>
                            <div class="case-detail">
                                <span class="label">Yurisdiksi</span>
                                <span class="value">Global</span>
                            </div>
                            <div class="case-detail">
                                <span class="label">Durasi</span>
                                <span class="value">6 Bulan</span>
                            </div>
                        </div>
                    </div>
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
        font-size: 3.5rem;
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
        font-size: 1.3rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fde68a;
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
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
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

    .service-card.featured {
        border: 2px solid var(--primary-teal);
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--light-teal) 100%);
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
        background: transparent;
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
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
       CASE STUDIES SECTION
       ========================= */
    .case-studies-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .case-studies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
    }

    .case-study-card {
        background: var(--white);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .case-study-card:hover {
        transform: translateY(-5px);
    }

    .case-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .case-header h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
        margin: 0;
        flex: 1;
        margin-right: 1rem;
    }

    .case-year {
        background: var(--light-teal);
        color: var(--primary-teal);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .case-description {
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

        .methodology-step {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
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

        .compliance-grid {
            grid-template-columns: 1fr;
        }

        .industry-grid {
            grid-template-columns: 1fr;
        }

        .case-studies-grid {
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