@extends('layouts.master')

@section('title', 'Jasa Perpajakan Profesional')

@section('content')
<section class="tax-service">
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
                        <span class="title-line">Konsultan</span>
                        <span class="title-line highlight">Perpajakan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi lengkap perpajakan untuk bisnis Anda dengan pendekatan <span class="text-highlight">strategis</span>, 
                        <span class="text-highlight">komprehensif</span>, dan <span class="text-highlight">sesuai regulasi</span>
                    </p>
                    <p class="hero-description">
                        Tim konsultan pajak berpengalaman kami siap membantu optimasi kewajiban perpajakan, 
                        penyusunan laporan, dan compliance management untuk kemudahan bisnis Anda.
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
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>SPT & Laporan</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-chart-line"></i>
                            <span>Perencanaan Pajak</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-balance-scale"></i>
                            <span>Kepatuhan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Klien Terlayani</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Kepuasan Klien</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Tahun Pengalaman</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Ahli Pajak</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Layanan Perpajakan Kami</h2>
                <p class="section-subtitle">Solusi lengkap untuk semua kebutuhan perpajakan bisnis Anda</p>
            </div>

            <div class="services-grid">
                @forelse ($pajaks as $pajak)
                    <div class="service-card {{ $loop->iteration == 1 ? 'featured' : '' }}">

                        <div class="card-header pajak">
                            <div class="service-icon">
                                {{-- Ganti ikon berdasarkan nama/judul pajak (opsional) --}}
                                @php
                                    $judul = strtolower($pajak->judul);
                                @endphp

                                @if (Str::contains($judul, ['rencana', 'plan']))
                                    <i class="fas fa-calculator"></i>
                                @elseif (Str::contains($judul, ['bphtb', 'pbb']))
                                    <i class="fas fa-hand-holding-usd"></i>
                                @elseif (Str::contains($judul, ['konsul', 'consult']))
                                    <i class="fas fa-user-tie"></i>
                                @else
                                    <i class="fas fa-file-invoice-dollar"></i>
                                @endif
                            </div>
                            <h3>{{ $pajak->judul }}</h3>
                            <h3 class="text-primary fw-bold">
                                Rp {{ number_format($pajak->harga, 0, ',', '.') }}
                            </h3>

                        </div>
                        <p class="text-muted text-center mb-4">
                            {{ $pajak->detail->deskripsi ?? 'Deskripsi tidak tersedia' }}
                        </p>

                        <div class="card-body">
                            @if (!empty($pajak->detail->benefit))
                                    <ul class="list-unstyled mt-2">
                                        @foreach ($pajak->detail->benefit as $benefit)
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
                            <button type="button" 
                                class="btn btn-primary"
                                onclick="addToCart({{ $pajak->id }}, 'ItemPajak')">
                                <span>Mulai pajak</span>
                            </button>
                            <a href="/kontak" class="btn btn-outline">
                                <span>Konsultasi</span>
                            </a>
                        </div>
<<<<<<< HEAD
                    @endforelse
                </div>
=======
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        Belum ada layanan pajak yang tersedia.
                    </div>
                @endforelse
            </div>

>>>>>>> d02faebeab8747a5de3202ff73c4b998d7308c51
        </div>
    </div>

    <!-- Tax Types Section -->
    <div class="tax-types-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Jenis Pajak yang Kami Tangani</h2>
                <p class="section-subtitle">Komprehensif coverage untuk semua jenis kewajiban perpajakan</p>
            </div>
            <div class="tax-types-grid">
                <div class="tax-type-card">
                    <div class="tax-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>PPh Badan</h4>
                    <p>Pajak Penghasilan untuk perusahaan dan badan usaha dengan berbagai skema</p>
                    <ul>
                        <li>PPh 21 Karyawan</li>
                        <li>PPh 23 Jasa</li>
                        <li>PPh 25 Angsuran</li>
                        <li>PPh 29 Kurang Bayar</li>
                    </ul>
                </div>
                <div class="tax-type-card">
                    <div class="tax-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h4>PPh Orang Pribadi</h4>
                    <p>Pajak Penghasilan untuk individu, profesional, dan pekerja bebas</p>
                    <ul>
                        <li>PPh 21 Karyawan</li>
                        <li>PPh Final PP 23</li>
                        <li>PPh 25 OP</li>
                        <li>PPh 29 Tahunan</li>
                    </ul>
                </div>
                <div class="tax-type-card">
                    <div class="tax-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <h4>PPN & PPnBM</h4>
                    <p>Pajak Pertambahan Nilai dan Pajak Penjualan Barang Mewah</p>
                    <ul>
                        <li>PPN Masukan/Keluaran</li>
                        <li>PPnBM Barang Mewah</li>
                        <li>Restitusi PPN</li>
                        <li>Pengusaha Kena Pajak</li>
                    </ul>
                </div>
                <div class="tax-type-card">
                    <div class="tax-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h4>Pajak Daerah</h4>
                    <p>Pajak dan retribusi daerah untuk properti dan transaksi lokal</p>
                    <ul>
                        <li>PBB Perkotaan/Pedesaan</li>
                        <li>BPHTB</li>
                        <li>Pajak Kendaraan</li>
                        <li>Retribusi Daerah</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Proses Layanan Kami</h2>
                <p class="section-subtitle">Tahapan terstruktur untuk pelayanan perpajakan yang optimal</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-content">
                        <h4>Konsultasi Awal</h4>
                        <p>Identifikasi kebutuhan dan analisis kondisi perpajakan saat ini</p>
                    </div>
                </div>
                <div class="process-step">

                    <div class="step-content">
                        <h4>Data Collection</h4>
                        <p>Pengumpulan dokumen dan data pendukung yang diperlukan</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-content">
                        <h4>Processing & Analysis</h4>
                        <p>Pengolahan data, perhitungan, dan analisis perpajakan</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-content">
                        <h4>Reporting & Filing</h4>
                        <p>Penyusunan laporan dan pelaporan melalui sistem elektronik</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-content">
                        <h4>Follow Up</h4>
                        <p>Monitoring dan evaluasi berkelanjutan untuk compliance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="pricing-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Paket Layanan</h2>
                <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket Dasar</h3>
                        <div class="price">
                            <span class="amount">Rp 750K</span>
                            <span class="period">/bulan</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> SPT Masa PPh 21</li>
                            <li><i class="fas fa-check"></i> SPT Masa PPh 23</li>
                            <li><i class="fas fa-check"></i> SPT Masa PPN</li>
                            <li><i class="fas fa-times"></i> SPT Tahunan</li>
                            <li><i class="fas fa-times"></i> Konsultasi Pajak</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-outline">Pilih Paket</a>
                    </div>
                </div>

                <div class="pricing-card featured">
                    <div class="pricing-badge">Rekomendasi</div>
                    <div class="pricing-header">
                        <h3>Paket Professional</h3>
                        <div class="price">
                            <span class="amount">Rp 1.5JT</span>
                            <span class="period">/bulan</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Semua SPT Masa</li>
                            <li><i class="fas fa-check"></i> SPT Tahunan Badan</li>
                            <li><i class="fas fa-check"></i> Konsultasi 4x/bulan</li>
                            <li><i class="fas fa-check"></i> Tax Planning Dasar</li>
                            <li><i class="fas fa-times"></i> Audit Support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-primary">Pilih Paket</a>
                    </div>
                </div>

                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket Enterprise</h3>
                        <div class="price">
                            <span class="amount">Rp 3JT</span>
                            <span class="period">/bulan</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Semua Layanan Pajak</li>
                            <li><i class="fas fa-check"></i> Konsultasi Unlimited</li>
                            <li><i class="fas fa-check"></i> Tax Planning Komprehensif</li>
                            <li><i class="fas fa-check"></i> Audit & Litigation Support</li>
                            <li><i class="fas fa-check"></i> Dedicated Consultant</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-outline">Pilih Paket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Optimalkan Kepatuhan Pajak Bisnis Anda?</h3>
                <p>Konsultasikan kebutuhan perpajakan Anda dengan ahli kami dan dapatkan solusi terbaik untuk efisiensi dan compliance</p>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary-green: #059669;
        --secondary-green: #047857;
        --dark-green: #065f46;
        --light-green: #d1fae5;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-800: #1e293b;
        --gray-600: #475569;
        --gray-400: #94a3b8;
        --success: #10b981;
        --warning: #f59e0b;
    }

    .tax-service {
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
        background: linear-gradient(135deg, #065f46 0%, #059669 50%, #10b981 100%);
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
        color: white;
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
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
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

    .card-header.pajak {
        text-align: center;
        margin-bottom: 1.5rem;
        background-color: transparent;
    }

    .service-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--primary-green);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-green) 0%, #ecfdf5 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
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
       TAX TYPES SECTION
       ========================= */
    .tax-types-section {
        padding: 100px 0;
        background: var(--white);
    }

    .tax-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }

    .tax-type-card {
        background: var(--gray-50);
        border-radius: 16px;
        padding: 2.5rem 2rem;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .tax-type-card:hover {
        transform: translateY(-5px);
    }

    .tax-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        color: var(--white);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
    }

    .tax-type-card h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .tax-type-card p {
        line-height: 1.6;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
    }

    .tax-type-card ul {
        list-style: none;
        padding: 0;
        text-align: left;
    }

    .tax-type-card li {
        padding: 0.5rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
    }

    .tax-type-card li:last-child {
        border-bottom: none;
    }

    .tax-type-card li::before {
        content: '•';
        color: var(--primary-green);
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }

    /* =========================
       PROCESS SECTION
       ========================= */
    .process-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .process-step {
        text-align: center;
        padding: 2rem 1rem;
        position: relative;
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
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
       PRICING SECTION
       ========================= */
    .pricing-section {
        padding: 100px 0;
        background: var(--white);
    }

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .pricing-card {
        background: var(--white);
        border: 2px solid var(--gray-100);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .pricing-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .pricing-card.featured {
        border-color: var(--primary-green);
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--light-green) 100%);
        transform: scale(1.05);
    }

    .pricing-card.featured:hover {
        transform: scale(1.05) translateY(-5px);
    }

    .pricing-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-green);
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .pricing-header {
        margin-bottom: 2rem;
    }

    .pricing-header h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .price {
        display: flex;
        align-items: baseline;
        justify-content: center;
        gap: 0.5rem;
    }

    .amount {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-green);
    }

    .period {
        font-size: 1rem;
        color: var(--gray-600);
    }

    .pricing-features {
        margin-bottom: 2rem;
    }

    .pricing-features ul {
        list-style: none;
        padding: 0;
    }

    .pricing-features li {
        padding: 0.75rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .pricing-features li:last-child {
        border-bottom: none;
    }

    .pricing-features .fa-check {
        color: var(--success);
    }

    .pricing-features .fa-times {
        color: #ef4444;
    }

    .pricing-footer {
        margin-top: auto;
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
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-green);
        border-color: var(--primary-green);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-green);
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
        background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 100%);
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

        .pricing-card.featured {
            transform: none;
        }

        .pricing-card.featured:hover {
            transform: translateY(-5px);
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

        .tax-types-grid {
            grid-template-columns: 1fr;
        }

        .process-steps {
            grid-template-columns: 1fr;
        }

        .pricing-grid {
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

        .pricing-card {
            padding: 2rem 1.5rem;
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