@extends('layouts.app')

@section('title', 'KTX - Industrial Compressors for Your Projects')

@section('meta_description', 'KTX Nova Compressor Group - Leading provider of industrial compressors with Japanese innovation, Chinese manufacturing excellence, and global market expertise. Air compressors, screw compressors, and industrial solutions.')
@section('meta_keywords', 'industrial compressor, air compressor, screw compressor, compressor parts, KTX, industrial equipment, compressor technology, manufacturing solutions, Dubai compressor, industrial solutions')

@section('og_title', 'KTX Nova Compressor Group - Industrial Compressors & Solutions')
@section('og_description', 'Leading provider of industrial compressors with Japanese innovation, Chinese manufacturing excellence, and global market expertise. Based in Dubai, serving worldwide.')
@section('og_image', asset('img/ktx_logo_sq.jpg'))
@section('og_type', 'website')
@section('og_site_name', 'KTX Nova Compressor Group')

@section('twitter_title', 'KTX Nova Compressor Group - Industrial Compressors & Solutions')
@section('twitter_description', 'Leading provider of industrial compressors with Japanese innovation, Chinese manufacturing excellence, and global market expertise.')
@section('twitter_card', 'summary_large_image')
@section('twitter_site', '@ktxcompressor')

@section('content')
<!-- GTM Home Page Tracking -->
<x-gtm-tracking event="page_view" :data="['page_title' => 'Home', 'page_type' => 'landing', 'user_type' => 'visitor']" />

<!-- Hero Start - Special for Home Page -->
<div class="container-fluid pt-5 bg-primary hero-header mb-5">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">KTX Compressor</div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">Industrial Compressors for Your Projects</h1>
                <p class="text-white mb-4 animated slideInRight">KTX specializes in industrial compressors with unique and innovative technology. We provide cutting-edge solutions for industrial applications worldwide.</p>
                <a href="{{ route('products') }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">Our Products</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('img/base/KTX_router_2.png') }}"
                     alt="KTX Industrial Compressor - Advanced Router Compressor Technology for Industrial Applications"
                     title="KTX Router Compressor - Industrial Grade Air Compression Solution"
                     loading="eager"
                     width="600"
                     height="400">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="{{ asset('img/ktx-about-img.png') }}"
                         alt="About KTX Compressor - Industrial Compressor Manufacturing and Engineering Excellence"
                         title="KTX About Us - Leading Industrial Compressor Solutions Provider"
                         loading="lazy"
                         width="500"
                         height="400">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                <h3 class="mb-4">Engineering Precision, Driving Global Markets</h3>
                <p class="mb-4">KTX Nova Compressor Group, headquartered in Dubai, is a global alliance delivering advanced industrial compressor solutions. Combining Japanese innovation from Kobel Steel, precision manufacturing by Wuxi Xiya, and international market expertise from TCI Petrochemical Group, we provide reliable, efficient, and high-performance compressors for industries worldwide — backed by expert consulting and dedicated after-sales service.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-fluid bg-light mt-5 py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Services</div>
                <h1 class="mb-4">Comprehensive Industrial Compressor Solutions</h1>
                <p class="mb-4">We deliver world-class compressor solutions powered by Japanese innovation, Chinese manufacturing excellence, and global market expertise. Our services cover the full lifecycle — from tailored design and production to worldwide delivery, installation, and performance optimization.</p>
                <a class="btn btn-primary rounded-pill px-4" href="{{ route('services') }}">Read More</a>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-cogs fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Industrial & Process Compressor Solutions</h5>
                                    <p>High-performance compressors for industrial and process applications.</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="{{ route('services') }}">Read More</a>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-globe fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Global Project & Market Development</h5>
                                    <p>Driving international projects and expanding market reach.</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="{{ route('services') }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-4">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-wrench fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">Technical Consulting & Engineering Support</h5>
                                    <p>Expert guidance for system design and integration.</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="{{ route('services') }}">Read More</a>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-chart-simple fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3">After-Sales Service & Performance Optimization</h5>
                                    <p>Maximizing uptime and efficiency through dedicated service.</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="{{ route('services') }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Why Choose Us Start -->
<div class="container-fluid bg-primary feature pt-5">
    <div class="container pt-5">
        <div class="row g-5">
            <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Why Choose Us</div>
                <h1 class="text-white mb-4">We're Best in Industrial Compressor Industry with 70 Years of Experience</h1>
                <p class="text-light mb-4">KTX has been at the forefront of industrial compressor technology, providing innovative solutions that meet the highest standards of quality and efficiency.</p>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Advanced compressor technology and innovation</span>
                </div>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Comprehensive maintenance and support services</span>
                </div>
                <div class="d-flex align-items-center text-white mb-3">
                    <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                        <i class="fa fa-check"></i>
                    </div>
                    <span>Energy-efficient and environmentally friendly solutions</span>
                </div>
                <div class="row g-4 pt-3">
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                            <i class="fa fa-industry fa-3x text-white"></i>
                            <div class="ms-3">
                                <h2 class="text-white mb-0" ><span data-toggle="counter-up">100</span> +</h2>
                                <p class="text-white mb-0">Product Varieties</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                            <i class="fa fa-check fa-3x text-white"></i>
                            <div class="ms-3">
                                <h2 class="text-white mb-0" data-toggle="counter-up">1000</h2>
                                <p class="text-white mb-0">Projects Complete</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-end text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                <img class="img-fluid" src="{{ asset('img/feature.png') }}" alt="KTX Features">
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Us End -->

<!-- Product Categories Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- GTM Product Categories Section Tracking -->
        <x-gtm-tracking event="section_view" :data="['section_name' => 'product_categories', 'section_type' => 'product_showcase', 'categories_count' => count($categories)]" />

        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Products</div>
            <h1 class="mb-4">Product Categories</h1>
            <p class="mb-4">Explore our comprehensive range of industrial compressor solutions designed for various applications and industries worldwide.</p>
        </div>

        <div class="row g-4">
            @forelse($categories as $category)
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="category-card" onclick="window.location.href='{{ route('products', ['category' => $category->slug]) }}'">
                    <div class="category-image-container">
                        @if($category->hasImage)
                            <img src="{{ $category->image_url }}"
                                 alt="{{ $category->display_name }}"
                                 class="category-image"
                                 loading="lazy"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="category-placeholder" style="display: none;">
                                <i class="fas fa-cogs"></i>
                            </div>
                        @else
                            <div class="category-placeholder">
                                <i class="fas fa-cogs"></i>
                            </div>
                        @endif

                        <!-- Product Count Overlay -->
                        <div class="product-count-overlay">
                            <span class="count-badge">{{ $category->products_count }}</span>
                            <small class="count-text">Products</small>
                        </div>

                        <!-- Hover Overlay -->
                        <div class="category-hover-overlay">
                            <div class="hover-content">
                                <i class="fas fa-arrow-right"></i>
                                <span>View Products</span>
                            </div>
                        </div>
                    </div>

                    <div class="category-info">
                        <h5 class="category-name">{{ $category->display_name }}</h5>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="py-5">
                    <div class="empty-state-icon mb-3">
                        <i class="fa fa-folder-open fa-4x text-muted"></i>
                    </div>
                    <h4 class="text-muted">No Product Categories Available</h4>
                    <p class="text-muted">We're working on organizing our product categories. Please check back soon!</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-5">
            <div class="cta-section wow fadeIn" data-wow-delay="0.5s">
                <a href="{{ route('products') }}" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg">
                    <i class="fa fa-th-large me-2"></i>
                    Explore All Products
                </a>
                <p class="text-muted mt-3">Discover our complete range of industrial compressor solutions</p>
            </div>
        </div>
    </div>
</div>
<!-- Product Categories End -->

<!-- Video Section Start -->
<div class="video-section position-relative">
    <!-- GTM Video Section Tracking -->
    <x-gtm-tracking event="section_view" :data="['section_name' => 'video_section', 'section_type' => 'brand_video', 'video_source' => 'ktx_xiya_intro']" />

    <!-- Background Video -->
    <div class="video-background">
        <video class="background-video" autoplay loop muted playsinline>
            <source src="{{ asset('videos/ktx_xiya_intro.webm') }}" type="video/webm">
            <source src="{{ asset('videos/ktx_xiya_intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Video Controls -->
        <div class="video-controls">
            <button class="btn btn-light btn-sm rounded-circle video-control-btn" id="muteBtn" title="Toggle Sound">
                <i class="fas fa-volume-mute" id="muteIcon"></i>
            </button>
        </div>
    </div>
</div>
<!-- Video Section End -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const video = document.querySelector('.background-video');
    const muteBtn = document.getElementById('muteBtn');
    const muteIcon = document.getElementById('muteIcon');

    if (video && muteBtn) {
        // Initially muted
        video.muted = true;

        muteBtn.addEventListener('click', function() {
            if (video.muted) {
                video.muted = false;
                muteIcon.className = 'fas fa-volume-up';
                muteBtn.title = 'Mute Sound';

                // GTM Video Unmute Tracking
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'video_unmute', {
                        'event_category': 'video_interaction',
                        'event_label': 'ktx_xiya_intro',
                        'video_title': 'KTX Xiya Introduction'
                    });
                }
            } else {
                video.muted = true;
                muteIcon.className = 'fas fa-volume-mute';
                muteBtn.title = 'Unmute Sound';

                // GTM Video Mute Tracking
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'video_mute', {
                        'event_category': 'video_interaction',
                        'event_label': 'ktx_xiya_intro',
                        'video_title': 'KTX Xiya Introduction'
                    });
                }
            }
        });

        // Handle video loading
        video.addEventListener('loadeddata', function() {
            console.log('Video loaded successfully');

            // GTM Video Load Tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'video_load', {
                    'event_category': 'video_interaction',
                    'event_label': 'ktx_xiya_intro',
                    'video_title': 'KTX Xiya Introduction'
                });
            }
        });

        video.addEventListener('error', function() {
            console.error('Error loading video');

            // GTM Video Error Tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'video_error', {
                    'event_category': 'video_interaction',
                    'event_label': 'ktx_xiya_intro',
                    'video_title': 'KTX Xiya Introduction',
                    'error_type': 'load_failed'
                });
            }
        });
    }

    // GTM Category Card Click Tracking
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const categoryName = this.querySelector('.category-name').textContent;
            const productCount = this.querySelector('.count-badge').textContent;

            if (typeof gtag !== 'undefined') {
                gtag('event', 'category_card_click', {
                    'event_category': 'product_interaction',
                    'event_label': categoryName,
                    'category_name': categoryName,
                    'product_count': productCount
                });
            }
        });
    });

    // GTM News Article Click Tracking
    const newsLinks = document.querySelectorAll('.news-item a[href*="/news/"]');
    newsLinks.forEach(link => {
        link.addEventListener('click', function() {
            const articleTitle = this.closest('.news-item').querySelector('h5').textContent;

            if (typeof gtag !== 'undefined') {
                gtag('event', 'news_article_click', {
                    'event_category': 'content_interaction',
                    'event_label': articleTitle,
                    'article_title': articleTitle
                });
            }
        });
    });
});
</script>

<!-- News & Articles Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <!-- GTM News Section Tracking -->
        <x-gtm-tracking event="section_view" :data="['section_name' => 'news_articles', 'section_type' => 'content_showcase', 'articles_count' => count($latestNews)]" />

        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Latest Updates</div>
            <h1 class="mb-4">News & Articles</h1>
            <p class="mb-4">Stay updated with the latest news, industry insights, and technological advancements in the compressor industry.</p>
        </div>
        <div class="row g-4">
            @forelse($latestNews as $news)
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="news-item rounded overflow-hidden shadow-sm h-100">
                    @if($news->image)
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $news->image) }}"
                             alt="{{ $news->title }}"
                             class="img-fluid w-100"
                             style="height: 200px; object-fit: cover;">
                    </div>
                    @else
                    <div class="news-image bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fa fa-newspaper-o fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="news-content p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">
                                <i class="fa fa-calendar me-1"></i>
                                {{ $news->published_at ? $news->published_at->format('M d, Y') : 'Draft' }}
                            </small>
                            @if($news->author)
                            <small class="text-muted">
                                <i class="fa fa-user me-1"></i>
                                {{ $news->author }}
                            </small>
                            @endif
                        </div>
                        <h5 class="mb-3">{{ Str::limit($news->title, 60) }}</h5>
                        <p class="mb-3">{{ Str::limit($news->excerpt ?? $news->content, 120) }}</p>
                        <a href="{{ route('news.show', $news->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No news articles available at the moment.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('news.index') }}" class="btn btn-primary rounded-pill px-5">View All News</a>
        </div>
    </div>
</div>
<!-- News & Articles End -->
@endsection

@push('styles')
<style>
/* ====================================================================
   CSS Variables
   ==================================================================== */
:root {
    --primary: #0072b3;
    --secondary: #15ACE1;
}

/* ====================================================================
   Product Categories - Card Styles
   ==================================================================== */
.category-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.05);
    height: 100%;
}

.category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 114, 179, 0.15);
    border-color: var(--primary);
}

/* ====================================================================
   Category Image & Container
   ==================================================================== */
.category-image-container {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.category-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform .4s ease;
}

.category-card:hover .category-image {
    transform: scale(1.1);
}

.category-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
}

/* ====================================================================
   Overlay Styles
   ==================================================================== */
/* Product Count Overlay */
.product-count-overlay {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 8px 12px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    z-index: 1000;
}

.count-badge {
    display: block;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary);
    line-height: 1;
}

.count-text {
    color: #6c757d;
    font-size: 0.75rem;
    font-weight: 500;
}

/* Hover Overlay */
.category-hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 114, 179, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all .3s ease;
}

.category-card:hover .category-hover-overlay {
    opacity: 1;
}

.hover-content {
    text-align: center;
    color: white;
    transform: translateY(20px);
    transition: transform .3s ease;
}

.category-card:hover .hover-content {
    transform: translateY(0);
}

.hover-content i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    display: block;
}

.hover-content span {
    font-size: 1rem;
    font-weight: 500;
}

/* ====================================================================
   Category Info Section
   ==================================================================== */
.category-info {
    padding: 1.25rem;
    text-align: center;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

.category-name {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.75rem;
    transition: color .3s ease;
}

.category-card:hover .category-name {
    color: var(--primary);
}

/* ====================================================================
   Utility Styles
   ==================================================================== */
/* Empty State */
.empty-state-icon {
    opacity: 0.6;
}

/* CTA Section */
.cta-section .btn {
    transition: all .3s ease;
}

.cta-section .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 114, 179, 0.3) !important;
}

/* ====================================================================
   Video Section - Background Video
   ==================================================================== */
.video-section {
    height: 65vh;
    min-height: 300px;
    overflow: hidden;
}

.video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.background-video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100vw;
    height: 100vh;
    transform: translate(-50%, -50%);
    object-fit: contain;
}

/* Video Controls */
.video-controls {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 10;
}

.video-control-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    backdrop-filter: blur(10px);
    transition: all .3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.video-control-btn:hover {
    background: rgba(255, 255, 255, 1);
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.video-control-btn i {
    font-size: 1rem;
    color: #333;
}

/* Video Content Overlay */
.video-content-overlay {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
    background: rgba(0, 0, 0, 0.4);
}

.video-content {
    padding: 2rem;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.video-content h1 {
    font-size: 3rem;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.video-content p {
    font-size: 1.2rem;
    line-height: 1.6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.video-content .btn {
    font-weight: 600;
    transition: all .3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.video-content .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

/* ====================================================================
   Responsive Design
   ==================================================================== */
@media (max-width: 768px) {
    .category-image-container {
        height: 160px;
    }

    .category-info {
        padding: 1rem;
    }

    .category-name {
        font-size: 1rem;
    }

    .product-count-overlay {
        top: 10px;
        right: 10px;
        padding: 6px 10px;
    }

    .count-badge {
        font-size: 1rem;
    }

    .count-text {
        font-size: 0.7rem;
    }

    /* Video Section Mobile */
    .video-section {
        height: 70vh;
        min-height: 500px;
    }

    .video-content h1 {
        font-size: 2rem;
    }

    .video-content p {
        font-size: 1rem;
    }

    .video-content {
        padding: 1.5rem;
    }

    .video-controls {
        top: 15px;
        right: 15px;
    }

    .video-control-btn {
        width: 35px;
        height: 35px;
    }

    .video-control-btn i {
        font-size: 0.9rem;
    }
}
</style>
@endpush
