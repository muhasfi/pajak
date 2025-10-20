@extends('admin.layouts.master')
@section('title', 'Tambah Menu')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Tambah Menu Bimbel</h3>
                                <p class="text-subtitle text-muted">Isi data paket bimbel beserta modul detailnya</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <a href="{{ route('admin.bimbel.index') }}" class="btn btn-secondary float-start float-lg-end">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="card">
                            <div class="card-body">

                                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form" action="{{ route('admin.bimbel.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    {{-- Data Master --}}
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Paket</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" step="0.01" required>
                    </div>

                    <hr>
                    <h5>Modul / Video Detail</h5>
                    <div id="detail-wrapper">
                        <div class="detail-item border rounded p-3 mb-3">
                            <div class="mb-2">
                                <label>Judul Modul</label>
                                <input type="text" name="details[0][judul]" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Deskripsi Modul</label>
                                <textarea name="details[0][deskripsi]" class="form-control"></textarea>
                            </div>
                            <div class="mb-2">
                                <label>Materi PDF</label>
                                <input type="file" name="details[0][materi_pdf]" class="form-control" accept="application/pdf">
                            </div>
                            <div class="mb-2">
                                <label>Video</label>
                                <div class="input-group">
                                    <select name="details[0][video_type]" class="form-select" style="max-width: 150px;">
                                        <option value="upload">Upload</option>
                                        <option value="youtube">YouTube</option>
                                    </select>
                                    <input type="file" name="details[0][video_upload]" class="form-control d-none" accept="video/*">
                                    <input type="text" name="details[0][video_link]" class="form-control" placeholder="https://youtube.com/..." >
                                </div>
                            </div>

                            <div class="mb-2">
                                <label>Urutan</label>
                                <input type="number" name="details[0][urutan]" class="form-control" value="1">
                            </div>
                            <button type="button" class="btn btn-danger btn-sm remove-detail d-none">
                                <i class="bi bi-trash"></i> Hapus Modul
                            </button>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success mb-3" id="add-detail">
                        <i class="bi bi-plus"></i> Tambah Modul
                    </button>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
@include('admin.bimbel.script-detail') 
{{-- pisahkan script add/remove modul biar bisa dipakai di create & edit --}}
@endsection

