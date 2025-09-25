@extends('admin.layouts.master')
@section('title', 'Edit Item Bimbel')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Item Bimbel</h3>
                <p class="text-subtitle text-muted">Perbarui informasi paket bimbel dan modul-modulnya</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-end">
                <a href="{{ route('bimbel.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <section class="section mt-3">
        <form action="{{ route('bimbel.update', $bimbel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Data utama --}}
            <div class="card mb-3">
                <div class="card-header"><h5>Data Utama</h5></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul', $bimbel->judul) }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $bimbel->deskripsi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" step="0.01" name="harga" class="form-control" value="{{ old('harga', $bimbel->harga) }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-select">
                            <option value="1" {{ $bimbel->is_active ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ !$bimbel->is_active ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Modul --}}
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <h5>Modul</h5>
                    <button type="button" id="add-detail" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus"></i> Tambah Modul
                    </button>
                </div>
                <div class="card-body" id="detail-wrapper">
                    @foreach($bimbel->details as $i => $bimbel)
                        <div class="detail-item border rounded p-3 mb-3">
                            <div class="mb-2">
                                <label>Judul Modul</label>
                                <input type="text" name="details[{{ $i }}][judul]" class="form-control"
                                       value="{{ old("details.$i.judul", $bimbel->judul) }}" required>
                            </div>
                            <div class="mb-2">
                                <label>Deskripsi Modul</label>
                                <textarea name="details[{{ $i }}][deskripsi]" class="form-control">{{ old("bimbel.$i.deskripsi", $bimbel->deskripsi) }}</textarea>
                            </div>
                            <div class="mb-2">
                                <label>Materi PDF</label>
                                @if($bimbel->materi_pdf)
                                    <p>📄 <a href="{{ asset('storage/'.$bimbel->materi_pdf) }}" target="_blank">Lihat File Lama</a></p>
                                @endif
                                <input type="file" name="bimbels[{{ $i }}][materi_pdf]" class="form-control" accept="application/pdf">
                            </div>
                            <div class="mb-2">
                                <label>Video</label>
                                <div class="input-group">
                                    <select name="bimbels[{{ $i }}][video_type]" class="form-select" style="max-width: 150px;">
                                        <option value="upload" {{ $bimbel->video && !Str::contains($bimbel->video,'youtu') ? 'selected' : '' }}>Upload</option>
                                        <option value="youtube" {{ $bimbel->video && Str::contains($bimbel->video,'youtu') ? 'selected' : '' }}>YouTube</option>
                                    </select>
                                    <input type="file" name="bimbels[{{ $i }}][video_upload]" class="form-control {{ $bimbel->video && Str::contains($bimbel->video,'youtu') ? 'd-none' : '' }}" accept="video/*">
                                    <input type="text" name="bimbels[{{ $i }}][video_link]" class="form-control {{ $bimbel->video && !Str::contains($bimbel->video,'youtu') ? 'd-none' : '' }}" placeholder="https://youtube.com/..." value="{{ $bimbel->video }}">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label>Urutan</label>
                                <input type="number" name="bimbels[{{ $i }}][urutan]" class="form-control"
                                       value="{{ old("bimbels.$i.urutan", $bimbel->urutan) }}">
                            </div>
                            <button type="button" class="btn btn-danger btn-sm remove-detail">
                                <i class="bi bi-trash"></i> Hapus Modul
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </section>
</div>
@endsection

@section('script')
@include('admin.bimbel.script-detail') 
{{-- pisahkan script add/remove modul biar bisa dipakai di create & edit --}}
@endsection
