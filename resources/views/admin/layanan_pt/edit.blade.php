@extends('admin.layouts.master')
@section('title', isset($layananPt) ? 'Edit Layanan' : 'Tambah Layanan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ isset($layananPt) ? 'Edit Data Layanan' : 'Tambah Data Layanan' }}</h3>
            <p class="text-subtitle text-muted">
                Silakan isi data layanan yang ingin {{ isset($layananPt) ? 'diedit' : 'ditambahkan' }}
            </p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form class="form" 
              action="{{ isset($layananPt) ? route('admin.layanan-pt.update', $layananPt->id) : route('admin.layanan-pt.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($layananPt))
                @method('PUT')
            @endif

            <div class="form-body">
                <div class="row">

                    <!-- Judul -->
                    <div class="col-md-12 mb-3">
                        <label for="judul" class="form-label">Judul Layanan</label>
                        <input type="text" id="judul" name="judul" class="form-control" 
                               placeholder="Masukkan Judul Layanan"
                               value="{{ old('judul', $layananPt->judul ?? '') }}" required>
                    </div>

                    <!-- Harga -->
                    <div class="col-md-12 mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="harga" name="harga" class="form-control"
                                   placeholder="Masukkan Harga"
                                   value="{{ old('harga', $layananPt->harga ?? '') }}" required>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                                  placeholder="Masukkan deskripsi lengkap layanan" required>{{ old('deskripsi', $layananPt->detail->deskripsi ?? '') }}</textarea>
                    </div>

                    {{-- Paket --}}
                    <div class="col-md-12 mb-3">
                        <label for="paket" class="form-label">Paket Layanan</label>
                        <input type="text" id="paket" name="paket" class="form-control" 
                               placeholder="Masukkan Paket Layanan"
                               value="{{ old('paket', $layananPt->judul ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sumber File</label>
                        <div class="input-group">
                            <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                                <option value="upload" {{ old('file_type', isset($layananPt->detail) && filter_var($layananPt->detail->file_path, FILTER_VALIDATE_URL) ? '' : 'selected') }}>Upload</option>
                                <option value="link" {{ old('file_type', isset($layananPt->detail) && filter_var($layananPt->detail->file_path, FILTER_VALIDATE_URL) ? 'selected' : '') }}>Link</option>
                            </select>

                            {{-- Input upload file --}}
                            <input type="file"
                                name="file_upload"
                                class="form-control {{ old('file_type', isset($layananPt->detail) && filter_var($layananPt->detail->file_path, FILTER_VALIDATE_URL) ? 'd-none' : '') }}"
                                accept=".pdf,.doc,.docx">

                            {{-- Input link --}}
                            <input type="text"
                                name="file_link"
                                value="{{ old('file_link', isset($layananPt->detail) && filter_var($layananPt->detail->file_path, FILTER_VALIDATE_URL) ? $layananPt->detail->file_path : '') }}"
                                class="form-control {{ old('file_type', isset($layananPt->detail) && filter_var($layananPt->detail->file_path, FILTER_VALIDATE_URL) ? '' : 'd-none') }}"
                                placeholder="https://drive.google.com/...">
                        </div>

                        @if(isset($layananPt->detail->file_path))
                            <small class="text-muted">
                                File saat ini:
                                @if(filter_var($layananPt->detail->file_path, FILTER_VALIDATE_URL))
                                    <a href="{{ $layananPt->detail->file_path }}" target="_blank">Lihat Link</a>
                                @else
                                    <a href="{{ asset('storage/' . $layananPt->detail->file_path) }}" target="_blank">Lihat File</a>
                                @endif
                            </small>
                        @endif
                    </div>

                    <!-- Benefit -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Benefit Layanan</label>
                        <small class="text-muted d-block mb-2">Tambahkan benefit yang akan didapatkan pelanggan</small>
                        <div id="benefit-container">
                            @php
                                $benefits = old('benefit', $layananPt->detail->benefit ?? ['']);
                            @endphp
                            @foreach($benefits as $index => $benefit)
                                <div class="input-group mb-2 benefit-item">
                                    <input type="text" name="benefit[]" class="form-control"
                                           placeholder="Benefit {{ $index + 1 }}" value="{{ $benefit }}">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-outline-danger remove-benefit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-outline-secondary" disabled>
                                            <i class="fas fa-grip-lines"></i>
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-2" id="add-benefit">
                            <i class="fas fa-plus"></i> Tambah Benefit
                        </button>
                    </div>

                    <!-- Tombol -->
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary me-1 mb-1">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.layanan-pt.index') }}" class="btn btn-light-secondary me-1 mb-1">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk dynamic benefit -->
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
    
document.getElementById('add-benefit').addEventListener('click', function() {
    const container = document.getElementById('benefit-container');
    const index = container.children.length;
    const div = document.createElement('div');
    div.className = 'input-group mb-2 benefit-item';
    div.innerHTML = `
        <input type="text" name="benefit[]" class="form-control" placeholder="Benefit ${index + 1}">
        <button type="button" class="btn btn-outline-danger remove-benefit">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(div);
});

document.addEventListener('click', function(e) {
    if(e.target.closest('.remove-benefit')) {
        e.target.closest('.benefit-item').remove();
    }
});
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
