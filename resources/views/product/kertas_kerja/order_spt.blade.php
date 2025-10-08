@extends('layouts.master')

@section('title', 'Checkout - Kertas Kerja PPN - Paham Pajak')

@section('style')
    <style>
                :root {
            --primary-blue: #2563eb;
            --secondary-blue: #1d4ed8;
            --dark-blue: #1e40af;
            --light-blue: #dbeafe;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-800: #1e293b;
            --gray-600: #475569;
            --gray-400: #94a3b8;
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
        }

        .checkout-header {
            background: var(--gradient-primary);
            color: white;
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .checkout-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .checkout-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
            color: white;
        }

        .checkout-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .checkout-container {
            padding: 3rem 0;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        /* Form Styles */
        .form-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-label sup {
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Order Summary */
        .order-summary {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2.5rem;
            position: sticky;
            top: 2rem;
        }

        .summary-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .order-items {
            margin-bottom: 2rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item-image {
            width: 70px;
            height: 70px;
            border-radius: var(--radius);
            overflow: hidden;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .order-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-item-details {
            flex-grow: 1;
        }

        .order-item-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.3rem;
        }

        .order-item-price {
            color: var(--primary);
            font-weight: 600;
        }

        .order-item-quantity {
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .order-item-total {
            font-weight: 700;
            color: var(--dark);
        }

        .summary-details {
            margin-bottom: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;
        }

        .summary-label {
            color: var(--secondary);
        }

        .summary-value {
            font-weight: 600;
            color: var(--dark);
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f1f5f9;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .total-label {
            color: var(--dark);
        }

        .total-value {
            color: var(--primary);
        }

        /* Checkout Button */
        .checkout-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .checkout-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .checkout-btn:disabled {
            background: #cbd5e1;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .text-primary {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .text-primary:hover {
            color: var(--primary-dark);
        }

        .text-center {
            text-align: center;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .me-1 {
            margin-right: 0.25rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .checkout-title {
                font-size: 2.3rem;
            }

            .order-summary {
                position: static;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .checkout-header {
                padding: 3rem 0;
            }

            .checkout-title {
                font-size: 2rem;
            }

            .checkout-subtitle {
                font-size: 1.1rem;
            }

            .form-container,
            .order-summary {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .checkout-title {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .form-container,
            .order-summary {
                padding: 1.5rem;
            }

            .order-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-item-image {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Checkout Header -->
    <section class="checkout-header">
        <div class="container">
            <h1 class="checkout-title animate-fade-in">Checkout</h1>
            <p class="checkout-subtitle animate-fade-in delay-100">Silakan isi detail pemesanan Anda dengan lengkap dan benar</p>
        </div>
    </section>

    <!-- Checkout Content -->
    <section class="checkout-container">
        <div class="container">
            <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Customer Information -->
                    <div class="col-lg-7">
                        <div class="form-container animate-fade-in">
                            <h2 class="section-title">Informasi Pelanggan</h2>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap <sup>*</sup></label>
                                        <input type="text" name="fullname" class="form-control" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nomor WhatsApp <sup>*</sup></label>
                                        <input type="text" name="phone" class="form-control" placeholder="Contoh: 081234567890" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email <sup>*</sup></label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan alamat email" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Catatan Pesanan (Opsional)</label>
                                <textarea name="note" class="form-control form-textarea" placeholder="Contoh: Warna tertentu, ukuran khusus, atau instruksi pengiriman"></textarea>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="form-container animate-fade-in delay-100">
                            <h2 class="section-title">Detail Pesanan</h2>

                            <div class="order-items">
                                @php 
                                    $subTotal = 250000; // Harga produk Kertas Kerja PPN
                                @endphp
                                <div class="order-item">
                                    <div class="order-item-image">
                                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Kertas Kerja PPN">
                                    </div>
                                    <div class="order-item-details">
                                        <div class="order-item-name">Kertas Kerja PPN - Paket Lengkap</div>
                                        <div class="order-item-price">Rp{{ number_format($subTotal, 0, ',', '.') }}</div>
                                        <div class="order-item-quantity">Jumlah: 1</div>
                                    </div>
                                    <div class="order-item-total">
                                        <strong>Rp{{ number_format($subTotal, 0, ',', '.') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary & Payment -->
                    <div class="col-lg-5">
                        <div class="order-summary animate-fade-in delay-200">
                            <h2 class="summary-title">Ringkasan Pesanan</h2>

                            <div class="summary-details">
                                <div class="summary-row">
                                    <span class="summary-label">Subtotal</span>
                                    <span class="summary-value">Rp{{ number_format($subTotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="summary-row">
                                    <span class="summary-label">Pajak (10%)</span>
                                    <span class="summary-value">Rp{{ number_format($subTotal * 0.1, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="summary-total">
                                <span class="total-label">Total</span>
                                <span class="total-value">Rp{{ number_format($subTotal + ($subTotal * 0.1), 0, ',', '.') }}</span>
                            </div>

                            <button type="button" id="pay-button" class="checkout-btn">
                                <i class="fas fa-credit-card"></i> Konfirmasi Pesanan
                            </button>

                            <div class="mt-3 text-center">
                                <a href="{{ route('cart') }}" class="text-primary">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Keranjang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const payButton = document.getElementById("pay-button");
            const form = document.getElementById("checkout-form");

            payButton.addEventListener("click", function() {
                // Validate form
                const requiredFields = form.querySelectorAll('[required]');
                let valid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        valid = false;
                        field.style.borderColor = '#ef4444';
                    } else {
                        field.style.borderColor = '#e2e8f0';
                    }
                });

                if (!valid) {
                    alert("Harap isi semua field yang wajib diisi!");
                    return;
                }

                // Show loading state
                payButton.disabled = true;
                payButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

                // Submit form
                form.submit();
            });
        });
    </script>
@endsection