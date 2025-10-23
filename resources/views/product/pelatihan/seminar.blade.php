@extends('layouts.master')

@section('title', 'Seminar & Workshop Perpajakan')

@section('content')
<section class="seminars-page">
    <!-- Hero Section -->
    <div class="seminar-hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="title-line">Seminar &</span>
                        <span class="title-line highlight">Workshop</span>
                    </h1>
                    <p class="hero-subtitle">
                        Tingkatkan kompetensi perpajakan Anda melalui <span class="text-highlight">seminar</span> dan 
                        <span class="text-highlight">workshop</span> dengan pembicara ahli di bidangnya
                    </p>
                    <p class="hero-description">
                        Dapatkan insight terbaru seputar regulasi perpajakan, strategi perencanaan, 
                        dan best practices dari praktisi berpengalaman.
                    </p>
                    <div class="hero-actions">
                        <a href="#seminar-list" class="btn btn-primary">
                            <span>Lihat Seminar</span>
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
                            <span class="stat-number">150+</span>
                            <span class="stat-label">Penyelenggaran Seminar</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100+</span>
                            <span class="stat-label">Materi</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Pembicara Expert</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Kepuasan Peserta</span>
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
                <h2 class="section-title">Kategori Seminar</h2>
                <p class="section-subtitle">Pilih seminar sesuai dengan kebutuhan dan minat Anda</p>
            </div>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Tax Planning</h3>
                    <p>Strategi perencanaan pajak untuk optimalisasi kewajiban perpajakan</p>
                    <span class="seminar-count">12 Seminar</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>PPN & PPnBM</h3>
                    <p>Update regulasi dan implementasi PPN terbaru untuk bisnis</p>
                    <span class="seminar-count">8 Seminar</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Audit & Compliance</h3>
                    <p>Teknik audit internal dan penyiapan compliance perpajakan</p>
                    <span class="seminar-count">15 Seminar</span>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>International Tax</h3>
                    <p>Perpajakan internasional, transfer pricing, dan tax treaty</p>
                    <span class="seminar-count">6 Seminar</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Seminar List Section -->
    <div id="seminar-list" class="seminar-list-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Seminar & Workshop Terbaru</h2>
                <p class="section-subtitle">Pilih dan daftar seminar yang sesuai dengan jadwal dan kebutuhan Anda</p>
            </div>

            <!-- Seminar Grid -->
            <div class="courses-grid">
                @foreach($seminars as $seminar)
                    @php
                        $detail = $seminar->detailSeminar;
                        $isGratis = $seminar->harga == 0;
                        $hargaFormatted = $isGratis ? 'GRATIS' : 'Rp ' . number_format($seminar->harga, 0, ',', '.');
                        $kategoriClass = strtolower($detail->kategori ?? 'seminar');
                    @endphp

                    <div class="course-card {{ $isGratis ? 'gratis' : 'premium' }}" data-category="{{ $isGratis ? 'gratis' : 'premium' }}">
                        <div class="course-image">
                            <img src="{{ asset('storage/' . $seminar->gambar) }}" alt="{{ $seminar->judul }}" />
                            <div class="course-badge badge-{{ $kategoriClass }}">{{ strtoupper($detail->kategori ?? 'SEMINAR') }}</div>
                            <div class="status-badge {{ $isGratis ? 'status-new' : 'status-hot' }}">
                                {{ $isGratis ? 'BARU' : 'HOT' }}
                            </div>
                        </div>

                        <div class="course-content">
                            <h3 class="course-title">{{ $seminar->judul }}</h3>

                            <div class="mentor-info">
                                <img src="{{ asset('assets/customer/images/mentor1.jpeg') }}" alt="Mentor" class="mentor-avatar">
                                <div class="mentor-details">
                                    <span class="mentor-name">{{ $detail->pembicara }}</span>
                                    <span class="mentor-role">{{ $detail->level }}</span>
                                </div>
                            </div>

                            <div class="seminar-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($seminar->tanggal)->format('d M Y') }} • {{ $seminar->waktu_pelaksanaan }} WIB</span>
                                </div>
                                <div class="detail-item">
                                    @if(Str::contains(strtolower($detail->lokasi), ['zoom', 'google', 'meet']))
                                        <i class="fas fa-video"></i>
                                    @else
                                        <i class="fas fa-map-marker-alt"></i>
                                    @endif
                                    <span>{{ $detail->lokasi }}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $detail->fasilitas }}</span>
                                </div>
                            </div>

                            <div class="course-meta">
                                <div class="price {{ $isGratis ? 'free' : '' }}">{{ $hargaFormatted }}</div>
                                <div class="slot-info">
                                    <i class="fas fa-users"></i>
                                    <span>{{ $detail->kuota_peserta }} Peserta</span>
                                </div>
                            </div>

                            <div class="course-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-calendar"></i>
                        </button>

                        <button 
                            type="button"
                            class="btn {{ $isGratis ? 'btn-free' : 'btn-premium' }}" 
                            onclick="addToCart({{ $seminar->id }}, 'ItemSeminar')">
                            Daftar
                        </button>
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
                <h2 class="section-title">Mengapa Ikut Seminar Kami?</h2>
                <p class="section-subtitle">Keunggulan yang akan Anda dapatkan dengan mengikuti seminar kami</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Pembicara Berpengalaman</h4>
                    <p>Belajar langsung dari praktisi dan konsultan pajak dengan pengalaman 10+ tahun</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4>Materi Update</h4>
                    <p>Konten selalu diperbarui sesuai regulasi terbaru dan perkembangan industri</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Sertifikat</h4>
                    <p>Dapatkan sertifikat partisipasi yang dapat digunakan untuk pengembangan karir</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Networking</h4>
                    <p>Jaringan dengan profesional dan praktisi perpajakan dari berbagai perusahaan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>Tools & Template</h4>
                    <p>Dapatkan template dan tools praktis yang langsung dapat diaplikasikan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>After Seminar Support</h4>
                    <p>Konsultasi gratis setelah seminar untuk implementasi materi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Tunggu Apa Lagi?</h3>
                <p>Daftar seminar sekarang dan tingkatkan kompetensi perpajakan Anda</p>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-blue: #2563eb;
    --secondary-blue: #1d4ed8;
    --dark-blue: #1e40af;
    --light-blue: #dbeafe;
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
    --border-radius: 8px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* =========================
   BASE STYLES & RESET
   ========================= */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.seminars-page {
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
.seminar-hero {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
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
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
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
    background: var(--light-blue);
    color: var(--primary-blue);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: clamp(0.8rem, 1.5vw, 0.875rem);
    font-weight: 600;
}

/* =========================
   SEMINAR LIST SECTION
   ========================= */
.seminar-list-section {
    padding: clamp(4rem, 8vw, 6rem) 0;
    background: var(--white);
}

.filter-buttons {
    display: flex;
    gap: clamp(0.75rem, 2vw, 1rem);
    margin-bottom: clamp(2rem, 4vw, 3rem);
    flex-wrap: wrap;
    justify-content: center;
}

.filter-btn {
    padding: clamp(0.625rem, 1.5vw, 0.75rem) clamp(1.25rem, 2vw, 1.5rem);
    background: var(--white);
    border: 2px solid var(--gray-300);
    border-radius: 25px;
    font-weight: 600;
    color: var(--gray-600);
    cursor: pointer;
    transition: var(--transition);
    font-size: clamp(0.85rem, 1.5vw, 0.9rem);
    white-space: nowrap;
    flex: 1;
    min-width: fit-content;
    text-align: center;
}

.filter-btn:hover {
    border-color: var(--primary-blue);
    color: var(--primary-blue);
}

.filter-btn.active {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: var(--white);
}

/* =========================
   COURSES GRID - FIXED SIZE
   ========================= */
.courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: clamp(1.5rem, 3vw, 2rem);
    margin-bottom: clamp(2rem, 4vw, 3rem);
    justify-items: center;
}

/* =========================
   COURSE CARD STYLES - FIXED SIZE
   ========================= */
.course-card {
    background: var(--white);
    border-radius: 30px;
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
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--gray-300);
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
    background-color: #007bff;
    color: #ffffff;
}

.badge-seminar {
    background: var(--primary-blue);
    color: var(--white);
}

.badge-webinar {
    background: var(--success-green);
    color: var(--white);
}

.badge-workshop {
    background: var(--primary-orange);
    color: var(--white);
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

.status-popular {
    background: var(--primary-orange);
    color: var(--white);
}

.course-content {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.course-title {
    font-size: 1.25rem;
    font-weight: 600;
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
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    color: var(--gray-600);
}

.detail-item i {
    width: 16px;
    color: var(--gray-500);
    flex-shrink: 0;
}

.course-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    gap: 1rem;
}

.price {
    font-size: 1.125rem;
    font-weight: 700;
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
    font-size: 0.875rem;
    color: var(--gray-500);
    white-space: nowrap;
}

.course-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: auto;
}

.course-actions .btn {
    flex: 1;
    min-width: 0;
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
    min-height: 40px;
    gap: 0.5rem;
    text-decoration: none;
    white-space: nowrap;
    flex-shrink: 0;
}

.btn-outline {
    padding: 0.5rem 1rem;
    background: transparent;
    border-color: var(--gray-300);
    color: var(--gray-600);
    width: auto;
}

.btn-outline:hover {
    background: var(--gray-100);
    border-color: var(--gray-400);
    color: var(--gray-700);
}

.btn-premium {
    background: var(--primary-red);
    border-color: var(--primary-red);
    color: var(--white);
}

.btn-premium:hover {
    background: #b91c1c;
    border-color: #b91c1c;
    transform: translateY(-1px);
}

.btn-free {
    background: var(--primary-orange);
    border-color: var(--primary-orange);
    color: var(--white);
}

.btn-free:hover {
    background: #c2410c;
    border-color: #c2410c;
    transform: translateY(-1px);
}

.btn-primary {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: var(--white);
}

.btn-primary:hover {
    background: var(--secondary-blue);
    border-color: var(--secondary-blue);
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
    color: var(--primary-blue);
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
    border-color: var(--primary-blue);
    color: var(--primary-blue);
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
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
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
    background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
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

    .filter-buttons {
        gap: 0.75rem;
    }

    .filter-btn {
        flex: 0 1 calc(50% - 0.75rem);
        min-width: 140px;
    }
}

/* Mobile Landscape (576px - 767px) */
@media (max-width: 767px) {
    .seminar-hero {
        padding: clamp(3rem, 8vw, 4rem) 0 clamp(2rem, 6vw, 3rem);
    }

    .hero-actions {
        justify-content: center;
    }

    .hero-stats {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .filter-buttons {
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
        padding: 1.5rem;
    }

    .course-title {
        font-size: 1.1rem;
        min-height: auto;
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
    .status-badge {
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
   TOUCH DEVICE OPTIMIZATIONS
   ========================= */
@media (hover: none) and (pointer: coarse) {
    .category-card:hover,
    .benefit-card:hover,
    .course-card:hover,
    .btn:hover {
        transform: none;
    }

    .course-card:hover .course-image img {
        transform: none;
    }

    .filter-btn:hover {
        border-color: var(--gray-300);
        color: var(--gray-600);
    }

    .filter-btn.active:hover {
        border-color: var(--primary-blue);
        color: var(--white);
    }
}

/* =========================
   HIGH DPI SCREENS
   ========================= */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .category-icon,
    .benefit-icon {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
}

/* =========================
   REDUCED MOTION
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

/* =========================
   PRINT STYLES
   ========================= */
@media print {
    .seminar-hero,
    .cta-section,
    .hero-actions,
    .course-actions {
        display: none;
    }

    .categories-section,
    .seminar-list-section,
    .benefits-section {
        padding: 2rem 0;
    }

    .section-title {
        color: #000 !important;
    }

    .course-card {
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
        --primary-blue: #0000ff;
        --secondary-blue: #0000cd;
        --primary-red: #8b0000;
        --primary-orange: #ff4500;
    }
}

/* Focus styles */
button:focus,
a:focus,
.filter-btn:focus,
.btn:focus {
    outline: 2px solid var(--primary-blue);
    outline-offset: 2px;
}

/* Skip link for accessibility */
.skip-link {
    position: absolute;
    top: -40px;
    left: 6px;
    background: var(--primary-blue);
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
.category-card,
.benefit-card,
.course-card {
    transform: translateZ(0);
    backface-visibility: hidden;
}

/* Loading states */
.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

/* Image optimization */
.course-image img {
    will-change: transform;
}

/* Ensure proper text contrast */
.course-title,
.category-card h3,
.benefit-card h4 {
    color: var(--gray-900);
}

/* Improve button readability */
.btn {
    font-weight: 600;
    letter-spacing: 0.025em;
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
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Load more functionality
    const loadMoreBtn = document.querySelector('.load-more');
    let visibleCards = 6;

    loadMoreBtn.addEventListener('click', () => {
        const allCards = document.querySelectorAll('.course-card');
        const nextCards = Array.from(allCards).slice(visibleCards, visibleCards + 3);
        
        nextCards.forEach(card => {
            card.style.display = 'block';
        });

        visibleCards += 3;

        // Hide load more button if no more cards
        if (visibleCards >= allCards.length) {
            loadMoreBtn.style.display = 'none';
        }
    });

    // Initially hide cards beyond first 6
    const allCards = document.querySelectorAll('.course-card');
    Array.from(allCards).slice(6).forEach(card => {
        card.style.display = 'none';
    });
});
</script>
@endsection