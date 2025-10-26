@extends('layouts.master')

@section('title', 'Layanan Jasa Akuntansi & Pembukuan')

@section('content')
<section class="service-akuntansi">
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
                        <span class="title-line">Jasa Akuntansi</span>
                        <span class="title-line highlight">& Pembukuan</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi lengkap akuntansi untuk bisnis Anda yang <span class="text-highlight">profesional</span>, 
                        <span class="text-highlight">transparan</span>, dan <span class="text-highlight">sesuai standar</span>
                    </p>
                    <p class="hero-description">
                        Tim ahli kami membantu mengoptimalkan proses keuangan bisnis Anda dengan layanan akuntansi 
                        yang akurat dan terpercaya. Fokus pada pengembangan bisnis, biarkan kami mengelola pembukuan Anda.
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
                            <i class="fas fa-chart-line"></i>
                            <span>Laporan Real-time</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-shield-alt"></i>
                            <span>Data Aman</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-clock"></i>
                            <span>Tepat Waktu</span>
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
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Berbagai solusi akuntansi lengkap untuk kebutuhan bisnis Anda</p>
            </div>

            <div class="services-grid">
                @foreach ($services as $service)
                    <div class="service-card {{ $loop->iteration == 4 ? 'featured' : '' }}">
                    @if ($loop->iteration == 4)
                        <div class="card-badge">Populer</div>
                    @endif

                    <div class="card-header">
                        <div class="service-icon">
                            @switch($loop->iteration)
                                @case(1)
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    @break
                                @case(2)
                                    <i class="fas fa-chart-line"></i>
                                    @break
                                @case(3)
                                    <i class="fas fa-check-circle"></i>
                                    @break
                                @default
                                    <i class="fas fa-calculator"></i>
                            @endswitch
                        </div>

                        <h3 class="service-title">{{ $service->judul }}</h3>
                        <h4 class="service-price">
                            Rp {{ number_format($service->harga, 0, ',', '.') }}
                        </h4>
                    </div>
                    
                    <div class="card-body">
                        <p class="service-description">
                            {{ Str::limit($service->detail->deskripsi ?? 'Deskripsi tidak tersedia', 120) }}
                        </p>

                        @if (!empty($service->detail->benefit))
                            <ul class="benefit-list">
                                @foreach (array_slice($service->detail->benefit, 0, 4) as $benefit)
                                    @php
                                        $trimmed = trim($benefit);
                                    @endphp

                                    @if ($trimmed !== '')
                                        @php
                                            $isNegative = Str::startsWith($trimmed, '-');
                                            $text = ltrim($trimmed, '+- ');
                                        @endphp

                                        <li class="benefit-item {{ $isNegative ? 'negative' : '' }}">
                                            <i class="fas fa-{{ $isNegative ? 'times' : 'check' }}"></i>
                                            <span>{{ Str::limit($text, 50) }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="no-benefit">Benefit belum tersedia.</p>
                        @endif
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('jasa.akuntansi.show', $service->id) }}" class="btn btn-primary">
                            Pilih Layanan
                        </a>
                        <a href="/kontak" class="btn btn-outline">
                            Konsultasi
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <p class="section-subtitle">Keunggulan layanan yang membuat kami berbeda</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Terpercaya & Aman</h4>
                    <p>Data keuangan Anda aman bersama kami dengan sistem keamanan berlapis dan enkripsi tingkat tinggi</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Tepat Waktu</h4>
                    <p>Laporan disampaikan tepat waktu dengan akurasi yang terjamin dan update real-time</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Tim Berpengalaman</h4>
                    <p>Dikelola oleh profesional akuntansi dengan sertifikasi dan pengalaman luas lebih dari 10 tahun</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Support 24/7</h4>
                    <p>Layanan dukungan penuh setiap saat untuk kebutuhan bisnis Anda kapanpun dibutuhkan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Mengoptimalkan Keuangan Bisnis Anda?</h3>
                <p>Konsultasikan kebutuhan akuntansi Anda dengan ahli kami dan dapatkan solusi terbaik untuk perkembangan bisnis</p>
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
    }

    .service-akuntansi {
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
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 50%, var(--dark-blue) 100%);
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
        font-size: clamp(2.5rem, 5vw, 4rem);
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
        font-size: clamp(1.1rem, 2vw, 1.5rem);
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
       SERVICES SECTION - IMPROVED
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
        font-size: clamp(2rem, 4vw, 3rem);
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

    /* Improved Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr));
    gap: clamp(1.25rem, 2vw, 1.5rem);
    max-width: 1100px; /* sedikit lebih lebar */
    margin: 0 auto;
}

/* Compact Service Card */
.service-card {
    position: relative;
    overflow: hidden;
    padding: clamp(1.5rem, 2.5vw, 1.75rem); /* sedikit lebih lega */
    border-radius: 16px;
    border: 1px solid var(--gray-100);
    background: var(--white);
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.6s ease-out;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 420px; /* sebelumnya 380px → agar card lebih panjang */
    height: 100%;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
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
    top: 0.75rem;
    right: 0.75rem;
    padding: 0.35rem 0.75rem;
    font-size: 0.7rem;
    font-weight: 600;
    color: var(--white);
    background: #dc2626;
    border-radius: 12px;
    text-transform: uppercase;
}

.card-header {
    text-align: center;
    margin-bottom: 1rem;
}

.service-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px; /* sedikit lebih besar */
    height: 60px;
    margin: 0 auto 1rem;
    font-size: 1.5rem; /* lebih proporsional */
    color: var(--primary-blue);
    border-radius: 14px;
    background: linear-gradient(135deg, var(--light-blue) 0%, #eff6ff 100%);
    transition: all 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.05);
    color: var(--white);
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
}

.service-title {
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--gray-800);
    line-height: 1.3;
}

.service-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 0.75rem;
}

.card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.service-description {
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 1.25rem;
    color: var(--gray-600);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.benefit-list {
    margin: 0;
    padding: 0;
    list-style: none;
    flex: 1;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    padding: 0.4rem 0;
    font-size: 0.85rem;
    color: var(--gray-600);
    line-height: 1.4;
}

.benefit-item i {
    font-size: 0.75rem;
    margin-top: 0.15rem;
    flex-shrink: 0;
}

.benefit-item.negative i {
    color: #dc2626;
}

.benefit-item:not(.negative) i {
    color: #10b981;
}

.benefit-item span {
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.no-benefit {
    font-size: 0.85rem;
    color: var(--gray-400);
    text-align: center;
    margin: 1rem 0;
}

.card-footer {
    display: flex;
    flex-direction: column; /* tombol ditumpuk vertikal */
    gap: 0.6rem;
    margin-top: 1.25rem;
}

/* Tombol utama */
.card-footer .btn {
    display: inline-block;
    width: 100%; /* biar tombol memanjang penuh */
    text-align: center;
    padding: 0.75rem 1rem;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
}

/* Tombol biru utama */
.card-footer .btn-primary {
    background: var(--primary-blue);
    color: #fff;
    border: none;
}

.card-footer .btn-primary:hover {
    background: var(--secondary-blue);
    transform: translateY(-2px);
}

/* Tombol outline */
.card-footer .btn-outline {
    background: transparent;
    color: var(--primary-blue);
    border: 1.5px solid var(--primary-blue);
}

.card-footer .btn-outline:hover {
    background: var(--primary-blue);
    color: #fff;
    transform: translateY(-2px);
}



    /* =========================
       COMPACT BUTTONS
       ========================= */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.6rem 1rem;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        border: 1.5px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        min-height: 40px;
        flex: 1;
    }

    .btn-primary {
        color: var(--white);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .btn-outline {
        color: var(--gray-600);
        background: var(--white);
        border: 1.5px solid var(--gray-300);
    }

    .btn-outline:hover {
        color: var(--primary-blue);
        border-color: var(--primary-blue);
        transform: translateY(-1px);
    }

    .btn-outline-light {
        color: var(--white);
        background: transparent;
        border: 1.5px solid var(--white);
    }

    .btn-outline-light:hover {
        color: var(--primary-blue);
        background: var(--white);
        transform: translateY(-1px);
    }

    .btn-light {
        color: var(--gray-800);
        background: var(--white);
    }

    .btn-light:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* =========================
       FEATURES SECTION
       ========================= */
    .features-section {
        padding: clamp(60px, 8vw, 100px) 0;
        background: var(--white);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr));
        gap: clamp(2rem, 3vw, 3rem);
    }

    .feature-item {
        text-align: center;
        padding: clamp(1.5rem, 2vw, 2rem) 1rem;
    }

    .feature-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: clamp(60px, 8vw, 80px);
        height: clamp(60px, 8vw, 80px);
        margin: 0 auto 1.5rem;
        font-size: clamp(1.5rem, 2.5vw, 2rem);
        color: var(--primary-blue);
        border-radius: 20px;
        background: linear-gradient(135deg, var(--light-blue) 0%, #eff6ff 100%);
        transition: all 0.3s ease;
    }

    .feature-item:hover .feature-icon {
        transform: scale(1.1);
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        color: var(--white);
    }

    .feature-item h4 {
        font-size: clamp(1.1rem, 1.5vw, 1.25rem);
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--gray-800);
    }

    .feature-item p {
        line-height: 1.6;
        color: var(--gray-600);
        font-size: clamp(0.9rem, 1.2vw, 1rem);
    }

    /* =========================
       CTA SECTION
       ========================= */
    .cta-section {
        padding: clamp(60px, 8vw, 100px) 0;
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
        margin: 0 auto clamp(2rem, 3vw, 2.5rem);
        max-width: 600px;
        opacity: 0.9;
        color: var(--white);
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
    @media (min-width: 1024px) {
        .services-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }
        
        .service-card {
            min-height: 360px;
        }
    }

    @media (max-width: 1024px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
        }

        .floating-cards {
            width: clamp(180px, 25vw, 250px);
            height: clamp(180px, 25vw, 250px);
        }
        
        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 260px), 1fr));
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
            font-size: clamp(1rem, 1.8vw, 1.2rem);
        }

        .section-title {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.25rem;
            max-width: 400px;
        }

        .service-card {
            padding: 1.25rem;
            min-height: auto;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .cta-content h3 {
            font-size: clamp(1.75rem, 3vw, 2rem);
        }

        .hero-actions {
            justify-content: center;
        }

        .btn {
            padding: 0.75rem 1.25rem;
            min-height: 44px;
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
            font-size: clamp(0.9rem, 1.5vw, 1.1rem);
        }

        .section-title {
            font-size: clamp(1.5rem, 2.5vw, 2rem);
        }

        .service-card {
            padding: 1rem;
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
        
        .card-footer {
            flex-direction: column;
        }
        
        .card-footer .btn {
            width: 100%;
        }
    }

    @media (max-width: 360px) {
        .service-card {
            padding: 0.875rem;
        }
        
        .hero-title {
            font-size: 1.6rem;
        }
        
        .section-title {
            font-size: 1.4rem;
        }
        
        .btn {
            min-height: 42px;
            font-size: 0.8rem;
        }
    }

    /* Improve touch targets on mobile */
    @media (max-width: 768px) {
        .service-card .btn,
        .feature-item,
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