@extends('admin.layouts.master')
@section('title', 'Edit Menu')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Menu</h3>
            <p class="text-subtitle text-muted">Silahkan ubah data menu sesuai kebutuhan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $book->name) }}" placeholder="Masukkan Nama Menu" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Masukkan Deskripsi">{{ old('description', $book->description) }}</textarea>
                        </div>

                        {{-- Harga --}}
                        <div class="form-group mb-3">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price', $book->price) }}" placeholder="Masukkan Harga" required>
                        </div>

                        {{-- Gambar --}}
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            @if ($book->img)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $book->img) }}"
                                         alt="Gambar {{ $book->name }}"
                                         class="img-thumbnail"
                                         width="200"
                                         onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="img" accept=".jpg,.jpeg,.png">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                        </div>

                        {{-- Status --}}
                        <div class="form-group mb-3">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="is_active"
                                       name="is_active" value="1"
                                       {{ old('is_active', $book->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktif / Tidak Aktif</label>
                            </div>
                        </div>

                        <hr>
                        <h5>Detail E-Book</h5>

                        @php
                            $detail = $book->detail ?? null;
                            $isLink = $detail && $detail->file_path && str_starts_with($detail->file_path, 'http');
                        @endphp

                        {{-- File --}}
                        <div class="mb-3">
                            <label class="form-label">Sumber File</label>
                            <div class="input-group">
                                <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                                    <option value="upload" {{ !$isLink ? 'selected' : '' }}>Upload</option>
                                    <option value="link" {{ $isLink ? 'selected' : '' }}>Link</option>
                                </select>

                                {{-- Jika sebelumnya upload file --}}
                                <input type="file" name="file_upload" class="form-control {{ $isLink ? 'd-none' : '' }}"
                                       accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.rar">

                                {{-- Jika sebelumnya link --}}
                                <input type="text" name="file_link" class="form-control {{ $isLink ? '' : 'd-none' }}"
                                       placeholder="https://drive.google.com/..."
                                       value="{{ $isLink ? old('file_link', $detail->file_path ?? '') : '' }}">
                            </div>

                            @if ($detail && $detail->file_path)
                                <small class="text-muted d-block mt-2">
                                    File Saat Ini:
                                    @if ($isLink)
                                        <a href="{{ $detail->file_path }}" target="_blank">Lihat Link</a>
                                    @else
                                        <a href="{{ asset('storage/' . $detail->file_path) }}" target="_blank">Lihat File</a>
                                    @endif
                                </small>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                            <a href="{{ route('admin.book.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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
function toggleFileInput(select) {
    const group = select.closest('.input-group');
    const fileInput = group.querySelector('[name="file_upload"]');
    const linkInput = group.querySelector('[name="file_link"]');

    if (select.value === 'upload') {
        fileInput.classList.remove('d-none');
        linkInput.classList.add('d-none');
        fileInput.required = true;
        linkInput.required = false;
    } else {
        fileInput.classList.add('d-none');
        linkInput.classList.remove('d-none');
        fileInput.required = false;
        linkInput.required = true;
    }
}

// Panggil saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', function() {
    const select = document.querySelector('select[name="file_type"]');
    toggleFileInput(select);
});
</script>
@endsection
