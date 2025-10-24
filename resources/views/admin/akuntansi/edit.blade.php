@extends('admin.layouts.master')

@section('title', 'Edit Layanan Akuntansi')

@section('content')
<div class="page-heading">
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Layanan Akuntansi</h3>
                <p class="text-subtitle text-muted">Perbarui data layanan akuntansi yang sudah ada.</p>
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
                <form action="{{ route('admin.accounting-services.update', $accounting_service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label"><strong>Judul Layanan Akuntansi</strong></label>
                        <input type="text" name="judul" class="form-control" 
                            value="{{ old('judul', $accounting_service->judul) }}" 
                            placeholder="Masukkan judul layanan" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Harga</strong></label>
                        <input type="number" name="harga" class="form-control" 
                            value="{{ old('harga', $accounting_service->harga) }}" 
                            placeholder="Masukkan harga" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Deskripsi</strong></label>
                        <textarea class="form-control" name="deskripsi" rows="4" required>{{ old('deskripsi', $accounting_service->details->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sumber File</label>
                        <div class="input-group">
                            <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                                <option value="upload" {{ old('file_type', isset($accounting_service->details) && filter_var($accounting_service->details->file_path, FILTER_VALIDATE_URL) ? '' : 'selected') }}>Upload</option>
                                <option value="link" {{ old('file_type', isset($accounting_service->details) && filter_var($accounting_service->details->file_path, FILTER_VALIDATE_URL) ? 'selected' : '') }}>Link</option>
                            </select>

                            {{-- Input upload file --}}
                            <input type="file"
                                name="file_upload"
                                class="form-control {{ old('file_type', isset($accounting_service->details) && filter_var($accounting_service->details->file_path, FILTER_VALIDATE_URL) ? 'd-none' : '') }}"
                                accept=".pdf,.doc,.docx">

                            {{-- Input link --}}
                            <input type="text"
                                name="file_link"
                                value="{{ old('file_link', isset($accounting_service->details) && filter_var($accounting_service->details->file_path, FILTER_VALIDATE_URL) ? $accounting_service->details->file_path : '') }}"
                                class="form-control {{ old('file_type', isset($accounting_service->details) && filter_var($accounting_service->details->file_path, FILTER_VALIDATE_URL) ? '' : 'd-none') }}"
                                placeholder="https://drive.google.com/...">
                        </div>

                        @if(isset($accounting_service->details->file_path))
                            <small class="text-muted">
                                File saat ini:
                                @if(filter_var($accounting_service->details->file_path, FILTER_VALIDATE_URL))
                                    <a href="{{ $accounting_service->details->file_path }}" target="_blank">Lihat Link</a>
                                @else
                                    <a href="{{ asset('storage/' . $accounting_service->details->file_path) }}" target="_blank">Lihat File</a>
                                @endif
                            </small>
                        @endif
                    </div>


                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <strong>Benefit</strong>
                            <button type="button" class="btn btn-sm btn-success" onclick="addBenefit()">
                                <i class="bi bi-plus-circle"></i> Tambah Benefit
                            </button>
                        </label>

                        <div id="benefits-container">
                            @if($accounting_service->details && $accounting_service->details->benefit)
                                @foreach($accounting_service->details->benefit as $benefit)
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
                        <a href="{{ route('admin.accounting-services.index') }}" class="btn btn-outline-primary">
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
