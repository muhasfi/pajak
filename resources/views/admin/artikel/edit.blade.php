@extends('admin.layouts.master')
@section('title', 'Edit Artikel')
<style>
    /* CKEditor light (default) */
.ck-editor__editable {
    min-height: 300px;
    padding: 1rem;
    border: none !important;
    background: #ffffff;
    color: #000000;
}

/* Dark mode - lebih soft */
[data-bs-theme="dark"] .ck-editor__editable {
    background: #2b2b2b !important;   /* abu-abu tua, bukan hitam pekat */
    color: #f0f0f0 !important;        /* teks terang */
}

/* Toolbar dark mode */
[data-bs-theme="dark"] .ck.ck-toolbar {
    background: #3a3a3a !important;   /* sedikit lebih terang */
    border-color: #555 !important;
}

/* Tombol & ikon CKEditor di dark mode */
[data-bs-theme="dark"] .ck.ck-toolbar .ck-button {
    color: #f0f0f0 !important;        /* ikon lebih terang */
}

[data-bs-theme="dark"] .ck.ck-toolbar .ck-button:hover {
    background: #4a4a4a !important;   /* efek hover */
}

</style>
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Artikel</h3>
            <p class="text-subtitle text-muted">Perbarui artikel sesuai kebutuhan</p>
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

        <form class="form" action="{{ route('admin.artikel.update', $artikel->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">
                    <!-- Judul -->
                    <div class="col-12 mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" id="title" class="form-control" name="title" 
                               value="{{ old('title', $artikel->title) }}" required>
                    </div>

                    <!-- Slug -->
                    <div class="col-12 mb-3">
                        <label for="slug" class="form-label">Slug (URL)</label>
                        <input type="text" id="slug" class="form-control" name="slug" 
                               value="{{ old('slug', $artikel->slug) }}" placeholder="contoh-judul-artikel">
                        <small class="text-muted">Opsional, jika kosong akan dibuat otomatis dari judul</small>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="col-12 mb-3">
                        <label for="excerpt" class="form-label">Deskripsi Singkat</label>
                        <textarea id="excerpt" class="form-control" name="excerpt" rows="2">{{ old('excerpt', $artikel->excerpt) }}</textarea>
                    </div>

                    <!-- Isi Artikel -->
                    <div class="col-12 mb-3">
                        <label for="content" class="form-label fw-bold">Isi Artikel</label>
                        <div class="editor-wrapper border rounded shadow-sm p-2">
                            <textarea id="content" class="form-control d-none" name="content">{{ old('content', $artikel->content) }}</textarea>
                        </div>
                        <small class="text-muted">Edit artikelmu di sini.</small>
                    </div>

                    <!-- Thumbnail -->
                    <div class="col-12 mb-3">
                        <label for="thumbnail" class="form-label">Upload Gambar (Opsional)</label>
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/*">
                        @if($artikel->thumbnail)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="200">
                            </div>
                        @endif
                    </div>

                    <!-- Status -->
                    <div class="col-12 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="publish" {{ old('status', $artikel->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                            <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Artikel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector('#content'), {
        ckfinder: {
            uploadUrl: "{{ route('ckeditor.upload').'?_token='.csrf_token() }}"
        },
        image: {
            resizeOptions: [
                { name: 'resizeImage:original', label: 'Original', value: null },
                { name: 'resizeImage:50', label: '50%', value: '50' },
                { name: 'resizeImage:75', label: '75%', value: '75' }
            ],
            toolbar: ['imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight', '|', 'resizeImage']
        }
    })
    .catch(error => { console.error(error); });
</script>
@endsection
