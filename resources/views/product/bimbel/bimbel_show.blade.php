@extends('layouts.master')

@section('title', $bimbel->judul)

@section('style')
<style>
    :root {
        --primary: #6366f1;
        --primary-light: #818cf8;
        --primary-dark: #4f46e5;
        --secondary: #64748b;
        --accent: #f59e0b;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #06b6d4;
        --light: #f8fafc;
        --light-gray: #f1f5f9;
        --dark: #1e293b;
        --dark-gray: #475569;
        --white: #ffffff;
        
        --gradient-primary: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        --gradient-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --gradient-warning: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        --gradient-info: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        
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

    .bimbel-detail-section {
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

    .bimbel-main-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        margin-bottom: 2rem;
        border: 1px solid rgba(99, 102, 241, 0.1);
    }

    .image-container {
        position: relative;
        height: 300px;
        overflow: hidden;
        background: var(--light-gray);
    }

    .bimbel-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .image-container:hover .bimbel-image {
        transform: scale(1.05);
    }

    .bimbel-badge {
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
        border: 1px solid rgba(99, 102, 241, 0.1);
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

    .bimbel-price {
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
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }

    .btn-enroll:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
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
        margin-bottom: 1rem;
    }

    .btn-whatsapp:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .benefits-section {
    margin: 1.5rem 0;
    }
.benefits-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--light-gray);
}

.benefit-item:last-child {
    border-bottom: none;
}

.benefit-icon {
    width: 20px;
    height: 20px;
    min-width: 20px;
    border-radius: 50%;
    background: var(--gradient-success);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 0.7rem;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.benefit-text {
    color: var(--dark-gray);
    font-size: 0.9rem;
    font-weight: 500;
    line-height: 1.4;
    flex: 1;
}

/* Memastikan alignment yang konsisten */
.benefits-list .benefit-item {
    align-items: flex-start;
}

.benefits-list .benefit-icon {
    align-self: flex-start;
    margin-top: 0.125rem;
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
        border: 1px solid rgba(99, 102, 241, 0.1);
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

    .materials-section {
        margin-top: 2rem;
    }

    .material-card {
        background: var(--white);
        border-radius: var(--radius);
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: var(--shadow);
        border-left: 4px solid var(--primary);
        transition: var(--transition);
    }

    .material-card:hover {
        transform: translateX(5px);
        box-shadow: var(--shadow-lg);
    }

    .material-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .material-title i {
        color: var(--primary);
    }

    .material-description {
        color: var(--dark-gray);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .material-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .material-link:hover {
        color: var(--primary-dark);
        transform: translateX(3px);
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
        .bimbel-detail-section {
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
        .bimbel-detail-section {
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
        .bimbel-detail-section {
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

        .bimbel-price {
            font-size: 1.75rem;
        }

        .btn-enroll,
        .btn-whatsapp {
            padding: 0.875rem 1.5rem;
            font-size: 0.9rem;
        }
    }

    /* Utility Classes */
    .text-gradient {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .bg-gradient-light {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    .shadow-custom {
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection

@section('content')
<section class="bimbel-detail-section">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('bimbel.index') }}">Bimbel Online</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($bimbel->judul, 30) }}</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="page-title animate-fade-in">{{ $bimbel->judul }}</h1>

        <div class="bimbel-main-card animate-fade-in">
            <div class="row g-0">
                <!-- Main Content -->
                <div class="col-12 col-lg-8">
                    <div class="image-container">
                        @if($bimbel->gambar)
                            <img src="{{ asset('storage/' . $bimbel->gambar) }}" 
                                 class="bimbel-image" 
                                 alt="{{ $bimbel->judul }}"
                                 onerror="this.onerror=null;this.src='{{ asset('assets/customer/images/placeholder.png') }}'">
                        @else
                            <img src="{{ asset('assets/customer/images/placeholder.png') }}" 
                                 class="bimbel-image" 
                                 alt="Bimbel Online">
                        @endif
                        <div class="bimbel-badge">
                            Bimbel Online
                        </div>
                    </div>

                    <div class="info-content">
                        <!-- Description Section -->
                        <div class="description-section">
                            <h3 class="section-title">
                                <i class="fas fa-graduation-cap"></i>
                                Tentang Program
                            </h3>
                            <div class="description-content">
                                @foreach(explode("\n", $bimbel->deskripsi) as $line)
                                    @php
                                        $trimmed = trim($line);
                                        if ($trimmed === '') continue;
                                        $isPositive = Str::startsWith($trimmed, '+');
                                        $isNegative = Str::startsWith($trimmed, '-');
                                        $text = ltrim($trimmed, '+- ');
                                    @endphp
                                    <div class="d-flex align-items-start mb-3">
                                        @if($isPositive)
                                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                        @elseif($isNegative)
                                            <i class="fas fa-times-circle text-danger me-3 mt-1"></i>
                                        @else
                                            <i class="fas fa-check text-primary me-3 mt-1"></i>
                                        @endif
                                        <span class="flex-grow-1">{{ $text }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Features Grid -->
                        <div class="features-section">
                            <h3 class="section-title">
                                <i class="fas fa-star"></i>
                                Keunggulan Program
                            </h3>
                            <div class="feature-grid">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h4 class="feature-title">Kelas Interaktif</h4>
                                    <p class="feature-description">Belajar dengan sistem kelas online yang interaktif dan mudah dipahami.</p>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h4 class="feature-title">Fleksibel</h4>
                                    <p class="feature-description">Akses materi kapan saja dan di mana saja sesuai waktu belajar Anda.</p>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h4 class="feature-title">Progress Tracking</h4>
                                    <p class="feature-description">Pantau perkembangan belajar dengan sistem tracking yang terintegrasi.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Materials Section -->
                        <div class="materials-section">
                            <h3 class="section-title">
                                <i class="fas fa-book-open"></i>
                                Materi Pembelajaran
                            </h3>
                            
                            @forelse($bimbel->detail as $materi)
                                <div class="material-card">
                                    <h4 class="material-title">
                                        <i class="fas fa-file-alt"></i>
                                        {{ $materi->judul_materi ?? 'Materi Pembelajaran' }}
                                    </h4>
                                    <p class="material-description">
                                        {{ $materi->deskripsi ?? 'Deskripsi materi akan tersedia soon.' }}
                                    </p>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <i class="fas fa-book-reader fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Materi pembelajaran sedang dalam persiapan.</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Back Button -->
                        <div class="text-center mt-4">
                            <a href="{{ route('bimbel.index') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i>
                                Lihat Program Lainnya
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Action Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="action-sidebar">
                        <div class="price-section">
                            <div class="price-label">Investasi Belajar</div>
                            <div class="bimbel-price">Rp {{ number_format($bimbel->harga, 0, ',', '.') }}</div>
                            <div class="price-period">/paket lengkap</div>
                        </div>

                        <button type="button" 
                                class="btn-enroll"
                                onclick="addToCart('{{ $bimbel->id }}', 'ItemBimbel')">
                            <i class="fas fa-shopping-cart"></i>
                            Daftar Sekarang
                        </button>

                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20program%20bimbel%20{{ urlencode($bimbel->judul) }}" 
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
                                    <span class="benefit-text">Akses materi lengkap selama program</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Konsultasi langsung dengan tutor berpengalaman</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Video pembelajaran berkualitas tinggi</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Latihan soal & quiz interaktif</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Sertifikat penyelesaian program</span>
                                </li>
                                <li class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="benefit-text">Group discussion dengan peserta lain</span>
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
                iconColor: '#10b981'
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
            confirmButtonColor: '#6366f1'
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

    // Add hover effects for material cards
    document.querySelectorAll('.material-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});
</script>
@endsection