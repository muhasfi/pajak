@extends('admin.layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Detail Pertanyaan</h2>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Pertanyaan:</label>
            <p>{{ $question->question }}</p>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Opsi Jawaban:</label>
            <div class="ms-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" disabled 
                        {{ $question->correct_answer == 'A' ? 'checked' : '' }}>
                    <label class="form-check-label">
                        <strong>A.</strong> {{ $question->option_a }}
                        @if($question->correct_answer == 'A') <span class="badge bg-success">Benar</span> @endif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" disabled 
                        {{ $question->correct_answer == 'B' ? 'checked' : '' }}>
                    <label class="form-check-label">
                        <strong>B.</strong> {{ $question->option_b }}
                        @if($question->correct_answer == 'B') <span class="badge bg-success">Benar</span> @endif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" disabled 
                        {{ $question->correct_answer == 'C' ? 'checked' : '' }}>
                    <label class="form-check-label">
                        <strong>C.</strong> {{ $question->option_c }}
                        @if($question->correct_answer == 'C') <span class="badge bg-success">Benar</span> @endif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" disabled 
                        {{ $question->correct_answer == 'D' ? 'checked' : '' }}>
                    <label class="form-check-label">
                        <strong>D.</strong> {{ $question->option_d }}
                        @if($question->correct_answer == 'D') <span class="badge bg-success">Benar</span> @endif
                    </label>
                </div>
            </div>
        </div>
        
        <a href="{{ route('admin.questions.edit', $question) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection