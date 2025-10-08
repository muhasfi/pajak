{{-- resources/views/forum/consultation.blade.php --}}
@extends('layouts.master')

@section('title', 'Forum Konsultasi Kasus - Diskusi Profesional')

@section('style')
<style>
    /* ===== VARIABLES & RESET ===== */
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #64748b;
        --success: #10b981;
        --warning: #f59e0b;
        --error: #ef4444;
        --background: #f8fafc;
        --surface: #ffffff;
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --text-muted: #94a3b8;
        --border: #e2e8f0;
        --border-light: #f1f5f9;
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --radius: 8px;
        --radius-lg: 12px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-color: var(--background);
        color: var(--text-primary);
        line-height: 1.6;
        font-weight: 400;
    }

    /* ===== LAYOUT ===== */
    .forum-container {
        min-height: 100vh;
        padding-bottom: 2rem;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    /* ===== HEADER ===== */
    .forum-header {
        background: linear-gradient(135deg, var(--surface) 0%, #f8fafc 100%);
        border-bottom: 1px solid var(--border-light);
        padding: 2rem 0;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .forum-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, #dbeafe 0%, transparent 70%);
        opacity: 0.6;
    }

    .forum-title {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--text-primary) 0%, var(--primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
        position: relative;
    }

    .forum-subtitle {
        font-size: 1.125rem;
        color: var(--text-secondary);
        font-weight: 400;
    }

    /* ===== STATS BAR ===== */
    .stats-bar {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: var(--surface);
        padding: 1.5rem;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        border: 1px solid var(--border-light);
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        display: block;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* ===== TOOLBAR ===== */
    .toolbar {
        background: var(--surface);
        border-radius: var(--radius-lg);
        padding: 1.25rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow);
        border: 1px solid var(--border-light);
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.5rem;
        position: sticky;
        top: 1rem;
        z-index: 10;
    }

    .toolbar-group {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .toolbar-divider {
        width: 1px;
        height: 24px;
        background: var(--border);
        margin: 0 0.5rem;
    }

    .toolbar-btn {
        background: transparent;
        border: 1px solid transparent;
        padding: 0.5rem 0.75rem;
        border-radius: var(--radius);
        cursor: pointer;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-secondary);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
    }

    .toolbar-btn:hover {
        background: var(--background);
        border-color: var(--border);
        color: var(--text-primary);
    }

    .toolbar-btn.active {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    /* ===== COMMENTS SECTION ===== */
    .comments-section {
        background: var(--surface);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        border: 1px solid var(--border-light);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .comments-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border-light);
        background: linear-gradient(135deg, #f8fafc 0%, var(--surface) 100%);
    }

    .comments-count {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .comments-count::before {
        content: '';
        width: 6px;
        height: 6px;
        background: var(--primary);
        border-radius: 50%;
    }

    /* ===== COMMENT ===== */
    .comment {
        padding: 1.75rem 2rem;
        border-bottom: 1px solid var(--border-light);
        transition: all 0.3s ease;
        position: relative;
    }

    .comment:hover {
        background: #fefefe;
    }

    .comment:last-child {
        border-bottom: none;
    }

    .comment.reply {
        margin-left: 3rem;
        border-left: 3px solid var(--border);
        padding-left: 1.5rem;
    }

    .comment-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .comment-user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .comment-avatar {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary) 0%, #7c3aed 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: white;
        font-size: 1.125rem;
        box-shadow: var(--shadow);
    }

    .comment-meta {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .comment-user {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 1rem;
    }

    .comment-badge {
        background: var(--primary);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .comment-date {
        color: var(--text-muted);
        font-size: 0.875rem;
    }

    .comment-status {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        background: #fef3c7;
        color: #d97706;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .comment-status.approved {
        background: #d1fae5;
        color: #059669;
    }

    .comment-status::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .comment-content {
        color: var(--text-primary);
        line-height: 1.7;
        margin-left: 4rem;
    }

    .comment-actions {
        margin-left: 4rem;
        margin-top: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .comment-action {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-size: 0.875rem;
        cursor: pointer;
        padding: 0.5rem 0.75rem;
        border-radius: var(--radius);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }

    .comment-action:hover {
        background: var(--background);
        color: var(--text-primary);
    }

    .comment-action.liked {
        color: var(--error);
    }

    /* ===== REPLY FORM ===== */
    .reply-form {
        background: var(--surface);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        padding: 2rem;
        border: 1px solid var(--border-light);
    }

    .reply-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .reply-title::before {
        content: '';
        width: 4px;
        height: 20px;
        background: var(--primary);
        border-radius: 2px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }

    .form-input {
        padding: 0.875rem 1rem;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        font-size: 0.875rem;
        transition: all 0.2s ease;
        background: var(--surface);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-textarea {
        min-height: 140px;
        resize: vertical;
        font-family: inherit;
        line-height: 1.6;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .btn {
        padding: 0.875rem 1.75rem;
        border: none;
        border-radius: var(--radius);
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-secondary {
        background: var(--background);
        color: var(--text-secondary);
        border: 1px solid var(--border);
    }

    .btn-secondary:hover {
        background: #f1f5f9;
        color: var(--text-primary);
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        box-shadow: var(--shadow);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    /* ===== SUCCESS MESSAGE ===== */
    .alert {
        padding: 1rem 1.5rem;
        border-radius: var(--radius);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        animation: slideIn 0.3s ease;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .forum-title {
            font-size: 2rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .comment-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .comment-content {
            margin-left: 0;
        }
        
        .comment-actions {
            margin-left: 0;
        }
        
        .comment.reply {
            margin-left: 1rem;
        }
        
        .toolbar {
            position: static;
        }
    }

    /* ===== LOADING STATES ===== */
    .loading {
        opacity: 0.7;
        pointer-events: none;
    }

    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
        border-radius: var(--radius);
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }
</style>
@endsection

@section('content')
<div class="forum-container">
    <!-- Header -->
    <div class="forum-header">
        <div class="container">
            <h1 class="forum-title">Forum Konsultasi Kasus</h1>
            <p class="forum-subtitle">Diskusikan masalah dan temukan solusi bersama komunitas profesional</p>
        </div>
    </div>

    <div class="container">

        <!-- Success Message -->
        <div id="successMessage" class="alert alert-success" style="display: none;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Komentar Anda telah berhasil dikirim dan menunggu persetujuan admin.
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <div class="comments-header">
                <h2 class="comments-count">20.4K KOMENTAR</h2>
            </div>

            <!-- Comment from David -->
            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user-info">
                        <div class="comment-avatar">D</div>
                        <div class="comment-meta">
                            <div class="comment-user">David <span class="comment-badge">Pengguna Baru</span></div>
                            <div class="comment-date">2 Oktober 2025 • 02:11</div>
                        </div>
                    </div>
                    <div class="comment-status">Awaiting for approval</div>
                </div>
                <div class="comment-content">
                    <p>Halo Om, jika saya salah input kode faktur yang seharusnya 02 tapi diinput 04, fakturnya bisa diganti atau dibatalkan buatkan faktur baru?</p>
                </div>
                <div class="comment-actions">
                    <button class="comment-action" onclick="likeComment(1)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M14 6h-4V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zM5 3h3v3H5V3zm9 9a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7h10v5z"/>
                        </svg>
                        Suka
                    </button>
                    <button class="comment-action" onclick="replyToComment(1)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.1l1.3 2.6c.1.2.4.4.6.4.2 0 .5-.1.6-.4l1.3-2.6H16c4.4 0 8-3.1 8-7s-3.6-7-8-7z"/>
                        </svg>
                        Balas
                    </button>
                    <button class="comment-action" onclick="shareComment(1)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M12 10c-.6 0-1.1.2-1.5.6L5.9 8.5c0-.2.1-.3.1-.5s-.1-.3-.1-.5l4.6-2.1c.4.4.9.6 1.5.6 1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2c0 .2.1.3.1.5L5.6 6.6C5.2 6.2 4.7 6 4 6c-1.1 0-2 .9-2 2s.9 2 2 2c.7 0 1.2-.2 1.6-.6l4.5 2.1c0 .2-.1.3-.1.5 0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                        Bagikan
                    </button>
                </div>
            </div>

            <!-- Reply from Sarah -->
            <div class="comment reply">
                <div class="comment-header">
                    <div class="comment-user-info">
                        <div class="comment-avatar">S</div>
                        <div class="comment-meta">
                            <div class="comment-user">Sarah <span class="comment-badge">Ahli Pajak</span></div>
                            <div class="comment-date">1 Oktober 2025 • 16:30</div>
                        </div>
                    </div>
                    <div class="comment-status approved">Approved</div>
                </div>
                <div class="comment-content">
                    <p>Menurut pengalaman saya, faktur pajak yang sudah terbit tidak bisa diubah. Solusinya adalah dengan membuat faktur pengganti. Pastikan untuk mencantumkan nomor faktur yang diganti pada faktur pengganti tersebut.</p>
                    
                    <div style="background: var(--background); padding: 1rem; border-radius: var(--radius); margin-top: 1rem; border-left: 4px solid var(--success);">
                        <strong>Tips Profesional:</strong> Selalu double-check kode faktur sebelum melakukan upload ke sistem.
                    </div>
                </div>
                <div class="comment-actions">
                    <button class="comment-action liked" onclick="likeComment(2)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M14 6h-4V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zM5 3h3v3H5V3zm9 9a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7h10v5z"/>
                        </svg>
                        12
                    </button>
                    <button class="comment-action" onclick="replyToComment(2)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.1l1.3 2.6c.1.2.4.4.6.4.2 0 .5-.1.6-.4l1.3-2.6H16c4.4 0 8-3.1 8-7s-3.6-7-8-7z"/>
                        </svg>
                        Balas
                    </button>
                </div>
            </div>

            <!-- Reply from Admin -->
            <div class="comment reply">
                <div class="comment-header">
                    <div class="comment-user-info">
                        <div class="comment-avatar">A</div>
                        <div class="comment-meta">
                            <div class="comment-user">Admin Support <span class="comment-badge">Tim Resmi</span></div>
                            <div class="comment-date">1 Oktober 2025 • 17:15</div>
                        </div>
                    </div>
                    <div class="comment-status approved">Approved</div>
                </div>
                <div class="comment-content">
                    <p>Benar seperti yang disampaikan Sarah. Untuk kesalahan penginputan kode faktur, Anda perlu membuat Faktur Pajak Pengganti.</p>
                    
                    <div style="background: var(--background); padding: 1.5rem; border-radius: var(--radius); margin: 1rem 0;">
                        <strong style="display: block; margin-bottom: 0.75rem; color: var(--primary);">Langkah-langkah Pembuatan Faktur Pengganti:</strong>
                        <ol style="padding-left: 1.5rem; space-y: 0.5rem;">
                            <li style="margin-bottom: 0.5rem;">Buka menu Faktur Pajak Pengganti</li>
                            <li style="margin-bottom: 0.5rem;">Pilih faktur yang akan diganti</li>
                            <li style="margin-bottom: 0.5rem;">Perbaiki kode faktur menjadi 02</li>
                            <li style="margin-bottom: 0.5rem;">Simpan dan upload ke sistem</li>
                        </ol>
                    </div>
                    
                    <p>Pastikan juga untuk membatalkan FP yang salah jika memungkinkan.</p>
                </div>
                <div class="comment-actions">
                    <button class="comment-action liked" onclick="likeComment(3)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M14 6h-4V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zM5 3h3v3H5V3zm9 9a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7h10v5z"/>
                        </svg>
                        24
                    </button>
                    <button class="comment-action" onclick="replyToComment(3)">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.1l1.3 2.6c.1.2.4.4.6.4.2 0 .5-.1.6-.4l1.3-2.6H16c4.4 0 8-3.1 8-7s-3.6-7-8-7z"/>
                        </svg>
                        Balas
                    </button>
                </div>
            </div>
        </div>

        <!-- Reply Form -->
        <div class="reply-form">
            <h3 class="reply-title">Tambahkan Komentar</h3>
            <form id="commentForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="nama@email.com" required>
                    </div>
                    <div class="form-group full-width">
                        <label class="form-label" for="comment">Komentar Anda</label>
                        <textarea id="comment" name="comment" class="form-input form-textarea" placeholder="Tulis komentar profesional Anda di sini..." required></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="resetForm()">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm4 10.8L10.8 12 8 9.2 5.2 12 4 10.8 6.8 8 4 5.2 5.2 4 8 6.8 10.8 4 12 5.2 9.2 8 12 10.8z"/>
                        </svg>
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.5.5 0 0 0-.052.936l3.7 1.5 1.5 3.7a.5.5 0 0 0 .936-.052l5.82-14.547z"/>
                        </svg>
                        Kirim Komentar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Format toolbar functionality
    document.querySelectorAll('.toolbar-btn').forEach(button => {
        button.addEventListener('click', function() {
            const format = this.dataset.format;
            handleFormat(format);
            
            // Toggle active state
            if (format !== 'clear' && format !== 'more') {
                this.classList.toggle('active');
            }
        });
    });

    function handleFormat(format) {
        const commentTextarea = document.getElementById('comment');
        
        switch(format) {
            case 'bold':
                wrapSelection(commentTextarea, '**', '**');
                break;
            case 'italic':
                wrapSelection(commentTextarea, '*', '*');
                break;
            case 'underline':
                wrapSelection(commentTextarea, '<u>', '</u>');
                break;
            case 'list':
                wrapSelection(commentTextarea, '\n- ', '');
                break;
            case 'code':
                wrapSelection(commentTextarea, '`', '`');
                break;
            case 'quote':
                wrapSelection(commentTextarea, '\n> ', '');
                break;
            case 'clear':
                commentTextarea.value = '';
                break;
        }
        
        commentTextarea.focus();
    }

    function wrapSelection(textarea, before, after) {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selectedText = textarea.value.substring(start, end);
        const newText = textarea.value.substring(0, start) + before + selectedText + after + textarea.value.substring(end);
        
        textarea.value = newText;
        textarea.selectionStart = start + before.length;
        textarea.selectionEnd = end + before.length;
    }

    // Comment actions
    function likeComment(commentId) {
        const btn = event.currentTarget;
        btn.classList.toggle('liked');
        
        if (btn.classList.contains('liked')) {
            // Simulate API call
            setTimeout(() => {
                const currentCount = parseInt(btn.textContent) || 0;
                btn.innerHTML = `
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                        <path d="M14 6h-4V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zM5 3h3v3H5V3zm9 9a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7h10v5z"/>
                    </svg>
                    ${currentCount + 1}
                `;
            }, 300);
        }
    }

    function replyToComment(commentId) {
        const commentForm = document.getElementById('commentForm');
        const textarea = document.getElementById('comment');
        textarea.focus();
        textarea.value = `@${commentId} `;
    }

    function shareComment(commentId) {
        // Simulate share functionality
        if (navigator.share) {
            navigator.share({
                title: 'Komentar Forum Konsultasi',
                text: 'Lihat komentar menarik di forum konsultasi kami',
                url: window.location.href + `#comment-${commentId}`
            });
        } else {
            alert('Fitur berbagi tidak didukung di browser ini');
        }
    }

    // Form submission
    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validasi form
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const comment = document.getElementById('comment').value.trim();
        
        if (!name || !email || !comment) {
            alert('Harap lengkapi semua field yang diperlukan!');
            return;
        }
        
        if (!isValidEmail(email)) {
            alert('Harap masukkan alamat email yang valid!');
            return;
        }
        
        // Simulate API call
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = `
            <svg class="animate-spin" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z"/>
            </svg>
            Mengirim...
        `;
        submitBtn.disabled = true;
        
        setTimeout(() => {
            // Show success message
            document.getElementById('successMessage').style.display = 'flex';
            
            // Reset form
            this.reset();
            
            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
        }, 1500);
    });

    // Email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Reset form
    function resetForm() {
        document.getElementById('commentForm').reset();
    }

    // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
        // Add fade-in animation to comments
        const comments = document.querySelectorAll('.comment');
        comments.forEach((comment, index) => {
            comment.style.opacity = '0';
            comment.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                comment.style.transition = 'all 0.5s ease';
                comment.style.opacity = '1';
                comment.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>
@endsection