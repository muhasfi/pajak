@extends('layouts.master')

@section('title', 'Pendirian PT, NIB, dan NPWP Profesional')

@section('content')
<section class="company-registration-service">
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
                        <span class="title-line">Pendirian PT,</span>
                        <span class="title-line highlight">NIB & NPWP</span>
                    </h1>
                    <p class="hero-subtitle">
                        Layanan lengkap pendirian perusahaan dengan proses <span class="text-highlight">cepat</span>, 
                        <span class="text-highlight">terpercaya</span>, dan <span class="text-highlight">sesuai regulasi</span>
                    </p>
                    <p class="hero-description">
                        Tim konsultan hukum dan perpajakan kami siap membantu proses pendirian PT, 
                        pengurusan NIB, dan NPWP dengan pengalaman lebih dari 10 tahun.
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
                            <i class="fas fa-building"></i>
                            <span>Pendirian PT</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-file-contract"></i>
                            <span>NIB Online</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-receipt"></i>
                            <span>NPWP Badan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">1500+</span>
                    <span class="stat-label">PT Terbentuk</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98.5%</span>
                    <span class="stat-label">Kepuasan Klien</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">7-14</span>
                    <span class="stat-label">Hari Kerja</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Legal & Valid</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Paket Layanan Lengkap</h2>
                <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
            </div>

            <div class="services-grid">
                @forelse ($layanans as $layanan)
                    <div class="service-card {{ $loop->iteration == 2 ? 'featured' : '' }}">
                        {{-- Jika ingin menandai paket tertentu --}}
                        @if ($loop->iteration == 2)
                            <div class="card-badge">Populer</div>
                        @endif

                        <div class="card-header">
                            <div class="service-icon">
                                {{-- Ganti ikon berdasarkan nama paket, opsional --}}
                                @if (Str::contains(strtolower($layanan->detail->paket), 'dasar'))
                                    <i class="fas fa-file-alt"></i>
                                @elseif (Str::contains(strtolower($layanan->detail->paket), 'pro'))
                                    <i class="fas fa-briefcase"></i>
                                @elseif (Str::contains(strtolower($layanan->detail->paket), 'enter'))
                                    <i class="fas fa-crown"></i>
                                @else
                                    <i class="fas fa-cogs"></i>
                                @endif
                            </div>

                            <h3>{{ $layanan->detail->paket }}</h3>
                            <div class="package-price">
                                <span class="price">{{ 'Rp ' . number_format($layanan->harga, 0, ',', '.') }}</span>
                                {{-- <span class="note">*termasuk biaya notaris</span> --}}
                            </div>
                        </div>
                        <p class="text-muted text-center mb-4">
                            {{ $layanan->detail->deskripsi ?? 'Deskripsi tidak tersedia' }}
                        </p>

                        <div class="card-body">
                            @if (!empty($layanan->detail->benefit))
                                    <ul class="list-unstyled fs-5">
                                        @foreach ($layanan->detail->benefit as $benefit)
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
                                    onclick="addToCart({{ $layanan->id }}, 'ItemLayananPt')">
                                <span>Daftar Sekarang</span>
                            </button>
                            <a href="/kontak" class="btn btn-outline">
                                <span>Konsultasi</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        <p>Belum ada layanan yang tersedia.</p>
                    </div>
                @endforelse
            </div>


            
        </div>
    </div>

    <!-- Process Section -->
    <div class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Proses Pendirian Perusahaan</h2>
                <p class="section-subtitle">Tahapan terstruktur untuk pendirian PT yang cepat dan legal</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    {{-- <div class="step-number">01</div> --}}
                    <div class="step-content">
                        <h4>Konsultasi & Persiapan</h4>
                        <p>Analisis kebutuhan bisnis, penentuan struktur perusahaan, dan persiapan dokumen</p>
                        <span class="step-duration">1-2 Hari</span>
                    </div>
                </div>
                <div class="process-step">
                    {{-- <div class="step-number">02</div> --}}
                    <div class="step-content">
                        <h4>Pembuatan Akta Notaris</h4>
                        <p>Penyusunan akta pendirian PT oleh notaris berwenang dan pengesahan</p>
                        <span class="step-duration">2-3 Hari</span>
                    </div>
                </div>
                <div class="process-step">
                    {{-- <div class="step-number">03</div> --}}
                    <div class="step-content">
                        <h4>Pengurusan SK Menkumham</h4>
                        <p>Pengesahan badan hukum PT di Kementerian Hukum dan HAM</p>
                        <span class="step-duration">3-5 Hari</span>
                    </div>
                </div>
                <div class="process-step">
                    {{-- <div class="step-number">04</div> --}}
                    <div class="step-content">
                        <h4>Pendaftaran NIB & NPWP</h4>
                        <p>Perolehan Nomor Induk Berusaha dan NPWP Badan melalui sistem OSS</p>
                        <span class="step-duration">2-3 Hari</span>
                    </div>
                </div>
                <div class="process-step">
                    {{-- <div class="step-number">05</div> --}}
                    <div class="step-content">
                        <h4>Izin Usaha & Selesai</h4>
                        <p>Pengurusan izin usaha tambahan dan serah terima dokumen lengkap</p>
                        <span class="step-duration">1-2 Hari</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents Required -->
    <div class="documents-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Dokumen yang Diperlukan</h2>
                <p class="section-subtitle">Persiapkan dokumen-dokumen berikut untuk proses pendirian PT</p>
            </div>
            <div class="documents-grid">
                <div class="document-category">
                    <h4>Untuk Pendiri (Perseorangan)</h4>
                    <ul class="document-list">
                        <li>
                            <i class="fas fa-id-card"></i>
                            <span>KTP Asli (masa berlaku)</span>
                        </li>
                        <li>
                            <i class="fas fa-id-card"></i>
                            <span>NPWP Pribadi</span>
                        </li>
                        <li>
                            <i class="fas fa-home"></i>
                            <span>Kartu Keluarga</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>Surat keterangan domisili</span>
                        </li>
                        <li>
                            <i class="fas fa-camera"></i>
                            <span>Pas foto 3x4 (latar merah)</span>
                        </li>
                    </ul>
                </div>
                <div class="document-category">
                    <h4>Untuk Perusahaan</h4>
                    <ul class="document-list">
                        <li>
                            <i class="fas fa-signature"></i>
                            <span>Nama perusahaan (3 pilihan)</span>
                        </li>
                        <li>
                            <i class="fas fa-users"></i>
                            <span>Susunan direksi & komisaris</span>
                        </li>
                        <li>
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Modal dasar & disetor</span>
                        </li>
                        <li>
                            <i class="fas fa-briefcase"></i>
                            <span>Kegiatan usaha utama</span>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Alamat lengkap kantor</span>
                        </li>
                    </ul>
                </div>
                <div class="document-category">
                    <h4>Khusus Badan Hukum</h4>
                    <ul class="document-list">
                        <li>
                            <i class="fas fa-file-contract"></i>
                            <span>Akta pendirian badan hukum</span>
                        </li>
                        <li>
                            <i class="fas fa-stamp"></i>
                            <span>SK pengesahan Menkumham</span>
                        </li>
                        <li>
                            <i class="fas fa-receipt"></i>
                            <span>NPWP badan hukum</span>
                        </li>
                        <li>
                            <i class="fas fa-user-tie"></i>
                            <span>KTP pengurus badan hukum</span>
                        </li>
                        <li>
                            <i class="fas fa-file-signature"></i>
                            <span>Surat kuasa khusus</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Keuntungan Menggunakan Jasa Kami</h2>
                <p class="section-subtitle">Mengapa memilih layanan pendirian perusahaan dari kami</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Proses Cepat</h4>
                    <p>Pendirian PT selesai dalam 7-14 hari kerja dengan sistem terintegrasi</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Legal & Valid</h4>
                    <p>Dokumen 100% sah secara hukum dan terdaftar resmi di instansi terkait</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Konsultasi Gratis</h4>
                    <p>Konsultasi bisnis dan hukum tanpa biaya tambahan selama proses</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h4>Data Aman</h4>
                    <p>Kerahasiaan data terjamin dengan sistem keamanan berlapis</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h4>Update Real-time</h4>
                    <p>Monitoring progress proses pendirian melalui aplikasi khusus</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h4>Harga Transparan</h4>
                    <p>Tidak ada biaya tambahan tersembunyi, semua sudah termasuk paket</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pertanyaan Umum</h2>
                <p class="section-subtitle">Informasi lengkap seputar pendirian PT, NIB, dan NPWP</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Berapa lama proses pendirian PT?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Proses pendirian PT membutuhkan waktu 7-14 hari kerja, tergantung kompleksitas dan kelengkapan dokumen. Dengan sistem online dan tim profesional kami, proses dapat dipercepat.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apa perbedaan NIB dan NPWP?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>NIB (Nomor Induk Berusaha) adalah identitas pelaku usaha untuk perizinan, sedangkan NPWP (Nomor Pokok Wajib Pajak) adalah identitas perpajakan. Keduanya wajib dimiliki perusahaan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Berapa modal minimum untuk PT?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Modal dasar minimum Rp 50 juta dengan modal disetor minimum 25% (Rp 12,5 juta). Untuk PT perorangan, modal dapat lebih kecil sesuai ketentuan terbaru.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Apakah perlu kantor fisik?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, PT wajib memiliki alamat kantor fisik yang dapat diverifikasi. Kami dapat membantu pengurusan virtual office jika diperlukan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Memulai Bisnis dengan Legalitas Lengkap?</h3>
                <p>Konsultasikan rencana bisnis Anda dengan ahli kami dan dapatkan pendirian PT yang cepat, aman, dan sesuai regulasi</p>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary-orange: #ea580c;
        --secondary-orange: #c2410c;
        --dark-orange: #9a3412;
        --light-orange: #ffedd5;
        --white: #ffffff;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-800: #1e293b;
        --gray-600: #475569;
        --gray-400: #94a3b8;
        --success: #10b981;
        --error: #ef4444;
    }

    .company-registration-service {
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
        background: linear-gradient(135deg, #9a3412 0%, #ea580c 50%, #f97316 100%);
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
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
        background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
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
        border: 2px solid var(--primary-orange);
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--light-orange) 100%);
        transform: scale(1.05);
    }

    .service-card.featured:hover {
        transform: scale(1.05) translateY(-8px);
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
        color: var(--primary-orange);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-orange) 0%, #fef3c7 100%);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    }

    .service-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .package-price {
        margin-top: 1rem;
    }

    .price {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-orange);
        display: block;
    }

    .note {
        font-size: 0.8rem;
        color: var(--gray-600);
        font-style: italic;
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

    .feature-list li.excluded::before {
        content: '✗';
        color: var(--error);
    }

    .feature-list li.excluded {
        color: var(--gray-400);
        text-decoration: line-through;
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
        padding: 2rem 1rem;
        position: relative;

    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
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
        margin-bottom: 0.5rem;
    }

    .step-duration {
        font-size: 0.875rem;
        color: var(--primary-orange);
        font-weight: 600;
    }

    /* =========================
       DOCUMENTS SECTION
       ========================= */
    .documents-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .documents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .document-category {
        background: var(--white);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .document-category h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: var(--gray-800);
        text-align: center;
    }

    .document-list {
        list-style: none;
        padding: 0;
    }

    .document-list li {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem 0;
        color: var(--gray-600);
        border-bottom: 1px solid var(--gray-100);
    }

    .document-list li:last-child {
        border-bottom: none;
    }

    .document-list i {
        width: 20px;
        color: var(--primary-orange);
    }

    /* =========================
       BENEFITS SECTION
       ========================= */
    .benefits-section {
        padding: 100px 0;
        background: var(--white);
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .benefit-card {
        text-align: center;
        padding: 2rem 1.5rem;
        background: var(--gray-50);
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .benefit-card:hover {
        transform: translateY(-5px);
        background: var(--light-orange);
    }

    .benefit-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
        color: var(--white);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }

    .benefit-card h4 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--gray-800);
    }

    .benefit-card p {
        line-height: 1.5;
        color: var(--gray-600);
        font-size: 0.9rem;
    }

    /* =========================
       FAQ SECTION
       ========================= */
    .faq-section {
        padding: 100px 0;
        background: var(--gray-50);
    }

    .faq-grid {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        background: var(--white);
        border-radius: 12px;
        margin-bottom: 1rem;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .faq-question {
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .faq-question:hover {
        background: var(--gray-50);
    }

    .faq-question h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin: 0;
    }

    .faq-question i {
        color: var(--primary-orange);
        transition: transform 0.3s ease;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 0 1.5rem;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item.active .faq-answer {
        padding: 0 1.5rem 1.5rem;
        max-height: 200px;
    }

    .faq-answer p {
        line-height: 1.6;
        color: var(--gray-600);
        margin: 0;
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
        background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(234, 88, 12, 0.3);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 2px solid var(--gray-400);
    }

    .btn-outline:hover {
        color: var(--primary-orange);
        border-color: var(--primary-orange);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 2px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-orange);
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
        background: linear-gradient(135deg, var(--dark-orange) 0%, var(--primary-orange) 100%);
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

        .service-card.featured {
            transform: none;
        }

        .service-card.featured:hover {
            transform: translateY(-8px);
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

        .documents-grid {
            grid-template-columns: 1fr;
        }

        .benefits-grid {
            grid-template-columns: repeat(2, 1fr);
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

        .benefits-grid {
            grid-template-columns: 1fr;
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

    /* FAQ JavaScript functionality */
    .faq-item.active .faq-answer {
        max-height: 500px;
    }
</style>

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
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ functionality
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                // Close all other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Toggle current item
                item.classList.toggle('active');
            });
        });
    });
</script>
@endsection