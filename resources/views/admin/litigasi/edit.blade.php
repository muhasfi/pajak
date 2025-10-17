@extends('admin.layouts.master')

@section('title', 'Edit Layanan Litigasi')

@section('content')
<div class="page-heading">
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Layanan Litigasi</h3>
                <p class="text-subtitle text-muted">Perbarui data layanan litigasi yang sudah ada.</p>
            </div>
        </div>
    </div>

    <section class="section">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa kesalahan pada input Anda.
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.litigasi.update', $litigasi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label"><strong>Judul Layanan</strong></label>
                        <input type="text" name="judul" class="form-control" 
                            value="{{ old('judul', $litigasi->judul) }}" 
                            placeholder="Masukkan judul layanan" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Harga</strong></label>
                        <input type="number" name="harga" class="form-control" 
                            value="{{ old('harga', $litigasi->harga) }}" 
                            placeholder="Masukkan harga" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Deskripsi</strong></label>
                        <textarea class="form-control" name="deskripsi" rows="4" required>{{ old('deskripsi', $litigasi->detail->deskripsi ?? '') }}</textarea>
                    </div>


                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <strong>Benefit</strong>
                            <button type="button" class="btn btn-sm btn-success" onclick="addBenefit()">
                                <i class="bi bi-plus-circle"></i> Tambah Benefit
                            </button>
                        </label>

                        <div id="benefits-container">
                            @if($litigasi->detail && $litigasi->detail->benefit)
                                @foreach($litigasi->detail->benefit as $benefit)
                                    <div class="benefit-input input-group mb-2">
                                        <input type="text" name="benefit[]" class="form-control" 
                                            value="{{ $benefit }}" placeholder="Masukkan benefit" required>
                                        <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                <div class="benefit-input input-group mb-2">
                                    <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
                                    <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            @endif
                        </div>


                        <small class="text-muted">Klik "Tambah Benefit" untuk menambah baris baru.</small>
                    </div>

                    <div class="text-end mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.litigasi.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left-circle"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>

{{-- JavaScript untuk menambah & menghapus benefit --}}
<script>
    function addBenefit() {
        const container = document.getElementById('benefits-container');
        const newInput = document.createElement('div');
        newInput.classList.add('benefit-input', 'input-group', 'mb-2');
        newInput.innerHTML = `
            <input type="text" name="benefit[]" class="form-control" placeholder="Masukkan benefit" required>
            <button type="button" class="btn btn-outline-danger" onclick="removeBenefit(this)">
                <i class="bi bi-trash"></i>
            </button>
        `;
        container.appendChild(newInput);
    }

    function removeBenefit(button) {
        const container = document.getElementById('benefits-container');
        if (container.children.length > 1) {
            button.closest('.benefit-input').remove();
        } else {
            alert('Minimal harus ada 1 benefit.');
        }
    }
</script>
@endsection
