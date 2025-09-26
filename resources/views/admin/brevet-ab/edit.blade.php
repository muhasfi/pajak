@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Data Brevet AB</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('brevet-ab.update', $brevet_ab->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul *</label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                               value="{{ old('judul', $brevet_ab->judul) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari *</label>
                        <input type="text" class="form-control" id="hari" name="hari" 
                               value="{{ old('hari', $brevet_ab->hari) }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi *</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>
                    {{ old('deskripsi', $brevet_ab->deskripsi) }}
                </textarea>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai *</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" 
                               value="{{ old('tanggal_mulai', $brevet_ab->tanggal_mulai->format('Y-m-d')) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai *</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" 
                               value="{{ old('tanggal_selesai', $brevet_ab->tanggal_selesai->format('Y-m-d')) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" class="form-control" id="harga" name="harga" 
                               value="{{ old('harga', $brevet_ab->harga) }}" step="0.01" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                @if($brevet_ab->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/brevet-ab/' . $brevet_ab->gambar) }}" 
                             alt="{{ $brevet_ab->judul }}" 
                             class="img-thumbnail" 
                             style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('brevet-ab.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection