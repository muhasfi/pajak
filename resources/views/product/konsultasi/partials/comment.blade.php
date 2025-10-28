@php
    // Maksimal tiga kali menjorok (level 0 = 0px, level 1 = 2rem, level 2 = 4rem, level 3+ = 6rem)
    $marginLeft = match(true) {
        !isset($level) || $level === 0 => '0rem',
        $level === 1 => '2rem',
        $level === 2 => '4rem',
        default => '6rem', // semua level 3 ke atas tetap sejajar
    };
@endphp


<div class="comment-item mb-4" style="margin-left: {{ $marginLeft }}">
    <!-- Header -->
    <div class="header d-flex align-items-center">
        <div class="avatar bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width:35px;height:35px;">
            {{ strtoupper(substr($comment->name ?? 'A', 0, 1)) }}
        </div>
        <div>
            <strong>{{ $comment->name ?? 'Anonim' }}</strong>
            @if($comment->admin_id)
                <span class="badge bg-warning text-dark">ADMIN</span>
            @endif
            <br>
            <small class="text-muted">
                <i class="fa-regular fa-clock"></i>
                {{ $comment->created_at->translatedFormat('d F Y • H:i') }}
            </small>
        </div>
    </div>

    <!-- Isi komentar -->
    <div class="content mt-2 ms-5">
        {{ $comment->content }}
    </div>

    <!-- Tombol Balas -->
    <div class="ms-5 mt-2">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleReplyForm({{ $comment->id }})">
            <i class="fa-solid fa-reply"></i> Balas
        </button>
    </div>

    <!-- Form balasan -->
    <div id="reply-form-{{ $comment->id }}" class="ms-5 mt-2" style="display:none;">
        <form action="{{ route('comments.store') }}" method="POST" class="border rounded p-3 bg-light">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">

            @guest
                <div class="mb-2">
                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama Anda" required>
                </div>
                <div class="mb-2">
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Email Anda" required>
                </div>
            @endguest

            <div class="mb-2">
                <textarea name="content" class="form-control form-control-sm" rows="2" placeholder="Tulis balasan Anda..." required></textarea>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-paper-plane"></i> Kirim Balasan
            </button>
        </form>
    </div>

    <!-- Balasan komentar -->
    @if ($comment->replies && $comment->replies->count())
        <div class="replies mt-3 border-start ps-3">
            @foreach ($comment->replies as $reply)
                @include('product.konsultasi.partials.comment', [
                    'comment' => $reply,
                    'level' => isset($level) ? $level + 1 : 1
                ])
            @endforeach
        </div>
    @endif
</div>

<script>
    function toggleReplyForm(id) {
        const form = document.getElementById(`reply-form-${id}`);
        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
</script>