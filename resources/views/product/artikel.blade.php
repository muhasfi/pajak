@extends('layouts.app')

@section('title', 'Artikel Pajak - Paham Pajak')

@section('content')
<!-- Page Header -->
<div class="container-fluid page-header py-5 position-relative" 
     style="background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f') center/cover no-repeat;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

    <div class="position-relative text-center text-white">
        <h1 class="fw-bold display-5">Artikel & Wawasan Pajak</h1>
        <p class="lead mb-0">Insight terkini, panduan, dan tips perpajakan untuk Anda</p>
    </div>
</div>
<!-- End Page Header -->

<!-- Artikel Section -->
<div class="container py-5">
    <div class="row g-4 justify-content-center">
        
        <!-- Artikel 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden hover-shadow transition">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf" 
                         class="img-fluid w-100" alt="Tips Pajak">
                    <span class="badge position-absolute top-0 start-0 m-3 bg-info px-3 py-2 rounded-pill shadow-sm">
                        Artikel
                    </span>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold text-dark mb-2">Tips Mengelola Pajak Usaha Kecil</h5>
                    <p class="text-muted small flex-grow-1">
                        Panduan sederhana untuk UMKM agar tetap patuh pajak tanpa memberatkan operasional bisnis...
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                            Baca Selengkapnya <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        <small class="text-muted">12 Sep 2025</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Artikel 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden hover-shadow transition">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0" 
                         class="img-fluid w-100" alt="Panduan Pajak">
                    <span class="badge position-absolute top-0 start-0 m-3 bg-warning text-dark px-3 py-2 rounded-pill shadow-sm">
                        Panduan
                    </span>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold text-dark mb-2">Panduan E-Filing untuk Wajib Pajak Pribadi</h5>
                    <p class="text-muted small flex-grow-1">
                        Langkah-langkah praktis untuk melaporkan SPT tahunan Anda dengan cepat melalui e-filing...
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                            Baca Selengkapnya <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        <small class="text-muted">5 Sep 2025</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Artikel 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden hover-shadow transition">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1554224155-1696413565d3" 
                         class="img-fluid w-100" alt="Berita Pajak">
                    <span class="badge position-absolute top-0 start-0 m-3 bg-primary px-3 py-2 rounded-pill shadow-sm">
                        Berita
                    </span>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold text-dark mb-2">Update Aturan Baru Pajak Pertambahan Nilai</h5>
                    <p class="text-muted small flex-grow-1">
                        Pemerintah resmi mengubah tarif PPN, berikut dampaknya bagi pelaku usaha dan konsumen...
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                            Baca Selengkapnya <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        <small class="text-muted">1 Sep 2025</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Artikel Section -->
@endsection
