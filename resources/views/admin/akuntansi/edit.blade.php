<!-- resources/views/accounting-services/edit.blade.php -->
@extends('admin.layouts.master')

@section('title', 'Edit Jasa Akuntansi')

@section('content')
<div class="page-heading">
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Jasa Akuntansi</h3>
                <p class="text-subtitle text-muted">Ubah data layanan akuntansi yang tersedia</p>
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
                        <label for="judul" class="form-label fw-semibold">Judul Layanan</label>
                        <input 
                            type="text" 
                            id="judul" 
                            name="judul" 
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $accountingService->judul) }}" 
                            placeholder="Masukkan judul layanan" 
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
                            placeholder="Masukkan harga layanan"
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
                            placeholder="Masukkan deskripsi layanan" 
                            required
                        >{{ old('deskripsi', $accountingService->details->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                            <i class="bi bi-save"></i> Update Layanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection


<script>
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
