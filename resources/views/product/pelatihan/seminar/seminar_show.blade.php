@extends('layouts.master')
@section('title', $seminar->judul)

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- Gambar utama seminar --}}
        <div class="col-md-6 mb-4">
            <img src="{{ $seminar->gambar ? asset('storage/' . $seminar->gambar) : asset('assets/customer/images/placeholder.png') }}"
                 alt="{{ $seminar->judul }}" class="img-fluid rounded shadow-sm">
        </div>

        {{-- Detail seminar --}}
        <div class="col-md-6">
            <h2 class="fw-bold">{{ $seminar->judul }}</h2>
            <p class="text-muted mb-2">
                <i class="fas fa-calendar-alt me-1"></i>
                {{ \Carbon\Carbon::parse($seminar->tanggal)->translatedFormat('d F Y') }}
                &nbsp; | &nbsp;
                <i class="fas fa-clock me-1"></i> {{ $seminar->waktu_pelaksanaan }}
            </p>

            <p class="mb-3">
                <span class="badge {{ $seminar->harga == 0 ? 'bg-success' : 'bg-primary' }}">
                    {{ $seminar->harga == 0 ? 'GRATIS' : 'PREMIUM' }}
                </span>
            </p>

            <h5 class="text-primary mb-2">Deskripsi</h5>
            <p>{{ $seminar->deskripsi }}</p>

            {{-- Detail --}}
            @if($detail)
                <hr>
                <h5 class="text-primary mb-3">Informasi Seminar</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-user-tie me-2"></i> <strong>Pembicara:</strong> {{ $detail->pembicara }}</li>
                    <li><i class="fas fa-tags me-2"></i> <strong>Kategori:</strong> {{ $detail->kategori }}</li>
                    <li><i class="fas fa-signal me-2"></i> <strong>Level:</strong> {{ $detail->level }}</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> <strong>Lokasi:</strong> {{ $detail->lokasi }}</li>
                    <li><i class="fas fa-users me-2"></i> <strong>Kuota Peserta:</strong> {{ $detail->kuota_peserta }}</li>
                    <li><i class="fas fa-phone me-2"></i> <strong>Kontak Person:</strong> {{ $detail->kontak_person }}</li>
                </ul>

                <div class="mt-3">
                    <strong>Fasilitas:</strong>
                    <p class="mb-0">{{ $detail->fasilitas }}</p>
                </div>
            @endif

            {{-- Tombol daftar / pembayaran --}}
            <div class="mt-4 d-flex gap-2">
                <button 
                    type="button"
                    class="btn {{ $seminar->harga == 0 ? 'btn-success' : 'btn-primary' }}"
                    onclick="addToCart({{ $seminar->id }}, 'ItemSeminar')">
                    <i class="fas fa-shopping-cart me-1"></i> 
                    {{ $seminar->harga == 0 ? 'Daftar Gratis' : 'Daftar Sekarang' }}
                </button>

                <a href="{{ route('seminar') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            {{-- Harga --}}
            <div class="mt-3">
                <h4 class="fw-bold text-danger">
                    {{ $seminar->harga == 0 ? 'GRATIS' : 'Rp ' . number_format($seminar->harga, 0, ',', '.') }}
                </h4>
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
            }).then(() => {
                window.location.href = "{{ route('cart') }}";
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
@endsection
