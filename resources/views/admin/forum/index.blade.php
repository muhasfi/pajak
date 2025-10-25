@extends('admin.layouts.master')

@section('title', 'Manajemen Komentar & Pertanyaan')

@section('content')
<style>
    /* ====== STYLE TAMBAHAN UNTUK DESAIN LEBIH RAPI ====== */
    body {
        background-color: #f8fafc;
        font-family: 'Poppins', sans-serif;
    }

    h2 {
        font-weight: 600;
        color: #1e293b;
    }

    .card {
        border: none;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .card-body {
        background-color: #fff;
        border-radius: 12px;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        flex-wrap: wrap;
    }

    .comment-header strong {
        font-size: 16px;
        color: #0f172a;
    }

    .comment-header small {
        color: #64748b;
    }

    .comment-content {
        font-size: 15px;
        color: #1e293b;
        background: #f9fafb;
        padding: 10px 15px;
        border-radius: 8px;
    }

    .reply-box {
        background-color: #f1f5f9;
        padding: 10px 15px;
        border-radius: 8px;
        margin-top: 8px;
    }

    .reply-box strong {
        color: #1d4ed8;
    }

    .btn-sm {
        border-radius: 8px;
        font-weight: 500;
        margin-left: 4px;
        margin-right: 4px;
    }

    textarea.form-control {
        border-radius: 10px;
        font-size: 14px;
    }

    .alert {
        border-radius: 10px;
    }

    /* ===== TAMPILAN AGAK NAIK ===== */
    .top-container {
        margin-top: 2rem !important; /* Turunkan dari my-5 (3rem) ke 2rem */
        padding-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .comment-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .comment-header div:last-child {
            margin-top: 10px;
        }
    }
</style>

<div class="container top-container">
    <h2 class="mb-4 text-center">💬 Manajemen Komentar & Pertanyaan</h2>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    @foreach($comments as $comment)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <!-- HEADER KOMENTAR -->
                <div class="comment-header mb-3">
                    <div>
                        <strong>{{ $comment->name }}</strong> 
                        <small class="text-muted d-block">📧 {{ $comment->email }}</small>
                        <small class="text-muted">{{ $comment->created_at->format('d M Y • H:i') }}</small>
                    </div>

                    <div class="text-end">
                     
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <!-- ISI KOMENTAR -->
                <p class="comment-content mb-3">{{ $comment->content }}</p>

                <hr>

                <!-- BALASAN ADMIN -->
                <h6 class="fw-semibold mb-2 text-primary">Balasan Admin</h6>

                @forelse($comment->replies as $reply)
                    <div class="reply-box mb-2">
                        <strong>{{ $reply->admin_name }}</strong> 
                        <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                        <p class="mb-2">{{ $reply->content }}</p>
                        <div>
                            <a href="{{ route('reply.edit', $reply) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('reply.destroy', $reply) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-muted small">Belum ada balasan admin.</p>
                @endforelse

                <!-- FORM BALASAN ADMIN -->
                <form action="{{ route('reply.store', $comment) }}" method="POST" class="mt-3">
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
