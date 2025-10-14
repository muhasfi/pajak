<!-- resources/views/accounting-services/create.blade.php -->
@extends('admin.layouts.master')
@section('title', 'Tambah Jasa Akuntansi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Tambah Jasa Akuntansi Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('accounting-services.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Layanan</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" value="{{ old('harga') }}" step="0.01" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Benefit</label>
                        <div id="benefits-container">
                            <div class="benefit-item mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="benefit[]" placeholder="Masukkan benefit" required>
                                    <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-benefit">Tambah Benefit</button>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('accounting-services.index') }}" class="btn btn-secondary me-md-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const benefitsContainer = document.getElementById('benefits-container');
        const addBenefitBtn = document.getElementById('add-benefit');

        // Fungsi untuk menambah field benefit baru
        addBenefitBtn.addEventListener('click', function() {
            const newBenefit = document.createElement('div');
            newBenefit.className = 'benefit-item mb-2';
            newBenefit.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" name="benefit[]" placeholder="Masukkan benefit" required>
                    <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
                </div>
            `;
            benefitsContainer.appendChild(newBenefit);
        });

        // Fungsi untuk menghapus field benefit (Event Delegation)
        benefitsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-benefit')) {
                // Pastikan selalu ada minimal satu field benefit
                if (document.querySelectorAll('.benefit-item').length > 1) {
                    e.target.closest('.benefit-item').remove();
                }
            }
        });
    });
</script>

@endsection