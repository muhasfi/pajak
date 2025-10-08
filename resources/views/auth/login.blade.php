{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.master')

@section('title', 'Login Admin')

@section('style')
    <style>
        body {
            background: linear-gradient(120deg, #2563eb 0%, #fdfdff 100%);
            min-height: 100vh;
            font-family: 'Inter', Arial, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 120px auto;
            padding: 40px 32px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 12px 32px rgba(78, 84, 200, 0.15);
        }

        .login-logo {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            background: linear-gradient(135deg, #2563eb 60%, #ffffff 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-logo i {
            color: #fff;
            font-size: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #2563eb;
            margin-bottom: 6px;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 0.95rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #e0e3ea;
            padding: 10px 14px 10px 40px;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(78, 84, 200, 0.15);
        }

        .btn-primary {
            background: linear-gradient(90deg, #2563eb, #ffffff);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 12px 0;
            margin-top: 8px;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 12px rgba(78, 84, 200, 0.10);
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #ffffff, #2563eb);
            box-shadow: 0 6px 18px rgba(78, 84, 200, 0.18);
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .link-register {
            margin-top: 12px;
            font-size: 0.9rem;
            text-align: center;
        }

        .link-register a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .link-register a:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="login-container">
        <div class="login-logo">
            <i class="fas fa-user-shield"></i>
        </div>
        <h3 class="text-center mb-2" style="color:#4e54c8;font-weight:700;">Login Admin</h3>
        <p class="text-muted text-center mb-4" style="font-size: 0.95rem;">
            Silakan masuk untuk mengakses dashboard admin.
        </p>

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" id="email"
                           class="form-control" required autofocus
                           placeholder="Masukkan email">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" id="password"
                           class="form-control" required
                           placeholder="Masukkan password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="fa fa-sign-in-alt me-2"></i>Login
            </button>
        </form>

        <div class="link-register">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar</a>
        </div>
    </div>
@endsection
