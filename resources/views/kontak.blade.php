@extends('layouts.master')

@section('title', 'Hubungi Kami - Paham Pajak')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --primary-light: #3b82f6;
        --secondary: #0e7490;
        --accent: #ec4899;
        --light: #f8fafc;
        --dark: #1e293b;
        --success: #10b981;
        --gray: #64748b;
        --gray-light: #e2e8f0;
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        --gradient-accent: linear-gradient(135deg, var(--primary-light) 0%, var(--accent) 100%);
    }

    body {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        background-color: var(--light);
        color: var(--dark);
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-md-4, .col-md-6, .col-lg-8, .col-lg-4, .col-12 {
        padding: 0 15px;
        width: 100%;
    }

    @media (min-width: 768px) {
        .col-md-4 {
            width: 33.333333%;
        }
        .col-md-6 {
            width: 50%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-8 {
            width: 66.666667%;
        }
        .col-lg-4 {
            width: 33.333333%;
        }
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .mt-5 {
        margin-top: 3rem !important;
    }

    .text-center {
        text-align: center !important;
    }

    .d-flex {
        display: flex !important;
    }

    .justify-content-between {
        justify-content: space-between !important;
    }

    .align-items-stretch {
        align-items: stretch !important;
    }

    /* HERO SECTION */
    .contact-hero {
        background: var(--gradient-primary);
        color: white;
        padding: 100px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 40px 40px;
    }
    
    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.5;
    }
    
    .contact-hero h1 {
        font-weight: 800;
        margin-bottom: 16px;
        font-size: 3rem;
        letter-spacing: -0.5px;
        position: relative;
        color: #f8fafc;
    }
    
    .contact-hero p {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
        font-weight: 400;
    }

    /* CONTACT SECTION */
    .contact-section {
        padding: 80px 0;
    }

    /* CONTACT CARDS */
    .contact-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        padding: 40px 30px;
        transition: all 0.4s ease;
        height: 100%;
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--gradient-primary);
        z-index: 2;
    }
    
    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .contact-icon {
        font-size: 2.5rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 20px;
        display: inline-block;
        padding: 15px;
        border-radius: 16px;
        background-color: rgba(37, 99, 235, 0.1);
    }
    
    .contact-card h3 {
        font-weight: 700;
        margin-bottom: 12px;
        font-size: 1.4rem;
        color: var(--dark);
    }
    
    .contact-card p {
        font-size: 1rem;
        margin: 0;
        color: var(--gray);
        line-height: 1.7;
    }

    /* FORM STYLING */
    .contact-form {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        padding: 45px;
        height: 100%;
    }
    
    .contact-form h2 {
        font-weight: 700;
        margin-bottom: 30px;
        font-size: 1.8rem;
        color: var(--dark);
        position: relative;
        padding-bottom: 15px;
    }
    
    .contact-form h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 4px;
        background: var(--gradient-primary);
        border-radius: 2px;
    }
    
    .form-control {
        padding: 16px 20px;
        border-radius: 12px;
        border: 1px solid var(--gray-light);
        margin-bottom: 20px;
        font-size: 1rem;
        transition: all 0.3s;
        background: var(--light);
        width: 100%;
    }
    
    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        outline: none;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .btn-primary {
        background: var(--gradient-primary);
        border: none;
        padding: 16px 32px;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s;
        font-size: 1rem;
        letter-spacing: 0.5px;
        width: 100%;
        margin-top: 10px;
        color: white;
        cursor: pointer;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
    }
    
    .btn-primary:active {
        transform: translateY(0);
    }

    /* CONTACT INFO */
    .contact-info {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        padding: 40px;
        height: 100%;
    }
    
    .contact-info h3 {
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1.4rem;
        color: var(--dark);
        position: relative;
        padding-bottom: 12px;
    }
    
    .contact-info h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: var(--gradient-primary);
        border-radius: 2px;
    }
    
    .contact-info .d-flex {
        border-bottom: 1px solid var(--gray-light);
        padding: 14px 0;
        font-size: 1rem;
    }
    
    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        margin-right: 12px;
        background: var(--light);
        color: var(--primary);
        font-size: 1.2rem;
        border-radius: 12px;
        transition: all 0.3s;
        text-decoration: none;
    }
    
    .social-links a:hover {
        background: var(--gradient-primary);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(37, 99, 235, 0.2);
    }

    /* MAP */
    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        margin-top: 60px;
    }
    
    .map-container iframe {
        display: block;
        width: 100%;
        border: none;
        height: 450px;
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 992px) {
        .contact-hero {
            padding: 80px 0 60px;
            border-radius: 0 0 30px 30px;
        }
        
        .contact-hero h1 {
            font-size: 2.5rem;
        }
        
        .contact-card, .contact-form, .contact-info {
            padding: 30px;
        }
        
        .contact-section {
            padding: 60px 0;
        }
        
    }

    @media (max-width: 768px) {
        .contact-hero {
            padding: 60px 0 50px;
        }
        
        .contact-hero h1 {
            font-size: 2.2rem;
        }
        
        .contact-hero p {
            font-size: 1.1rem;
        }
        
        .contact-card, .contact-form, .contact-info {
            padding: 25px;
        }
        
        
        .map-container iframe {
            height: 350px;
        }
    }

    /* ANIMATIONS */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .contact-card, .contact-form, .contact-info {
        animation: fadeIn 0.6s ease-out;
    }
    
    .contact-card:nth-child(2) { animation-delay: 0.2s; }
    .contact-card:nth-child(3) { animation-delay: 0.4s; }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <h1>Hubungi Kami</h1>
            <p>Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan perpajakan Anda. Tim profesional kami akan memberikan solusi terbaik.</p>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h3>Lokasi Kami</h3>
                        <p>Jl. Pajak Raya No. 123, Jakarta Selatan<br>DKI Jakarta, 12540</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <h3>Telepon</h3>
                        <p>+62 21 1234 5678</p>
                        <p>+62 812 3456 7890</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <h3>Email</h3>
                        <p>info@pahampajak.com</p>
                        <p>support@pahampajak.com</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-stretch">
                <div class="col-lg-8 mb-5">
                    <div class="contact-form h-100">
                        <h2>Kirim Pesan</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Alamat Email" required>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Subjek Pesan" required>
                            <textarea class="form-control" rows="5" placeholder="Pesan Anda" required></textarea>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h3>Jam Operasional</h3>
                        <div class="d-flex justify-content-between"><span>Senin - Jumat</span><span>08:00 - 17:00</span></div>
                        <div class="d-flex justify-content-between"><span>Sabtu</span><span>09:00 - 14:00</span></div>
                        <div class="d-flex justify-content-between"><span>Minggu</span><span>Tutup</span></div>
                        
                        <h3 class="mt-5">Ikuti Kami</h3>
                        <div class="social-links">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6e45e7b3f69b4c84!2sJakarta%20Selatan%2C%20DKI%20Jakarta!5e0!3m2!1sid!2sid!4v16329736!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection