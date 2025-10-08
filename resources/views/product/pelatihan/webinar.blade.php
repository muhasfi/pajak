@extends('layouts.master')

@section('title', 'Catalog WEBINAR')

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
    <!-- Course Card 1 - Premium -->
    <div class="course-card premium" data-category="premium">
        <div class="course-image">
           <img src="{{ asset('assets/customer/images/seminar1.jpg') }}" alt="Strategi Perencanaan Pajak" />
            <div class="course-badge badge-seminar">WEBINAR</div>
            <div class="status-badge status-hot">HOT</div>
        </div>
        <div class="course-content">
            <h3 class="course-title">Strategi Perencanaan Pajak 2025 untuk Perusahaan</h3>
            
            <div class="mentor-info">
                <img src="{{ asset('assets/customer/images/mentor1.jpeg') }}"  alt="Mentor" class="mentor-avatar">
                <div class="mentor-details">
                    <span class="mentor-name">Dr. Sari Wijayanti, M.Ak</span>
                    <span class="mentor-role">Tax Planning Expert</span>
                </div>
            </div>
            
            <div class="course-meta">
                <div class="price">Rp. 1.250.000</div>
            </div>
            
            <div class="course-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-calendar"></i>
                </button>
                <button class="btn btn-premium">Daftar</button>
            </div>
        </div>
    </div>
    
    <!-- Course Card 2 - Gratis -->
    <div class="course-card gratis" data-category="gratis">
        <div class="course-image">
            <img src="{{ asset('assets/customer/images/seminar2.jpg') }}"alt="PPN Seminar" />
            <div class="course-badge badge-webinar">WEBINAR</div>
            <div class="status-badge status-new">BARU</div>
        </div>
        <div class="course-content">
            <h3 class="course-title">Update Regulasi PPN 2025 & Implementasinya</h3>
            
            <div class="mentor-info">
                <img src="{{ asset('assets/customer/images/mentor2.jpeg') }}"  alt="Mentor" class="mentor-avatar">
                <div class="mentor-details">
                    <span class="mentor-name">Ahmad Rizki, S.E., M.Si</span>
                    <span class="mentor-role">Senior Tax Consultant</span>
                </div>
            </div>
            
            <div class="course-meta">
                <div class="price free">GRATIS</div>
            </div>
            
            <div class="course-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-calendar"></i>
                </button>
                <button class="btn btn-free">Daftar</button>
            </div>
        </div>
    </div>
    
    <!-- Course Card 3 - Premium -->
    <div class="course-card premium" data-category="premium">
        <div class="course-image">
            <img src="{{ asset('assets/customer/images/seminar3.jpg') }}" alt="Internal Audit Seminar" />
            <div class="course-badge badge-workshop">WEBINAR</div>
            <div class="status-badge status-popular">POPULER</div>
        </div>
        <div class="course-content">
            <h3 class="course-title">Workshop Internal Audit Excellence 2025</h3>
            
            <div class="mentor-info">
                <img src="{{ asset('assets/customer/images/mentor3.jpeg') }}" alt="Mentor" class="mentor-avatar">
                <div class="mentor-details">
                    <span class="mentor-name">Prof. Indra Bastian, M.B.A</span>
                    <span class="mentor-role">Audit Specialist</span>
                </div>
            </div>
            
            <div class="course-meta">
                <div class="price">Rp. 2.750.000</div>
            </div>
            
            <div class="course-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-calendar"></i>
                </button>
                <button class="btn btn-premium">Daftar</button>
            </div>
        </div>
    </div>

    <div class="course-card premium" data-category="premium">
        <div class="course-image">
            <img src="{{ asset('assets/customer/images/seminar3.jpg') }}" alt="Internal Audit Seminar" />
            <div class="course-badge badge-workshop">WEBINAR</div>
            <div class="status-badge status-popular">POPULER</div>
        </div>
        <div class="course-content">
            <h3 class="course-title">Workshop Internal Audit Excellence 2025</h3>
            
            <div class="mentor-info">
                <img src="{{ asset('assets/customer/images/mentor3.jpeg') }}" alt="Mentor" class="mentor-avatar">
                <div class="mentor-details">
                    <span class="mentor-name">Prof. Indra Bastian, M.B.A</span>
                    <span class="mentor-role">Audit Specialist</span>
                </div>
            </div>
            
            <div class="course-meta">
                <div class="price">Rp. 2.750.000</div>
            </div>
            
            <div class="course-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-calendar"></i>
                </button>
                <button class="btn btn-premium">Daftar</button>
            </div>
        </div>
    </div>
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
<script>
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
