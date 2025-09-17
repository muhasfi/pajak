@extends('layouts.master')

@section('title', 'Checkout - Paham Pajak')

@section('style')
<style>

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

             fetch("{{ route('checkout.store', [], false) }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(async response => {
            let data = await response.json();

            if (response.status === 422) {
                let messages = Object.values(data.errors)
                                    .flat()
                                    .join("\n");
                alert("Validasi gagal:\n" + messages);
                return;
            }

            if (data.status === "error") {
                alert(data.message || "Terjadi kesalahan.");
                return;
            }

            if (data.status === "success") {
                // redirect ke halaman orderPay
                window.location.href = "{{ url('/checkout/order-pay') }}/" + data.order_code;
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