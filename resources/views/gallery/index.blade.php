@extends('layouts.app')

@section('title', 'Galeri - Mizyan Store')

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
    .hero-gallery {
        background-color: var(--secondary-color);
        padding: 100px 0 80px 0;
        color: var(--bg-white);
        position: relative;
        overflow: hidden;
    }

    .hero-gallery::before {
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

    /* Main Gallery Section */
    .gallery-main-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    /* Filter Section - Dropdown Style - DIPERBAIKI */
    .filter-section {
        margin-bottom: 50px;
        background-color: var(--bg-white);
        padding: 30px;
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
    }

    .filter-dropdown {
        max-width: 300px;
        margin: 0 auto;
    }

    .filter-dropdown .dropdown-toggle {
        background-color: var(--bg-white);
        border: 2px solid var(--border-primary);
        color: var(--text-secondary);
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s ease;
    }

    .filter-dropdown .dropdown-toggle:hover,
    .filter-dropdown .dropdown-toggle:focus {
        background-color: var(--primary-color);
        border-color: var(--text-highlight);
        color: var(--text-dark);
        box-shadow: none;
    }

    .filter-dropdown .dropdown-toggle::after {
        margin-left: auto;
    }

    .filter-dropdown .dropdown-menu {
        border: 1px solid var(--border-light);
        border-radius: 15px;
        box-shadow: var(--shadow-medium);
        padding: 5px 0;
        margin-top: 5px;
        width: 100%;
        max-height: 280px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: var(--border-primary) transparent;
        background-color: var(--bg-white);
    }

    /* Custom scrollbar for webkit browsers */
    .filter-dropdown .dropdown-menu::-webkit-scrollbar {
        width: 6px;
    }

    .filter-dropdown .dropdown-menu::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    .filter-dropdown .dropdown-menu::-webkit-scrollbar-thumb {
        background-color: var(--border-primary);
        border-radius: 10px;
        border: 1px solid transparent;
    }

    .filter-dropdown .dropdown-menu::-webkit-scrollbar-thumb:hover {
        background-color: var(--text-highlight);
    }

    /* DROPDOWN ITEM - DIPERBAIKI UNTUK KONTRAS YANG LEBIH BAIK */
    .filter-dropdown .dropdown-item {
        padding: 12px 20px;
        color: var(--text-dark) !important;  /* Warna teks lebih gelap */
        font-weight: 500;
        transition: all 0.2s ease;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        background-color: transparent;
        border: none;
        text-decoration: none;
    }

    .filter-dropdown .dropdown-item:hover,
    .filter-dropdown .dropdown-item:focus {
        background-color: var(--accent-color) !important;  /* Background cream saat hover */
        color: var(--secondary-color) !important;  /* Teks coklat gelap saat hover */
        text-decoration: none;
    }

    .filter-dropdown .dropdown-item.active {
        background-color: var(--secondary-color) !important;
        color: var(--bg-white) !important;
        font-weight: 600;
    }

    .filter-dropdown .dropdown-item.active:hover {
        background-color: var(--text-highlight) !important;
        color: var(--bg-white) !important;
    }

    .filter-dropdown .dropdown-item i {
        margin-right: 8px;
        width: 16px;
        text-align: center;
        flex-shrink: 0;
    }

    /* Scroll indicator */
    .dropdown-scroll-indicator {
        position: sticky;
        bottom: 0;
        background: linear-gradient(transparent, var(--bg-white));
        height: 15px;
        pointer-events: none;
        z-index: 1;
    }

    /* Gallery Cards */
    .gallery-card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .gallery-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }

    .gallery-card .card-img-top {
        height: 250px;
        object-fit: cover;
        transition: none;
    }

    .gallery-card .card-body {
        padding: 25px;
    }

    .gallery-card .card-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .gallery-card .badge {
        background-color: var(--primary-color);
        color: var(--text-secondary);
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        border: 1px solid var(--border-light);
    }

    .gallery-card .card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 0;
        line-height: 1.5;
    }

    /* Modal Sederhana - Hanya Gambar + Close Button */
    .modal-dialog {
        max-width: 95vw !important;
        max-height: 95vh !important;
        margin: 2.5vh auto;
    }

    .simple-modal {
        border: none !important;
        border-radius: 15px !important;
        background: rgba(0, 0, 0, 0.95) !important;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5) !important;
        overflow: hidden;
        position: relative;
        height: 90vh;
        max-height: 90vh;
    }

    /* Header sederhana dengan close button */
    .modal-header-simple {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 1000;
        background: none;
        border: none;
        padding: 0;
    }

    .btn-close-simple {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        color: var(--text-dark);
        font-size: 18px;
    }

    .btn-close-simple:hover {
        background: rgba(255, 255, 255, 1);
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    /* Body hanya untuk gambar */
    .modal-body-simple {
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
    }

    .modal-body-simple img {
        max-width: 95%;
        max-height: 95%;
        width: auto;
        height: auto;
        object-fit: contain;
        border-radius: 10px;
        cursor: zoom-in;
        transition: transform 0.2s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .modal-body-simple img:hover {
        transform: scale(1.01);
    }

    .modal-body-simple img.zoomed {
        cursor: zoom-out;
        transform: scale(1.3);
    }

    /* Backdrop styling */
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.8) !important;
    }

    /* Alert Styling */
    .alert-info {
        background-color: var(--bg-white);
        border: 1px solid var(--border-primary);
        color: var(--text-secondary);
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        font-weight: 500;
    }

    /* Pagination Styling */
    .pagination .page-link {
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        color: var(--text-secondary);
        padding: 12px 18px;
        margin: 0 3px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .pagination .page-link:hover {
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        color: var(--bg-white);
    }

    .pagination .page-item.active .page-link {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--bg-white);
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-gallery {
            padding: 80px 0 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
        }

        .gallery-main-section {
            padding: 60px 0;
        }

        .filter-section {
            padding: 25px;
            margin-bottom: 40px;
        }

        .filter-dropdown {
            max-width: 280px;
        }

        .filter-dropdown .dropdown-menu {
            max-height: 250px;
        }

        .gallery-card .card-img-top {
            height: 220px;
        }

        .gallery-card .card-body {
            padding: 20px;
        }

        .modal-dialog {
            max-width: 98vw !important;
            margin: 1vh auto;
        }

        .simple-modal {
            height: 98vh;
            max-height: 98vh;
        }
    }

    @media (max-width: 767.98px) {
        .hero-gallery {
            padding: 60px 0 50px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .gallery-main-section {
            padding: 50px 0;
        }

        .filter-section {
            padding: 20px;
            margin-bottom: 30px;
        }

        .filter-dropdown {
            max-width: 100%;
        }

        .filter-dropdown .dropdown-menu {
            max-height: 220px;
        }

        .gallery-card .card-img-top {
            height: 200px;
        }

        .gallery-card .card-body {
            padding: 18px;
        }

        .modal-dialog {
            max-width: 100vw !important;
            margin: 0;
        }

        .simple-modal {
            height: 100vh;
            max-height: 100vh;
            border-radius: 0 !important;
        }

        .modal-header-simple {
            top: 10px;
            right: 10px;
        }

        .btn-close-simple {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
    }

    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.8rem;
        }

        .filter-section {
            padding: 15px;
        }

        .gallery-card .card-img-top {
            height: 180px;
        }

        .gallery-card .card-body {
            padding: 15px;
        }

        .gallery-card .card-title {
            font-size: 1rem;
        }

        .btn-close-simple {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-gallery">
    <div class="container">
        <div class="hero-content">
            <span class="badge-mizyan">
                <i class="fas fa-images me-1"></i>
                Koleksi Terbaik Kami
            </span>
            <h1 class="section-title">Galeri Kami</h1>
            <div class="title-underline"></div>
            <p class="section-subtitle">Lihat koleksi produk dan hasil karya kami yang menawan</p>
        </div>
    </div>
</section>

<section class="gallery-main-section">
    <div class="container py-5">
        <!-- Filter Kategori - Dropdown -->
        <div class="filter-section">
            <div class="filter-dropdown">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            <i class="fas fa-filter me-2"></i>
                            @if(request()->category)
                                @php
                                    $selectedCategory = $categories->where('slug', request()->category)->first();
                                @endphp
                                {{ $selectedCategory ? $selectedCategory->name : 'Semua Kategori' }}
                            @else
                                Semua Kategori
                            @endif
                        </span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ !request()->category ? 'active' : '' }}" 
                               href="{{ route('gallery.index') }}">
                                <i class="fas fa-th-large"></i>
                                Semua Kategori
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item {{ request()->category == $category->slug ? 'active' : '' }}" 
                                   href="{{ route('gallery.index', ['category' => $category->slug]) }}" 
                                   title="{{ $category->name }}">
                                    <i class="fas fa-tag"></i>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        @if($categories->count() > 8)
                            <li><div class="dropdown-scroll-indicator"></div></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($galleryItems as $item)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card gallery-card h-100">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $item->id }}">
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                 class="card-img-top img-fluid" 
                                 alt="{{ $item->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            @if($item->category)
                                <span class="badge">
                                    <i class="fas fa-tag me-1"></i>
                                    {{ $item->category->name }}
                                </span>
                            @endif
                            @if($item->description)
                                <div class="card-text mt-2 text-muted small">
                                    <i class="fas fa-info-circle me-1"></i>
                                    {!! nl2br(e(Str::limit($item->description, 300))) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal Sederhana - Hanya Gambar + Close Button -->
                <div class="modal fade" id="galleryModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content simple-modal">
                            <!-- Header hanya dengan close button -->
                            <div class="modal-header-simple">
                                <button type="button" class="btn-close-simple" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <!-- Body hanya gambar -->
                            <div class="modal-body-simple">
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     class="img-fluid" 
                                     alt="{{ $item->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Tidak ada item galeri yang tersedia untuk saat ini.
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galleryItems->hasPages())
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $galleryItems->links() }}
                </div>
            </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simplified hover effect for gallery cards
    const galleryCards = document.querySelectorAll('.gallery-card');
    
    galleryCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = 'var(--shadow-medium)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow-light)';
        });
    });

    // Simplified modal functionality
    const modals = document.querySelectorAll('.modal');
    
    modals.forEach(modal => {
        // Add zoom functionality on image click
        const modalImg = modal.querySelector('.modal-body-simple img');
        if (modalImg) {
            let isZoomed = false;
            
            modalImg.addEventListener('click', function() {
                if (!isZoomed) {
                    this.classList.add('zoomed');
                    this.style.cursor = 'zoom-out';
                    isZoomed = true;
                } else {
                    this.classList.remove('zoomed');
                    this.style.cursor = 'zoom-in';
                    isZoomed = false;
                }
            });
            
            // Reset zoom when modal closes
            modal.addEventListener('hide.bs.modal', function() {
                modalImg.classList.remove('zoomed');
                modalImg.style.cursor = 'zoom-in';
                isZoomed = false;
            });
        }
    });

    // Keyboard navigation for modals
    document.addEventListener('keydown', function(e) {
        const openModal = document.querySelector('.modal.show');
        if (openModal) {
            // ESC key to close modal
            if (e.key === 'Escape') {
                const closeBtn = openModal.querySelector('.btn-close-simple');
                if (closeBtn) closeBtn.click();
            }
            
            // Space or Enter to zoom image
            if (e.key === ' ' || e.key === 'Enter') {
                e.preventDefault();
                const modalImg = openModal.querySelector('.modal-body-simple img');
                if (modalImg) modalImg.click();
            }
        }
    });

    // Smooth scrolling to pagination (simplified)
    const paginationLinks = document.querySelectorAll('.pagination a');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const gallerySection = document.querySelector('.gallery-main-section');
            if (gallerySection) {
                setTimeout(() => {
                    gallerySection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            }
        });
    });

    // Close modal when clicking outside image
    document.addEventListener('click', function(e) {
        const openModal = document.querySelector('.modal.show');
        if (openModal && e.target.classList.contains('modal-body-simple')) {
            const closeBtn = openModal.querySelector('.btn-close-simple');
            if (closeBtn) closeBtn.click();
        }
    });

    // Touch support for mobile zoom (simplified)
    let touchStartDistance = 0;
    let initialScale = 1;

    document.addEventListener('touchstart', function(e) {
        if (e.touches.length === 2) {
            const modalImg = document.querySelector('.modal.show .modal-body-simple img');
            if (modalImg) {
                touchStartDistance = Math.hypot(
                    e.touches[0].pageX - e.touches[1].pageX,
                    e.touches[0].pageY - e.touches[1].pageY
                );
                
                initialScale = modalImg.classList.contains('zoomed') ? 1.3 : 1;
            }
        }
    }, { passive: true });

    document.addEventListener('touchmove', function(e) {
        if (e.touches.length === 2) {
            e.preventDefault();
            
            const modalImg = document.querySelector('.modal.show .modal-body-simple img');
            if (modalImg && touchStartDistance > 0) {
                const currentDistance = Math.hypot(
                    e.touches[0].pageX - e.touches[1].pageX,
                    e.touches[0].pageY - e.touches[1].pageY
                );
                
                const scale = initialScale * (currentDistance / touchStartDistance);
                const clampedScale = Math.min(Math.max(scale, 0.8), 2);
                
                if (clampedScale > 1.1) {
                    modalImg.classList.add('zoomed');
                    modalImg.style.transform = `scale(${clampedScale})`;
                } else {
                    modalImg.classList.remove('zoomed');
                    modalImg.style.transform = 'scale(1)';
                }
            }
        }
    }, { passive: false });

    document.addEventListener('touchend', function(e) {
        touchStartDistance = 0;
    }, { passive: true });
});
</script>
@endsection