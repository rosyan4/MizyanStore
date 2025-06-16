<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Mizyan Store</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #F8E5BB !important;        /* Cream muda */
            --secondary-color: #713600 !important;      /* Coklat gelap */
            --accent-color: #F2E8D5 !important;         /* Beige pucel */
            --text-highlight: #A8713A !important;       /* Coklat muda */
            --footer-bg: #4A2C14 !important;           /* Coklat tua solid */
            --price-color: #D39C63 !important;         /* Coklat emas (golden tan) */
            --bg-white: #FFFFFF !important;             /* Putih */
            --bg-light: #FDF9F3 !important;            /* Cream sangat muda */
            --text-dark: #713600 !important;           /* Coklat gelap untuk teks */
            --text-secondary: #A8713A !important;       /* Coklat muda untuk teks */
            --text-muted: #8B6F47 !important;          /* Coklat medium */
            --text-light: #B8956B !important;          /* Coklat muda */
            --border-light: #F2E8D5 !important;        /* Border beige */
            --border-primary: #F8E5BB !important;      /* Border cream */
            --shadow-light: 0 4px 20px rgba(248, 229, 187, 0.15) !important;
            --shadow-medium: 0 8px 30px rgba(248, 229, 187, 0.25) !important;
            --shadow-heavy: 0 15px 40px rgba(248, 229, 187, 0.3) !important;
            --error-color: #DC2626 !important;
            --success-color: #059669 !important;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--bg-light) 0%, var(--primary-color) 50%, var(--accent-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        .register-container {
            background-color: var(--bg-white);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-heavy);
            width: 100%;
            max-width: 480px;
            padding: 50px 40px;
            animation: fadeInUp 0.8s ease;
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--price-color), var(--text-highlight));
            z-index: 1;
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .register-header .brand-icon {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            box-shadow: var(--shadow-light);
        }
        
        .register-header h1 {
            color: var(--secondary-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .register-header p {
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 500;
        }
        
        .form-group {
            margin-bottom: 22px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-group .input-wrapper {
            position: relative;
        }

        .form-group .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
            z-index: 2;
        }
        
        .form-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid var(--border-light);
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            background-color: var(--bg-white);
            color: var(--text-dark);
            transition: all 0.3s ease;
            box-shadow: var(--shadow-light);
        }
        
        .form-group input:focus {
            border-color: var(--price-color);
            box-shadow: 0 0 0 3px rgba(211, 156, 99, 0.15);
            outline: none;
            background-color: var(--bg-light);
        }

        .form-group input:focus + .input-icon {
            color: var(--price-color);
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--price-color), var(--text-highlight));
            color: var(--bg-white);
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            width: 100%;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-medium);
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-heavy);
        }

        .btn-register:active {
            transform: translateY(0);
        }
        
        .btn-register:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        
        .auth-links {
            text-align: center;
            margin-top: 30px;
        }
        
        .auth-links a {
            color: var(--text-highlight);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .auth-links a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        .login-link {
            margin-top: 20px;
            font-size: 0.95rem;
            color: var(--text-muted);
        }
        
        .login-link a {
            font-weight: 600;
            color: var(--price-color);
        }
        
        .form-error {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow-light);
        }

        .alert-success {
            background-color: rgba(5, 150, 105, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(5, 150, 105, 0.2);
        }

        .alert-error {
            background-color: rgba(220, 38, 38, 0.1);
            color: var(--error-color);
            border: 1px solid rgba(220, 38, 38, 0.2);
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--bg-white);
            animation: spin 0.8s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .password-strength {
            margin-top: 8px;
            font-size: 0.8rem;
        }

        .strength-indicator {
            height: 4px;
            background-color: var(--border-light);
            border-radius: 2px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background-color: #ef4444; width: 33%; }
        .strength-medium { background-color: #f59e0b; width: 66%; }
        .strength-strong { background-color: var(--success-color); width: 100%; }
        
        /* Responsive Design */
        @media (max-width: 576px) {
            body {
                padding: 15px;
            }

            .register-container {
                padding: 40px 30px;
            }
            
            .register-header h1 {
                font-size: 1.75rem;
            }

            .register-header .brand-icon {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
            }
            
            .form-group input {
                padding: 14px 14px 14px 42px;
            }
            
            .btn-register {
                padding: 15px 20px;
                font-size: 1rem;
            }
        }

        @media (max-width: 400px) {
            .register-container {
                padding: 35px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <div class="brand-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1>Buat Akun Baru</h1>
            <p>Daftar untuk bergabung dengan Mizyan Store</p>
        </div>
        
        <!-- Status Messages -->
        @if(session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            
            <!-- Name Input -->
            <div class="form-group">
                <label for="name">
                    <i class="fas fa-user me-2"></i>
                    Nama Lengkap
                </label>
                <div class="input-wrapper">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" 
                           required autofocus autocomplete="name"
                           placeholder="Masukkan nama lengkap Anda"
                           aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">
                    <i class="fas fa-user input-icon"></i>
                </div>
                @error('name')
                    <span class="form-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            
            <!-- Email Input -->
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope me-2"></i>
                    Alamat Email
                </label>
                <div class="input-wrapper">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                           required autocomplete="username"
                           placeholder="Masukkan email Anda"
                           aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}">
                    <i class="fas fa-envelope input-icon"></i>
                </div>
                @error('email')
                    <span class="form-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            
            <!-- Password Input -->
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock me-2"></i>    
                    Kata Sandi
                </label>
                <div class="input-wrapper">
                    <input id="password" type="password" name="password" 
                           required autocomplete="new-password"
                           placeholder="Masukkan kata sandi"
                           aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}">
                    <i class="fas fa-lock input-icon"></i>
                </div>
                <div class="password-strength" id="passwordStrength" style="display: none;">
                    <div class="strength-indicator">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>
                    <span id="strengthText"></span>
                </div>
                @error('password')
                    <span class="form-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            
            <!-- Confirm Password Input -->
            <div class="form-group">
                <label for="password_confirmation">
                    <i class="fas fa-shield-alt me-2"></i>    
                    Konfirmasi Kata Sandi
                </label>
                <div class="input-wrapper">
                    <input id="password_confirmation" type="password" name="password_confirmation" 
                           required autocomplete="new-password"
                           placeholder="Ulangi kata sandi"
                           aria-invalid="{{ $errors->has('password_confirmation') ? 'true' : 'false' }}">
                    <i class="fas fa-shield-alt input-icon"></i>
                </div>
                @error('password_confirmation')
                    <span class="form-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn-register" id="registerBtn">
                <span id="btnText">
                    <i class="fas fa-user-plus me-2"></i>
                    Daftar Sekarang
                </span>
                <span id="registerSpinner" style="display:none;">
                    <div class="loading-spinner"></div>
                    Memproses...
                </span>
            </button>
            
            <!-- Additional Links -->
            <div class="auth-links">
                <p class="login-link">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>
                        Masuk sekarang
                    </a>
                </p>
            </div>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('registerBtn');
            const btnText = document.getElementById('btnText');
            const spinner = document.getElementById('registerSpinner');
            
            // Show loading state
            btn.disabled = true;
            btnText.style.display = 'none';
            spinner.style.display = 'flex';
            spinner.style.alignItems = 'center';
            spinner.style.justifyContent = 'center';
            spinner.style.gap = '10px';
            
            // Client-side validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            
            if (!name || !email || !password || !passwordConfirmation) {
                e.preventDefault();
                showError('Harap isi semua field yang diperlukan');
                resetButton();
                return;
            }
            
            if (password !== passwordConfirmation) {
                e.preventDefault();
                showError('Konfirmasi kata sandi tidak cocok');
                resetButton();
                return;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                showError('Kata sandi minimal 8 karakter');
                resetButton();
                return;
            }
            
            function showError(message) {
                const errorAlert = document.createElement('div');
                errorAlert.className = 'alert alert-error';
                errorAlert.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
                
                const form = document.getElementById('registerForm');
                form.insertBefore(errorAlert, form.firstChild);
                
                setTimeout(() => {
                    if (errorAlert.parentNode) {
                        errorAlert.remove();
                    }
                }, 5000);
            }
            
            function resetButton() {
                btn.disabled = false;
                btnText.style.display = 'flex';
                btnText.style.alignItems = 'center';
                btnText.style.justifyContent = 'center';
                spinner.style.display = 'none';
            }
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length === 0) {
                strengthIndicator.style.display = 'none';
                return;
            }
            
            strengthIndicator.style.display = 'block';
            
            let strength = 0;
            let strengthLabel = '';
            
            // Check password criteria
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Set strength class and text
            strengthBar.className = 'strength-bar';
            if (strength <= 2) {
                strengthBar.classList.add('strength-weak');
                strengthLabel = 'Lemah';
            } else if (strength <= 4) {
                strengthBar.classList.add('strength-medium');
                strengthLabel = 'Sedang';
            } else {
                strengthBar.classList.add('strength-strong');
                strengthLabel = 'Kuat';
            }
            
            strengthText.textContent = `Kekuatan kata sandi: ${strengthLabel}`;
        });

        // Add input focus effects
        document.querySelectorAll('.form-group input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Real-time password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmation = this.value;
            
            if (confirmation && password !== confirmation) {
                this.style.borderColor = 'var(--error-color)';
            } else {
                this.style.borderColor = 'var(--border-light)';
            }
        });
    </script>
</body>
</html>