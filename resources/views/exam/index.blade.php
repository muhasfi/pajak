@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Selamat Datang di Ujian</h2>
            </div>
            <div class="card-body">
                <h5>Instruksi:</h5>
                <ul>
                    <li>Ujian terdiri dari beberapa pertanyaan pilihan ganda</li>
                    <li>Pilih jawaban yang menurut Anda benar</li>
                    <li>Anda tidak dapat kembali ke pertanyaan sebelumnya</li>
                    <li>Nilai akan ditampilkan di akhir ujian</li>
                </ul>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('exam.start') }}" class="btn btn-primary btn-lg">Mulai Ujian</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection