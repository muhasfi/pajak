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
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        Belum ada layanan pajak yang tersedia.
                    </div>
                @endforelse
            </div>
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

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Optimalkan Kepatuhan Pajak Bisnis Anda?</h3>
                <p>Konsultasikan kebutuhan perpajakan Anda dengan ahli kami dan dapatkan solusi terbaik untuk efisiensi dan compliance</p>
                <div class="cta-buttons">
                    <a href="/kontak" class="btn btn-light">Konsultasi Sekarang</a>
                    <a href="tel:+628123456789" class="btn btn-outline-light">Hubungi Kami</a>
                </div>
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
        font-size: clamp(2.5rem, 5vw, 3.5rem);
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
        font-size: clamp(1.1rem, 2vw, 1.3rem);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .text-highlight {
        font-weight: 600;
        color: #fbbf24;
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

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
    }

    .service-card {
        position: relative;
        overflow: hidden;
        padding: clamp(1.5rem, 3vw, 2.5rem);
        border-radius: 20px;
        border: 1px solid var(--gray-100);
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        width: 100%;
        margin: 0 auto;
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
        font-size: clamp(1.25rem, 2vw, 1.5rem);
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
        justify-content: center;
    }

    /* =========================
       TAX TYPES SECTION
       ========================= */
    .tax-types-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--white);
    }

    .tax-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
    }

    .tax-type-card {
        background: var(--gray-50);
        border-radius: 16px;
        padding: clamp(2rem, 3vw, 2.5rem) clamp(1.5rem, 2vw, 2rem);
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
        font-size: clamp(1.1rem, 1.5vw, 1.25rem);
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
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--gray-50);
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 220px), 1fr));
        gap: clamp(1.5rem, 3vw, 2rem);
        max-width: 1000px;
        margin: 0 auto;
    }

    .process-step {
        text-align: center;
        padding: clamp(1.5rem, 2vw, 2rem) 1rem;
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
        font-size: clamp(1.1rem, 1.5vw, 1.25rem);
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .step-content p {
        line-height: 1.6;
        color: var(--gray-600);
    }

    /* =========================
       CTA SECTION
       ========================= */
    .cta-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 100%);
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
            font-size: clamp(2rem, 4vw, 2.5rem);
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.1rem);
        }

        .section-title {
            font-size: clamp(1.8rem, 3vw, 2.2rem);
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .service-card {
            padding: clamp(1.5rem, 3vw, 2rem);
        }

        .tax-types-grid {
            grid-template-columns: 1fr;
        }

        .process-steps {
            grid-template-columns: 1fr;
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
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
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
            padding: 1.5rem;
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
            max-width: 300px;
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
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Improve touch targets on mobile */
    @media (max-width: 768px) {
        .service-card .btn,
        .tax-type-card,
        .process-step {
            min-height: 44px;
        }
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