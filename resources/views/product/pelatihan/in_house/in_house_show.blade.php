@extends('layouts.master')

@section('title', $training->judul)

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $training->gambar ? asset('storage/' . $training->gambar) : asset('assets/customer/images/placeholder.png') }}" 
                 alt="{{ $training->judul }}" class="img-fluid rounded shadow-sm">
        </div>

        <div class="col-md-6">
            <h2 class="mb-2">{{ $training->judul }}</h2>
            <p class="text-muted">{{ $training->deskripsi }}</p>

            <ul class="list-unstyled mt-3">
                <li><i class="fas fa-calendar-alt me-2"></i>
                    {{ \Carbon\Carbon::parse($training->tanggal)->translatedFormat('d F Y') }}
                </li>
                <li><i class="fas fa-clock me-2"></i>
                    Durasi: {{ $training->detail->durasi_jam ?? '-' }} jam
                </li>
                <li><i class="fas fa-users me-2"></i>
                    Kuota Peserta: {{ $training->detail->kuota_peserta ?? '-' }}
                </li>
                <li><i class="fas fa-map-marker-alt me-2"></i>
                    Tempat: {{ $training->detail->tempat ?? '-' }}
                </li>
                <li><i class="fas fa-user-tie me-2"></i>
                    Instruktur: {{ $training->detail->instruktur ?? '-' }}
                </li>
            </ul>

            <h5 class="mt-4">Materi Pelatihan:</h5>
            <ul class="ms-3">
                @php
                    $materiList = preg_split('/[\r\n,]+/', $training->detail->materi ?? '');
                @endphp
                @foreach($materiList as $materi)
                    @if(trim($materi) !== '')
                        <li>{{ trim($materi) }}</li>
                    @endif
                @endforeach
            </ul>

            <div class="mt-4">
                <h4 class="text-primary">
                    {{ $training->harga == 0 ? 'GRATIS' : 'Rp ' . number_format($training->harga, 0, ',', '.') }}
                </h4>
            </div>

            <div class="mt-3">
                <button 
                    type="button"
                    class="btn btn-primary px-4"
                    onclick="addToCart({{ $training->id }}, 'ItemTraining')">
                    Request Proposal
                </button>

                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ms-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert Script --}}
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
