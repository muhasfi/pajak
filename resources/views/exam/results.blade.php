@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2>Hasil Ujian</h2>
            </div>
            <div class="card-body text-center">
                <h3>Skor Anda: {{ $score }}/{{ $total_questions }}</h3>
                
                @php
                    $percentage = $total_questions > 0 ? ($score / $total_questions) * 100 : 0;
                @endphp
                
                <div class="progress my-4" style="height: 30px;">
                    <div class="progress-bar {{ $percentage >= 60 ? 'bg-success' : 'bg-danger' }}" 
                         role="progressbar" style="width: {{ $percentage }}%;" 
                         aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                        {{ round($percentage, 2) }}%
                    </div>
                </div>
                
                @if($percentage >= 60)
                    <div class="alert alert-success">
                        <h4>Selamat! Anda lulus ujian.</h4>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <h4>Maaf, Anda tidak lulus ujian.</h4>
                    </div>
                @endif
                
                <a href="{{ route('exam.index') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
</div>
@endsection