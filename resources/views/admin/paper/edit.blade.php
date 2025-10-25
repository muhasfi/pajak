@extends('admin.layouts.master')
@section('title', 'Edit Paper')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/filepond/filepond.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <h3>Edit Paper</h3>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.paper.update', $paper->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paper</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $paper->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $paper->description) }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="kebutuhan" class="form-label">Kebutuhan</label>
                    <input type="text" name="kebutuhan" class="form-control" id="kebutuhan" value="{{ old('kebutuhan', $paper->kebutuhan) }}" required>
                    @error('kebutuhan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $paper->price) }}" required>
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $paper->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Gambar</label>
                    @if($paper->img)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $paper->img) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                            <p class="text-muted small">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="img" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    @error('img') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- File Detail yang Sudah Ada -->
                @if($paper->details && $paper->details->count() > 0)
                <div class="mb-3">
                    <label class="form-label">File Lampiran Saat Ini</label>
                    <div class="list-group">
                        @foreach($paper->details as $detail)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-file-earmark"></i>
                                <a href="{{ asset('storage/' . $detail->file_path) }}" target="_blank">
                                    {{ basename($detail->file_path) }}
                                </a>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="delete_details[]" value="{{ $detail->id }}" id="delete_{{ $detail->id }}">
                                <label class="form-check-label text-danger" for="delete_{{ $detail->id }}">
                                    Hapus
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Upload File Baru -->
                @php
                    $detail = $paper->detail ?? null;
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

                <div class="mb-3">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $paper->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $paper->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
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