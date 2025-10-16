@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Layanan Pajak Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pajak.store') }}" method="POST">
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

            <div class="mb-3">
                <label for="benefit" class="form-label">Benefit (Tekan Enter untuk menambah benefit baru)</label>
                <div id="benefit-container">
                    <input type="text" class="form-control mb-2 benefit-input" name="benefit[]" placeholder="Masukkan benefit">
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="addBenefitField()">+ Tambah Benefit</button>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pajak.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function addBenefitField() {
    const container = document.getElementById('benefit-container');
    const input = document.createElement('input');
    input.type = 'text';
    input.className = 'form-control mb-2 benefit-input';
    input.name = 'benefit[]';
    input.placeholder = 'Masukkan benefit';
    container.appendChild(input);
}
</script>
@endsection