{{-- Navigation Styles --}}
<style>
    :root {
        --primary-bg: rgba(30, 60, 114, 0.9); /* warna dasar biru transparan */
        --nav-blur: 12px;
        --text-color: #ffffff;
        --transition: all 0.3s ease;
    }

    /* Header & Navigation */
    header {
        background: var(--primary-bg);
        backdrop-filter: blur(var(--nav-blur));
        -webkit-backdrop-filter: blur(var(--nav-blur));
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: var(--transition);
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.8rem 5%;
        max-width: 1400px;
        margin: 0 auto;
    }

    .logo {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--text-color);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .logo i {
        color: #ff6b6b;
        font-size: 1.4rem;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        gap: 1rem;
        align-items: center;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        color: var(--text-color);
        text-decoration: none;
        padding: 0.6rem 1rem;
        border-radius: 8px;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .nav-link:hover {
        background: rgba(255,255,255,0.1);
    }

    /* Dropdown */
    .dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        min-width: 220px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border-radius: 10px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: var(--transition);
        overflow: hidden;
        z-index: 100;
    }

    .nav-item:hover .dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown a {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.8rem 1.2rem;
        color: #333;
        text-decoration: none;
        transition: var(--transition);
        border-bottom: 1px solid #eee;
        font-size: 0.9rem;
    }

    .dropdown a:hover {
        background: #f9f9f9;
        color: #1e3c72;
        padding-left: 1.5rem;
    }

    .dropdown a:last-child {
        border-bottom: none;
    }

    .login-btn {
        background: linear-gradient(135deg,#ff6b6b,#ff9276);
        padding: 0.5rem 1.2rem !important;
        border-radius: 25px;
        font-weight: 600;
        color: #fff !important;
        box-shadow: 0 4px 15px rgba(255,107,107,0.25);
        transition: var(--transition);
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255,107,107,0.35);
    }

    /* Mobile Menu */
    .mobile-menu-btn {
        display: none;
        flex-direction: column;
        cursor: pointer;
        gap: 5px;
        padding: 5px;
    }

    .mobile-menu-btn span {
        width: 25px;
        height: 3px;
        background: #fff;
        transition: 0.3s;
        border-radius: 3px;
    }

    .mobile-menu-btn.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .mobile-menu-btn.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-btn.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Mobile Navigation Responsive */
    @media (max-width: 768px) {
        .mobile-menu-btn {
            display: flex;
        }

        .nav-menu {
            position: fixed;
            top: 70px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 70px);
            background: var(--primary-bg);
            backdrop-filter: blur(var(--nav-blur));
            flex-direction: column;
            justify-content: flex-start;
            padding-top: 2rem;
            transition: 0.3s;
            gap: 0;
        }

        .nav-menu.active {
            left: 0;
        }

        .nav-item {
            width: 100%;
            text-align: center;
        }

        .nav-link {
            padding: 1rem;
            justify-content: center;
            font-size: 1rem;
        }

        .dropdown {
            position: static;
            width: 100%;
            opacity: 1;
            visibility: visible;
            transform: none;
            display: none;
            box-shadow: none;
            border-radius: 0;
            background: rgba(255,255,255,0.05);
        }

        .nav-item:hover .dropdown {
            display: none;
        }

        .dropdown.active {
            display: block;
        }
    }
</style>

{{-- Navigation HTML --}}
<header>
    <nav>
        <a href="#home" class="logo">
            <i class="fas fa-calculator"></i> Paham Pajak
        </a>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="/" class="nav-link">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#produk" class="nav-link">
                    <i class="fas fa-box"></i> Produk <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown">
                    <a href="{{ route('book') }}"><i class="fas fa-book"></i> Buku</a>
                    <a href="#artikel"><i class="fas fa-newspaper"></i> Artikel</a>
                </div>
            </li>
            
            <li class="nav-item">
                <a href="#kelas" class="nav-link">
                    <i class="fas fa-graduation-cap"></i> Kelas <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown">
                    <a href="#bimble-a"><i class="fas fa-users"></i> Bimble A</a>
                    <a href="#bimble-b"><i class="fas fa-user-graduate"></i> Bimble B</a>
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
