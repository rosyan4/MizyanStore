<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel" style="width: 320px;">
    <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center w-100">
            @auth
                <div class="flex-shrink-0">
                    @if(auth()->user()->profile_photo)
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" 
                             class="rounded-circle me-3" 
                             width="48" 
                             height="48" 
                             style="object-fit: cover"
                             alt="Profile">
                    @else
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                             style="width: 48px; height: 48px; font-size: 18px;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <div class="flex-grow-1">
                    <h5 class="offcanvas-title mb-0" id="sidebarLabel">{{ auth()->user()->name }}</h5>
                    <small class="text-muted">{{ auth()->user()->email }}</small>
                </div>
            @else
                <h5 class="offcanvas-title mb-0" id="sidebarLabel">Menu Pengguna</h5>
            @endauth
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>

    <div class="offcanvas-body p-0 d-flex flex-column">
        @auth
            <!-- Statistik Pengguna -->
            <div class="p-3 border-bottom bg-light">
                <div class="row g-2 text-center">
                    @foreach (['pending' => 'text-primary', 'processing' => 'text-warning', 'completed' => 'text-success'] as $status => $class)
                        <div class="col">
                            <div class="p-2 rounded bg-white shadow-sm">
                                <div class="{{ $class }} fw-bold mb-1">
                                    {{ auth()->user()->orders()->where('status', $status)->count() }}
                                </div>
                                <div class="text-muted small">{{ ucfirst($status) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endauth

        <nav class="flex-grow-1 p-3" style="overflow-y: auto;">
            @auth
                <!-- Akun Saya -->
                <div class="mb-3">
                    <h6 class="text-uppercase small fw-bold text-muted mb-2 ps-2">Akun Saya</h6>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action rounded {{ request()->is('dashboard') ? 'active' : '' }}" 
                           href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a class="list-group-item list-group-item-action rounded {{ request()->is('account/orders*') ? 'active' : '' }}" 
                           href="{{ route('account.orders') }}">
                            <i class="fas fa-shopping-bag me-2"></i> Pesanan Saya
                            <span class="badge bg-primary float-end">
                                {{ auth()->user()->orders()->whereIn('status', ['pending', 'processing'])->count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action rounded {{ request()->is('testimonials*') ? 'active' : '' }}" 
                           href="{{ route('testimonials.index') }}">
                            <i class="fas fa-star me-2"></i> Testimoni
                        </a>
                    </div>
                </div>

                <!-- Pengaturan -->
                <div class="mb-3">
                    <h6 class="text-uppercase small fw-bold text-muted mb-2 ps-2">Pengaturan</h6>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action rounded {{ request()->is('profile*') ? 'active' : '' }}" 
                           href="{{ route('profile.edit') }}">
                            <i class="fas fa-user-cog me-2"></i> Profil Saya
                        </a>
                    </div>
                </div>
            @else
                <!-- Menu Login / Register -->
                <div class="mb-3">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action rounded {{ request()->is('login') ? 'active' : '' }}" 
                           href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i> Masuk
                        </a>
                        <a class="list-group-item list-group-item-action rounded {{ request()->is('register') ? 'active' : '' }}" 
                           href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-2"></i> Daftar
                        </a>
                    </div>
                </div>
            @endauth

            <!-- Informasi Umum -->
            <div class="mb-3">
                <h6 class="text-uppercase small fw-bold text-muted mb-2 ps-2">Informasi</h6>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action rounded {{ request()->is('about') ? 'active' : '' }}" 
                       href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-2"></i> Tentang Kami
                    </a>
                </div>
            </div>
        </nav>

        <!-- Footer Sidebar -->
        <div class="border-top p-3 bg-footer">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fas fa-sign-out-alt me-2"></i> Keluar
                    </button>
                </form>
            @else
                <div class="text-center small text-copyright">
                    © {{ date('Y') }} Mizyan Store. All rights reserved.
                </div>
            @endauth
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #F8E5BB;
        --secondary-color: #713600;
        --accent-color: #F2E8D5;
        --warm-brown: #A8713A;
        --dark-brown: #4A2C14;
        --light-brown: #D39C63;
        --cream-white: #FDF9F3;
        --soft-cream: #F2E8D5;
        --text-dark: #713600;
        --text-muted: rgba(113, 54, 0, 0.7);
        --shadow-sm: 0 2px 4px rgba(113, 54, 0, 0.08);
        --shadow-md: 0 4px 6px rgba(113, 54, 0, 0.12);
        --shadow-lg: 0 8px 25px rgba(113, 54, 0, 0.15);
        --border-radius: 8px;
        --transition: all 0.2s ease;
    }

    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* ============================================
       PROFESSIONAL SIDEBAR STYLES - NO WHITE BACKGROUNDS
       ============================================ */

    /* Sidebar Base Styling */
    .offcanvas {
        background: var(--primary-color) !important;
        border: none;
        box-shadow: -8px 0 30px rgba(113, 54, 0, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* Header Styling */
    .offcanvas-header {
        background: var(--primary-color) !important;
        color: var(--text-dark) !important;
        border-bottom: 3px solid var(--warm-brown) !important;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(168, 113, 58, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .offcanvas-title {
        color: var(--dark-brown) !important;
        font-weight: 700;
        letter-spacing: -0.025em;
        font-size: 1.25rem;
        line-height: 1.2;
        text-shadow: 0 1px 2px rgba(168, 113, 58, 0.1);
    }

    .offcanvas-header .text-muted {
        color: var(--text-muted) !important;
        font-size: 0.85rem;
        font-weight: 500;
        letter-spacing: -0.01em;
    }

    .offcanvas-header .btn-close {
        background: transparent;
        border: 2px solid var(--warm-brown);
        border-radius: var(--border-radius);
        opacity: 0.8;
        transition: var(--transition);
        padding: 0.5rem;
        color: var(--dark-brown);
    }

    .offcanvas-header .btn-close:hover {
        opacity: 1;
        background: var(--warm-brown);
    }

    .offcanvas-header .rounded-circle {
        background: var(--warm-brown) !important;
        border: 2px solid var(--secondary-color);
        box-shadow: var(--shadow-md);
        color: var(--cream-white) !important;
        font-weight: 600;
    }

    /* Profile Photo Styling */
    .offcanvas-header img.rounded-circle {
        border: 2px solid var(--secondary-color);
        box-shadow: var(--shadow-md);
    }

    /* Statistics Section - REMOVED WHITE BACKGROUND */
    .offcanvas-body .bg-light {
        background: var(--primary-color) !important;
        border-bottom: 3px solid var(--warm-brown) !important;
        padding: 1.5rem 1rem !important;
    }

    /* Statistics Cards - TRANSPARENT/SOFT BACKGROUND */
    .offcanvas-body .bg-light .bg-white {
        background: rgba(168, 113, 58, 0.1) !important; /* Semi-transparent brown */
        border: 2px solid rgba(168, 113, 58, 0.25);
        border-radius: var(--border-radius);
        transition: var(--transition);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .offcanvas-body .bg-light .bg-white:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--warm-brown);
        background: rgba(168, 113, 58, 0.2) !important; /* Slightly more opaque on hover */
    }

    /* Status Colors - Professional */
    .offcanvas-body .text-primary {
        color: var(--secondary-color) !important;
        font-weight: 700;
    }

    .offcanvas-body .text-warning {
        color: var(--warm-brown) !important;
        font-weight: 700;
    }

    .offcanvas-body .text-success {
        color: var(--dark-brown) !important;
        font-weight: 700;
    }

    .offcanvas-body .bg-light .bg-white .text-muted {
        color: var(--text-muted) !important;
        font-weight: 500;
        font-size: 0.8rem;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }

    /* Navigation Styling */
    .offcanvas-body nav {
        background: transparent;
        padding: 1.5rem 1rem !important;
    }

    /* Section Headers */
    .offcanvas-body h6 {
        color: var(--dark-brown) !important;
        font-weight: 700;
        letter-spacing: 0.05em;
        font-size: 0.8rem;
        text-transform: uppercase;
        margin-bottom: 1rem !important;
        padding-left: 0.5rem !important;
        position: relative;
        text-shadow: 0 1px 2px rgba(168, 113, 58, 0.1);
    }

    .offcanvas-body h6::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 16px;
        background: var(--warm-brown);
        border-radius: 2px;
        box-shadow: 0 1px 3px rgba(168, 113, 58, 0.3);
    }

    /* List Group Styling - TRANSPARENT BACKGROUND */
    .list-group-item {
        background: transparent !important; /* Made transparent */
        border: 2px solid rgba(168, 113, 58, 0.25) !important;
        margin-bottom: 0.5rem;
        transition: var(--transition);
        color: var(--dark-brown) !important;
        font-weight: 500;
        font-size: 0.95rem;
        border-radius: var(--border-radius) !important;
        padding: 0.75rem 1rem !important;
        position: relative;
        letter-spacing: -0.01em;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .list-group-item:hover {
        background: var(--warm-brown) !important; /* Brown on hover */
        border-color: var(--warm-brown) !important;
        color: var(--cream-white) !important;
        box-shadow: 0 2px 8px rgba(168, 113, 58, 0.15);
        font-weight: 600;
    }

    .list-group-item.active {
        background: var(--secondary-color) !important; /* Brown when active */
        border-color: var(--secondary-color) !important;
        color: var(--cream-white) !important;
        box-shadow: var(--shadow-md);
        font-weight: 600;
    }

    .list-group-item.active:hover {
        background: var(--dark-brown) !important;
        border-color: var(--dark-brown) !important;
        box-shadow: 0 4px 12px rgba(74, 44, 20, 0.2);
    }

    /* Icon Styling */
    .list-group-item i {
        color: var(--warm-brown) !important;
        transition: var(--transition);
        width: 18px;
        text-align: center;
        font-size: 0.9rem !important;
        opacity: 0.8;
    }

    .list-group-item:hover i {
        color: var(--cream-white) !important;
        opacity: 1;
    }

    .list-group-item.active i {
        color: var(--cream-white) !important;
        opacity: 1;
    }

    /* Badge Styling - TRANSPARENT BACKGROUND */
    .list-group-item .badge {
        background: rgba(168, 113, 58, 0.2) !important; /* Semi-transparent */
        color: var(--dark-brown) !important;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        transition: var(--transition);
        border: 1px solid var(--warm-brown);
    }

    .list-group-item.active .badge {
        background: rgba(255, 255, 255, 0.25) !important;
        color: var(--cream-white) !important;
        border-color: rgba(255, 255, 255, 0.4);
    }

    .list-group-item:hover .badge {
        background: var(--secondary-color) !important;
        color: var(--cream-white) !important;
    }

    /* Footer Styling */
    .offcanvas-body .bg-footer {
        background: var(--primary-color) !important;
        border-top: 3px solid var(--warm-brown) !important;
        padding: 1.5rem !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* Footer Button - TRANSPARENT BACKGROUND */
    .offcanvas-body .btn-outline-danger {
        border: 2px solid #dc3545 !important;
        color: #dc3545 !important;
        background: transparent !important; /* Made transparent */
        font-weight: 600;
        transition: var(--transition);
        border-radius: var(--border-radius);
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        letter-spacing: -0.01em;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .offcanvas-body .btn-outline-danger:hover {
        background: #dc3545 !important; /* Red on hover */
        color: var(--cream-white) !important;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.15);
        border-color: #dc3545 !important;
    }

    .offcanvas-body .btn-outline-danger:active,
    .offcanvas-body .btn-outline-danger:focus {
        background: #dc3545 !important; /* Red when clicked/focused */
        color: var(--cream-white) !important;
        border-color: #dc3545 !important;
    }

    .offcanvas-body .btn-outline-danger i {
        transition: var(--transition);
        color: inherit !important;
        font-size: 0.9rem !important;
        opacity: 0.8;
    }

    .offcanvas-body .btn-outline-danger:hover i {
        opacity: 1;
    }

    /* Copyright Text */
    .text-copyright {
        color: var(--text-muted) !important;
        font-size: 0.8rem;
        font-weight: 500;
        text-align: center;
        letter-spacing: 0.02em;
        text-shadow: 0 1px 2px rgba(168, 113, 58, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 575.98px) {
        .offcanvas {
            width: 280px !important;
        }
        
        .offcanvas-header {
            padding: 1rem;
        }
        
        .offcanvas-body nav {
            padding: 1rem !important;
        }
        
        .offcanvas-body .bg-light {
            padding: 1rem !important;
        }
        
        .offcanvas-body .bg-footer {
            padding: 1rem !important;
        }
    }

    /* Custom Scrollbar - Matching theme */
    .offcanvas-body nav::-webkit-scrollbar {
        width: 6px;
    }

    .offcanvas-body nav::-webkit-scrollbar-track {
        background: rgba(168, 113, 58, 0.1);
        border-radius: 3px;
    }

    .offcanvas-body nav::-webkit-scrollbar-thumb {
        background: var(--warm-brown);
        border-radius: 3px;
        transition: var(--transition);
    }

    .offcanvas-body nav::-webkit-scrollbar-thumb:hover {
        background: var(--secondary-color);
    }

    /* Section separators */
    .offcanvas-body .mb-3:not(:last-child) {
        border-bottom: 1px solid rgba(168, 113, 58, 0.15);
        padding-bottom: 1rem;
        margin-bottom: 1.5rem !important;
    }

    /* Accessibility improvements */
    .list-group-item:focus {
        outline: 2px solid var(--warm-brown);
        outline-offset: 2px;
    }

    .offcanvas-header .btn-close:focus {
        outline: 2px solid var(--warm-brown);
        outline-offset: 2px;
    }
</style>