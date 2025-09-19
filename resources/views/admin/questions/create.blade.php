@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ isset($question) ? 'Edit' : 'Tambah' }} Pertanyaan</h2>
    </div>
    <div class="card-body">
        <form action="{{ isset($question) ? route('admin.questions.update', $question) : route('questions.store') }}" method="POST">
            @csrf
            @if(isset($question))
                @method('PUT')
            @endif
            
            <div class="mb-3">
                <label for="question" class="form-label">Pertanyaan</label>
                <textarea class="form-control" id="question" name="question" rows="3" required>{{ old('question', $question->question ?? '') }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="option_a" class="form-label">Opsi A</label>
                        <input type="text" class="form-control" id="option_a" name="option_a" value="{{ old('option_a', $question->option_a ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="option_b" class="form-label">Opsi B</label>
                        <input type="text" class="form-control" id="option_b" name="option_b" value="{{ old('option_b', $question->option_b ?? '') }}" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="option_c" class="form-label">Opsi C</label>
                        <input type="text" class="form-control" id="option_c" name="option_c" value="{{ old('option_c', $question->option_c ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="option_d" class="form-label">Opsi D</label>
                        <input type="text" class="form-control" id="option_d" name="option_d" value="{{ old('option_d', $question->option_d ?? '') }}" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Jawaban yang Benar</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct_answer" id="correct_a" value="A" 
                            {{ old('correct_answer', $question->correct_answer ?? '') == 'A' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="correct_a">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct_answer" id="correct_b" value="B"
                            {{ old('correct_answer', $question->correct_answer ?? '') == 'B' ? 'checked' : '' }}>
                        <label class="form-check-label" for="correct_b">B</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct_answer" id="correct_c" value="C"
                            {{ old('correct_answer', $question->correct_answer ?? '') == 'C' ? 'checked' : '' }}>
                        <label class="form-check-label" for="correct_c">C</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct_answer" id="correct_d" value="D"
                            {{ old('correct_answer', $question->correct_answer ?? '') == 'D' ? 'checked' : '' }}>
                        <label class="form-check-label" for="correct_d">D</label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection