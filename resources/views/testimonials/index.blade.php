@extends('layouts.app')

@section('title', 'Testimoni - Mizyan Store')

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
            radial-gradient(circle at 20% 30%, rgba(248, 229, 187, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(242, 232, 213, 0.05) 0%, transparent 50%);
        z-index: 1;
    }

    .hero-content {
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        background-color: rgba(248, 229, 187, 0.15);
        color: var(--bg-white);
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-bottom: 20px;
        border: 1px solid rgba(248, 229, 187, 0.2);
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

    /* Testimonial Section */
    .testimonial-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .testimonial-header {
        background-color: var(--bg-white);
        padding: 30px;
        border-radius: 20px 20px 0 0;
        border: 1px solid var(--border-light);
        border-bottom: none;
        margin-bottom: 0;
    }

    .testimonial-header h4 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 0;
    }

    /* Testimonial Cards */
    .testimonial-card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-medium);
    }

    .testimonial-card .card-img-top {
        height: 200px;
        object-fit: cover;
        border-bottom: 3px solid var(--border-primary);
    }

    /* Placeholder Photo Styles */
    .photo-placeholder {
        height: 200px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        border-bottom: 3px solid var(--border-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .photo-placeholder::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    }

    .photo-placeholder .placeholder-content {
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .photo-placeholder .placeholder-icon {
        width: 80px;
        height: 80px;
        background-color: var(--secondary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px auto;
        box-shadow: 0 4px 15px rgba(113, 54, 0, 0.2);
    }

    .photo-placeholder .placeholder-icon i {
        color: var(--bg-white);
        font-size: 2rem;
    }

    .photo-placeholder .placeholder-text {
        color: var(--secondary-color);
        font-size: 0.9rem;
        font-weight: 600;
        opacity: 0.8;
        letter-spacing: 0.3px;
    }

    .testimonial-card .card-body {
        padding: 25px;
        position: relative;
    }

    .testimonial-card .card-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 0;
    }

    .testimonial-card .rating-stars {
        display: flex;
        gap: 2px;
    }

    .testimonial-card .rating-stars i {
        color: #FFD700;
        font-size: 1rem;
    }

    .testimonial-card .rating-stars .fa-star-empty {
        color: var(--border-light);
    }

    .location-info {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .location-info i {
        color: var(--text-highlight);
    }

    .testimonial-card .card-text {
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 0;
        text-align: justify;
    }

    .testimonial-card .card-footer {
        background-color: var(--bg-light);
        border-top: 1px solid var(--border-light);
        padding: 15px 25px;
        margin-top: auto;
    }

    .testimonial-card .card-footer small {
        color: var(--text-light);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Buttons */
    .btn-mizyan-primary {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-mizyan-primary:hover {
        background-color: var(--text-highlight);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
        text-decoration: none;
    }

    /* Alerts */
    .alert {
        border-radius: 15px;
        border: none;
        padding: 25px;
        margin-bottom: 30px;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-info {
        background-color: rgba(248, 229, 187, 0.2);
        color: var(--text-secondary);
        border-left: 4px solid var(--text-highlight);
        text-align: center;
    }

    .alert-info i {
        color: var(--text-highlight);
        margin-bottom: 10px;
    }

    /* Loading Animation */
    .loading-card {
        opacity: 0;
        animation: fadeInUp 0.6s ease forwards;
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

    /* Cards container */
    .testimonial-cards-container {
        background-color: var(--bg-white);
        border-radius: 0 0 20px 20px;
        border: 1px solid var(--border-light);
        border-top: none;
        padding: 40px;
        margin-bottom: 40px;
    }

    /* Pagination */
    .pagination {
        justify-content: center;
    }

    .page-link {
        color: var(--text-secondary);
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        padding: 8px 16px;
        margin: 0 4px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .page-link:hover {
        color: var(--bg-white);
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        transform: translateY(-1px);
    }

    .page-item.active .page-link {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--bg-white);
    }

    .page-item.disabled .page-link {
        color: var(--text-light);
        background-color: var(--bg-light);
        border-color: var(--border-light);
    }

    /* Placeholder Animation */
    .photo-placeholder .placeholder-icon {
        animation: placeholderPulse 2s ease-in-out infinite;
    }

    @keyframes placeholderPulse {
        0%, 100% { 
            transform: scale(1);
            box-shadow: 0 4px 15px rgba(113, 54, 0, 0.2);
        }
        50% { 
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(113, 54, 0, 0.3);
        }
    }

    .testimonial-card:hover .photo-placeholder .placeholder-icon {
        animation-duration: 1s;
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

        .testimonial-section {
            padding: 60px 0;
        }

        .testimonial-header {
            padding: 25px;
        }

        .testimonial-cards-container {
            padding: 30px;
        }

        .testimonial-header h4 {
            font-size: 1.5rem;
        }

        .testimonial-header .d-flex {
            flex-direction: column;
            gap: 15px;
            text-align: center;
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

        .testimonial-section {
            padding: 50px 0;
        }

        .testimonial-header,
        .testimonial-cards-container {
            padding: 20px;
        }

        .testimonial-card .card-body {
            padding: 20px;
        }

        .testimonial-card .card-footer {
            padding: 12px 20px;
        }

        .testimonial-card .card-img-top,
        .photo-placeholder {
            height: 180px;
        }

        .photo-placeholder .placeholder-icon {
            width: 60px;
            height: 60px;
        }

        .photo-placeholder .placeholder-icon i {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 575.98px) {
        .hero-title {
            font-size: 1.8rem;
        }

        .testimonial-header h4 {
            font-size: 1.3rem;
        }

        .testimonial-header,
        .testimonial-cards-container {
            padding: 15px;
        }

        .testimonial-card .card-body {
            padding: 15px;
        }

        .testimonial-card .card-footer {
            padding: 10px 15px;
        }

        .testimonial-card .card-img-top,
        .photo-placeholder {
            height: 160px;
        }

        .photo-placeholder .placeholder-icon {
            width: 50px;
            height: 50px;
        }

        .photo-placeholder .placeholder-icon i {
            font-size: 1.2rem;
        }

        .btn-mizyan-primary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-testimonial">
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-comments me-1"></i>
                Testimoni Pelanggan
            </span>
            <h1 class="hero-title">Kata Mereka Tentang Kami</h1>
            <div class="title-underline"></div>
            <p class="hero-subtitle">Dengarkan pengalaman nyata dari pelanggan setia Mizyan Store yang telah merasakan kualitas produk kami</p>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="testimonial-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-star me-2"></i>
                            Testimoni Pelanggan
                        </h4>
                        <a href="{{ route('testimonials.create') }}" class="btn-mizyan-primary">
                            <i class="fas fa-plus"></i> Tambah Testimoni
                        </a>
                    </div>
                </div>

                <div class="testimonial-cards-container">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row g-4">
                        @forelse($testimonials as $index => $testimonial)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="testimonial-card loading-card" style="animation-delay: {{ $index * 0.1 }}s;">
                                @if($testimonial->photo)
                                    <img src="{{ asset('storage/' . $testimonial->photo) }}" class="card-img-top" alt="{{ $testimonial->name }}">
                                @else
                                    <div class="photo-placeholder">
                                        <div class="placeholder-content">
                                            <div class="placeholder-icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="placeholder-text">Pelanggan Setia</div>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="card-content">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h5 class="card-title mb-0">{{ $testimonial->name }}</h5>
                                            <div class="rating-stars">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $testimonial->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="fas fa-star fa-star-empty"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        @if($testimonial->location)
                                        <div class="location-info">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $testimonial->location }}</span>
                                        </div>
                                        @endif
                                        <p class="card-text">{{ Str::limit($testimonial->content, 150) }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">
                                        <i class="far fa-clock"></i> 
                                        <span>{{ $testimonial->created_at->diffForHumans() }}</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle" style="font-size: 2.5rem; display: block;"></i>
                                <h5 class="mt-3 mb-2">Belum Ada Testimoni</h5>
                                <p class="mb-2">Belum ada testimoni yang disetujui untuk ditampilkan.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    @if($testimonials->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        {{ $testimonials->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate testimonial cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all testimonial cards
        const cards = document.querySelectorAll('.testimonial-card');
        cards.forEach(card => {
            observer.observe(card);
        });

        // Add hover effects for cards
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-5px)';
            });
        });

        // Auto-dismiss success alerts
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.opacity = '0';
                setTimeout(() => {
                    successAlert.remove();
                }, 300);
            }, 5000);
        }

        // Enhanced rating stars animation
        const ratingStars = document.querySelectorAll('.rating-stars');
        ratingStars.forEach(stars => {
            const starElements = stars.querySelectorAll('i');
            starElements.forEach((star, index) => {
                star.style.animationDelay = `${index * 0.1}s`;
                star.classList.add('star-animate');
            });
        });

        // Placeholder icon hover effect
        const placeholderIcons = document.querySelectorAll('.placeholder-icon');
        placeholderIcons.forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1.05)';
            });
        });
    });

    // Add CSS for star animation
    const style = document.createElement('style');
    style.textContent = `
        .star-animate {
            animation: starGlow 2s ease-in-out infinite;
        }
        
        @keyframes starGlow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .testimonial-card:hover .star-animate {
            animation-duration: 0.5s;
        }
    `;
    document.head.appendChild(style);
</script>

@endsection