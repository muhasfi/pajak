@extends('layouts.master')

@section('content')
<style>
    /* Styling untuk halaman pembayaran order */
    .payment-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2.5rem;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .payment-header {
        text-align: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #f0f0f0;
    }

    .payment-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #3498db, #2c3e50);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .payment-subtitle {
        color: #6b7280;
        font-size: 1rem;
        font-weight: 500;
    }

    .order-details {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.75rem;
        margin-bottom: 2rem;
        border: 1px solid #e2e8f0;
    }

    .order-detail-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .order-detail-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .detail-label {
        font-weight: 600;
        color: #4b5563;
        font-size: 0.95rem;
    }

    .detail-value {
        font-weight: 500;
        color: #1f2937;
    }

    .total-amount {
        font-size: 1.5rem;
        font-weight: 700;
        color: #dc2626;
    }

    .status-pending {
        color: #d97706;
        font-weight: 600;
        background: #fef3c7;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
    }

    .status-success {
        color: #059669;
        font-weight: 600;
        background: #d1fae5;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
    }

    .status-failed {
        color: #dc2626;
        font-weight: 600;
        background: #fee2e2;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
    }

    .payment-action {
        text-align: center;
        margin-top: 2.5rem;
    }

    .pay-button {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        border: none;
        padding: 1rem 3rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .pay-button:hover {
        background: linear-gradient(135deg, #059669, #047857);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .pay-button:active {
        transform: translateY(0);
    }

    .payment-info {
        margin-top: 1.5rem;
        text-align: center;
        color: #6b7280;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .payment-security {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        color: #10b981;
        font-size: 0.85rem;
    }

    /* Loading animation */
    .loading-spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .payment-container {
            padding: 1.5rem;
            margin: 1rem;
        }
        
        .payment-title {
            font-size: 1.75rem;
        }
        
        .order-details {
            padding: 1.25rem;
        }
        
        .order-detail-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.25rem;
        }
        
        .pay-button {
            width: 100%;
            padding: 1.25rem;
            justify-content: center;
        }
    }
</style>

<div class="container py-5">
    <div class="payment-container">
        <div class="payment-header">
            <h1 class="payment-title">Pembayaran Pesanan</h1>
            <p class="payment-subtitle">Selesaikan pembayaran untuk melanjutkan</p>
        </div>
        
        <div class="order-details">
            <div class="order-detail-item">
                <span class="detail-label">Kode Pesanan:</span>
                <span class="detail-value">#{{ $order->order_code }}</span>
            </div>
            <div class="order-detail-item">
                <span class="detail-label">Total Pembayaran:</span>
                <span class="detail-value total-amount">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</span>
            </div>
            <div class="order-detail-item">
                <span class="detail-label">Tanggal Pesanan:</span>
                <span class="detail-value">{{ $order->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="order-detail-item">
                <span class="detail-label">Status:</span>
                <span class="detail-value status-{{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span>
            </div>
        </div>
        
        <div class="payment-action">
            <button id="pay-button" class="pay-button">
                <span id="button-text">Bayar Sekarang</span>
                <span id="button-spinner" class="loading-spinner" style="display: none;"></span>
            </button>
            <p class="payment-info">
                Anda akan diarahkan ke halaman pembayaran Midtrans yang aman
            </p>
            <div class="payment-security">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <span>Pembayaran 100% Aman dan Terenkripsi</span>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const payButton = document.getElementById('pay-button');
    const buttonText = document.getElementById('button-text');
    const buttonSpinner = document.getElementById('button-spinner');
    
    function showLoading() {
        buttonText.textContent = 'Memproses...';
        buttonSpinner.style.display = 'inline-block';
        payButton.disabled = true;
    }
    
    function hideLoading() {
        buttonText.textContent = 'Bayar Sekarang';
        buttonSpinner.style.display = 'none';
        payButton.disabled = false;
    }
    
    function processPayment() {
        showLoading();
        
        snap.pay("{{ $order->snap_token }}", {
            onSuccess: function(result) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pembayaran Berhasil!',
                    text: 'Terima kasih atas pembayaran Anda',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#10b981',
                    allowOutsideClick: false
                }).then((result) => {
                    // Redirect ke halaman success dengan orderId
                    window.location.href = "{{ route('book.success', ['orderId' => $order->id]) }}";
                });
            },
            onPending: function(result) {
                hideLoading();
                Swal.fire({
                    icon: 'warning',
                    title: 'Menunggu Pembayaran',
                    text: 'Silakan selesaikan pembayaran Anda',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#f59e0b'
                });
            },
            onError: function(result) {
                hideLoading();
                Swal.fire({
                    icon: 'error',
                    title: 'Pembayaran Gagal',
                    text: 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.',
                    confirmButtonText: 'Coba Lagi',
                    confirmButtonColor: '#dc2626'
                });
            },
            onClose: function() {
                hideLoading();
            }
        });
    }
    
    // Otomatis buka popup pembayaran saat halaman dimuat
    processPayment();
    
    // Event listener untuk tombol bayar (fallback)
    payButton.addEventListener('click', function() {
        processPayment();
    });
    
    // Handle browser back button
    window.addEventListener("popstate", function () {
        window.location.href = "/book";
    });
});
</script>
@endsection