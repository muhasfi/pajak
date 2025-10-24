@extends('layouts.master')

@section('title', 'Kelas Bimbel A - Paham Pajak')

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