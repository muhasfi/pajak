@extends('admin.layouts.master')

@section('title', 'Edit Seminar - ' . $seminar->judul)

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1 class="h3">Edit Seminar</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.seminar.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.seminar.update', $seminar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <!-- Informasi Utama -->
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header text-white">
                    <h5 class="mb-0">Informasi Utama Seminar</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $seminar->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $seminar->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                                   id="tanggal" name="tanggal" value="{{ old('tanggal', \Carbon\Carbon::parse($seminar->tanggal)->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="time" 
                                class="form-control @error('waktu_pelaksanaan') is-invalid @enderror" 
                                id="waktu_pelaksanaan" 
                                name="waktu_pelaksanaan" 
                                value="{{ old('waktu_pelaksanaan', \Carbon\Carbon::parse($seminar->waktu_pelaksanaan)->format('H:i')) }}" 
                                required>
                            @error('waktu_pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" value="{{ old('harga', $seminar->harga) }}" min="0" step="1000" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($seminar->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $seminar->gambar) }}" alt="Gambar Seminar" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" name="gambar" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Tambahan -->
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header text-white">
                    <h5 class="mb-0">Detail Seminar</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="pembicara" class="form-label">Pembicara <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pembicara') is-invalid @enderror" 
                               id="pembicara" name="pembicara" value="{{ old('pembicara', $seminar->detailSeminar->pembicara ?? '') }}" required>
                        @error('pembicara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                               id="lokasi" name="lokasi" value="{{ old('lokasi', $seminar->detailSeminar->lokasi ?? '') }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kuota_peserta" class="form-label">Kuota Peserta <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('kuota_peserta') is-invalid @enderror" 
                               id="kuota_peserta" name="kuota_peserta" value="{{ old('kuota_peserta', $seminar->detailSeminar->kuota_peserta ?? '') }}" min="1" required>
                        @error('kuota_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" 
                               id="kategori" name="kategori" value="{{ old('kategori', $seminar->detailSeminar->kategori ?? '') }}" required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                            <option value="">Pilih Level</option>
                            <option value="Beginner" {{ old('level', $seminar->detailSeminar->level ?? '') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="Intermediate" {{ old('level', $seminar->detailSeminar->level ?? '') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Advanced" {{ old('level', $seminar->detailSeminar->level ?? '') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('fasilitas') is-invalid @enderror" 
                                  id="fasilitas" name="fasilitas" rows="3" required>{{ old('fasilitas', $seminar->detailSeminar->fasilitas ?? '') }}</textarea>
                        @error('fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kontak_person" class="form-label">Kontak Person <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kontak_person') is-invalid @enderror" 
                               id="kontak_person" name="kontak_person" value="{{ old('kontak_person', $seminar->detailSeminar->kontak_person ?? '') }}" required>
                        @error('kontak_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">
                <i class="fas fa-save"></i> Update Seminar
            </button>
        </div>
    </div>
</form>
@endsection
