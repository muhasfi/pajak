@extends('layouts.master')

@section('title', $layanan->judul)

@section('style')
<style>
    :root {
<<<<<<< HEAD
        --primary: #7c3aed;
        --primary-light: #8b5cf6;
        --primary-dark: #6d28d9;
=======
        --primary: #2563eb;
        --primary-light: #3b82f6;
        --primary-dark: #1d4ed8;
>>>>>>> 282c7f73993900f518e507fc512fa517ac6cb2d8
        --secondary: #64748b;
        --accent: #f59e0b;
        --success: #059669;
        --danger: #dc2626;
        --warning: #d97706;
        --info: #0891b2;
        --light: #f8fafc;
        --light-gray: #f1f5f9;
        --dark: #1e293b;
        --dark-gray: #475569;
        --white: #ffffff;
        
        --gradient-primary: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        --gradient-success: linear-gradient(135deg, #059669 0%, #047857 100%);
        --gradient-warning: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        
        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.08), 0 4px 6px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.04);
        
        --radius-sm: 8px;
        --radius: 12px;
        --radius-lg: 16px;
        --radius-xl: 20px;
        
        --transition: all 0.3s ease;
    }

    .litigation-service-section {
        padding: 1rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
    }

    .breadcrumb-nav {
        margin-bottom: 1.5rem;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
        font-size: 0.875rem;
    }

    .breadcrumb-item a {
        color: var(--secondary);
        text-decoration: none;
        transition: var(--transition);
    }

    .breadcrumb-item a:hover {
        color: var(--primary);
    }

    .breadcrumb-item.active {
        color: var(--dark);
        font-weight: 600;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 1rem;
        line-height: 1.3;
        background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .service-main-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        margin-bottom: 2rem;
        border: 1px solid rgba(124, 58, 237, 0.1);
    }

    .image-container {
        position: relative;
        height: 300px;
        overflow: hidden;
        background: var(--light-gray);
    }

    .service-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .image-container:hover .service-image {
        transform: scale(1.05);
    }

    .service-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: var(--gradient-primary);
        color: var(--white);
        z-index: 2;
        box-shadow: var(--shadow-lg);
    }

    .action-sidebar {
        padding: 2rem;
        background: var(--white);
        border-left: 1px solid var(--light-gray);
        height: 100%;
    }

    .price-section {
        text-align: center;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--light) 0%, var(--white) 100%);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(124, 58, 237, 0.1);
        margin-bottom: 1.5rem;
    }

    .price-label {
        font-size: 0.8rem;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .service-price {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .price-period {
        font-size: 0.9rem;
        color: var(--secondary);
    }

    .btn-enroll {
        background: var(--gradient-primary);
        border: none;
        padding: 1rem 2rem;
        border-radius: var(--radius);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: var(--transition);
        color: var(--white);
        text-decoration: none;
        width: 100%;
        font-size: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
    }

    .btn-enroll:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
    }

    .btn-whatsapp {
        background: var(--gradient-success);
        border: none;
        padding: 1rem 2rem;
        border-radius: var(--radius);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: var(--transition);
        color: var(--white);
        text-decoration: none;
        width: 100%;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .btn-whatsapp:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .benefits-list {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
    }

    .benefit-item {
        display: grid;
        grid-template-columns: 20px 1fr;
        gap: 0.75rem;
        align-items: start;
        padding: 0.6rem 0;
        border-bottom: 1px solid var(--light-gray);
    }

    .benefit-item:last-child {
        border-bottom: none;
    }

    .benefit-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--gradient-success);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 0.7rem;
        margin-top: 0.1rem;
    }

    .benefit-item.negative .benefit-icon {
        background: var(--gradient-warning);
    }

    .benefit-text {
        color: var(--dark-gray);
        font-size: 0.9rem;
        font-weight: 500;
        line-height: 1.4;
        padding-right: 0.5rem;
    }

    .info-content {
        padding: 2rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--primary);
    }

    .section-title i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    .description-content {
        color: var(--dark-gray);
        line-height: 1.7;
        font-size: 1rem;
        margin-bottom: 2rem;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .feature-card {
        background: var(--white);
        border-radius: var(--radius);
        padding: 1.5rem;
        box-shadow: var(--shadow);
        border: 1px solid rgba(124, 58, 237, 0.1);
        transition: var(--transition);
    }

    .feature-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius);
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .feature-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .feature-description {
        color: var(--dark-gray);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .services-section {
        margin-top: 2rem;
    }

    .service-item {
        background: var(--white);
        border-radius: var(--radius);
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: var(--shadow);
        border-left: 4px solid var(--primary);
        transition: var(--transition);
    }

    .service-item:hover {
        transform: translateX(5px);
        box-shadow: var(--shadow-lg);
    }

    .service-item-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .service-item-title i {
        color: var(--primary);
    }

    .service-item-description {
        color: var(--dark-gray);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .btn-back {
        background: transparent;
        border: 2px solid var(--secondary);
        color: var(--secondary);
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius);
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
        text-decoration: none;
        font-size: 0.9rem;
        width: 100%;
        justify-content: center;
        margin-top: 1rem;
    }

    .btn-back:hover {
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-1px);
    }

    /* Additional Services Section */
    .additional-services {
        background: var(--light);
        padding: 1.5rem;
        border-radius: var(--radius);
        margin-top: 2rem;
    }

    .additional-services h4 {
        color: var(--dark);
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    /* Animation Styles */
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

    .animate-fade-in {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    /* Tablet Styles (768px and up) */
    @media (min-width: 768px) {
        .litigation-service-section {
            padding: 2rem 0;
        }

        .page-title {
            font-size: 2.25rem;
        }

        .image-container {
            height: 400px;
        }

        .feature-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .btn-back {
            width: auto;
        }
    }

    /* Desktop Styles (992px and up) */
    @media (min-width: 992px) {
        .litigation-service-section {
            padding: 3rem 0;
        }

        .page-title {
            font-size: 2.5rem;
        }

        .image-container {
            height: 500px;
        }

        .action-sidebar {
            position: sticky;
            top: 2rem;
        }

        .feature-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Large Desktop Styles (1200px and up) */
    @media (min-width: 1200px) {
        .page-title {
            font-size: 2.75rem;
        }
    }

    /* Small Mobile Styles (480px and down) */
    @media (max-width: 480px) {
        .litigation-service-section {
            padding: 0.5rem 0;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .image-container {
            height: 250px;
        }

        .action-sidebar,
        .info-content {
            padding: 1.5rem;
        }

        .service-price {
            font-size: 1.75rem;
        }

        .btn-enroll,
        .btn-whatsapp {
            padding: 0.875rem 1.5rem;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
<section class="litigation-service-section">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('litigasi') }}">Layanan Litigasi</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($layanan->judul, 30) }}</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="page-title animate-fade-in">{{ $layanan->judul }}</h1>

        <div class="service-main-card animate-fade-in">
            <div class="row g-0">
                <!-- Main Content -->
                <div class="col-12 col-lg-8">
                    <div class="image-container">
                        @if($layanan->gambar)
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" 
                                 class="service-image" 
                                 alt="{{ $layanan->judul }}"
                                 onerror="this.onerror=null;this.src='{{ asset('assets/customer/images/litigation-service.jpg') }}'">
                        @else
                            <img src="{{ asset('assets/customer/images/litigation-service.jpg') }}" 
                                 class="service-image" 
                                 alt="Layanan Litigasi">
                        @endif
                        <div class="service-badge">
                            Layanan Litigasi
                        </div>
                    </div>

                    <div class="info-content">
                        <!-- Description Section -->
                        <div class="description-section">
                            <h3 class="section-title">
                                <i class="fas fa-info-circle"></i>
                                Deskripsi Layanan
                            </h3>
                            <div class="description-content">
                                {{ $layanan->detail->deskripsi ?? 'Layanan bantuan hukum dan pendampingan litigasi profesional untuk menyelesaikan sengketa hukum secara efektif dan efisien.' }}
                            </div>
                        </div>

                        <!-- Features Grid -->
                        <div class="features-section">
                            <h3 class="section-title">
                                <i class="fas fa-star"></i>
                                Keunggulan Layanan Kami
                            </h3>
                            <div class="feature-grid">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-gavel"></i>
                                    </div>
                                    <h4 class="feature-title">Ahli Hukum</h4>
                                    <p class="feature-description">Didukung oleh tim ahli hukum yang berpengalaman dalam menangani berbagai kasus litigasi</p>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <h4 class="feature-title">Perlindungan Hukum</h4>
                                    <p class="feature-description">Perlindungan hukum maksimal untuk kepentingan dan hak-hak klien</p>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h4 class="feature-title">Strategi Efektif</h4>
                                    <p class="feature-description">Penyusunan strategi hukum yang tepat untuk mencapai hasil terbaik</p>
                                </div>
                            </div>
                        </div>

                        <!-- Benefits Section -->
                        <div class="services-section">
                            <h3 class="section-title">
                                <i class="fas fa-check-circle"></i>
                                Benefit Layanan
                            </h3>
                            
                            @if(!empty($layanan->detail->benefit))
                                @foreach($layanan->detail->benefit as $benefit)
                                    @php
                                        $trimmed = trim($benefit);
                                    @endphp

                                    @if($trimmed !== '')
                                        @php
                                            $isNegative = Str::startsWith($trimmed, '-');
                                            $text = ltrim($trimmed, '+- ');
                                            $benefitClass = $isNegative ? 'negative' : '';
                                        @endphp

<<<<<<< HEAD
                                        <div class="service-item">
                                            <h4 class="service-item-title">
                                                <i class="fas fa-{{ $isNegative ? 'times-circle' : 'check-circle' }}"></i>
                                                {{ $text }}
                                            </h4>
                                        </div>
=======
                                         @if($trimmed !== '')
                                            <div class="service-item">
                                                <h4 class="service-item-title">
                                                    <i class="fas fa-{{ $isNegative ? 'times-circle' : 'check-circle' }} 
                                                            {{ $isNegative ? 'text-danger' : 'text-success' }}"></i>
                                                    {{ $text }}
                                                </h4>
                                            </div>
                                        @endif
>>>>>>> 282c7f73993900f518e507fc512fa517ac6cb2d8
                                    @endif
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-gavel fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Detail benefit layanan litigasi sedang dalam persiapan.</p>
                                </div>
                            @endif
                        </div>

<<<<<<< HEAD
                        <!-- Additional Services -->
                        {{-- <div class="additional-services">
                            <h4>Layanan Tambahan yang Didapatkan</h4>
                            <div class="benefits-list">
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Konsultasi hukum awal secara gratis</span>
                                </div>
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Analisis kasus dan penyusunan strategi</span>
                                </div>
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Pendampingan di pengadilan</span>
                                </div>
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Penyusunan dokumen hukum yang diperlukan</span>
                                </div>
                            </div>
                        </div> --}}

=======
>>>>>>> 282c7f73993900f518e507fc512fa517ac6cb2d8
                        <!-- Back Button -->
                        <div class="text-center mt-4">
                            <a href="{{ route('litigasi') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i>
                                Lihat Layanan Lainnya
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Action Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="action-sidebar">
                        <div class="price-section">
                            <div class="price-label">Investasi Layanan</div>
                            <div class="service-price">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</div>
                            <div class="price-period">{{ $layanan->detail->paket ?? 'Paket Lengkap' }}</div>
                        </div>

                        <button type="button" 
                                class="btn-enroll"
                                onclick="addToCart('{{ $layanan->id }}', 'ItemLitigasi')">
                            <i class="fas fa-shopping-cart"></i>
                            Daftar Layanan
                        </button>

                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20litigasi%20{{ urlencode($layanan->judul) }}" 
                           class="btn-whatsapp"
                           target="_blank">
                            <i class="fab fa-whatsapp"></i>
                            Konsultasi Gratis
                        </a>

                        <div class="benefits-section">
                            <h5 class="fw-semibold mb-3 text-dark">Yang Anda Dapatkan:</h5>
                            <ul class="benefits-list">
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Konsultasi dengan pengacara berpengalaman</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Analisis mendalam terhadap kasus hukum</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Penyusunan strategi litigasi yang tepat</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Pendampingan penuh selama proses hukum</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Representasi di pengadilan dan mediasi</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addToCart(id, type) {
    const button = event.target;
    const originalText = button.innerHTML;
    
    // Show loading state
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
    button.disabled = true;

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
                title: 'Pendaftaran Berhasil!',
                text: data.message,
                timer: 1500,
                showConfirmButton: false,
                background: '#fff',
                iconColor: '#7c3aed'
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
            
            // Reset button
            button.innerHTML = originalText;
            button.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: 'Silakan coba lagi nanti',
            background: '#fff',
            confirmButtonColor: '#7c3aed'
        });
        
        // Reset button
        button.innerHTML = originalText;
        button.disabled = false;
    });
}

// Animation on scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all animated elements
    document.querySelectorAll('.animate-fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        observer.observe(el);
    });

    // Add hover effects for service items
    document.querySelectorAll('.service-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});
</script>
@endsection