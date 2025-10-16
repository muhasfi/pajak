@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ isset($layananPt) ? 'Edit' : 'Tambah' }} Layanan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('layanan-pt.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terdapat masalah dengan inputan Anda.<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($layananPt) ? route('layanan-pt.update', $layananPt->id) : route('layanan-pt.store') }}" method="POST">
    @csrf
    @if(isset($layananPt))
        @method('PUT')
    @endif
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" name="judul" class="form-control" placeholder="Judul Layanan" value="{{ old('judul', $layananPt->judul ?? '') }}">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="number" name="harga" class="form-control" placeholder="Harga" value="{{ old('harga', $layananPt->harga ?? '') }}">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi Layanan">{{ old('deskripsi', $layananPt->detail->deskripsi ?? '') }}</textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Benefit:</strong>
                <div id="benefit-container">
                    @php
                        $benefits = old('benefit', $layananPt->detail->benefit ?? ['']);
                    @endphp
                    @foreach($benefits as $index => $benefit)
                        <div class="input-group mb-2 benefit-item">
                            <input type="text" name="benefit[]" class="form-control" placeholder="Benefit {{ $index + 1 }}" value="{{ $benefit }}">
                            @if($index > 0)
                                <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" id="add-benefit">Tambah Benefit</button>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script>
document.getElementById('add-benefit').addEventListener('click', function() {
    const container = document.getElementById('benefit-container');
    const index = container.children.length;
    const div = document.createElement('div');
    div.className = 'input-group mb-2 benefit-item';
    div.innerHTML = `
        <input type="text" name="benefit[]" class="form-control" placeholder="Benefit ${index + 1}">
        <button type="button" class="btn btn-outline-danger remove-benefit">Hapus</button>
    `;
    container.appendChild(div);
});

document.addEventListener('click', function(e) {
    if(e.target && e.target.classList.contains('remove-benefit')) {
        e.target.closest('.benefit-item').remove();
    }
});
</script>
@endsection