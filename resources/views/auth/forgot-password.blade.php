<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Mizyan Store</title>
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
        
        .forgot-container {
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

        .forgot-container::before {
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
        
        .forgot-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .forgot-header .brand-icon {
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
        
        .forgot-header h1 {
            color: var(--secondary-color);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .forgot-description {
            background-color: var(--bg-light);
            border: 1px solid var(--border-primary);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .forgot-description p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.6;
            margin: 0;
        }

        .forgot-description .info-icon {
            color: var(--text-highlight);
            font-size: 1.2rem;
            margin-bottom: 10px;
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
        
        .btn-reset {
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
            margin-bottom: 25px;
        }
        
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-heavy);
        }

        .btn-reset:active {
            transform: translateY(0);
        }
        
        .btn-reset:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        
        .auth-links {
            text-align: center;
            margin-top: 25px;
        }
        
        .auth-links a {
            color: var(--text-highlight);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .auth-links a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        .back-to-login {
            background-color: var(--bg-light);
            border: 1px solid var(--border-primary);
            border-radius: 12px;
            padding: 15px 20px;
            text-align: center;
            margin-top: 20px;
        }

        .back-to-login a {
            color: var(--text-highlight);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .back-to-login a:hover {
            color: var(--secondary-color);
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

        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
            font-size: 0.85rem;
        }

        .step {
            padding: 8px 15px;
            background-color: var(--bg-light);
            border: 1px solid var(--border-primary);
            border-radius: 20px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .step.active {
            background-color: var(--price-color);
            color: var(--bg-white);
            border-color: var(--price-color);
        }
        
        /* Responsive Design */
        @media (max-width: 576px) {
            body {
                padding: 15px;
            }

            .forgot-container {
                padding: 40px 30px;
            }
            
            .forgot-header h1 {
                font-size: 1.75rem;
            }

            .forgot-header .brand-icon {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
            }
            
            .form-group input {
                padding: 14px 14px 14px 42px;
            }
            
            .btn-reset {
                padding: 15px 20px;
                font-size: 1rem;
            }
        }

        @media (max-width: 400px) {
            .forgot-container {
                padding: 35px 25px;
            }

            .step-indicator {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <div class="forgot-header">
            <div class="brand-icon">
                <i class="fas fa-key"></i>
            </div>
            <h1>Lupa Kata Sandi?</h1>
        </div>

        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step active">
                <i class="fas fa-envelope me-1"></i>
                Masukkan Email
            </div>
            <div class="step">
                <i class="fas fa-paper-plane me-1"></i>
                Link Reset Dikirim
            </div>
        </div>

        <!-- Description -->
        <div class="forgot-description">
            <div class="info-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <p>
                Tidak masalah jika Anda lupa kata sandi. Masukkan alamat email Anda dan kami akan mengirimkan 
                link reset kata sandi yang memungkinkan Anda untuk membuat kata sandi baru.
            </p>
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

        <form method="POST" action="{{ route('password.email') }}" id="forgotForm">
            @csrf
            
            <!-- Email Input -->
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope me-2"></i>
                    Alamat Email Terdaftar
                </label>
                <div class="input-wrapper">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                           required autofocus autocomplete="username"
                           placeholder="Masukkan email yang terdaftar"
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
            
            <!-- Submit Button -->
            <button type="submit" class="btn-reset" id="resetBtn">
                <span id="btnText">
                    <i class="fas fa-paper-plane me-2"></i>
                    Kirim Link Reset Password
                </span>
                <span id="resetSpinner" style="display:none;">
                    <div class="loading-spinner"></div>
                    Mengirim link...
                </span>
            </button>
        </form>

        <!-- Back to Login -->
        <div class="back-to-login">
            <a href="{{ route('login') }}">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali ke Halaman Masuk
            </a>
        </div>

        <!-- Additional Help -->
        <div class="auth-links">
            <div style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 15px;">
                Butuh bantuan lain?
            </div>
            <a href="mailto:support@mizyanstore.com">
                <i class="fas fa-headset"></i>
                Hubungi Customer Service
            </a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('forgotForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('resetBtn');
            const btnText = document.getElementById('btnText');
            const spinner = document.getElementById('resetSpinner');
            
            // Show loading state
            btn.disabled = true;
            btnText.style.display = 'none';
            spinner.style.display = 'flex';
            spinner.style.alignItems = 'center';
            spinner.style.justifyContent = 'center';
            spinner.style.gap = '10px';
            
            // Client-side validation
            const email = document.getElementById('email').value.trim();
            
            if (!email) {
                e.preventDefault();
                
                // Show error alert
                const errorAlert = document.createElement('div');
                errorAlert.className = 'alert alert-error';
                errorAlert.innerHTML = '<i class="fas fa-exclamation-circle"></i> Harap masukkan alamat email Anda';
                
                const form = document.getElementById('forgotForm');
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
                return;
            }

            // Email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                
                const errorAlert = document.createElement('div');
                errorAlert.className = 'alert alert-error';
                errorAlert.innerHTML = '<i class="fas fa-exclamation-circle"></i> Format email tidak valid';
                
                const form = document.getElementById('forgotForm');
                form.insertBefore(errorAlert, form.firstChild);
                
                // Reset button state
                btn.disabled = false;
                btnText.style.display = 'flex';
                btnText.style.alignItems = 'center';
                btnText.style.justifyContent = 'center';
                spinner.style.display = 'none';
                
                setTimeout(() => {
                    if (errorAlert.parentNode) {
                        errorAlert.remove();
                    }
                }, 5000);
                return;
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

        // Show success state if status message exists
        @if(session('status'))
            // Update step indicator to show success
            const steps = document.querySelectorAll('.step');
            steps.forEach((step, index) => {
                if (index <= 1) {
                    step.classList.add('active');
                }
            });
        @endif
    </script>
</body>
</html>