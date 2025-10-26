@extends('layouts.master')

@section('title', $bimbel->judul)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Card Utama --}}
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="fw-bold mb-0">{{ $bimbel->judul }}</h2>
                    <p class="mb-0">Program Bimbingan Belajar</p>
                </div>

                <div class="card-body p-4">

                    {{-- Gambar --}}
                    @if($bimbel->gambar)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $bimbel->gambar) }}" alt="{{ $bimbel->judul }}" class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                        </div>
                    @endif

                    {{-- Harga --}}
                    <div class="text-center mb-4">
                        <span class="h3 fw-bold text-primary">Rp {{ number_format($bimbel->harga, 0, ',', '.') }}</span>
                        <span class="text-muted">/paket</span>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Deskripsi Program</h5>
                        @foreach(explode("\n", $bimbel->deskripsi) as $line)
                            @php
                                $trimmed = trim($line);
                                if ($trimmed === '') continue;
                                $isPositive = Str::startsWith($trimmed, '+');
                                $isNegative = Str::startsWith($trimmed, '-');
                                $text = ltrim($trimmed, '+- ');
                            @endphp
                            <div class="d-flex align-items-start mb-2">
                                @if($isPositive)
                                    <i class="fa fa-check-circle text-success me-2 mt-1"></i>
                                @elseif($isNegative)
                                    <i class="fa fa-times-circle text-danger me-2 mt-1"></i>
                                @else
                                    <i class="fa fa-check-circle text-success me-2 mt-1"></i>
                                @endif
                                <p class="mb-0 text-muted">{{ $text }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{-- Detail Materi --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Materi yang Diajarkan</h5>

                        @forelse($bimbel->detail as $materi)
                            <div class="border rounded p-3 mb-3 bg-light">
                                <h6 class="fw-bold mb-2">{{ $materi->judul_materi ?? 'Materi Tanpa Judul' }}</h6>
                                <p class="mb-2 text-muted small">{{ $materi->deskripsi }}</p>

                                @if($materi->link)
                                    <a href="{{ $materi->link }}" target="_blank" class="text-decoration-none">
                                        <i class="fa fa-link me-1"></i> Lihat Materi
                                    </a>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted">Belum ada detail materi untuk program ini.</p>
                        @endforelse
                    </div>

                    {{-- Tombol --}}
                    <div class="text-center">
                        <button onclick="addToCart('{{ $bimbel->id }}', 'ItemBimbel')" 
                            class="btn btn-primary btn-lg rounded-pill px-4">
                            <i class="fa fa-shopping-cart me-2"></i> Daftar Sekarang
                        </button>
                        <a href="{{ route('admin.bimbel.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4 ms-2">
                            <i class="fa fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection


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
                text: data.message,
                timer: 1200,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>