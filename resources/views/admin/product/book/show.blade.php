@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Item Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('item-books.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $itemBook->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                {{ $itemBook->deskripsi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                Rp {{ number_format($itemBook->price, 2) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar:</strong>
                @if($itemBook->img)
                    <img src="{{ asset('images/'.$itemBook->img) }}" width="200" class="img-thumbnail">
                @else
                    <span class="text-muted">No image</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if($itemBook->is_active)
                    <span class="badge bg-success">Aktif</span>
                @else
                    <span class="badge bg-danger">Tidak Aktif</span>
                @endif
            </div>
        </div>
    </div>
@endsection