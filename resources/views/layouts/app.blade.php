<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KTX.Tech')</title>

    <!-- AI Optimization Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'KTX - Leading Industrial Compressor Solutions. Expert engineering, reliable products, and comprehensive support for your industrial needs.')">
    <meta name="keywords" content="@yield('meta_keywords', 'industrial compressor, air compressor, screw compressor, compressor parts, compressor service, KTX, industrial equipment')">
    <meta name="author" content="KTX Compressor">
    <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- AI-Friendly Meta Tags -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Open Graph for Social Media AI -->
    <meta property="og:title" content="@yield('og_title', 'KTX - Industrial Compressor Solutions')">
    <meta property="og:description" content="@yield('og_description', 'Leading provider of industrial compressors, parts, and services. Expert engineering and reliable solutions.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="@yield('og_image', asset('img/base/ktx_logo.png'))">
    <meta property="og:site_name" content="KTX Compressor">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Twitter Card for AI Crawlers -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'KTX - Industrial Compressor Solutions')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Leading provider of industrial compressors, parts, and services. Expert engineering and reliable solutions.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('img/base/ktx_logo.png'))">

    <!-- AI-Specific Meta Tags -->
    <meta name="ai-crawler-friendly" content="true">
    <meta name="content-type" content="industrial-compressor-solutions">
    <meta name="business-category" content="industrial-equipment">
    <meta name="service-area" content="worldwide">
    <meta name="expertise" content="compressor-engineering, industrial-solutions, technical-support">
    <meta name="content-language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="content-region" content="Middle East, Worldwide">
    <meta name="content-industry" content="Industrial Manufacturing, Compressor Technology">

    <!-- Google Tag Manager -->
    {{-- <x-google-tag-manager /> --}}

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.theme.default.min.css') }}">
    <!-- WOW.js -->
    <link rel="stylesheet" href="{{ asset('lib/wow/wow.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.css') }}">
    @stack('styles')

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    {{-- <x-google-tag-manager-noscript /> --}}

    @include('components.navbar')

    <!-- Hero Section - Only show if not on home page -->
    @if (request()->route()->getName() !== 'home')
        @hasSection('hero')
            @yield('hero')
        @else
            <!-- Default Hero Section -->
            <div class="container-fluid pt-5 bg-primary hero-header">
                <div class="container pt-5">
                    <div class="row g-5 pt-5">
                        <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5"
                            id="hero-title-column">
                            <h1 class="display-4 text-white mb-4 animated slideInRight">@yield('hero_title', 'Welcome to KTX')</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                                    <li class="breadcrumb-item"><a class="text-white"
                                            href="{{ route('home') }}">Home</a></li>
                                    @hasSection('hero_breadcrumb')
                                        @yield('hero_breadcrumb')
                                    @endif
                                </ol>
                            </nav>
                        </div>
                        @hasSection('hero_image')
                            <div class="col-lg-6 align-self-end text-center text-lg-end m-0" id="hero-image-column">
                                <img class="img-fluid" src="@yield('hero_image')" alt=""
                                    style="max-height: 200px;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endif

    @yield('content')

    <!-- Newsletter Section - Only show on home page -->
    @if (request()->route()->getName() === 'home' || request()->route()->getName() === 'contact')
        <!-- Newsletter Start -->
        <div class="container-fluid newsletter py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <h1 class="text-white mb-4">Stay Updated with KTX</h1>
                            <div class="position-relative w-100 mt-3 mb-2">
                                <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                                    placeholder="Enter Your Email" style="height: 48px;">
                                <button type="button"
                                    class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                        class="fa fa-paper-plane text-primary fs-4"></i></button>
                            </div>
                            <small class="text-white-50">Subscribe to our newsletter for latest updates and
                                offers</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->
    @endif

    @include('components.footer')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- WOW.js -->
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <!-- CounterUp -->
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <!-- Easing -->
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')

    <!-- GTM Page View Tracking -->
    <x-gtm-tracking />

    <!-- reCAPTCHA Script -->
    <x-recaptcha-script />

    <script>
        // Hero section column width management
        document.addEventListener('DOMContentLoaded', function() {
            const heroTitleColumn = document.getElementById('hero-title-column');
            const heroImageColumn = document.getElementById('hero-image-column');

            // If no hero image column exists, make title column full width
            if (!heroImageColumn) {
                heroTitleColumn.classList.remove('col-lg-6');
                heroTitleColumn.classList.add('col-lg-12');
            }
        });
    </script>
</body>

</html>
