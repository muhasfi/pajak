@extends('layouts.app')

@section('title', 'Pilih Kelas - Paham Pajak')

@section('content')
<div class="row">
    <div class="col-12 text-center mb-5">
        <h2 class="fw-bold text-primary">🎓 Pilih Kelas Bimbel Online</h2>
        <p class="text-muted">Pilih program bimbingan sesuai kebutuhan Anda</p>
    </div>
</div>

<div class="row g-4 justify-content-center">
    <!-- Course Card 1 -->
    <div class="col-md-5">
        <div class="card h-100 shadow-sm course-card">
            <div class="card-header bg-gradient-primary border-0 position-relative text-white rounded-top-3 text-center">
                <h5 class="m-0 fw-bold">Dasar Perpajakan</h5>
                <span class="position-absolute top-0 end-0 m-2 badge bg-success shadow-sm">POPULER</span>
            </div>
            <div class="card-body text-center">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="icon-circle bg-primary text-white">
                        <i class="fas fa-calculator fs-5"></i>
                    </div>
                </div>
                <h4 class="card-title mb-1">Bimble A</h4>
                <p class="text-muted mb-3">Program bimbingan untuk pemula</p>
                
                <div class="price-tag mb-3">Rp 299.000</div>
                
                <ul class="list-unstyled text-start d-inline-block mb-4">
                    <li><i class="fas fa-check text-success me-2"></i> 20+ Video Pembelajaran</li>
                    <li><i class="fas fa-check text-success me-2"></i> Materi PDF Lengkap</li>
                    <li><i class="fas fa-check text-success me-2"></i> 5 Set Tryout</li>
                    <li><i class="fas fa-check text-success me-2"></i> Sertifikat Digital</li>
                    <li><i class="fas fa-check text-success me-2"></i> Akses Seumur Hidup</li>
                </ul>
                
                <a href="/payment" class="btn btn-primary w-100 rounded-pill shadow-sm">
                    <i class="fas fa-shopping-cart me-2"></i> Pilih Kelas
                </a>
            </div>
        </div>
    </div>

    <!-- Course Card 2 -->
    <div class="col-md-5">
        <div class="card h-100 shadow-sm course-card">
            <div class="card-header bg-gradient-info border-0 position-relative text-white rounded-top-3 text-center">
                <h5 class="m-0 fw-bold">Perpajakan Lanjut</h5>
                <span class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark shadow-sm">LANJUTAN</span>
            </div>
            <div class="card-body text-center">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="icon-circle bg-info text-white">
                        <i class="fas fa-chart-line fs-5"></i>
                    </div>
                </div>
                <h4 class="card-title mb-1">Bimble B</h4>
                <p class="text-muted mb-3">Program bimbingan tingkat menengah</p>
                
                <div class="price-tag mb-3">Rp 499.000</div>
                
                <ul class="list-unstyled text-start d-inline-block mb-4">
                    <li><i class="fas fa-check text-success me-2"></i> 35+ Video Pembelajaran</li>
                    <li><i class="fas fa-check text-success me-2"></i> Materi PDF + Excel</li>
                    <li><i class="fas fa-check text-success me-2"></i> 10 Set Tryout</li>
                    <li><i class="fas fa-check text-success me-2"></i> Konsultasi 1-on-1</li>
                    <li><i class="fas fa-check text-success me-2"></i> Akses Seumur Hidup</li>
                </ul>
                
                <a href="/payment" class="btn btn-primary w-100 rounded-pill shadow-sm">
                    <i class="fas fa-shopping-cart me-2"></i> Pilih Kelas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.course-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    border: none;
    border-radius: 18px;
}
.course-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12) !important;
}
.bg-gradient-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
}
.bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8, #0d6efd);
}
.icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}
.price-tag {
    font-size: 1.4rem;
    font-weight: bold;
    color: #28a745;
    background: #eafaf0;
    padding: 6px 15px;
    border-radius: 10px;
    display: inline-block;
}
</style>
@endpush
