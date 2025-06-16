@extends('layouts.app')

@section('title', 'Home')

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

    /* Custom Buttons - Konsisten */
    .btn-primary, .btn-mizyan-primary {
        background-color: var(--primary-color) !important;
        border: 2px solid var(--primary-color) !important;
        color: var(--secondary-color) !important;
        padding: 15px 30px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-light);
        min-height: 54px;
        white-space: nowrap;
    }
    
    .btn-primary:hover, .btn-mizyan-primary:hover {
        background-color: var(--text-highlight) !important;
        border-color: var(--text-highlight) !important;
        color: var(--bg-white) !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        text-decoration: none;
    }

    .btn-mizyan-outline {
        background: transparent !important;
        border: 2px solid var(--primary-color) !important;
        color: var(--secondary-color) !important;
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 160px;
        min-height: 48px;
        text-align: center;
        line-height: 1.2;
        box-shadow: var(--shadow-light);
        white-space: nowrap;
    }

    .btn-mizyan-outline:hover {
        background-color: var(--primary-color) !important;
        color: var(--secondary-color) !important;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    /* Section Styling - Konsisten untuk semua section */
    .product-section {
        padding: 80px 0;
        position: relative;
    }

    .new-products-section {
        background-color: var(--bg-white);
        border-top: 1px solid var(--border-light);
        border-bottom: 1px solid var(--border-light);
    }

    .featured-products-section {
        background-color: var(--bg-light);
    }

    /* Badge styling - Konsisten */
    .badge-mizyan {
        background-color: var(--text-highlight) !important;
        color: var(--bg-white) !important;
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-bottom: 20px;
        border: 1px solid rgba(168, 113, 58, 0.3);
        box-shadow: var(--shadow-light);
    }

    /* Section Title - Konsisten */
    .section-title {
        font-size: 3rem;
        font-weight: 700;
        color: var(--secondary-color) !important;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.025em;
    }

    .title-underline {
        width: 80px;
        height: 4px;
        background-color: var(--price-color) !important;
        border-radius: 2px;
        margin: 0 auto 30px auto;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: var(--text-muted) !important;
        max-width: 600px;
        margin: 0 auto 60px auto;
        line-height: 1.6;
        font-weight: 400;
        opacity: 0.9;
    }

    /* Product Cards - Konsisten dan responsif */
    .product-card {
        background-color: var(--bg-white);
        border-radius: 20px;
        padding: 0;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-light);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        min-height: 520px;
    }

    .product-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--price-color), var(--text-highlight));
        z-index: 1;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-heavy);
    }

    .product-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        flex-shrink: 0;
    }

    .product-image {
        position: relative;
        overflow: hidden;
        height: 250px;
        background-color: var(--bg-light);
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .product-card:hover .product-image img {
        transform: scale(1.1);
    }
    
    /* Overlay styling - Konsisten */
    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(74, 44, 20, 0.9), rgba(113, 54, 0, 0.85));
        opacity: 0;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: var(--bg-white);
        backdrop-filter: blur(2px);
    }
    
    .product-card:hover .product-overlay {
        opacity: 1;
    }

    .overlay-content {
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.4s ease;
    }

    .product-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-icon {
        font-size: 2.5rem;
        margin-bottom: 12px;
        opacity: 0.9;
    }

    .overlay-text {
        font-weight: 600;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }

    /* Product Badge - Konsisten */
    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--text-highlight);
        color: var(--bg-white);
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 3;
        box-shadow: var(--shadow-light);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .product-badge.new-badge {
        background-color: var(--text-highlight);
    }

    /* Card Body - Konsisten */
    .card-body {
        padding: 30px 25px 0 25px;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 15px;
        line-height: 1.4;
        min-height: 3.5rem;
        max-height: 3.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
        word-wrap: break-word;
        hyphens: auto;
    }

    .product-category {
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin-bottom: 15px;
        font-weight: 500;
        background-color: rgba(248, 229, 187, 0.3);
        padding: 8px 16px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(248, 229, 187, 0.5);
        width: fit-content;
        margin: 0 auto 15px auto;
        gap: 4px;
        min-height: 34px;
    }

    .product-price {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--price-color);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: auto;
        min-height: 2rem;
    }

    /* Card Footer - Konsisten */
    .card-footer {
        padding: 0 25px 30px 25px;
        background: transparent;
        border: none;
        margin-top: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80px;
        flex-shrink: 0;
    }

    /* Empty State - Konsisten */
    .empty-state {
        padding: 80px 30px;
        text-align: center;
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        margin: 20px 0;
    }

    .empty-icon {
        font-size: 4rem;
        color: var(--text-light);
        margin-bottom: 20px;
        opacity: 0.7;
    }

    .empty-state p {
        font-size: 1.2rem;
        color: var(--text-muted);
        margin: 0;
        font-weight: 500;
    }

    /* Grid improvements - Konsisten spacing */
    .row.g-4 {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 2rem;
    }

    /* CTA Section - Konsisten */
    .cta-section {
        text-align: center;
        margin-top: 60px;
        padding-top: 40px;
        border-top: 1px solid var(--border-light);
    }
    
    /* Responsive Design - Konsisten */
    @media (max-width: 1199.98px) {
        .product-section {
            padding: 70px 0;
        }
        
        .section-title {
            font-size: 2.8rem;
        }
    }

    @media (max-width: 991.98px) {
        .product-section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            margin-bottom: 50px;
        }

        .product-image {
            height: 220px;
        }

        .product-card {
            min-height: 490px;
        }

        .btn-mizyan-outline {
            max-width: 150px;
            padding: 12px 18px;
            font-size: 0.85rem;
        }

        .card-body,
        .card-footer {
            padding-left: 20px;
            padding-right: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            min-height: 3.2rem;
            max-height: 3.2rem;
        }
    }

    @media (max-width: 767.98px) {
        .product-section {
            padding: 50px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
            margin-bottom: 40px;
        }

        .card-body {
            padding: 25px 20px 0 20px;
        }

        .card-footer {
            padding: 0 20px 25px 20px;
        }

        .product-image {
            height: 200px;
        }

        .product-card {
            min-height: 460px;
            margin-bottom: 20px;
        }

        .btn-mizyan-outline {
            max-width: 140px;
            padding: 10px 16px;
            font-size: 0.8rem;
        }

        .btn-mizyan-primary {
            width: 100%;
            max-width: 280px;
            text-align: center;
        }

        .card-title {
            font-size: 1.1rem;
            min-height: 3rem;
            max-height: 3rem;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 3rem;
        }

        .empty-state p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 575.98px) {
        .product-section {
            padding: 40px 0;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .section-subtitle {
            font-size: 0.95rem;
            margin-bottom: 35px;
        }
        
        .product-image {
            height: 180px;
        }

        .product-card {
            min-height: 440px;
        }

        .card-body {
            padding: 20px 15px 0 15px;
        }

        .card-footer {
            padding: 0 15px 20px 15px;
        }

        .card-title {
            font-size: 1rem;
            min-height: 2.8rem;
            max-height: 2.8rem;
        }

        .product-category {
            font-size: 0.8rem;
            padding: 6px 12px;
        }

        .product-price {
            font-size: 1.2rem;
        }

        .btn-mizyan-primary {
            padding: 12px 24px;
            font-size: 0.9rem;
        }

        .empty-state {
            padding: 50px 15px;
        }

        .empty-icon {
            font-size: 2.5rem;
        }

        .empty-state p {
            font-size: 1rem;
        }
    }

    /* Loading Animation */
    .product-card {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .product-card:nth-child(1) { animation-delay: 0.1s; }
    .product-card:nth-child(2) { animation-delay: 0.2s; }
    .product-card:nth-child(3) { animation-delay: 0.3s; }
    .product-card:nth-child(4) { animation-delay: 0.4s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Hero Section -->
@include('sections.hero')

<!-- Section Produk Terbaru -->
<section class="product-section new-products-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge-mizyan">
                <i class="fas fa-sparkles me-1"></i>
                Produk Terbaru
            </span>
            <h2 class="section-title">Koleksi Terbaru</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Temukan koleksi terbaru kami dengan desain terkini dan kualitas premium</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            @forelse ($newProducts as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <div class="product-image">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('img/product-placeholder.jpg') }}" class="img-fluid" alt="{{ $product->name }}">
                                @endif
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <i class="fas fa-search-plus overlay-icon"></i>
                                        <div class="overlay-text">Lihat Detail</div>
                                    </div>
                                </div>
                            </div>
                            @if($product->isNew())
                                <span class="product-badge new-badge">
                                    <i class="fas fa-star"></i>
                                    Baru
                                </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            @if($product->category)
                                <div class="product-category">
                                    <i class="fas fa-tags"></i>
                                    {{ $product->category->name }}
                                </div>
                            @endif
                            <div class="product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('products.show', $product->slug) }}" class="btn-mizyan-outline">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-box-open empty-icon"></i>
                        <p>Belum ada produk terbaru saat ini</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        <div class="cta-section">
            <a href="{{ route('products.index') }}" class="btn-mizyan-primary">
                <i class="fas fa-th-large me-2"></i>
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="product-section featured-products-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge-mizyan">
                <i class="fas fa-gem me-1"></i>
                Produk Unggulan
            </span>
            <h2 class="section-title">Koleksi Unggulan</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Temukan koleksi pakaian muslim dengan kualitas terbaik dan desain yang elegan</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($featuredProducts as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <div class="product-image">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('img/product-placeholder.jpg') }}" class="img-fluid" alt="{{ $product->name }}">
                                @endif
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <i class="fas fa-search-plus overlay-icon"></i>
                                        <div class="overlay-text">Lihat Detail</div>
                                    </div>
                                </div>
                            </div>
                            @if($product->is_featured)
                                <span class="product-badge">
                                    <i class="fas fa-award"></i>
                                    Unggulan
                                </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            @if($product->category)
                                <div class="product-category">
                                    <i class="fas fa-tags"></i>
                                    {{ $product->category->name }}
                                </div>
                            @endif
                            <div class="product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('products.show', $product->slug) }}" class="btn-mizyan-outline">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-box-open empty-icon"></i>
                        <p>Tidak ada produk unggulan saat ini</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="cta-section">
            <a href="{{ route('products.index') }}" class="btn-mizyan-primary">
                <i class="fas fa-th-large me-2"></i>
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<script>
    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Lazy loading animation observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    });

    document.querySelectorAll('.product-card').forEach(card => {
        observer.observe(card);
    });
</script>
@endsection