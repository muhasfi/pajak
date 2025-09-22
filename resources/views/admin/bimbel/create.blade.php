@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Item Bimbel</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('item-bimbel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="materi_pdf" class="form-label">Materi PDF</label>
                <input type="file" class="form-control" id="materi_pdf" name="materi_pdf" accept=".pdf">
                <div class="form-text">Maksimal 2MB, format PDF</div>
            </div>
            
            <div class="mb-3">
                <label for="video" class="form-label">Video Pembelajaran</label>
                <input type="file" class="form-control" id="video" name="video" accept="video/*">
                <div class="form-text">Maksimal 50MB, format MP4, MOV, atau AVI</div>
                <video id="videoPreview" class="video-preview" controls></video>
                @error('video')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" min="0" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                <label class="form-check-label" for="is_active">Aktif</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('item-bimbel.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection