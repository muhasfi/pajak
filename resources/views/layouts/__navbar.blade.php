<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Navbar Modern</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <span>Paham Pajak</span>
            </a>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="/" class="nav-link active">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#produk" class="nav-link">
                        <i class="fas fa-box"></i> Produk <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <a href="{{ route('book') }}" class="dropdown-item">
                            <i class="fas fa-book"></i> Buku
                        </a>
                        <a href="{{ route('artikel.index') }}" class="dropdown-item">
                            <i class="fas fa-newspaper"></i> Artikel
                        </a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('bimbel.index') }}" class="nav-link">
                        <i class="fas fa-graduation-cap"></i> Kelas <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <a href="{{ route('bimbel.a') }}" class="dropdown-item">
                            <i class="fas fa-users"></i> Bimbel A
                        </a>
                        <a href="{{ route('bimbel.b') }}" class="dropdown-item">
                            <i class="fas fa-user-graduate"></i> Bimbel B
                        </a>
                        <a href="{{ route('bimbel.a') }}" class="dropdown-item">
                            <i class="fas fa-clipboard-list"></i> Ujian Tryout
                        </a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('pelatihan') }}" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i> Pelatihan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown">
                        <a href="#seminar" class="dropdown-item">
                            <i class="fas fa-microphone"></i> Seminar/Webinar
                        </a>
                        <a href="#workshop" class="dropdown-item">
                            <i class="fas fa-tools"></i> Workshop
                        </a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="/kontak" class="nav-link">
                        <i class="fas fa-envelope"></i> Kontak
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/login" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            </ul>

            <div class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navMenu = document.querySelector('.nav-menu');

        if (mobileMenuBtn && navMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                mobileMenuBtn.classList.toggle('active');
                
                // Close all dropdowns when menu is toggled
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });
        }

        // Mobile dropdown toggle
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.querySelector('.fa-chevron-down')) {
                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 1024) {
                        e.preventDefault();
                        const dropdown = link.nextElementSibling;
                        
                        // Close other dropdowns
                        document.querySelectorAll('.dropdown').forEach(d => {
                            if (d !== dropdown) {
                                d.classList.remove('active');
                            }
                        });
                        
                        if (dropdown) {
                            dropdown.classList.toggle('active');
                        }
                    }
                });
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav-item') && window.innerWidth <= 1024) {
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
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

        // Highlight active menu item on scroll
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (pageYOffset >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>