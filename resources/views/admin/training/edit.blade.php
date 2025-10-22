@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header ">
        <h4 class="mb-0">Edit In House Training</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.training.update', $training->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <!-- Informasi Utama Training -->
                <div class="col-md-6">
                    <h5 class="border-bottom pb-2">Informasi Utama Training</h5>
                    
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Training <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $training->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $training->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Training <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal', $training->tanggal) }}" required>
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
                                   id="harga" name="harga" value="{{ old('harga', $training->harga) }}" min="0" required>
                        </div>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Training</label>
                        
                        <!-- Current Image Preview -->
                        @if($training->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $training->gambar) }}" 
                                     class="img-thumbnail" width="150" id="currentImage">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="hapus_gambar" id="hapus_gambar">
                                    <label class="form-check-label text-danger" for="hapus_gambar">
                                        Hapus gambar saat ini
                                    </label>
                                </div>
                            </div>
                        @endif

                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" name="gambar" accept="image/*">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah gambar</div>
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
                               id="materi" name="materi" value="{{ old('materi', $training->detail->materi) }}" required>
                        @error('materi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Instruktur -->
                    <div class="mb-3">
                        <label for="instruktur" class="form-label">Nama Instruktur <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('instruktur') is-invalid @enderror" 
                               id="instruktur" name="instruktur" value="{{ old('instruktur', $training->detail->instruktur) }}" required>
                        @error('instruktur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Durasi -->
                    <div class="mb-3">
                        <label for="durasi_jam" class="form-label">Durasi (Jam) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('durasi_jam') is-invalid @enderror" 
                               id="durasi_jam" name="durasi_jam" value="{{ old('durasi_jam', $training->detail->durasi_jam) }}" min="1" required>
                        @error('durasi_jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tempat -->
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat Training <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror" 
                               id="tempat" name="tempat" value="{{ old('tempat', $training->detail->tempat) }}" required>
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kuota Peserta -->
                    <div class="mb-3">
                        <label for="kuota_peserta" class="form-label">Kuota Peserta <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('kuota_peserta') is-invalid @enderror" 
                               id="kuota_peserta" name="kuota_peserta" value="{{ old('kuota_peserta', $training->detail->kuota_peserta) }}" min="1" required>
                        @error('kuota_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Peralatan Dibutuhkan -->
                    <div class="mb-3">
                        <label for="peralatan_dibutuhkan" class="form-label">Peralatan yang Dibutuhkan</label>
                        <textarea class="form-control @error('peralatan_dibutuhkan') is-invalid @enderror" 
                                  id="peralatan_dibutuhkan" name="peralatan_dibutuhkan" rows="3">{{ old('peralatan_dibutuhkan', $training->detail->peralatan_dibutuhkan) }}</textarea>
                        @error('peralatan_dibutuhkan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file_path" class="form-label">file Training<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('file_path') is-invalid @enderror" 
                               id="file_path" name="file_path" value="{{ old('file_path', $training->detail->file_path) }}" required>
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Button Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-edit"></i> Update Training
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

<!-- Image Preview & Delete Toggle Script -->
<script>
    // Preview new image
    document.getElementById('gambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const currentImage = document.getElementById('currentImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (currentImage) {
                    currentImage.src = e.target.result;
                } else {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'mb-2';
                    previewDiv.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" width="150" id="currentImage">';
                    document.getElementById('gambar').parentNode.insertBefore(previewDiv, document.getElementById('gambar'));
                }
            }
            reader.readAsDataURL(file);
        }
    });

    // Toggle current image deletion
    document.getElementById('hapus_gambar')?.addEventListener('change', function(e) {
        const currentImage = document.getElementById('currentImage');
        if (e.target.checked && currentImage) {
            currentImage.style.opacity = '0.3';
        } else if (currentImage) {
            currentImage.style.opacity = '1';
        }
    });
</script>
@endsection