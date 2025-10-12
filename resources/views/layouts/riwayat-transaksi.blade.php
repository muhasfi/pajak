@extends('layouts.master')
@section('title', 'Riwayat Transaksi')
@section('content')
<section class="riwayat-transaksi py-5">
    <div class="container-lg">
        <!-- Header Section -->
        <div class="mb-5">
            <h1 class="display-5 fw-bold text-dark mb-2">Riwayat Transaksi</h1>
            <p class="text-muted fs-6">Kelola dan pantau semua transaksi Anda di sini</p>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-5">
            <div class="col-md-4">
                <div class="stat-card bg-white rounded-3 p-4 shadow-sm border-0 h-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-2 small fw-5">Total Transaksi</p>
                            <h3 class="text-dark fw-bold mb-0">3</h3>
                        </div>
                        <div class="stat-icon bg-primary bg-opacity-10 rounded-3 p-3">
                            <i class="fas fa-list text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card bg-white rounded-3 p-4 shadow-sm border-0 h-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-2 small fw-5">Transaksi Selesai</p>
                            <h3 class="text-success fw-bold mb-0">1</h3>
                        </div>
                        <div class="stat-icon bg-success bg-opacity-10 rounded-3 p-3">
                            <i class="fas fa-check-circle text-success" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card bg-white rounded-3 p-4 shadow-sm border-0 h-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-2 small fw-5">Total Pengeluaran</p>
                            <h3 class="text-dark fw-bold mb-0">Rp 500.000</h3>
                        </div>
                        <div class="stat-icon bg-warning bg-opacity-10 rounded-3 p-3">
                            <i class="fas fa-wallet text-warning" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <input type="text" class="form-control form-control-lg rounded-3 border-2" 
                       placeholder="Cari transaksi..." style="border-color: #e0e0e0;">
            </div>
            <div class="col-md-6">
                <select class="form-select form-select-lg rounded-3 border-2" style="border-color: #e0e0e0;">
                    <option selected>Semua Status</option>
                    <option value="selesai">Selesai</option>
                    <option value="menunggu">Menunggu Pembayaran</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="d-none d-lg-block">
            <div class="card shadow-sm rounded-4 border-0 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="border-bottom">
                                <th scope="col" class="ps-4 fw-bold text-dark text-uppercase small">#</th>
                                <th scope="col" class="fw-bold text-dark text-uppercase small">Tanggal</th>
                                <th scope="col" class="fw-bold text-dark text-uppercase small">Deskripsi</th>
                                <th scope="col" class="text-center fw-bold text-dark text-uppercase small">Status</th>
                                <th scope="col" class="text-end pe-4 fw-bold text-dark text-uppercase small">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom transition-all hover-row">
                                <td class="ps-4">
                                    <span class="badge bg-light text-dark rounded-pill fw-bold">1</span>
                                </td>
                                <td>
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        10 Oktober 2025
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-500 text-dark">Pembelian E-book PPh 21</div>
                                    <small class="text-muted">Kode: TRX001</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success-subtle text-success rounded-pill fw-bold">✓ Selesai</span>
                                </td>
                                <td class="text-end pe-4">
                                    <span class="fw-bold text-dark">Rp 150.000</span>
                                </td>
                            </tr>
                            <tr class="border-bottom transition-all hover-row">
                                <td class="ps-4">
                                    <span class="badge bg-light text-dark rounded-pill fw-bold">2</span>
                                </td>
                                <td>
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        5 Oktober 2025
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-500 text-dark">Kelas Online Pajak UMKM</div>
                                    <small class="text-muted">Kode: TRX002</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-warning-subtle text-warning rounded-pill fw-bold">⏳ Menunggu Pembayaran</span>
                                </td>
                                <td class="text-end pe-4">
                                    <span class="fw-bold text-dark">Rp 250.000</span>
                                </td>
                            </tr>
                            <tr class="transition-all hover-row">
                                <td class="ps-4">
                                    <span class="badge bg-light text-dark rounded-pill fw-bold">3</span>
                                </td>
                                <td>
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        28 September 2025
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-500 text-dark">Konsultasi Pajak Pribadi</div>
                                    <small class="text-muted">Kode: TRX003</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-danger-subtle text-danger rounded-pill fw-bold">✕ Dibatalkan</span>
                                </td>
                                <td class="text-end pe-4">
                                    <span class="fw-bold text-dark">Rp 100.000</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Mobile Card View -->
        <div class="d-lg-none">
            <div class="row g-3">
                <div class="col-12">
                    <div class="transaction-card bg-white rounded-3 p-4 shadow-sm border-0 mb-3">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark rounded-pill fw-bold mb-2 d-inline-block">#1</span>
                                <h6 class="fw-bold text-dark mb-1">Pembelian E-book PPh 21</h6>
                                <small class="text-muted d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-1"></i> 10 Oktober 2025
                                </small>
                            </div>
                            <span class="badge bg-success-subtle text-success rounded-pill fw-bold">✓ Selesai</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <small class="text-muted">Total:</small>
                            <h6 class="fw-bold text-dark mb-0">Rp 150.000</h6>
                        </div>
                    </div>

                    <div class="transaction-card bg-white rounded-3 p-4 shadow-sm border-0 mb-3">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark rounded-pill fw-bold mb-2 d-inline-block">#2</span>
                                <h6 class="fw-bold text-dark mb-1">Kelas Online Pajak UMKM</h6>
                                <small class="text-muted d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-1"></i> 5 Oktober 2025
                                </small>
                            </div>
                            <span class="badge bg-warning-subtle text-warning rounded-pill fw-bold">⏳ Menunggu</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <small class="text-muted">Total:</small>
                            <h6 class="fw-bold text-dark mb-0">Rp 250.000</h6>
                        </div>
                    </div>

                    <div class="transaction-card bg-white rounded-3 p-4 shadow-sm border-0 mb-3">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-light text-dark rounded-pill fw-bold mb-2 d-inline-block">#3</span>
                                <h6 class="fw-bold text-dark mb-1">Konsultasi Pajak Pribadi</h6>
                                <small class="text-muted d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-1"></i> 28 September 2025
                                </small>
                            </div>
                            <span class="badge bg-danger-subtle text-danger rounded-pill fw-bold">✕ Dibatalkan</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <small class="text-muted">Total:</small>
                            <h6 class="fw-bold text-dark mb-0">Rp 100.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link rounded-2" href="#" tabindex="-1">Sebelumnya</a>
                </li>
                <li class="page-item active">
                    <a class="page-link rounded-2" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-2" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-2" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-2" href="#">Selanjutnya</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection

@push('styles')
<style>
:root {
    --primary-color: #0d6efd;
    --success-color: #198754;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --light-bg: #f8fafc;
    --card-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    --card-shadow-hover: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.riwayat-transaksi {
    background: linear-gradient(135deg, #f8fafc 0%, #f0f4f8 100%);
    min-height: 100vh;
}

.stat-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--card-shadow-hover);
}

.stat-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    transition: transform 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1);
}

.table {
    font-size: 0.95rem;
}

.table thead th {
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.85rem;
    padding: 1.25rem 1rem;
    background-color: #f8fafc;
    color: #495057;
    border-color: #e9ecef;
}

.table tbody td {
    padding: 1.25rem 1rem;
    vertical-align: middle;
    border-color: #e9ecef;
}

.hover-row:hover {
    background-color: #f8f9fa;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.02);
}

.table tbody tr {
    transition: all 0.3s ease;
}

.badge {
    padding: 0.5rem 0.875rem;
    font-size: 0.85rem;
    font-weight: 600;
    letter-spacing: 0.3px;
}

.bg-success-subtle {
    background-color: #d1e7dd !important;
}

.bg-warning-subtle {
    background-color: #fff3cd !important;
}

.bg-danger-subtle {
    background-color: #f8d7da !important;
}

.text-success {
    color: #198754 !important;
}

.text-warning {
    color: #664d03 !important;
}

.text-danger {
    color: #842029 !important;
}

.form-control, .form-select {
    border-color: #e9ecef;
    background-color: #fff;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
    background-color: #fff;
}

.form-control-lg, .form-select-lg {
    padding: 0.75rem 1.25rem;
    font-size: 0.95rem;
}

.transaction-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.transaction-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--card-shadow-hover);
    border-color: rgba(13, 110, 253, 0.1);
}

.card {
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.page-link {
    color: var(--primary-color);
    border-color: #e9ecef;
    transition: all 0.3s ease;
}

.page-link:hover:not(.disabled) {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: #fff;
    transform: translateY(-2px);
}

.page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.pagination .page-link {
    padding: 0.5rem 0.875rem;
}

.fw-5 {
    font-weight: 500;
}

.fw-bold {
    font-weight: 700;
}

.transition-all {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .riwayat-transaksi h1 {
        font-size: 2rem;
    }
    
    .stat-card {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .riwayat-transaksi {
        padding: 1.5rem 0;
    }
    
    .riwayat-transaksi h1 {
        font-size: 1.5rem;
    }
    
    .riwayat-transaksi > div > p {
        font-size: 0.85rem;
    }
    
    .form-control, .form-select {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
    
    .transaction-card {
        margin-bottom: 1rem;
    }
    
    .badge {
        font-size: 0.75rem;
        padding: 0.375rem 0.625rem;
    }
    
    .container-lg {
        padding-left: 1rem;
        padding-right: 1rem;
    }
}
</style>
@endpush