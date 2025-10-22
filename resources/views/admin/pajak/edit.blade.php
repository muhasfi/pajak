@extends('admin.layouts.master')
@section('title', 'Edit Layanan Pajak')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Layanan Pajak</h3>
            <p class="text-subtitle text-muted">Silakan ubah data layanan pajak di bawah ini</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Update Error!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form class="form" action="{{ route('admin.pajak.update', $pajak->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    {{-- Judul Layanan --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul Layanan Pajak<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" 
                                   value="{{ old('judul', $pajak->judul) }}" 
                                   placeholder="Masukkan judul layanan" required>
                        </div>
                    </div>

                    {{-- Harga --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga" name="harga" min="0" 
                                       value="{{ old('harga', $pajak->harga) }}" placeholder="Masukkan harga" required>
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Layanan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" 
                                      placeholder="Masukkan deskripsi layanan" required>{{ old('deskripsi', $pajak->detail->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sumber File</label>
                        <div class="input-group">
                            <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                                <option value="upload" {{ old('file_type', isset($pajak->detail) && filter_var($pajak->detail->file_path, FILTER_VALIDATE_URL) ? '' : 'selected') }}>Upload</option>
                                <option value="link" {{ old('file_type', isset($pajak->detail) && filter_var($pajak->detail->file_path, FILTER_VALIDATE_URL) ? 'selected' : '') }}>Link</option>
                            </select>

                            {{-- Input upload file --}}
                            <input type="file"
                                name="file_upload"
                                class="form-control {{ old('file_type', isset($pajak->detail) && filter_var($pajak->detail->file_path, FILTER_VALIDATE_URL) ? 'd-none' : '') }}"
                                accept=".pdf,.doc,.docx">

                            {{-- Input link --}}
                            <input type="text"
                                name="file_link"
                                value="{{ old('file_link', isset($pajak->detail) && filter_var($pajak->detail->file_path, FILTER_VALIDATE_URL) ? $pajak->detail->file_path : '') }}"
                                class="form-control {{ old('file_type', isset($pajak->detail) && filter_var($pajak->detail->file_path, FILTER_VALIDATE_URL) ? '' : 'd-none') }}"
                                placeholder="https://drive.google.com/...">
                        </div>

                        @if(isset($pajak->detail->file_path))
                            <small class="text-muted">
                                File saat ini:
                                @if(filter_var($pajak->detail->file_path, FILTER_VALIDATE_URL))
                                    <a href="{{ $pajak->detail->file_path }}" target="_blank">Lihat Link</a>
                                @else
                                    <a href="{{ asset('storage/' . $pajak->detail->file_path) }}" target="_blank">Lihat File</a>
                                @endif
                            </small>
                        @endif
                    </div>

                    {{-- Benefit --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Benefit Layanan</label>
                        <small class="text-muted d-block mb-2">Tambahkan benefit yang akan didapatkan pelanggan</small>
                        <div id="benefit-container">
                            @php
                                $benefits = old('benefit', $pajak->detail->benefit ?? ['']);
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

                    {{-- Tombol --}}
                    <div class="form-group d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.pajak.show', $pajak->id) }}" class="btn btn-info me-2">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </a>
                        <a href="{{ route('admin.pajak.index') }}" class="btn btn-light-secondary me-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="button" class="btn btn-danger me-2" onclick="confirmReset()">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Layanan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal Reset --}}
<div class="modal fade" id="resetModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengembalikan semua data ke nilai semula? Perubahan yang belum disimpan akan hilang.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="resetForm()">Ya, Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
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
@endsection
