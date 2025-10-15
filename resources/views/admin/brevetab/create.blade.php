<!-- resources/views/brevetab/create.blade.php -->
@extends('admin.layouts.master')
@section('title', 'Tambah Brevet AB')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Brevet AB Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.brevetab.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <h5>Informasi Utama</h5>
                    
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul *</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari *</label>
                        <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" value="{{ old('hari') }}" required>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" min="0" step="0.01" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Detail Brevet AB</h5>
                    
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas *</label>
                        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" value="{{ old('fasilitas') }}" required>
                        @error('fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_fasilitas" class="form-label">Deskripsi Fasilitas</label>
                        <textarea class="form-control @error('deskripsi_fasilitas') is-invalid @enderror" id="deskripsi_fasilitas" name="deskripsi_fasilitas" rows="2">{{ old('deskripsi_fasilitas') }}</textarea>
                        @error('deskripsi_fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                                <input type="number" class="form-control @error('durasi_jam') is-invalid @enderror" id="durasi_jam" name="durasi_jam" value="{{ old('durasi_jam') }}" min="1">
                                @error('durasi_jam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kuota_peserta" class="form-label">Kuota Peserta *</label>
                                <input type="number" class="form-control @error('kuota_peserta') is-invalid @enderror" id="kuota_peserta" name="kuota_peserta" value="{{ old('kuota_peserta') }}" min="1" required>
                                @error('kuota_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="instruktur" class="form-label">Instruktur</label>
                        <input type="text" class="form-control @error('instruktur') is-invalid @enderror" id="instruktur" name="instruktur" value="{{ old('instruktur') }}">
                        @error('instruktur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi *</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level *</label>
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
                        <label for="syarat_peserta" class="form-label">Syarat Peserta</label>
                        <textarea class="form-control @error('syarat_peserta') is-invalid @enderror" id="syarat_peserta" name="syarat_peserta" rows="2">{{ old('syarat_peserta') }}</textarea>
                        @error('syarat_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="materi_pelatihan" class="form-label">Materi Pelatihan</label>
                        <textarea class="form-control @error('materi_pelatihan') is-invalid @enderror" id="materi_pelatihan" name="materi_pelatihan" rows="3">{{ old('materi_pelatihan') }}</textarea>
                        @error('materi_pelatihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.brevetab.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection