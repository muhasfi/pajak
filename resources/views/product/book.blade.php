@extends('layouts.app')

@section('title', 'Paham Pajak - Solusi Perpajakan Terpercaya')

@section('content')
<!-- Page Header -->
<div class="container-fluid page-header py-5 position-relative" 
     style="background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f') center/cover no-repeat;">
    <!-- Overlay hitam transparan -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0, 0, 0, 0.5);"></div>

    <div class="position-relative text-center text-white">
        <h1 class="fw-bold display-5">Menu</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item active text-light">Berbagai pilihan menu terbaik</li>
        </ol>
    </div>
</div>

<!-- End Page Header -->

<!-- Menu Section -->
<div class="container-fluid py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4 justify-content-center">
                    @foreach ($items as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100 rounded-3 overflow-hidden">
                            <div class="position-relative">
                                <img src="{{ asset('img_item_upload/'. $item->img) }}" 
                                     class="img-fluid w-100" 
                                     alt="{{ $item->name }}" 
                                     onerror="this.onerror=null;this.src='{{  $item->img }}';">
                                <span class="badge position-absolute top-0 start-0 m-3 
                                    @if ($item->category->cat_name == 'Book')
                                        bg-warning text-dark
                                    @elseif ($item->category->cat_name == 'artikel')
                                        bg-info
                                    @else
                                        bg-primary
                                    @endif
                                    px-3 py-2 rounded-pill shadow-sm">
                                    {{ $item->category->cat_name }}
                                </span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <h5 class="fw-bold text-dark">{{ $item->name }}</h5>
                                <p class="text-muted small flex-grow-1">{{ $item->description }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-primary fw-bold fs-5">{{ 'Rp'. number_format($item->price, 0, ',','.') }}</span>
                                    <button onclick="addToCart({{ $item->id }})" 
                                            class="btn btn-primary btn-sm rounded-pill px-3">
                                        <i class="fa fa-shopping-bag me-2"></i>Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Menu Section -->
@endsection

@section('script')
<script>
    function addToCart(menuId) {
        fetch("{{ secure_url(route('cart.add', [], false)) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: menuId })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>
@endsection
