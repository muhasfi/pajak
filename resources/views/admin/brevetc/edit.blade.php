@extends('admin.layouts.master')
@section('content')
    <h2>Edit Data Brevet C</h2>
    <a class="btn btn-secondary mb-3" href="{{ route('brevetc.index') }}">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terdapat masalah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brevetc.update', $brevetc) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $brevetc->gambar }}" placeholder="https://example.com/image.jpg">
        </div>
        {{-- <div class="mb-3">
            <label for="gambar" class="form-label">Link Gambar:</label>
            <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $brevetc->gambar }}" placeholder="https://example.com/image.jpg">
        </div> --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $brevetc->judul }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $brevetc->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="hari" class="form-label">Hari (e.g., Senin-Jumat):</label>
            <input type="text" class="form-control" id="hari" name="hari" value="{{ $brevetc->hari }}">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $brevetc->tanggal_mulai }}">
            </div>
            <div class="col">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $brevetc->tanggal_selesai }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp):</label>
            <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="{{ $brevetc->harga}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection