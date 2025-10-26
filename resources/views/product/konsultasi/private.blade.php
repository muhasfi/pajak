@extends('layouts.master')

@section('title', 'Konsultasi Kasus Private - LegalConsult')

@section('style')
<style>
    /* ===== VARIABLES ===== */
    :root {
        --primary: #4361ee;
        --primary-light: #4895ef;
        --primary-dark: #3a0ca3;
        --secondary: #7209b7;
        --accent: #4cc9f0;
        --accent-light: #80ed99;
        --light: #f8f9fa;
        --light-gray: #e9ecef;
        --gray: #adb5bd;
        --dark: #212529;
        --dark-gray: #495057;
        --success: #4bb543;
        --warning: #ff9e00;
        --danger: #e63946;
        --white: #ffffff;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --shadow-hover: 0 15px 35px rgba(0, 0, 0, 0.12);
        --radius: 15px;
        --transition: all 0.3s ease;
    }

    /* ===== GLOBAL STYLES ===== */
    .consultation-page {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fb;
        color: var(--dark);
        line-height: 1.6;
        overflow-x: hidden;
    }

    .consultation-page h1, 
    .consultation-page h2, 
    .consultation-page h3, 
    .consultation-page h4, 
    .consultation-page h5, 
    .consultation-page h6 {
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--dark);
    }

    .consultation-page h1 {
        font-size: clamp(1.8rem, 5vw, 2.5rem);
    }

    .consultation-page h2 {
        font-size: clamp(1.6rem, 4vw, 2rem);
    }

    .consultation-page h3 {
        font-size: clamp(1.4rem, 3.5vw, 1.75rem);
    }

    .consultation-page p {
        margin-bottom: 1rem;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .section-title:after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        margin: 1rem auto;
        border-radius: 2px;
    }

    /* ===== HERO SECTION ===== */
    .consultation-hero {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: var(--white);
        padding: clamp(2rem, 6vw, 4rem) 0;
        border-radius: 0 0 30px 30px;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .consultation-hero:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,192C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        background-position: center;
    }

    .consultation-hero .container {
        position: relative;
        z-index: 1;
    }

    .consultation-hero h1 {
        font-weight: 800;
        margin-bottom: 1.5rem;
        color: var(--white);
    }

    .consultation-hero p {
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .hero-icon {
        font-size: clamp(3rem, 10vw, 5rem);
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .hero-feature {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .hero-feature i {
        margin-right: 0.75rem;
        font-size: 1.2rem;
        min-width: 20px;
    }

    /* ===== CONSULTATION CARDS ===== */
    .consultation-cards {
        padding: clamp(1.5rem, 4vw, 2rem) 0;
    }

    .card-consultation {
        border: none;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        transition: var(--transition);
        overflow: hidden;
        margin-bottom: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-consultation:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover);
    }

    .card-header {
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: var(--white);
        padding: clamp(1rem, 3vw, 1.5rem);
        border-bottom: none;
        text-align: center;
        position: relative;
    }

    .card-header h3 {
        margin-bottom: 0;
        color: var(--white);
        font-size: clamp(1.2rem, 3vw, 1.5rem);
    }

    .card-body {
        padding: clamp(1.25rem, 3vw, 2.5rem);
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .duration-badge {
        background-color: var(--accent);
        color: var(--white);
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        margin-bottom: 1.5rem;
        align-self: flex-start;
        font-size: clamp(0.8rem, 2vw, 0.9rem);
    }

    .duration-badge i {
        margin-right: 0.5rem;
    }

    .price {
        font-size: clamp(1.8rem, 5vw, 2.5rem);
        font-weight: 800;
        color: var(--primary);
        margin: 1rem 0;
    }

    .price-period {
        font-size: clamp(0.8rem, 2vw, 1rem);
        font-weight: 500;
        color: var(--gray);
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
        flex-grow: 1;
    }

    .feature-list li {
        padding: 0.75rem 0;
        display: flex;
        align-items: center;
        border-bottom: 1px solid var(--light-gray);
        font-size: clamp(0.85rem, 2vw, 1rem);
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .feature-list i {
        color: var(--success);
        margin-right: 0.75rem;
        font-size: 1.1rem;
        width: 20px;
        text-align: center;
        flex-shrink: 0;
    }

    .feature-list .disabled {
        color: var(--gray);
    }

    .feature-list .disabled i {
        color: var(--gray);
    }

    .btn-consult {
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: var(--white);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        width: 100%;
        transition: var(--transition);
        margin-top: auto;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .btn-consult:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 15px rgba(67, 97, 238, 0.4);
        color: var(--white);
    }

    /* ===== HOW IT WORKS ===== */
    .how-it-works {
        padding: clamp(2rem, 6vw, 4rem) 0;
        background-color: var(--white);
    }

    .consultation-steps {
        background-color: var(--white);
        border-radius: var(--radius);
        padding: clamp(1.5rem, 4vw, 3rem);
        box-shadow: var(--shadow);
    }

    .step-item {
        display: flex;
        margin-bottom: 2.5rem;
        align-items: flex-start;
    }

    .step-item:last-child {
        margin-bottom: 0;
    }

    .step-number {
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: var(--white);
        width: clamp(40px, 8vw, 50px);
        height: clamp(40px, 8vw, 50px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin-right: 1.5rem;
        flex-shrink: 0;
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
    }

    .step-content h4 {
        margin-bottom: 0.75rem;
        color: var(--primary);
        font-size: clamp(1.1rem, 2.5vw, 1.3rem);
    }

    .step-content p {
        color: var(--dark-gray);
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        padding: clamp(2rem, 6vw, 4rem) 0;
        background-color: #f5f7fb;
    }

    .testimonial-card {
        background-color: var(--white);
        border-radius: var(--radius);
        padding: clamp(1.5rem, 4vw, 3rem);
        box-shadow: var(--shadow);
    }

    .testimonial-item {
        margin-bottom: 2rem;
    }

    .testimonial-text {
        font-style: italic;
        margin-bottom: 1.5rem;
        position: relative;
        padding: 1.5rem;
        background-color: var(--light);
        border-radius: 10px;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .testimonial-text:before {
        content: """;
        font-size: 5rem;
        color: var(--accent);
        opacity: 0.2;
        position: absolute;
        top: -1.5rem;
        left: 0.5rem;
        font-family: Georgia, serif;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
    }

    .testimonial-avatar {
        width: clamp(50px, 10vw, 60px);
        height: clamp(50px, 10vw, 60px);
        border-radius: 50%;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-weight: 700;
        margin-right: 1rem;
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        flex-shrink: 0;
    }

    .testimonial-info h5 {
        margin-bottom: 0.25rem;
        font-size: clamp(1rem, 2.5vw, 1.1rem);
    }

    .testimonial-info p {
        margin-bottom: 0;
        color: var(--gray);
        font-size: clamp(0.85rem, 2vw, 0.9rem);
    }

    /* ===== FAQ SECTION ===== */
    .faq-section {
        padding: clamp(2rem, 6vw, 4rem) 0;
        background-color: var(--white);
    }

    .accordion-item {
        border: none;
        margin-bottom: 1rem;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    .accordion-button {
        background-color: var(--white);
        color: var(--dark);
        font-weight: 600;
        padding: 1.25rem 1.5rem;
        border: none;
        box-shadow: none;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .accordion-button:not(.collapsed) {
        background-color: var(--primary);
        color: var(--white);
    }

    .accordion-button:focus {
        box-shadow: none;
        border: none;
    }

    .accordion-body {
        padding: 1.5rem;
        background-color: var(--light);
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    /* ===== CTA SECTION ===== */
    .cta-section {
        padding: clamp(3rem, 8vw, 5rem) 0;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: var(--white);
        text-align: center;
        border-radius: 30px 30px 0 0;
    }

    .cta-section h2 {
        color: var(--white);
        margin-bottom: 1.5rem;
        font-size: clamp(1.6rem, 4vw, 2.2rem);
    }

    .cta-section p {
        font-size: clamp(1rem, 2.5vw, 1.2rem);
        opacity: 0.9;
        margin-bottom: 2rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-cta {
        background-color: var(--white);
        color: var(--primary);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: var(--transition);
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .btn-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 15px rgba(0, 0, 0, 0.2);
        color: var(--primary-dark);
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.8s ease forwards;
    }

    .delay-1 {
        animation-delay: 0.2s;
    }

    .delay-2 {
        animation-delay: 0.4s;
    }

    .delay-3 {
        animation-delay: 0.6s;
    }

    /* ===== RESPONSIVE STYLES ===== */
    /* Mobile First Approach - Default is for mobile */
    
    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {
        .hero-feature {
            justify-content: flex-start;
        }
        
        .step-item {
            flex-direction: row;
            text-align: left;
        }
        
        .testimonial-author {
            justify-content: flex-start;
        }
    }
    
    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .consultation-hero {
            text-align: left;
        }
        
        .hero-feature {
            justify-content: flex-start;
        }
        
        .step-item {
            margin-bottom: 2.5rem;
        }
        
        .testimonial-item {
            margin-bottom: 0;
        }
    }
    
    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .consultation-hero {
            padding: 4rem 0;
        }
        
        .card-body {
            padding: 2.5rem;
        }
        
        .consultation-steps,
        .testimonial-card {
            padding: 3rem;
        }
    }
    
    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .container {
            max-width: 1140px;
        }
    }
    
    /* Specific fixes for very small screens */
    @media (max-width: 400px) {
        .card-body {
            padding: 1rem;
        }
        
        .consultation-steps,
        .testimonial-card {
            padding: 1rem;
        }
        
        .step-item {
            flex-direction: column;
            text-align: center;
        }
        
        .step-number {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .testimonial-author {
            flex-direction: column;
            text-align: center;
        }
        
        .testimonial-avatar {
            margin-right: 0;
            margin-bottom: 0.5rem;
        }
        
        .hero-feature {
            justify-content: center;
            text-align: center;
        }
    }
    
    /* Fix for landscape orientation on mobile */
    @media (max-height: 500px) and (orientation: landscape) {
        .consultation-hero {
            padding: 1.5rem 0;
        }
        
        .hero-icon {
            margin-bottom: 0.5rem;
        }
    }
    
    /* High DPI screens */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .consultation-hero:before {
            background-size: contain;
        }
    }
</style>
@endsection

@section('content')
<div class="consultation-page">
    <!-- Hero Section -->
    <section class="consultation-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="fade-in">Konsultasi Kasus Secara Private</h1>
                    <p class="fade-in delay-1">Dapatkan solusi hukum yang tepat untuk masalah Anda dengan berkonsultasi langsung dengan ahli hukum berpengalaman. Pilih durasi konsultasi yang sesuai dengan kebutuhan Anda.</p>
                    
                    <div class="hero-feature fade-in delay-2">
                        <i class="fas fa-shield-alt"></i>
                        <span>100% Private & Terjamin Kerahasiaannya</span>
                    </div>
                    <div class="hero-feature fade-in delay-2">
                        <i class="fas fa-clock"></i>
                        <span>Flexible Scheduling - Pilih Waktu yang Tepat untuk Anda</span>
                    </div>
                    <div class="hero-feature fade-in delay-2">
                        <i class="fas fa-user-tie"></i>
                        <span>Ahli Hukum Berpengalaman & Bersertifikat</span>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <i class="fas fa-lock hero-icon fade-in delay-3"></i>
                    <p class="fw-bold fade-in delay-3">Konsultasi Aman & Terenkripsi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation Cards -->
    <section class="consultation-cards">
        <div class="container">
            <h2 class="section-title fade-in">Pilih Paket Konsultasi</h2>

            <div class="row justify-content-center g-4">
    @forelse($layanan as $index => $item)
        @php
            // Jika relasi detail hanya satu (hasOne), tidak perlu ->first()
            $detail = $item->detail;
        @endphp

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-consultation h-100 fade-in 
                {{ $index == 1 ? 'delay-1' : ($index == 2 ? 'delay-2' : '') }}">
                
                <div class="card-header text-center">
                    <h3 class="mb-0">{{ $item->judul }}</h3>
                </div>

                <div class="card-body d-flex flex-column">
                    @if($detail)
                        <div class="text-center mb-3">
                            <span class="duration-badge">
                                <i class="far fa-clock me-1"></i>{{ $detail->waktu_menit }} Menit
                            </span>
                        </div>
                    @endif

                    <div class="text-center mb-3">
                        <p class="price mb-0">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    </div>

                    <p class="text-muted text-center mb-4">
                        {{ strtolower($detail->deskripsi ?? 'Belum ada deskripsi') }}
                    </p>

                    @if($detail && is_array($detail->benefit))
                        <ul class="feature-list flex-grow-1 mb-4">
                            @foreach($detail->benefit as $benefit)
                                @php
                                    $isNegative = Str::startsWith(trim($benefit), '-');
                                    $text = ltrim(trim($benefit), '+- ');
                                @endphp

                                <li>
                                    @if($isNegative)
                                        <i class="fas fa-times text-danger me-2"></i>{{ $text }}
                                    @else
                                        <i class="fas fa-check text-success me-2"></i>{{ $text }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="feature-list flex-grow-1 mb-4">
                            <li class="text-muted">
                                <i class="fas fa-times me-2"></i>Belum ada benefit
                            </li>
                        </ul>
                    @endif

                    <div class="mt-auto">
                        {{-- Gunakan ID dari $item, bukan dari $detail --}}
                        <a href="{{ route('konsultasi.show', $item->id) }}" 
                           class="btn btn-consult w-100 text-center d-block">
                            <span>Pilih Paket Ini</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="text-center py-5">
                <p class="text-muted mb-0">Belum ada layanan konsultasi tersedia saat ini.</p>
            </div>
        </div>
    @endforelse
</div>


        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="container">
            <h2 class="section-title fade-in">Bagaimana Cara Kerjanya?</h2>
            <div class="consultation-steps fade-in">
                <div class="row">
                    <div class="col-md-6">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Pilih Paket Konsultasi</h4>
                                <p>Pilih durasi konsultasi yang sesuai dengan kebutuhan Anda dari pilihan yang tersedia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Jadwalkan Waktu</h4>
                                <p>Tentukan tanggal dan waktu konsultasi yang sesuai dengan jadwal Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Lakukan Pembayaran</h4>
                                <p>Selesaikan pembayaran secara online dengan metode pembayaran yang tersedia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Konsultasi dengan Ahli</h4>
                                <p>Ikuti sesi konsultasi secara online dengan ahli hukum berpengalaman.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title fade-in">Apa Kata Klien Kami?</h2>
            <div class="testimonial-card fade-in">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="testimonial-item">
                            <div class="testimonial-text">
                                "Konsultasi dengan ahli hukum di LegalConsult sangat membantu saya menyelesaikan masalah kontrak bisnis. Penjelasannya jelas dan solusinya tepat."
                            </div>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">AS</div>
                                <div class="testimonial-info">
                                    <h5 class="mb-0">Ahmad Santoso</h5>
                                    <p>Pengusaha</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="testimonial-item">
                            <div class="testimonial-text">
                                "Saya menggunakan paket konsultasi 60 menit dan sangat puas dengan pelayanannya. Ahli hukumnya sangat profesional dan responsif."
                            </div>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">DS</div>
                                <div class="testimonial-info">
                                    <h5 class="mb-0">Dewi Sari</h5>
                                    <p>Karyawan Swasta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title fade-in">Pertanyaan Umum</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion fade-in" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Apakah konsultasi benar-benar private?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, semua konsultasi di LegalConsult 100% private dan terjamin kerahasiaannya. Kami menggunakan enkripsi end-to-end untuk melindungi data dan percakapan Anda.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Bagaimana cara menjadwalkan konsultasi?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Setelah memilih paket konsultasi, Anda akan diarahkan ke halaman penjadwalan dimana Anda dapat memilih tanggal dan waktu yang sesuai dengan ketersediaan ahli hukum.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Apakah bisa membatalkan konsultasi?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, Anda dapat membatalkan konsultasi hingga 24 jam sebelum jadwal yang ditentukan untuk mendapatkan pengembalian dana penuh. Pembatalan dalam waktu 24 jam akan dikenakan biaya administrasi.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="fade-in">Siap Konsultasi dengan Ahli Hukum Kami?</h2>
            <p class="fade-in delay-1">Jangan biarkan masalah hukum mengganggu hidup Anda. Dapatkan solusi yang tepat sekarang juga.</p>
            <button class="btn btn-cta fade-in delay-2">Mulai Konsultasi Sekarang</button>
        </div>
    </section>
</div>
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