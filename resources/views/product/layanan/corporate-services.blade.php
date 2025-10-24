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
<<<<<<< HEAD
 :root {
=======
:root {
>>>>>>> d02faebeab8747a5de3202ff73c4b998d7308c51
    --primary-orange: #ea580c;
    --secondary-orange: #c2410c;
    --dark-orange: #9a3412;
    --light-orange: #ffedd5;
    --white: #ffffff;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --gray-900: #0f172a;
    --success: #10b981;
    --error: #ef4444;
}

/* =========================
   BASE STYLES & RESET
   ========================= */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.company-registration-service {
    min-height: 100vh;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    line-height: 1.6;
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 clamp(1rem, 3vw, 2rem);
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
    width: clamp(75px, 15vw, 150px);
    height: clamp(75px, 15vw, 150px);
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

.shape-4 {
    width: clamp(50px, 10vw, 100px);
    height: clamp(50px, 10vw, 100px);
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
    padding: clamp(4rem, 10vw, 8rem) 0 clamp(3rem, 8vw, 5rem);
    width: 100%;
}

.hero-text {
    max-width: min(600px, 100%);
}

.hero-title {
    font-size: clamp(2.25rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
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
    margin-bottom: clamp(1rem, 2vw, 1.5rem);
    opacity: 0.9;
}

.text-highlight {
    font-weight: 600;
    color: #fde68a;
}

.hero-description {
    font-size: clamp(1rem, 1.5vw, 1.1rem);
    line-height: 1.7;
    margin-bottom: clamp(2rem, 4vw, 2.5rem);
    opacity: 0.8;
}

.hero-actions {
    display: flex;
    gap: clamp(0.75rem, 2vw, 1rem);
    flex-wrap: wrap;
}

.hero-visual {
    display: flex;
    justify-content: center;
    align-items: center;
}

.floating-cards {
    position: relative;
    width: clamp(250px, 30vw, 300px);
    height: clamp(250px, 30vw, 300px);
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
    text-align: center;
    line-height: 1.3;
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
    gap: clamp(1rem, 3vw, 2rem);
    padding: clamp(2rem, 5vw, 3rem) 0;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-item {
    text-align: center;
    background: transparent;
}

.stat-number {
    display: block;
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: 0.5rem;
    color: var(--white);
}

.stat-label {
    font-size: clamp(0.75rem, 1.5vw, 0.9rem);
    font-weight: 500;
    opacity: 0.8;
    color: var(--white);
}

/* =========================
   SERVICES SECTION
   ========================= */
.services-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.section-header {
    text-align: center;
    margin-bottom: clamp(2.5rem, 5vw, 4rem);
}

.section-title {
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.section-subtitle {
    font-size: clamp(1rem, 2vw, 1.2rem);
    max-width: min(600px, 90%);
    margin: 0 auto;
    color: var(--gray-600);
    line-height: 1.6;
}

.services-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: clamp(1rem, 2vw, 2rem) clamp(0.5rem, 1.5vw, 1rem);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(350px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
    justify-content: center;
}

.service-card {
    position: relative;
    overflow: hidden;
    padding: clamp(2rem, 4vw, 2.5rem);
    border-radius: 20px;
    border: 1px solid var(--gray-200);
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
}

.service-card.featured:hover {
    transform: translateY(-8px);
}

.card-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: clamp(0.4rem, 1vw, 0.5rem) clamp(0.8rem, 1.5vw, 1rem);
    font-size: clamp(0.7rem, 1.2vw, 0.75rem);
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
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    margin: 0 auto 1.5rem;
    font-size: clamp(1.75rem, 3vw, 2rem);
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
    font-size: clamp(1.3rem, 2.5vw, 1.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-800);
    line-height: 1.3;
}

.package-price {
    margin-top: 1rem;
}

.price {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 800;
    color: var(--primary-orange);
    display: block;
}

.note {
    font-size: clamp(0.75rem, 1.2vw, 0.8rem);
    color: var(--gray-600);
    font-style: italic;
}

.card-body p {
    margin-bottom: 1.5rem;
    line-height: 1.6;
    color: var(--gray-600);
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.feature-list {
    margin: 1.5rem 0;
    padding: 0;
    list-style: none;
}

.feature-list li {
    position: relative;
    padding: clamp(0.4rem, 1vw, 0.5rem) 0 clamp(0.4rem, 1vw, 0.5rem) 1.5rem;
    color: var(--gray-600);
    border-bottom: 1px solid var(--gray-100);
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    line-height: 1.4;
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

.btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: clamp(0.75rem, 1.5vw, 0.875rem) clamp(1.25rem, 2vw, 1.5rem);
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    border: 2px solid transparent;
    cursor: pointer;
    text-align: center;
    min-height: 44px;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
    border: none;
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(249, 115, 22, 0.4);
    color: white;
}

.btn-outline {
    border: 2px solid var(--primary-orange);
    color: var(--primary-orange);
    background: transparent;
}

.btn-outline:hover {
    background: var(--primary-orange);
    color: white;
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

.page-title {
    text-align: center;
    margin-bottom: 3rem;
    color: var(--gray-800);
}

.page-title h1 {
    font-weight: 800;
    margin-bottom: 1rem;
    font-size: clamp(2rem, 4vw, 2.8rem);
}

.page-title p {
    font-size: clamp(1rem, 2vw, 1.2rem);
    color: var(--gray-600);
    max-width: min(600px, 90%);
    margin: 0 auto;
    line-height: 1.6;
}

/* =========================
   PROCESS SECTION
   ========================= */
.process-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.process-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(250px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
    max-width: 1000px;
    margin: 0 auto;
}

.process-step {
    text-align: center;
    padding: clamp(1.5rem, 3vw, 2rem) clamp(1rem, 2vw, 1rem);
    position: relative;
}

.step-number {
    width: clamp(50px, 6vw, 60px);
    height: clamp(50px, 6vw, 60px);
    background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.25rem, 2.5vw, 1.5rem);
    font-weight: 700;
    margin: 0 auto 1.5rem;
}

.step-content h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.step-content p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 0.5rem;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.step-duration {
    font-size: clamp(0.8rem, 1.5vw, 0.875rem);
    color: var(--primary-orange);
    font-weight: 600;
}

/* =========================
   DOCUMENTS SECTION
   ========================= */
.documents-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.documents-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.document-category {
    background: var(--white);
    border-radius: 16px;
    padding: clamp(1.5rem, 3vw, 2rem);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--gray-200);
}

.document-category h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
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
    border-bottom: 1px solid var(--gray-200);
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
}

.document-list li:last-child {
    border-bottom: none;
}

.document-list i {
    width: 20px;
    color: var(--primary-orange);
    flex-shrink: 0;
}

/* =========================
   BENEFITS SECTION
   ========================= */
.benefits-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(250px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.benefit-card {
    text-align: center;
    padding: clamp(1.5rem, 3vw, 2rem) clamp(1.25rem, 2vw, 1.5rem);
    background: var(--gray-50);
    border-radius: 16px;
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
}

.benefit-card:hover {
    transform: translateY(-5px);
    background: var(--light-orange);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.benefit-icon {
    width: clamp(60px, 7vw, 70px);
    height: clamp(60px, 7vw, 70px);
    background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
    color: var(--white);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.25rem, 2.5vw, 1.5rem);
    margin: 0 auto 1rem;
}

.benefit-card h4 {
    font-size: clamp(1rem, 2vw, 1.1rem);
    font-weight: 600;
    margin-bottom: 0.75rem;
    color: var(--gray-800);
}

.benefit-card p {
    line-height: 1.5;
    color: var(--gray-600);
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
}

/* =========================
   FAQ SECTION
   ========================= */
.faq-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.faq-grid {
    max-width: min(800px, 100%);
    margin: 0 auto;
}

.faq-item {
    background: var(--white);
    border-radius: 12px;
    margin-bottom: 1rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.faq-item:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
}

.faq-question {
    padding: clamp(1.25rem, 3vw, 1.5rem);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    cursor: pointer;
    transition: background-color 0.3s ease;
    gap: 1rem;
}

.faq-question:hover {
    background: var(--gray-50);
}

.faq-question h4 {
    font-size: clamp(1rem, 2vw, 1.1rem);
    font-weight: 600;
    color: var(--gray-800);
    margin: 0;
    flex: 1;
    line-height: 1.4;
}

.faq-question i {
    color: var(--primary-orange);
    transition: transform 0.3s ease;
    flex-shrink: 0;
    margin-top: 0.25rem;
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 clamp(1.25rem, 3vw, 1.5rem);
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
    padding: 0 clamp(1.25rem, 3vw, 1.5rem) clamp(1.25rem, 3vw, 1.5rem);
    max-height: 500px;
}

.faq-answer p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

/* =========================
   BUTTONS
   ========================= */
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
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: linear-gradient(135deg, var(--dark-orange) 0%, var(--primary-orange) 100%);
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
    margin: 0 auto clamp(2rem, 4vw, 2.5rem);
    max-width: min(600px, 90%);
    opacity: 0.9;
    line-height: 1.6;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: clamp(0.75rem, 2vw, 1rem);
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
   RESPONSIVE BREAKPOINTS
   ========================= */

/* Tablet Landscape (1024px - 1199px) */
@media (max-width: 1199px) {
    .hero-content {
        gap: 3rem;
    }
}

/* Tablet Portrait (768px - 1023px) */
@media (max-width: 1023px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
        padding: 6rem 0 4rem;
    }

    .hero-text {
        margin: 0 auto;
    }

    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .floating-cards {
        width: 200px;
        height: 200px;
    }
}

/* Mobile Landscape (576px - 767px) */
@media (max-width: 767px) {
    .modern-hero {
        min-height: 90vh;
    }

    .hero-content {
        padding: 5rem 0 3rem;
    }

    .hero-actions {
        justify-content: center;
    }

    .hero-stats {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .services-grid {
        grid-template-columns: 1fr;
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

    .card-footer {
        flex-direction: column;
    }

    .btn {
        width: 100%;
    }
}

/* Mobile Portrait (480px - 575px) */
@media (max-width: 575px) {
    .container {
        padding: 0 1rem;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
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

    .document-list li {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
        text-align: left;
    }

    .document-list i {
        align-self: flex-start;
    }
}

/* Small Mobile (320px - 479px) */
@media (max-width: 479px) {
    .container {
        padding: 0 0.75rem;
    }

    .hero-title {
        font-size: 1.75rem;
    }

    .hero-actions {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 100%;
    }

    .section-title {
        font-size: 1.6rem;
    }

    .service-card {
        padding: 1.25rem;
    }

    .benefit-card {
        padding: 1.25rem 1rem;
    }

    .process-step {
        padding: 1.25rem 0.75rem;
    }

    .document-category {
        padding: 1.25rem;
    }

    .card-badge {
        font-size: 0.6rem;
        padding: 0.3rem 0.6rem;
    }

    .feature-list li {
        padding-left: 1.25rem;
    }
}

/* Touch Device Optimizations */
@media (hover: none) and (pointer: coarse) {
    .service-card:hover,
    .benefit-card:hover,
    .btn:hover {
        transform: none;
    }

    .service-card:hover::before {
        transform: scaleX(0);
    }

    .service-card:hover .service-icon {
        transform: none;
        color: var(--primary-orange);
        background: linear-gradient(135deg, var(--light-orange) 0%, #fef3c7 100%);
    }

    .faq-question:hover {
        background: var(--white);
    }
}

/* High DPI Screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .service-icon,
    .benefit-icon,
    .step-number {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Print Styles */
@media print {
    .modern-hero,
    .cta-section,
    .hero-actions,
    .card-footer {
        display: none;
    }

    .services-section,
    .process-section,
    .documents-section,
    .benefits-section,
    .faq-section {
        padding: 2rem 0;
    }

    .section-title {
        color: #000 !important;
    }

    .service-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ccc;
    }
}

/* =========================
   ACCESSIBILITY
   ========================= */
@media (prefers-contrast: high) {
    :root {
        --primary-orange: #ff4500;
        --secondary-orange: #cd3700;
    }
}

/* Focus styles */
button:focus,
a:focus,
.faq-question:focus,
.btn:focus {
    outline: 2px solid var(--primary-orange);
    outline-offset: 2px;
}

/* Skip link for accessibility */
.skip-link {
    position: absolute;
    top: -40px;
    left: 6px;
    background: var(--primary-orange);
    color: white;
    padding: 8px;
    text-decoration: none;
    border-radius: 4px;
    z-index: 10000;
}

.skip-link:focus {
    top: 6px;
}

/* =========================
   SMOOTH SCROLLING & PERFORMANCE
   ========================= */
html {
    scroll-behavior: smooth;
}

/* Improve rendering performance */
.service-card,
.benefit-card,
.document-category,
.floating-card {
    transform: translateZ(0);
    backface-visibility: hidden;
}

/* Loading states */
.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
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