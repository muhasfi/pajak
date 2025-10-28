@extends('layouts.master')

@section('title', $item->name)

@section('content')
<section class="section">
    <div class="container">
        <div class="product-detail animate-fade-in">
            <div class="row align-items-center">
                <!-- Gambar -->
                <div class="col-md-5 text-center">
                    <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                        ? $item->img 
                        : asset('storage/' . $item->img) }}"
                        class="img-fluid rounded shadow"
                        alt="{{ $item->name }}"
                        onerror="this.onerror=null;this.src='{{ asset('No_image_available.webp') }}';">
                </div>

                <!-- Detail -->
                <div class="col-md-7">
                    <h2 class="mb-2">{{ $item->name }}</h2>
                    <p class="text-muted mb-2">Harga</p>
                    <h4 class="text-primary mb-4">
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </h4>

                    @if($item->description)
                        <div class="product-description mb-4">
                            <h5>Deskripsi</h5>
                            <p class="text-secondary" style="white-space: pre-line;">
                                {{ $item->description }}
                            </p>
                        </div>
                    @endif

                    <div class="d-flex gap-3 mt-4">
                        <button type="button" class="btn btn-primary" 
                                onclick="addToCart({{ $item->id }}, 'Item')">
                            <i class="fas fa-shopping-cart me-2"></i> Tambah ke Keranjang
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addToCart(id, type) {
    fetch("{{ route('cart.add', [], false) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: id, type: type }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: data.message,
                timer: 1200,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
            });
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
