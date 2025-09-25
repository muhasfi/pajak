@extends('admin.layouts.master')
@section('title', 'Tambah Menu')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Menu</h3>
            <p class="text-subtitle text-muted">Silahkan isi data menu yang ingin ditambahkan</p>
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
        <form class="form" action="{{ route('book.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- ITEM -->
                        <div class="form-group">
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Menu" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-select" id="category" name="category_id" required>
                                <option value="" disabled selected>Pilih Menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" id="image" name="img" required>
                        </div>

                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked" name="is_active" value="1" checked>
                                <label for="flexSwitchCheckChecked">Aktif/Tidak Aktif</label>
                            </div>
                        </div>

                        <hr>
                        <h5>Detail Item</h5>

                        <!-- ITEM DETAILS -->
                        <div class="form-group">
                            <label for="file_path">File (PDF/Doc, dll)</label>
                            <input type="file" class="form-control" id="file_path" name="file_path">
                        </div>

                        <div class="form-group">
                            <label for="video_url">Video URL</label>
                            <input type="url" class="form-control" id="video_url" name="video_url" placeholder="https://...">
                        </div>

                        <div class="form-group">
                            <label for="zoom_link">Zoom Link</label>
                            <input type="url" class="form-control" id="zoom_link" name="zoom_link" placeholder="https://zoom.us/...">
                        </div>

                        <div class="form-group">
                            <label for="event_date">Tanggal Event</label>
                            <input type="datetime-local" class="form-control" id="event_date" name="event_date">
                        </div>

                        <div class="form-group">
                            <label for="duration_days">Durasi (Hari)</label>
                            <input type="number" class="form-control" id="duration_days" name="duration_days" placeholder="Masukkan Durasi">
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('book.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
@endsection