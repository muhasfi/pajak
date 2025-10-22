@extends('admin.layouts.master')
@section('title', 'Tambah Pajak')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Layanan Pajak Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.pajak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Layanan Pajak</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                       id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                           id="harga" name="harga" value="{{ old('harga') }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                          id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- File Upload -->
            <div class="mb-3">
                <label class="form-label">Sumber File</label>
                <div class="input-group">
                    <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                        <option value="upload">Upload</option>
                        <option value="link">Link</option>
                    </select>

                    <input type="file" name="file_upload" class="form-control" accept=".pdf,.doc,.docx">
                    <input type="text" name="file_link" class="form-control d-none" placeholder="https://drive.google.com/...">
                </div>
            </div>

            <div class="form-group mb-3">
                <label>Benefit Layanan</label>
                <small class="text-muted d-block mb-2">Tambahkan benefit yang akan didapatkan pelanggan</small>

                <div id="benefit-container">
                    <!-- Input pertama -->
                    <div class="input-group mb-2 benefit-item">
                        <input type="text" name="benefit[]" class="form-control" 
                                placeholder="Benefit 1" value="{{ old('benefit.0') }}">
                        <button type="button" class="btn btn-outline-secondary" disabled>
                            <i class="bi bi-grip-vertical"></i>
                        </button>
                    </div>

                    <!-- Jika ada old input -->
                    @if(old('benefit'))
                        @foreach(old('benefit') as $index => $benefit)
                            @if($index > 0)
                                <div class="input-group mb-2 benefit-item">
                                    <input type="text" name="benefit[]" class="form-control" 
                                            placeholder="Benefit {{ $index + 1 }}" value="{{ $benefit }}">
                                    <button type="button" class="btn btn-outline-danger remove-benefit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <button type="button" class="btn btn-outline-primary mt-2" id="add-benefit">
                    <i class="bi bi-plus-circle"></i> Tambah Benefit
                </button>

                @error('benefit')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
                @error('benefit.*')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.pajak.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
function toggleFileInput(select) {
    let fileInput = select.closest('.input-group').querySelector('[name="file_upload"]');
    let linkInput = select.closest('.input-group').querySelector('[name="file_link"]');
    
    if (select.value === 'upload') {
        fileInput.classList.remove('d-none');
        linkInput.classList.add('d-none');
    } else {
        fileInput.classList.add('d-none');
        linkInput.classList.remove('d-none');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const benefitContainer = document.getElementById('benefit-container');
    const addBenefitBtn = document.getElementById('add-benefit');

    addBenefitBtn.addEventListener('click', function() {
        const benefitCount = benefitContainer.children.length;
        const newIndex = benefitCount + 1;

        const benefitItem = document.createElement('div');
        benefitItem.className = 'input-group mb-2 benefit-item';
        benefitItem.innerHTML = `
            <input type="text" name="benefit[]" class="form-control" placeholder="Benefit ${newIndex}" required>
            <button type="button" class="btn btn-outline-danger remove-benefit">
                <i class="bi bi-trash"></i>
            </button>
        `;
        benefitContainer.appendChild(benefitItem);
    });

    benefitContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-benefit')) {
            const item = e.target.closest('.benefit-item');
            if (benefitContainer.children.length > 1) item.remove();
        }
    });
});
</script>
@endsection