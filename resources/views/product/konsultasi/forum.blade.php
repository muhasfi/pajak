@extends('layouts.master')

@section('title', 'Forum Konsultasi Pajak - Tanya Jawab Profesional')

@section('style')
<style>
    body {
        background-color: #f8fafc;
        font-family: 'Poppins', sans-serif;
        color: #1f2937; /* Default text color untuk kontras lebih baik */
        line-height: 1.6;
    }

    /* ===== Hero Section ===== */
    .hero-section {
        background: url('https://images.unsplash.com/photo-1605902711622-cfb43c4437d0?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
        position: relative;
        overflow: hidden;
        padding: 80px 0 60px;
    }

    /* Overlay agar teks lebih jelas */
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.85) 50%, rgba(59, 130, 246, 0.8) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
        color: white;
    }

    .hero-content h1 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: #ffffff;
        text-shadow: 0 3px 8px rgba(0, 0, 0, 0.5);
        line-height: 1.2;
    }

    .hero-content p {
        font-size: 1.1rem;
        color: #f9fafb;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto 30px;
        line-height: 1.7;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
        font-weight: 400;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
        margin-top: 40px;
    }

    .stat-item {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
        border-radius: 16px;
        padding: 20px 30px;
        min-width: 150px;
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.95;
        font-weight: 500;
    }

    /* ===== Features Banner ===== */
    .features-banner {
        background: white;
        border-bottom: 1px solid #e5e7eb;
        padding: 40px 0;
    }

    .features-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .feature-card {
        text-align: center;
        padding: 20px;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 1.5rem;
        color: white;
    }

    .feature-title {
        font-weight: 600;
        color: #111827;
        margin-bottom: 8px;
        font-size: 1.05rem;
    }

    .feature-desc {
        font-size: 0.9rem;
        color: #4b5563; /* Warna lebih gelap untuk kontras lebih baik */
        line-height: 1.5;
    }

    /* ===== Container ===== */
    .discussion-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }

    /* ===== Main Content ===== */
    .main-content {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .content-header {
        background: linear-gradient(135deg, #f8fafc, #ffffff);
        padding: 30px;
        border-bottom: 2px solid #e5e7eb;
    }

    .content-header h2 {
        font-weight: 700;
        color: #111827;
        font-size: 1.6rem;
        margin-bottom: 8px;
    }

    .content-header p {
        color: #6b7280;
        margin: 0;
        font-size: 0.95rem;
    }

    .discussion-body {
        padding: 30px;
    }

    .comment {
        background: #ffffff;
        border-radius: 14px;
        padding: 24px;
        margin-bottom: 25px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .comment:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.08);
        border-color: #3b82f6;
    }

    .comment .header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .avatar {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        margin-right: 15px;
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3);
    }

    .meta .name {
        font-weight: 600;
        color: #111827;
        font-size: 1.05rem;
    }

    .meta .time {
        font-size: 0.85rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 2px;
    }

    .content {
        font-size: 0.95rem;
        color: #374151;
        margin-bottom: 12px;
        line-height: 1.7;
        font-weight: 400;
    }

    /* ===== Admin Reply ===== */
    .admin-reply {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-left: 4px solid #3b82f6;
        border-radius: 12px;
        padding: 18px 20px;
        margin-top: 15px;
        margin-left: 60px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
    }

    .admin-reply .name {
        font-weight: 600;
        color: #2563eb;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.95rem;
    }

    .admin-badge {
        background: #3b82f6;
        color: white;
        padding: 2px 8px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* .admin-reply .content {
        color: #1e40af;
        font-size: 0.93rem;
        margin-top: 8px;
        line-height: 1.7;
        font-weight: 400;
    } */

    /* ===== Sidebar ===== */
    .sidebar {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .sidebar-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #e5e7eb;
    }

    .sidebar-card h3 {
        font-weight: 700;
        color: #111827;
        font-size: 1.1rem;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .quick-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .quick-links li {
        padding: 12px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .quick-links li:last-child {
        border-bottom: none;
    }

    .quick-links a {
        color: #374151;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        font-weight: 500;
    }

    .quick-links a:hover {
        color: #3b82f6;
        padding-left: 5px;
    }

    .quick-links i {
        color: #3b82f6;
        font-size: 0.9rem;
    }

    /* .info-box {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-radius: 12px;
        padding: 20px;
        border-left: 4px solid #3b82f6;
    }

    .info-box h4 {
        color: #1e40af;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 10px;
    }

    .info-box p {
        color: #1e40af;
        font-size: 0.9rem;
        margin: 0;
        line-height: 1.6;
        font-weight: 400;
    } */

    /* ===== Form ===== */
    .ask-form {
        background: white;
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #e5e7eb;
        margin-top: 30px;
    }

    .ask-form h3 {
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
        font-size: 1.5rem;
    }

    .ask-form .subtitle {
        color: #6b7280;
        margin-bottom: 25px;
        font-size: 0.95rem;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border-radius: 10px;
        border: 2px solid #e5e7eb;
        padding: 12px 16px;
        transition: all 0.3s;
        width: 100%;
        font-size: 0.95rem;
        color: #1f2937;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(155, 161, 170, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border: none;
        border-radius: 10px;
        padding: 12px 28px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        font-size: 0.95rem;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
    }

    .alert-success {
        border-radius: 12px;
        background: #d1fae5;
        border: 1px solid #6ee7b7;
        color: #065f46;
        padding: 15px 20px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    /* ===== Empty State ===== */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 20px;
    }

    .empty-state h4 {
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .empty-state p {
        color: #9ca3af;
        font-size: 0.95rem;
    }

    /* ===== Contact Info ===== */
    .contact-info p {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        color: #4b5563;
        font-size: 0.9rem;
    }

    .contact-info i {
        color: #3b82f6;
        width: 20px;
        margin-right: 10px;
    }

    /* ===== Responsive ===== */
    @media (max-width: 992px) {
        .hero-content h1 {
            font-size: 2rem;
        }
        .stat-item {
            min-width: 120px;
            padding: 15px 20px;
        }
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 60px 0 40px;
        }

        .hero-content h1 {
            font-size: 1.8rem;
        }

        .hero-content p {
            font-size: 1rem;
        }

        .discussion-body, .ask-form {
            padding: 20px;
        }

        .admin-reply {
            margin-left: 0;
        }

        .features-container {
            grid-template-columns: 1fr;
        }
        
        .content-header {
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .hero-content h1 {
            font-size: 1.6rem;
        }
        
        .hero-stats {
            gap: 20px;
        }
        
        .stat-item {
            min-width: 100px;
            padding: 12px 15px;
        }
        
        .stat-number {
            font-size: 1.8rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h1>🎯 Forum Konsultasi Pajak Profesional</h1>
        <p>Dapatkan jawaban terpercaya dari konsultan pajak bersertifikat. Kami siap membantu Anda memahami segala hal tentang perpajakan dengan mudah dan jelas.</p>
        
        {{-- <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">{{ $comments->count() }}+</span>
                <span class="stat-label">Pertanyaan</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <span class="stat-label">Dukungan</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Profesional</span>
            </div>
        </div> --}}
    </div>
</div>

<!-- Features Banner -->
<div class="features-banner">
    <div class="features-container">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-user-tie"></i>
            </div>
            <div class="feature-title">Konsultan Bersertifikat</div>
            <div class="feature-desc">Tim profesional dengan sertifikasi resmi</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-clock"></i>
            </div>
            <div class="feature-title">Respon Cepat</div>
            <div class="feature-desc">Jawaban dalam 24 jam kerja</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div class="feature-title">Keamanan Terjamin</div>
            <div class="feature-desc">Data Anda aman dan terlindungi</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-comments"></i>
            </div>
            <div class="feature-title">Gratis Konsultasi</div>
            <div class="feature-desc">Tanya jawab tanpa biaya apapun</div>
        </div>
    </div>
</div>

<!-- Main Discussion Container -->
<div class="discussion-container">

    <div class="content-grid">
        <!-- Kolom Utama -->
        <div class="main-content">

    <!-- Form Pertanyaan -->
    <div class="ask-form mb-5">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <h3>✍️ Ajukan Pertanyaan Anda</h3>
        <p class="subtitle">Isi formulir di bawah ini dengan lengkap dan jelas</p>
        
        {{-- Form komentar utama --}}
        <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
            @csrf

            {{-- Hanya tampil untuk guest --}}
            @guest
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-user"></i> Nama Lengkap
                    </label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-envelope"></i> Email
                    </label>
                    <input type="email" name="email" class="form-control" placeholder="alamat@email.com" required>
                </div>
            @endguest

            <div class="mb-3">
                <label class="form-label">
                    <i class="fa-solid fa-message"></i> Pertanyaan Anda
                </label>
                <textarea name="content" class="form-control" rows="5" placeholder="Tulis pertanyaan Anda secara detail di sini..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-paper-plane me-2"></i>
                Kirim Pertanyaan
            </button>
        </form>

    </div>

    <!-- Daftar Diskusi -->
    <div class="content-header">
        <h2>💬 Diskusi & Pertanyaan</h2>
        <p>Lihat pertanyaan dari pengguna lain atau ajukan pertanyaan Anda sendiri</p>
    </div>

    <div class="discussion-body">
        @forelse ($comments as $comment)
            <div class="comment">
    <div class="header">
        <div class="avatar">{{ strtoupper(substr($comment->name ?? 'A', 0, 1)) }}</div>
        <div class="meta">
            <div class="name">{{ $comment->name ?? 'Anonim' }}</div>
            <div class="time">
                <i class="fa-regular fa-clock"></i>
                {{ $comment->created_at->translatedFormat('d F Y • H:i') }}
            </div>
        </div>
    </div>

    <div class="content">{{ $comment->content }}</div>

    <!-- Tombol Balas -->
    <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="toggleReplyForm({{ $comment->id }})">
        <i class="fa-solid fa-reply"></i> Balas
    </button>

    <!-- Form Balasan -->
    <div id="reply-form-{{ $comment->id }}" style="display:none; margin-top:15px;">
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

    <!-- Balasan (Nested Replies) -->
    @if ($comment->replies->count())
        <div class="replies ms-4 mt-3 border-start ps-3">
            @foreach ($comment->replies as $reply)
                {{-- Panggil ulang template yang sama secara rekursif --}}
                @include('product.konsultasi.partials.comment', ['comment' => $reply])
            @endforeach
        </div>
    @endif
</div>

        @empty
            <div class="empty-state">
                <div class="empty-icon">💭</div>
                <h4>Belum Ada Pertanyaan</h4>
                <p>Jadilah yang pertama untuk mengajukan pertanyaan!</p>
            </div>
        @endforelse
    </div>
</div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-card">
                <h3><i class="fa-solid fa-link"></i> Tautan Cepat</h3>
                <ul class="quick-links">
                    <li><a href="#"><i class="fa-solid fa-book"></i> Panduan Pajak</a></li>
                    <li><a href="#"><i class="fa-solid fa-calculator"></i> Kalkulator Pajak</a></li>
                    <li><a href="#"><i class="fa-solid fa-file-invoice"></i> Formulir Pajak</a></li>
                    <li><a href="#"><i class="fa-solid fa-newspaper"></i> Berita Pajak</a></li>
                </ul>
            </div>

            <div class="sidebar-card info-box">
                <h4>📌 Informasi Penting</h4>
                <p>Pastikan pertanyaan Anda jelas dan detail agar tim kami dapat memberikan jawaban yang tepat dan akurat.</p>
            </div>

            <div class="sidebar-card">
                <h3><i class="fa-solid fa-headset"></i> Hubungi Kami</h3>
                <div class="contact-info">
                    <p><i class="fa-solid fa-envelope"></i> info@pajakpro.com</p>
                    <p><i class="fa-solid fa-phone"></i> (021) 1234-5678</p>
                    <p><i class="fa-solid fa-location-dot"></i> Jakarta, Indonesia</p>
                </div>
            </div>
        </aside>
    </div>

</div>
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
@endsection