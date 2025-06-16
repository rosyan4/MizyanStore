@extends('layouts.app')

@section('title', 'Dashboard - Mizyan Store')

@section('content')
<style>
    :root {
        --primary-color: #F8E5BB;
        --secondary-color: #713600;
        --accent-color: #F2E8D5;
        --text-highlight: #A8713A;
        --footer-bg: #4A2C14;
        --price-color: #D39C63;
        --bg-white: #FFFFFF;
        --bg-light: #FDF9F3;
        --text-dark: #713600;
        --text-secondary: #A8713A;
        --text-muted: #8B6F47;
        --text-light: #B8956B;
        --border-light: #F2E8D5;
        --border-primary: #F8E5BB;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --info-color: #17a2b8;
        --shadow-light: 0 2px 12px rgba(113, 54, 0, 0.08);
        --shadow-medium: 0 4px 20px rgba(113, 54, 0, 0.12);
        --shadow-heavy: 0 8px 32px rgba(113, 54, 0, 0.16);
        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        --gradient-secondary: linear-gradient(135deg, var(--secondary-color) 0%, var(--text-highlight) 100%);
    }

    * {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(135deg, var(--bg-light) 0%, #f8f4ee 100%);
        color: var(--text-dark);
        line-height: 1.6;
        min-height: 100vh;
    }

    .dashboard-section {
        padding: 40px 0 80px 0;
        min-height: 100vh;
    }

    /* Main Dashboard Container */
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Page Header */
    .page-header {
        background: var(--gradient-secondary);
        border-radius: 20px;
        padding: 30px 35px;
        margin-bottom: 30px;
        box-shadow: var(--shadow-medium);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .page-header h1 {
        color: var(--bg-white);
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 8px 0;
        position: relative;
        z-index: 1;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
        font-size: 1.1rem;
        position: relative;
        z-index: 1;
    }

    /* Welcome Card */
    .welcome-card {
        background: var(--gradient-primary);
        border-radius: 16px;
        padding: 25px 30px;
        margin-bottom: 30px;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-primary);
        position: relative;
        overflow: hidden;
    }

    .welcome-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50px;
        width: 120px;
        height: 120px;
        background: rgba(113, 54, 0, 0.05);
        border-radius: 50%;
    }

    .welcome-card h3 {
        color: var(--secondary-color);
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0 0 8px 0;
        position: relative;
        z-index: 1;
    }

    .welcome-card p {
        color: var(--text-secondary);
        margin: 0;
        font-weight: 500;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stats-card {
        background: var(--bg-white);
        border-radius: 16px;
        padding: 0;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-light);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }

    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-heavy);
    }

    .stats-card-header {
        padding: 25px 25px 15px 25px;
        border-bottom: 1px solid var(--border-light);
    }

    .stats-card-title {
        display: flex;
        align-items: center;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-secondary);
        margin: 0;
    }

    .stats-card-title i {
        color: var(--price-color);
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .stats-card-body {
        padding: 20px 25px 25px 25px;
        text-align: center;
    }

    .stats-number {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--price-color);
        margin: 15px 0 20px 0;
        line-height: 1;
        background: linear-gradient(135deg, var(--price-color) 0%, var(--text-highlight) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Custom Buttons */
    .btn-mizyan {
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .btn-mizyan::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
        z-index: 1;
    }

    .btn-mizyan:hover::before {
        left: 100%;
    }

    .btn-mizyan i {
        position: relative;
        z-index: 2;
    }

    .btn-mizyan span {
        position: relative;
        z-index: 2;
    }

    .btn-primary {
        background: var(--gradient-primary);
        color: var(--secondary-color);
        box-shadow: var(--shadow-light);
    }

    .btn-primary:hover {
        background: var(--gradient-secondary);
        color: var(--bg-white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .btn-success {
        background: var(--gradient-secondary);
        color: var(--bg-white);
        box-shadow: var(--shadow-light);
    }

    .btn-success:hover {
        background: linear-gradient(135deg, var(--text-highlight) 0%, var(--secondary-color) 100%);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    /* Section Cards */
    .section-card {
        background: var(--bg-white);
        border-radius: 16px;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-light);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .section-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-light);
        background: rgba(248, 229, 187, 0.3);
    }

    .section-title {
        display: flex;
        align-items: center;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .section-title i {
        color: var(--price-color);
        margin-right: 12px;
    }

    .section-body {
        padding: 0;
    }

    /* Activity List */
    .activity-item {
        padding: 20px 30px;
        border-bottom: 1px solid var(--border-light);
        transition: background-color 0.2s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-item:hover {
        background: var(--bg-light);
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0 0 5px 0;
        font-size: 1rem;
    }

    .activity-title i {
        color: var(--price-color);
        margin-right: 10px;
        font-size: 1.1rem;
    }

    .activity-date {
        color: var(--text-muted);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
    }

    .activity-date i {
        margin-right: 6px;
    }

    /* Status Badges */
    .status-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .status-completed {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .status-pending {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        color: white;
    }

    .status-processing {
        background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
        color: white;
    }

    .status-cancelled {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }

    /* Empty State */
    .empty-state {
        padding: 50px 30px;
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--border-primary);
        margin-bottom: 15px;
    }

    .empty-state h5 {
        color: var(--text-secondary);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .empty-state p {
        margin: 0;
        font-style: italic;
    }

    /* Quick Actions Grid */
    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .dashboard-container {
            padding: 0 15px;
        }
        
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .dashboard-section {
            padding: 20px 0 60px 0;
        }

        .page-header {
            padding: 25px 20px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 1.6rem;
        }

        .welcome-card {
            padding: 20px 25px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .stats-card-header,
        .stats-card-body {
            padding: 20px;
        }

        .stats-number {
            font-size: 2.2rem;
        }

        .section-header {
            padding: 20px 25px;
        }

        .activity-item {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .quick-actions-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .btn-mizyan {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .page-header h1 {
            font-size: 1.4rem;
        }

        .stats-number {
            font-size: 2rem;
        }

        .welcome-card h3 {
            font-size: 1.2rem;
        }
    }

    /* Loading Animation */
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

    .stats-card,
    .section-card,
    .welcome-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .stats-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .stats-card:nth-child(3) {
        animation-delay: 0.2s;
    }
</style>

<div class="dashboard-section">
    <div class="dashboard-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>
                <i class="fas fa-tachometer-alt me-3"></i>
                Dashboard Pengguna
            </h1>
            <p>Kelola akun dan pantau aktivitas belanja Anda</p>
        </div>

        <!-- Welcome Card -->
        <div class="welcome-card">
            <h3>
                <i class="fas fa-hand-peace me-2"></i>
                Selamat datang kembali, {{ auth()->user()->name }}!
            </h3>
            <p>Terima kasih telah mempercayai Mizyan Store untuk kebutuhan fashion muslim Anda. Mari lanjutkan pengalaman berbelanja yang menyenangkan.</p>
        </div>

        <!-- Stats Cards Grid -->
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-card-header">
                    <h5 class="stats-card-title">
                        <i class="fas fa-shopping-bag"></i>
                        Total Pesanan
                    </h5>
                </div>
                <div class="stats-card-body">
                    <div class="stats-number">{{ auth()->user()->orders()->count() }}</div>
                    <a href="{{ route('account.orders') }}" class="btn-mizyan btn-primary">
                        <i class="fas fa-eye me-2"></i>
                        <span>Lihat Pesanan</span>
                    </a>
                </div>
            </div>

            <div class="stats-card">
                <div class="stats-card-header">
                    <h5 class="stats-card-title">
                        <i class="fas fa-check-circle"></i>
                        Pesanan Selesai
                    </h5>
                </div>
                <div class="stats-card-body">
                    <div class="stats-number">{{ auth()->user()->orders()->where('status', 'completed')->count() }}</div>
                    <a href="{{ route('account.orders') }}?status=completed" class="btn-mizyan btn-success">
                        <i class="fas fa-list me-2"></i>
                        <span>Lihat Riwayat</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="section-card">
            <div class="section-header">
                <h5 class="section-title">
                    <i class="fas fa-history"></i>
                    Aktivitas Terakhir
                </h5>
            </div>
            <div class="section-body">
                @forelse(auth()->user()->orders()->latest()->take(5)->get() as $order)
                <div class="activity-item">
                    <div class="activity-content">
                        <div class="activity-title">
                            <i class="fas fa-receipt"></i>
                            Pesanan #{{ $order->order_number }}
                        </div>
                        <div class="activity-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $order->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                    <span class="status-badge status-{{ $order->status }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h5>Belum Ada Pesanan</h5>
                    <p>Mulai berbelanja sekarang dan nikmati koleksi fashion muslim terbaik kami!</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="section-card">
            <div class="section-header">
                <h5 class="section-title">
                    <i class="fas fa-bolt"></i>
                    Aksi Cepat
                </h5>
            </div>
            <div class="section-body" style="padding: 25px 30px;">
                <div class="quick-actions-grid">
                    <a href="{{ route('products.index') }}" class="btn-mizyan btn-primary">
                        <i class="fas fa-shopping-cart me-2"></i>
                        <span>Mulai Berbelanja</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn-mizyan btn-success">
                        <i class="fas fa-user-edit me-2"></i>
                        <span>Edit Profil</span>
                    </a>
                    <a href="{{ route('account.orders') }}" class="btn-mizyan btn-primary">
                        <i class="fas fa-history me-2"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                    <a href="{{ route('products.index') }}?category=new" class="btn-mizyan btn-success">
                        <i class="fas fa-star me-2"></i>
                        <span>Produk Terbaru</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection