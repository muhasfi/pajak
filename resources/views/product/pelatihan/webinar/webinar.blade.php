@extends('layouts.master')

@section('title', 'Webinar Perpajakan')

@section('content')
<section class="webinars-page">
    <!-- Hero Section -->
    <div class="webinar-hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="title-line">Webinar</span>
                        <span class="title-line highlight">Perpajakan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Tingkatkan kompetensi perpajakan Anda melalui <span class="text-highlight">webinar online</span> 
                        dengan pembicara ahli di bidangnya
                    </p>
                    <p class="hero-description">
                        Ikuti webinar interaktif seputar regulasi perpajakan terbaru, strategi perencanaan, 
                        dan best practices langsung dari praktisi berpengalaman.
                    </p>
                    <div class="hero-actions">
                        <a href="#webinar-list" class="btn btn-primary">
                            <span>Lihat Webinar</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="#categories" class="btn btn-outline-light">
                            <span>Kategori</span>
                            <i class="fas fa-tags"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">80+</span>
                            <span class="stat-label">Webinar Tersedia</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">25+</span>
                            <span class="stat-label">Pembicara Expert</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Kepuasan Peserta</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Online</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div id="categories" class="categories-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kategori Webinar</h2>
                <p class="section-subtitle">Pilih webinar sesuai dengan kebutuhan dan minat Anda</p>
            </div>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h3>Update Regulasi</h3>
                    <p>Webinar update terbaru peraturan perpajakan dan implementasinya</p>
                    <span class="seminar-count">15 Webinar</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3>Tax Planning</h3>
                    <p>Strategi perencanaan pajak untuk optimalisasi bisnis</p>
                    <span class="seminar-count">12 Webinar</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3>Compliance</h3>
                    <p>Teknik penyusunan laporan dan compliance perpajakan</p>
                    <span class="seminar-count">18 Webinar</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h3>International Tax</h3>
                    <p>Perpajakan internasional dan transfer pricing</p>
                    <span class="seminar-count">8 Webinar</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Filter Section -->
    <div class="search-filter-section">
        <div class="container">
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari webinar, topik, atau pembicara...">
                    <button class="search-btn" id="searchButton">
                        <span>Cari</span>
                    </button>
                </div>
            </div>
            
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-layer-group"></i>
                    Semua Webinar
                </button>
                <button class="filter-btn" data-filter="premium">
                    <i class="fas fa-crown"></i>
                    Premium
                </button>
                <button class="filter-btn" data-filter="gratis">
                    <i class="fas fa-gift"></i>
                    Gratis
                </button>
            </div>
        </div>
    </div>

    <!-- Webinar List Section -->
    <div id="webinar-list" class="webinar-list-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Webinar Terbaru</h2>
                <p class="section-subtitle">Pilih dan daftar webinar yang sesuai dengan jadwal dan kebutuhan Anda</p>
            </div>

            <!-- Webinar Grid -->
            <div class="courses-grid">
                @foreach($webinars as $webinar)
                    @php
                        $isGratis = $webinar->harga == 0;
                        $hargaFormatted = $isGratis ? 'GRATIS' : 'Rp ' . number_format($webinar->harga, 0, ',', '.');
                        $detail = $webinar->detail->first();
                        $kategoriClass = 'webinar';
                    @endphp

                    <div class="course-card {{ $isGratis ? 'gratis' : 'premium' }}" data-category="{{ $isGratis ? 'gratis' : 'premium' }}">
                        <div class="course-image">
                            <img src="{{ $webinar->gambar ? asset('storage/' . $webinar->gambar) : asset('assets/customer/images/webinar-placeholder.jpg') }}" 
                                 alt="{{ $webinar->judul }}" />
                            <div class="course-badge badge-{{ $kategoriClass }}">WEBINAR</div>
                            <div class="status-badge {{ $isGratis ? 'status-new' : 'status-hot' }}">
                                {{ $isGratis ? 'BARU' : 'TERPOPULER' }}
                            </div>
                            <div class="online-indicator">
                                <i class="fas fa-video"></i>
                                LIVE ONLINE
                            </div>
                        </div>

                        <div class="course-content">
                            <h3 class="course-title">{{ $webinar->judul }}</h3>

                            <div class="mentor-info">
                                <img src="{{ asset('assets/customer/images/mentor1.jpeg') }}" alt="Mentor" class="mentor-avatar">
                                <div class="mentor-details">
                                    <span class="mentor-name">{{ $detail->pembicara ?? 'Expert Speaker' }}</span>
                                    <span class="mentor-role">{{ $detail->level ?? 'Professional' }}</span>
                                </div>
                            </div>

                            <div class="seminar-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($webinar->tanggal)->translatedFormat('d M Y') }} • {{ $webinar->waktu_pelaksanaan }} WIB</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-video"></i>
                                    <span>{{ $detail->lokasi ?? 'Zoom Meeting' }}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $detail->fasilitas ?? '2 Jam Sertifikat' }}</span>
                                </div>
                                @if($detail && $detail->kuota_peserta)
                                <div class="detail-item">
                                    <i class="fas fa-users"></i>
                                    <span>Kuota: {{ $detail->kuota_peserta }} Peserta</span>
                                </div>
                                @endif
                            </div>

                            <div class="course-meta">
                                <div class="price {{ $isGratis ? 'free' : '' }}">{{ $hargaFormatted }}</div>
                                @if($detail && $detail->kuota_peserta)
                                <div class="slot-info">
                                    <i class="fas fa-user-check"></i>
                                    <span>{{ $detail->kuota_peserta }} Slot</span>
                                </div>
                                @endif
                            </div>

                            <div class="course-actions">
                                <div class="course-actions mt-3">
                                    <a href="{{ route('webinar.show', $webinar->id) }}" 
                                    class="btn {{ $isGratis ? 'btn-free' : 'btn-premium' }} d-block text-center">
                                        Daftar Sekarang
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="load-more-container">
                <button class="btn btn-outline load-more">
                    <span>Muat Lebih Banyak</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Keunggulan Webinar Kami</h2>
                <p class="section-subtitle">Mengapa harus memilih webinar dari kami?</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-laptop-house"></i>
                    </div>
                    <h4>Akses Dari Mana Saja</h4>
                    <p>Ikuti webinar secara online dari rumah, kantor, atau di mana saja dengan koneksi internet</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h4>Interaktif</h4>
                    <p>Sesi tanya jawab langsung dengan pembicara dan diskusi dengan peserta lain</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <h4>Materi Download</h4>
                    <p>Dapatkan materi presentasi dan rekaman webinar setelah acara</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Sertifikat Digital</h4>
                    <p>Dapatkan sertifikat partisipasi digital yang dapat diunduh</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>Akses Mobile</h4>
                    <p>Dapat diakses melalui smartphone, tablet, atau komputer</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-reply"></i>
                    </div>
                    <h4>Replay Available</h4>
                    <p>Tidak bisa hadir live? Akses rekaman webinar kapan saja</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Tingkatkan Kompetensi Anda?</h3>
                <p>Daftar webinar sekarang dan dapatkan insight terbaru seputar perpajakan</p>
                <div class="cta-buttons">
                    <a href="#webinar-list" class="btn btn-light">
                        <span>Lihat Webinar</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* =========================
   BASE STYLES & VARIABLES
   ========================= */
:root {
    --primary-purple: #7c3aed;
    --secondary-purple: #6d28d9;
    --dark-purple: #5b21b6;
    --light-purple: #ddd6fe;
    --primary-blue: #2563eb;
    --secondary-blue: #1d4ed8;
    --primary-red: #dc2626;
    --primary-orange: #ea580c;
    --success-green: #059669;
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
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    --border-radius: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.webinars-page {
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
   HERO SECTION
   ========================= */
.webinar-hero {
    background: linear-gradient(135deg, var(--primary-purple) 0%, var(--secondary-purple) 50%, #8b5cf6 100%);
    color: var(--white);
    padding: clamp(4rem, 10vw, 8rem) 0 clamp(3rem, 8vw, 5rem);
    position: relative;
    overflow: hidden;
}

.hero-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(2rem, 4vw, 4rem);
    align-items: center;
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
    background: linear-gradient(135deg, #c4b5fd, #a78bfa);
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
    color: #c4b5fd;
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

.hero-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(1rem, 3vw, 2rem);
}

.stat-item {
    text-align: center;
    padding: clamp(1.5rem, 3vw, 2rem);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: var(--transition);
}

.stat-item:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.15);
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
    opacity: 0.9;
    color: var(--white);
}

/* =========================
   SEARCH & FILTER SECTION
   ========================= */
.search-filter-section {
    padding: 2rem 0;
    background: var(--white);
    border-bottom: 1px solid var(--gray-200);
}

.search-container {
    margin-bottom: 1.5rem;
}

.search-box {
    display: flex;
    align-items: center;
    background: var(--white);
    border: 2px solid var(--gray-300);
    border-radius: 50px;
    padding: 0.5rem;
    max-width: 600px;
    margin: 0 auto;
    transition: var(--transition);
}

.search-box:focus-within {
    border-color: var(--primary-purple);
    box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
}

.search-box i {
    color: var(--gray-500);
    margin: 0 1rem;
    font-size: 1.1rem;
}

.search-box input {
    flex: 1;
    border: none;
    outline: none;
    padding: 0.75rem 0;
    font-size: 1rem;
    background: transparent;
}

.search-btn {
    background: var(--primary-purple);
    color: var(--white);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.search-btn:hover {
    background: var(--secondary-purple);
    transform: translateY(-1px);
}

.filter-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.filter-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--white);
    border: 2px solid var(--gray-300);
    border-radius: 25px;
    font-weight: 600;
    color: var(--gray-600);
    cursor: pointer;
    transition: var(--transition);
    font-size: 0.9rem;
}

.filter-btn:hover {
    border-color: var(--primary-purple);
    color: var(--primary-purple);
}

.filter-btn.active {
    background: var(--primary-purple);
    border-color: var(--primary-purple);
    color: var(--white);
}

/* =========================
   CATEGORIES SECTION
   ========================= */
.categories-section {
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

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(250px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.category-card {
    background: var(--white);
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    border-radius: 16px;
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    border: 1px solid var(--gray-200);
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.category-icon {
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
    color: var(--white);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.75rem, 3vw, 2rem);
    margin: 0 auto 1.5rem;
}

.category-card h3 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.category-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.seminar-count {
    background: var(--light-purple);
    color: var(--primary-purple);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: clamp(0.8rem, 1.5vw, 0.875rem);
    font-weight: 600;
}

/* =========================
   WEBINAR LIST SECTION
   ========================= */
.webinar-list-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
    margin-bottom: clamp(2rem, 4vw, 3rem);
    justify-items: center;
}

.course-card {
    background: var(--white);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    position: relative;
    border: 1px solid var(--gray-200);
    width: 100%;
    max-width: 380px;
    min-height: 500px;
    display: flex;
    flex-direction: column;
}

.course-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--primary-purple);
}

.course-image {
    position: relative;
    height: 220px;
    overflow: hidden;
    flex-shrink: 0;
}

.course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.course-card:hover .course-image img {
    transform: scale(1.05);
}

.course-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    font-size: 0.6rem;
    font-weight: 700;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
    background: var(--primary-purple);
    color: var(--white);
}

.badge-webinar {
    background: var(--primary-purple);
}

.online-indicator {
    position: absolute;
    bottom: 1rem;
    left: 1rem;
    background: rgba(0, 0, 0, 0.8);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.7rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.status-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 0.6rem;
    font-weight: 700;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
}

.status-hot {
    background: var(--primary-red);
    color: var(--white);
}

.status-new {
    background: var(--success-green);
    color: var(--white);
}

.course-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.course-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 1rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 2.8em;
}

.mentor-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.mentor-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--gray-200);
    flex-shrink: 0;
}

.mentor-details {
    flex: 1;
    min-width: 0;
}

.mentor-name {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-800);
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.mentor-role {
    display: block;
    font-size: 0.75rem;
    color: var(--gray-500);
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.seminar-details {
    margin-bottom: 1rem;
    flex: 1;
}

.detail-item {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    font-size: 0.8rem;
    color: var(--gray-600);
    line-height: 1.4;
}

.detail-item i {
    width: 14px;
    color: var(--gray-500);
    flex-shrink: 0;
    margin-top: 0.1rem;
}

.course-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    gap: 1rem;
}

.price {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--gray-800);
    white-space: nowrap;
}

.price.free {
    color: var(--success-green);
}

.slot-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8rem;
    color: var(--gray-500);
    white-space: nowrap;
}

.course-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: auto;
}

.btn {
    padding: 0.75rem 1rem;
    border-radius: var(--border-radius);
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
    transition: var(--transition);
    cursor: pointer;
    border: 1px solid;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    gap: 0.5rem;
    text-decoration: none;
    white-space: nowrap;
    flex-shrink: 0;
}

.btn-outline {
    padding: 0.75rem;
    background: transparent;
    border-color: var(--gray-300);
    color: var(--gray-600);
    width: auto;
    flex: 0 0 auto;
}

.btn-outline:hover {
    background: var(--gray-100);
    border-color: var(--gray-400);
    color: var(--gray-700);
}

.btn-premium {
    background: var(--primary-purple);
    border-color: var(--primary-purple);
    color: var(--white);
    flex: 1;
}

.btn-premium:hover {
    background: var(--secondary-purple);
    border-color: var(--secondary-purple);
    transform: translateY(-1px);
}

.btn-free {
    background: var(--success-green);
    border-color: var(--success-green);
    color: var(--white);
    flex: 1;
}

.btn-free:hover {
    background: #047857;
    border-color: #047857;
    transform: translateY(-1px);
}

.btn-primary {
    background: var(--primary-purple);
    border-color: var(--primary-purple);
    color: var(--white);
}

.btn-primary:hover {
    background: var(--secondary-purple);
    border-color: var(--secondary-purple);
    transform: translateY(-1px);
}

.btn-light {
    background: var(--white);
    border-color: var(--white);
    color: var(--gray-800);
}

.btn-light:hover {
    background: var(--gray-100);
    border-color: var(--gray-100);
    transform: translateY(-1px);
}

.btn-outline-light {
    background: transparent;
    border-color: var(--white);
    color: var(--white);
}

.btn-outline-light:hover {
    background: var(--white);
    color: var(--primary-purple);
    transform: translateY(-1px);
}

.load-more-container {
    text-align: center;
    margin-top: clamp(2rem, 4vw, 3rem);
}

.load-more {
    padding: clamp(0.875rem, 2vw, 1rem) clamp(1.5rem, 3vw, 2rem);
    border-color: var(--gray-300);
    color: var(--gray-600);
}

.load-more:hover {
    border-color: var(--primary-purple);
    color: var(--primary-purple);
    background: var(--white);
}

/* =========================
   BENEFITS SECTION
   ========================= */
.benefits-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--gray-50);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(300px, 100%), 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
}

.benefit-card {
    background: var(--white);
    padding: clamp(2rem, 4vw, 2.5rem) clamp(1.5rem, 3vw, 2rem);
    border-radius: 16px;
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    border: 1px solid var(--gray-200);
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.benefit-icon {
    width: clamp(70px, 8vw, 80px);
    height: clamp(70px, 8vw, 80px);
    background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
    color: var(--white);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(1.75rem, 3vw, 2rem);
    margin: 0 auto 1.5rem;
}

.benefit-card h4 {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.benefit-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

/* =========================
   CTA SECTION
   ========================= */
.cta-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
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
   RESPONSIVE BREAKPOINTS
   ========================= */

/* Tablet Landscape (1024px - 1199px) */
@media (max-width: 1199px) {
    .hero-content {
        gap: 3rem;
    }
    
    .courses-grid {
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    }
}

/* Tablet Portrait (768px - 1023px) */
@media (max-width: 1023px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
    }

    .hero-text {
        margin: 0 auto;
    }

    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
        max-width: 500px;
        margin: 0 auto;
    }

    .courses-grid {
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    }

    .filter-tabs {
        gap: 0.75rem;
    }

    .filter-btn {
        flex: 0 1 calc(50% - 0.75rem);
        min-width: 140px;
    }

    .search-box {
        flex-direction: column;
        border-radius: 15px;
        padding: 1rem;
        gap: 1rem;
    }

    .search-box input {
        width: 100%;
        text-align: center;
    }

    .search-btn {
        width: 100%;
        border-radius: 10px;
    }
}

/* Mobile Landscape (576px - 767px) */
@media (max-width: 767px) {
    .webinar-hero {
        padding: clamp(3rem, 8vw, 4rem) 0 clamp(2rem, 6vw, 3rem);
    }

    .hero-actions {
        justify-content: center;
    }

    .hero-stats {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .filter-tabs {
        flex-direction: column;
        align-items: center;
    }

    .filter-btn {
        width: 100%;
        max-width: 300px;
        flex: none;
    }

    .courses-grid {
        grid-template-columns: 1fr;
        max-width: 380px;
        margin-left: auto;
        margin-right: auto;
    }

    .course-actions {
        flex-direction: column;
    }

    .course-actions .btn {
        width: 100%;
    }

    .btn-outline {
        width: 100%;
    }

    .course-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 280px;
    }

    .mentor-info {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }

    .mentor-details {
        text-align: center;
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

    .category-card,
    .benefit-card {
        padding: 1.5rem 1.25rem;
    }

    .course-content {
        padding: 1.25rem;
    }

    .course-title {
        font-size: 1.1rem;
        min-height: auto;
    }

    .detail-item {
        font-size: 0.75rem;
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

    .category-card,
    .benefit-card,
    .course-card {
        padding: 1.25rem 1rem;
    }

    .course-badge,
    .status-badge,
    .online-indicator {
        font-size: 0.5rem;
        padding: 0.2rem 0.6rem;
    }

    .detail-item {
        flex-wrap: wrap;
    }

    .slot-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
    
    .courses-grid {
        max-width: 100%;
    }
}

/* =========================
   ACCESSIBILITY & PERFORMANCE
   ========================= */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Focus styles for accessibility */
button:focus,
a:focus,
.filter-btn:focus,
.btn:focus,
.search-box input:focus {
    outline: 2px solid var(--primary-purple);
    outline-offset: 2px;
}

/* Loading states */
.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

/* High contrast support */
@media (prefers-contrast: high) {
    :root {
        --primary-purple: #0000ff;
        --secondary-purple: #0000cd;
    }
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
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const courseCards = document.querySelectorAll('.course-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to current button
            button.classList.add('active');

            // Filter courses
            courseCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        if (searchTerm === '') {
            // Show all cards if search is empty
            courseCards.forEach(card => {
                card.style.display = 'flex';
            });
            return;
        }

        courseCards.forEach(card => {
            const title = card.querySelector('.course-title').textContent.toLowerCase();
            const mentor = card.querySelector('.mentor-name').textContent.toLowerCase();
            const category = card.querySelector('.course-badge').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || mentor.includes(searchTerm) || category.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    searchButton.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    // Clear search when input is cleared
    searchInput.addEventListener('input', function() {
        if (this.value === '') {
            performSearch();
        }
    });

    // Load more functionality
    const loadMoreBtn = document.querySelector('.load-more');
    let visibleCards = 6;

    // Initially hide cards beyond first 6
    const allCards = document.querySelectorAll('.course-card');
    Array.from(allCards).slice(6).forEach(card => {
        card.style.display = 'none';
    });

    loadMoreBtn.addEventListener('click', () => {
        const nextCards = Array.from(allCards).slice(visibleCards, visibleCards + 3);
        
        nextCards.forEach(card => {
            card.style.display = 'flex';
        });

        visibleCards += 3;

        // Hide load more button if no more cards
        if (visibleCards >= allCards.length) {
            loadMoreBtn.style.display = 'none';
        }
    });

    // Update load more button visibility on initial load
    if (allCards.length <= 6) {
        loadMoreBtn.style.display = 'none';
    }
});
</script>
@endsection