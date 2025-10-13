@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 text-center">Layanan Pajak Pertambahan Nilai (PPN)</h3>

    <div class="row">
        @forelse($layanan as $item)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4 h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-danger fw-bold">{{ $item->judul }}</h5>
                    <p class="card-text text-muted">{{ $item->deskripsi }}</p>
                    <p class="fw-bold">Mulai dari Rp {{ number_format($item->harga,0,',','.') }}</p>

                    <ul class="list-unstyled small text-muted">
                        <li>✔ Bagi WP dengan NPWP & status PKP</li>
                        <li>✔ Wajib terbitkan & lapor Faktur Pajak</li>
                        <li>✔ Batas lapor akhir bulan berikutnya</li>
                    </ul>

                    <div class="mt-auto">
                        <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20pesan%20layanan%20{{ urlencode($item->judul) }}" 
                           class="btn btn-danger w-100 mb-2">Pesan Sekarang</a>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20butuh%20informasi%20layanan%20{{ urlencode($item->judul) }}" 
                           class="btn btn-outline-danger w-100">Hubungi Admin</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">Belum ada layanan tersedia.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
