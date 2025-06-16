<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Mizyan Store</title>
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
        
        .login-container {
            background-color: var(--bg-white);
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-heavy);
            width: 100%;
            max-width: 450px;
            padding: 50px 40px;
            animation: fadeInUp 0.8s ease;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
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
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header .brand-icon {
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
        
        .login-header h1 {
            color: var(--secondary-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .login-header p {
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 500;
        }
        
        .form-group {
            margin-bottom: 25px;
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
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            gap: 10px;
        }
        
        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--price-color);
            cursor: pointer;
        }
        
        .remember-me label {
            font-size: 0.95rem;
            color: var(--text-secondary);
            font-weight: 500;
            cursor: pointer;
            margin: 0;
        }
        
        .btn-login {
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
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-heavy);
        }

        .btn-login:active {
            transform: translateY(0);
        }
        
        .btn-login:disabled {
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
        
        .register-link {
            margin-top: 20px;
            font-size: 0.95rem;
            color: var(--text-muted);
        }
        
        .register-link a {
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
        
        /* Responsive Design */
        @media (max-width: 576px) {
            body {
                padding: 15px;
            }

            .login-container {
                padding: 40px 30px;
            }
            
            .login-header h1 {
                font-size: 1.75rem;
            }

            .login-header .brand-icon {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
            }
            
            .form-group input {
                padding: 14px 14px 14px 42px;
            }
            
            .btn-login {
                padding: 15px 20px;
                font-size: 1rem;
            }
        }

        @media (max-width: 400px) {
            .login-container {
                padding: 35px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="brand-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <h1>Selamat Datang</h1>
            <p>Masuk ke akun Mizyan Store Anda</p>
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

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf
            
            <!-- Email Input -->
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope me-2"></i>
                    Alamat Email
                </label>
                <div class="input-wrapper">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                           required autofocus autocomplete="username"
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
                           required autocomplete="current-password"
                           placeholder="Masukkan kata sandi"
                           aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}">
                    <i class="fas fa-lock input-icon"></i>
                </div>
                @error('password')
                    <span class="form-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            
            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember_me">Ingat saya</label>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn-login" id="loginBtn">
                <span id="btnText">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Masuk ke Akun
                </span>
                <span id="loginSpinner" style="display:none;">
                    <div class="loading-spinner"></div>
                    Memproses...
                </span>
            </button>
            
            <!-- Additional Links -->
            <div class="auth-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-key me-1"></i>
                        Lupa kata sandi?
                    </a>
                @endif
                
                @if (Route::has('register'))
                    <p class="register-link">
                        Belum punya akun? 
                        <a href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>
                            Daftar sekarang
                        </a>
                    </p>
                @endif
            </div>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            const btnText = document.getElementById('btnText');
            const spinner = document.getElementById('loginSpinner');
            
            // Show loading state
            btn.disabled = true;
            btnText.style.display = 'none';
            spinner.style.display = 'flex';
            spinner.style.alignItems = 'center';
            spinner.style.justifyContent = 'center';
            spinner.style.gap = '10px';
            
            // Client-side validation
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                e.preventDefault();
                
                // Show error alert
                const errorAlert = document.createElement('div');
                errorAlert.className = 'alert alert-error';
                errorAlert.innerHTML = '<i class="fas fa-exclamation-circle"></i> Harap isi email dan kata sandi';
                
                const form = document.getElementById('loginForm');
                form.insertBefore(errorAlert, form.firstChild);
                
                // Reset button state
                btn.disabled = false;
                btnText.style.display = 'flex';
                btnText.style.alignItems = 'center';
                btnText.style.justifyContent = 'center';
                spinner.style.display = 'none';
                
                // Remove error after 5 seconds
                setTimeout(() => {
                    if (errorAlert.parentNode) {
                        errorAlert.remove();
                    }
                }, 5000);
            }
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
    </script>
</body>
</html>