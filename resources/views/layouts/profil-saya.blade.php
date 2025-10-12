@extends('layouts.master')

@section('title', 'Profil Saya')

@section('content')
<section class="profil-saya py-5">
    <div class="container">
        <!-- Header Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold mb-2" style="color: #2c3e50;">Profil Saya</h1>
                <div class="d-flex justify-content-center">
                    <div style="width: 80px; height: 4px; background: linear-gradient(90deg, #4e73df, #1cc88a); border-radius: 2px;"></div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <!-- Card Profil -->
                <div class="card shadow-lg border-0 rounded-5 overflow-hidden profile-card">
                    
                    <!-- Header Gradient -->
                    <div class="card-header border-0 py-0" style="background: linear-gradient(135deg, #4e73df 0%, #1cc88a 100%); position: relative; padding-bottom: 60px;">
                        
                        <!-- Decorative Circles -->
                        <div style="position: absolute; width: 200px; height: 200px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; top: -50px; right: -50px;"></div>
                        <div style="position: absolute; width: 150px; height: 150px; background: rgba(255, 255, 255, 0.08); border-radius: 50%; bottom: -30px; left: -30px;"></div>

                        <div class="position-relative pt-4 pb-0 text-center z-3">
                            <div class="profile-photo mb-4">
                                <div style="display: inline-block; position: relative;">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
                                         alt="Foto Profil" 
                                         class="rounded-circle shadow-lg" 
                                         width="140" height="140"
                                         style="border: 6px solid white; object-fit: cover;">
                                    <div style="position: absolute; bottom: 0; right: 0; width: 40px; height: 40px; background: #1cc88a; border-radius: 50%; border: 4px solid white; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-check text-white" style="font-size: 18px;"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mb-2 text-white fw-bold">Stanley Chen Ho</h3>
                            <p class="text-white-50 mb-0" style="font-size: 0.95rem;">stanleychen@example.com</p>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-3 p-sm-4 p-md-4">
                        
                        <!-- Info Grid -->
                        <div class="row g-2 g-md-3 mb-4">
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="info-box p-3 rounded-4 h-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%); border-left: 4px solid #4e73df;">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-user me-2" style="color: #4e73df; font-size: 1.2rem;"></i>
                                        <h6 class="fw-bold text-muted text-uppercase mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Nama Lengkap</h6>
                                    </div>
                                    <p class="mb-0 fw-semibold text-dark" style="font-size: 0.95rem; margin-left: 1.8rem;">Stanley Chen Ho</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="info-box p-3 rounded-4 h-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%); border-left: 4px solid #1cc88a;">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-envelope me-2" style="color: #1cc88a; font-size: 1.2rem;"></i>
                                        <h6 class="fw-bold text-muted text-uppercase mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Email</h6>
                                    </div>
                                    <p class="mb-0 fw-semibold text-dark" style="font-size: 0.95rem; margin-left: 1.8rem;">stanleychen@example.com</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="info-box p-3 rounded-4 h-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%); border-left: 4px solid #36b9cc;">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-phone me-2" style="color: #36b9cc; font-size: 1.2rem;"></i>
                                        <h6 class="fw-bold text-muted text-uppercase mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Nomor Telepon</h6>
                                    </div>
                                    <p class="mb-0 fw-semibold text-dark" style="font-size: 0.95rem; margin-left: 1.8rem;">+62 812 3456 7890</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6">
                                <div class="info-box p-3 rounded-4 h-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%); border-left: 4px solid #f6c23e;">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-map-marker-alt me-2" style="color: #f6c23e; font-size: 1.2rem;"></i>
                                        <h6 class="fw-bold text-muted text-uppercase mb-0" style="font-size: 0.7rem; letter-spacing: 1px;">Alamat</h6>
                                    </div>
                                    <p class="mb-0 fw-semibold text-dark" style="font-size: 0.95rem; margin-left: 1.8rem;">Jl. Melati No. 10, Jakarta</p>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div style="height: 1px; background: linear-gradient(90deg, transparent, #dee2e6, transparent); margin: 2rem 0;"></div>

                        <!-- Action Buttons -->
                        <div class="d-grid gap-2 gap-md-3 d-md-flex justify-content-center">
                            <a href="#" class="btn btn-gradient px-4 py-2 rounded-pill shadow-sm fw-semibold text-white" style="background: linear-gradient(135deg, #4e73df, #224abe); border: none; transition: all 0.3s ease;">
                                <i class="fas fa-edit me-2"></i> Edit Profil
                            </a>
                            <a href="#" class="btn btn-outline-danger px-4 py-2 rounded-pill fw-semibold" style="border-width: 2px; transition: all 0.3s ease;">
                                <i class="fas fa-sign-out-alt me-2"></i> Keluar
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Background */
.profil-saya {
    background: linear-gradient(135deg, #f8fafc 0%, #f0f4ff 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

/* Card Styling */
.profile-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.profile-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 30px 60px rgba(78, 115, 223, 0.15) !important;
}

/* Foto profil */
.profile-photo img {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    object-fit: cover;
}

.profile-photo img:hover {
    transform: scale(1.08) rotate(2deg);
    filter: brightness(1.1);
}

/* Info Box */
.info-box {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.info-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.info-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
}

.info-box:hover::before {
    left: 100%;
}

/* Buttons */
.btn-gradient {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(78, 115, 223, 0.4) !important;
}

.btn-outline-danger {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    color: #dc3545;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .profil-saya {
        padding: 1.5rem 0;
    }

    .display-5 {
        font-size: 2rem;
    }

    .card-body {
        padding: 1rem !important;
    }

    .profile-photo img {
        width: 120px !important;
        height: 120px !important;
    }

    .info-box {
        text-align: left;
        padding: 0.75rem !important;
    }

    .info-box h6 {
        font-size: 0.65rem !important;
    }

    .info-box p {
        font-size: 0.85rem !important;
    }

    .info-box i {
        font-size: 1rem !important;
    }

    .btn-gradient, .btn-outline-danger {
        font-size: 0.9rem;
        padding: 0.5rem 1.2rem !important;
    }

    .d-md-flex {
        flex-direction: column !important;
    }

    .d-md-flex .btn {
        margin: 0.3rem 0;
    }
}

@media (max-width: 576px) {
    .display-5 {
        font-size: 1.5rem;
    }

    .card {
        margin: 0 -1rem;
        border-radius: 1.5rem !important;
    }

    .card-body {
        padding: 0.75rem !important;
    }

    .profile-photo img {
        width: 100px !important;
        height: 100px !important;
    }

    .info-box {
        padding: 0.6rem !important;
        text-align: left;
    }

    .info-box h6 {
        font-size: 0.6rem !important;
    }

    .info-box p {
        font-size: 0.8rem !important;
        margin-left: 1.5rem !important;
    }

    .info-box i {
        font-size: 0.95rem !important;
    }

    h3 {
        font-size: 1.3rem !important;
    }

    .row g-2 {
        gap: 0.5rem !important;
    }
}

/* Smooth animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.profile-card {
    animation: fadeInUp 0.6s ease-out;
}

.info-box {
    animation: fadeInUp 0.6s ease-out forwards;
}

.info-box:nth-child(1) { animation-delay: 0.1s; }
.info-box:nth-child(2) { animation-delay: 0.2s; }
.info-box:nth-child(3) { animation-delay: 0.3s; }
.info-box:nth-child(4) { animation-delay: 0.4s; }
</style>
@endpush