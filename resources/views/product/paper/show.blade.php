@extends('layouts.master')

@section('title', $paper->name)

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-5">
            @if($paper->img)
                <img src="{{ asset('storage/' . $paper->img) }}" 
                     alt="{{ $paper->name }}" 
                     class="img-fluid rounded shadow">
            @else
                <img src="{{ asset('images/no-image.png') }}" 
                     alt="No Image" 
                     class="img-fluid rounded shadow">
            @endif
        </div>

        <div class="col-md-7">
            <h2>{{ $paper->name }}</h2>
            <p class="text-muted mb-1">
                <strong>Kategori:</strong> {{ $paper->categoryPaper->name ?? '-' }}
            </p>
            <p class="text-muted mb-3">
                Mulai dari <strong>Rp {{ number_format($paper->price, 0, ',', '.') }}</strong>
            </p>

            <p><strong>Kebutuhan:</strong> {{ $paper->kebutuhan ?? '-' }}</p>

            <h5 class="mt-4">Deskripsi:</h5>
            <ul style="list-style:none; padding-left:0;">
                @foreach(explode("\n", $paper->description) as $desc)
                    @php $trimmed = trim($desc); @endphp
                    @if($trimmed !== '')
                        <li>
                            @if(str_starts_with($trimmed, '-'))
                                <i class="fas fa-times text-danger"></i> {{ ltrim($trimmed, '-') }}
                            @elseif(str_starts_with($trimmed, '+'))
                                <i class="fas fa-check text-success"></i> {{ ltrim($trimmed, '+') }}
                            @else
                                {{ $trimmed }}
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>

            <div class="mt-4 d-flex gap-2">
                <button type="button" 
                        class="btn btn-primary"
                        onclick="addToCart({{ $paper->id }}, 'ItemPaper')">
                    Tambahkan ke Keranjang
                </button>

                <a href="https://wa.me/62xxxxxxxxxx" class="btn btn-outline-success">
                    Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</div>

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
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
@endsection
