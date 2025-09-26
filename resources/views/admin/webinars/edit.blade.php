@extends('admin.layouts.master')
@section('content')
<div class="container">
    <h2>Edit Webinar</h2>

    <form action="{{ route('webinars.update', $webinar) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $webinar->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $webinar->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $webinar->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $webinar->harga }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            @if($webinar->gambar)
                <img src="{{ asset('storage/'.$webinar->gambar) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
