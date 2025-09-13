@extends('product.layouts.master')

@section('content')
<<<<<<< HEAD
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Keranjang</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-primary">Silakan periksa pesanan Anda</li>
    </ol>
</div>
<!-- Single Page Header End -->
<div class="container-fluid py-5">
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (empty($cart))
            <h4 class="text-center">Keranjang anda kosong</h4>
        @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $subTotal = 0;
                    @endphp
                    @foreach ($cart as $item)
                        @php
                            $itemTotal = $item['price'] * $item['qty'];
                            $subTotal += $itemTotal;
                        @endphp
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img_item_upload/'. $item['image']) }}" 
                                    class="img-fluid me-5 rounded-circle" 
                                    style="width: 80px; height: 80px;" 
                                    alt="" 
                                    onerror="this.onerror=null;this.src='{{ $item['image'] }}';">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{ $item['name'] }}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{ 'Rp'. number_format($item['price'], 0, ',','.') }}</p>
                        </td>
                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4" 
                                    onclick="confirmDelete('{{ $item['id'] }}')">
                                <i class="fa fa-times text-danger"></i>
                            </button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
=======
<div class="container py-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
>>>>>>> f8e9f40d1bfa3f4054e441f70caf5f2af0cb5bc6

    <h2 class="fw-bold mb-4 text-center">Keranjang Belanja</h2>

    @if (empty($cart))
        <div class="text-center py-5">
            <img src="{{ asset('img/empty-cart.svg') }}" alt="Empty" style="width:180px">
            <h5 class="mt-3">Keranjang anda kosong</h5>
            <a href="{{ route('book') }}" class="btn btn-primary mt-3">Belanja Sekarang</a>
        </div>
<<<<<<< HEAD
        @php
            $tax = $subTotal * 0.1;
            $total = $subTotal + $tax;
        @endphp
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-danger" id="clear-cart-btn" data-url="{{ route('cart.clear') }}">
                Kosongkan Keranjang
=======
    @else
    @php $subTotal = 0; @endphp

    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive shadow-sm rounded-3">
                <table class="table align-middle mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Gambar</th>
                            <th>Menu</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            @php
                                $itemTotal = $item['price'] * $item['qty'];
                                $subTotal += $itemTotal;
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ asset('img_item_upload/'. $item['image']) }}"
                                        class="img-fluid rounded"
                                        style="width:70px; height:70px; object-fit:cover"
                                        alt="{{ $item['name'] }}"
                                        onerror="this.onerror=null;this.src='{{ $item['image'] }}';">
                                </td>
                                <td class="fw-semibold">{{ $item['name'] }}</td>
                                <td class="text-center">Rp{{ number_format($item['price'],0,',','.') }}</td>
                                <td class="text-center">
                                    <div class="input-group input-group-sm justify-content-center" style="max-width:120px">
                                        <button class="btn btn-outline-secondary" onclick="updateQuantity('{{ $item['id'] }}', -1)">-</button>
                                        <input type="text" class="form-control text-center" id="qty-{{ $item['id'] }}" value="{{ $item['qty'] }}" readonly>
                                        <button class="btn btn-outline-secondary" onclick="updateQuantity('{{ $item['id'] }}', 1)">+</button>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-light border rounded-circle"
                                        onclick="if(confirm('Hapus item ini?')) removeItemFromCart('{{ $item['id'] }}')">
                                        <i class="fa fa-trash text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('cart.clear') }}" class="btn btn-danger mt-3"
               onclick=" return confirm('Kosongkan seluruh keranjang?')">
               Kosongkan Keranjang
>>>>>>> f8e9f40d1bfa3f4054e441f70caf5f2af0cb5bc6
            </a>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
            @php
                $tax = $subTotal * 0.1;
                $total = $subTotal + $tax;
            @endphp
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">Ringkasan Pesanan</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($subTotal,0,',','.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Pajak (10%)</span>
                        <span>Rp{{ number_format($tax,0,',','.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>Total</span>
                        <span>Rp{{ number_format($total,0,',','.') }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100 py-2 text-uppercase">Lanjut ke Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('script')
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/customer/js/cart.js') }}"></script>
    <script>
        function updateQuantity(itemId, change) {
            var qtyInput = document.getElementById('qty-' + itemId);
            var currentQty = parseInt(qtyInput.value);
            var newQty = currentQty + change;
=======
<script>
    function updateQuantity(itemId, change) {
        var qtyInput = document.getElementById('qty-' + itemId);
        var currentQty = parseInt(qtyInput.value);
        var newQty = currentQty + change;
>>>>>>> f8e9f40d1bfa3f4054e441f70caf5f2af0cb5bc6

        if (newQty <= 0) {
            if(confirm('Hapus item ini?')) removeItemFromCart(itemId);
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
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal update keranjang');
        });
    }

<<<<<<< HEAD
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
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengupdate keranjang');
            });
        }

        function removeItemFromCart(itemId) {

            // fetch("{{ route('cart.remove') }}"
            fetch("{{ secure_url(route('cart.remove', [], false)) }}", {
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
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus item dari keranjang');
            });
        }
    </script>
=======
    function removeItemFromCart(itemId) {
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
            if (data.success) location.reload();
            else alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menghapus item');
        });
    }
</script>
>>>>>>> f8e9f40d1bfa3f4054e441f70caf5f2af0cb5bc6
@endsection
