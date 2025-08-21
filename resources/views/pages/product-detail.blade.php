@extends('layouts.app')

@section('title', $product->name . ' - KTX Nova Compressor Group | Product Details')

@section('meta_description', $product->description ?: 'Explore ' . $product->name . ' from KTX Nova Compressor Group. High-quality industrial compressor solutions for various applications.')
@section('meta_keywords', 'KTX product, ' . $product->name . ', industrial compressor, compressor solutions, ' . ($product->category ? $product->category->name : 'compressor equipment') . ', Dubai compressor company')

@section('og_title', $product->name . ' - KTX Nova Compressor Group')
@section('og_description', $product->description ?: 'Explore ' . $product->name . ' from KTX Nova Compressor Group. High-quality industrial compressor solutions.')
@section('og_image', asset($product->image ?: 'img/service-1.jpg'))
@section('og_type', 'product')

@section('twitter_title', $product->name . ' - KTX Nova Compressor Group')
@section('twitter_description', $product->description ?: 'Explore ' . $product->name . ' from KTX Nova Compressor Group.')
@section('twitter_card', 'summary_large_image')

@section('hero_title', $product->name)

@section('hero_breadcrumb')
    <li class="breadcrumb-item"><a class="text-white" href="{{ route('products') }}">Products</a></li>
    <li class="breadcrumb-item"><a class="text-white"
            href="{{ route('products', ['category' => $product->category->id]) }}">{{ $product->category->name }}</a></li>
@endsection

@section('content')
    <!-- GTM Product Detail Page Tracking -->
    <x-gtm-tracking event="page_view" :data="['page_title' => $product->name, 'page_type' => 'product_detail', 'user_type' => 'visitor', 'product_category' => $product->category ? $product->category->name : 'Uncategorized']" />

    <!-- Product Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Product Images -->
                <div class="col-lg-4">
                    <div class="product-images">
                        <!-- Main Image Carousel -->
                        <div id="productImageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Main product image as first slide -->
                                <div class="carousel-item active">
                                    <img src="{{ asset($product->image ?: 'img/service-1.jpg') }}"
                                        alt="{{ $product->name }}" class="img-fluid rounded main-product-image"
                                        data-index="0">
                                </div>

                                <!-- Gallery images as additional slides -->
                                @if ($product->gallery && count($product->gallery) > 0)
                                    @foreach ($product->gallery as $index => $image)
                                        <div class="carousel-item">
                                            <img src="{{ asset($image) }}" alt="{{ $product->name }}"
                                                class="img-fluid rounded main-product-image"
                                                data-index="{{ $index + 1 }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Carousel Controls -->
                            @if (($product->gallery && count($product->gallery) > 0) || $product->image)
                                <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                                <!-- Carousel Indicators -->
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    @if ($product->gallery && count($product->gallery) > 0)
                                        @foreach ($product->gallery as $index => $image)
                                            <button type="button" data-bs-target="#productImageCarousel"
                                                data-bs-slide-to="{{ $index + 1 }}"
                                                aria-label="Slide {{ $index + 2 }}"></button>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Thumbnail Navigation -->
                        <div class="thumbnail-navigation">
                            <div class="row g-2">
                                <!-- Main product image thumbnail -->
                                <div class="col-2">
                                    <img src="{{ asset($product->image ?: 'img/service-1.jpg') }}"
                                        alt="{{ $product->name }}" class="img-fluid rounded thumbnail-image active"
                                        data-slide="0" style="cursor: pointer; border: 2px solid #007bff;">
                                </div>

                                <!-- Gallery image thumbnails -->
                                @if ($product->gallery && count($product->gallery) > 0)
                                    @foreach ($product->gallery as $index => $image)
                                        <div class="col-2">
                                            <img src="{{ asset($image) }}" alt="{{ $product->name }}"
                                                class="img-fluid rounded thumbnail-image" data-slide="{{ $index + 1 }}"
                                                style="cursor: pointer; border: 2px solid transparent;">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($product->video_url)
                        <div class="mb-4">
                            <h5>Product Video</h5>
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ str_replace('watch?v=', 'embed/', $product->video_url) }}"
                                    title="{{ $product->name }} Video" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif

                </div>

                <!-- Product Info -->
                <div class="col-lg-8">
                    <div class="product-info">
                        <div class="mb-4">
                            <h5>Description</h5>
                            <p>{{ $product->description }}</p>
                        </div>

                        @if ($product->specifications)
                            <div class="mb-4">
                                <h5>Specifications</h5>
                                <div class="row">
                                    @foreach ($product->specifications as $key => $value)
                                        <div class="col-md-6 mb-2">
                                            <strong>{{ $key }}:</strong> {{ $value }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($product->features)
                            <div class="mb-4">
                                <h5>Key Features</h5>
                                <ul class="list-unstyled">
                                    @foreach ($product->features as $feature)
                                        <li><i class="fa fa-check text-primary me-2"></i>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex gap-3">
                            <a href="{{ route('contact') }}" class="btn btn-primary px-4">Request Quote</a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary px-4">Contact Sales</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if ($relatedProducts->count() > 0)
                <div class="row mt-5">
                    <div class="col-12">
                        <h3 class="mb-4">Related Products</h3>
                        <div class="row g-4">
                            @foreach ($relatedProducts as $relatedProduct)
                                <div class="col-lg-3 col-md-6">
                                    <div class="service-item">
                                        <div class="service-img">
                                            <img src="{{ asset($relatedProduct->image ?: 'img/service-1.jpg') }}"
                                                alt="{{ $relatedProduct->name }}" class="img-fluid">
                                        </div>
                                        <div class="service-text">
                                            <h5 class="mb-3">{{ $relatedProduct->name }}</h5>
                                            <p class="mb-4">{{ Str::limit($relatedProduct->short_description, 100) }}</p>
                                            <a href="{{ route('product.detail', $relatedProduct->slug) }}"
                                                class="btn btn-primary px-3">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Product Detail End -->

    <!-- Product Gallery Styles -->
    <style>
        .product-images .carousel {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .main-product-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .main-product-image:hover {
            transform: scale(1.02);
        }

        .thumbnail-navigation {
            margin-top: 1rem;
        }

        .thumbnail-image {
            width: 100%;
            height: 60px;
            object-fit: cover;
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .thumbnail-image:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .thumbnail-image.active {
            border-color: #007bff !important;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0 20px;
        }

        .carousel-indicators {
            bottom: 20px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.8);
        }

        .carousel-indicators button.active {
            background-color: #007bff;
            border-color: #007bff;
        }

        @media (max-width: 768px) {
            .main-product-image {
                height: 300px;
            }

            .thumbnail-image {
                height: 60px;
            }
        }
    </style>

    <!-- Product Gallery JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('productImageCarousel');
            const thumbnails = document.querySelectorAll('.thumbnail-image');
            const carouselIndicators = document.querySelectorAll('.carousel-indicators button');

            // Initialize Bootstrap Carousel
            const bsCarousel = new bootstrap.Carousel(carousel, {
                interval: 5000, // Auto-play every 5 seconds
                wrap: true,
                keyboard: true
            });

            // Thumbnail click functionality
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const slideIndex = parseInt(this.getAttribute('data-slide'));

                    // Update carousel to selected slide
                    bsCarousel.to(slideIndex);

                    // Update active thumbnail
                    updateActiveThumbnail(slideIndex);

                    // Update active indicator
                    updateActiveIndicator(slideIndex);

                    // GTM Product Image Navigation Tracking
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'product_image_navigation', {
                            'event_category': 'product_interaction',
                            'event_label': 'image_thumbnail_click',
                            'product_name': '{{ $product->name }}',
                            'slide_index': slideIndex,
                            'total_slides': {{ ($product->gallery ? count($product->gallery) : 0) + 1 }}
                        });
                    }
                });
            });

            // Carousel slide change event
            carousel.addEventListener('slid.bs.carousel', function(event) {
                const currentSlide = event.to;

                // Update active thumbnail
                updateActiveThumbnail(currentSlide);

                // Update active indicator
                updateActiveIndicator(currentSlide);
            });

            // Update active thumbnail
            function updateActiveThumbnail(activeIndex) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.classList.remove('active');
                    thumbnail.style.borderColor = 'transparent';
                });

                const activeThumbnail = document.querySelector(`[data-slide="${activeIndex}"]`);
                if (activeThumbnail) {
                    activeThumbnail.classList.add('active');
                    activeThumbnail.style.borderColor = '#007bff';
                }
            }

            // Update active indicator
            function updateActiveIndicator(activeIndex) {
                carouselIndicators.forEach(indicator => {
                    indicator.classList.remove('active');
                    indicator.setAttribute('aria-current', 'false');
                });

                if (carouselIndicators[activeIndex]) {
                    carouselIndicators[activeIndex].classList.add('active');
                    carouselIndicators[activeIndex].setAttribute('aria-current', 'true');
                }
            }

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    bsCarousel.prev();
                } else if (e.key === 'ArrowRight') {
                    bsCarousel.next();
                }
            });

            // Touch/swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            carousel.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            });

            carousel.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        // Swipe left - next slide
                        bsCarousel.next();
                    } else {
                        // Swipe right - previous slide
                        bsCarousel.prev();
                    }
                }
            }
        });
    </script>

    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary newsletter py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-5 ps-lg-0 pt-5 pt-md-0 text-start wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid" src="{{ asset('img/newsletter.png') }}" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Newsletter</div>
                    <h1 class="text-white mb-4">Stay Updated with KTX</h1>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                    <small class="text-white-50">Subscribe to our newsletter for latest updates and offers</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->
@endsection
