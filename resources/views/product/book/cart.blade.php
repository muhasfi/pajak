@extends('layouts.master')

@section('title', 'Keranjang Belanja - Paham Pajak')

    @section('style')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @endsection

@section('content')
<!-- Hero Section -->
<section class="cart-hero">
    <div class="container mt-5">
        <h1 class="cart-hero-title animate-fade-in">Keranjang Belanja</h1>
        <p class="cart-hero-subtitle animate-fade-in delay-100">Review dan kelola item yang telah Anda tambahkan ke keranjang</p>
    </div>
</section>

<!-- Cart Content -->
<section class="cart-container">
    <div class="container">
        @if (session('success'))
            <div class="alert-success animate-fade-in">
                <div>
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
                <button type="button" class="alert-close" onclick="this.parentElement.style.display='none'">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if (empty($cart))
            <div class="empty-cart animate-fade-in">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3 class="empty-cart-title">Keranjang Anda kosong</h3>
                <p class="empty-cart-text">Mulai jelajahi koleksi buku dan artikel kami untuk menemukan pengetahuan perpajakan yang Anda butuhkan</p>
                <a href="{{ route('book') }}" class="checkout-btn">
                    <i class="fas fa-shopping-bag me-1"></i> Mulai Berbelanja
                </a>
            </div>
        @else
            @php $subTotal = 0; @endphp

            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-items animate-fade-in">
                        @foreach ($cart as $item)
                            @php
                                $itemTotal = $item['price'] * $item['qty'];
                                $subTotal += $itemTotal;
                            @endphp
                            <div class="cart-item">
                                <div class="cart-item-image">
    <img 
        src="{{ asset($item['image'] ?? 'default.jpg') }}" 
        class="img-fluid me-5 rounded-circle" 
        style="width: 80px; height: 80px;" 
        alt="gambar produk"
        onerror="this.onerror=null;this.src='{{ asset('default.jpg') }}';">
</div>

                                
                                <div class="cart-item-content">
                                    <h3 class="cart-item-name">{{ $item['name'] }}</h3>
                                    <div class="cart-item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</div>
                                    
                                    <div class="cart-item-actions">
                                        
                                        <button class="remove-btn" onclick="confirmDelete('{{ $item['id'] }}', '{{ $item['type'] }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button id="clear-cart-btn"
                    class="btn btn-danger"
                    {{-- "{{ route('cart.remove') }}" --}}
                    data-url="{{ route('cart.clear', [], false) }}">
                    Kosongkan Keranjang
                </button>
                </div>

                <div class="col-lg-4">
                    <div class="cart-summary animate-fade-in delay-100">
                        <h3 class="summary-title">Ringkasan Pesanan</h3>
                        
                        <div class="summary-item">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value">Rp{{ number_format($subTotal, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="summary-item">
                            <span class="summary-label">Pajak (10%)</span>
                            <span class="summary-value">Rp{{ number_format($subTotal * 0.1, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="summary-total">
                            <span class="total-label">Total</span>
                            <span class="total-value">Rp{{ number_format($subTotal + ($subTotal * 0.1), 0, ',', '.') }}</span>
                        </div>
                        
                        <a href="{{ route('checkout') }}" class="checkout-btn">
                            <i class="fas fa-credit-card me-1"></i> Lanjut ke Pembayaran
                        </a>
                        
                        <div class="mt-3 text-center">
                            <a href="{{ route('book') }}" class="text-primary">
                                <i class="fas fa-arrow-left me-1"></i> Lanjutkan Berbelanja
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/customer/js/cart.js') }}"></script>
<script>
    function removeItemFromCart(id, type) {
    fetch("{{ route('cart.remove', [], false) }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ id: id, type: type })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
}


</script>
@endsection