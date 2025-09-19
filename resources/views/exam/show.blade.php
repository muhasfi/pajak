@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Pertanyaan #{{ $id + 1 }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('exam.answer', $id) }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <p class="fw-bold">{{ $question->question }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="option_a" value="A" required>
                            <label class="form-check-label" for="option_a">
                                <strong>A.</strong> {{ $question->option_a }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="option_b" value="B">
                            <label class="form-check-label" for="option_b">
                                <strong>B.</strong> {{ $question->option_b }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="option_c" value="C">
                            <label class="form-check-label" for="option_c">
                                <strong>C.</strong> {{ $question->option_c }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="option_d" value="D">
                            <label class="form-check-label" for="option_d">
                                <strong>D.</strong> {{ $question->option_d }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Jawab dan Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection