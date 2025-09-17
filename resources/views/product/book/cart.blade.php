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
                                        src="{{ asset('img_item_upload/'. $item['image']) }}" 
                                        alt="{{ $item['name'] }}"
                                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
                                </div>
                                
                                <div class="cart-item-content">
                                    <h3 class="cart-item-name">{{ $item['name'] }}</h3>
                                    <div class="cart-item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</div>
                                    
                                    <div class="cart-item-actions">
                                        
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