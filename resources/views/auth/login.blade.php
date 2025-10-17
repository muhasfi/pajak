@extends('layouts.app')

@section('title', 'Customer Login')

@section('content')
<style>
    /* ===== Global Background ===== */
    body {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        min-height: 100vh;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        position: relative;
    }

    /* ===== Animated Circles ===== */
    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
    }

    .circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        animation: moveUp 20s linear infinite;
    }

    .circle:nth-child(1) { width: 120px; height: 120px; left: 15%; bottom: -150px; animation-delay: 0s; }
    .circle:nth-child(2) { width: 80px; height: 80px; left: 40%; bottom: -200px; animation-delay: 5s; }
    .circle:nth-child(3) { width: 200px; height: 200px; left: 70%; bottom: -250px; animation-delay: 10s; }

    @keyframes moveUp {
        0% { transform: translateY(0) scale(1); opacity: 0.8; }
        100% { transform: translateY(-1200px) scale(1.3); opacity: 0; }
    }

    /* ===== Login Card ===== */
    .login-card {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        color: #fff;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    /* ===== Header ===== */
    .login-header {
        text-align: center;
        padding: 1rem 0;
    }

    .login-header h4 {
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.5px;
    }

    .login-header p {
        color: rgba(255, 255, 255, 0.75);
    }

    /* ===== Button ===== */
    .btn-login {
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        border: none;
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #0072ff, #00c6ff);
    }

    /* ===== Icon and Image Animation ===== */
    .icon-login {
        font-size: 3rem;
        color: #fff;
        animation: floatIcon 3s ease-in-out infinite;
    }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .login-image {
        max-width: 80%;
        height: auto;
        animation: floatImage 4s ease-in-out infinite;
        filter: drop-shadow(0 8px 20px rgba(0,0,0,0.3));
    }

    @keyframes floatImage {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
        100% { transform: translateY(0px); }
    }

    /* ===== Link Register ===== */
    .link-register a {
        color: #00d4ff;
        font-weight: 500;
        text-decoration: none;
        transition: 0.3s;
    }

    .link-register a:hover {
        text-decoration: underline;
        color: #fff;
    }
</style>

<!-- ===== Animated Background Circles ===== -->
<div class="circles">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
</div>

<!-- ===== Content ===== -->
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 align-items-center">
        <!-- Illustration -->
        <div class="col-md-6 text-center mb-5 mb-md-0">
            <img src="https://cdn-icons-png.flaticon.com/512/706/706830.png" 
                 alt="Login Illustration" 
                 class="login-image mb-3">
            <h5 class="text-white fw-semibold">Your Account, Your World 🌍</h5>
        </div>

        <!-- Login Form -->
        <div class="col-md-6">
            <div class="card login-card p-4 p-md-5">
                <div class="login-header mb-3">
                    <i class="fas fa-user-lock icon-login mb-3"></i>
                    <h4>Welcome Back!</h4>
                    <p>Sign in to continue your journey</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('customer.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control bg-transparent text-white border-light" 
                               id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control bg-transparent text-white border-light" 
                               id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-login w-100 py-2">Login <i class="fas fa-arrow-right ms-2"></i></button>
                </form>

                <div class="text-center mt-3 link-register">
                    <a href="{{ route('customer.register') }}">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a2d9d6c6d6.js" crossorigin="anonymous"></script>
@endsection
