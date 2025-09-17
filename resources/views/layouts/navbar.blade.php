<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Navbar Modern</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --purple: #8b5cf6;
            --pink: #ec4899;
            --background: rgba(255, 255, 255, 0.95);
            --text: #1e293b;
            --text-light: #64748b;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --transition: all 0.3s ease;
            --nav-height: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f8fafc;
            color: var(--text);
            padding-top: var(--nav-height);
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: var(--background);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: var(--shadow);
            border-bottom: 1px solid rgba(255, 255, 255, 0.9);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            height: var(--nav-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--text);
            text-decoration: none;
            padding: 0.8rem 1rem;
            border-radius: var(--radius);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .nav-link.active {
            color: var(--primary);
            background: rgba(37, 99, 235, 0.1);
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Ikon berwarna */
        .nav-link i.fa-home { color: var(--primary); }
        .nav-link i.fa-box { color: var(--accent); }
        .nav-link i.fa-graduation-cap { color: var(--purple); }
        .nav-link i.fa-chalkboard-teacher { color: var(--success); }
        .nav-link i.fa-envelope { color: var(--pink); }

        /* Dropdown Modern */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--background);
            min-width: 240px;
            box-shadow: var(--shadow-lg);
            border-radius: var(--radius);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            z-index: 100;
            padding: 0.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(5px);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1rem;
            color: var(--text);
            text-decoration: none;
            transition: var(--transition);
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: rgba(37, 99, 235, 0.08);
            color: var(--primary);
            transform: translateX(5px);
        }

        .dropdown-item i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        /* Ikon dropdown berwarna */
        .dropdown-item i.fa-book { color: var(--primary); }
        .dropdown-item i.fa-newspaper { color: var(--accent); }
        .dropdown-item i.fa-users { color: var(--purple); }
        .dropdown-item i.fa-user-graduate { color: var(--success); }
        .dropdown-item i.fa-microphone { color: var(--pink); }
        .dropdown-item i.fa-tools { color: var(--danger); }
        .dropdown-item i.fa-clipboard-list {color: var(--warning); }

        /* Login Button */
        .login-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 0.7rem 1.5rem;
            border-radius: var(--radius);
            font-weight: 600;
            color: white;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 6px;
            padding: 0.5rem;
            background: rgba(37, 99, 235, 0.1);
            border-radius: 8px;
        }

        .mobile-menu-btn span {
            width: 25px;
            height: 3px;
            background: var(--primary);
            transition: var(--transition);
            border-radius: 3px;
        }

        .mobile-menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* Mobile Navigation */
        @media (max-width: 1024px) {
            .nav-container {
                padding: 0 1.5rem;
            }
            
            .nav-menu {
                position: fixed;
                top: var(--nav-height);
                left: -100%;
                width: 280px;
                height: calc(100vh - var(--nav-height));
                background: var(--background);
                flex-direction: column;
                justify-content: flex-start;
                padding: 2rem 1rem;
                transition: 0.4s;
                gap: 0.5rem;
                box-shadow: var(--shadow-lg);
                overflow-y: auto;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-item {
                width: 100%;
            }

            .nav-link {
                padding: 1rem;
                justify-content: flex-start;
                border-radius: 8px;
            }

            .dropdown {
                position: static;
                width: 100%;
                opacity: 1;
                visibility: visible;
                transform: none;
                display: none;
                box-shadow: none;
                border: none;
                background: rgba(37, 99, 235, 0.03);
                margin: 0.5rem 0;
                padding: 0.5rem 0;
            }

            .nav-item:hover .dropdown {
                display: none;
            }

            .dropdown.active {
                display: block;
            }

            .mobile-menu-btn {
                display: flex;
            }
        }

        /* Content untuk demo */
        .content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        h1 {
            color: var(--primary);
            margin-bottom: 1rem;
        }

        p {
            line-height: 1.6;
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }
    </style>
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
                        <a href="#artikel" class="dropdown-item">
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