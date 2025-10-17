@extends('admin.layouts.master')
@section('title', 'Tambah Layanan PT')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Layanan PT</h3>
            <p class="text-subtitle text-muted">Silahkan isi data layanan yang ingin ditambahkan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form Tambah Layanan -->
        <form class="form" action="{{ route('admin.layanan-pt.store') }}" method="POST">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Judul -->
                        <div class="form-group mb-3">
                            <label for="judul">Judul Layanan</label>
                            <input type="text" id="judul" name="judul" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   placeholder="Masukkan judul layanan" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" id="harga" name="harga" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       placeholder="0" value="{{ old('harga') }}" required>
                            </div>
                            @error('harga')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Masukkan deskripsi lengkap layanan" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Paket --}}
                        <div class="form-group mb-3">
                            <label for="paket">Paket Layanan</label>
                            <input type="text" id="paket" name="paket" 
                                   class="form-control @error('paket') is-invalid @enderror" 
                                   placeholder="Masukkan Paket Layanan" value="{{ old('paket') }}" required>
                            @error('paket')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Benefit -->
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

                        <!-- Tombol Aksi -->
                        <div class="form-group d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </button>
                            <a href="{{ route('admin.layanan-pt.index') }}" class="btn btn-light-secondary me-1 mb-1">
                                <i class="bi bi-x-circle"></i> Kembali
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
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
