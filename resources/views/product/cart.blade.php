@extends('layouts.master')

@section('title', 'Keranjang Belanja - Paham Pajak')

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

    /* Hero Section */
    .cart-hero {
        background: var(--gradient-primary);
        color: white;
        padding: 4rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cart-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 极 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 极 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 极 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13极 2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .cart-hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
        color: white;
    }

    .cart-hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .cart-container {
        padding: 3rem 0;
    }

    /* Empty Cart */
    .empty-cart {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        margin: 2rem 0;
    }

    .empty-cart-icon {
        font-size: 6rem;
        color: #e2e8f0;
        margin-bottom: 1.5rem;
    }

    .empty-cart-title {
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .empty-cart-text {
        color: var(--secondary);
        margin-bottom: 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Cart Items */
    .cart-items {
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .cart-item {
        display: flex;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 1px solid #f1f5f9;
        transition: var(--transition);
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item:hover {
        background: #fafafa;
    }

    .cart-item-image {
        width: 100px;
        height: 100px;
        border-radius: var(--radius);
        overflow: hidden;
        margin-right: 1.5rem;
        flex-shrink: 0;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-item-content {
        flex-grow: 1;
    }

    .cart-item-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .cart-item-price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .cart-item-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        overflow: hidden;
    }

    .quantity-btn {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .quantity-btn:hover {
        background: var(--primary);
        color: white;
    }

    .quantity-input {
        width: 50px;
        height: 36px;
        border: none;
        text-align: center;
        font-weight: 600;
        background: white;
    }

    .quantity-input:focus {
        outline: none;
    }

    .remove-btn {
        background: none;
        border: none;
        color: var(--danger);
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 50%;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .remove-btn:hover {
        background: rgba(239, 68, 68, 0.1);
    }

    /* Cart Summary */
    .cart-summary {
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 2rem;
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

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
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

    .checkout-btn {
        width: 100%;
        padding: 1rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius);
        font-size: 1.1rem;
        font-weight: 600;
        margin-top: 2rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .checkout-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .clear-cart-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.8rem 1.5rem;
        background: white;
        color: var(--danger);
        border: 1px solid var(--danger);
        border-radius: var(--radius);
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        margin-top: 1rem;
    }

    .clear-cart-btn:hover {
        background: var(--danger);
        color: white;
    }

    /* Alert */
    .alert-success {
        background: rgba(16, 185, 129, 极.1);
        border: 1px solid rgba(16, 185, 129, 0.2);
        color: #065f46;
        padding: 1rem 1.5rem;
        border-radius: var(--radius);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .alert-close {
        background: none;
        border: none;
        color: inherit;
        cursor: pointer;
        font-size: 1.2rem;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .cart-item {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .cart-item-image {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .cart-item-actions {
            width: 100%;
            justify-content: space-between;
            margin-top: 1rem;
        }
    }

    @media (max-width: 768px) {
        .cart-hero-title {
            font-size: 2.3rem;
        }
        
        .cart-hero-subtitle {
            font-size: 1.1rem;
        }
        
        .cart-item-image {
            width: 80px;
            height: 80px;
        }
        
        .cart-item-name {
            font-size: 1.1rem;
        }
        
        .cart-summary {
            position: static;
            margin-top: 2rem;
        }
    }

    @media (max-width: 480px) {
        .cart-hero {
            padding: 3rem 0;
        }
        
        .cart-hero-title {
            font-size: 2rem;
        }
        
        .cart-container {
            padding: 2rem 0;
        }
        
        .empty-cart-icon {
            font-size: 4rem;
        }
        
        .quantity-control {
            flex-grow: 1;
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
                                        src="{{ asset('img_item_upload/'. $item['image']) }}" 
                                        alt="{{ $item['name'] }}"
                                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
                                </div>
                                
                                <div class="cart-item-content">
                                    <h3 class="cart-item-name">{{ $item['name'] }}</h3>
                                    <div class="cart-item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</div>
                                    
                                    <div class="cart-item-actions">
                                        <div class="quantity-control">
                                            <button class="quantity-btn" onclick="updateQuantity('{{ $item['id'] }}', -1)">-</button>
                                            <input type="text" class="quantity-input" id="qty-{{ $item['id'] }}" value="{{ $item['qty'] }}" readonly>
                                            <button class="quantity-btn" onclick="updateQuantity('{{ $item['id'] }}', 1)">+</button>
                                        </div>
                                        
                                        <button class="remove-btn" onclick="removeItemFromCart('{{ $item['id'] }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="clear-cart-btn animate-fade-in" onclick="clearCart()">
                        <i class="fas fa-trash-alt"></i> Kosongkan Keranjang
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
<script>
    function updateQuantity(itemId, change) {
        var qtyInput = document.getElementById('qty-' + itemId);
        var currentQty = parseInt(qtyInput.value);
        var newQty = currentQty + change;

        if (newQty <= 0) {
            if(confirm('Hapus item ini dari keranjang?')) {
                removeItemFromCart(itemId);
            }
            return;
        }

        fetch("{{ route('cart.update') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: itemId, qty: newQty })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                qtyInput.value = newQty;
                location.reload();
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Gagal update keranjang', 'error');
        });
    }

    function removeItemFromCart(itemId) {
        if (!confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
            return;
        }

        fetch("{{ route('cart.remove') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Item berhasil dihapus dari keranjang', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Gagal menghapus item', 'error');
        });
    }

    function clearCart() {
        if (!confirm('Apakah Anda yakin ingin mengosongkan seluruh keranjang?')) {
            return;
        }

        window.location.href = "{{ route('cart.clear') }}";
    }

    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert-${type} animate-fade-in`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: ${type === 'success' ? '#065f46' : '#7f1d1d'};
            background: ${type === 'success' ? 'rgba(16, 185, 129, 0.1)' : 'rgba(239, 68, 68, 0.1)'};
            border: 1px solid ${type === 'success' ? 'rgba(16, 185, 129, 0.2)' : 'rgba(239, 68, 68, 0.2)'};
            font-weight: 极;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            z-index: 10000;
            box-shadow: var(--shadow-lg);
            animation: slideIn 0.3s ease-out;
        `;
        
        notification.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        
        // Add to body
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

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