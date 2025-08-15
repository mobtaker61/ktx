<!-- Navbar Start -->
<div class="container-fluid sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('img/base/ktx_logo_icon_dark.png') }}" alt="KTX" class="img-fluid" style="width: 100px; height: auto;">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

                    <!-- About Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('about*') || request()->routeIs('team*') || request()->routeIs('certificates*') || request()->routeIs('contact*') ? 'active' : '' }}"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">Our Team</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('certificates') ? 'active' : '' }}" href="{{ route('certificates') }}">Certificates</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <a href="{{ route('products') }}" class="nav-item nav-link {{ request()->routeIs('products*') ? 'active' : '' }}">Products</a>
                    <a href="{{ route('portfolio') }}" class="nav-item nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a>
                    <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                </div>
                <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                    data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
