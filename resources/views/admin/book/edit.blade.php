@extends('admin.layouts.master')
@section('title', 'Edit Menu')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Menu</h3>
            <p class="text-subtitle text-muted">Silahkan isi data menu yang ingin diubah</p>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Update Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="form" action="{{ route('admin.book.update', $item->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Nama Menu --}}
                        <div class="form-group">
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control" id="name" 
                                placeholder="Masukkan Nama Menu" 
                                name="name" required 
                                value="{{ old('name', $item->name) }}">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" 
                                placeholder="Masukkan Deskripsi" 
                                name="description" required>{{ old('description', $item->description) }}</textarea>
                        </div>

                        {{-- Harga --}}
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" 
                                placeholder="Masukkan Harga" 
                                name="price" required 
                                value="{{ old('price', $item->price) }}">
                        </div>
                        {{-- Gambar --}}
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            @if ($item->img)
                                <div class="mt-2 mb-2">
                                    <img src="{{ Str::startsWith($item->img, ['http://', 'https://']) 
                                                ? $item->img 
                                                : asset('storage/' . $item->img) }}"
                                        width="200"
                                        class="img-fluid rounded-top"
                                        alt="Gambar {{ $item->name }}"
                                        onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="img">
                        </div>

                        {{-- === Tambahan untuk item_details === --}}
                        @php
                            $detail = $item->detail ?? null;
                        @endphp

                        <hr>
                        <h5>Detail Tambahan</h5>

                        {{-- File (ebook, dokumen, dll) --}}
                        <div class="form-group">
                            <label for="file_path">File (PDF/DOC/PPT/ZIP)</label>
                            @if ($detail && $detail->file_path)
                                <p class="mt-2 mb-2">
                                    <a href="{{ asset('storage/' . $detail->file_path) }}" target="_blank">Lihat File</a>
                                </p>
                            @endif
                            <input type="file" class="form-control" id="file_path" name="file_path">
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" 
                                    id="flexSwitchCheckChecked" 
                                    name="is_active" value="1" 
                                    {{ old('is_active', $item->is_active) == 1 ? 'checked' : '' }}>
                                <label for="flexSwitchCheckChecked">Aktif/Tidak Aktif</label>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('admin.book.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
@endsection