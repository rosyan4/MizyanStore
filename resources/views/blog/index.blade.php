@extends('layouts.app')

@section('title', 'Blog')

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
    .hero-blog {
        background-color: var(--secondary-color);
        padding: 100px 0 80px 0;
        color: var(--bg-white);
        position: relative;
        overflow: hidden;
    }

    .hero-blog::before {
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

    .badge-mizyan {
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

    .section-title {
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

    .section-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Main Blog Section */
    .blog-main-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    /* Filter Section */
    .filter-section {
        background-color: var(--bg-white);
        padding: 30px;
        border-radius: 15px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        margin-bottom: 40px;
    }

    .filter-section h3 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    .filter-section .form-select {
        border: 1px solid var(--border-light);
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.95rem;
        color: var(--text-dark);
        background-color: var(--bg-white);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .filter-section .form-select:focus {
        border-color: var(--text-highlight);
        box-shadow: 0 0 0 0.2rem rgba(168, 113, 58, 0.15);
        outline: none;
    }

    /* Blog Cards */
    .card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid var(--border-light);
    }

    .card-body {
        padding: 25px;
    }

    .card-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .card-text {
        color: var(--text-muted) !important;
        margin-bottom: 15px;
        font-size: 0.9rem;
    }

    .card-text.small {
        font-size: 0.85rem !important;
    }

    .btn-primary {
        background-color: var(--secondary-color);
        border: none;
        color: var(--bg-white);
        padding: 12px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary:hover {
        background-color: var(--text-highlight);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--text-highlight);
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: var(--text-muted);
        font-size: 1rem;
        line-height: 1.6;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Pagination Styling */
    .pagination {
        justify-content: center;
    }

    .page-link {
        color: var(--text-dark);
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        padding: 12px 16px;
        margin: 0 3px;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .page-link:hover {
        color: var(--bg-white);
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        transform: translateY(-2px);
        box-shadow: var(--shadow-light);
    }

    .page-item.active .page-link {
        color: var(--bg-white);
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        box-shadow: var(--shadow-light);
    }

    .page-item.disabled .page-link {
        color: var(--text-light);
        background-color: var(--accent-color);
        border-color: var(--border-light);
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-blog {
            padding: 80px 0 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
        }

        .blog-main-section {
            padding: 60px 0;
        }

        .filter-section,
        .card-body {
            padding: 25px;
        }

        .card-img-top {
            height: 180px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-blog {
            padding: 60px 0 50px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .blog-main-section {
            padding: 50px 0;
        }

        .filter-section,
        .card-body {
            padding: 20px;
        }

        .card-img-top {
            height: 160px;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 3rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.8rem;
        }

        .filter-section,
        .card-body {
            padding: 15px;
        }

        .card-img-top {
            height: 140px;
        }

        .empty-state {
            padding: 40px 15px;
        }

        .btn-primary {
            padding: 10px 16px;
            font-size: 0.85rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-blog">
    <div class="container">
        <div class="hero-content">
            <span class="badge-mizyan">
                <i class="fas fa-newspaper me-2"></i>
                Tips & Inspirasi Fashion
            </span>
            <h2 class="section-title">Artikel Terbaru</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Temukan inspirasi fashion muslimah, tips perawatan, dan artikel menarik lainnya</p>
        </div>
    </div>
</section>

<section class="blog-main-section">
    <div class="container py-5">
        {{-- Daftar Post --}}
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-muted small">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ $post->published_at->format('d M Y') }}
                            </p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>Belum Ada Artikel</h3>
                        <p>Belum ada artikel yang dipublikasikan untuk kategori ini.<br>Silakan coba kategori lain atau kembali lagi nanti.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $posts->withQueryString()->links() }}
            </div>
        @endif
    </div>
</section>

<script>
    // Simple hover enhancement for blog cards
    document.addEventListener('DOMContentLoaded', function() {
        const blogCards = document.querySelectorAll('.card');
        
        // Simple hover effect for blog cards
        blogCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>

@endsection