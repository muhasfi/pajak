@extends('admin.layouts.master')
@section('title', 'Tambah Paper')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/filepond/filepond.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <h3>Tambah Paper</h3>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.paper.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paper</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="kebutuhan" class="form-label">Kebutuhan</label>
                    <input type="text" name="kebutuhan" class="form-control" id="kebutuhan" value="{{ old('kebutuhan') }}" required>
                    @error('kebutuhan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>


                <div class="mb-3">
                    <label for="img" class="form-label">Gambar</label>
                    <input type="file" name="img" class="form-control" accept="image/*">
                    @error('img') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Sumber File</label>
                    <div class="input-group">
                        <select name="file_type" class="form-select" style="max-width: 150px;" onchange="toggleFileInput(this)">
                            <option value="upload">Upload</option>
                            <option value="link">Link</option>
                        </select>

                        <input type="file" name="file_upload" class="form-control" accept=".pdf,.doc,.docx">
                        <input type="text" name="file_link" class="form-control d-none" placeholder="https://drive.google.com/...">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="{{ route('admin.paper.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>
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
