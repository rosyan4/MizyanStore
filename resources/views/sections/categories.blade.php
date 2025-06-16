<section class="categories-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-3 py-2 mb-2 badge-mizyan">
                <i class="fas fa-layer-group me-1"></i>
                Produk Kami
            </span>
            <h2 class="fw-bold section-title">Produk Terbaru</h2>
            <div class="title-underline mx-auto"></div>
            <p class="mt-3 section-subtitle">Temukan berbagai produk untuk memenuhi kebutuhan Anda</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            {{-- Pakaian Muslim --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="category-card">
                    <div class="category-image-wrapper">
                        <div class="category-image">
                            <img src="{{ asset('images/mizyan.jpg') }}" class="img-fluid" alt="Pakaian Muslim">
                            <div class="category-overlay">
                                <div class="overlay-content">
                                    <i class="fas fa-tshirt overlay-icon"></i>
                                    <div class="overlay-text">Lihat Koleksi</div>
                                </div>
                            </div>
                        </div>
                        <span class="category-badge">
                            <i class="fas fa-star me-1"></i>
                            Fashion
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pakaian Muslim</h5>
                        <p class="card-text">
                            <i class="fas fa-info-circle me-1"></i>
                            Koleksi pakaian muslim modern dan stylish dengan kualitas premium
                        </p>
                        <div class="card-footer">
                            <a href="{{ route('products.index') }}" class="btn-mizyan-outline">
                                <span>Lihat Koleksi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

    /* Categories Section */
    .categories-section {
        padding: 80px 0;
        background-color: var(--bg-light);
        position: relative;
    }

    .categories-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 30%, rgba(248, 229, 187, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(242, 232, 213, 0.1) 0%, transparent 50%);
        z-index: 1;
    }

    .container {
        position: relative;
        z-index: 2;
    }

    .badge-mizyan {
        background-color: var(--text-highlight);
        color: var(--bg-white);
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-light);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.025em;
    }

    .title-underline {
        width: 80px;
        height: 4px;
        background-color: var(--price-color);
        border-radius: 2px;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: var(--text-muted);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 400;
    }
    
    /* Category Cards - Reduced Animation */
    .category-card {
        background-color: var(--bg-white);
        border-radius: 20px;
        padding: 0;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-light);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        min-height: 480px;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--price-color);
        z-index: 2;
    }

    .category-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }

    .category-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        flex-shrink: 0;
    }

    .category-image {
        position: relative;
        overflow: hidden;
        height: 250px;
    }

    .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.2s ease;
    }

    .category-card:hover .category-image img {
        transform: scale(1.02);
    }
    
    .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(113, 54, 0, 0.85);
        opacity: 0;
        transition: opacity 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: var(--bg-white);
    }
    
    .category-card:hover .category-overlay {
        opacity: 1;
    }

    .overlay-content {
        text-align: center;
    }

    .overlay-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .overlay-text {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .category-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--secondary-color);
        color: var(--bg-white);
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 3;
        box-shadow: var(--shadow-light);
    }

    /* Card Body - Equal Height Layout */
    .card-body {
        padding: 30px 25px 0 25px;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 15px;
        line-height: 1.4;
        min-height: 2.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 20px;
        line-height: 1.6;
        font-weight: 500;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 4.8rem;
    }

    /* Card Footer - Fixed Button Alignment */
    .card-footer {
        padding: 0 25px 30px 25px;
        background: transparent;
        border: none;
        margin-top: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80px;
    }

    /* Professional Button Styling - Consistent with Contact Page */
    .btn-mizyan-outline {
        background-color: var(--primary-color);
        border: 2px solid var(--primary-color);
        color: var(--secondary-color);
        padding: 15px 30px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 100%;
        max-width: 180px;
        min-height: 48px;
        text-align: center;
        line-height: 1.2;
        box-shadow: var(--shadow-light);
    }

    .btn-mizyan-outline span {
        position: relative;
        z-index: 1;
        white-space: nowrap;
    }

    .btn-mizyan-outline:hover {
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        color: var(--bg-white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        text-decoration: none;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .section-title {
            font-size: 2rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
        }
        
        .categories-section {
            padding: 60px 0;
        }

        .category-image {
            height: 200px;
        }

        .category-card {
            min-height: 450px;
        }

        .btn-mizyan-outline {
            max-width: 160px;
            padding: 12px 18px;
            font-size: 0.9rem;
        }

        .card-body {
            padding: 25px 20px 0 20px;
        }

        .card-footer {
            padding: 0 20px 25px 20px;
        }
    }

    @media (max-width: 767.98px) {
        .section-title {
            font-size: 1.8rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .categories-section {
            padding: 50px 0;
        }

        .card-body {
            padding: 25px 20px 0 20px;
        }

        .card-footer {
            padding: 0 20px 25px 20px;
        }

        .category-image {
            height: 180px;
        }

        .category-card {
            min-height: 420px;
            margin-bottom: 20px;
        }

        .btn-mizyan-outline {
            max-width: 150px;
            padding: 12px 16px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.6rem;
        }

        .category-card {
            min-height: 400px;
        }

        .card-body {
            padding: 20px 15px 0 15px;
        }

        .card-footer {
            padding: 0 15px 20px 15px;
        }

        .category-image {
            height: 160px;
        }

        .btn-mizyan-outline {
            max-width: 140px;
            padding: 12px 15px;
            font-size: 0.8rem;
        }
    }
</style>

<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    // Minimal JavaScript - Only essential functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Simple smooth scroll for internal links only
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
    });
</script>