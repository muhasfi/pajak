@extends('admin.layouts.master')

@section('title', 'Manajemen Komentar & Pertanyaan')

@section('content')

<div class="container top-container">
    <h2 class="mb-4 text-center">💬 Manajemen Komentar & Pertanyaan</h2>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    @foreach($comments as $comment)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <!-- HEADER KOMENTAR -->
                <div class="comment-header mb-3 d-flex justify-content-between align-items-start">
                    <div>
                        <strong>{{ $comment->name }}</strong><br>
                        <small class="text-muted d-block">📧 {{ $comment->email }}</small>
                        <small class="text-muted">{{ $comment->created_at->format('d M Y • H:i') }}</small>
                    </div>

                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" title="Hapus komentar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

                <p class="comment-content mb-3">{{ $comment->content }}</p>
                <hr>

                <!-- Tombol Lihat Balasan -->
                @if($comment->replies->count() > 0)
                    <button class="btn btn-outline-secondary btn-sm mb-2" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#replies-{{ $comment->id }}" 
                        aria-expanded="false" 
                        aria-controls="replies-{{ $comment->id }}">
                        💬 Lihat {{ $comment->replies->count() }} Balasan
                    </button>
                @endif

                <!-- BALASAN KOMENTAR (admin + user) -->
                <div class="collapse" id="replies-{{ $comment->id }}">
                    <div class="mt-2">
                        <h6 class="fw-semibold mb-2 text-primary">Balasan</h6>
                        @include('admin.forum.partials.comments', [
                            'comments' => $comment->replies, 
                            'level' => 1, 
                            'parentId' => $comment->id
                        ])
                    </div>
                </div>

                <!-- FORM BALASAN ADMIN -->
                <form action="{{ route('admin.comments.reply', $comment) }}" method="POST" class="mt-3">
                    @csrf
                    <textarea name="content" class="form-control mb-2" placeholder="Tulis balasan..." rows="2"></textarea>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-send"></i> Kirim Balasan
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection
