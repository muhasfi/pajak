@extends('admin.layouts.master')
@section('title', 'Edit Paket Bimbel')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Paket Bimbel</h3>
            <p class="text-subtitle text-muted">Silakan ubah data paket bimbel yang diinginkan</p>
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

        <form action="{{ route('admin.bimbel.update', $bimbel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Judul -->
                        <div class="form-group mb-3">
                            <label for="judul">Judul Paket</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukkan judul paket bimbel"
                                value="{{ old('judul', $bimbel->judul) }}" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                placeholder="Masukkan deskripsi paket">{{ old('deskripsi', $bimbel->deskripsi) }}</textarea>
                        </div>

                        <!-- Harga -->
                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan harga paket" min="0"
                                    value="{{ old('harga', $bimbel->harga) }}" required>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="form-group mb-3">
                            <label for="gambar">Gambar</label>
                            @if ($bimbel->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $bimbel->gambar) }}" alt="Gambar Paket" class="img-thumbnail" width="150">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        </div>

                        <div id="detail-container">
                                <div class="mb-2">
                                    <label>Judul Materi</label>
                                    <input type="text" name="detail[judul_materi]" class="form-control"
                                        value="{{ old('detail.judul_materi', $bimbel->details->first()->judul_materi ?? '') }}"
                                        placeholder="Masukkan judul materi">
                                </div>
                                <div class="mb-2">
                                    <label>Deskripsi Materi</label>
                                    <textarea name="detail[deskripsi]" class="form-control"
                                        placeholder="Masukkan deskripsi singkat materi">{{ old('detail.deskripsi', $bimbel->details->first()->deskripsi ?? '') }}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label>Link Materi (opsional)</label>
                                    <input type="text" name="detail[link]" class="form-control"
                                        value="{{ old('detail.link', $bimbel->details->first()->link ?? '') }}"
                                        placeholder="Contoh: https://drive.google.com/...">
                                </div>
                        </div>


                        <div class="form-group d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <a href="{{ route('admin.bimbel.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
