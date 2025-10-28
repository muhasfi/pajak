@foreach($comments as $reply)
    @php
        // Maksimal 2 kali menjorok
        $marginLeft = match(true) {
            $level === 1 => '2rem',
            $level >= 2 => '4rem',
            default => '0rem',
        };
    @endphp

    <div class="reply-box mb-3" style="margin-left: {{ $marginLeft }};">
        <strong>{{ $reply->admin_id ? 'Admin' : $reply->name }}</strong>
        <small class="text-muted">{{ $reply->created_at->translatedFormat('d M Y • H:i') }}</small>
        <p class="mb-2">{{ $reply->content }}</p>

        <!-- Tombol Edit/Hapus untuk Admin -->
        @if(auth('admin')->check())
            <div class="mb-2">
                @if($reply->admin_id === auth('admin')->id())
                    <a href="{{ route('admin.comments.update', $reply) }}" class="btn btn-sm btn-warning">Edit</a>
                @endif
                <form action="{{ route('admin.comments.destroy', $reply) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                </form>
            </div>
        @endif

        <!-- Balasan anak (nested) -->
        @if($reply->replies && $reply->replies->count())
            @include('admin.forum.partials.comments', [
                'comments' => $reply->replies,
                'level' => $level + 1
            ])
        @endif

        <!-- Form balasan admin untuk nested reply -->
        <form action="{{ route('admin.comments.reply', $reply) }}" method="POST" class="mt-2">
            @csrf
            <textarea name="content" class="form-control mb-2" placeholder="Balas komentar ini..." rows="2"></textarea>
            <button type="submit" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-reply"></i> Balas
            </button>
        </form>
    </div>
@endforeach
