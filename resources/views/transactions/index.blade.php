@extends('layouts.master')
@section('title', 'Riwayat Transaksi')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Riwayat Transaksi</h3>
            <span class="text-muted">Kelola dan pantau semua transaksi Anda</span>
        </div>
        @if(!$orders->isEmpty())
            <div class="text-end">
                <small class="text-muted">Total {{ $orders->count() }} transaksi</small>
            </div>
        @endif
    </div>

    @if($orders->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">
                <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V11" stroke="#CBD5E1" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M9 11C7.34315 11 6 12.3431 6 14V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V14C18 12.3431 16.6569 11 15 11H9Z" stroke="#CBD5E1" stroke-width="1.5"/>
                    <circle cx="12" cy="16" r="1" fill="#CBD5E1"/>
                </svg>
            </div>
            <h5 class="mt-4 mb-2">Belum Ada Transaksi</h5>
            <p class="text-muted mb-4">Riwayat pembelian Anda akan muncul di sini</p>
            <a href="{{ route('index') }}" class="btn btn-dark">Mulai Belanja</a>
        </div>
    @else
        <div class="transaction-list">
            @foreach($orders as $order)
                <div class="transaction-card">
                    <a href="{{ route('transactions.show', $order->id) }}" class="transaction-link">
                        <div class="transaction-header">
                            <div class="transaction-info">
                                <div class="order-code-wrapper">
                                    <span class="order-code">{{ $order->order_code }}</span>
                                    @php
                                        $statusConfig = [
                                            'pending' => ['class' => 'status-pending', 'text' => 'Menunggu Pembayaran'],
                                            'paid' => ['class' => 'status-paid', 'text' => 'Lunas'],
                                            'cancelled' => ['class' => 'status-cancelled', 'text' => 'Dibatalkan'],
                                            'processing' => ['class' => 'status-processing', 'text' => 'Diproses'],
                                            'completed' => ['class' => 'status-completed', 'text' => 'Selesai'],
                                        ];
                                        $status = $statusConfig[$order->status] ?? ['class' => 'status-default', 'text' => ucfirst($order->status)];
                                    @endphp
                                    <span class="status-badge {{ $status['class'] }}">{{ $status['text'] }}</span>
                                </div>
                                <div class="transaction-date">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="6" width="18" height="15" rx="2" stroke="currentColor" stroke-width="2"/>
                                        <path d="M3 10H21" stroke="currentColor" stroke-width="2"/>
                                        <path d="M7 3V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M17 3V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    {{ $order->created_at->format('d M Y') }} • {{ $order->created_at->format('H:i') }}
                                </div>
                            </div>
                            <div class="transaction-amount">
                                <span class="amount-label">Total Bayar</span>
                                <span class="amount-value">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="transaction-body">
                            <div class="items-list">
                                @foreach($order->orderItems as $index => $item)
                                    <div class="item-row {{ $index > 0 ? 'mt-2' : '' }}">
                                        <div class="item-details">
                                            <span class="item-type {{ $item->product_type === 'item' ? 'type-book' : 'type-bimbel' }}">
                                                {{ $item->product_type === 'item' ? 'BOOK' : 'BIMBEL' }}
                                            </span>
                                            <span class="item-name">{{ $item->product->name ?? $item->product->judul ?? 'Produk tidak tersedia' }}</span>
                                        </div>
                                        <span class="item-qty">{{ $item->quantity }}x</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="transaction-footer">
                            <span class="view-detail">
                                Lihat Detail
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
.empty-state {
    text-align: center;
    padding: 80px 20px;
    background: #f8f9fa;
    border-radius: 12px;
    margin-top: 20px;
}

.empty-icon {
    display: inline-block;
    padding: 30px;
    background: white;
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.transaction-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.transaction-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    overflow: hidden;
    transition: all 0.3s ease;
}

.transaction-card:hover {
    border-color: #3b82f6;
    box-shadow: 0 8px 24px rgba(59, 130, 246, 0.12);
    transform: translateY(-2px);
}

.transaction-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.transaction-header {
    padding: 20px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
}

.order-code-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 8px;
}

.order-code {
    font-weight: 600;
    font-size: 16px;
    color: #1e293b;
    font-family: 'Courier New', monospace;
    letter-spacing: 0.5px;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.status-pending {
    background: #fef3c7;
    color: #92400e;
}

.status-paid {
    background: #d1fae5;
    color: #065f46;
}

.status-cancelled {
    background: #fee2e2;
    color: #991b1b;
}

.status-processing {
    background: #dbeafe;
    color: #1e40af;
}

.status-completed {
    background: #e0e7ff;
    color: #3730a3;
}

.status-default {
    background: #f3f4f6;
    color: #4b5563;
}

.transaction-date {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: #64748b;
}

.transaction-amount {
    text-align: right;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.amount-label {
    font-size: 12px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.amount-value {
    font-size: 20px;
    font-weight: 700;
    color: #3b82f6;
}

.transaction-body {
    padding: 20px;
    background: white;
}

.items-list {
    display: flex;
    flex-direction: column;
}

.item-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px;
    background: #f9fafb;
    border-radius: 8px;
    gap: 12px;
}

.item-details {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.item-type {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.5px;
    flex-shrink: 0;
}

.type-book {
    background: #3b82f6;
    color: white;
}

.type-bimbel {
    background: #8b5cf6;
    color: white;
}

.item-name {
    color: #1e293b;
    font-size: 14px;
    line-height: 1.4;
}

.item-qty {
    font-weight: 600;
    color: #64748b;
    font-size: 14px;
    flex-shrink: 0;
}

.transaction-footer {
    padding: 16px 20px;
    background: white;
    border-top: 1px solid #f1f5f9;
}

.view-detail {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #3b82f6;
    font-size: 14px;
    font-weight: 500;
    transition: gap 0.2s ease;
}

.transaction-card:hover .view-detail {
    gap: 10px;
}

.view-detail svg {
    transition: transform 0.2s ease;
}

.transaction-card:hover .view-detail svg {
    transform: translateX(3px);
}

@media (max-width: 768px) {
    .transaction-header {
        flex-direction: column;
    }
    
    .transaction-amount {
        text-align: left;
        width: 100%;
    }
    
    .amount-value {
        font-size: 18px;
    }
    
    .item-details {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
}
</style>
@endsection