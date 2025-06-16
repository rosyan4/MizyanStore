<!-- Hero Section with Carousel -->
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" data-bg="slide1">
                <!-- Ganti URL gambar di bawah ini sesuai kebutuhan -->
                <div class="carousel-bg-image" style="background-image: url('./images/hero4.png');"></div>
                <div class="carousel-bg-overlay"></div>
                <div class="carousel-content">
                    <div class="container"> <!-- Menggunakan Bootstrap container standar -->
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="hero-text-content">
                                    <h1 class="hero-title">Mizyan Store</h1>
                                    <h2 class="hero-subtitle">Pakaian Muslim Berkualitas Premium</h2>
                                    <p class="hero-description">Koleksi eksklusif pakaian muslim dengan desain modern dan kualitas premium. Tampil elegan dan syar'i setiap hari!</p>
                                    <div class="hero-buttons">
                                        <a href="{{ route('products.index') }}" class="btn-rosyan-primary">
                                            <span>Belanja Sekarang</span>
                                        </a>
                                        <a href="{{ route('gallery.index') }}" class="btn-rosyan-outline">
                                            <span>Jelajahi Galeri</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" data-bg="slide2">
                <!-- Ganti URL gambar di bawah ini sesuai kebutuhan -->
                <div class="carousel-bg-image" style="background-image: url('./images/hero2.png');"></div>
                <div class="carousel-bg-overlay"></div>
                <div class="carousel-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="hero-text-content">
                                    <h1 class="hero-title">Koleksi Fashion Muslim</h1>
                                    <h2 class="hero-subtitle">Tren Terbaru & Elegan</h2>
                                    <p class="hero-description">Busana muslim terdepan untuk wanita modern! Gaya syar'i yang fashionable dengan kualitas premium dan harga terjangkau.</p>
                                    <div class="hero-buttons">
                                        <a href="{{ route('products.index') }}" class="btn-rosyan-primary">
                                            <span>Lihat Koleksi</span>
                                        </a>
                                        <a href="{{ route('blog.index') }}" class="btn-rosyan-outline">
                                            <span>Jelajahi Blog</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" data-bg="slide3">
                <!-- Ganti URL gambar di bawah ini sesuai kebutuhan -->
                <div class="carousel-bg-image" style="background-image: url('./images/hero3.png');"></div>
                <div class="carousel-bg-overlay"></div>
                <div class="carousel-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="hero-text-content">
                                    <h1 class="hero-title">Busana Syar'i Berkelas</h1>
                                    <h2 class="hero-subtitle">Hasil Sempurna Setiap Saat</h2>
                                    <p class="hero-description">Koleksi busana syar'i terlengkap dengan bahan berkualitas tinggi dan desain terkini. Pilihan terbaik untuk wanita modern Indonesia!</p>
                                    <div class="hero-buttons">
                                        <a href="{{ route('products.index') }}" class="btn-rosyan-primary">
                                            <span>Lihat Produk</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn-rosyan-outline">
                                            <span>Hubungi Kami</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<style>
    /* ===== HERO SECTION SPECIFIC STYLES =====
       Menggunakan CSS Variables yang konsisten dengan halaman lain
       Menghindari override Bootstrap dan konflik CSS global
    */
    
    /* Font Family - Konsisten dengan seluruh website */
    .hero-section,
    .hero-section * {
        font-family: 'Poppins', 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Hero Section Main Container */
    .hero-section {
        position: relative;
        overflow: hidden;
        min-height: 85vh;
        background-color: var(--bg-light, #FDF9F3);
    }

    .hero-carousel {
        height: 85vh;
        position: relative;
    }

    .carousel-inner {
        height: 100%;
    }

    .carousel-item {
        height: 85vh;
        position: relative;
        transition: all 0.8s ease-in-out;
    }

    /* Background Image Container */
    .carousel-bg-image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        z-index: 1;
    }

    /* Solid color backgrounds menggunakan CSS variables yang konsisten */
    .carousel-item[data-bg="slide1"] {
        background: var(--primary-color, #F8E5BB);
        position: relative;
    }

    .carousel-item[data-bg="slide2"] {
        background: var(--accent-color, #F2E8D5);
        position: relative;
    }

    .carousel-item[data-bg="slide3"] {
        background: var(--price-color, #D39C63);
        position: relative;
    }

    /* Subtle decorative background elements */
    .carousel-item[data-bg="slide1"]::before {
        content: '';
        position: absolute;
        top: 20%;
        right: 10%;
        width: 200px;
        height: 200px;
        background: var(--text-highlight, #A8713A);
        opacity: 0.05;
        border-radius: 50%;
        z-index: 1;
    }

    .carousel-item[data-bg="slide1"]::after {
        content: '';
        position: absolute;
        bottom: 30%;
        left: 15%;
        width: 150px;
        height: 150px;
        background: var(--price-color, #D39C63);
        opacity: 0.08;
        border-radius: 50%;
        z-index: 1;
    }

    .carousel-item[data-bg="slide2"]::before {
        content: '';
        position: absolute;
        top: 15%;
        left: 20%;
        width: 180px;
        height: 180px;
        background: var(--footer-bg, #4A2C14);
        opacity: 0.06;
        border-radius: 50%;
        z-index: 1;
    }

    .carousel-item[data-bg="slide3"]::before {
        content: '';
        position: absolute;
        bottom: 20%;
        right: 25%;
        width: 220px;
        height: 220px;
        background: rgba(255,255,255,0.1);
        opacity: 0.12;
        border-radius: 50%;
        z-index: 1;
    }

    /* Enhanced Overlay - Menggunakan warna solid */
    .carousel-bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(74, 44, 20, 0.4);
        z-index: 2;
    }

    /* Content Styling - Menggunakan Bootstrap container tanpa override */
    .carousel-content {
        position: relative;
        z-index: 3;
        height: 100%;
        display: flex;
        align-items: center;
        padding: 100px 0;
    }

    /* Hero Text Content */
    .hero-text-content {
        position: relative;
        z-index: 4;
        padding: 0;
        max-width: 650px;
        opacity: 0;
        transform: translateY(30px);
        animation: slideInContent 0.8s ease-out 0.3s forwards;
    }

    @keyframes slideInContent {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Typography dengan enhanced shadows untuk visibility */
    .hero-title {
        color: var(--bg-white, #FFFFFF);
        font-weight: 800;
        font-size: 3rem;
        text-shadow: 3px 3px 0px var(--text-dark, #713600), 
                     -1px -1px 0px var(--text-dark, #713600),
                     1px -1px 0px var(--text-dark, #713600),
                     -1px 1px 0px var(--text-dark, #713600),
                     3px 3px 10px rgba(0, 0, 0, 0.8),
                     0 0 30px rgba(248, 229, 187, 0.9);
        margin-bottom: 1.5rem;
        position: relative;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .hero-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 0;
        width: 120px;
        height: 3px;
        background: var(--price-color, #D39C63);
        border-radius: 2px;
        box-shadow: var(--shadow-light, 0 4px 20px rgba(248, 229, 187, 0.15));
    }

    .hero-subtitle {
        color: var(--primary-color, #F8E5BB);
        font-weight: 600;
        font-size: 1.875rem;
        text-shadow: 2px 2px 0px var(--text-dark, #713600),
                     -1px -1px 0px var(--text-dark, #713600),
                     1px -1px 0px var(--text-dark, #713600),
                     -1px 1px 0px var(--text-dark, #713600),
                     2px 2px 8px rgba(0, 0, 0, 0.7),
                     0 0 20px rgba(211, 156, 99, 0.8);
        margin-bottom: 2rem;
        letter-spacing: 0.3px;
    }

    .hero-description {
        color: var(--bg-white, #FFFFFF);
        max-width: 600px;
        line-height: 1.7;
        font-weight: 600;
        font-size: 1.125rem;
        margin-bottom: 2rem;
        text-shadow: 2px 2px 0px var(--text-dark, #713600),
                     -1px -1px 0px var(--text-dark, #713600),
                     1px -1px 0px var(--text-dark, #713600),
                     -1px 1px 0px var(--text-dark, #713600),
                     2px 2px 6px rgba(0, 0, 0, 0.8),
                     0 0 15px rgba(248, 229, 187, 0.7);
    }

    .hero-buttons {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    @media (min-width: 640px) {
        .hero-buttons {
            flex-direction: row;
        }
    }

    /* Professional Button Styling - Menggunakan warna solid */
    .btn-rosyan-primary {
        background: var(--price-color, #D39C63);
        color: var(--bg-white, #FFFFFF);
        padding: 18px 35px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 2px solid var(--price-color, #D39C63);
        box-shadow: var(--shadow-light, 0 4px 20px rgba(248, 229, 187, 0.15));
        text-transform: uppercase;
        letter-spacing: 0.5px;
        min-width: 200px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .btn-rosyan-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-heavy, 0 15px 40px rgba(248, 229, 187, 0.3));
        background: var(--text-dark, #713600);
        border-color: var(--text-dark, #713600);
        color: var(--bg-white, #FFFFFF);
        text-decoration: none;
    }

    .btn-rosyan-outline {
        background: rgba(248, 229, 187, 0.9);
        color: var(--text-dark, #713600);
        padding: 18px 35px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: 2px solid var(--text-dark, #713600);
        position: relative;
        backdrop-filter: blur(10px);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        min-width: 200px;
        box-shadow: var(--shadow-light, 0 4px 20px rgba(248, 229, 187, 0.15));
    }

    .btn-rosyan-outline:hover {
        color: var(--bg-white, #FFFFFF);
        background: var(--text-dark, #713600);
        border-color: var(--footer-bg, #4A2C14);
        transform: translateY(-2px);
        box-shadow: var(--shadow-heavy, 0 15px 40px rgba(248, 229, 187, 0.3));
        text-decoration: none;
    }

    /* Carousel Indicators - Menggunakan CSS variables */
    .hero-section .carousel-indicators {
        bottom: 40px;
        z-index: 10;
    }

    .hero-section .carousel-indicators button {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid var(--primary-color, #F8E5BB);
        background: rgba(248, 229, 187, 0.4);
        margin: 0 8px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .hero-section .carousel-indicators button.active {
        background: var(--price-color, #D39C63);
        border-color: var(--price-color, #D39C63);
        transform: scale(1.2);
        box-shadow: 0 0 20px rgba(211, 156, 99, 0.6);
    }

    .hero-section .carousel-indicators button:hover {
        border-color: var(--price-color, #D39C63);
        background: rgba(211, 156, 99, 0.7);
        transform: scale(1.1);
    }

    /* Carousel Controls - Menggunakan warna solid */
    .hero-section .carousel-control-prev,
    .hero-section .carousel-control-next {
        width: 6%;
        z-index: 10;
        transition: all 0.3s ease;
    }

    .hero-section .carousel-control-prev-icon,
    .hero-section .carousel-control-next-icon {
        width: 55px;
        height: 55px;
        background: var(--price-color, #D39C63);
        border-radius: 50%;
        backdrop-filter: blur(15px);
        transition: all 0.3s ease;
        border: 2px solid var(--primary-color, #F8E5BB);
        box-shadow: var(--shadow-light, 0 4px 20px rgba(248, 229, 187, 0.15));
    }

    .hero-section .carousel-control-prev:hover .carousel-control-prev-icon,
    .hero-section .carousel-control-next:hover .carousel-control-next-icon {
        background: var(--text-dark, #713600);
        transform: scale(1.1);
        box-shadow: var(--shadow-heavy, 0 15px 40px rgba(248, 229, 187, 0.3));
        border-color: var(--text-dark, #713600);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-text-content {
            padding: 0;
        }
    }

    @media (max-width: 1024px) {
        .hero-carousel {
            height: 75vh;
        }
        
        .carousel-item {
            height: 75vh;
        }
        
        .carousel-bg-image {
            background-attachment: scroll;
        }
        
        .hero-title {
            font-size: 2.8rem;
        }
        
        .hero-subtitle {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 768px) {
        .hero-carousel {
            height: 65vh;
        }
        
        .carousel-item {
            height: 65vh;
        }
        
        .carousel-content {
            padding: 60px 0;
        }
        
        .hero-title {
            font-size: 2.2rem;
        }
        
        .hero-subtitle {
            font-size: 1.4rem;
        }
        
        .hero-description {
            font-size: 1rem;
        }
        
        .btn-rosyan-primary,
        .btn-rosyan-outline {
            padding: 15px 28px;
            font-size: 0.95rem;
        }
        
        .hero-section .carousel-control-prev-icon,
        .hero-section .carousel-control-next-icon {
            width: 45px;
            height: 45px;
        }
        
        .hero-section .carousel-indicators button {
            width: 14px;
            height: 14px;
        }
    }

    @media (max-width: 640px) {
        .hero-carousel {
            height: 55vh;
        }
        
        .carousel-item {
            height: 55vh;
        }
        
        .hero-text-content {
            text-align: center;
        }
        
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
        
        .hero-buttons {
            flex-direction: column;
        }
        
        .btn-rosyan-primary,
        .btn-rosyan-outline {
            width: 100%;
            justify-content: center;
            padding: 15px 20px;
        }

        .hero-section .carousel-indicators {
            bottom: 20px;
        }
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Subtle loading animation */
    .carousel-item {
        opacity: 0;
        animation: fadeIn 0.8s ease-in-out forwards;
    }

    .carousel-item.active {
        opacity: 1;
    }

    @keyframes fadeIn {
        to { 
            opacity: 1;
        }
    }

    /* Enhanced carousel transition */
    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
        transition: transform 0.6s ease-in-out;
    }

    /* Parallax effect untuk background pada desktop */
    @media (min-width: 1024px) {
        .carousel-bg-image {
            background-attachment: fixed;
        }
    }
</style>