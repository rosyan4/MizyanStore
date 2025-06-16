@extends('layouts.app')

@section('title', 'Riwayat Pesanan - Mizyan Store')

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
    .hero-orders {
        background-color: var(--secondary-color);
        padding: 100px 0 80px 0;
        color: var(--bg-white);
        position: relative;
        overflow: hidden;
    }

    .hero-orders::before {
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

    /* Orders Section */
    .orders-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .orders-header {
        background-color: var(--bg-white);
        padding: 30px;
        border-radius: 20px 20px 0 0;
        border: 1px solid var(--border-light);
        border-bottom: none;
        margin-bottom: 0;
    }

    .orders-header h4 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 0;
    }

    .orders-container {
        background-color: var(--bg-white);
        border-radius: 0 0 20px 20px;
        border: 1px solid var(--border-light);
        border-top: none;
        padding: 40px;
        margin-bottom: 40px;
    }

    /* Order Cards */
    .order-card {
        background-color: var(--bg-white);
        border-radius: 15px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        position: relative;
    }

    .order-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }

    .order-card-header {
        background-color: var(--bg-light);
        padding: 20px 25px;
        border-bottom: 1px solid var(--border-light);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .order-number {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
    }

    .order-number:hover {
        color: var(--text-highlight);
        text-decoration: none;
    }

    .order-date {
        color: var(--text-secondary);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .order-card-body {
        padding: 25px;
    }

    .order-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .order-total {
        color: var(--price-color);
        font-weight: 700;
        font-size: 1.3rem;
    }

    .order-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Status Badges */
    .status-badge {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background-color: rgba(255, 193, 7, 0.15);
        color: #856404;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }

    .status-processing {
        background-color: rgba(13, 202, 240, 0.15);
        color: #055160;
        border: 1px solid rgba(13, 202, 240, 0.3);
    }

    .status-shipped {
        background-color: rgba(25, 135, 84, 0.15);
        color: #0f5132;
        border: 1px solid rgba(25, 135, 84, 0.3);
    }

    .status-delivered {
        background-color: rgba(40, 167, 69, 0.15);
        color: #155724;
        border: 1px solid rgba(40, 167, 69, 0.3);
    }

    .status-cancelled {
        background-color: rgba(220, 53, 69, 0.15);
        color: #721c24;
        border: 1px solid rgba(220, 53, 69, 0.3);
    }

    /* Buttons */
    .btn-mizyan-primary {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
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

    .btn-mizyan-secondary {
        background-color: transparent;
        color: var(--text-secondary);
        border: 1px solid var(--border-primary);
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-mizyan-secondary:hover {
        background-color: var(--border-primary);
        color: var(--text-dark);
        transform: translateY(-2px);
        text-decoration: none;
    }

    .btn-mizyan-danger {
        background-color: transparent;
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.3);
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-mizyan-danger:hover {
        background-color: rgba(220, 53, 69, 0.1);
        color: #721c24;
        transform: translateY(-2px);
        text-decoration: none;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 40px;
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
    }

    .empty-state-icon {
        font-size: 4rem;
        color: var(--text-light);
        margin-bottom: 30px;
        opacity: 0.7;
    }

    .empty-state h5 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: var(--text-muted);
        font-size: 1.1rem;
        margin-bottom: 30px;
        line-height: 1.6;
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

    /* Improved Pagination Styles */
    .pagination-container {
        background-color: var(--bg-white);
        border-radius: 20px;
        padding: 30px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        margin-top: 30px;
    }

    .pagination {
        justify-content: center;
        margin-bottom: 0;
        gap: 5px;
        flex-wrap: wrap;
    }

    .page-item {
        margin: 0;
    }

    .page-link {
        color: var(--text-secondary);
        background-color: var(--bg-light);
        border: 1px solid var(--border-primary);
        padding: 10px 14px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        position: relative;
        overflow: hidden;
        line-height: 1;
    }

    .page-link:hover {
        color: var(--bg-white);
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(168, 113, 58, 0.3);
    }

    .page-item.active .page-link {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--bg-white);
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(113, 54, 0, 0.3);
        transform: translateY(-1px);
    }

    .page-item.active .page-link:hover {
        background-color: var(--secondary-color);
        transform: translateY(-1px);
    }

    .page-item.disabled .page-link {
        color: var(--text-light);
        background-color: var(--bg-light);
        border-color: var(--border-light);
        cursor: not-allowed;
        opacity: 0.5;
    }

    .page-item.disabled .page-link:hover {
        transform: none;
        box-shadow: none;
        color: var(--text-light);
        background-color: var(--bg-light);
    }

    /* Pagination Navigation - Previous/Next buttons */
    .page-item:first-child .page-link,
    .page-item:last-child .page-link {
        font-weight: 600;
        background-color: var(--accent-color);
        border-color: var(--border-primary);
        color: var(--text-secondary);
        padding: 10px 16px;
        min-width: 50px;
    }

    .page-item:first-child .page-link:hover,
    .page-item:last-child .page-link:hover {
        background-color: var(--primary-color);
        border-color: var(--text-highlight);
        color: var(--text-dark);
    }

    /* Icon sizes for navigation */
    .page-link i {
        font-size: 12px;
        line-height: 1;
    }

    /* Custom arrow styles */
    .page-link .pagination-arrow {
        font-size: 10px;
        font-weight: bold;
        line-height: 1;
    }

    /* Pagination Info */
    .pagination-info {
        text-align: center;
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--border-light);
    }

    .pagination-info strong {
        color: var(--text-secondary);
        font-weight: 600;
    }

    /* Pagination wrapper for better centering */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .pagination-nav {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-orders {
            padding: 80px 0 60px 0;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .orders-section {
            padding: 60px 0;
        }

        .orders-header {
            padding: 25px;
        }

        .orders-container {
            padding: 30px;
        }

        .orders-header h4 {
            font-size: 1.5rem;
        }

        .order-card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .order-info {
            flex-direction: column;
            align-items: flex-start;
        }

        .pagination-container {
            padding: 25px 20px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-orders {
            padding: 60px 0 50px 0;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .orders-section {
            padding: 50px 0;
        }

        .orders-header,
        .orders-container {
            padding: 20px;
        }

        .order-card-header,
        .order-card-body {
            padding: 20px;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .empty-state-icon {
            font-size: 3rem;
        }

        .empty-state h5 {
            font-size: 1.3rem;
        }

        .pagination-container {
            padding: 20px 15px;
        }

        .page-link {
            min-width: 35px;
            height: 35px;
            padding: 8px 12px;
            font-size: 0.85rem;
        }

        .page-item:first-child .page-link,
        .page-item:last-child .page-link {
            min-width: 40px;
            padding: 8px 14px;
        }
    }

    @media (max-width: 575.98px) {
        .hero-title {
            font-size: 1.8rem;
        }

        .orders-header h4 {
            font-size: 1.3rem;
        }

        .orders-header,
        .orders-container {
            padding: 15px;
        }

        .order-card-header,
        .order-card-body {
            padding: 15px;
        }

        .order-actions {
            width: 100%;
        }

        .order-actions .btn-mizyan-primary,
        .order-actions .btn-mizyan-secondary,
        .order-actions .btn-mizyan-danger {
            flex: 1;
            justify-content: center;
        }

        .empty-state {
            padding: 40px 15px;
        }

        .pagination-container {
            padding: 20px 15px;
        }

        .pagination {
            gap: 3px;
        }

        .page-link {
            min-width: 32px;
            height: 32px;
            padding: 6px 10px;
            font-size: 0.8rem;
        }

        .page-item:first-child .page-link,
        .page-item:last-child .page-link {
            min-width: 35px;
            padding: 6px 12px;
        }

        .pagination-info {
            font-size: 0.8rem;
            margin-top: 15px;
            padding-top: 15px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-orders">
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-history me-1"></i>
                Riwayat Pesanan
            </span>
            <h1 class="hero-title">Pesanan Saya</h1>
            <div class="title-underline"></div>
            <p class="hero-subtitle">Pantau dan kelola semua pesanan Anda dengan mudah</p>
        </div>
    </div>
</section>

<!-- Orders Section -->
<section class="orders-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="orders-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-shopping-bag me-2"></i>
                            Daftar Pesanan
                        </h4>
                        <a href="{{ route('products.index') }}" class="btn-mizyan-primary">
                            <i class="fas fa-plus"></i> Belanja Lagi
                        </a>
                    </div>
                </div>

                <div class="orders-container">
                    @if($orders->isEmpty())
                        <div class="empty-state">
                            <i class="fas fa-shopping-bag empty-state-icon"></i>
                            <h5>Anda belum memiliki pesanan</h5>
                            <p>Mulai berbelanja dan temukan produk menarik untuk Anda</p>
                            <a href="{{ route('products.index') }}" class="btn-mizyan-primary">
                                <i class="fas fa-shopping-bag me-2"></i> Belanja Sekarang
                            </a>
                        </div>
                    @else
                        <div class="orders-list">
                            @foreach($orders as $index => $order)
                            <div class="order-card loading-card" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="order-card-header">
                                    <div class="d-flex align-items-center gap-3">
                                        <a href="{{ route('account.order.detail', $order->id) }}" class="order-number">
                                            {{ $order->order_number }}
                                        </a>
                                        @php
                                            $statusInfo = $order->status_badge;
                                            $statusClass = match($order->status) {
                                                'pending' => 'status-pending',
                                                'processing' => 'status-processing', 
                                                'shipped' => 'status-shipped',
                                                'delivered' => 'status-delivered',
                                                'cancelled' => 'status-cancelled',
                                                default => 'status-pending'
                                            };
                                        @endphp
                                        <span class="status-badge {{ $statusClass }}">
                                            {{ $statusInfo['text'] }}
                                        </span>
                                    </div>
                                    <div class="order-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ $order->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                
                                <div class="order-card-body">
                                    <div class="order-info">
                                        <div class="order-total">
                                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </div>
                                        <div class="order-actions">
                                            <a href="{{ route('account.order.detail', $order->id) }}" class="btn-mizyan-primary">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            @if($order->status === 'pending')
                                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                                    @csrf
                                                    <button type="submit" class="btn-mizyan-danger">
                                                        <i class="fas fa-times"></i> Batalkan
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if($orders->hasPages())
                        <div class="pagination-container">
                            <div class="pagination-wrapper">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($orders->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">
                                                    <span class="pagination-arrow">‹</span>
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev">
                                                    <span class="pagination-arrow">‹</span>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                            @if ($page == $orders->currentPage())
                                                <li class="page-item active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($orders->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $orders->nextPageUrl() }}" rel="next">
                                                    <span class="pagination-arrow">›</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">
                                                    <span class="pagination-arrow">›</span>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="pagination-info">
                                Menampilkan <strong>{{ $orders->firstItem() }}</strong> sampai <strong>{{ $orders->lastItem() }}</strong> 
                                dari <strong>{{ $orders->total() }}</strong> pesanan
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate order cards on scroll
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

        // Observe all order cards
        const cards = document.querySelectorAll('.order-card');
        cards.forEach(card => {
            observer.observe(card);
        });

        // Add hover effects for cards
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-3px)';
            });
        });

        // Enhanced status badge animation
        const statusBadges = document.querySelectorAll('.status-badge');
        statusBadges.forEach((badge, index) => {
            badge.style.animationDelay = `${index * 0.1}s`;
            badge.classList.add('badge-animate');
        });

        // Smooth pagination transitions
        const paginationLinks = document.querySelectorAll('.page-link');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                if (!this.parentElement.classList.contains('disabled') && 
                    !this.parentElement.classList.contains('active')) {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                }
            });
        });
    });

    // Add CSS for badge animation
    const style = document.createElement('style');
    style.textContent = `
        .badge-animate {
            animation: badgeGlow 3s ease-in-out infinite;
        }
        
        @keyframes badgeGlow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .order-card:hover .badge-animate {
            animation-duration: 1s;
        }

        .pagination-arrow {
            transition: transform 0.2s ease;
        }

        .page-link:hover .pagination-arrow {
            transform: scale(1.1);
        }
    `;
    document.head.appendChild(style);
</script>

@endsection