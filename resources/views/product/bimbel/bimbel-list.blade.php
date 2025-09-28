@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Kelas Saya</h2>
    
    @if($myBimbels->isEmpty())
        <p>Belum ada bimbel yang kamu beli.</p>
    @else
        <div class="row">
            @foreach($myBimbels as $item)
                @php
                    $bimbel = $item->product;
                @endphp

                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $bimbel->judul }}</h5>
                            <p class="card-text">{{ Str::limit($bimbel->deskripsi, 100) }}</p>
                            <a href="{{ route('bimbel.show', $item->id) }}" class="btn btn-primary">
                                Lihat Materi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
