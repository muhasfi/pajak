@extends('admin.layouts.master')
@section('title', 'Tambah Paket Bimbel')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Paket Bimbel</h3>
            <p class="text-subtitle text-muted">Silakan isi data paket bimbel yang ingin ditambahkan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.bimbel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Judul -->
                        <div class="form-group mb-3">
                            <label for="judul">Judul Paket</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukkan judul paket bimbel" value="{{ old('judul') }}" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                placeholder="Masukkan deskripsi paket">{{ old('deskripsi') }}</textarea>
                        </div>

                        <!-- Harga -->
                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan harga paket" min="0" value="{{ old('harga') }}" required>
                            </div>
                        </div>


                        <!-- Gambar -->
                        <div class="form-group mb-3">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        </div>
                        <div id="detail-container">
                                <div class="mb-2">
                                    <label>Judul Materi</label>
                                    <input type="text" name="detail[0][judul_materi]" class="form-control"
                                        placeholder="Masukkan judul materi">
                                </div>
                                <div class="mb-2">
                                    <label>Deskripsi Materi</label>
                                    <textarea name="detail[0][deskripsi]" class="form-control"
                                        placeholder="Masukkan deskripsi singkat materi"></textarea>
                                </div>
                                <div class="mb-2">
                                    <label>Link Materi (opsional)</label>
                                    <input type="text" name="detail[0][link]" class="form-control"
                                        placeholder="Contoh: https://drive.google.com/...">
                                </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('admin.bimbel.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
