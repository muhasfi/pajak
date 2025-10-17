@extends('layouts.master')

@section('title', 'Catalog Webinar')

<link rel="stylesheet" href="{{ asset('assets/customer/css/webinar.css') }}">

@section('content')
<!-- Header Section -->
<section class="catalog-header">
    <div class="container mt-5">
        <div class="header-content">
            <h1 class="main-title">Catalog Webinar</h1>
            <p class="subtitle">Tingkatkan keahlian Anda dalam bidang perpajakan dan akuntansi bersama para ahli</p>
            
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Cari seminar, workshop, atau webinar..." id="searchInput">
                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Filter Tabs -->
    <div class="filter-tabs">
        <button class="tab-btn active" data-filter="all">
            <i class="fas fa-rocket"></i>
            Semua
        </button>
        <button class="tab-btn" data-filter="premium">
            <i class="fas fa-gem"></i>
            Premium
        </button>
        <button class="tab-btn" data-filter="gratis">
            <i class="fas fa-gift"></i>
            Gratis
        </button>
    </div>

    <!-- Course Grid -->
    <div class="courses-grid">
        @foreach($webinars as $webinar)
            @php
                $isGratis = $webinar->harga == 0;
                $kategori = 'webinar';
                $detail = $webinar->details->first();
            @endphp

            <div class="course-card {{ $isGratis ? 'gratis' : 'premium' }}" data-category="{{ $isGratis ? 'gratis' : 'premium' }}">
                <div class="course-image">
                    <img src="{{ asset('storage/' . $webinar->gambar) }}" alt="{{ $webinar->judul }}" />
                    <div class="course-badge badge-{{ $kategori }}">{{ strtoupper($kategori) }}</div>
                    <div class="status-badge {{ $isGratis ? 'status-new' : 'status-hot' }}">
                        {{ $isGratis ? 'BARU' : 'HOT' }}
                    </div>
                </div>

                <div class="course-content">
                    <h3 class="course-title">{{ $webinar->judul }}</h3>
                    
                    @if($detail)
                        <div class="mentor-info">
                            <img src="{{ asset('assets/customer/images/mentor1.jpeg') }}" alt="Mentor" class="mentor-avatar">
                            <div class="mentor-details">
                                <span class="mentor-name">{{ $detail->pembicara }}</span>
                                <span class="mentor-role">{{ $detail->topik }}</span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="course-meta">
                        <div class="price {{ $isGratis ? 'free' : '' }}">
                            {{ $isGratis ? 'GRATIS' : 'Rp ' . number_format($webinar->harga, 0, ',', '.') }}
                        </div>
                    </div>
                    
                    <div class="course-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-calendar"></i>
                        </button>

                        <button 
                            type="button"
                            class="btn {{ $isGratis ? 'btn-free' : 'btn-premium' }}" 
                            onclick="addToCart({{ $webinar->id }}, 'ItemWebinar')">
                            Daftar
                        </button>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    
    <!-- Load More Button -->
    <div class="load-more-section">
        <button class="btn-load-more">
            <i class="fas fa-plus"></i>
            Load More Courses
        </button>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function addToCart(id, type) {
    fetch("{{ route('cart.add', [], false) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: id, type: type }),
    })
    .then(response => response.json())
            .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false
                });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message
                        });
                    }
                })
        .catch((error) => {
                console.error('Error:', error);
            });
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterTabs = document.querySelectorAll('.tab-btn');
        const courseCards = document.querySelectorAll('.course-card');
        
        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                filterTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                courseCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
        
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.querySelector('.search-button');
        
        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase();
            
            courseCards.forEach(card => {
                const title = card.querySelector('.course-title').textContent.toLowerCase();
                const mentor = card.querySelector('.mentor-name').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || mentor.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        searchButton.addEventListener('click', performSearch);
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        // Load more functionality
        const loadMoreBtn = document.querySelector('.btn-load-more');
        loadMoreBtn.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            this.disabled = true;
            
            setTimeout(() => {
                alert('More courses would be loaded here!');
                this.innerHTML = '<i class="fas fa-plus"></i> Load More Courses';
                this.disabled = false;
            }, 1500);
        });
    });
</script>
@endsection