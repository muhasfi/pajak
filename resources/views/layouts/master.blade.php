{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.__header')
    {{-- Tempat CSS tambahan dari halaman --}}
    <link href="{{ asset('assets/customer/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/css/book.css') }}" rel="stylesheet">
    @yield('style')
</head>
<style>
    :root {
        --primary-blue: #2563eb;
        --secondary-blue: #3b82f6;
        --accent-blue: #60a5fa;
        --dark-blue: #1e40af;
        --light-blue: #dbeafe;
        --gradient-primary: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
        --gradient-secondary: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
        --shadow-soft: 0 8px 30px rgba(37, 99, 235, 0.12);
        --shadow-hover: 0 20px 50px rgba(37, 99, 235, 0.18);
    }

    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        background-color: #f8fafc;
        color: #334155;
    }

    .navbar-brand {
        font-weight: 800;
        font-size: 1.5rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-section {
        background: var(--gradient-primary);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .card-service {
        border: none;
        border-radius: 20px;
        background: white;
        box-shadow: var(--shadow-soft);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        position: relative;
    }

    .card-service::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .card-service:hover {
        transform: translateY(-12px);
        box-shadow: var(--shadow-hover);
    }

    .card-service:hover::before {
        transform: scaleX(1);
    }

    .card-service.premium {
        border: 2px solid var(--primary-blue);
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
    }

    .price-tag {
        font-size: 2.25rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .badge-premium {
        background: var(--gradient-primary);
        color: white;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.75rem;
        position: absolute;
        top: -10px;
        right: 20px;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }

    .feature-list li {
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }

    .feature-list li:hover {
        background-color: #f8fafc;
        padding-left: 10px;
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .btn-primary-custom {
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 12px 32px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        color: white;
    }

    .btn-outline-custom {
        border: 2px solid var(--primary-blue);
        color: var(--primary-blue);
        background: transparent;
        padding: 12px 32px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-custom:hover {
        background: var(--primary-blue);
        color: white;
        transform: translateY(-2px);
    }

    .step-indicator {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: var(--shadow-soft);
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .floating-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
        width: 200px;
        height: 200px;
        top: -100px;
        right: -100px;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 150px;
        height: 150px;
        bottom: -75px;
        left: -75px;
        animation-delay: 2s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .sticky-sidebar {
        position: sticky;
        top: 100px;
    }

    .progress-track {
        height: 6px;
        background: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
        margin: 20px 0;
    }

    .progress-fill {
        height: 100%;
        background: var(--gradient-primary);
        border-radius: 10px;
        transition: width 0.8s ease;
    }

    .testimonial-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: var(--shadow-soft);
        border-left: 4px solid var(--primary-blue);
    }

    .nav-link {
        font-weight: 500;
        color: #64748b !important;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 0 5px;
    }

    .nav-link:hover, .nav-link.active {
        color: var(--primary-blue) !important;
        background-color: var(--light-blue);
    }
</style>
<body>

    {{-- Navbar --}}
    @include('layouts.__navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
        
    </main>

    {{-- Footer --}}
    @include('layouts.__footer')
    <link href="{{ asset('assets/customer/css/footer.css') }}" rel="stylesheet">
    @yield('style')

    {{-- Script JS --}}
    <script src="{{ asset('assets/customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- Script tambahan per halaman --}}
    @yield('script')
</body>
</html>
