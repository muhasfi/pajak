<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="#" class="navbar-brand"><h1 class="text-primary display-6">Penjualan</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/book" class="nav-item nav-link">Home</a>
                    <a href="/book" class="nav-item nav-link active">Menu</a>
                    <a href="#" class="nav-item nav-link">Kontak</a>
                </div>
            </li>
            
            <li class="nav-item">
                <a href="#kelas" class="nav-link">
                    <i class="fas fa-graduation-cap"></i> Kelas <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown">
                    <a href="{{ route('bimbel.index') }}">
                        <i class="fas fa-users"></i> Bimble A
                    </a>
                    <a href="{{ route('bimbel.courses.index') }}">
                        <i class="fas fa-user-graduate"></i> Bimble B
                    </a>
                </div>
            </li>
            
            <li class="nav-item">
                <a href="#pelatihan" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i> Pelatihan <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown">
                    <a href="#seminar"><i class="fas fa-microphone"></i> Seminar/Webinar</a>
                    <a href="#workshop"><i class="fas fa-tools"></i> Workshop</a>
                </div>
            </li>
            
            <li class="nav-item">
                <a href="#kontak" class="nav-link">
                    <i class="fas fa-envelope"></i> Kontak
                </a>
            </li>
            
            <li class="nav-item">
                <a href="/login" class="nav-link login-btn">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </li>
        </ul>

        <div class="mobile-menu-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>

{{-- Navigation JavaScript --}}
<script>
    // Mobile menu functionality
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('.nav-menu');

    if (mobileMenuBtn && navMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            mobileMenuBtn.classList.toggle('active');
        });
    }

    // Mobile dropdown toggle
    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.querySelector('.fa-chevron-down')) {
            link.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const dropdown = link.nextElementSibling;
                    if (dropdown) {
                        dropdown.classList.toggle('active');
                    }
                }
            });
        }
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href') !== '#login') {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    // Close mobile menu if open
                    if (navMenu && navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                        if (mobileMenuBtn) {
                            mobileMenuBtn.classList.remove('active');
                        }
                    }
                    
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

</script>
