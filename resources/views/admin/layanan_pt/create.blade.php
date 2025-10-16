@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Layanan Baru</h5>
                    <a href="{{ route('layanan-pt.index') }}" class="btn btn-light btn-sm">
                        ← Kembali
                    </a>
                </div>
                <div class="card-body">
                    
                    <!-- Notifikasi Error -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Terdapat masalah dengan inputan Anda.<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('layanan-pt.store') }}" method="POST">
                        @csrf
                        
                        <!-- Input Judul -->
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label fw-bold">Judul Layanan <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" placeholder="Masukkan judul layanan" 
                                   value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Harga -->
                        <div class="form-group mb-3">
                            <label for="harga" class="form-label fw-bold">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" 
                                       id="harga" placeholder="0" 
                                       value="{{ old('harga') }}">
                            </div>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Textarea Deskripsi -->
                        <div class="form-group mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" rows="4" placeholder="Masukkan deskripsi lengkap layanan">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dynamic Benefit Input -->
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Benefit Layanan <span class="text-danger">*</span></label>
                            <small class="text-muted d-block mb-2">Tambahkan benefit yang akan didapatkan pelanggan</small>
                            
                            <div id="benefit-container">
                                <!-- Benefit input pertama -->
                                <div class="input-group mb-2 benefit-item">
                                    <input type="text" name="benefit[]" class="form-control" 
                                           placeholder="Benefit 1" value="{{ old('benefit.0') }}">
                                    <button type="button" class="btn btn-outline-secondary" disabled>
                                        <i class="fas fa-grip-lines"></i>
                                    </button>
                                </div>
                                
                                <!-- Benefit input tambahan dari old input -->
                                @if(old('benefit'))
                                    @foreach(old('benefit') as $index => $benefit)
                                        @if($index > 0)
                                            <div class="input-group mb-2 benefit-item">
                                                <input type="text" name="benefit[]" class="form-control" 
                                                       placeholder="Benefit {{ $index + 1 }}" value="{{ $benefit }}">
                                                <button type="button" class="btn btn-outline-danger remove-benefit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            
                            @error('benefit')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            @error('benefit.*')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            
                            <!-- Tombol Tambah Benefit -->
                            <button type="button" class="btn btn-outline-primary mt-2" id="add-benefit">
                                <i class="fas fa-plus"></i> Tambah Benefit
                            </button>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save"></i> Simpan Layanan
                            </button>
                            <a href="{{ route('layanan-pt.index') }}" class="btn btn-secondary px-4">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Dynamic Benefit -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const benefitContainer = document.getElementById('benefit-container');
    const addBenefitBtn = document.getElementById('add-benefit');
    
    // Tambah benefit baru
    addBenefitBtn.addEventListener('click', function() {
        const benefitCount = benefitContainer.children.length;
        const newIndex = benefitCount + 1;
        
        const benefitItem = document.createElement('div');
        benefitItem.className = 'input-group mb-2 benefit-item';
        benefitItem.innerHTML = `
            <input type="text" name="benefit[]" class="form-control" 
                   placeholder="Benefit ${newIndex}" required>
            <button type="button" class="btn btn-outline-danger remove-benefit">
                <i class="fas fa-trash"></i>
            </button>
        `;
        
        benefitContainer.appendChild(benefitItem);
    });
    
    // Hapus benefit
    benefitContainer.addEventListener('click', function(e) {
        if(e.target.closest('.remove-benefit')) {
            const benefitItem = e.target.closest('.benefit-item');
            if(benefitContainer.children.length > 1) {
                benefitItem.remove();
            }
        }
    });
});
</script>

<!-- Optional: Add Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
.benefit-item {
    transition: all 0.3s ease;
}
</style>
@endsection