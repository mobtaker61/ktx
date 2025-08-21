@extends('layouts.app')

@section('title', 'Our Products - KTX Nova Compressor Group | Industrial Compressors & Solutions')

@section('meta_description', 'Explore KTX Nova Compressor Group\'s comprehensive range of industrial compressors. Air compressors, screw compressors, piston compressors, and centrifugal compressors for various industries.')
@section('meta_keywords', 'industrial compressors, air compressors, screw compressors, piston compressors, centrifugal compressors, KTX products, compressor solutions, industrial equipment')

@section('og_title', 'Our Products - KTX Nova Compressor Group | Industrial Compressors')
@section('og_description', 'Explore KTX Nova Compressor Group\'s comprehensive range of industrial compressors and solutions for various industries worldwide.')
@section('og_image', asset('img/base/ktx_engine.png'))
@section('og_type', 'website')

@section('twitter_title', 'Our Products - KTX Nova Compressor Group | Industrial Compressors')
@section('twitter_description', 'Explore KTX Nova Compressor Group\'s comprehensive range of industrial compressors and solutions.')
@section('twitter_card', 'summary_large_image')

@section('hero_title', 'Our Products')

@section('hero_breadcrumb')
    <li class="breadcrumb-item text-white active" aria-current="page">Our Products</li>
@endsection

@section('hero_image', asset('img/base/ktx_engine.png'))

@section('content')
    <!-- GTM Products Page Tracking -->
    <x-gtm-tracking event="page_view" :data="['page_title' => 'Products', 'page_type' => 'product_listing', 'user_type' => 'visitor']" />
    
    <!-- GTM Product List Tracking -->
    <x-gtm-tracking event="product_list_view" :data="['category' => request()->get('category', 'all'), 'products_count' => $products->count()]" />

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <!-- Categories Filter -->
                <div class="col-lg-3">
                    <h4 class="mb-4">Categories</h4>
                    <div class="list-group">
                        <a href="{{ route('products') }}"
                            class="list-group-item list-group-item-action category-filter {{ !request('category') ? 'active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="category-icon-small me-3">
                                    <i class="fas fa-th-large text-primary"></i>
                                </div>
                                <span>All Products</span>
                            </div>
                        </a>
                        @foreach ($categories as $category)
                            @if ($category->children->count() > 0)
                                <div class="category-item">
                                    <a href="{{ route('products', ['category' => $category->slug]) }}"
                                        class="list-group-item list-group-item-action category-filter parent-category {{ request('category') == $category->slug || $category->children->contains('slug', request('category')) ? 'active expanded' : '' }}">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <div class="d-flex align-items-center">
                                                <div class="category-icon-small me-3">
                                                    @if ($category->image)
                                                        <img src="{{ asset('storage/' . $category->image) }}"
                                                            alt="{{ $category->display_name }}"
                                                            class="rounded-circle category-thumb"
                                                            style="width: 24px; height: 24px; object-fit: cover;"
                                                            loading="lazy">
                                                    @else
                                                        <i class="fas fa-folder text-primary"></i>
                                                    @endif
                                                </div>
                                                <span class="category-name">{{ $category->display_name }}</span>
                                            </div>
                                            <i class="fas fa-chevron-down ms-auto toggle-icon" style="cursor: pointer;"
                                                onclick="event.preventDefault(); toggleSubcategories(this);"></i>
                                        </div>
                                    </a>
                                    <div class="subcategories"
                                        style="display: {{ request('category') == $category->slug || $category->children->contains('slug', request('category')) ? 'block' : 'none' }};"
                                        data-parent-slug="{{ $category->slug }}">
                                        @foreach ($category->children as $subcategory)
                                            <a href="{{ route('products', ['category' => $subcategory->slug]) }}"
                                                class="list-group-item list-group-item-action category-filter subcategory {{ request('category') == $subcategory->slug ? 'active' : '' }}">
                                                <div class="d-flex align-items-center">
                                                    <div class="category-icon-small me-3">
                                                        @if ($subcategory->image)
                                                            <img src="{{ asset('storage/' . $subcategory->image) }}"
                                                                alt="{{ $subcategory->display_name }}"
                                                                class="rounded-circle category-thumb"
                                                                style="width: 20px; height: 20px; object-fit: cover;"
                                                                loading="lazy">
                                                        @else
                                                            <i class="fas fa-chevron-right text-muted"></i>
                                                        @endif
                                                    </div>
                                                    <span>{{ $subcategory->display_name }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('products', ['category' => $category->slug]) }}"
                                    class="list-group-item list-group-item-action category-filter {{ request('category') == $category->slug ? 'active' : '' }}">
                                    <div class="d-flex align-items-center">
                                        <div class="category-icon-small me-3">
                                            @if ($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}"
                                                    alt="{{ $category->display_name }}"
                                                    class="rounded-circle category-thumb"
                                                    style="width: 24px; height: 24px; object-fit: cover;" loading="lazy">
                                            @else
                                                <i class="fas fa-tag text-primary"></i>
                                            @endif
                                        </div>
                                        <span>{{ $category->display_name }}</span>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-9">
                    <!-- Category Info (when category is selected) -->
                    @if ($selectedCategory)
                        <div id="category-info" class="mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4 bg-light">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center">
                                            <div class="mb-3">
                                                @if ($selectedCategory->image)
                                                    <img src="{{ asset('storage/' . $selectedCategory->image) }}"
                                                        alt="{{ $selectedCategory->display_name }}"
                                                        class="category-info-image"
                                                        style="width: 100%; height: 100%; object-fit: cover;"
                                                        loading="lazy">
                                                @else
                                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                                        style="width: 100%; height: 100%;">
                                                        <i class="fas fa-folder text-white" style="font-size: 30px;"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="mb-2 text-primary">{{ $selectedCategory->display_name }}</h3>
                                            @if ($selectedCategory->description)
                                                <p class="text-muted mb-3">{{ $selectedCategory->description }}</p>
                                            @endif

                                            @if ($selectedCategory->children->count() > 0)
                                                <div class="mt-3">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @foreach ($selectedCategory->children as $subcategory)
                                                            <a href="{{ route('products', ['category' => $subcategory->slug]) }}"
                                                                class="btn btn-outline-primary btn-sm {{ request('category') == $subcategory->slug ? 'active' : '' }}">
                                                                <i class="fas fa-tag me-1"></i>
                                                                {{ $subcategory->name }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div id="products-container">
                        <div class="row g-4">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-card h-100"
                                        onclick="window.location.href='{{ route('product.detail', $product->slug) }}'">
                                        <div class="product-image-wrapper">
                                            <img src="{{ asset($product->image ?: 'img/service-1.jpg') }}"
                                                alt="{{ $product->name }}" class="product-image">
                                            <div class="product-overlay">
                                                <div class="product-overlay-content">
                                                    <i class="fas fa-eye fa-2x text-white"></i>
                                                    <p class="text-white mt-2 mb-0">View Details</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="product-title">{{ $product->name }}</h5>
                                            @if ($product->category)
                                                <div class="product-category-badge">
                                                    <span class="badge bg-light text-primary border border-primary">
                                                        <i class="fas fa-tag me-1"></i>
                                                        {{ $product->category->name }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if ($products->hasPages())
                            <div class="mt-5">
                                {{ $products->links('pagination::bootstrap-5') }}
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>

    <style>
        .product-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            border: 1px solid #e9ecef;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        /* Product Overlay */
        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 114, 179, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all .3s ease;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .product-overlay-content {
            text-align: center;
            transform: translateY(20px);
            transition: transform .3s ease;
        }

        .product-card:hover .product-overlay-content {
            transform: translateY(0);
        }

        /* Selected Category Info Styles */
        #selected-category-info .card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid rgba(0, 114, 179, 0.1);
            transition: all .3s ease;
        }

        #selected-category-info .card:hover {
            box-shadow: 0 8px 25px rgba(0, 114, 179, 0.15);
            transform: translateY(-2px);
        }

        #category-image-container img,
        #category-image-container .bg-primary {
            transition: all .3s ease;
        }

        #selected-category-info .card:hover #category-image-container img,
        #selected-category-info .card:hover #category-image-container .bg-primary {
            transform: scale(1.05);
        }

        #category-title {
            color: var(--primary);
            font-weight: 600;
            transition: color .3s ease;
        }

        #category-description {
            line-height: 1.6;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            border-color: #6c757d;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        /* CSS Variables */
        :root {
            --primary: #0072b3;
            --secondary: #15ACE1;
        }

        .product-content {
            padding: 1.25rem;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #2c3e50;
            line-height: 1.3;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #2c3e50;
            line-height: 1.3;
            text-align: center;
        }

        .product-category-badge {
            text-align: center;
            margin-top: 0.5rem;
        }

        .product-category-badge .badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.6rem;
            transition: all .3s ease;
        }

        .product-category-badge .badge:hover {
            background: var(--primary) !important;
            color: white !important;
            border-color: var(--primary) !important;
            transform: scale(1.05);
        }

        /* Category sidebar styles */
        .category-icon-small {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .category-icon-small img {
            transition: transform .3s ease;
            border: 1px solid rgba(0, 114, 179, 0.2);
        }

        .category-filter:hover .category-icon-small img {
            transform: scale(1.1);
            border-color: var(--primary);
        }

        /* Category thumbnail styles */
        .category-thumb {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .category-thumb:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        /* Category info image styles */
        .category-info-image {
            transition: transform .3s ease;
        }

        .category-info-image:hover {
            transform: scale(1.05);
        }

        .parent-category {
            position: relative;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category-name {
            cursor: pointer;
            flex: 1;
        }

        .toggle-icon {
            transition: transform 0.3s ease;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .parent-category.expanded .toggle-icon {
            transform: rotate(180deg);
        }

        /* Ensure subcategories are visible when parent is expanded */
        .parent-category.expanded + .subcategories {
            display: block !important;
        }

        .subcategories {
            margin-left: 0;
            border-left: 3px solid #e9ecef;
        }

        .subcategory {
            margin-left: 0;
            border-left: none;
            font-size: 0.9rem;
            padding-left: 1.5rem;
            border-radius: 0;
            border-top: none;
            border-bottom: 1px solid #e9ecef;
        }

        .subcategory:last-child {
            border-bottom: none;
        }

        .subcategory:hover {
            background-color: #f8f9fa;
            border-left-color: #007bff;
        }

        .subcategory i {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .category-filter i:first-child {
            width: 16px;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-lg-4 {
                margin-bottom: 1rem;
            }

            .product-image-wrapper {
                height: 180px;
            }

            .product-content {
                padding: 1rem;
            }
        }

        /* Subcategories Styles */
        .subcategory-btn {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            transition: all .3s ease;
            border-width: 1px;
        }

        .subcategory-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 114, 179, 0.3);
        }

        .subcategory-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Category Info Improvements */
        #selected-category-info .card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid rgba(0, 114, 179, 0.1);
            transition: all .3s ease;
        }

        #selected-category-info .card:hover {
            box-shadow: 0 8px 25px rgba(0, 114, 179, 0.15);
            transform: translateY(-2px);
        }

        #category-image-container img,
        #category-image-container .bg-primary {
            transition: all .3s ease;
        }

        #selected-category-info .card:hover #category-image-container img,
        #selected-category-info .card:hover #category-image-container .bg-primary {
            transform: scale(1.05);
        }

        #category-title {
            color: var(--primary);
            font-weight: 600;
            transition: color .3s ease;
        }

        #category-description {
            line-height: 1.6;
            color: #6c757d;
        }

        /* Subcategories Row */
        #subcategories-row h6 {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.75rem;
        }

        #subcategories-container {
            gap: 0.5rem;
        }
    </style>

    <script>
        // Simple function to toggle subcategories
        function toggleSubcategories(icon) {
            const categoryItem = icon.closest('.category-item');
            const parentCategory = icon.closest('.parent-category');
            const subcategories = categoryItem.querySelector('.subcategories');
            const isExpanded = parentCategory.classList.contains('expanded');

            if (isExpanded) {
                parentCategory.classList.remove('expanded');
                subcategories.style.display = 'none';
            } else {
                parentCategory.classList.add('expanded');
                subcategories.style.display = 'block';
            }

            // GTM Subcategory Toggle Tracking
            if (typeof gtag !== 'undefined') {
                const categoryName = parentCategory.querySelector('.category-name').textContent;
                gtag('event', 'subcategory_toggle', {
                    'event_category': 'category_interaction',
                    'event_label': categoryName,
                    'category_name': categoryName,
                    'action': isExpanded ? 'collapse' : 'expand'
                });
            }
        }

        // Auto-expand parent categories when page loads with a subcategory selected
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const categoryParam = urlParams.get('category');

            if (categoryParam) {
                // Find if the selected category is a subcategory
                const subcategoryLink = document.querySelector(`[href*="category=${categoryParam}"]`);
                if (subcategoryLink && subcategoryLink.classList.contains('subcategory')) {
                    // Find the parent category and expand it
                    const parentCategory = subcategoryLink.closest('.category-item').querySelector('.parent-category');
                    if (parentCategory) {
                        parentCategory.classList.add('expanded');
                        const subcategories = subcategoryLink.closest('.subcategories');
                        if (subcategories) {
                            subcategories.style.display = 'block';
                        }
                    }
                }
            }
        });
    </script>
@endsection
