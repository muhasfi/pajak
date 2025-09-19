@extends('admin.layouts.master')


@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Pertanyaan</h2>
    <a href="/admin/questions/create" class="btn btn-primary">Tambah Pertanyaan</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban Benar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($question->question, 50) }}</td>
                        <td>{{ $question->correct_answer }}</td>
                        <td>
                            <a href="{{ route('admin.questions.show', $question) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('admin.questions.edit', $question) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pertanyaan?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $questions->links() }}
        </div>
    </div>
</div>
@endsection