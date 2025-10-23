@extends('layouts.master')

@section('title', 'Kelas Bimbel A - Paham Pajak')

@section('style')
<style>
  /* Reset & base */
  * {
    box-sizing: border-box;
  }
  
  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8fafc;
    color: #1e293b;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    line-height: 1.6;
  }

  .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem 1rem 4rem;
  }

  /* Hero Section */
  .hero {
    background: #1e40af;
    color: #fff;
    padding: 4rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
    margin-bottom: 3rem;
    position: relative;
    overflow: hidden;
  }

  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: -50%;
    width: 200%;
    height: 100%;
    background: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%);
    animation: shimmer 3s infinite;
  }

  @keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
  }

  .hero-content {
    position: relative;
    z-index: 2;
  }

  .hero h1 {
    font-weight: 800;
    font-size: clamp(2.5rem, 5vw, 4rem);
    margin-bottom: 1rem;
    line-height: 1.1;
    color: white;
  }

  .hero p {
    font-size: 1.25rem;
    font-weight: 400;
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto 2rem;
    color: white;
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #3b82f6;
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  /* Main Content Layout */
  .main-content {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 2rem;
  }

  /* Video Section */
  .video-section {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    border: 1px solid #e2e8f0;
  }

  .video-header {
    margin-bottom: 2rem;
  }

  .video-header h2 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.5rem;
  }

  .video-header p {
    color: #64748b;
    font-size: 1rem;
  }

  .video-wrapper {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
    border: 1px solid #e2e8f0;
  }

  .video-wrapper iframe,
  .video-wrapper video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 12px;
    border: none;
  }

  .video-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
  }

  .btn {
    background: #1e40af;
    color: #fff;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    user-select: none;
  }

  .btn:hover {
    background: #1d4ed8;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(30, 64, 175, 0.4);
  }

  .btn-secondary {
    background: #f8fafc;
    color: #475569;
    border: 1px solid #cbd5e1;
  }

  .btn-secondary:hover {
    background: #f1f5f9;
    color: #334155;
  }

  .btn svg {
    width: 18px;
    height: 18px;
    fill: currentColor;
  }

  /* Video Description */
  .video-description {
    background: #f8fafc;
    border-radius: 8px;
    padding: 1.5rem;
    border-left: 4px solid #1e40af;
  }

  .video-description h3 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.75rem;
  }

  .video-description p {
    color: #64748b;
    font-size: 0.95rem;
    margin-bottom: 1rem;
  }

  .video-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.875rem;
    color: #64748b;
  }

  .video-meta span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
  }

  /* Sidebar */
  .sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  /* Video Playlist */
  .playlist {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    border: 1px solid #e2e8f0;
  }

  .playlist h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .playlist-search {
    position: relative;
    margin-bottom: 1rem;
  }

  .playlist-search input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.875rem;
    background: #f8fafc;
  }

  .playlist-search input:focus {
    outline: none;
    border-color: #3b82f6;
    background: #ffffff;
  }

  .playlist-search svg {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    color: #64748b;
  }

  .video-list {
    max-height: 400px;
    overflow-y: auto;
  }

  .video-item {
    display: flex;
    gap: 0.75rem;
    padding: 0.75rem;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    border: 1px solid transparent;
  }

  .video-item:hover {
    background: #f1f5f9;
  }

  .video-item.active {
    background: #dbeafe;
    border-color: #3b82f6;
  }

  .video-thumbnail {
    width: 80px;
    height: 45px;
    background: #e2e8f0;
    border-radius: 4px;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
  }

  .video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .video-thumbnail::after {
    content: '▶';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #ffffff;
    font-size: 12px;
  }

  .video-info h4 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.25rem;
    line-height: 1.3;
  }

  .video-info p {
    font-size: 0.75rem;
    color: #64748b;
    margin-bottom: 0.25rem;
  }

  .video-duration {
    font-size: 0.75rem;
    color: #64748b;
    background: #f1f5f9;
    padding: 0.125rem 0.375rem;
    border-radius: 4px;
    display: inline-block;
  }

  /* Progress Tracker */
  .progress-tracker {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    border: 1px solid #e2e8f0;
  }

  .progress-tracker h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .progress-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.5rem;
  }

  .stat-item {
    text-align: center;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
  }

  .stat-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: #1e40af;
  }

  .stat-label {
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 500;
    margin-top: 0.25rem;
  }

  .progress-bar {
    background: #e2e8f0;
    height: 8px;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 0.5rem;
  }

  .progress-fill {
    background: #1e40af;
    height: 100%;
    width: 65%;
    border-radius: 4px;
    transition: width 0.3s ease;
  }

  .progress-text {
    font-size: 0.875rem;
    color: #64748b;
    text-align: center;
  }

  /* Notes Section */
  .notes-section {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    border: 1px solid #e2e8f0;
  }

  .notes-section h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .note-input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.875rem;
    resize: vertical;
    min-height: 80px;
    margin-bottom: 0.75rem;
  }

  .note-input:focus {
    outline: none;
    border-color: #3b82f6;
  }

  .note-actions {
    display: flex;
    gap: 0.5rem;
  }

  .btn-small {
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
  }

  /* Responsive Design */
  @media (max-width: 1024px) {
    .main-content {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    
    .sidebar {
      grid-row: 1;
    }
  }

  @media (max-width: 768px) {
    .container {
      padding: 1rem 1rem 3rem;
    }

    .hero {
      padding: 3rem 1.5rem;
      margin-bottom: 2rem;
    }

    .video-section, .playlist, .progress-tracker, .notes-section {
      padding: 1.5rem 1rem;
    }

    .video-actions {
      flex-direction: column;
    }

    .btn {
      width: 100%;
      justify-content: center;
    }

    .progress-stats {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 480px) {
    .hero {
      padding: 2rem 1rem;
    }

    .main-content {
      gap: 1rem;
    }
  }

  /* Custom Scrollbar */
  .video-list::-webkit-scrollbar {
    width: 4px;
  }

  .video-list::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 2px;
  }

  .video-list::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 2px;
  }

  .video-list::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
  }
</style>
@endsection

@section('content')
<div class="container">
  <section class="hero" aria-label="Hero Section Kelas Bimbel Online">
    <div class="hero-content">
      <h1>Kelas Bimbel Online Paham Pajak</h1>
      <p>Kuasai konsep perpajakan dengan mudah melalui pembelajaran interaktif, video berkualitas HD, dan materi lengkap yang dapat diakses kapan saja.</p>
    </div>
  </section>

  <div class="main-content">
    <!-- Video Player Section -->
    <main class="video-section">
      <div class="video-header">
        <h2>Video Pembelajaran</h2>
        <p>Penjelasan lengkap tentang konsep dasar perpajakan Indonesia</p>
      </div>

      <div class="video-wrapper">
        <iframe 
          id="main-video"
          src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
          title="Penjelasan Video Materi Pajak" 
          frameborder="0" 
          allowfullscreen 
          loading="lazy"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        ></iframe>
      </div>

      <div class="video-actions">
        <button class="btn" onclick="togglePlayPause()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M8 5v14l11-7z"/>
          </svg>
          Play/Pause
        </button>
        <a href="/materi/pengertian-pajak.pdf" class="btn" download>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M5 20h14v-2H5v2zm7-18L5.33 9h3.67v6h4V9h3.67L12 2z"/>
          </svg>
          Download Materi
        </a>
        <a href="/materi/pengertian-pajak.pdf" target="_blank" rel="noopener" class="btn btn-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
          </svg>
          Buka Materi
        </a>
      </div>

      <div class="video-description">
        <h3>Pengenalan Dasar Perpajakan Indonesia</h3>
        <p>Dalam video ini, kita akan mempelajari konsep dasar perpajakan di Indonesia, termasuk jenis-jenis pajak, fungsi pajak dalam perekonomian, dan kewajiban wajib pajak. Video ini cocok untuk pemula yang ingin memahami sistem perpajakan Indonesia.</p>
        <div class="video-meta">
          <span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            Duration: 25 menit
          </span>
          <span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
              <path d="M16 4l-4 4-4-4v12l4-4 4 4V4z"/>
            </svg>
            Level: Pemula
          </span>
          <span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
            4.8/5 (124 rating)
          </span>
        </div>
      </div>
    </main>

    <!-- Sidebar -->
    <aside class="sidebar">
      <!-- Video Playlist -->
      <section class="playlist">
        <h3>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z"/>
          </svg>
          Daftar Video (12)
        </h3>
        
        <div class="playlist-search">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
          </svg>
          <input type="text" placeholder="Cari video..." oninput="filterVideos(this.value)">
        </div>

        <div class="video-list">
          <div class="video-item active" onclick="changeVideo('dQw4w9WgXcQ', this)">
            <div class="video-thumbnail">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Thumbnail">
            </div>
            <div class="video-info">
              <h4>1. Pengenalan Dasar Perpajakan</h4>
              <p>Konsep dasar dan definisi pajak</p>
              <span class="video-duration">25:30</span>
            </div>
          </div>

          <div class="video-item" onclick="changeVideo('dQw4w9WgXcQ', this)">
            <div class="video-thumbnail">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Thumbnail">
            </div>
            <div class="video-info">
              <h4>2. Jenis-jenis Pajak di Indonesia</h4>
              <p>PPh, PPN, dan pajak daerah</p>
              <span class="video-duration">32:15</span>
            </div>
          </div>

          <div class="video-item" onclick="changeVideo('dQw4w9WgXcQ', this)">
            <div class="video-thumbnail">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Thumbnail">
            </div>
            <div class="video-info">
              <h4>3. Perhitungan PPh Pasal 21</h4>
              <p>Cara menghitung pajak penghasilan</p>
              <span class="video-duration">28:45</span>
            </div>
          </div>

          <div class="video-item" onclick="changeVideo('dQw4w9WgXcQ', this)">
            <div class="video-thumbnail">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Thumbnail">
            </div>
            <div class="video-info">
              <h4>4. PPN dan Mekanisme Kreditnya</h4>
              <p>Pemahaman PPN masukan dan keluaran</p>
              <span class="video-duration">35:20</span>
            </div>
          </div>

          <div class="video-item" onclick="changeVideo('dQw4w9WgXcQ', this)">
            <div class="video-thumbnail">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Thumbnail">
            </div>
            <div class="video-info">
              <h4>5. Pelaporan SPT Tahunan</h4>
              <p>Cara mengisi dan melaporkan SPT</p>
              <span class="video-duration">42:10</span>
            </div>
          </div>

          <div class="video-item" onclick="changeVideo('dQw4w9WgXcQ', this)">
            <div class="video-thumbnail">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Thumbnail">
            </div>
            <div class="video-info">
              <h4>6. Sanksi dan Denda Pajak</h4>
              <p>Konsekuensi keterlambatan pembayaran</p>
              <span class="video-duration">22:30</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Progress Tracker -->
      <section class="progress-tracker">
        <h3>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
          </svg>
          Progress Belajar
        </h3>
        
        <div class="progress-stats">
          <div class="stat-item">
            <div class="stat-number">8</div>
            <div class="stat-label">Video Selesai</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">4</div>
            <div class="stat-label">Video Tersisa</div>
          </div>
        </div>

        <div class="progress-bar">
          <div class="progress-fill"></div>
        </div>
        <p class="progress-text">65% Complete</p>
      </section>

      <!-- Notes Section -->
      <section class="notes-section">
        <h3>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
          </svg>
          Catatan Saya
        </h3>
        
        <textarea class="note-input" placeholder="Tulis catatan untuk video ini..."></textarea>
        
        <div class="note-actions">
          <button class="btn btn-small" onclick="saveNote()">Simpan</button>
          <button class="btn btn-secondary btn-small" onclick="clearNote()">Clear</button>
        </div>
      </section>
    </aside>
  </div>
</div>

<script>
function changeVideo(videoId, element) {
  // Update iframe src
  document.getElementById('main-video').src = `https://www.youtube.com/embed/${videoId}`;
  
  // Update active state
  document.querySelectorAll('.video-item').forEach(item => item.classList.remove('active'));
  element.classList.add('active');
  
  // Update video description (you can customize this based on video data)
  updateVideoDescription(element);
}

function updateVideoDescription(element) {
  const title = element.querySelector('h4').textContent;
  const description = element.querySelector('p').textContent;
  
  document.querySelector('.video-description h3').textContent = title;
  document.querySelector('.video-description p').textContent = `Dalam video ini, kita akan mempelajari ${description.toLowerCase()} secara mendalam dengan contoh praktis dan studi kasus.`;
}

function filterVideos(searchTerm) {
  const videos = document.querySelectorAll('.video-item');
  searchTerm = searchTerm.toLowerCase();
  
  videos.forEach(video => {
    const title = video.querySelector('h4').textContent.toLowerCase();
    const description = video.querySelector('p').textContent.toLowerCase();
    
    if (title.includes(searchTerm) || description.includes(searchTerm)) {
      video.style.display = 'flex';
    } else {
      video.style.display = 'none';
    }
  });
}

function saveNote() {
  const noteText = document.querySelector('.note-input').value;
  if (noteText.trim()) {
    localStorage.setItem('current-video-note', noteText);
    alert('Catatan berhasil disimpan!');
  }
}

function clearNote() {
  document.querySelector('.note-input').value = '';
}

function togglePlayPause() {
  // This would require YouTube API integration for full functionality
  alert('Fitur ini memerlukan integrasi YouTube API untuk kontrol penuh');
}

// Load saved note when page loads
window.addEventListener('load', function() {
  const savedNote = localStorage.getItem('current-video-note');
  if (savedNote) {
    document.querySelector('.note-input').value = savedNote;
  }
});
</script>
@endsection