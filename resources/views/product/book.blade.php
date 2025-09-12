@extends('product.layouts.master')

@section('content')
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($items as $item)
            <div class="col">
                <div class="card border-0 shadow-sm h-100 rounded-4 product-card transition-transform">
                    {{-- Gambar --}}
                    <div class="position-relative overflow-hidden rounded-top-4">
                        <img 
                            src="{{ asset('img_item_upload/'. $item->img) }}" 
                            class="card-img-top rounded-top-4 img-fluid object-fit-cover"
                            style="height: 250px;"
                            alt="{{ $item->name }}"
                            onerror="this.onerror=null;this.src='{{ $item->img }}';">
                        
                        <span class="badge category-badge position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill text-white 
                            @if ($item->category->cat_name == 'Book') bg-warning 
                            @elseif ($item->category->cat_name == 'artikel') bg-info 
                            @else bg-primary @endif">
                            {{ $item->category->cat_name }}
                        </span>
                    </div>
                    
                    {{-- Body --}}
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold text-dark mb-2">{{ $item->name }}</h5>
                        <p class="card-text text-muted mb-3 text-truncate-3">
                            {{ $item->description }}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fs-5 fw-semibold text-primary">{{ 'Rp'. number_format($item->price, 0, ',','.') }}</span>
                            <button onclick="addToCart({{ $item->id }})" 
                                class="btn btn-primary rounded-pill px-4 py-2 d-flex align-items-center shadow-sm hover-rise">
                                <i class="fa fa-shopping-bag me-2"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    /* Card animation */
    .product-card {
        transition: transform .25s ease, box-shadow .25s ease;
        background: #fff;
    }
    .product-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.08);
    }

    /* Limit 3 line text */
    .text-truncate-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Badge category */
    .category-badge {
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    /* Button hover-rise */
    .hover-rise {
        transition: all .25s ease;
    }
    .hover-rise:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.1);
    }

    /* Img object-fit */
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endsection

@section('script')
<script>
    function addToCart(menuId) {
        fetch("{{ route('cart.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: menuId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.href = "{{ route('cart') }}";
            } else {
                alert(data.message || 'Gagal menambah ke keranjang');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    }
</script>
@endsection
