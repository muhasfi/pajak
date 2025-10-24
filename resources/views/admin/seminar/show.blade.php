@extends('admin.layouts.master')
@section('title', 'Detail Brevet AB')

@section('content')
<div class="page-heading mb-4">
    <h2>Detail Brevet AB</h2>
    <a href="{{ route('admin.seminar.index') }}" class="btn btn-secondary mt-2">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-4 text-center">
                @if($seminar->gambar)
                    <img src="{{ asset('storage/' . $seminar->gambar) }}" 
                         alt="{{ $seminar->judul }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-height: 250px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 250px;">
                        <i class="bi bi-image text-muted fs-1"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h4 class="mb-2">{{ $seminar->judul }}</h4>
                <p class="text-muted">{{ $seminar->deskripsi }}</p>

                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Tanggal</th>
                        <td>
                            {{ $seminar->tanggal_mulai->format('d M Y') }} - 
                            {{ $seminar->tanggal_selesai->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Hari</th>
                        <td>{{ $seminar->hari }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($seminar->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{ $seminar->detail->lokasi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>{{ $seminar->detail->level ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Kuota Peserta</th>
                        <td>{{ $seminar->detail->kuota_peserta ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Durasi (Jam)</th>
                        <td>{{ $seminar->detail->durasi_jam ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Instruktur</th>
                        <td>{{ $seminar->detail->instruktur ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        @if($seminar->detail)
        <div class="row">
            <div class="col-md-6">
                <h5>Fasilitas</h5>
                <p><strong>{{ $seminar->detail->fasilitas }}</strong></p>
                <p class="text-muted">{{ $seminar->detail->deskripsi_fasilitas ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <h5>Syarat Peserta</h5>
                <p>{{ $seminar->detail->syarat_peserta ?? '-' }}</p>

                <h5 class="mt-3">Materi Pelatihan</h5>
                <p>{{ $seminar->detail->materi_pelatihan ?? '-' }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
