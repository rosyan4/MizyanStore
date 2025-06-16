@extends('layouts.app')

@section('title', 'Daftar Produk')

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
    .hero-products {
        background-color: var(--secondary-color);
        padding: 100px 0 80px 0;
        color: var(--bg-white);
        position: relative;
        overflow: hidden;
    }

    .hero-products::before {
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

    .badge-mizyan {
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

    /* Products Main Section */
    .products-main-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    /* Filter Section */
    .filter-section {
        background-color: var(--bg-white);
        padding: 30px;
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        margin-bottom: 40px;
    }

    .filter-section h3 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 20px;
    }

    .form-control, .form-select {
        border: 2px solid var(--border-light);
        border-radius: 15px;
        padding: 12px 16px;
        font-size: 0.95rem;
        background-color: var(--bg-light);
        color: var(--text-dark);
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--text-highlight);
        box-shadow: 0 0 0 0.2rem rgba(168, 113, 58, 0.25);
        background-color: var(--bg-white);
    }

    .input-group {
        gap: 10px;
    }

    .input-group .form-control,
    .input-group .form-select {
        flex: 1;
    }

    /* Product Cards - Fixed Height Structure */
    .product-card {
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-heavy);
        border-color: var(--border-primary);
    }

    .product-card .card-img-top {
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .product-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .product-card .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 15px;
        line-height: 1.4;
        min-height: 50px;
        display: flex;
        align-items: center;
    }

    .product-card .card-title a {
        color: var(--text-dark);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .product-card .card-title a:hover {
        color: var(--text-highlight);
    }

    .product-meta {
        margin-bottom: 15px;
    }

    .product-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--price-color);
        margin-bottom: 8px;
    }

    .product-category {
        background-color: var(--accent-color);
        color: var(--text-secondary);
        padding: 6px 12px;
        border-radius: 25px;
        font-size: 0.8rem;
        font-weight: 500;
        border: 1px solid var(--border-light);
        display: inline-block;
    }

    .product-description {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 0;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Changed from 3 to 2 */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 3em; /* Changed from 4.5em to 3em (2 lines * 1.5 line-height) */
        max-height: 3em; /* Changed from 4.5em to 3em */
    }

    .product-card .card-footer {
        background-color: var(--bg-light);
        border-top: 1px solid var(--border-light);
        padding: 15px 20px;
        margin-top: auto;
        flex-shrink: 0;
    }

    .btn-detail {
        background-color: var(--secondary-color);
        border: none;
        color: var(--bg-white);
        padding: 12px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        width: 100%;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-detail:hover {
        background-color: var(--text-highlight);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
        text-decoration: none;
    }

    /* Empty State */
    .empty-state {
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        border-radius: 20px;
        padding: 60px 40px;
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    .empty-state h4 {
        color: var(--text-secondary);
        font-weight: 600;
        margin-bottom: 15px;
    }

    /* Pagination Custom */
    .pagination {
        justify-content: center;
        margin-top: 40px;
    }

    .pagination .page-link {
        color: var(--text-secondary);
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        padding: 12px 16px;
        margin: 0 4px;
        border-radius: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        color: var(--bg-white);
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        transform: translateY(-2px);
    }

    .pagination .page-item.active .page-link {
        color: var(--bg-white);
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    /* Stats Section */
    .stats-section {
        background-color: var(--bg-white);
        padding: 25px;
        border-radius: 15px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        margin-bottom: 30px;
    }

    .stats-section h6 {
        color: var(--text-secondary);
        font-weight: 600;
        margin-bottom: 5px;
    }

    .stats-section .stats-number {
        color: var(--secondary-color);
        font-size: 1.5rem;
        font-weight: 700;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-products {
            padding: 80px 0 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
        }

        .products-main-section {
            padding: 60px 0;
        }

        .filter-section {
            padding: 25px;
        }

        .input-group {
            flex-direction: column;
        }

        .product-card .card-img-top {
            height: 140px;
        }

        .product-card .card-title {
            min-height: 45px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-products {
            padding: 60px 0 50px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .products-main-section {
            padding: 50px 0;
        }

        .filter-section {
            padding: 20px;
        }

        .product-card .card-body,
        .product-card .card-footer {
            padding: 20px;
        }

        .product-card .card-img-top {
            height: 160px;
        }

        .product-card .card-title {
            min-height: 40px;
        }

        .empty-state {
            padding: 40px 25px;
        }

        .empty-state i {
            font-size: 3rem;
        }
    }

    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.8rem;
        }

        .filter-section {
            padding: 15px;
        }

        .product-card .card-body,
        .product-card .card-footer {
            padding: 15px;
        }

        .product-card .card-img-top {
            height: 180px;
        }

        .product-card .card-title {
            min-height: 35px;
        }

        .product-price {
            font-size: 1.1rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-products">
    <div class="container">
        <div class="hero-content">
            <span class="badge-mizyan">
                <i class="fas fa-shopping-bag me-1"></i>
                Koleksi Terlengkap
            </span>
            <h2 class="section-title">Produk Mizyan Store</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Temukan produk fashion muslimah berkualitas tinggi dengan desain modern dan syar'i</p>
        </div>
    </div>
</section>

<section class="products-main-section">
    <div class="container">
        <!-- Filter Section -->
        <div class="filter-section">
            <h3>
                <i class="fas fa-filter me-2"></i>
                Filter & Pencarian Produk
            </h3>
            <form action="{{ route('products.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-muted small mb-2">Cari Produk</label>
                        <input type="text" class="form-control" name="search" 
                               placeholder="Masukkan nama produk..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-muted small mb-2">Kategori</label>
                        <select class="form-select" name="category" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-muted small mb-2">Urutkan</label>
                        <select class="form-select" name="sort" onchange="this.form.submit()">
                            <option value="">Default</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Produk Terbaru</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Paling Populer</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end">
                        <button type="submit" class="btn btn-detail" style="width: auto; padding: 8px 20px;">
                            <i class="fas fa-search me-1"></i>
                            Cari Produk
                        </button>
                        @if(request()->hasAny(['search', 'category', 'sort']))
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary ms-2" style="padding: 8px 20px; border-radius: 15px;">
                                <i class="fas fa-times me-1"></i>
                                Reset Filter
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="row">
            @forelse($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $product->name }}"
                                 loading="lazy">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <div class="product-meta">
                                <div class="product-price">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                <span class="product-category">
                                    {{ $product->category->name }}
                                </span>
                            </div>
                            <p class="product-description">
                                {{ $product->description ? Str::limit($product->description, 120) : 'Deskripsi produk tidak tersedia.' }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('products.show', $product->slug) }}" class="btn-detail">
                                Lihat Detail Produk
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-search"></i>
                        <h4>Produk Tidak Ditemukan</h4>
                        <p>Maaf, tidak ada produk yang sesuai dengan kriteria pencarian Anda.</p>
                        <p class="mb-0">Coba gunakan kata kunci yang berbeda atau reset filter pencarian.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $products->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</section>

<script>
    // Enhanced interactions for product cards
    document.addEventListener('DOMContentLoaded', function() {
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            // Enhanced hover effect
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = 'var(--shadow-heavy)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'var(--shadow-light)';
            });
        });

        // Auto-submit form on filter change with slight delay
        const filterSelects = document.querySelectorAll('select[name="category"], select[name="sort"]');
        filterSelects.forEach(select => {
            select.addEventListener('change', function() {
                // Add small delay to improve UX
                setTimeout(() => {
                    this.form.submit();
                }, 300);
            });
        });

        // Search form enhancement
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.form.submit();
                }
            });
        }
    });
</script>
@endsection