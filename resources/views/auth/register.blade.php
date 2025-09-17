@extends('layouts.master')

@section('title', 'Daftar Akun Baru')

@section('style')
<style>
    body {
        background: linear-gradient(120deg, #4e54c8 0%, #fdfdff 100%);
        min-height: 100vh;
        font-family: 'Inter', Arial, sans-serif;
    }

    .register-container {
        max-width: 700px; /* lebih lebar biar muat 2 kolom */
        margin: 120px auto;
        padding: 40px 32px;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 12px 32px rgba(78, 84, 200, 0.15);
    }

    .register-logo {
        width: 64px;
        height: 64px;
        margin: 0 auto 18px;
        background: linear-gradient(135deg, #4e54c8 60%, #8f94fb 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-logo i {
        color: #fff;
        font-size: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #4e54c8;
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
        border-color: #4e54c8;
        box-shadow: 0 0 0 2px rgba(78, 84, 200, 0.15);
    }

    .btn-primary {
        background: linear-gradient(90deg, #4e54c8, #8f94fb);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 12px 0;
        margin-top: 8px;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 12px rgba(78, 84, 200, 0.10);
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #8f94fb, #4e54c8);
        box-shadow: 0 6px 18px rgba(78, 84, 200, 0.18);
    }

    .alert {
        border-radius: 8px;
        margin-bottom: 16px;
    }
</style>
<link rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('content')
<div class="register-container">
    <div class="register-logo">
        <i class="fas fa-user-plus"></i>
    </div>
    <h3 class="text-center mb-2" style="color:#4e54c8;font-weight:700;">Daftar Akun Baru</h3>
    <p class="text-muted text-center mb-4" style="font-size: 0.95rem;">Silakan isi data untuk membuat akun baru.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fa fa-user"></i></span>
                    <input id="name" type="text" name="name" 
                           class="form-control" value="{{ old('name') }}" 
                           required autofocus placeholder="Masukkan nama lengkap">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                    <input id="email" type="email" name="email" 
                           class="form-control" value="{{ old('email') }}" 
                           required placeholder="Masukkan email">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    <input id="password" type="password" name="password" 
                           class="form-control" required autocomplete="new-password" 
                           placeholder="Masukkan password">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    <input id="password_confirmation" type="password" 
                           name="password_confirmation" class="form-control" required 
                           placeholder="Konfirmasi password">
                </div>
            </div>
        </div>

        <div class="mb-3 text-end">
            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                Sudah punya akun?
            </a>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="fa fa-user-plus me-2"></i>Daftar
        </button>
    </form>
</div>
@endsection
