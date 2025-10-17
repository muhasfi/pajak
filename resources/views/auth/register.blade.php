@extends('layouts.app')

@section('title', 'Customer Registration')

@section('content')
<style>
    /* ===== Background & Font ===== */
    body {
        background: linear-gradient(135deg, #2193b0, #6dd5ed);
        min-height: 100vh;
        overflow: hidden;
        position: relative;
        font-family: 'Poppins', sans-serif;
    }

    /* ===== Bubble Animation ===== */
    .bubbles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
    }
    .bubble {
        position: absolute;
        bottom: -150px;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 50%;
        animation: rise 10s infinite ease-in;
    }
    @keyframes rise {
        0% { transform: translateY(0) scale(1); opacity: 1; }
        100% { transform: translateY(-1200px) scale(1.5); opacity: 0; }
    }
    .bubble:nth-child(1) { left: 10%; width: 40px; height: 40px; animation-duration: 8s; }
    .bubble:nth-child(2) { left: 25%; width: 20px; height: 20px; animation-duration: 12s; animation-delay: 2s; }
    .bubble:nth-child(3) { left: 40%; width: 50px; height: 50px; animation-duration: 10s; animation-delay: 4s; }
    .bubble:nth-child(4) { left: 55%; width: 25px; height: 25px; animation-duration: 9s; animation-delay: 3s; }
    .bubble:nth-child(5) { left: 70%; width: 35px; height: 35px; animation-duration: 11s; animation-delay: 1s; }
    .bubble:nth-child(6) { left: 85%; width: 60px; height: 60px; animation-duration: 13s; animation-delay: 5s; }

    /* ===== Registration Card ===== */
    .register-card {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.92);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }
    .register-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    /* ===== Header ===== */
    .register-header {
        text-align: center;
        padding: 1rem 0;
    }
    .register-header h4 {
        font-weight: 700;
        color: #1a73e8;
    }
    .register-header p {
        color: #6c757d;
        font-size: 15px;
    }

    /* ===== Button ===== */
    .btn-register {
        background-color: #1a73e8;
        border: none;
        font-weight: 600;
        transition: 0.3s ease;
    }
    .btn-register:hover {
        background-color: #155fc1;
    }

    /* ===== Link ===== */
    .link-login a {
        color: #1a73e8;
        text-decoration: none;
        font-weight: 500;
    }
    .link-login a:hover {
        text-decoration: underline;
    }

    /* ===== Illustration Animation ===== */
    .register-illustration {
        max-width: 100%;
        animation: float 4s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
</style>

<!-- Bubble Background -->
<div class="bubbles">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
</div>

<!-- Main Content -->
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 align-items-center">
        <!-- Illustration -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png" alt="Register Illustration" class="register-illustration">
        </div>

        <!-- Registration Form -->
        <div class="col-md-6">
            <div class="card register-card p-4">
                <div class="register-header mb-3">
                    <h4>Create Your Account</h4>
                    <p>Join us today and explore amazing experiences!</p>
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

                <form method="POST" action="{{ route('customer.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label fw-semibold">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="1">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-register w-100 py-2">Register</button>
                </form>
                <div class="text-center mt-3 link-login">
                    <a href="{{ route('customer.login') }}">Already have an account? Login here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
