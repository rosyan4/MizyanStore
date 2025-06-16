{{-- resources/views/admin/partials/sidebar.blade.php --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="https://via.placeholder.com/33x33?text=MS" alt="Mizyan Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Mizyan Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                @endif
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block user-name">{{ Auth::user()->name }}</a>
                <small class="user-role">Administrator</small>
            </div>
        </div>

        <!-- Admin Statistics -->
        <div class="admin-stats mb-3">
            <div class="row g-2">
                <div class="col-4">
                    <div class="stat-card stat-warning">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number">{{ \App\Models\Order::where('status', 'pending')->count() }}</span>
                            <span class="stat-label">Tertunda</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-card stat-info">
                        <div class="stat-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number">{{ \App\Models\Contact::where('is_read', false)->count() }}</span>
                            <span class="stat-label">Pesan</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-card stat-success">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number">{{ \App\Models\User::count() }}</span>
                            <span class="stat-label">Pengguna</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Section -->
                <li class="nav-header">DASBOR</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasbor</p>
                    </a>
                </li>

                <!-- Content Management Section -->
                <li class="nav-header">MANAJEMEN KONTEN</li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blog</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Galeri</p>
                    </a>
                </li>

                <!-- E-Commerce Section -->
                <li class="nav-header">E-COMMERCE</li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pesanan</p>
                    </a>
                </li>

                <!-- Communication Section -->
                <li class="nav-header">KOMUNIKASI</li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Pesan
                            @if($unreadCount = \App\Models\Contact::where('is_read', false)->count())
                                <span class="badge badge-warning right">{{ $unreadCount }}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-quote-left"></i>
                        <p>Testimoni</p>
                    </a>
                </li>

                <!-- User Management Section -->
                <li class="nav-header">MANAJEMEN PENGGUNA</li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>

                <!-- Payment Section -->
            </ul>
        </nav>
    </div>
</aside>

<style>
/* Custom Sidebar Styles - Clean & Professional */
:root {
    --primary-color: #4e73df;
    --primary-dark: #3d5dd7;
    --secondary-color: #858796;
    --success-color: #1cc88a;
    --info-color: #36b9cc;
    --warning-color: #f6c23e;
    --danger-color: #e74a3b;
    --light-color: #f8f9fc;
    --dark-color: #2c3e50;
    --sidebar-bg: #34495e;
    --sidebar-dark: #2c3e50;
}

/* Main Sidebar */
.main-sidebar {
    background: linear-gradient(180deg, var(--sidebar-bg) 0%, var(--sidebar-dark) 100%) !important;
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Brand Link */
.brand-link {
    background: rgba(255, 255, 255, 0.05) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 1rem 1.25rem !important;
    display: flex;
    align-items: center;
    white-space: nowrap;
    overflow: hidden;
}

.brand-text {
    color: #ffffff !important;
    font-weight: 600 !important;
    font-size: 1.1rem;
    margin-left: 0.5rem;
    transition: opacity 0.3s ease;
}

.brand-image {
    width: 35px !important;
    height: 35px !important;
    flex-shrink: 0;
}

/* Hide brand text when collapsed but keep icon */
.sidebar-mini.sidebar-collapse .brand-text {
    opacity: 0;
    width: 0;
    margin-left: 0;
    overflow: hidden;
}

.sidebar-mini.sidebar-collapse .brand-link {
    justify-content: center;
    padding: 1rem 0 !important;
    display: flex !important;
    align-items: center;
}

/* User Panel */
.user-panel {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 8px;
    margin: 1rem;
    padding: 0.75rem 1rem 1rem 1rem !important;
    border: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 1.5rem !important;
}

.user-panel .image {
    margin-right: 0.75rem;
    flex-shrink: 0;
}

.user-panel .info {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Collapsed sidebar user panel - Fixed positioning */
.sidebar-mini.sidebar-collapse .user-panel {
    margin: 0.5rem 0 !important;
    padding: 0.5rem !important;
    text-align: center;
    display: flex !important;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.sidebar-mini.sidebar-collapse .user-panel .info {
    display: none;
}

.sidebar-mini.sidebar-collapse .user-panel .image {
    margin: 0 !important;
    display: flex;
    justify-content: center;
    width: 100%;
}

.user-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.875rem;
}

.user-name {
    color: #ffffff !important;
    font-weight: 500;
    text-decoration: none !important;
    font-size: 0.9rem;
    display: block;
    padding: 0.4rem 0.6rem;
    border-radius: 5px;
    transition: all 0.3s ease;
    margin-bottom: 0.4rem;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    line-height: 1.2;
}

.user-name:hover {
    color: #ffffff !important;
    background: var(--primary-color) !important;
    text-decoration: none !important;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.user-role {
    color: rgba(255, 255, 255, 0.6) !important;
    font-size: 0.75rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    display: inline-block;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Search */
.sidebar-search {
    margin: 0 1rem;
}

/* Hide search when collapsed */
.sidebar-mini.sidebar-collapse .sidebar-search {
    display: none;
}

.form-control-sidebar {
    background: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    color: #ffffff !important;
    border-radius: 6px 0 0 6px !important;
    font-size: 0.875rem;
}

.form-control-sidebar::placeholder {
    color: rgba(255, 255, 255, 0.5) !important;
}

.form-control-sidebar:focus {
    background: rgba(255, 255, 255, 0.15) !important;
    border-color: var(--primary-color) !important;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.btn-sidebar {
    background: var(--primary-color) !important;
    border: 1px solid var(--primary-color) !important;
    color: #ffffff !important;
    border-radius: 0 6px 6px 0 !important;
}

.btn-sidebar:hover {
    background: var(--primary-dark) !important;
}

/* Admin Stats */
.admin-stats {
    margin: 0 1rem;
}

/* Hide stats when collapsed */
.sidebar-mini.sidebar-collapse .admin-stats {
    display: none;
}

.stat-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    padding: 0.75rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
    min-height: 70px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.stat-card.stat-warning {
    border-left: 3px solid var(--warning-color);
}

.stat-card.stat-info {
    border-left: 3px solid var(--info-color);
}

.stat-card.stat-success {
    border-left: 3px solid var(--success-color);
}

.stat-icon {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.stat-warning .stat-icon { color: var(--warning-color); }
.stat-info .stat-icon { color: var(--info-color); }
.stat-success .stat-icon { color: var(--success-color); }

.stat-number {
    display: block;
    font-size: 1.1rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
}

.stat-label {
    display: block;
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    font-weight: 500;
    margin-top: 0.25rem;
}

/* Navigation Headers */
.nav-header {
    color: rgba(255, 255, 255, 0.4) !important;
    font-weight: 600;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 1rem 1.25rem 0.5rem 1.25rem !important;
    margin-top: 0.5rem;
    white-space: nowrap;
    overflow: hidden;
}

.nav-header:first-of-type {
    margin-top: 0;
}

/* Hide nav headers when collapsed */
.sidebar-mini.sidebar-collapse .nav-header {
    display: none;
}

/* Navigation Items - Fixed centering for collapsed mode */
.nav-sidebar .nav-link {
    color: rgba(255, 255, 255, 0.8) !important;
    padding: 0.75rem 1.25rem !important;
    font-weight: 500;
    font-size: 0.9rem;
    border-radius: 0;
    margin: 0 0.75rem 0.25rem 0.75rem;
    border-radius: 6px;
    display: flex;
    align-items: center;
    white-space: nowrap;
}

/* Sidebar collapsed state - Properly centered icons */
.sidebar-mini.sidebar-collapse .nav-sidebar .nav-link {
    padding: 0.75rem 0 !important;
    margin: 0 0 0.25rem 0 !important;
    text-align: center;
    justify-content: center;
    display: flex !important;
    align-items: center;
    width: 100%;
}

.sidebar-mini.sidebar-collapse .nav-sidebar .nav-link .nav-icon {
    margin: 0 !important;
    font-size: 1.1rem;
    width: auto;
    text-align: center;
    flex-shrink: 0;
}

.sidebar-mini.sidebar-collapse .nav-sidebar .nav-link p {
    display: none;
}

.sidebar-mini.sidebar-collapse .nav-sidebar .nav-link .right {
    display: none;
}

.sidebar-mini.sidebar-collapse .nav-sidebar .badge {
    display: none;
}

.nav-sidebar .nav-link:hover {
    color: #ffffff !important;
    background: rgba(255, 255, 255, 0.1) !important;
}

.nav-sidebar .nav-link.active {
    background: var(--primary-color) !important;
    color: #ffffff !important;
    font-weight: 600;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-sidebar .nav-link.active:hover {
    background: var(--primary-dark) !important;
}

/* Icons */
.nav-icon {
    margin-right: 0.75rem !important;
    width: 1.2rem;
    text-align: center;
    flex-shrink: 0;
    display: inline-block;
}

/* TreeView */
.nav-item.menu-open > .nav-link {
    background: rgba(255, 255, 255, 0.05) !important;
}

.nav-treeview {
    background: rgba(0, 0, 0, 0.1);
    margin: 0.25rem 0.75rem 0 0.75rem;
    border-radius: 6px;
    padding: 0.25rem 0;
}

.nav-treeview .nav-link {
    padding: 0.5rem 1rem 0.5rem 2.5rem !important;
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.7) !important;
    margin: 0 0.5rem 0.1rem 0.5rem;
    display: flex;
    align-items: center;
}

.nav-treeview .nav-link:hover {
    color: rgba(255, 255, 255, 0.9) !important;
    background: rgba(255, 255, 255, 0.08) !important;
}

.nav-treeview .nav-link.active {
    background: rgba(78, 115, 223, 0.3) !important;
    color: #ffffff !important;
}

/* Hide submenu when collapsed */
.sidebar-mini.sidebar-collapse .nav-treeview {
    display: none !important;
}

.sidebar-mini.sidebar-collapse .nav-item.menu-open > .nav-link {
    background: rgba(255, 255, 255, 0.1) !important;
}

/* Badges */
.badge {
    font-size: 0.65rem;
    font-weight: 600;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
}

.badge-warning {
    background-color: var(--warning-color) !important;
    color: #000 !important;
}

/* Scrollbar */
.sidebar::-webkit-scrollbar {
    width: 4px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 2px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}

/* Responsive */
@media (max-width: 768px) {
    .admin-stats .stat-card {
        min-height: 60px;
        padding: 0.5rem;
    }
    
    .stat-number {
        font-size: 1rem;
    }
    
    .stat-label {
        font-size: 0.65rem;
    }
    
    .nav-sidebar .nav-link {
        padding: 0.65rem 1rem !important;
        font-size: 0.85rem;
    }
    
    .brand-text {
        font-size: 1rem;
    }
}
</style>