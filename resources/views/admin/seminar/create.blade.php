@extends('admin.layouts.master')

@section('title', 'Tambah Seminar')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="h3">Tambah Seminar Baru</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.seminar.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<form action="{{ route('admin.seminar.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white">
                    <h5 class="mb-0">Informasi Utama Seminar</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Seminar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('waktu_pelaksanaan') is-invalid @enderror" 
                                   id="waktu_pelaksanaan" name="waktu_pelaksanaan" 
                                   value="{{ old('waktu_pelaksanaan', isset($seminar) ? $seminar->waktu_pelaksanaan : '') }}" required>
                            @error('waktu_pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" min="0" step="1000" required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Seminar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white">
                    <h5 class="mb-0">Detail Tambahan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="pembicara" class="form-label">Pembicara <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pembicara') is-invalid @enderror" id="pembicara" name="pembicara" value="{{ old('pembicara') }}" required>
                        @error('pembicara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kuota_peserta" class="form-label">Kuota Peserta <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('kuota_peserta') is-invalid @enderror" id="kuota_peserta" name="kuota_peserta" value="{{ old('kuota_peserta') }}" min="1" required>
                        @error('kuota_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori') }}" required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                            <option value="">Pilih Level</option>
                            <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" rows="3" required>{{ old('fasilitas') }}</textarea>
                        @error('fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kontak_person" class="form-label">Kontak Person <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kontak_person') is-invalid @enderror" id="kontak_person" name="kontak_person" value="{{ old('kontak_person') }}" required>
                        @error('kontak_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file_path" class="form-label">Link Seminar</label>
                        <input type="text" name="file_path" id="file_path" class="form-control"
                            value="{{ old('file_path', $seminar->detailSeminar->file_path ?? '') }}"
                            placeholder="Contoh: https://zoom.us/j/xxxxxx">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Simpan Seminar
                </button>
            </div>
        </div>
    </div>
</form>
@endsection