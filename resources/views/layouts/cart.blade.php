@extends('layouts.master')
@section('title', 'Keranjang Saya - Paham Pajak')
@section('content')
<section class="cart-section py-4 py-md-5 min-vh-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
    <div class="container-fluid px-3 px-md-4">
        <!-- Header -->
        <div class="mb-4 mb-md-5">
            <h1 class="h3 h2-md fw-bold text-dark mb-2">
                <i class="fas fa-shopping-cart me-2 text-primary"></i>Keranjang Belanja
            </h1>
            <p class="text-muted mb-0">Lihat dan kelola produk yang Anda pilih</p>
        </div>

        <div class="row g-3 g-lg-4">
            <!-- Tabel Keranjang -->
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        @if(($cartItems ?? []) && count($cartItems) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light border-bottom-3">
                                    <tr>
                                        <th class="fw-bold text-dark">Produk</th>
                                        <th class="fw-bold text-dark text-end">Harga</th>
                                        <th class="fw-bold text-dark text-center d-none d-md-table-cell">Qty</th>
                                        <th class="fw-bold text-dark text-end d-none d-md-table-cell">Subtotal</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                    <tr class="border-bottom transition-all hover-shadow" style="transition: all 0.3s ease;">
                                        <!-- Produk Info -->
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative" style="width: 60px; height: 60px; min-width: 60px;">
                                                    <img src="{{ asset('assets/customer/img/product-sample.png') }}"
                                                         alt="{{ $item->nama ?? 'Produk' }}" 
                                                         class="img-fluid rounded-3 w-100 h-100"
                                                         style="object-fit: cover;">
                                                    <span class="badge bg-success position-absolute top-0 end-0">
                                                        <i class="fas fa-check-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-600 text-dark">{{ $item->nama ?? 'Buku USKP Vol.1' }}</h6>
                                                    <small class="text-muted d-block">{{ $item->kategori ?? 'Buku' }}</small>
                                                    <small class="text-primary d-md-none">
                                                        Rp {{ number_format($item->harga ?? 150000, 0, ',', '.') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Harga (Hidden on mobile) -->
                                        <td class="fw-600 text-dark text-end d-none d-md-table-cell">
                                            Rp {{ number_format($item->harga ?? 150000, 0, ',', '.') }}
                                        </td>

                                        <!-- Quantity Input -->
                                        <td class="d-none d-md-table-cell">
                                            <div class="input-group input-group-sm" style="width: 100px;">
                                                <button class="btn btn-outline-secondary btn-sm" type="button">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" class="form-control text-center fw-600"
                                                       value="{{ $item->qty ?? 1 }}" min="1" readonly>
                                                <button class="btn btn-outline-secondary btn-sm" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>

                                        <!-- Subtotal (Hidden on mobile) -->
                                        <td class="fw-700 text-primary text-end d-none d-md-table-cell" style="font-size: 1.1rem;">
                                            Rp {{ number_format(($item->harga ?? 150000) * ($item->qty ?? 1), 0, ',', '.') }}
                                        </td>

                                        <!-- Delete Button -->
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-danger rounded-circle transition-all"
                                                    style="width: 36px; height: 36px; transition: all 0.3s ease;"
                                                    onmouseover="this.classList.add('bg-danger', 'text-white')"
                                                    onmouseout="this.classList.remove('bg-danger', 'text-white')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Mobile View Details -->
                                    <tr class="d-md-none">
                                        <td colspan="5" class="ps-3">
                                            <div class="d-flex justify-content-between align-items-center py-2 mb-2">
                                                <span class="text-muted">Qty:</span>
                                                <div class="input-group input-group-sm" style="width: 90px;">
                                                    <button class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input type="number" class="form-control text-center fw-600"
                                                           value="{{ $item->qty ?? 1 }}" min="1" readonly>
                                                    <button class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center text-primary fw-700">
                                                <span>Subtotal:</span>
                                                <span style="font-size: 1.1rem;">
                                                    Rp {{ number_format(($item->harga ?? 150000) * ($item->qty ?? 1), 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Empty State -->
                        @else
                        <div class="text-center py-5">
                            <div class="mb-4" style="font-size: 4rem; color: #dee2e6;">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <h5 class="text-muted fw-600 mb-2">Keranjang Anda Kosong</h5>
                            <p class="text-muted mb-4">Mulai belanja sekarang dan temukan produk berkualitas dari kami</p>
                            <a href="/" class="btn btn-primary btn-lg rounded-3 px-5">
                                <i class="fas fa-arrow-left me-2"></i>Lanjut Belanja
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-4 sticky-lg-top" style="top: 20px;">
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold text-dark mb-4">
                            <i class="fas fa-receipt me-2 text-primary"></i>Ringkasan Pesanan
                        </h5>

                        <div class="space-y-3">
                            <!-- Subtotal -->
                            <div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-600 text-dark">Rp 450.000</span>
                            </div>

                            <!-- Ongkir -->
                            <div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
                                <span class="text-muted">Ongkir</span>
                                <span class="fw-600 text-dark">Rp 0</span>
                            </div>

                            <!-- Diskon -->
                            <div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
                                <span class="text-muted">Diskon</span>
                                <span class="fw-600 text-success">- Rp 0</span>
                            </div>

                            <!-- Total -->
                            <div class="d-flex justify-content-between align-items-center py-3">
                                <span class="fw-bold text-dark" style="font-size: 1.1rem;">Total</span>
                                <span class="fw-700 text-primary" style="font-size: 1.4rem;">Rp 450.000</span>
                            </div>
                        </div>

                        <!-- Promo Input -->
                        <div class="mt-4">
                            <label class="form-label text-muted small fw-600 mb-2">Kode Promo (Opsional)</label>
                            <div class="input-group">
                                <input type="text" class="form-control rounded-start-3" placeholder="Masukkan kode promo">
                                <button class="btn btn-outline-secondary rounded-end-3" type="button">
                                    <i class="fas fa-tag"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <div class="mt-4">
                            @if(($cartItems ?? []) && count($cartItems) > 0)
                            <a href="/checkout" class="btn btn-success btn-lg w-100 rounded-3 fw-600 shadow-sm transition-all"
                               style="transition: all 0.3s ease;"
                               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 16px rgba(25, 135, 84, 0.3)';"
                               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='';">
                                <i class="fas fa-credit-card me-2"></i>Lanjut ke Checkout
                            </a>
                            @else
                            <button class="btn btn-success btn-lg w-100 rounded-3 fw-600" disabled>
                                <i class="fas fa-credit-card me-2"></i>Lanjut ke Checkout
                            </button>
                            @endif
                        </div>

                        <!-- Continue Shopping -->
                        <a href="/" class="btn btn-outline-secondary btn-sm w-100 rounded-3 mt-3 fw-600">
                            <i class="fas fa-arrow-left me-2"></i>Lanjut Belanja
                        </a>

                        <!-- Info -->
                        <div class="bg-light p-3 rounded-3 mt-4">
                            <small class="text-muted d-block mb-2">
                                <i class="fas fa-info-circle text-primary me-2"></i><strong>Informasi:</strong>
                            </small>
                            <small class="text-muted d-block">
                                Semua harga sudah termasuk pajak. Produk akan dikirim sesuai dengan alamat pengiriman yang Anda daftarkan.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .space-y-3 > * + * {
        margin-top: 1rem;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .border-bottom-3 {
        border-bottom: 3px solid #f0f0f0 !important;
    }

    @media (max-width: 768px) {
        .sticky-lg-top {
            position: static !important;
            margin-top: 1.5rem;
        }
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    input[readonly] {
        background-color: #f8f9fa;
        cursor: not-allowed;
    }
</style>
@endsection