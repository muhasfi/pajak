<!-- resources/views/audits/edit.blade.php -->
@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Edit Audit</h2>
                <a class="btn btn-secondary" href="{{ route('audits.index') }}">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terdapat kesalahan dalam input data.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('audits.update', $audit->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Informasi Audit</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="judul" class="form-label">
                                <strong>Judul Audit:</strong>
                            </label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   placeholder="Masukkan Judul Audit" 
                                   value="{{ old('judul', $audit->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="harga" class="form-label">
                                <strong>Harga (Rp):</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" step="0.01" name="harga" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       placeholder="Masukkan Harga" 
                                       value="{{ old('harga', $audit->harga) }}">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Detail Audit</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">
                                <strong>Deskripsi:</strong>
                            </label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      style="height: 120px" name="deskripsi" 
                                      placeholder="Masukkan Deskripsi Lengkap Audit">{{ old('deskripsi', $audit->auditDetails->first()->deskripsi ?? '') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="benefit" class="form-label">
                                <strong>Benefit:</strong>
                                <small class="text-muted"> (Satu benefit per baris)</small>
                            </label>
                            <textarea class="form-control @error('benefit') is-invalid @enderror" 
                                      style="height: 150px" name="benefit" 
                                      placeholder="Masukkan Benefit, satu poin per baris&#10;Contoh:&#10;- Benefit 1&#10;- Benefit 2&#10;- Benefit 3">
@if(isset($audit->auditDetails->first()->benefit))
@foreach(json_decode($audit->auditDetails->first()->benefit) as $benefit)
{{ $benefit }}
@endforeach
@endif</textarea>
                            @error('benefit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Tips: Gunakan tanda "-" di awal setiap baris untuk format yang lebih rapi.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-check-circle"></i> Update Data
                </button>
                <a href="{{ route('audits.show', $audit->id) }}" class="btn btn-outline-secondary btn-lg ms-2">
                    <i class="bi bi-eye"></i> Lihat Detail
                </a>
                <a href="{{ route('audits.index') }}" class="btn btn-outline-danger btn-lg ms-2">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
            </div>
        </div>
    </form>
</div>

<style>
.card {
    border: none;
    border-radius: 10px;
}
.card-header {
    border-radius: 10px 10px 0 0 !important;
}
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
.btn {
    border-radius: 6px;
}
</style>
@endsection