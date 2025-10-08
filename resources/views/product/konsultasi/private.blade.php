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
        font-size: 2.5rem;
    }

    .consultation-page h2 {
        font-size: 2rem;
    }

    .consultation-page h3 {
        font-size: 1.75rem;
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
        padding: 4rem 0;
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
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .hero-icon {
        font-size: 5rem;
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
    }

    /* ===== CONSULTATION CARDS ===== */
    .consultation-cards {
        padding: 2rem 0;
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
        padding: 1.5rem;
        border-bottom: none;
        text-align: center;
        position: relative;
    }

    .card-header h3 {
        margin-bottom: 0;
        color: var(--white);
    }

    .popular-badge {
        position: absolute;
        top: -10px;
        right: 20px;
        background-color: var(--warning);
        color: var(--white);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        box-shadow: 0 4px 10px rgba(255, 158, 0, 0.3);
    }

    .card-body {
        padding: 2.5rem;
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
    }

    .duration-badge i {
        margin-right: 0.5rem;
    }

    .price {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary);
        margin: 1rem 0;
    }

    .price-period {
        font-size: 1rem;
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
    }

    .btn-consult:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 15px rgba(67, 97, 238, 0.4);
        color: var(--white);
    }

    /* ===== HOW IT WORKS ===== */
    .how-it-works {
        padding: 4rem 0;
        background-color: var(--white);
    }

    .consultation-steps {
        background-color: var(--white);
        border-radius: var(--radius);
        padding: 3rem;
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
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin-right: 1.5rem;
        flex-shrink: 0;
        font-size: 1.2rem;
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
    }

    .step-content h4 {
        margin-bottom: 0.75rem;
        color: var(--primary);
    }

    .step-content p {
        color: var(--dark-gray);
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        padding: 4rem 0;
        background-color: #f5f7fb;
    }

    .testimonial-card {
        background-color: var(--white);
        border-radius: var(--radius);
        padding: 3rem;
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
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-weight: 700;
        margin-right: 1rem;
        font-size: 1.2rem;
    }

    .testimonial-info h5 {
        margin-bottom: 0.25rem;
    }

    .testimonial-info p {
        margin-bottom: 0;
        color: var(--gray);
    }

    /* ===== FAQ SECTION ===== */
    .faq-section {
        padding: 4rem 0;
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
    }

    /* ===== CTA SECTION ===== */
    .cta-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: var(--white);
        text-align: center;
        border-radius: 30px 30px 0 0;
    }

    .cta-section h2 {
        color: var(--white);
        margin-bottom: 1.5rem;
    }

    .cta-section p {
        font-size: 1.2rem;
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
    @media (max-width: 992px) {
        .consultation-page h1 {
            font-size: 2.2rem;
        }
        
        .consultation-page h2 {
            font-size: 1.8rem;
        }
        
        .consultation-hero {
            padding: 3rem 0;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .step-item {
            margin-bottom: 2rem;
        }
    }

    @media (max-width: 768px) {
        .consultation-page h1 {
            font-size: 2rem;
        }
        
        .consultation-page h2 {
            font-size: 1.6rem;
        }
        
        .consultation-hero {
            text-align: center;
            padding: 2.5rem 0;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .consultation-steps,
        .testimonial-card {
            padding: 2rem;
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
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .consultation-page h1 {
            font-size: 1.8rem;
        }
        
        .consultation-hero {
            padding: 2rem 0;
        }
        
        .card-body {
            padding: 1.25rem;
        }
        
        .consultation-steps,
        .testimonial-card {
            padding: 1.5rem;
        }
        
        .price {
            font-size: 2rem;
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
            <div class="row">
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-consultation fade-in">
                        <div class="card-header">
                            <h3>Konsultasi Singkat</h3>
                        </div>
                        <div class="card-body">
                            <span class="duration-badge"><i class="far fa-clock"></i>30 Menit</span>
                            <p class="price">Rp 150.000</p>
                            <p>Konsultasi singkat untuk pertanyaan hukum yang spesifik dan langsung ke inti permasalahan.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Analisis kasus awal</li>
                                <li><i class="fas fa-check"></i> Saran hukum dasar</li>
                                <li><i class="fas fa-check"></i> Rekomendasi langkah selanjutnya</li>
                                <li class="disabled"><i class="fas fa-times"></i> Review dokumen</li>
                                <li class="disabled"><i class="fas fa-times"></i> Konsultasi lanjutan</li>
                            </ul>
                            <button class="btn btn-consult">Pilih Paket Ini</button>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-consultation fade-in delay-1">
                        <div class="card-header">
                            <span class="popular-badge">Paling Populer</span>
                            <h3>Konsultasi Standar</h3>
                        </div>
                        <div class="card-body">
                            <span class="duration-badge"><i class="far fa-clock"></i>60 Menit</span>
                            <p class="price">Rp 250.000</p>
                            <p>Konsultasi komprehensif untuk analisis mendalam dan solusi terstruktur.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Analisis mendalam kasus</li>
                                <li><i class="fas fa-check"></i> Strategi penyelesaian</li>
                                <li><i class="fas fa-check"></i> Review dokumen (maks. 5 halaman)</li>
                                <li><i class="fas fa-check"></i> Rekomendasi ahli jika diperlukan</li>
                                <li class="disabled"><i class="fas fa-times"></i> Konsultasi lanjutan</li>
                            </ul>
                            <button class="btn btn-consult">Pilih Paket Ini</button>
                        </div>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-consultation fade-in delay-2">
                        <div class="card-header">
                            <h3>Konsultasi Premium</h3>
                        </div>
                        <div class="card-body">
                            <span class="duration-badge"><i class="far fa-clock"></i>120 Menit</span>
                            <p class="price">Rp 450.000</p>
                            <p>Konsultasi mendalam dengan analisis komprehensif dan rencana tindakan detail.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Analisis komprehensif</li>
                                <li><i class="fas fa-check"></i> Strategi penyelesaian terperinci</li>
                                <li><i class="fas fa-check"></i> Review dokumen lengkap</li>
                                <li><i class="fas fa-check"></i> Konsultasi lanjutan 1x (30 menit)</li>
                                <li><i class="fas fa-check"></i> Akses ke template dokumen hukum</li>
                            </ul>
                            <button class="btn btn-consult">Pilih Paket Ini</button>
                        </div>
                    </div>
                </div>
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi scroll untuk elemen
        const fadeElements = document.querySelectorAll('.fade-in');
        
        const fadeInOnScroll = function() {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.style.opacity = 1;
                    element.style.transform = 'translateY(0)';
                }
            });
        };
        
        // Set initial state
        fadeElements.forEach(element => {
            element.style.opacity = 0;
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        });
        
        // Check on load
        fadeInOnScroll();
        
        // Check on scroll
        window.addEventListener('scroll', fadeInOnScroll);
        
        // Button click handlers
        const consultButtons = document.querySelectorAll('.btn-consult');
        consultButtons.forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.card-consultation');
                const packageName = card.querySelector('.card-header h3').textContent;
                const duration = card.querySelector('.duration-badge').textContent;
                const price = card.querySelector('.price').textContent;
                
                alert(`Anda memilih: ${packageName}\n${duration}\n${price}\n\nAnda akan diarahkan ke halaman pemesanan.`);
                // Di sini biasanya akan diarahkan ke halaman checkout/pemesanan
            });
        });
        
        const ctaButton = document.querySelector('.btn-cta');
        ctaButton.addEventListener('click', function() {
            // Scroll to consultation cards
            document.querySelector('.consultation-cards').scrollIntoView({ 
                behavior: 'smooth' 
            });
        });
    });
</script>
@endsection