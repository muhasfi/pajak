@extends('admin.layouts.master')
@section('title', 'Tambah Training')

@section('content')
<div class="card">
    <div class="card-header text-white">
        <h4 class="mb-0">Tambah In House Training Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.training.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <!-- Informasi Utama Training -->
                <div class="col-md-6">
                    <h5 class="border-bottom pb-2">Informasi Utama Training</h5>
                    
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Training <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Training <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                                   id="harga" name="harga" value="{{ old('harga') }}" min="0" required>
                        </div>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Training</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" name="gambar" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Detail Training -->
                <div class="col-md-6">
                    <h5 class="border-bottom pb-2">Detail Training</h5>
                    
                    <!-- Materi -->
                    <div class="mb-3">
                        <label for="materi" class="form-label">Materi Training <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('materi') is-invalid @enderror" 
                               id="materi" name="materi" value="{{ old('materi') }}" required>
                        @error('materi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Instruktur -->
                    <div class="mb-3">
                        <label for="instruktur" class="form-label">Nama Instruktur <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('instruktur') is-invalid @enderror" 
                               id="instruktur" name="instruktur" value="{{ old('instruktur') }}" required>
                        @error('instruktur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Durasi -->
                    <div class="mb-3">
                        <label for="durasi_jam" class="form-label">Durasi (Jam) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('durasi_jam') is-invalid @enderror" 
                               id="durasi_jam" name="durasi_jam" value="{{ old('durasi_jam') }}" min="1" required>
                        @error('durasi_jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tempat -->
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat Training <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror" 
                               id="tempat" name="tempat" value="{{ old('tempat') }}" required>
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kuota Peserta -->
                    <div class="mb-3">
                        <label for="kuota_peserta" class="form-label">Kuota Peserta <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('kuota_peserta') is-invalid @enderror" 
                               id="kuota_peserta" name="kuota_peserta" value="{{ old('kuota_peserta') }}" min="1" required>
                        @error('kuota_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Peralatan Dibutuhkan -->
                    <div class="mb-3">
                        <label for="peralatan_dibutuhkan" class="form-label">Peralatan yang Dibutuhkan</label>
                        <textarea class="form-control @error('peralatan_dibutuhkan') is-invalid @enderror" 
                                  id="peralatan_dibutuhkan" name="peralatan_dibutuhkan" rows="3">{{ old('peralatan_dibutuhkan') }}</textarea>
                        @error('peralatan_dibutuhkan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file_path" class="form-label">Link Training <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('file_path') is-invalid @enderror" 
                               id="file_path" name="file_path" value="{{ old('file_path') }}" required>
                        @error('file_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Button Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Training
                        </button>
                        <a href="{{ route('admin.training.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Preview Image Script -->
<script>
    document.getElementById('gambar').addEventListener('change', function(e) {
        const preview = document.getElementById('imagePreview');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (!preview) {
                    const previewDiv = document.createElement('div');
                    previewDiv.id = 'imagePreview';
                    previewDiv.className = 'mt-2';
                    previewDiv.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" width="150">';
                    document.getElementById('gambar').parentNode.appendChild(previewDiv);
                } else {
                    preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" width="150">';
                }
            }
            reader.readAsDataURL(file);
        } else if (preview) {
            preview.remove();
        }
    });
</script>
@endsection