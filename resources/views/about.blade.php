@extends('layouts.app')

@section('title', 'Tentang Kami')

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
    .hero-about {
        background-color: var(--secondary-color);
        padding: 100px 0 80px 0;
        color: var(--bg-white);
        position: relative;
        overflow: hidden;
    }

    .hero-about::before {
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

    /* Main About Section */
    .about-main-section {
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

    .card-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .card-body {
        padding: 40px;
    }

    .vision-mission-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: var(--shadow-light);
        margin-bottom: 20px;
    }

    .about-section {
        background-color: var(--bg-light);
        padding: 30px;
        border-radius: 15px;
        border: 1px solid var(--border-light);
    }

    .about-section h3 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    .about-section p {
        color: var(--text-muted);
        margin-bottom: 15px;
        text-align: justify;
    }

    .about-section ul {
        color: var(--text-muted);
        padding-left: 20px;
    }

    .about-section ul li {
        margin-bottom: 8px;
        position: relative;
    }

    .about-section ul li::marker {
        color: var(--text-highlight);
    }

    /* Team Section */
    .team-section {
        background-color: var(--bg-light);
        padding: 30px;
        border-radius: 15px;
        border: 1px solid var(--border-light);
    }

    .team-section h3 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    .team-section .card {
        border: 1px solid var(--border-light);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        overflow: hidden;
    }

    .team-section .card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }

    .team-section .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .team-section .card-body {
        padding: 20px;
        text-align: center;
    }

    .team-section .card-title {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .team-section .card-text {
        color: var(--text-muted) !important;
        font-size: 0.9rem;
    }

    /* Why Choose Us Section */
    .why-choose-us {
        background-color: var(--bg-light) !important;
        padding: 30px !important;
        border-radius: 15px !important;
        border: 1px solid var(--border-light);
    }

    .why-choose-us h3 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    .why-choose-us .d-flex {
        background-color: var(--bg-white);
        padding: 20px;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .why-choose-us .d-flex:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .why-choose-us .fa-2x {
        color: var(--text-highlight) !important;
    }

    .why-choose-us h5 {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .why-choose-us p {
        color: var(--text-muted) !important;
        margin-bottom: 0;
        font-size: 0.9rem;
    }

    /* General heading styles */
    h3.text-primary {
        color: var(--secondary-color) !important;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-about {
            padding: 80px 0 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
        }

        .about-main-section {
            padding: 60px 0;
        }

        .card-header,
        .card-body,
        .about-section,
        .team-section,
        .why-choose-us {
            padding: 25px !important;
        }

        .vision-mission-img {
            height: 250px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-about {
            padding: 60px 0 50px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .about-main-section {
            padding: 50px 0;
        }

        .card-header,
        .card-body,
        .about-section,
        .team-section,
        .why-choose-us {
            padding: 20px !important;
        }

        .vision-mission-img {
            height: 200px;
            margin-bottom: 30px;
        }

        .why-choose-us .d-flex {
            margin-bottom: 15px;
        }

        .team-section .card-img-top {
            height: 180px;
        }
    }

    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.8rem;
        }

        .card-header h2 {
            font-size: 1.5rem;
        }

        .card-header,
        .card-body,
        .about-section,
        .team-section,
        .why-choose-us {
            padding: 15px !important;
        }

        .vision-mission-img {
            height: 180px;
        }

        .team-section .card-img-top {
            height: 160px;
        }

        .why-choose-us .d-flex {
            padding: 15px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-about">
    <div class="container">
        <div class="hero-content">
            <span class="badge-mizyan">
                <i class="fas fa-users me-1"></i>
                Mengenal Kami Lebih Dekat
            </span>
            <h2 class="section-title">Tentang Mizyan Store</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Perjalanan kami dalam menyediakan fashion muslimah berkualitas dan layanan terpercaya</p>
        </div>
    </div>
</section>

<section class="about-main-section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <i class="fas fa-store me-2"></i>
                            Tentang Mizyan Store
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <img src="{{ asset('images/mizyan.jpg') }}" alt="Tentang Mizyan Store" class="vision-mission-img">
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-primary">
                                    <i class="fas fa-eye me-2"></i>
                                    Visi Kami
                                </h3>
                                <p>Menjadi penyedia produk dan jasa muslimah terbaik yang memberikan kualitas premium dengan harga terjangkau, serta menjadi pilihan utama untuk kebutuhan fashion muslimah yang modern dan syar'i.</p>
                                
                                <h3 class="text-primary">
                                    <i class="fas fa-bullseye me-2"></i>
                                    Misi Kami
                                </h3>
                                <ul>
                                    <li>Menyediakan produk fashion muslimah berkualitas tinggi dan terpercaya</li>
                                    <li>Memberikan pelayanan jahitan, laundry, dan setrika yang profesional</li>
                                    <li>Mengutamakan kepuasan pelanggan dalam setiap transaksi dan layanan</li>
                                    <li>Menjadi mitra terpercaya untuk kebutuhan busana muslimah sehari-hari</li>
                                    <li>Memberikan nilai terbaik dengan harga yang kompetitif dan terjangkau</li>
                                </ul>
                            </div>
                        </div>

                        <div class="about-section mb-5">
                            <h3>
                                <i class="fas fa-history me-2"></i>
                                Sejarah Mizyan Store
                            </h3>
                            <p>Mizyan Store didirikan pada tahun 2020 dengan tujuan untuk memenuhi kebutuhan fashion muslimah yang stylish namun tetap syar'i. Bermula dari usaha kecil di rumah dengan semangat untuk memberikan yang terbaik, sekarang kami telah berkembang menjadi toko online yang melayani pelanggan dari berbagai daerah di seluruh Kota Jambi.</p>
                            
                            <p>Perjalanan kami dimulai dari keinginan sederhana untuk menyediakan pakaian muslimah yang tidak hanya indah dipandang, tetapi juga nyaman dipakai dan sesuai dengan syariat Islam.</p>

                            <p>Komitmen kami adalah memberikan pengalaman berbelanja yang menyenangkan dengan produk berkualitas tinggi, pelayanan yang ramah, dan harga yang bersahabat. Kepercayaan pelanggan adalah aset terbesar kami, dan kami terus berusaha mempertahankan kualitas produk dan layanan terbaik.</p>
                        </div>

                        <div class="team-section mb-4">
                            <h3>
                                <i class="fas fa-users me-2"></i>
                                Tim Profesional Kami
                            </h3>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/mizyan.jpg') }}" class="card-img-top" alt="Pemilik">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="fas fa-crown me-1 text-warning"></i>
                                                Rosyan
                                            </h5>
                                            <p class="card-text">Pemilik Utama</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/mizyan.jpg') }}" class="card-img-top" alt="Penjahit">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="fas fa-cut me-1 text-info"></i>
                                                Assiry
                                            </h5>
                                            <p class="card-text">Penjahit</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/mizyan.jpg') }}" class="card-img-top" alt="Customer Service">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="fas fa-headset me-1 text-success"></i>
                                                Ahmad
                                            </h5>
                                            <p class="card-text">Customer Service</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="why-choose-us">
                            <h3>
                                <i class="fas fa-star me-2"></i>
                                Mengapa Memilih Mizyan Store?
                            </h3>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-check-circle fa-2x"></i>
                                        </div>
                                        <div>
                                            <h5>Kualitas Terjamin</h5>
                                            <p>Produk dan jasa kami melalui proses quality control yang ketat untuk memastikan kepuasan pelanggan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-truck fa-2x"></i>
                                        </div>
                                        <div>
                                            <h5>Pengiriman Cepat</h5>
                                            <p>Proses packing dan pengiriman dilakukan dengan cepat dan aman ke seluruh Kota Jambi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-headset fa-2x"></i>
                                        </div>
                                        <div>
                                            <h5>Layanan 24/7</h5>
                                            <p>Customer service kami siap membantu dan melayani pertanyaan Anda kapan saja</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-tags fa-2x"></i>
                                        </div>
                                        <div>
                                            <h5>Harga Terjangkau</h5>
                                            <p>Menawarkan produk berkualitas dengan harga yang kompetitif dan bersahabat</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-heart fa-2x"></i>
                                        </div>
                                        <div>
                                            <h5>Dipercaya Pelanggan</h5>
                                            <p>Sudah melayani ribuan pelanggan dengan tingkat kepuasan yang tinggi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="fas fa-shield-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h5>Garansi Produk</h5>
                                            <p>Memberikan garansi untuk setiap produk dan layanan yang kami berikan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Simple hover enhancement for team cards
    document.addEventListener('DOMContentLoaded', function() {
        const teamCards = document.querySelectorAll('.team-section .card');
        const chooseUsItems = document.querySelectorAll('.why-choose-us .d-flex');
        
        // Simple hover effect for team cards
        teamCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Simple hover effect for choose us items
        chooseUsItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>

@endsection