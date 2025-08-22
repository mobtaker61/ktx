<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - KTX')</title>

    <!-- Google Tag Manager -->
    <x-google-tag-manager />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <!-- Template Main CSS File -->
    <style>
        :root {
            --primary-color: #0ea2bd;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, #0ea2bd 100%);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h3 {
            color: white;
            margin: 0;
            font-size: 1.5rem;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
            border-left-color: white;
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
        }

        /* Menu Sections */
        .menu-section {
            padding: 15px 20px 5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .menu-section-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Submenu Styles */
        .submenu {
            position: relative;
        }

        .submenu-toggle {
            display: flex !important;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .submenu-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .submenu-arrow {
            transition: transform 0.3s ease;
            font-size: 0.8rem;
        }

        .submenu.active .submenu-arrow {
            transform: rotate(180deg);
        }

        .submenu-items {
            display: none;
            background-color: rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease;
        }

        .submenu.active .submenu-items {
            display: block;
            max-height: 500px;
        }

        .submenu-items li a {
            padding-left: 50px;
            font-size: 0.9rem;
        }

        .submenu-items li a i {
            font-size: 0.8rem;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
        }

        .top-bar {
            background: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .content-wrapper {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .stats-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #0b8ba3;
            border-color: #0b8ba3;
        }

        .table th {
            background-color: var(--secondary-color);
            border-color: #dee2e6;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(14, 162, 189, 0.25);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-cogs"></i> KTX Admin</h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a></li>
                <!-- Product Management Section -->
                <li class="submenu">
                    <a href="#" class="submenu-toggle {{ request()->routeIs('admin.products.*') || request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="fas fa-box"></i> Products
                        <i class="fas fa-chevron-down submenu-arrow"></i>
                    </a>
                    <ul class="submenu-items">
                        <li><a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                            <i class="fas fa-list"></i> All Products
                        </a></li>
                        <li><a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                            <i class="fas fa-tags"></i> Categories
                        </a></li>
                        <li><a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <i class="fas fa-cogs"></i> Services
                        </a></li>
                    </ul>
                </li>
                <!-- Portfolio Section -->
                <li class="submenu">
                    <a href="#" class="submenu-toggle {{ request()->routeIs('admin.portfolios.*') || request()->routeIs('admin.portfolio-categories.*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase"></i> Portfolio
                        <i class="fas fa-chevron-down submenu-arrow"></i>
                    </a>
                    <ul class="submenu-items">
                        <li><a href="{{ route('admin.portfolios.index') }}" class="{{ request()->routeIs('admin.portfolios.index') ? 'active' : '' }}">
                            <i class="fas fa-list"></i> All Portfolios
                        </a></li>
                        <li><a href="{{ route('admin.portfolio-categories.index') }}" class="{{ request()->routeIs('admin.portfolio-categories.*') ? 'active' : '' }}">
                            <i class="fas fa-tags"></i> Categories
                        </a></li>
                    </ul>
                </li>
                <!-- Content Management Section -->
                <li class="submenu">
                    <a href="#" class="submenu-toggle {{ request()->routeIs('admin.team.*') || request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i> Content
                        <i class="fas fa-chevron-down submenu-arrow"></i>
                    </a>
                    <ul class="submenu-items">
                        <li><a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                            <i class="fas fa-newspaper"></i> News
                        </a></li>
                        <li><a href="{{ route('admin.team.index') }}" class="{{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i> Team Members
                        </a></li>
                        <li><a href="{{ route('admin.certificates.index') }}" class="{{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                            <i class="fas fa-certificate"></i> Certificates
                        </a></li>
                    </ul>
                </li>
                <!-- Career Management Section -->
                <li class="submenu">
                    <a href="#" class="submenu-toggle {{ request()->routeIs('admin.career-opportunities.*') || request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase"></i> Careers
                        <i class="fas fa-chevron-down submenu-arrow"></i>
                    </a>
                    <ul class="submenu-items">
                        <li><a href="{{ route('admin.career-opportunities.index') }}" class="{{ request()->routeIs('admin.career-opportunities.*') ? 'active' : '' }}">
                            <i class="fas fa-list"></i> Job Opportunities
                        </a></li>
                        <li><a href="{{ route('admin.job-applications.index') }}" class="{{ request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt"></i> Applications
                        </a></li>
                    </ul>
                </li>

                <!-- System Section -->
                <li class="submenu">
                    <a href="#" class="submenu-toggle {{ request()->routeIs('admin.contacts.*') || request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i> System
                        <i class="fas fa-chevron-down submenu-arrow"></i>
                    </a>
                    <ul class="submenu-items">
                        <li><a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i> Contact Messages
                        </a></li>
                        <li><a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> Settings
                        </a></li>
                    </ul>
                </li>
                <li><a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i> View Site
                </a></li>
                <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a></li>
            </ul>
        </div>
    </div>

    <!-- Google Tag Manager (noscript) -->
    <x-google-tag-manager-noscript />

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-outline-primary d-md-none" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
            </div>
            <div>
                <span class="text-muted">Welcome, Admin</span>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        // Submenu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const submenuToggles = document.querySelectorAll('.submenu-toggle');

            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const submenu = this.closest('.submenu');
                    const isActive = submenu.classList.contains('active');

                    // Close all other submenus
                    document.querySelectorAll('.submenu').forEach(menu => {
                        menu.classList.remove('active');
                    });

                    // Toggle current submenu
                    if (!isActive) {
                        submenu.classList.add('active');
                    }
                });
            });

            // Auto-expand submenu if current page is in it
            const currentPath = window.location.pathname;
            const activeSubmenu = document.querySelector(`.submenu a[href*="${currentPath}"]`);
            if (activeSubmenu) {
                const submenu = activeSubmenu.closest('.submenu');
                if (submenu) {
                    submenu.classList.add('active');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
