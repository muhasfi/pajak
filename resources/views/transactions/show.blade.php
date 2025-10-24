@extends('layouts.master')
@section('title', 'Detail Transaksi')

@section('content')
<div class="container py-4">
    <div class="mb-4">
    <a href="{{ route('transactions.transaction') }}" class="back-link">
        <div class="back-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <span>Kembali ke Riwayat</span>
    </a>
</div>

    <div class="detail-container">
        {{-- Header Section --}}
        <div class="detail-header">
            <div class="header-content">
                <div class="order-info-main">
                    <h4 class="order-code-detail">{{ $order->order_code }}</h4>
                    @php
                        $statusConfig = [
                            'pending' => ['class' => 'status-pending', 'text' => 'Menunggu Pembayaran', 'icon' => 'clock'],
                            'paid' => ['class' => 'status-paid', 'text' => 'Lunas', 'icon' => 'check-circle'],
                            'cancelled' => ['class' => 'status-cancelled', 'text' => 'Dibatalkan', 'icon' => 'x-circle'],
                            'processing' => ['class' => 'status-processing', 'text' => 'Diproses', 'icon' => 'loader'],
                            'completed' => ['class' => 'status-completed', 'text' => 'Selesai', 'icon' => 'check'],
                        ];
                        $status = $statusConfig[$order->status] ?? ['class' => 'status-default', 'text' => ucfirst($order->status), 'icon' => 'info'];
                    @endphp
                    <span class="status-badge-large {{ $status['class'] }}">
                        {{ $status['text'] }}
                    </span>
                </div>
                <div class="order-date-info">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="6" width="18" height="15" rx="2" stroke="currentColor" stroke-width="2"/>
                        <path d="M3 10H21" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 3V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M17 3V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    {{ $order->created_at->format('d M Y') }} • {{ $order->created_at->format('H:i') }} WIB
                </div>
            </div>
        </div>

        {{-- Customer Info --}}
        <div class="info-card">
            <div class="info-card-header">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/>
                    <path d="M6 21V19C6 16.7909 7.79086 15 10 15H14C16.2091 15 18 16.7909 18 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Informasi Pembeli
            </div>
            <div class="info-card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nama Lengkap</span>
                        <span class="info-value">{{ $order->fullname }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $order->email }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">No. Telepon</span>
                        <span class="info-value">{{ $order->phone }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Products Section --}}
        <div class="products-card">
            <div class="products-header">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                    <rect x="14" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                    <rect x="3" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                    <rect x="14" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                </svg>
                Daftar Produk
            </div>
            <div class="products-body">
                @foreach($order->orderItems as $item)
                    <div class="product-item">
                        <div class="product-main-info">
                            <span class="product-type-badge {{ $item->product_type === 'item' ? 'badge-book' : 'badge-bimbel' }}">
                                {{ $item->product_type === 'item' ? 'BOOK' : 'BIMBEL' }}
                            </span>
                            <div class="product-details">
                                <h6 class="product-name">{{ $item->product->name ?? $item->product->judul ?? 'Produk tidak tersedia' }}</h6>
                                <span class="product-qty">{{ $item->quantity }} item</span>
                            </div>
                        </div>
                        <div class="product-pricing">
                            <div class="price-row">
                                <span class="price-label">Harga Satuan</span>
                                <span class="price-value">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="price-row">
                                <span class="price-label">PPN (10%)</span>
                                <span class="price-value">Rp {{ number_format($item->tax, 0, ',', '.') }}</span>
                            </div>
                            <div class="price-row total-row">
                                <span class="price-label">Subtotal</span>
                                <span class="price-total">Rp {{ number_format($item->total_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Summary Section --}}
        <div class="summary-card">
            <div class="summary-content">
                <div class="summary-row">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">PPN (10%)</span>
                    <span class="summary-value">Rp {{ number_format($order->tax, 0, ',', '.') }}</span>
                </div>
                <div class="summary-divider"></div>
                <div class="summary-row summary-total">
                    <span class="summary-label-total">Total Pembayaran</span>
                    <span class="summary-value-total">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        {{-- Payment Button --}}
        @if($order->status === 'pending')
            <div class="payment-action">
                <div class="payment-reminder">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="9" stroke="#f59e0b" stroke-width="2"/>
                        <path d="M12 8V12L14 14" stroke="#f59e0b" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span>Segera selesaikan pembayaran Anda</span>
                </div>
                <a href="{{ route('checkout.orderPay', $order->order_code) }}" class="btn-pay">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/>
                        <path d="M2 10H22" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    Bayar Sekarang
                </a>
            </div>
        @endif
    </div>
</div>

<style>
.back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #64748b;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s ease;
}

.back-link:hover {
    color: #3b82f6;
    gap: 12px;
}

.detail-container {
    max-width: 900px;
    margin: 0 auto;
}

.detail-header {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    padding: 32px;
    border-radius: 16px;
    color: white;
    margin-bottom: 24px;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.2);
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 18px;
    background: white;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    color: #64748b;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.25s ease;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.back-link:hover {
    background: #f8fafc;
    border-color: #3b82f6;
    color: #3b82f6;
    transform: translateX(-4px);
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
}

.back-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    transition: transform 0.25s ease;
}

.back-link:hover .back-icon {
    transform: translateX(-3px);
}

.back-link:active {
    transform: translateX(-2px) scale(0.98);
}

.order-code-detail {
    font-family: 'Courier New', monospace;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 12px;
    letter-spacing: 1px;
}

.status-badge-large {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 24px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
}

.order-date-info {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 16px;
    font-size: 14px;
    opacity: 0.95;
}

.info-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    margin-bottom: 20px;
    overflow: hidden;
}

.info-card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
    font-weight: 600;
    color: #1e293b;
    font-size: 15px;
}

.info-card-body {
    padding: 24px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.info-label {
    font-size: 12px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.info-value {
    font-size: 15px;
    color: #1e293b;
    font-weight: 500;
}

.products-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    margin-bottom: 20px;
    overflow: hidden;
}

.products-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
    font-weight: 600;
    color: #1e293b;
    font-size: 15px;
}

.products-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.product-item {
    padding: 20px;
    background: #f9fafb;
    border-radius: 10px;
    border: 1px solid #f1f5f9;
}

.product-main-info {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 16px;
}

.product-type-badge {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.8px;
    flex-shrink: 0;
}

.badge-book {
    background: #3b82f6;
    color: white;
}

.badge-bimbel {
    background: #8b5cf6;
    color: white;
}

.product-details {
    flex: 1;
}

.product-name {
    font-size: 16px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 4px;
}

.product-qty {
    font-size: 13px;
    color: #64748b;
}

.product-pricing {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-top: 12px;
    border-top: 1px dashed #e5e7eb;
}

.price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price-label {
    font-size: 13px;
    color: #64748b;
}

.price-value {
    font-size: 14px;
    color: #1e293b;
    font-weight: 500;
}

.total-row {
    margin-top: 4px;
    padding-top: 8px;
    border-top: 1px solid #e5e7eb;
}

.price-total {
    font-size: 16px;
    color: #3b82f6;
    font-weight: 700;
}

.summary-card {
    background: white;
    border-radius: 12px;
    border: 2px solid #e5e7eb;
    margin-bottom: 20px;
    overflow: hidden;
}

.summary-content {
    padding: 24px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.summary-label {
    font-size: 14px;
    color: #64748b;
}

.summary-value {
    font-size: 15px;
    color: #1e293b;
    font-weight: 500;
}

.summary-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 16px 0;
}

.summary-total {
    margin-bottom: 0;
}

.summary-label-total {
    font-size: 16px;
    color: #1e293b;
    font-weight: 600;
}

.summary-value-total {
    font-size: 24px;
    color: #3b82f6;
    font-weight: 700;
}

.payment-action {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 24px;
    border-radius: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.payment-reminder {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #92400e;
    font-weight: 500;
    font-size: 14px;
}

.btn-pay {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 32px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 15px;
    box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
    transition: all 0.3s ease;
}

.btn-pay:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    color: white;
}

@media (max-width: 768px) {
    .detail-header {
        padding: 24px;
    }
    
    .order-code-detail {
        font-size: 20px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .product-main-info {
        flex-direction: column;
    }
    
    .payment-action {
        flex-direction: column;
        text-align: center;
    }
    
    .btn-pay {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection