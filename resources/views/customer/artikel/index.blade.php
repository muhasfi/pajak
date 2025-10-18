@extends('layouts.master')

@section('title', 'Berita Pilihan')

@section('content')
<div class="news-container">
    <!-- Header Section -->
    <div class="section-header">
        <div class="header-content">
            <h2 class="section-title">
                <span class="title-accent"></span>
                Berita Pilihan
            </h2>
            <a href="#" class="view-all-link">
                Lihat Semua
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M6 3L11 8L6 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
        <!-- Featured Article -->
        <article class="featured-article" data-news-id="1">
            <div class="article-image-wrapper">
                <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                    class="article-image" alt="Vape Zombie Malaysia" onerror="this.src='https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'">
                <span class="article-badge">Breaking News</span>
            </div>
            <div class="article-content">
                <div class="article-meta">
                    <span class="meta-time">9 menit lalu</span>
                    <span class="meta-divider">•</span>
                    <span class="meta-category">Kriminal</span>
                </div>
                <h3 class="article-title">Vape Zombie, Rokok Elektrik yang Diduga Mengandung Narkoba Berasal dari Malaysia</h3>
                <p class="article-excerpt">
                    Direktorat Tindak Pidana Narkoba Bareskrim Polri berhasil menggagalkan penyelundupan 84 cairan vape yang diduga mengandung zat etomidate atau dikenal sebagai Vape Zombie dari Malaysia.
                </p>
            </div>
        </article>

        <!-- Side Articles -->
        <aside class="side-articles">
            <article class="side-article" data-news-id="2">
                <img src="https://images.unsplash.com/photo-1565689223820-b9fd35fa4f8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                    class="side-article-image" alt="Penjual Tahu Goreng" onerror="this.src='https://images.unsplash.com/photo-1565689223820-b9fd35fa4f8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'">
                <div class="side-article-content">
                    <span class="side-article-time">15 menit lalu</span>
                    <h4 class="side-article-title">Penjual Tahu Goreng di China Viral karena Dagang Pakai Cosplay Kaisar Kuno</h4>
                </div>
            </article>

            <article class="side-article" data-news-id="3">
                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                    class="side-article-image" alt="Bandara YIA Kuliner" onerror="this.src='https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'">
                <div class="side-article-content">
                    <span class="side-article-time">24 menit lalu</span>
                    <h4 class="side-article-title">12 Rekomendasi Tempat Makan Enak Dekat Bandara YIA, Kuliner Lezat di Sekitar...</h4>
                </div>
            </article>

            <article class="side-article" data-news-id="4">
                <img src="https://images.unsplash.com/photo-1579952363873-27d3b8efd5e6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80" 
                    class="side-article-image" alt="Italia vs Israel" onerror="this.src='https://images.unsplash.com/photo-1579952363873-27d3b8efd5e6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1176&q=80'">
                <div class="side-article-content">
                    <span class="side-article-time">24 menit lalu</span>
                    <h4 class="side-article-title">Prediksi Italia vs Israel: Kemenangan Adalah Satu-satunya Pilihan</h4>
                </div>
            </article>
        </aside>
    </div>

    <!-- Spotlight Section -->
    <div class="spotlight-section">
        <div class="section-header">
            <div class="header-content">
                <h2 class="section-title spotlight-title">
                    <span class="title-accent spotlight-accent"></span>
                    Sorotan
                </h2>
                <a href="#" class="view-all-link">
                    Lihat Semua
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M6 3L11 8L6 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="spotlight-grid">
            <article class="spotlight-card" data-news-id="5">
                <div class="spotlight-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1190&q=80" 
                        class="spotlight-image" alt="Gleison Bremer" onerror="this.src='https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1190&q=80'">
                    <span class="spotlight-category">Bola</span>
                </div>
                <div class="spotlight-content">
                    <span class="spotlight-time">26 menit lalu</span>
                    <h4 class="spotlight-title">Cedera Lutut Gleison Bremer Jadi Masalah Baru untuk Juventus</h4>
                </div>
            </article>

            <article class="spotlight-card" data-news-id="6">
                <div class="spotlight-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                        class="spotlight-image" alt="Obamacare" onerror="this.src='https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'">
                    <span class="spotlight-category">Bisnis</span>
                </div>
                <div class="spotlight-content">
                    <span class="spotlight-time">29 menit lalu</span>
                    <h4 class="spotlight-title">Kebutuhan Pendanaan Obamacare Picu Shutdown Pemerintahan AS</h4>
                </div>
            </article>

            <article class="spotlight-card" data-news-id="7">
                <div class="spotlight-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                        class="spotlight-image" alt="Jeff Bezos" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80'">
                    <span class="spotlight-category">Bisnis</span>
                </div>
                <div class="spotlight-content">
                    <span class="spotlight-time">44 menit lalu</span>
                    <h4 class="spotlight-title">Jeff Bezos Ungkap Rahasia Sebelum Mulai Bangun Blue Origin</h4>
                </div>
            </article>

            <article class="spotlight-card" data-news-id="8">
                <div class="spotlight-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                        class="spotlight-image" alt="IBL 2026" onerror="this.src='https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80'">
                    <span class="spotlight-category">Bola</span>
                </div>
                <div class="spotlight-content">
                    <span class="spotlight-time">44 menit lalu</span>
                    <h4 class="spotlight-title">IBL 2026 Siap Bergulir: Format Kandang-Tandang akan Diterapkan</h4>
                </div>
            </article>
        </div>
    </div>
</div>

<!-- Modal untuk menampilkan berita lengkap -->
<div id="newsModal" class="news-modal">
    <div class="news-modal-content">
        <div class="news-modal-header">
            <button id="closeModal" class="close-modal">&times;</button>
        </div>
        <div class="news-modal-body">
            <div id="newsContent">
                <!-- Konten berita akan dimuat di sini -->
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #1a1a2e;
    --accent-red: #e63946;
    --accent-yellow: #f4a261;
    --text-primary: #2d3748;
    --text-secondary: #64748b;
    --text-muted: #94a3b8;
    --bg-white: #ffffff;
    --bg-gray: #f8fafc;
    --border-color: #e2e8f0;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.12);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: var(--text-primary);
    background-color: var(--bg-gray);
}

.news-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 3rem 1.5rem;
}

/* Section Header */
.section-header {
    margin-bottom: 2rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0;
}

.title-accent {
    width: 4px;
    height: 28px;
    background: linear-gradient(180deg, var(--accent-red) 0%, #ff6b6b 100%);
    border-radius: 2px;
}

.spotlight-accent {
    background: linear-gradient(180deg, var(--accent-yellow) 0%, #ffd97d 100%);
}

.view-all-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--accent-red);
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: var(--transition);
}

.view-all-link:hover {
    gap: 0.75rem;
    color: #d62828;
}

/* Main Content Grid */
.content-grid {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 2rem;
    margin-bottom: 4rem;
}

/* Featured Article */
.featured-article {
    background: var(--bg-white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    cursor: pointer;
}

.featured-article:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

.article-image-wrapper {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16/9;
}

.article-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    display: block;
}

.featured-article:hover .article-image {
    transform: scale(1.08);
}

.article-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--accent-red);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.813rem;
    font-weight: 600;
    letter-spacing: 0.3px;
    z-index: 2;
}

.article-content {
    padding: 1.75rem;
}

.article-meta {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    font-size: 0.875rem;
}

.meta-time {
    color: var(--text-muted);
}

.meta-divider {
    color: var(--border-color);
}

.meta-category {
    color: var(--accent-red);
    font-weight: 600;
}

.article-title {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1.4;
    color: var(--text-primary);
    margin-bottom: 1rem;
    transition: color 0.3s ease;
}

.featured-article:hover .article-title {
    color: var(--accent-red);
}

.article-excerpt {
    color: var(--text-secondary);
    line-height: 1.7;
    font-size: 0.938rem;
}

/* Side Articles */
.side-articles {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.side-article {
    display: flex;
    gap: 1rem;
    background: var(--bg-white);
    padding: 1rem;
    border-radius: 12px;
    transition: var(--transition);
    cursor: pointer;
    box-shadow: var(--shadow-sm);
}

.side-article:hover {
    box-shadow: var(--shadow-md);
    transform: translateX(4px);
}

.side-article-image {
    width: 120px;
    height: 90px;
    object-fit: cover;
    border-radius: 8px;
    flex-shrink: 0;
    transition: transform 0.4s ease;
    display: block;
}

.side-article:hover .side-article-image {
    transform: scale(1.05);
}

.side-article-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    flex: 1;
}

.side-article-time {
    color: var(--text-muted);
    font-size: 0.813rem;
    margin-bottom: 0.5rem;
}

.side-article-title {
    font-size: 0.938rem;
    font-weight: 600;
    line-height: 1.5;
    color: var(--text-primary);
    transition: color 0.3s ease;
}

.side-article:hover .side-article-title {
    color: var(--accent-red);
}

/* Spotlight Section */
.spotlight-section {
    margin-top: 4rem;
}

.spotlight-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.spotlight-card {
    background: var(--bg-white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    cursor: pointer;
}

.spotlight-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-6px);
}

.spotlight-image-wrapper {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16/10;
}

.spotlight-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
}

.spotlight-card:hover .spotlight-image {
    transform: scale(1.1);
}

.spotlight-category {
    position: absolute;
    top: 0.75rem;
    left: 0.75rem;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    color: var(--text-primary);
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    z-index: 2;
}

.spotlight-content {
    padding: 1.25rem;
}

.spotlight-time {
    color: var(--text-muted);
    font-size: 0.813rem;
    display: block;
    margin-bottom: 0.5rem;
}

.spotlight-title {
    font-size: 0.938rem;
    font-weight: 600;
    line-height: 1.5;
    color: var(--text-primary);
    transition: color 0.3s ease;
}

.spotlight-card:hover .spotlight-title {
    color: var(--accent-red);
}

/* Modal Styles */
.news-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 1000;
    overflow-y: auto;
    padding: 2rem;
}

.news-modal-content {
    background-color: var(--bg-white);
    margin: 0 auto;
    max-width: 900px;
    border-radius: 16px;
    box-shadow: var(--shadow-lg);
    position: relative;
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.news-modal-header {
    padding: 1.5rem 2rem 0;
    display: flex;
    justify-content: flex-end;
}

.close-modal {
    background: none;
    border: none;
    font-size: 2rem;
    color: var(--text-muted);
    cursor: pointer;
    transition: color 0.3s ease;
    line-height: 1;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.close-modal:hover {
    color: var(--accent-red);
}

.news-modal-body {
    padding: 0 2rem 2rem;
}

.news-full-content {
    max-width: 800px;
    margin: 0 auto;
}

.news-full-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    display: block;
}

.news-full-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
    flex-wrap: wrap;
}

.news-full-time {
    color: var(--text-muted);
}

.news-full-category {
    color: var(--accent-red);
    font-weight: 600;
    background-color: rgba(230, 57, 70, 0.1);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
}

.news-full-title {
    font-size: 2rem;
    font-weight: 700;
    line-height: 1.3;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
}

.news-full-body {
    color: var(--text-secondary);
    line-height: 1.8;
    font-size: 1.1rem;
}

.news-full-body p {
    margin-bottom: 1.5rem;
}

.news-full-body h3 {
    font-size: 1.5rem;
    margin: 2rem 0 1rem;
    color: var(--text-primary);
}

.news-full-body blockquote {
    border-left: 4px solid var(--accent-red);
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: var(--text-muted);
}

/* Image Fallback Styles */
.image-fallback {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .content-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .spotlight-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .news-container {
        padding: 2rem 1rem;
    }

    .section-title {
        font-size: 1.5rem;
    }

    .title-accent {
        height: 24px;
    }

    .article-title {
        font-size: 1.25rem;
    }

    .side-article-image {
        width: 100px;
        height: 75px;
    }

    .spotlight-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .side-article-title {
        font-size: 0.875rem;
    }

    .news-modal {
        padding: 1rem;
    }

    .news-modal-header {
        padding: 1rem 1.5rem 0;
    }

    .news-modal-body {
        padding: 0 1.5rem 1.5rem;
    }

    .news-full-title {
        font-size: 1.5rem;
    }

    .news-full-image {
        height: 250px;
    }
}

@media (max-width: 480px) {
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .article-content {
        padding: 1.25rem;
    }

    .side-article {
        flex-direction: column;
    }

    .side-article-image {
        width: 100%;
        height: 180px;
    }

    .news-full-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data berita lengkap
    const newsData = {
        1: {
            title: "Vape Zombie, Rokok Elektrik yang Diduga Mengandung Narkoba Berasal dari Malaysia",
            image: "https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80",
            time: "9 menit lalu",
            category: "Kriminal",
            content: `
                <p>Direktorat Tindak Pidana Narkoba Bareskrim Polri berhasil menggagalkan penyelundupan 84 cairan vape yang diduga mengandung zat etomidate atau dikenal sebagai Vape Zombie dari Malaysia.</p>
                
                <p>Kasus ini terungkap setelah polisi melakukan pengembangan dari penangkapan sebelumnya terkait peredaran vape ilegal. Dari hasil pemeriksaan, diketahui bahwa cairan vape tersebut mengandung zat etomidate yang merupakan obat bius yang digunakan dalam prosedur medis.</p>
                
                <h3>Modus Operandi Penyebaran</h3>
                <p>Pelaku menggunakan modus penyelundupan melalui jalur laut dari Malaysia ke Indonesia. Vape zombie ini dikemas menyerupai produk vape biasa sehingga sulit dideteksi.</p>
                
                <blockquote>
                    "Kami telah mengamankan 84 botol cairan vape yang diduga mengandung etomidate. Zat ini berbahaya karena dapat menyebabkan efek halusinasi dan ketergantungan," ujar Kabareskrim.
                </blockquote>
                
                <p>Polisi kini masih melakukan penyelidikan lebih lanjut untuk mengungkap jaringan di balik peredaran vape zombie ini. Masyarakat diimbau untuk waspada terhadap produk vape yang tidak jelas asal-usulnya.</p>
            `
        },
        2: {
            title: "Penjual Tahu Goreng di China Viral karena Dagang Pakai Cosplay Kaisar Kuno",
            image: "https://images.unsplash.com/photo-1565689223820-b9fd35fa4f8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
            time: "15 menit lalu",
            category: "Hiburan",
            content: `
                <p>Seorang penjual tahu goreng di China menjadi viral di media sosial karena konsep unik yang ditawarkannya. Ia berjualan dengan mengenakan kostum kaisar dari dinasti kuno, lengkap dengan mahkota dan jubah kuning.</p>
                
                <p>Penjual yang bernama Zhang Wei ini mengaku terinspirasi dari drama sejarah yang sering ditontonnya. Ia memutuskan untuk mencoba konsep ini untuk menarik perhatian pelanggan.</p>
                
                <h3>Respons Positif Masyarakat</h3>
                <p>Konsep unik ini ternyata disambut positif oleh masyarakat setempat. Banyak warga yang sengaja datang ke warungnya hanya untuk melihat penampilannya yang unik.</p>
                
                <p>"Awalnya hanya iseng, tapi ternyata banyak yang suka. Sekarang omzet saya meningkat drastis," ujar Zhang dengan riang.</p>
                
                <p>Video-video Zhang sedang berjualan telah dibagikan ribuan kali di platform media sosial seperti Douyin (TikTok China). Banyak netizen yang memuji kreativitasnya dalam berbisnis.</p>
            `
        },
        3: {
            title: "12 Rekomendasi Tempat Makan Enak Dekat Bandara YIA, Kuliner Lezat di Sekitar Bandara",
            image: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
            time: "24 menit lalu",
            category: "Kuliner",
            content: `
                <p>Bandara Internasional Yogyakarta (YIA) tidak hanya menjadi gerbang transportasi, tetapi juga dikelilingi oleh berbagai tempat makan yang menarik. Berikut 12 rekomendasi tempat makan enak di sekitar Bandara YIA:</p>
                
                <h3>1. Warung Makan Bu Jum</h3>
                <p>Terletak hanya 5 menit dari bandara, warung ini menyajikan masakan Jawa autentik dengan harga terjangkau. Cobalah gudegnya yang legendaris.</p>
                
                <h3>2. Resto 86</h3>
                <p>Menawarkan berbagai hidangan seafood segar dengan pengolahan modern. Tempatnya nyaman dan cocok untuk keluarga.</p>
                
                <h3>3. Kedai Kopi Tuku</h3>
                <p>Untuk para pencinta kopi, kedai ini menyajikan berbagai varian kopi lokal dengan racikan yang pas.</p>
                
                <p>Dan masih banyak lagi tempat makan menarik lainnya yang bisa Anda jelajahi saat menunggu penerbangan atau setelah tiba di Yogyakarta.</p>
            `
        },
        4: {
            title: "Prediksi Italia vs Israel: Kemenangan Adalah Satu-satunya Pilihan",
            image: "https://images.unsplash.com/photo-1579952363873-27d3b8efd5e6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80",
            time: "24 menit lalu",
            category: "Olahraga",
            content: `
                <p>Timnas Italia akan menghadapi Israel dalam laga kualifikasi Piala Eropa yang digelar malam ini. Bagi Squadra Azzurra, kemenangan adalah satu-satunya pilihan untuk menjaga peluang lolos ke putaran final.</p>
                
                <p>Italia saat ini berada di posisi kedua grup dengan koleksi 10 poin dari 5 pertandingan, tertinggal 3 poin dari Inggris yang memimpin klasemen. Kekalahan dari Inggris pada pertandingan terakhir membuat pelatih Roberto Mancini harus memikirkan strategi baru.</p>
                
                <h3>Kondisi Pemain</h3>
                <p>Italia akan tampil tanpa beberapa pemain kunci karena cedera. Namun, kehadiran striker muda Giacomo Raspadori diharapkan dapat memberikan solusi di lini serang.</p>
                
                <p>Di sisi lain, Israel yang berada di peringkat ketiga grup juga membutuhkan kemenangan untuk mempertahankan peluang lolos. Mereka akan bermain dengan motivasi tinggi meski sebagai tim tamu.</p>
                
                <blockquote>
                    "Kami sadar ini pertandingan penting. Pemain memahami betul bahwa tidak ada hasil selain kemenangan yang bisa diterima," ujar Mancini dalam konferensi pers.
                </blockquote>
            `
        },
        5: {
            title: "Cedera Lutut Gleison Bremer Jadi Masalah Baru untuk Juventus",
            image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1190&q=80",
            time: "26 menit lalu",
            category: "Olahraga",
            content: `
                <p>Juventus mendapat kabar buruk menjelang laga penting melawan AC Milan. Bek andalan mereka, Gleison Bremer, dilaporkan mengalami cedera lutut selama sesi latihan.</p>
                
                <p>Pemain asal Brasil ini harus ditarik dari sesi latihan setelah merasakan nyeri pada lutut kanannya. Tim medis Juventus langsung melakukan pemeriksaan dan hasil awal menunjukkan adanya masalah pada ligamen.</p>
                
                <h3>Dampak bagi Juventus</h3>
                <p>Kehilangan Bremer merupakan pukulan berat bagi Juventus. Sejauh ini, Bremer telah menjadi pilar penting di lini pertahanan Bianconeri dengan penampilan yang konsisten.</p>
                
                <p>Pelatih Massimiliano Allegri kini harus memikirkan opsi pengganti untuk posisi Bremer. Federico Gatti dan Daniele Rugani adalah kandidat utama yang akan mengisi posisi bek tengah.</p>
                
                <p>"Kami berharap cedera Bremer tidak terlalu serius. Dia adalah pemain penting bagi tim," ujar Allegri singkat.</p>
            `
        },
        6: {
            title: "Kebutuhan Pendanaan Obamacare Picu Shutdown Pemerintahan AS",
            image: "https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
            time: "29 menit lalu",
            category: "Bisnis",
            content: `
                <p>Kongres AS kembali menghadapi kebuntuan terkait pendanaan program Affordable Care Act (Obamacare) yang berpotensi memicu shutdown pemerintah.</p>
                
                <p>Partai Republik dan Demokrat masih berselisih mengenai besaran anggaran yang akan dialokasikan untuk program kesehatan tersebut. Perdebatan ini telah berlangsung selama berminggu-minggu tanpa titik terang.</p>
                
                <h3>Dampak Shutdown</h3>
                <p>Jika shutdown terjadi, diperkirakan sekitar 800.000 pegawai pemerintah federal akan dirumahkan sementara. Layanan publik tertentu juga akan terpengaruh.</p>
                
                <p>Presiden Joe Biden telah memperingatkan konsekuensi serius dari shutdown terhadap perekonomian AS. Ia mendesak kedua partai untuk segera mencapai kesepakatan.</p>
                
                <blockquote>
                    "Shutdown pemerintah akan merugikan semua pihak. Kita perlu mengutamakan kepentingan rakyat Amerika," tegas Biden.
                </blockquote>
                
                <p>Pasar keglobal mulai menunjukkan kekhawatiran dengan meningkatnya volatilitas di pasar saham AS menyusul ketidakpastian ini.</p>
            `
        },
        7: {
            title: "Jeff Bezos Ungkap Rahasia Sebelum Mulai Bangun Blue Origin",
            image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80",
            time: "44 menit lalu",
            category: "Bisnis",
            content: `
                <p>Pendiri Amazon, Jeff Bezos, baru-baru ini membagikan kisah inspiratif tentang momen yang mendorongnya untuk mendirikan perusahaan antariksa Blue Origin.</p>
                
                <p>Dalam sebuah wawancara eksklusif, Bezos mengungkapkan bahwa ide mendirikan Blue Origin muncul ketika ia masih kecil. Ketertarikannya pada eksplorasi ruang angkasa telah dimulai sejak usia dini.</p>
                
                <h3>Momen Penentu</h3>
                <p>Bezos menceritakan bagaimana kunjungannya ke museum antariksa pada usia 5 tahun menjadi momen penentu. Ia terpesona dengan kemungkinan menjelajahi alam semesta.</p>
                
                <p>"Saya masih ingat dengan jelas melihat model roket dan berpikir, suatu hari nanti saya ingin terlibat dalam perjalanan ini," kenang Bezos.</p>
                
                <p>Meski telah sukses dengan Amazon, Bezos mengaku bahwa passion terbesarnya tetap pada eksplorasi ruang angkasa. Blue Origin adalah realisasi dari mimpi masa kecilnya.</p>
                
                <p>Perusahaan yang didirikan pada tahun 2000 ini telah mencapai berbagai pencapaian signifikan, termasuk penerbangan suborbital berawak pertama pada tahun 2021.</p>
            `
        },
        8: {
            title: "IBL 2026 Siap Bergulir: Format Kandang-Tandang akan Diterapkan",
            image: "https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80",
            time: "44 menit lalu",
            category: "Olahraga",
            content: `
                <p>Indonesian Basketball League (IBL) musim 2026 akan kembali menerapkan format kandang-tandang setelah sempat menggunakan sistem bubble akibat pandemi.</p>
                
                <p>Pengelola IBL mengumumkan bahwa musim depan akan menampilkan format lengkap dengan pertandingan yang digelar di berbagai kota di Indonesia. Keputusan ini disambut positif oleh para klub dan fans basket tanah air.</p>
                
                <h3>Perubahan Format</h3>
                <p>Musim 2026 IBL akan diikuti oleh 16 tim yang terbagi dalam dua grup. Setiap tim akan bermain 30 pertandingan reguler sebelum memasuki babak play-off.</p>
                
                <p>"Kami sangat antusias dengan kembalinya format kandang-tandang. Ini akan menghidupkan kembali atmosfer basket di berbagai daerah," ujar Direktur Utama IBL.</p>
                
                <p>Beberapa venue baru juga akan digunakan untuk menampung antusiasme penggemar yang diperkirakan akan meningkat dengan kembalinya format ini.</p>
                
                <p>Para pemain juga menyambut baik keputusan ini. Mereka mengaku rindu dengan atmosfer pertandingan yang sesungguhnya di depan pendukung sendiri.</p>
            `
        }
    };

    // Elemen modal
    const modal = document.getElementById('newsModal');
    const closeModal = document.getElementById('closeModal');
    const newsContent = document.getElementById('newsContent');

    // Fungsi untuk membuka modal dengan konten berita
    function openNewsModal(newsId) {
        const news = newsData[newsId];
        if (news) {
            newsContent.innerHTML = `
                <div class="news-full-content">
                    <img src="${news.image}" alt="${news.title}" class="news-full-image" onerror="this.src='https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80'">
                    <div class="news-full-meta">
                        <span class="news-full-time">${news.time}</span>
                        <span class="news-full-category">${news.category}</span>
                    </div>
                    <h1 class="news-full-title">${news.title}</h1>
                    <div class="news-full-body">
                        ${news.content}
                    </div>
                </div>
            `;
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    }

    // Fungsi untuk menutup modal
    function closeNewsModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Menambahkan event listener untuk semua artikel berita
    document.querySelectorAll('.featured-article, .side-article, .spotlight-card').forEach(article => {
        article.addEventListener('click', function() {
            const newsId = this.getAttribute('data-news-id');
            openNewsModal(newsId);
        });
    });

    // Event listener untuk tombol close modal
    closeModal.addEventListener('click', closeNewsModal);

    // Menutup modal ketika klik di luar konten modal
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeNewsModal();
        }
    });

    // Menutup modal dengan tombol ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeNewsModal();
        }
    });

    // Fungsi untuk menangani error gambar
    function handleImageError(img) {
        img.src = 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80';
        img.alt = 'Gambar tidak tersedia';
    }

    // Menambahkan event listener untuk semua gambar
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('error', function() {
            handleImageError(this);
        });
    });
});
</script>
@endsection