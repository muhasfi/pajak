<!-- resources/views/brevetab/edit.blade.php -->
@extends('admin.layouts.master')
@section('title', 'Edit Brevet AB')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Brevet AB - {{ $brevetab->judul }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.brevetab.update', $brevetab) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <h5>Informasi Utama</h5>
                    
                    <!-- Preview Gambar -->
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div>
                            @if($brevetab->gambar)
                                <img src="{{ asset('storage/' . $brevetab->gambar) }}" alt="{{ $brevetab->judul }}" class="img-thumbnail mb-2" style="max-height: 200px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hapus_gambar" name="hapus_gambar">
                                    <label class="form-check-label text-danger" for="hapus_gambar">
                                        Hapus gambar saat ini
                                    </label>
                                </div>
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center mb-2" style="height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                                <p class="text-muted">Tidak ada gambar</p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ubah Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul *</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $brevetab->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $brevetab->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari *</label>
                        <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" value="{{ old('hari', $brevetab->hari) }}" required>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $brevetab->tanggal_mulai->format('Y-m-d')) }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $brevetab->tanggal_selesai->format('Y-m-d')) }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $brevetab->harga) }}" min="0" step="0.01" required>
                        </div>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Detail Brevet AB</h5>
                    
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas *</label>
                        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" value="{{ old('fasilitas', $brevetab->detail->fasilitas) }}" required>
                        @error('fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_fasilitas" class="form-label">Deskripsi Fasilitas</label>
                        <textarea class="form-control @error('deskripsi_fasilitas') is-invalid @enderror" id="deskripsi_fasilitas" name="deskripsi_fasilitas" rows="3">{{ old('deskripsi_fasilitas', $brevetab->detail->deskripsi_fasilitas) }}</textarea>
                        @error('deskripsi_fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                                <input type="number" class="form-control @error('durasi_jam') is-invalid @enderror" id="durasi_jam" name="durasi_jam" value="{{ old('durasi_jam', $brevetab->detail->durasi_jam) }}" min="1" placeholder="Contoh: 8">
                                @error('durasi_jam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kuota_peserta" class="form-label">Kuota Peserta *</label>
                                <input type="number" class="form-control @error('kuota_peserta') is-invalid @enderror" id="kuota_peserta" name="kuota_peserta" value="{{ old('kuota_peserta', $brevetab->detail->kuota_peserta) }}" min="1" required>
                                @error('kuota_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="instruktur" class="form-label">Instruktur</label>
                        <input type="text" class="form-control @error('instruktur') is-invalid @enderror" id="instruktur" name="instruktur" value="{{ old('instruktur', $brevetab->detail->instruktur) }}" placeholder="Nama instruktur">
                        @error('instruktur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi *</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $brevetab->detail->lokasi) }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level *</label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                            <option value="">Pilih Level</option>
                            <option value="Beginner" {{ old('level', $brevetab->detail->level) == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="Intermediate" {{ old('level', $brevetab->detail->level) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Advanced" {{ old('level', $brevetab->detail->level) == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="syarat_peserta" class="form-label">Syarat Peserta</label>
                        <textarea class="form-control @error('syarat_peserta') is-invalid @enderror" id="syarat_peserta" name="syarat_peserta" rows="3" placeholder="Persyaratan untuk mengikuti pelatihan">{{ old('syarat_peserta', $brevetab->detail->syarat_peserta) }}</textarea>
                        @error('syarat_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="materi_pelatihan" class="form-label">Materi Pelatihan</label>
                        <textarea class="form-control @error('materi_pelatihan') is-invalid @enderror" id="materi_pelatihan" name="materi_pelatihan" rows="4" placeholder="Rincian materi yang akan diajarkan">{{ old('materi_pelatihan', $brevetab->detail->materi_pelatihan) }}</textarea>
                        @error('materi_pelatihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <div>
                    <a href="{{ route('admin.brevetab.show', $brevetab) }}" class="btn btn-info">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </a>
                    <a href="{{ route('admin.brevetab.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
                <div>
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript untuk validasi tanggal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    
    tanggalMulai.addEventListener('change', function() {
        tanggalSelesai.min = this.value;
    });
    
    tanggalSelesai.addEventListener('change', function() {
        if (this.value < tanggalMulai.value) {
            alert('Tanggal selesai tidak boleh sebelum tanggal mulai');
            this.value = '';
        }
    });
});
</script>
@endsection