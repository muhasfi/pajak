<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Animation */
        .bg-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            top: 0;
            left: 0;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            animation: float 25s infinite ease-in-out;
            backdrop-filter: blur(2px);
        }

        .circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 15%;
            left: 15%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 65%;
            left: 75%;
            animation-delay: 3s;
        }

        .circle:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 35%;
            left: 85%;
            animation-delay: 6s;
        }

        .circle:nth-child(4) {
            width: 120px;
            height: 120px;
            top: 75%;
            left: 8%;
            animation-delay: 9s;
        }

        .circle:nth-child(5) {
            width: 90px;
            height: 90px;
            top: 45%;
            left: 5%;
            animation-delay: 12s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0.6;
            }
            33% {
                transform: translateY(-40px) translateX(20px) rotate(120deg);
                opacity: 0.4;
            }
            66% {
                transform: translateY(-20px) translateX(-20px) rotate(240deg);
                opacity: 0.5;
            }
        }

        /* Main Container */
        .register-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1100px;
            width: 100%;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: slideIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Left Side - Illustration */
        .register-illustration {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .register-illustration::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .illustration-container {
            position: relative;
            width: 240px;
            height: 280px;
            margin-bottom: 40px;
            z-index: 1;
        }

        /* Animated Person Writing */
        .person-writing {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-60%);
        }

        .person-head {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, #ffd89b 0%, #ffb86c 100%);
            border-radius: 50%;
            position: relative;
            margin: 0 auto 8px;
            animation: writeNod 3s ease-in-out infinite;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .person-eyes {
            display: flex;
            gap: 14px;
            justify-content: center;
            margin-top: 22px;
        }

        .eye {
            width: 9px;
            height: 9px;
            background: #2d3748;
            border-radius: 50%;
            animation: blink 4s infinite;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        @keyframes blink {
            0%, 94%, 100% { transform: scaleY(1); }
            96%, 98% { transform: scaleY(0.1); }
        }

        .person-smile {
            width: 24px;
            height: 12px;
            border: 2.5px solid #2d3748;
            border-top: none;
            border-radius: 0 0 24px 24px;
            position: absolute;
            bottom: 14px;
            left: 50%;
            transform: translateX(-50%);
        }

        .person-body {
            width: 75px;
            height: 95px;
            background: linear-gradient(180deg, #ffffff 0%, #f7fafc 100%);
            border-radius: 38px 38px 0 0;
            position: relative;
            margin: 0 auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .person-arm-write {
            position: absolute;
            width: 42px;
            height: 13px;
            background: linear-gradient(135deg, #ffd89b 0%, #ffb86c 100%);
            border-radius: 10px;
            right: -18px;
            top: 28px;
            transform-origin: left center;
            animation: writing 2.2s ease-in-out infinite;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        @keyframes writing {
            0%, 100% { transform: rotate(45deg); }
            50% { transform: rotate(70deg); }
        }

        @keyframes writeNod {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(-3deg); }
        }

        .paper {
            width: 130px;
            height: 160px;
            background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
            border-radius: 10px;
            position: absolute;
            bottom: 0;
            right: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            padding: 18px;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .paper-line {
            height: 4px;
            background: linear-gradient(90deg, #667eea, #a4b0ff, transparent);
            margin: 12px 0;
            border-radius: 2px;
            animation: drawLine 3.5s ease-in-out infinite;
            transform-origin: left;
        }

        .paper-line:nth-child(1) { width: 85%; animation-delay: 0s; }
        .paper-line:nth-child(2) { width: 95%; animation-delay: 0.6s; }
        .paper-line:nth-child(3) { width: 75%; animation-delay: 1.2s; }
        .paper-line:nth-child(4) { width: 88%; animation-delay: 1.8s; }

        @keyframes drawLine {
            0% { transform: scaleX(0); opacity: 0; }
            25% { transform: scaleX(1); opacity: 1; }
            75% { transform: scaleX(1); opacity: 1; }
            100% { transform: scaleX(1); opacity: 1; }
        }

        .pencil {
            width: 7px;
            height: 55px;
            background: linear-gradient(to bottom, #fbbf24 0%, #fbbf24 68%, #ffd89b 68%);
            position: absolute;
            right: 38px;
            bottom: 85px;
            border-radius: 3px;
            animation: pencilMove 2.2s ease-in-out infinite;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        }

        .pencil::before {
            content: '';
            width: 0;
            height: 0;
            border-left: 3.5px solid transparent;
            border-right: 3.5px solid transparent;
            border-top: 10px solid #1a202c;
            position: absolute;
            bottom: -10px;
            left: 0;
        }

        .pencil::after {
            content: '';
            width: 3px;
            height: 3px;
            background: #ef4444;
            border-radius: 50%;
            position: absolute;
            top: 5px;
            left: 2px;
            box-shadow: 0 0 4px rgba(239, 68, 68, 0.6);
        }

        @keyframes pencilMove {
            0%, 100% { transform: translate(0, 0) rotate(45deg); }
            50% { transform: translate(12px, 6px) rotate(45deg); }
        }

        .welcome-text {
            color: white;
            text-align: center;
            z-index: 1;
            position: relative;
        }

        .welcome-text h2 {
            font-size: 32px;
            margin-bottom: 12px;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            letter-spacing: -0.5px;
        }

        .welcome-text p {
            font-size: 16px;
            opacity: 0.95;
            line-height: 1.7;
            font-weight: 400;
        }

        /* Right Side - Form */
        .register-form-container {
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .form-logo {
            width: 75px;
            height: 75px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            animation: pulse 2.5s ease-in-out infinite;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 8px 30px rgba(102, 126, 234, 0.5);
            }
        }

        .form-logo i {
            color: white;
            font-size: 34px;
        }

        .form-header h3 {
            color: #2d3748;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .form-header p {
            color: #718096;
            font-size: 15px;
            font-weight: 400;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 9px;
            font-size: 14px;
            letter-spacing: 0.2px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 16px;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 13px 20px 13px 46px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f7fafc;
            color: #2d3748;
            font-family: inherit;
        }

        .form-input::placeholder {
            color: #cbd5e0;
        }

        .form-input:hover {
            border-color: #cbd5e0;
            background: #ffffff;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
        }

        .form-input:focus ~ .input-icon {
            color: #667eea;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            cursor: pointer;
            transition: color 0.3s ease;
            font-size: 16px;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 12px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-register:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transition: left 0.4s ease;
        }

        .btn-register span {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-register:hover:before {
            left: 0;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-register:active {
            transform: translateY(0);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            color: #718096;
            font-size: 14px;
        }

        .login-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
        }

        .login-link a:hover {
            color: #764ba2;
            border-bottom-color: #764ba2;
        }

        /* Custom Scrollbar */
        .register-form-container::-webkit-scrollbar {
            width: 6px;
        }

        .register-form-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .register-form-container::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 10px;
        }

        .register-form-container::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .register-wrapper {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .register-illustration {
                padding: 50px 30px;
            }

            .register-form-container {
                padding: 50px 40px;
            }

            .illustration-container {
                transform: scale(0.85);
            }

            .welcome-text h2 {
                font-size: 26px;
            }

            .welcome-text p {
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 15px;
            }

            .register-form-container {
                padding: 40px 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-header h3 {
                font-size: 26px;
            }

            .form-logo {
                width: 65px;
                height: 65px;
            }

            .form-logo i {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <div class="register-wrapper">
        <!-- Left Side - Illustration -->
        <div class="register-illustration">
            <div class="illustration-container">
                <div class="person-writing">
                    <div class="person-head">
                        <div class="person-eyes">
                            <div class="eye"></div>
                            <div class="eye"></div>
                        </div>
                        <div class="person-smile"></div>
                    </div>
                    <div class="person-body">
                        <div class="person-arm-write"></div>
                    </div>
                </div>
                
                <div class="paper">
                    <div class="paper-line"></div>
                    <div class="paper-line"></div>
                    <div class="paper-line"></div>
                    <div class="paper-line"></div>
                </div>
                
                <div class="pencil"></div>
            </div>
            
            <div class="welcome-text">
                <h2>Bergabunglah Dengan Kami!</h2>
                <p>Buat akun Anda dan nikmati<br>kemudahan layanan kami</p>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="register-form-container">
            <div class="form-header">
                <div class="form-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3>Daftar Akun Customer</h3>
                <p>Lengkapi formulir untuk membuat akun</p>
            </div>

            <form id="registerForm">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="firstName">Nama Depan</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="firstName" name="firstName" class="form-input" 
                                   placeholder="Nama depan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="lastName">Nama Belakang</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="lastName" name="lastName" class="form-input" 
                                   placeholder="Nama belakang" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" class="form-input" 
                               placeholder="nama@email.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Nomor Telepon</label>
                    <div class="input-wrapper">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" id="phone" name="phone" class="form-input" 
                               placeholder="08123456789" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" class="form-input" 
                                   placeholder="Min. 8 karakter" required>
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('password')"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Konfirmasi Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-input" 
                                   placeholder="Ulangi password" required>
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('confirmPassword')"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <span>
                        <i class="fas fa-user-plus"></i>
                        Daftar Sekarang
                    </span>
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="#login">Masuk Sekarang</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.parentElement.querySelector('.password-toggle');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Password tidak cocok!');
                return;
            }
            
            if (password.length < 8) {
                alert('Password minimal 8 karakter!');
                return;
            }
            
            // Add your registration logic here
            alert('Form berhasil disubmit! Silakan integrasikan dengan backend Anda.');
        });

        // Add input animation on focus
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>