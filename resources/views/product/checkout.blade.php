@extends('layouts.master')

@section('title', 'Checkout - Paham Pajak')

@section('style')
<style>
    :root {
        --primary: #2563eb;
        --primary-light: #3b82f6;
        --primary-dark: #1d4ed8;
        --secondary: #64748b;
        --accent: #f59e0b;
        --light: #f8fafc;
        --dark: #1e293b;
        --success: #10b981;
        --danger: #ef4444;
        --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --radius: 12px;
        --transition: all 0.3s ease;
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
        content: '';
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
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
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

    /* Payment Methods */
    .payment-methods {
        margin: 2rem 0;
    }

    .payment-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .payment-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }

    .payment-option {
        border: 2px solid #e2e8f0;
        border-radius: var(--radius);
        padding: 1.5rem 1rem;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }

    .payment-option:hover {
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    .payment-option.selected {
        border-color: var(--primary);
        background: rgba(37, 99, 235, 0.05);
    }

    .payment-icon {
        font-size: 2rem;
        margin-bottom: 0.8rem;
        color: var(--primary);
    }

    .payment-name {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.3rem;
    }

    .payment-desc {
        font-size: 0.85rem;
        color: var(--secondary);
    }

    .payment-option input[type="radio"] {
        position: absolute;
        opacity: 0;
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
        
        .form-container, .order-summary {
            padding: 2rem;
        }
        
        .payment-options {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .checkout-title {
            font-size: 1.8rem;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
        
        .form-container, .order-summary {
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
                            @php $subTotal = 0; @endphp
                            @foreach (session('cart') as $item)
                                @php
                                    $itemTotal = $item['price'] * $item['qty'];
                                    $subTotal += $itemTotal;
                                @endphp
                                <div class="order-item">
                                    <div class="order-item-image">
                                        <img 
                                            src="{{ asset('img_item_upload/'. $item['image']) }}" 
                                            alt="{{ $item['name'] }}"
                                            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
                                    </div>
                                    <div class="order-item-details">
                                        <div class="order-item-name">{{ $item['name'] }}</div>
                                        <div class="order-item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</div>
                                        <div class="order-item-quantity">Jumlah: {{ $item['qty'] }}</div>
                                    </div>
                                    <div class="order-item-total">
                                        <strong>Rp{{ number_format($itemTotal, 0, ',', '.') }}</strong>
                                    </div>
                                </div>
                            @endforeach
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
                        
                        <!-- Payment Methods -->
                        <div class="payment-methods">
                            <h3 class="payment-title">Metode Pembayaran</h3>
                            <div class="payment-options">
                                <label class="payment-option" id="qris-option">
                                    <input type="radio" name="payment_method" value="qris" required>
                                    <div class="payment-icon">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <div class="payment-name">QRIS</div>
                                    <div class="payment-desc">Bayar dengan QRIS</div>
                                </label>
                                
                                <label class="payment-option" id="cash-option">
                                    <input type="radio" name="payment_method" value="tunai" required>
                                    <div class="payment-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="payment-name">Tunai</div>
                                    <div class="payment-desc">Bayar di tempat</div>
                                </label>
                            </div>
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

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const payButton = document.getElementById("pay-button");
        const form = document.getElementById("checkout-form");
        const paymentOptions = document.querySelectorAll('.payment-option');

        // Style payment options on selection
        paymentOptions.forEach(option => {
            const radio = option.querySelector('input[type="radio"]');
            radio.addEventListener('change', function() {
                paymentOptions.forEach(opt => opt.classList.remove('selected'));
                if (this.checked) {
                    option.classList.add('selected');
                }
            });
        });

        if (!sessionStorage.getItem("cart_saved")) {
            sessionStorage.setItem("cart_saved", "true");
        }

        // Clear cart when leaving page
        window.addEventListener("beforeunload", function (e) {
            if (!window.location.href.includes("checkout")) {
                navigator.sendBeacon("{{ route('cart.clear') }}");
                sessionStorage.removeItem("cart_saved");
            }
        });

        payButton.addEventListener("click", function () {
            let paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            if (!paymentMethod) {
                showNotification("Pilih metode pembayaran terlebih dahulu!", "error");
                return;
            }

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
                showNotification("Harap isi semua field yang wajib diisi!", "error");
                return;
            }

            // Show loading state
            payButton.disabled = true;
            payButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

            let formData = new FormData(form);

            fetch("{{ route('checkout.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(async response => {
                let data = await response.json();

                // Reset button state
                payButton.disabled = false;
                payButton.innerHTML = '<i class="fas fa-credit-card"></i> Konfirmasi Pesanan';

                // Handle validation errors
                if (response.status === 422) {
                    let messages = Object.values(data.errors).flat().join("\n");
                    showNotification("Validasi gagal:\n" + messages, "error");
                    return;
                }

                // Handle other errors
                if (data.status === "error") {
                    showNotification(data.message || "Terjadi kesalahan.", "error");
                    return;
                }

                // Handle success with Midtrans
                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            showNotification("Pembayaran berhasil! Pesanan Anda sedang diproses.", "success");
                            setTimeout(() => {
                                window.location.href = "{{ route('book') }}";
                            }, 2000);
                        },
                        onPending: function(result) {
                            showNotification("Menunggu pembayaran. Silakan selesaikan pembayaran Anda.", "info");
                        },
                        onError: function(result) {
                            showNotification("Pembayaran gagal. Silakan coba lagi.", "error");
                        }
                    });
                }
            })
            .catch(error => {
                console.error("Error:", error);
                payButton.disabled = false;
                payButton.innerHTML = '<i class="fas fa-credit-card"></i> Konfirmasi Pesanan';
                showNotification("Terjadi kesalahan, silakan coba lagi.", "error");
            });
        });

        function showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                color: ${type === 'success' ? '#065f46' : type === 'error' ? '#7f1d1d' : '#1e40af'};
                background: ${type === 'success' ? 'rgba(16, 185, 129, 0.1)' : type === 'error' ? 'rgba(239, 68, 68, 0.1)' : 'rgba(37, 99, 235, 0.1)'};
                border: 1px solid ${type === 'success' ? 'rgba(16, 185, 129, 0.2)' : type === 'error' ? 'rgba(239, 68, 68, 0.2)' : 'rgba(37, 99, 235, 0.2)'};
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                z-index: 10000;
                box-shadow: var(--shadow-lg);
                animation: slideIn 0.3s ease-out;
                max-width: 400px;
            `;
            
            const icon = type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle';
            
            notification.innerHTML = `
                <i class="fas ${icon}"></i>
                <span>${message}</span>
            `;
            
            // Add to body
            document.body.appendChild(notification);
            
            // Remove after 5 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-in';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 5000);
        }
    });

    // Add CSS for notifications
    document.addEventListener('DOMContentLoaded', function() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection