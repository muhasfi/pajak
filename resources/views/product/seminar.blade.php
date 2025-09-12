@extends('layouts.app')

@section('title', 'Katalog Seminar - Paham Pajak')

@section('content')
<div class="row">
    <div class="col-12 text-center mb-5">
        <h2 class="fw-bold text-dark">📌 Katalog Seminar Perpajakan</h2>
        <p class="text-muted">Ikuti seminar perpajakan terbaru dengan pembicara berpengalaman</p>
    </div>
</div>

<div class="row g-4 justify-content-center">
    <!-- Seminar Card 1 -->
    <div class="col-md-5">
        <div class="card h-100 shadow-sm seminar-card text-center">
            <div class="position-relative">
                <img src="/img/about us.jpg" class="card-img-top rounded-top" alt="Seminar Dasar Perpajakan">
                <span class="position-absolute top-0 end-0 m-2 badge bg-success">SEGERA</span>
            </div>
            <div class="card-body">
                <h4 class="card-title mb-3">Seminar Nasional Perpajakan Dasar</h4>
                <p class="mb-1"><i class="fas fa-calendar-alt text-primary me-2"></i> 20 September 2025</p>
                <p class="mb-1"><i class="fas fa-user-tie text-info me-2"></i> Dr. Andi Setiawan, SE., M.Si.</p>
                <p class="text-muted mt-2">Bahas dasar-dasar perpajakan & aturan terbaru untuk wajib pajak pribadi & UMKM.</p>
                
                <div class="text-success fw-bold fs-5 my-3">Rp 150.000</div>
                
                <div class="d-flex justify-content-center gap-2">
                    <a href="/seminar/1" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-info-circle me-1"></i> Detail
                    </a>
                    <a href="/seminar/1/register" class="btn btn-success btn-sm">
                        <i class="fas fa-ticket-alt me-1"></i> Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seminar Card 2 -->
    <div class="col-md-5">
        <div class="card h-100 shadow-sm seminar-card text-center">
            <div class="position-relative">
                <img src="/img/about us.jpg" class="card-img-top rounded-top" alt="Seminar Perpajakan Lanjut">
                <span class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark">POPULER</span>
            </div>
            <div class="card-body">
                <h4 class="card-title mb-3">Seminar Perpajakan Lanjut & Strategi Pajak</h4>
                <p class="mb-1"><i class="fas fa-calendar-alt text-primary me-2"></i> 10 Oktober 2025</p>
                <p class="mb-1"><i class="fas fa-user-tie text-info me-2"></i> Ir. Susi Hartati, Ak., CA.</p>
                <p class="text-muted mt-2">Strategi perencanaan pajak, optimalisasi beban, & studi kasus perusahaan.</p>
                
                <div class="text-success fw-bold fs-5 my-3">Rp 300.000</div>
                
                <div class="d-flex justify-content-center gap-2">
                    <a href="/seminar/2" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-info-circle me-1"></i> Detail
                    </a>
                    <a href="/seminar/2/register" class="btn btn-success btn-sm">
                        <i class="fas fa-ticket-alt me-1"></i> Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.seminar-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border: none;
    border-radius: 15px;
    overflow: hidden;
}
.seminar-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12) !important;
}
.card-img-top {
    height: 160px; /* diperkecil */
    object-fit: cover;
}
.card-title {
    font-size: 1.2rem;
    font-weight: 600;
}
</style>
@endpush
