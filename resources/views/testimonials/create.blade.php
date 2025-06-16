@extends('layouts.app')

@section('title', 'Tambah Testimoni - Mizyan Store')

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

    /* Hero Section */
    .hero-testimonial {
        background-color: var(--secondary-color);
        padding: 100px 0 80px 0;
        color: var(--bg-white);
        position: relative;
        overflow: hidden;
    }

    .hero-testimonial::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(248, 229, 187, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(242, 232, 213, 0.1) 0%, transparent 50%);
        z-index: 1;
    }

    .hero-content {
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        background-color: rgba(248, 229, 187, 0.2);
        color: var(--bg-white);
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-bottom: 20px;
        border: 1px solid rgba(248, 229, 187, 0.3);
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.025em;
    }

    .title-underline {
        width: 80px;
        height: 4px;
        background-color: var(--price-color);
        border-radius: 2px;
        margin: 0 auto 30px auto;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Form Section */
    .form-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .form-card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        margin-bottom: 40px;
    }

    .form-header {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        padding: 30px;
        border-bottom: none;
    }

    .form-header h4 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .form-body {
        padding: 40px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border: 2px solid var(--border-light);
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 1rem;
        background-color: var(--bg-light);
        color: var(--text-dark);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--text-highlight);
        background-color: var(--bg-white);
        box-shadow: 0 0 0 0.2rem rgba(168, 113, 58, 0.15);
        outline: none;
    }

    .form-control::placeholder {
        color: var(--text-light);
        opacity: 0.8;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 5px;
        display: block;
    }

    /* Rating Preview */
    .rating-preview {
        margin-top: 15px;
        padding: 15px;
        background-color: var(--bg-light);
        border-radius: 10px;
        border: 1px solid var(--border-light);
    }

    .rating-stars {
        margin-bottom: 8px;
    }

    .rating-stars .star {
        color: #FFD700;
        font-size: 1.2rem;
        margin-right: 2px;
    }

    .rating-stars .star.empty {
        color: var(--border-light);
    }

    .rating-text {
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* File Input */
    .form-control-file {
        border: 2px dashed var(--border-light);
        border-radius: 12px;
        padding: 20px;
        background-color: var(--bg-light);
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-control-file:hover {
        border-color: var(--text-highlight);
        background-color: rgba(248, 229, 187, 0.1);
    }

    .form-text {
        color: var(--text-muted);
        font-size: 0.875rem;
        margin-top: 8px;
    }

    /* Buttons */
    .btn-mizyan-primary {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-right: 15px;
        text-decoration: none;
        display: inline-block;
    }

    .btn-mizyan-primary:hover {
        background-color: var(--text-highlight);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
        text-decoration: none;
    }

    .btn-mizyan-secondary {
        background-color: var(--bg-light);
        color: var(--text-secondary);
        border: 2px solid var(--border-light);
        padding: 10px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-mizyan-secondary:hover {
        background-color: var(--border-light);
        color: var(--text-dark);
        transform: translateY(-2px);
        text-decoration: none;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-testimonial {
            padding: 80px 0 60px 0;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .form-section {
            padding: 60px 0;
        }

        .form-header,
        .form-body {
            padding: 25px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-testimonial {
            padding: 60px 0 50px 0;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .form-section {
            padding: 50px 0;
        }

        .form-header,
        .form-body {
            padding: 20px;
        }

        .btn-mizyan-primary,
        .btn-mizyan-secondary {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            margin-right: 0;
            text-align: center;
        }
    }

    @media (max-width: 575.98px) {
        .hero-title {
            font-size: 1.8rem;
        }

        .form-header h4 {
            font-size: 1.5rem;
        }

        .form-header,
        .form-body {
            padding: 15px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-testimonial">
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-comment-dots me-1"></i>
                Testimoni Baru
            </span>
            <h1 class="hero-title">Bagikan Pengalaman Anda</h1>
            <div class="title-underline"></div>
            <p class="hero-subtitle">Ceritakan pengalaman berbelanja Anda di Mizyan Store dan bantu pelanggan lain membuat keputusan yang tepat</p>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card">
                    <div class="form-header">
                        <h4 class="mb-0">
                            <i class="fas fa-star me-2"></i>
                            Tambah Testimoni Baru
                        </h4>
                    </div>

                    <div class="form-body">
                        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" id="testimonialForm">
                            @csrf

                            <div class="form-group">
                                <label for="name">
                                    <i class="fas fa-user me-1"></i>
                                    Nama Lengkap
                                </label>
                                <input type="text" name="name" id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name', auth()->user()->name) }}" 
                                    placeholder="Masukkan nama lengkap Anda"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    Lokasi (Opsional)
                                </label>
                                <input type="text" name="location" id="location" 
                                    class="form-control @error('location') is-invalid @enderror" 
                                    value="{{ old('location') }}"
                                    placeholder="Contoh: Pelayangan, Jambi">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="rating">
                                    <i class="fas fa-star me-1"></i>
                                    Rating
                                </label>
                                <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" required>
                                    <option value="">Pilih Rating</option>
                                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 - Sangat Puas</option>
                                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 - Puas</option>
                                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 - Cukup</option>
                                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 - Kurang Puas</option>
                                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 - Tidak Puas</option>
                                </select>
                                <div class="rating-preview" id="ratingPreview" style="display: none;">
                                    <div class="rating-stars" id="ratingStars"></div>
                                    <span class="rating-text" id="ratingText"></span>
                                </div>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">
                                    <i class="fas fa-edit me-1"></i>
                                    Isi Testimoni
                                </label>
                                <textarea name="content" id="content" rows="5" 
                                    class="form-control @error('content') is-invalid @enderror" 
                                    placeholder="Ceritakan pengalaman Anda berbelanja di Mizyan Store..."
                                    required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo">
                                    <i class="fas fa-camera me-1"></i>
                                    Foto (Opsional)
                                </label>
                                <input type="file" name="photo" id="photo" 
                                    class="form-control-file @error('photo') is-invalid @enderror"
                                    accept="image/*">
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Ukuran maksimal 2MB. Format: JPEG, PNG, JPG, GIF.
                                </small>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn-mizyan-primary">
                                    <i class="fas fa-paper-plane me-1"></i> Kirim Testimoni
                                </button>
                                <a href="{{ route('testimonials.index') }}" class="btn-mizyan-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingSelect = document.getElementById('rating');
        const ratingPreview = document.getElementById('ratingPreview');
        const ratingStars = document.getElementById('ratingStars');
        const ratingText = document.getElementById('ratingText');
        
        const ratingTexts = {
            '5': 'Sangat Puas',
            '4': 'Puas', 
            '3': 'Cukup',
            '2': 'Kurang Puas',
            '1': 'Tidak Puas'
        };
        
        ratingSelect.addEventListener('change', function() {
            const rating = parseInt(this.value);
            
            if (rating > 0) {
                ratingPreview.style.display = 'block';
                
                // Generate stars
                let starsHtml = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        starsHtml += '<i class="fas fa-star star"></i>';
                    } else {
                        starsHtml += '<i class="far fa-star star empty"></i>';
                    }
                }
                
                ratingStars.innerHTML = starsHtml;
                ratingText.textContent = ratingTexts[rating.toString()];
            } else {
                ratingPreview.style.display = 'none';
            }
        });
        
        // File input enhancement
        const fileInput = document.getElementById('photo');
        const fileLabel = document.querySelector('label[for="photo"]');
        
        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                fileLabel.innerHTML = '<i class="fas fa-check me-1"></i>File dipilih: ' + fileName;
                fileLabel.style.color = 'var(--text-highlight)';
            }
        });
        
        // Form validation enhancement
        const form = document.getElementById('testimonialForm');
        form.addEventListener('submit', function(e) {
            const rating = document.getElementById('rating').value;
            const content = document.getElementById('content').value.trim();
            
            if (!rating || !content) {
                e.preventDefault();
                alert('Mohon lengkapi rating dan isi testimoni!');
                return false;
            }
        });
    });
</script>
@endsection