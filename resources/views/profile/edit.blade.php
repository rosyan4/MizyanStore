@extends('layouts.app')

@section('title', 'Edit Profil - Mizyan Store')

@section('content')
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
    }

    * {
        font-family: 'Poppins', 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Main Section */
    .profile-main-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
    }

    .card-header {
        background-color: var(--secondary-color) !important;
        color: var(--bg-white) !important;
        padding: 30px;
        border-bottom: none;
    }

    .card-header h4 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .card-body {
        padding: 40px;
    }

    .section-divider {
        background-color: var(--bg-light);
        padding: 30px;
        border-radius: 15px;
        border: 1px solid var(--border-light);
        margin-bottom: 30px;
    }

    .section-divider h5 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    .form-label {
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-label i {
        color: var(--text-highlight);
        margin-right: 5px;
    }

    .form-control {
        border: 2px solid var(--border-light);
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.95rem;
        background-color: var(--bg-white);
        color: var(--text-dark);
        transition: border-color 0.2s ease;
    }

    .form-control:focus {
        border-color: var(--text-highlight);
        box-shadow: 0 0 0 0.2rem rgba(168, 113, 58, 0.25);
        background-color: var(--bg-white);
        color: var(--text-dark);
    }

    .form-control::placeholder {
        color: var(--text-light);
    }

    /* Profile Photo Styling */
    .profile-photo-container {
        width: 120px;
        height: 120px;
        margin: 0 auto 20px auto;
        position: relative;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid var(--border-primary);
        box-shadow: var(--shadow-light);
    }

    .profile-photo-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-initial {
        width: 100%;
        height: 100%;
        background-color: var(--secondary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--bg-white);
        font-size: 2rem;
        font-weight: 700;
    }

    .file-upload-wrapper {
        text-align: center;
    }

    .file-upload-wrapper input[type="file"] {
        margin-bottom: 10px;
    }

    /* Alert Styling */
    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        border: 1px solid rgba(40, 167, 69, 0.2);
        color: #155724;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 25px;
    }

    .alert-success i {
        color: #28a745;
    }

    /* Error Styling */
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 5px;
    }

    .invalid-feedback i {
        margin-right: 5px;
    }

    /* Button Styling */
    .btn-primary {
        background-color: var(--secondary-color);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1rem;
        color: var(--bg-white);
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background-color: var(--text-highlight);
        transform: translateY(-1px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
    }

    /* Form Actions */
    .form-actions {
        margin-top: 40px;
        padding-top: 25px;
        border-top: 2px solid var(--border-light);
    }

    .text-danger {
        color: #dc3545 !important;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease;
    }

    .text-danger:hover {
        color: #a71e2a !important;
        text-decoration: underline;
    }

    .text-muted {
        color: var(--text-light) !important;
        font-size: 0.85rem;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .profile-main-section {
            padding: 60px 0;
        }

        .card-header,
        .card-body,
        .section-divider {
            padding: 25px !important;
        }

        .profile-photo-container {
            width: 100px;
            height: 100px;
        }

        .profile-initial {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 767.98px) {
        .profile-main-section {
            padding: 50px 0;
        }

        .card-header,
        .card-body,
        .section-divider {
            padding: 20px !important;
        }

        .card-header h4 {
            font-size: 1.3rem;
        }

        .section-divider h5 {
            font-size: 1.2rem;
        }

        .profile-photo-container {
            width: 90px;
            height: 90px;
        }

        .profile-initial {
            font-size: 1.6rem;
        }

        .form-actions .d-flex {
            flex-direction: column;
            gap: 15px;
        }

        .btn-primary {
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .card-header,
        .card-body,
        .section-divider {
            padding: 15px !important;
        }

        .card-header h4 {
            font-size: 1.2rem;
        }

        .section-divider h5 {
            font-size: 1.1rem;
        }

        .profile-photo-container {
            width: 80px;
            height: 80px;
        }

        .profile-initial {
            font-size: 1.4rem;
        }
    }
</style>

<div class="profile-main-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card shadow-sm loading">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-user-edit me-2"></i>Edit Profil
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            Profil berhasil diperbarui!
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Informasi Profil -->
                        <div class="section-divider">
                            <h5 class="mb-4">
                                <i class="fas fa-user-circle me-2"></i>Informasi Profil
                            </h5>

                            <div class="row mb-4">
                                <div class="col-md-4 text-center">
                                    <div class="profile-photo-container">
                                        @if(auth()->user()->profile_photo)
                                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" 
                                                class="profile-photo-preview" alt="Profile Photo">
                                        @else
                                            <div class="profile-initial">
                                                <span>{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="file-upload-wrapper">
                                        <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                                        <small class="text-muted d-block">Format: JPEG, PNG (Max 2MB)</small>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            <i class="fas fa-user me-1"></i>Nama Lengkap
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="{{ old('name', auth()->user()->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-1"></i>Email
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email', auth()->user()->email) }}" required>
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">
                                            <i class="fas fa-phone me-1"></i>Nomor Telepon
                                        </label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" 
                                               value="{{ old('phone_number', auth()->user()->phone_number) }}">
                                        @error('phone_number')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">
                                    <i class="fas fa-map-marker-alt me-1"></i>Alamat
                                </label>
                                <textarea class="form-control" id="address" name="address" rows="3" 
                                          placeholder="Masukkan alamat lengkap Anda">{{ old('address', auth()->user()->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Informasi Akun -->
                        <div class="section-divider">
                            <h5 class="mb-4">
                                <i class="fas fa-lock me-2"></i>Informasi Akun
                            </h5>

                            <div class="mb-3">
                                <label for="current_password" class="form-label">
                                    <i class="fas fa-key me-1"></i>Password Saat Ini
                                </label>
                                <input type="password" class="form-control" id="current_password" name="current_password" 
                                       placeholder="Masukkan password saat ini">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                @error('current_password')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Password Baru
                                </label>
                                <input type="password" class="form-control" id="password" name="password" 
                                       placeholder="Masukkan password baru">
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">
                                    <i class="fas fa-check-double me-1"></i>Konfirmasi Password Baru
                                </label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                                       placeholder="Konfirmasi password baru">
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>

                                <a href="{{ route('profile.destroy') }}" class="text-danger" 
                                   onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.')) { document.getElementById('delete-form').submit(); }">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus Akun
                                </a>
                            </div>
                        </div>
                    </form>

                    <form id="delete-form" action="{{ route('profile.destroy') }}" method="POST" class="d-none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    // Simple form enhancements
    document.addEventListener('DOMContentLoaded', function() {
        const formInputs = document.querySelectorAll('.form-control');
        const submitBtn = document.querySelector('.btn-primary');
        
        // Simple focus enhancement for form inputs
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--text-highlight)';
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.style.borderColor = 'var(--border-light)';
                }
            });
        });
        
        // Simple button hover effect
        if (submitBtn) {
            submitBtn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            submitBtn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        }
        
        // Auto-hide success alert after 5 seconds
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.opacity = '0';
                successAlert.style.transition = 'opacity 0.5s ease';
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 500);
            }, 5000);
        }
    });
</script>