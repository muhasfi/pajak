@extends('layouts.master')

@section('title', 'Pesanan Berhasil')

@section('content')
<style>
    .success-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 2rem;
    }

    .receipt-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 
            0 10px 40px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(255, 255, 255, 0.8);
        position: relative;
        overflow: hidden;
        margin-top: 2rem;
    }

    .receipt-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981, #3b82f6, #8b5cf6);
    }

    .success-icon {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .success-icon svg {
        width: 80px;
        height: 80px;
        color: #10b981;
        filter: drop-shadow(0 4px 12px rgba(16, 185, 129, 0.3));
    }

    .success-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1f2937;
        text-align: center;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #1f2937, #374151);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .order-code {
        font-size: 1.5rem;
        font-weight: 700;
        color: #3b82f6;
        text-align: center;
        margin: 1rem 0;
        padding: 0.75rem;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 12px;
        border: 2px dashed rgba(59, 130, 246, 0.3);
    }

    .status-badge {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        margin: 0.5rem 0;
    }

    .badge-pending {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
    }

    .badge-waiting {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .badge-success {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #374151;
        margin: 1.5rem 0 1rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f3f4f6;
    }

    .order-items {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .order-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .item-name {
        color: #4b5563;
        font-weight: 500;
        flex: 1;
    }

    .item-quantity {
        color: #6b7280;
        font-size: 0.9rem;
        margin-left: 0.5rem;
    }

    .item-price {
        color: #1f2937;
        font-weight: 600;
        min-width: 100px;
        text-align: right;
    }

    .summary-table {
        width: 100%;
        border-collapse: collapse;
    }

    .summary-row {
        border-bottom: 1px solid #f3f4f6;
    }

    .summary-row:last-child {
        border-bottom: none;
    }

    .summary-label {
        color: #6b7280;
        padding: 0.75rem 0;
        font-weight: 500;
    }

    .summary-value {
        color: #1f2937;
        padding: 0.75rem 0;
        font-weight: 500;
        text-align: right;
    }

    .total-row {
        border-top: 2px solid #e5e7eb;
    }

    .total-label {
        color: #1f2937;
        font-weight: 700;
        padding: 1rem 0 0.5rem 0;
    }

    .total-value {
        color: #dc2626;
        font-weight: 700;
        font-size: 1.2rem;
        padding: 1rem 0 0.5rem 0;
        text-align: right;
    }

    .instruction-box {
        background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
        border: 1px solid #bae6fd;
        border-radius: 12px;
        padding: 1.25rem;
        margin: 1.5rem 0;
        text-align: center;
    }

    .instruction-text {
        color: #0369a1;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0;
    }

    .action-button {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
        border: none;
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        width: 100%;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .action-button:hover {
        background: linear-gradient(135deg, #1d4ed8, #1e40af);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        color: white;
        text-decoration: none;
    }

    .payment-method-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 0.9rem;
        color: #4b5563;
        margin-top: 0.5rem;
    }

    /* Animations */
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

    .receipt-card {
        animation: fadeInUp 0.6s ease-out;
    }

    /* Responsive Design */
    @media (max-width: 576px) {
        .success-container {
            padding: 1rem;
        }
        
        .receipt-card {
            padding: 1.5rem;
            margin-top: 1rem;
        }
        
        .success-title {
            font-size: 1.5rem;
        }
        
        .order-code {
            font-size: 1.25rem;
            padding: 0.5rem;
        }
    }
</style>

<div class="container-fluid py-5">
    <div class="success-container">
        <div class="receipt-card">
            <!-- Success Icon -->
            <div class="success-icon">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>

            <!-- Title -->
            <h1 class="success-title">Pesanan Berhasil Dibuat!</h1>

            <!-- Status Badge -->
            <div class="text-center">
                @if ($order->payment_method == 'tunai' && $order->status == 'pending')
                    <span class="status-badge badge-pending">Menunggu Pembayaran</span>
                @elseif ($order->payment_method == 'qris' && $order->status == 'pending')
                    <span class="status-badge badge-waiting">Menunggu Konfirmasi Pembayaran</span>
                @else
                    <span class="status-badge badge-success">Pembayaran Berhasil</span>
                @endif
            </div>

            <!-- Order Code -->
            <div class="order-code">
                {{ $order->order_code }}
            </div>

            <!-- Payment Method -->
            <div class="text-center">
                <div class="payment-method-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    <span>Metode Pembayaran: {{ strtoupper($order->payment_method) }}</span>
                </div>
            </div>

            <!-- Order Items -->
            <h5 class="section-title">Detail Pesanan</h5>
            <div class="order-items">
                @foreach ($orderItems as $orderItem)
                    <div class="order-item">
                        <div class="item-name">
                            {{ $orderItem->product->name ?? $orderItem->product->judul }}
                            <span class="item-quantity">(x{{ $orderItem->quantity }})</span>
                        </div>
                        <div class="item-price">
                            Rp{{ number_format($orderItem->price, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Order Summary -->
            <h5 class="section-title">Ringkasan Pembayaran</h5>
            <table class="summary-table">
                <tbody>
                    <tr class="summary-row">
                        <td class="summary-label">Subtotal</td>
                        <td class="summary-value">Rp{{ number_format($order->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="summary-row">
                        <td class="summary-label">Pajak (10%)</td>
                        <td class="summary-value">Rp{{ number_format($order->tax, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="total-row">
                        <td class="total-label">Total</td>
                        <td class="total-value">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Instructions -->
            @if ($order->payment_method == 'tunai')
                <div class="instruction-box">
                    <p class="instruction-text">
                        💡 Tunjukkan kode bayar ini ke kasir untuk menyelesaikan pembayaran.<br>
                        Jangan lupa senyum ya! 😊
                    </p>
                </div>
            @elseif ($order->payment_method == 'qris')
                <div class="instruction-box">
                    <p class="instruction-text">
                        🎉 Yeay! Pembayaran sukses<br>
                        Pesanan Anda sedang diproses.
                    </p>
                </div>
            @endif

            <!-- Action Button -->
            <a href="{{ route('index') }}" class="action-button">
                Kembali ke Menu Utama
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Tambahkan efek micro-interactions
    const receiptCard = document.querySelector('.receipt-card');
    
    receiptCard.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px)';
    });
    
    receiptCard.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });

    // Log untuk debugging
    console.log('Order Success Page Loaded');
    console.log('Order Code: {{ $order->order_code }}');
    console.log('Payment Method: {{ $order->payment_method }}');
    console.log('Status: {{ $order->status }}');
});
</script>
@endsection