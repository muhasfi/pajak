@extends('admin.layouts.master')
@section('title', 'Tambah Litigasi')
@section('content')
<div class="page-heading mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Tambah Layanan Litigasi Baru</h2>
        <a href="{{ route('admin.litigasi.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

{{-- Notifikasi error --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi Kesalahan!</strong> Periksa kembali input Anda.
        <ul class="mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('admin.litigasi.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                {{-- Judul --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Judul Layanan</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul layanan"
                        value="{{ old('judul') }}" required>
                </div>

                {{-- Harga --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan harga layanan"
                        value="{{ old('harga') }}" required>
                </div>

                {{-- Deskripsi --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi lengkap"
                        required>{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Benefit --}}
                <div class="col-12">
                    <label class="form-label fw-semibold d-flex justify-content-between align-items-center">
                        <span>Benefit</span>
                        <button type="button" class="btn btn-sm btn-success" onclick="addBenefit()">
                            <i class="fas fa-plus"></i> Tambah Benefit
                        </button>
                    </label>

                    <div id="benefits-container">
                        <div class="input-group mb-2 benefit-input">
                            <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit"
                                required>
                            <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <small class="text-muted">Klik “Tambah Benefit” untuk menambahkan lebih banyak.</small>
                </div>

                {{-- Tombol Submit --}}
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-1"></i> Simpan Layanan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome (ikon tombol, misalnya ikon sampah) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-RXf+QSDCUQs5uwlN2n3Evh5jvYj1lWvZ1PjQxDgK8rDQeY7RmqJk6OQ0Epjfy5ZqUclK0s0h2gE3C7X8HV+Kmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- Script dinamis untuk tambah/hapus benefit --}}
<script>
    function addBenefit() {
        const container = document.getElementById('benefits-container');
        const inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-2', 'benefit-input');
        inputGroup.innerHTML = `
            <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
            <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
                <i class="fas fa-trash-alt"></i>
            </button>
        `;
        container.appendChild(inputGroup);
    }

    function removeBenefit(button) {
        const benefitInput = button.closest('.benefit-input');
        if (document.querySelectorAll('.benefit-input').length > 1) {
            benefitInput.remove();
        } else {
            alert('Minimal harus ada 1 benefit.');
        }
    }
</script>
@endsection
