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
  <section class="hero">
    <div class="hero-content">
      <h1>{{ $bimbel->judul }}</h1>
      <p>{{ $bimbel->deskripsi }}</p>
    </div>
  </section>

  <div class="main-content">
    <!-- Video Player Section -->
    <main class="video-section">
      @php
        // ambil detail pertama untuk video default
        $firstDetail = $bimbel->details->first();
      @endphp

      <div class="video-header">
        <h2>{{ $firstDetail?->judul ?? 'Video Pembelajaran' }}</h2>
        <p>{{ $firstDetail?->deskripsi ?? 'Belum ada deskripsi' }}</p>
      </div>

      <div class="video-wrapper">
        @if($firstDetail)
          @if(Str::contains($firstDetail->video, 'youtu'))
            <iframe 
              id="main-video"
              src="{{ $firstDetail->video }}"
              title="{{ $firstDetail->judul }}"
              frameborder="0"
              allowfullscreen
              loading="lazy"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            ></iframe>
          @else
            <video id="main-video" controls width="100%">
              <source src="{{ asset('storage/'.$firstDetail->video) }}" type="video/mp4">
              Browser kamu tidak mendukung video HTML5.
            </video>
          @endif
        @else
          <p>Belum ada video tersedia.</p>
        @endif
      </div>

      @if($firstDetail && $firstDetail->materi_pdf)
      <div class="video-actions">
        <a href="{{ asset('storage/'.$firstDetail->materi_pdf) }}" class="btn" download>Download Materi</a>
        <a href="{{ asset('storage/'.$firstDetail->materi_pdf) }}" target="_blank" rel="noopener" class="btn btn-secondary">
          Buka Materi
        </a>
      </div>
      @endif

      <div class="video-description">
        <h3 id="video-title">{{ $firstDetail?->judul }}</h3>
        <p id="video-desc">{{ $firstDetail?->deskripsi }}</p>
      </div>
    </main>

    <!-- Sidebar -->
    <aside class="sidebar">
      <!-- Video Playlist -->
      <section class="playlist">
        <h3>Daftar Video ({{ $bimbel->details->count() }})</h3>

        <div class="video-list">
          @foreach($bimbel->details as $detail)
            <div class="video-item {{ $loop->first ? 'active' : '' }}" 
                 onclick="changeVideo('{{ $detail->id }}', '{{ Str::contains($detail->video,'youtu') ? $detail->video : asset('storage/'.$detail->video) }}', '{{ $detail->judul }}', '{{ $detail->deskripsi }}', this)">
              <div class="video-thumbnail">
                @if(Str::contains($detail->video, 'youtu'))
                  @php
                    // ambil id yt untuk thumbnail
                    preg_match('/(?:embed\/|v=)([a-zA-Z0-9_-]+)/', $detail->video, $matches);
                    $ytId = $matches[1] ?? null;
                  @endphp
                  @if($ytId)
                    <img src="https://img.youtube.com/vi/{{ $ytId }}/mqdefault.jpg" alt="Thumbnail">
                  @endif
                @else
                  <img src="{{ asset('images/video-thumbnail.png') }}" alt="Thumbnail">
                @endif
              </div>
              <div class="video-info">
                <h4>{{ $loop->iteration }}. {{ $detail->judul }}</h4>
                <p>{{ $detail->deskripsi }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    </aside>
  </div>
</div>

<script>
function changeVideo(id, url, title, desc, element) {
  let videoContainer = document.querySelector('.video-wrapper');
  
  if(url.includes('youtu')) {
    videoContainer.innerHTML = `
      <iframe id="main-video"
        src="${url}"
        title="${title}"
        frameborder="0"
        allowfullscreen
        loading="lazy"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>`;
  } else {
    videoContainer.innerHTML = `
      <video id="main-video" controls width="100%">
        <source src="${url}" type="video/mp4">
        Browser kamu tidak mendukung video HTML5.
      </video>`;
  }

  document.getElementById('video-title').textContent = title;
  document.getElementById('video-desc').textContent = desc;

  document.querySelectorAll('.video-item').forEach(item => item.classList.remove('active'));
  element.classList.add('active');
}
</script>
@endsection