<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Logout Button -->
        <li class="nav-item">
            <form method="POST" action="{{ route('admin.logout') }}" id="logoutForm">
                @csrf
                <button type="button" class="nav-link btn btn-link logout-button" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

<style>
    :root {
        --primary-color: #8B6E2F;
        --accent-color: #DAA520;
        --text-dark: #2F2F2F;
        --text-light: #ffffff;
        --border-light: rgba(139, 110, 47, 0.15);
        --bg-light: rgba(139, 110, 47, 0.05);
        --shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .main-header.navbar {
        background: linear-gradient(to right, #ffffff, #f8f9fa) !important;
        border-bottom: 2px solid var(--primary-color);
        box-shadow: var(--shadow);
        padding: 0.75rem 1rem;
        min-height: 60px;
    }

    .navbar-nav .nav-link {
        color: var(--text-dark) !important;
        font-weight: 500;
        padding: 0.6rem 1rem !important;
        border-radius: 6px;
        margin: 0 0.2rem;
        border: 1px solid transparent;
    }

    .navbar-nav .nav-link:hover {
        background: var(--bg-light);
        color: var(--primary-color) !important;
        border-color: var(--border-light);
    }

    .nav-link[data-widget="pushmenu"] {
        background: var(--bg-light);
        border-color: var(--border-light);
        color: var(--primary-color) !important;
    }

    .nav-link[data-widget="pushmenu"]:hover {
        background: var(--primary-color);
        color: var(--text-light) !important;
        border-color: var(--primary-color);
    }

    .btn-link.logout-button {
        background: transparent !important;
        border: none !important;
        color: var(--text-dark) !important;
        text-decoration: none !important;
        transition: background 0.3s ease;
    }

    .btn-link.logout-button:hover {
        background: var(--primary-color) !important;
        color: var(--text-light) !important;
    }

    .navbar-nav.ml-auto .nav-link {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        position: relative;
    }

    .navbar-nav.ml-auto .nav-link:hover {
        background: var(--primary-color);
        color: var(--text-light) !important;
        border-color: var(--primary-color);
    }

    @media (max-width: 768px) {
        .main-header.navbar {
            padding: 0.5rem;
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 0.75rem !important;
            margin: 0 0.1rem;
        }
    }

    @media (max-width: 576px) {
        .navbar-nav.ml-auto .nav-item:not(:last-child) {
            display: none;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.querySelector('[data-widget="pushmenu"]');
    const body = document.body;

    if (sidebarToggle) {
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const isCollapsed = body.classList.contains('sidebar-collapse');
                    localStorage.setItem('sidebar-collapsed', isCollapsed);
                }
            });
        });

        observer.observe(body, {
            attributes: true,
            attributeFilter: ['class']
        });

        const savedState = localStorage.getItem('sidebar-collapsed');
        if (savedState === 'true') {
            body.classList.add('sidebar-collapse');
        }
    }
});

// Konfirmasi logout
function confirmLogout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        document.getElementById('logoutForm').submit();
    }
}
</script>
