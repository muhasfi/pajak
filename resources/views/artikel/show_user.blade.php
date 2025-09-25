@extends('layouts.master')
@section('title', $artikel->title)

@section('content')
<div class="container py-4">
    <h2>{{ $artikel->title }}</h2>
    <p class="text-muted">{{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}</p>

    @if($artikel->thumbnail)
        <img src="{{ asset('storage/'.$artikel->thumbnail) }}" class="img-fluid rounded mb-3" alt="{{ $artikel->title }}">
    @endif

    <p class="text-muted">{{ $artikel->excerpt }}</p>

    <div class="mt-4 content-body">
        {!! $artikel->content !!}
    </div>

    <a href="{{ route('artikel.index') }}" class="btn btn-secondary mt-4">← Kembali ke daftar artikel</a>
</div>

<style>
    .content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 10px 0;
    }
</style>
@endsection
