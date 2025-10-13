@extends('admin.layouts.master')

@section('title', 'Edit Brevet C')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Data Brevet C</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('brevet-c.update', $brevetC->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <!-- Gambar Preview -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($brevetC->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $brevetC->gambar) }}" alt="{{ $brevetC->judul }}" class="img-thumbnail" width="200" id="image-preview">
                            </div>
                        @else
                            <div class="mb-2">
                                <div class="text-center text-muted py-3 border rounded">
                                    <i class="fas fa-image fa-2x mb-2"></i>
                                    <p>No Image</p>
                                </div>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" onchange="previewImage(this)">
                        <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul *</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $brevetC->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari *</label>
                        <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" value="{{ old('hari', $brevetC->hari) }}" required>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $brevetC->tanggal_mulai->format('Y-m-d')) }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $brevetC->tanggal_selesai->format('Y-m-d')) }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $brevetC->harga) }}" min="0" step="0.01" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Lokasi" class="form-label">Lokasi *</label>
                        <textarea class="form-control @error('Lokasi') is-invalid @enderror" id="Lokasi" name="Lokasi" rows="8" required>{{ old('Lokasi', $brevetC->lokasi) }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="8" required>{{ old('deskripsi', $brevetC->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Fasilitas Section -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Fasilitas</h6>
                    <button type="button" class="btn btn-sm btn-success" id="addFasilitas">
                        <i class="fas fa-plus"></i> Tambah Fasilitas
                    </button>
                </div>
                <div class="card-body" id="fasilitas-container">
                    @if(old('fasilitas'))
                        <!-- Jika ada error dan kembali ke form, gunakan data old -->
                        @foreach(old('fasilitas') as $index => $fasilitas)
                        <div class="row fasilitas-item mb-3">
                            <div class="col-md-5">
                                <label class="form-label">Fasilitas *</label>
                                <input type="text" class="form-control @error('fasilitas.'.$index) is-invalid @enderror" name="fasilitas[]" value="{{ $fasilitas }}" required>
                                @error('fasilitas.'.$index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan.'.$index) is-invalid @enderror" name="keterangan[]" value="{{ old('keterangan.'.$index) }}">
                                @error('keterangan.'.$index)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-danger btn-sm remove-fasilitas">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Jika tidak ada error, gunakan data dari database -->
                        @foreach($brevetC->details as $index => $detail)
                        <div class="row fasilitas-item mb-3">
                            <div class="col-md-5">
                                <label class="form-label">Fasilitas *</label>
                                <input type="text" class="form-control" name="fasilitas[]" value="{{ $detail->fasilitas }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan[]" value="{{ $detail->keterangan }}">
                            </div>
                            <div class="col-md-1">
                                <label class="form-label">&nbsp;</label>
                                @if($index > 0)
                                <button type="button" class="btn btn-danger btn-sm remove-fasilitas">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('brevet-c.show', $brevetC->id) }}" class="btn btn-info">
                    <i class="fas fa-eye"></i> Lihat Detail
                </a>
                <a href="{{ route('brevet-c.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Preview image function
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            if (!preview) {
                // Create new preview if doesn't exist
                const newPreview = document.createElement('img');
                newPreview.id = 'image-preview';
                newPreview.className = 'img-thumbnail mb-2';
                newPreview.width = 200;
                newPreview.src = e.target.result;
                input.parentNode.insertBefore(newPreview, input);
            } else {
                preview.src = e.target.result;
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Add fasilitas
document.getElementById('addFasilitas').addEventListener('click', function() {
    const container = document.getElementById('fasilitas-container');
    const items = container.querySelectorAll('.fasilitas-item');
    const lastItem = items[items.length - 1];
    const newItem = lastItem.cloneNode(true);
    
    // Clear values
    const inputs = newItem.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
        input.classList.remove('is-invalid');
    });
    
    // Remove error messages
    const errorMessages = newItem.querySelectorAll('.invalid-feedback');
    errorMessages.forEach(error => error.remove());
    
    // Ensure remove button is visible
    const removeBtn = newItem.querySelector('.remove-fasilitas');
    if (removeBtn) {
        removeBtn.style.display = 'block';
    } else {
        // Create remove button if doesn't exist
        const removeCol = newItem.querySelector('.col-md-1:last-child');
        if (removeCol) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'btn btn-danger btn-sm remove-fasilitas';
            btn.innerHTML = '<i class="fas fa-trash"></i>';
            removeCol.innerHTML = '';
            removeCol.appendChild(btn);
        }
    }
    
    container.appendChild(newItem);
});

// Remove fasilitas
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-fasilitas') || e.target.closest('.remove-fasilitas')) {
        const button = e.target.classList.contains('remove-fasilitas') ? e.target : e.target.closest('.remove-fasilitas');
        const item = button.closest('.fasilitas-item');
        const items = document.querySelectorAll('.fasilitas-item');
        
        if (items.length > 1) {
            item.remove();
        }
    }
});

// Date validation
document.getElementById('tanggal_selesai').addEventListener('change', function() {
    const startDate = new Date(document.getElementById('tanggal_mulai').value);
    const endDate = new Date(this.value);
    
    if (endDate < startDate) {
        alert('Tanggal selesai tidak boleh sebelum tanggal mulai');
        this.value = '';
    }
});
</script>
@endpush