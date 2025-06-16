<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <i class="fas fa-store brand-icon"></i>
            <span class="brand-text">Mizyan Store</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Main Navigation -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Left Side Menu -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                        <i class="fas fa-tshirt nav-icon"></i>
                        <span>Produk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                        <i class="fas fa-blog nav-icon"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                        <i class="fas fa-images nav-icon"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope nav-icon"></i>
                        <span>Kontak</span>
                    </a>
                </li>
            </ul>

            <!-- Right Side Menu -->
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt nav-icon"></i>
                            <span>Login</span>
                        </a>
                    </li>
                @endguest

                <!-- Sidebar Toggle Button -->
                <li class="nav-item">
                    <button class="btn btn-outline-primary sidebar-toggle" 
                            type="button" 
                            data-bs-toggle="offcanvas" 
                            data-bs-target="#sidebar"
                            aria-label="Toggle sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar -->
@include('partials.sidebar')

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
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* ============================================
       PROFESSIONAL NAVBAR STYLES
       ============================================ */

    /* Navbar Base - Solid warm background */
    .navbar {
        background: var(--primary-color) !important;
        border-bottom: 3px solid var(--warm-brown);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 0.75rem 0;
        min-height: 70px;
        z-index: 1030;
        box-shadow: 0 4px 20px rgba(168, 113, 58, 0.15);
    }

    .navbar .container {
        padding: 0 1.5rem;
    }

    /* Brand Styling - Enhanced with warm colors */
    .navbar-brand {
        font-weight: 700;
        font-size: 1.35rem;
        color: var(--dark-brown) !important;
        text-decoration: none;
        padding: 0.5rem 0;
        transition: var(--transition);
        letter-spacing: -0.025em;
        line-height: 1.2;
        text-shadow: 0 1px 2px rgba(168, 113, 58, 0.1);
    }

    .navbar-brand:hover {
        color: var(--secondary-color) !important;
        transform: translateY(-1px);
        text-shadow: 0 2px 4px rgba(168, 113, 58, 0.2);
    }

    .brand-icon {
        font-size: 1.5rem !important;
        color: var(--warm-brown) !important;
        margin-right: 0.75rem !important;
        transition: var(--transition);
        filter: drop-shadow(0 1px 2px rgba(168, 113, 58, 0.2));
    }

    .navbar-brand:hover .brand-icon {
        color: var(--secondary-color) !important;
        transform: scale(1.1);
        filter: drop-shadow(0 2px 4px rgba(168, 113, 58, 0.3));
    }

    .brand-text {
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    /* Navigation Links - Updated with warm background */
    .navbar-nav {
        gap: 0.25rem;
    }

    .navbar-nav .nav-link {
        color: var(--dark-brown) !important;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0.6rem 1rem !important;
        border-radius: var(--border-radius);
        transition: var(--transition);
        position: relative;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        line-height: 1.4;
        letter-spacing: -0.01em;
        background: transparent;
        backdrop-filter: blur(5px);
    }

    .navbar-nav .nav-link:hover {
        color: var(--cream-white) !important;
        background: var(--warm-brown);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(168, 113, 58, 0.25);
    }

    .navbar-nav .nav-link.active {
        color: var(--cream-white) !important;
        background: var(--secondary-color);
        box-shadow: var(--shadow-md);
        font-weight: 600;
    }

    .navbar-nav .nav-link.active:hover {
        background: var(--dark-brown);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(74, 44, 20, 0.3);
    }

    /* Navigation Icons */
    .nav-icon {
        font-size: 0.9rem !important;
        color: inherit !important;
        opacity: 0.8;
        transition: var(--transition);
        width: 16px;
        text-align: center;
    }

    .navbar-nav .nav-link:hover .nav-icon,
    .navbar-nav .nav-link.active .nav-icon {
        opacity: 1;
        transform: scale(1.1);
    }

    /* Dropdown Styling - Transparent background */
    .dropdown-menu {
        background: var(--primary-color);
        border: 2px solid var(--warm-brown);
        border-radius: var(--border-radius);
        box-shadow: 0 8px 25px rgba(168, 113, 58, 0.2);
        padding: 0.5rem 0;
        margin-top: 0.5rem;
        min-width: 200px;
        animation: fadeInUp 0.2s ease-out;
        backdrop-filter: blur(10px);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item {
        color: var(--dark-brown) !important;
        padding: 0.65rem 1.25rem;
        font-weight: 500;
        font-size: 0.9rem;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-radius: 0;
        line-height: 1.4;
        background: transparent;
    }

    .dropdown-item:hover {
        background: var(--warm-brown);
        color: var(--cream-white) !important;
        transform: translateX(4px);
        box-shadow: 0 2px 8px rgba(168, 113, 58, 0.15);
    }

    /* Active dropdown item styling */
    .dropdown-item.active-dropdown-item {
        background: var(--secondary-color);
        color: var(--cream-white) !important;
        font-weight: 600;
        box-shadow: var(--shadow-sm);
    }

    .dropdown-item.active-dropdown-item:hover {
        background: var(--dark-brown);
        color: var(--cream-white) !important;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(74, 44, 20, 0.25);
    }

    .dropdown-item.active-dropdown-item .dropdown-icon {
        color: var(--cream-white) !important;
        opacity: 1;
        transform: scale(1.1);
    }

    .dropdown-icon {
        font-size: 0.85rem !important;
        color: var(--warm-brown) !important;
        opacity: 0.8;
        transition: var(--transition);
        width: 16px;
        text-align: center;
    }

    .dropdown-item:hover .dropdown-icon {
        color: var(--cream-white) !important;
        opacity: 1;
        transform: scale(1.1);
    }

    /* Dropdown Toggle Arrow */
    .dropdown-toggle::after {
        margin-left: 0.5rem;
        font-size: 0.75rem;
        opacity: 0.7;
        transition: var(--transition);
    }

    .dropdown.show .dropdown-toggle::after {
        transform: rotate(180deg);
        opacity: 1;
    }

    /* Sidebar Toggle Button - Transparent background */
    .sidebar-toggle {
        border: 2px solid var(--warm-brown);
        color: var(--dark-brown);
        background: transparent;
        border-radius: var(--border-radius);
        padding: 0.6rem 0.8rem;
        transition: var(--transition);
        font-weight: 500;
        margin-left: 0.5rem;
        backdrop-filter: blur(5px);
    }

    .sidebar-toggle:hover {
        background: var(--warm-brown);
        border-color: var(--warm-brown);
        color: var(--cream-white);
        box-shadow: 0 4px 12px rgba(168, 113, 58, 0.25);
        transform: translateY(-1px);
    }

    .sidebar-toggle i {
        font-size: 1rem;
    }

    /* Mobile Toggle Button - Updated with warm theme */
    .navbar-toggler {
        border: 2px solid var(--warm-brown);
        border-radius: var(--border-radius);
        padding: 0.5rem;
        background: var(--primary-color);
        transition: var(--transition);
    }

    .navbar-toggler:hover {
        border-color: var(--dark-brown);
        background: var(--primary-color);
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 2px rgba(168, 113, 58, 0.5);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2874, 44, 20, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        width: 1.2em;
        height: 1.2em;
    }

    /* Responsive Design - Updated mobile styles */
    @media (max-width: 991.98px) {

        
        .navbar-nav {
            gap: 0.5rem;
        }
        
        .navbar-nav .nav-link {
            color: var(--dark-brown) !important;
            background: var(--soft-cream);
            border: 1px solid rgba(168, 113, 58, 0.2);
            font-weight: 500;
            margin-bottom: 0.25rem;
            justify-content: flex-start;
        }
        
        .navbar-nav .nav-link:hover {
            background: var(--warm-brown);
            color: var(--cream-white) !important;
            border-color: var(--warm-brown);
        }
        
        .navbar-nav .nav-link.active {
            background: var(--secondary-color);
            color: var(--cream-white) !important;
            border-color: var(--secondary-color);
        }

        .dropdown-menu {
            box-shadow: none;
            border: 1px solid var(--warm-brown);
            background: var(--primary-color);
            margin-top: 0.25rem;
            margin-left: 1rem;
        }

        .sidebar-toggle {
            margin-left: 0;
            margin-top: 0.75rem;
            width: 100%;
            justify-content: center;
        }

        .navbar-nav:last-child {
            border-top: 2px solid var(--warm-brown);
            padding-top: 1rem;
            margin-top: 0.75rem;
        }
    }

    @media (max-width: 576px) {
        .navbar .container {
            padding: 0 1rem;
        }
        
        .navbar-brand {
            font-size: 1.25rem;
        }
        
        .brand-icon {
            font-size: 1.3rem !important;
            margin-right: 0.5rem !important;
        }
    }

    /* Accessibility Improvements */
    .navbar-nav .nav-link:focus,
    .dropdown-item:focus,
    .sidebar-toggle:focus {
        outline: 2px solid var(--warm-brown);
        outline-offset: 2px;
    }

    /* Smooth scrolling for sticky navbar */
    html {
        scroll-padding-top: 80px;
    }

    /* Loading state for better UX */
    .navbar-nav .nav-link.loading {
        pointer-events: none;
        opacity: 0.6;
    }

    .navbar-nav .nav-link.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        right: 8px;
        width: 12px;
        height: 12px;
        border: 2px solid transparent;
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        transform: translateY(-50%);
    }

    @keyframes spin {
        to {
            transform: translateY(-50%) rotate(360deg);
        }
    }

    /* Remove gradient decorative elements */
</style>