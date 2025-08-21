@extends('layouts.app')

@section('title', 'Our Portfolio - KTX Nova Compressor Group | Completed Projects & Installations')

@section('meta_description', 'Explore KTX Nova Compressor Group\'s successful projects and installations across various industries. Industrial compressor solutions, manufacturing projects, and energy sector installations.')
@section('meta_keywords', 'KTX portfolio, compressor projects, industrial installations, manufacturing projects, energy sector projects, completed projects, Dubai compressor company')

@section('og_title', 'Our Portfolio - KTX Nova Compressor Group | Completed Projects')
@section('og_description', 'Explore KTX Nova Compressor Group\'s successful projects and installations across various industries worldwide.')
@section('og_image', asset('img/base/ktx_portfolio_ct0.png'))
@section('og_type', 'website')

@section('twitter_title', 'Our Portfolio - KTX Nova Compressor Group | Completed Projects')
@section('twitter_description', 'Explore KTX Nova Compressor Group\'s successful projects and installations across various industries.')
@section('twitter_card', 'summary_large_image')

@section('hero_title', 'Our Portfolio')

@section('hero_breadcrumb')
    <li class="breadcrumb-item text-white active" aria-current="page">Our Portfolio</li>
@endsection

@section('hero_image', asset('img/base/ktx_portfolio_ct0.png'))

@section('content')
    <!-- GTM Portfolio Page Tracking -->
    <x-gtm-tracking event="page_view" :data="['page_title' => 'Our Portfolio', 'page_type' => 'portfolio_showcase', 'user_type' => 'visitor', 'projects_count' => count($portfolios)]" />

    <!-- Portfolio Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h5 class="text-primary">Our Portfolio</h5>
                <h1 class="mb-3">Completed Projects</h1>
                <p class="mb-5">Explore our successful projects and installations across various industries.</p>
            </div>

            <!-- Category Tabs -->
            <div class="portfolio-tabs mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <ul class="nav nav-pills justify-content-center" id="portfolioTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">
                            <i class="fas fa-th-large me-2"></i>All Projects
                        </button>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="{{ $category->slug }}-tab" data-bs-toggle="pill"
                                data-bs-target="#{{ $category->slug }}" type="button" role="tab"
                                aria-controls="{{ $category->slug }}" aria-selected="false">
                                <i class="fas fa-{{ $category->icon ?? 'cog' }} me-2"></i>{{ $category->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Portfolio Grid -->
            <div class="tab-content" id="portfolioTabContent">
                <!-- All Projects Tab -->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row g-4">
                        @forelse($portfolios as $portfolio)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                                <div class="portfolio-card" onclick="openPortfolioModal({{ $portfolio->id }})">
                                    <div class="portfolio-image">
                                        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                            class="img-fluid">
                                        <div class="portfolio-overlay">
                                            <div class="overlay-content">
                                                <i class="fas fa-search-plus fa-2x mb-2"></i>
                                                <p class="mb-0 fw-bold">View Details</p>
                                            </div>
                                        </div>
                                        <div class="portfolio-category">
                                            <span
                                                class="badge bg-primary">{{ $portfolio->category->name ?? 'Uncategorized' }}</span>
                                        </div>
                                        @if ($portfolio->featured)
                                            <div class="portfolio-featured">
                                                <span class="badge bg-warning"><i
                                                        class="fas fa-star me-1"></i>Featured</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="portfolio-content">
                                        <h5 class="portfolio-title">{{ Str::limit($portfolio->title, 30, '...') }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <div class="py-5">
                                    <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                                    <h4 class="text-muted">No projects available</h4>
                                    <p class="text-muted">We are currently updating our portfolio information.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Category-specific Tabs -->
                @foreach ($categories as $category)
                    <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel"
                        aria-labelledby="{{ $category->slug }}-tab">
                        <div class="row g-4">
                            @forelse($portfolios->where('category_id', $category->id) as $portfolio)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                                    <div class="portfolio-card" onclick="openPortfolioModal({{ $portfolio->id }})">
                                        <div class="portfolio-image">
                                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                                class="img-fluid">
                                            <div class="portfolio-overlay">
                                                <div class="overlay-content">
                                                    <i class="fas fa-search-plus fa-2x mb-2"></i>
                                                    <p class="mb-0 fw-bold">View Details</p>
                                                </div>
                                            </div>
                                            <div class="portfolio-category">
                                                <span
                                                    class="badge bg-primary">{{ $portfolio->category->name ?? 'Uncategorized' }}</span>
                                            </div>
                                            @if ($portfolio->featured)
                                                <div class="portfolio-featured">
                                                    <span class="badge bg-warning"><i
                                                            class="fas fa-star me-1"></i>Featured</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portfolio-content">
                                            <h5 class="portfolio-title">{{ Str::limit($portfolio->title, 30, '...') }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <div class="py-5">
                                        <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                                        <h4 class="text-muted">No projects in {{ $category->name }}</h4>
                                        <p class="text-muted">We haven't completed any projects in this category yet.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $portfolios->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <!-- Portfolio End -->

    <!-- Portfolio Modal -->
    <div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="portfolioModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="portfolioModalLabel">
                        <i class="fas fa-project-diagram me-2"></i>Project Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" id="portfolioModalBody">
                    <!-- Loading state -->
                    <div class="text-center py-5" id="portfolioLoadingState">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 text-muted">Loading project details...</p>
                    </div>

                    <!-- Portfolio content will be loaded here -->
                    <div id="portfolioContent" style="display: none;">
                        <div class="row g-0">
                            <!-- Left side - Project Image -->
                            <div class="col-lg-6">
                                <div class="portfolio-image-container h-100 d-flex flex-column">
                                    <div
                                        class="portfolio-image-wrapper flex-grow-1 d-flex align-items-center justify-content-center p-4">
                                        <img id="modalPortfolioImage" src="" alt="Project"
                                            class="img-fluid rounded shadow-sm"
                                            style="max-height: 100%; width: 100%; object-fit: contain;">
                                    </div>

                                    <!-- Gallery Thumbnails -->
                                    <div class="portfolio-gallery-thumbnails p-3" id="portfolioGalleryThumbnails"
                                        style="display: none;">
                                        <h6 class="text-muted mb-3">Gallery Images</h6>
                                        <div class="gallery-thumbnails-container d-flex flex-wrap gap-2"
                                            id="galleryThumbnailsContainer">
                                            <!-- Thumbnails will be loaded here -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right side - Project Information -->
                            <div class="col-lg-6">
                                <div class="portfolio-info-container p-4">
                                    <div class="portfolio-header mb-4">
                                        <h4 id="modalPortfolioTitle" class="text-primary mb-2"></h4>
                                        <div id="modalPortfolioCategory" class="mb-3"></div>
                                    </div>

                                    <div class="portfolio-description mb-4">
                                        <h6 class="fw-bold mb-2">Project Description</h6>
                                        <p id="modalPortfolioDescription" class="text-muted"></p>
                                    </div>

                                    <div class="portfolio-details">
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Client</label>
                                                <p id="modalPortfolioClient" class="mb-0 fw-semibold"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Location</label>
                                                <p id="modalPortfolioLocation" class="mb-0 fw-semibold"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Category</label>
                                                <p id="modalPortfolioCategoryDetail" class="mb-0 fw-semibold"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Completion Date</label>
                                                <p id="modalPortfolioCompletionDate" class="mb-0 fw-semibold"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Project Status</label>
                                                <div id="modalPortfolioStatus" class="mt-1"></div>
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
    </div>

    <!-- Partners Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h5 class="text-primary">Our Partners</h5>
                <h1 class="mb-3">Trusted Business Partners</h1>
                <p class="mb-5">We collaborate with leading companies and organizations to deliver exceptional results.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/0eccfe53-c86e-457c-95aa-214368524831.jpg') }}"
                            alt="Partner Company 1" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/3ce540d6-f048-4753-81ad-ab1e38235bf8.jpg') }}"
                            alt="Partner Company 2" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/4af26216-d660-497d-9db0-0e4be445dfc3.jpg') }}"
                            alt="Partner Company 3" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/4e2b833e-8c3a-48ee-b161-aba297746ce5.jpg') }}"
                            alt="Partner Company 4" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/63c0291f-442c-4b64-91b3-487ff00282ed.jpg') }}"
                            alt="Partner Company 5" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/66a2824a-5f6c-4d4c-800e-9fc6c6f7e2c1.jpg') }}"
                            alt="Partner Company 6" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/480de1fe-53a6-4406-9fec-0854bfea69e0.jpg') }}"
                            alt="Partner Company 7" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/a411ed0b-366a-4a0d-877b-9d36aece5986.jpg') }}"
                            alt="Partner Company 8" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/adaba47a-95c4-408c-8d8d-38419f8310c6.jpg') }}"
                            alt="Partner Company 9" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.0s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/e4be73b2-144b-4ac7-babf-7cee382b9256.jpg') }}"
                            alt="Partner Company 10" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/cf33a979-2e6f-4c90-adbf-e88eac51787e.jpg') }}"
                            alt="Partner Company 11" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
                    <div class="partner-logo">
                        <img src="{{ asset('storage/partners/f6b98c95-5408-45f0-be14-de6a5459c0e2.jpg') }}"
                            alt="Partner Company 12" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners End -->
@endsection

@push('styles')
    <style>
        /* Portfolio Tabs */
        .portfolio-tabs .nav-pills {
            gap: 10px;
        }

        .portfolio-tabs .nav-link {
            border-radius: 25px;
            padding: 12px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .portfolio-tabs .nav-link:hover {
            background-color: rgba(13, 110, 253, 0.1);
            border-color: rgba(13, 110, 253, 0.3);
            color: #0d6efd;
        }

        .portfolio-tabs .nav-link.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
        }

        /* Portfolio Cards */
                 .portfolio-card {
             background: white;
             border-radius: 15px;
             overflow: hidden;
             box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
             transition: all 0.3s ease;
             cursor: pointer;
             border: 1px solid #e9ecef;
             height: 100%;
             opacity: 1;
             transform: translateY(0);
         }

         /* Force visibility for tab content */
         .tab-pane.show .portfolio-card {
             opacity: 1 !important;
             transform: translateY(0) !important;
         }

        .portfolio-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: #0d6efd;
        }

        .portfolio-image {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .portfolio-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover .portfolio-image img {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(13, 110, 253, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .overlay-content {
            text-align: center;
            color: white;
        }

        .portfolio-category {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .portfolio-featured {
            position: absolute;
            top: 15px;
            left: 15px;
        }

        .portfolio-content {
            padding: 20px;
        }

        .portfolio-title {
            color: #212529;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .portfolio-description {
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .portfolio-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            color: #495057;
        }

        .meta-item i {
            width: 16px;
        }

        /* Modal Styles */
        .modal-xl {
            max-width: 1200px;
        }

        .portfolio-image-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-right: 1px solid #dee2e6;
            height: 100%;
            min-height: 500px;
            overflow: hidden;
        }

        .portfolio-info-container {
            background: #ffffff;
            height: 100%;
            min-height: 500px;
            overflow-y: auto;
        }

        .portfolio-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portfolio-image-wrapper img {
            transition: transform 0.3s ease;
            max-height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .portfolio-image-wrapper:hover img {
            transform: scale(1.02);
        }

        .detail-item label {
            color: #6c757d;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .detail-item p {
            color: #212529;
            font-size: 1rem;
        }

        .portfolio-header h4 {
            color: #0d6efd;
            font-weight: 600;
            line-height: 1.3;
        }

        .portfolio-description h6 {
            color: #495057;
            font-weight: 600;
        }

        .portfolio-description p {
            line-height: 1.6;
            color: #6c757d;
        }

        /* Partner Logo Styles */
        .partner-logo {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e9ecef;
        }

        .partner-logo:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-color: #0d6efd;
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 80px;
            object-fit: contain;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }

        .partner-logo:hover img {
            filter: grayscale(0%);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .portfolio-image-container {
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .portfolio-info-container {
                padding-top: 1rem !important;
            }

            .portfolio-image-wrapper {
                min-height: 250px;
            }
        }

        @media (max-width: 767.98px) {
            .portfolio-tabs .nav-link {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .portfolio-card {
                margin-bottom: 20px;
            }

            .partner-logo {
                height: 100px;
                padding: 15px;
            }

            .partner-logo img {
                max-height: 60px;
            }
        }

        @media (max-width: 575.98px) {
            .modal-xl {
                margin: 0.5rem;
                max-width: calc(100% - 1rem);
            }

            .portfolio-image-container,
            .portfolio-info-container {
                padding: 1rem !important;
            }

            .portfolio-image-wrapper {
                min-height: 200px;
            }

            .portfolio-tabs .nav-link {
                padding: 6px 12px;
                font-size: 0.8rem;
            }

            .partner-logo {
                height: 80px;
                padding: 10px;
            }

            .partner-logo img {
                max-height: 50px;
            }
        }

        /* Loading animation */
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        /* Badge enhancements */
        .badge {
            font-size: 0.75rem;
            padding: 0.5em 0.75em;
            border-radius: 0.375rem;
        }

        /* Gallery Thumbnails */
        .portfolio-gallery-thumbnails {
            border-top: 1px solid #dee2e6;
            background: #f8f9fa;
            flex-shrink: 0;
        }

        .gallery-thumbnail {
            transition: all 0.3s ease;
        }

        .gallery-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .gallery-thumbnails-container {
            max-height: 120px;
            overflow-y: auto;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function openPortfolioModal(portfolioId) {
            // Show loading state
            document.getElementById('portfolioLoadingState').style.display = 'block';
            document.getElementById('portfolioContent').style.display = 'none';

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('portfolioModal'));
            modal.show();

            // Get portfolio data from the clicked card
            const portfolioCard = document.querySelector(`[onclick="openPortfolioModal(${portfolioId})"]`);

            // Get basic data from the card
            const portfolioData = {
                id: portfolioId,
                title: portfolioCard.querySelector('.portfolio-title').textContent,
                image: portfolioCard.querySelector('img').src,
                category: portfolioCard.querySelector('.portfolio-category .badge').textContent,
                status: 'Completed'
            };

            // GTM Portfolio Modal Open Tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'portfolio_modal_open', {
                    'event_category': 'portfolio_interaction',
                    'event_label': portfolioData.title,
                    'portfolio_id': portfolioId,
                    'portfolio_title': portfolioData.title,
                    'portfolio_category': portfolioData.category
                });
            }

            // Load portfolio data with gallery
            loadPortfolioDataWithGallery(portfolioData);
        }

        function loadPortfolioDataWithGallery(portfolioData) {
            // Make AJAX call to get complete portfolio data including gallery
            fetch(`/api/portfolio/${portfolioData.id}/details`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Merge API data with basic card data
                        portfolioData = {
                            ...portfolioData,
                            ...data.portfolio,
                            gallery: data.gallery || [portfolioData.image]
                        };
                    } else {
                        // Fallback to main image only
                        portfolioData.gallery = [portfolioData.image];
                    }

                    // Hide loading state and show content
                    document.getElementById('portfolioLoadingState').style.display = 'none';
                    document.getElementById('portfolioContent').style.display = 'block';

                    // Populate modal with portfolio data and gallery
                    populatePortfolioModalWithGallery(portfolioData);
                })
                .catch(error => {
                    console.error('Error loading portfolio details:', error);
                    // Fallback to main image only
                    portfolioData.gallery = [portfolioData.image];

                    // Hide loading state and show content
                    document.getElementById('portfolioLoadingState').style.display = 'none';
                    document.getElementById('portfolioContent').style.display = 'block';

                    // Populate modal with portfolio data and gallery
                    populatePortfolioModalWithGallery(portfolioData);
                });
        }

        function loadPortfolioData(portfolioData) {
            // In a real application, you would make an AJAX call here
            // For now, we'll simulate the data loading

            // Hide loading state and show content
            document.getElementById('portfolioLoadingState').style.display = 'none';
            document.getElementById('portfolioContent').style.display = 'block';

            // Populate modal with portfolio data
            populatePortfolioModal(portfolioData);
        }

        function populatePortfolioModalWithGallery(data) {
            // Set portfolio image
            document.getElementById('modalPortfolioImage').src = data.image;
            document.getElementById('modalPortfolioImage').alt = data.title;

            // Set portfolio title
            document.getElementById('modalPortfolioTitle').textContent = data.title;

            // Set portfolio category
            document.getElementById('modalPortfolioCategory').innerHTML =
                `<span class="badge bg-primary">${data.category}</span>`;

            // Set description - use API data if available, otherwise show placeholder
            const description = data.description || 'Project description will be loaded from server...';
            document.getElementById('modalPortfolioDescription').textContent = description;

            // Set portfolio details - use API data if available, otherwise show placeholders
            document.getElementById('modalPortfolioClient').textContent = data.client || 'Loading...';
            document.getElementById('modalPortfolioLocation').textContent = data.location || 'Loading...';
            document.getElementById('modalPortfolioCategoryDetail').textContent = data.category;
            document.getElementById('modalPortfolioCompletionDate').textContent = data.completion_date ? formatDate(data
                .completion_date) : 'Loading...';

            // Set status
            const statusHtml = data.status === 'Completed' ?
                '<span class="badge bg-success">Completed</span>' :
                '<span class="badge bg-warning">In Progress</span>';
            document.getElementById('modalPortfolioStatus').innerHTML = statusHtml;

            // Load gallery thumbnails
            loadGalleryThumbnails(data.gallery, data.image);
        }

        function populatePortfolioModal(data) {
            // Set portfolio image
            document.getElementById('modalPortfolioImage').src = data.image;
            document.getElementById('modalPortfolioImage').alt = data.title;

            // Set portfolio title
            document.getElementById('modalPortfolioTitle').textContent = data.title;

            // Set portfolio category
            document.getElementById('modalPortfolioCategory').innerHTML =
                `<span class="badge bg-primary">${data.category}</span>`;

            // Set description
            document.getElementById('modalPortfolioDescription').textContent = data.description;

            // Set portfolio details
            document.getElementById('modalPortfolioClient').textContent = data.client;
            document.getElementById('modalPortfolioLocation').textContent = data.location;
            document.getElementById('modalPortfolioCategoryDetail').textContent = data.category;
            document.getElementById('modalPortfolioCompletionDate').textContent = formatDate(data.completion_date);

            // Set status
            const statusHtml = data.status === 'Completed' ?
                '<span class="badge bg-success">Completed</span>' :
                '<span class="badge bg-warning">In Progress</span>';
            document.getElementById('modalPortfolioStatus').innerHTML = statusHtml;
        }

        function loadGalleryThumbnails(galleryImages, mainImage) {
            const galleryContainer = document.getElementById('galleryThumbnailsContainer');
            const gallerySection = document.getElementById('portfolioGalleryThumbnails');

            if (!galleryImages || galleryImages.length <= 1) {
                gallerySection.style.display = 'none';
                return;
            }

            // Show gallery section
            gallerySection.style.display = 'block';

            // Clear existing thumbnails
            galleryContainer.innerHTML = '';

            // Create thumbnails for each gallery image
            galleryImages.forEach((imageSrc, index) => {
                const thumbnail = document.createElement('div');
                thumbnail.className = 'gallery-thumbnail';
                thumbnail.style.cssText = `
                width: 60px;
                height: 60px;
                border-radius: 8px;
                overflow: hidden;
                cursor: pointer;
                border: 2px solid ${imageSrc === mainImage ? '#0d6efd' : '#dee2e6'};
                transition: all 0.3s ease;
            `;

                thumbnail.innerHTML =
                    `<img src="${imageSrc}" alt="Gallery Image ${index + 1}" style="width: 100%; height: 100%; object-fit: cover;">`;

                // Add click event to change main image
                thumbnail.addEventListener('click', function() {
                    // Update main image
                    document.getElementById('modalPortfolioImage').src = imageSrc;

                    // Update active thumbnail border
                    document.querySelectorAll('.gallery-thumbnail').forEach(thumb => {
                        thumb.style.borderColor = '#dee2e6';
                    });
                    this.style.borderColor = '#0d6efd';
                });

                galleryContainer.appendChild(thumbnail);
            });
        }

        function formatDate(dateString) {
            if (!dateString) return 'N/A';

            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        // Add hover effect for portfolio cards
        document.addEventListener('DOMContentLoaded', function() {
            const portfolioCards = document.querySelectorAll('.portfolio-card');

            portfolioCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Reset modal state when modal is hidden
            document.getElementById('portfolioModal').addEventListener('hidden.bs.modal', function() {
                document.getElementById('portfolioLoadingState').style.display = 'block';
                document.getElementById('portfolioContent').style.display = 'none';
                document.getElementById('portfolioGalleryThumbnails').style.display = 'none';
                document.getElementById('galleryThumbnailsContainer').innerHTML = '';
            });

                                                   // Handle tab changes with Bootstrap events
             const portfolioTabs = document.querySelectorAll('#portfolioTabs .nav-link');
             portfolioTabs.forEach(tab => {
                 tab.addEventListener('shown.bs.tab', function() {
                     // Force visibility of portfolio cards in the active tab
                     const activeTab = document.querySelector('.tab-pane.show');
                     if (activeTab) {
                         const cards = activeTab.querySelectorAll('.portfolio-card');
                         cards.forEach(card => {
                             card.style.opacity = '1';
                             card.style.transform = 'translateY(0)';
                             card.style.visibility = 'visible';
                         });
                     }

                     // Trigger WOW.js refresh after tab is fully shown
                     setTimeout(() => {
                         if (typeof WOW !== 'undefined') {
                             new WOW().init();
                         }
                     }, 150);
                 });
             });
        });
    </script>
@endpush
