<!-- resources/views/audits/create.blade.php -->
@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Tambah Audit Baru</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('audits.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('audits.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Judul Audit:</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" value="{{ old('judul') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Harga (Rp):</strong>
                    <input type="number" step="0.01" name="harga" class="form-control" placeholder="Masukkan Harga" value="{{ old('harga') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Benefit (Satu poin per baris):</strong>
                    <textarea class="form-control" style="height:150px" name="benefit" placeholder="Masukkan Benefit, satu poin per baris">{{ old('benefit') }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection