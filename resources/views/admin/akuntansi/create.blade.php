@extends('admin.layouts.master')
@section('title', 'Tambah Jasa Akuntansi')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Jasa Akuntansi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('admin.accounting-services.index') }}" 
                   class="btn btn-secondary float-start float-lg-end">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.accounting-services.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul Jasa Akuntansi</label>
                        <input type="text" 
                               id="judul" 
                               name="judul" 
                               class="form-control @error('judul') is-invalid @enderror" 
                               placeholder="Masukkan judul Jasa Akuntansi"
                               value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label fw-semibold">Harga</label>
                        <input type="number" 
                               id="harga" 
                               name="harga" 
                               step="0.01"
                               class="form-control @error('harga') is-invalid @enderror" 
                               placeholder="Masukkan harga Jasa Akuntansi"
                               value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea id="deskripsi" 
                                  name="deskripsi" 
                                  rows="4"
                                  class="form-control @error('deskripsi') is-invalid @enderror" 
                                  placeholder="Masukkan deskripsi Jasa Akuntansi" required>{{ old('deskripsi') }}</textarea>
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

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Benefit</label>
                        <div id="benefits-container">
                            <div class="benefit-item mb-2">
                                <div class="input-group">
                                    <input type="text" 
                                           name="benefit[]" 
                                           class="form-control @error('benefit.*') is-invalid @enderror" 
                                           placeholder="Masukkan benefit" required>
                                    <button type="button" class="btn btn-outline-danger remove-benefit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                @error('benefit.*')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-benefit">
                            <i class="bi bi-plus-circle"></i> Tambah Benefit
                        </button>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
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
    const benefitsContainer = document.getElementById('benefits-container');
    const addBenefitBtn = document.getElementById('add-benefit');

    // Tambah benefit baru
    addBenefitBtn.addEventListener('click', function() {
        const newBenefit = document.createElement('div');
        newBenefit.className = 'benefit-item mb-2';
        newBenefit.innerHTML = `
            <div class="input-group">
                <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
                <button type="button" class="btn btn-outline-danger remove-benefit">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;
        benefitsContainer.appendChild(newBenefit);
    });

    // Hapus benefit
    benefitsContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-benefit')) {
            if (document.querySelectorAll('.benefit-item').length > 1) {
                e.target.closest('.benefit-item').remove();
            }
        }
    });
});
</script>
@endsection
