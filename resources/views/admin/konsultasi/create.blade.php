@extends('admin.layouts.master')
@section('title', 'Tambah Layanan Konsultasi Private')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Tambah Layanan Konsultasi Private</h2>

        <form action="{{ route('admin.konsultasi.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Layanan</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" value="{{ old('harga') }}" min="0" step="0.01" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" 
                               id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" required>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="waktu_menit" class="form-label">Waktu (menit)</label>
                        <input type="number" class="form-control @error('waktu_menit') is-invalid @enderror" 
                               id="waktu_menit" name="waktu_menit" value="{{ old('waktu_menit') }}" min="1" required>
                        @error('waktu_menit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Benefit</label>
                <div id="benefit-container">
                    @if(old('benefit'))
                        @foreach(old('benefit') as $index => $benefit)
                            <div class="input-group mb-2 benefit-item">
                                <input type="text" class="form-control" name="benefit[]" 
                                       value="{{ $benefit }}" placeholder="Masukkan benefit" required>
                                <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
                            </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2 benefit-item">
                            <input type="text" class="form-control" name="benefit[]" 
                                   placeholder="Masukkan benefit" required>
                            <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-benefit">+ Tambah Benefit</button>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.konsultasi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add benefit field
    document.getElementById('add-benefit').addEventListener('click', function() {
        const container = document.getElementById('benefit-container');
        const newItem = document.createElement('div');
        newItem.className = 'input-group mb-2 benefit-item';
        newItem.innerHTML = `
            <input type="text" class="form-control" name="benefit[]" placeholder="Masukkan benefit" required>
            <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
        `;
        container.appendChild(newItem);
    });

    // Remove benefit field
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-benefit')) {
            if (document.querySelectorAll('.benefit-item').length > 1) {
                e.target.closest('.benefit-item').remove();
            } else {
                alert('Minimal harus ada 1 benefit');
            }
        }
    });
});
</script>
@endpush
@endsection