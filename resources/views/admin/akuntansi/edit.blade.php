<!-- resources/views/accounting-services/edit.blade.php -->
@extends('admin.layouts.master')

@section('title', 'Edit Jasa Akuntansi')

@section('content')
<div class="page-heading">
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Jasa Akuntansi</h3>
                <p class="text-subtitle text-muted">Ubah data akuntansi yang tersedia</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('admin.accounting-services.update', $accountingService->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul Jasa Akuntansi</label>
                        <input 
                            type="text" 
                            id="judul" 
                            name="judul" 
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $accountingService->judul) }}" 
                            placeholder="Masukkan judul Jasa Akuntansi" 
                            required
                        >
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="mb-3">
                        <label for="harga" class="form-label fw-semibold">Harga</label>
                        <input 
                            type="number" 
                            id="harga" 
                            name="harga" 
                            step="0.01"
                            class="form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga', $accountingService->harga) }}" 
                            placeholder="Masukkan harga Jasa Akuntansi"
                            required
                        >
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea 
                            id="deskripsi" 
                            name="deskripsi" 
                            rows="4"
                            class="form-control @error('deskripsi') is-invalid @enderror" 
                            placeholder="Masukkan deskripsi Jasa Akuntansi" 
                            required
                        >{{ old('deskripsi', $accountingService->details->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sumber File</label>
                        <div class="input-group">
                            <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                                <option value="upload" {{ old('file_type', isset($accountingService->details) && filter_var($accountingService->details->file_path, FILTER_VALIDATE_URL) ? '' : 'selected') }}>Upload</option>
                                <option value="link" {{ old('file_type', isset($accountingService->details) && filter_var($accountingService->details->file_path, FILTER_VALIDATE_URL) ? 'selected' : '') }}>Link</option>
                            </select>

                            {{-- Input upload file --}}
                            <input type="file"
                                name="file_upload"
                                class="form-control {{ old('file_type', isset($accountingService->details) && filter_var($accountingService->details->file_path, FILTER_VALIDATE_URL) ? 'd-none' : '') }}"
                                accept=".pdf,.doc,.docx">

                            {{-- Input link --}}
                            <input type="text"
                                name="file_link"
                                value="{{ old('file_link', isset($accountingService->details) && filter_var($accountingService->details->file_path, FILTER_VALIDATE_URL) ? $accountingService->details->file_path : '') }}"
                                class="form-control {{ old('file_type', isset($accountingService->details) && filter_var($accountingService->details->file_path, FILTER_VALIDATE_URL) ? '' : 'd-none') }}"
                                placeholder="https://drive.google.com/...">
                        </div>

                        @if(isset($accountingService->details->file_path))
                            <small class="text-muted">
                                File saat ini:
                                @if(filter_var($accountingService->details->file_path, FILTER_VALIDATE_URL))
                                    <a href="{{ $accountingService->details->file_path }}" target="_blank">Lihat Link</a>
                                @else
                                    <a href="{{ asset('storage/' . $accountingService->details->file_path) }}" target="_blank">Lihat File</a>
                                @endif
                            </small>
                        @endif
                    </div>

                    {{-- Benefit --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Benefit</label>
                        <div id="benefits-container">
                            @if($accountingService->details && $accountingService->details->benefit)
                                @foreach($accountingService->details->benefit as $benefit)
                                    <div class="benefit-item mb-2">
                                        <div class="input-group">
                                            <input 
                                                type="text" 
                                                name="benefit[]" 
                                                value="{{ $benefit }}" 
                                                class="form-control" 
                                                placeholder="Masukkan benefit" 
                                                required
                                            >
                                            <button type="button" class="btn btn-outline-danger remove-benefit">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="benefit-item mb-2">
                                    <div class="input-group">
                                        <input 
                                            type="text" 
                                            name="benefit[]" 
                                            class="form-control" 
                                            placeholder="Masukkan benefit" 
                                            required
                                        >
                                        <button type="button" class="btn btn-outline-danger remove-benefit">
                                            <i class="bi bi-x-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-benefit">
                            <i class="bi bi-plus-circle"></i> Tambah Benefit
                        </button>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.accounting-services.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update Jasa Akuntansi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection


<script>
function toggleFileInput(select) {
    const fileInput = select.closest('.input-group').querySelector('[name="file_upload"]');
    const linkInput = select.closest('.input-group').querySelector('[name="file_link"]');

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

    addBenefitBtn.addEventListener('click', function() {
        const newBenefit = document.createElement('div');
        newBenefit.className = 'benefit-item mb-2';
        newBenefit.innerHTML = `
            <div class="input-group">
                <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
                <button type="button" class="btn btn-outline-danger remove-benefit">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
        `;
        benefitsContainer.appendChild(newBenefit);
    });

    benefitsContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-benefit')) {
            if (document.querySelectorAll('.benefit-item').length > 1) {
                e.target.closest('.benefit-item').remove();
            }
        }
    });
});
</script>
