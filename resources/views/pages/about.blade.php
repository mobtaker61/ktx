@extends('layouts.app')

@section('title', 'About Us - KTX')

@section('hero_title', 'About Us')

@section('hero_breadcrumb')
    <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
@endsection

@section('hero_image', asset('img/base/ktx_shaft.png'))

@section('content')
    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid"
                            style="width: 100%; height: 100%; background-image: url('{{ asset('img/base/about_bg_sky.jpg') }}'); background-size: cover; background-position: bottom;padding-top: 200px;"
                            src="{{ asset('img/base/ktx_3d_model.png') }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                    <h1 class="mb-4">Leading Industrial Compressor Solutions</h1>
                    <p class="mb-4">KTX specializes in industrial compressors with unique and innovative technology. We
                        provide cutting-edge solutions for industrial applications worldwide. Our commitment to quality and
                        innovation has made us a trusted partner for businesses worldwide.</p>
                    <p class="mb-4">With over 20 years of experience in the industrial compressor industry, we have
                        developed advanced technologies that ensure optimal performance, energy efficiency, and reliability
                        for our clients.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Advanced Technology</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Quality Assurance</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Global Service</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="{{ route('products') }}">Our Products</a>
                        <a class="btn btn-outline-primary btn-square me-3" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href="#"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Companeis at a glance Start -->
    <div class="container-fluid py-5 bg-primary feature">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h5 class="text-white">Companies at a Glance</h5>
                <h1 class="mb-3 text-white">The Power of Three</h1>
                <p class="mb-5 text-light">KTX is the result of a strategic partnership between three industry leaders, combining expertise and innovation to deliver exceptional compressor solutions.</p>
            </div>

            <div class="row g-5 align-items-center">
                <!-- Left Side - Triangular Animation -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="companies-triangle-container text-center">
                        <section class="tri-wrapper">
                            <div class="tri-stage" aria-label="Animated triangle logos">
                                <!-- Logo #1 -->
                                <div class="logo-dot" aria-label="Kobelco Logo" onclick="showCompanyInfo('kobelco')">
                                    <img src="{{ asset('img/partners/kobelco-logo.png') }}" alt="Kobelco Logo"/>
                                </div>

                                <!-- Logo #2 -->
                                <div class="logo-dot" aria-label="TCI Logo" onclick="showCompanyInfo('tci')">
                                    <img src="{{ asset('img/partners/tci-logo.png') }}" alt="TCI Logo"/>
                                </div>

                                <!-- Logo #3 -->
                                <div class="logo-dot" aria-label="Xiya Logo" onclick="showCompanyInfo('xiya')">
                                    <img src="{{ asset('img/partners/xiya-logo.png') }}" alt="Xiya Logo"/>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Right Side - Company Information -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="company-info-container">
                        <!-- Kobelco Info -->
                        <div id="kobelco-info" class="company-info active">
                            <div class="company-header mb-4">
                                <h3 class="text-white mb-2">Kobelco</h3>
                                <p class="text-light mb-3">Leading Japanese Industrial Solutions</p>
                            </div>
                            <div class="company-description mb-4">
                                <p class="text-light">Kobelco is a global leader in industrial machinery and equipment, specializing in compressors, construction machinery, and advanced engineering solutions. With decades of experience and cutting-edge technology, Kobelco brings world-class expertise to the KTX partnership.</p>
                            </div>
                            <div class="company-details mb-4">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Founded</label>
                                            <p class="mb-0 text-white">1928</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Headquarters</label>
                                            <p class="mb-0 text-white">Kobe, Japan</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Specialization</label>
                                            <p class="mb-0 text-white">Industrial Machinery</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-muted small">Website</label>
                                            <p class="mb-0"><a href="https://www.kobelco.co.jp" target="_blank" class="text-warning">kobelco.co.jp</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TCI Petrochem Info -->
                        <div id="tci-info" class="company-info">
                            <div class="company-header mb-4">
                                <h3 class="text-white mb-2">TCI Petrochem</h3>
                                <p class="text-light mb-3">Petrochemical Industry Experts</p>
                            </div>
                            <div class="company-description mb-4">
                                <p class="text-light">TCI Petrochem specializes in petrochemical solutions and industrial applications, providing innovative technologies for the energy sector. Their expertise in chemical processes and industrial systems complements KTX's compressor technology perfectly.</p>
                            </div>
                            <div class="company-details mb-4">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Founded</label>
                                            <p class="mb-0 text-white">1995</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Headquarters</label>
                                            <p class="mb-0 text-white">Tehran, Iran</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Specialization</label>
                                            <p class="mb-0 text-white">Petrochemical Solutions</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-muted small">Website</label>
                                            <p class="mb-0"><a href="https://www.tcipetrochem.com" target="_blank" class="text-warning">tcipetrochem.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Xiya Compressor Info -->
                        <div id="xiya-info" class="company-info">
                            <div class="company-header mb-4">
                                <h3 class="text-white mb-2">Xiya Compressor</h3>
                                <p class="text-light mb-3">Compressor Technology Innovators</p>
                            </div>
                            <div class="company-description mb-4">
                                <p class="text-light">Xiya Compressor is a leading manufacturer of advanced compressor systems, specializing in screw compressors and industrial applications. Their innovative designs and manufacturing expertise form the core of KTX's product portfolio.</p>
                            </div>
                            <div class="company-details mb-4">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Founded</label>
                                            <p class="mb-0 text-white">2000</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Headquarters</label>
                                            <p class="mb-0 text-white">Shanghai, China</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-light small">Specialization</label>
                                            <p class="mb-0 text-white">Compressor Systems</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="detail-item">
                                            <label class="form-label fw-bold text-muted small">Website</label>
                                            <p class="mb-0"><a href="https://www.xiyacompressor.com" target="_blank" class="text-warning">xiyacompressor.com</a></p>
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
    <!-- Companeis at a glance End -->

    <!-- Kobelco Company Section Start -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="company-gallery-container">
                        <div id="kobelco-carousel">
                            <!-- Owl Carousel will be generated dynamically -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="company-detail-content">
                        <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Kobelco</div>
                        <h2 class="mb-4">Global Industrial Machinery Leader</h2>
                        <p class="mb-4">Kobelco, established in 1928, is a Japanese multinational corporation that has been at the forefront of industrial innovation for nearly a century. The company specializes in manufacturing and selling construction machinery, industrial machinery, and advanced engineering solutions.</p>
                        <p class="mb-4">With headquarters in Kobe, Japan, Kobelco has established a global presence through its extensive network of subsidiaries and partnerships. The company's expertise in compressors and industrial equipment has made it a trusted partner for businesses worldwide, particularly in the energy, manufacturing, and construction sectors.</p>
                        <p class="mb-4">Kobelco's commitment to quality, innovation, and sustainability has earned it numerous industry awards and certifications. The company invests heavily in research and development, ensuring that its products meet the highest standards of performance, efficiency, and environmental responsibility.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kobelco Company Section End -->

    <!-- TCI Petrochem Company Section Start -->
    <div class="container-fluid py-2 bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="company-detail-content">
                        <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">TCI Petrochem</div>
                        <h2 class="mb-4">Petrochemical Industry Innovators</h2>
                        <p class="mb-4">TCI Petrochem, founded in 1995, is a leading Iranian company specializing in petrochemical solutions and industrial applications. The company has established itself as a key player in the Middle East's energy sector, providing innovative technologies and comprehensive solutions for complex industrial processes.</p>
                        <p class="mb-4">Based in Tehran, Iran, TCI Petrochem has developed strong partnerships with international technology providers and has successfully implemented numerous projects across the region. The company's expertise spans from basic petrochemical processes to advanced industrial applications, making it a valuable partner for energy and manufacturing companies.</p>
                        <p class="mb-4">TCI Petrochem's commitment to technological advancement and environmental sustainability has positioned it as a forward-thinking company in the petrochemical industry. The company continuously invests in research and development to provide cutting-edge solutions that meet the evolving needs of the energy sector.</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="company-gallery-container">
                        <div id="tci-carousel">
                            <!-- Owl Carousel will be generated dynamically -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TCI Petrochem Company Section End -->

    <!-- Xiya Compressor Company Section Start -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="company-gallery-container">
                        <div id="xiya-carousel">
                            <!-- Owl Carousel will be generated dynamically -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="company-detail-content">
                        <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Xiya Compressor</div>
                        <h2 class="mb-4">Compressor Technology Pioneers</h2>
                        <p class="mb-4">Xiya Compressor, established in 2000, is a leading Chinese manufacturer specializing in advanced compressor systems and industrial applications. The company has become synonymous with innovation in the compressor industry, particularly in screw compressors and related technologies.</p>
                        <p class="mb-4">Headquartered in Shanghai, China, Xiya Compressor has built a reputation for delivering high-quality, energy-efficient compressor solutions that meet the demanding requirements of modern industrial applications. The company's products are used across various sectors, including manufacturing, energy, and chemical processing.</p>
                        <p class="mb-4">Xiya Compressor's commitment to research and development has resulted in numerous patents and technological breakthroughs. The company's innovative designs focus on energy efficiency, reliability, and environmental sustainability, making it a preferred choice for companies seeking advanced compressor solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Xiya Compressor Company Section End -->
@endsection

@push('styles')
<style>
    /* Companies Triangle Section - CSS-Only Animated Triangle */
    .companies-triangle-container {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tri-wrapper {
        display: grid;
        place-items: center;
        padding: 24px;
    }

    /* پس‌زمینه PNG مثلث */
    .tri-stage {
        position: relative;
        width: min(65vmin, 520px);
        aspect-ratio: 1/1;
        background: url('{{ asset('img/base/triangl.png') }}') center/contain no-repeat;

        /* مختصات رأس‌ها - درصد نسبت به والد */
        --p1x: 50%;  --p1y: 8%;   /* بالا - کمی پایین‌تر */
        --p2x: 12%;  --p2y: 80%;  /* چپ پایین - کمی بالاتر */
        --p3x: 88%;  --p3y: 80%;  /* راست پایین - کمی بالاتر */

        --dot-size: 100px;         /* اندازه دایره لوگو - کمی بزرگتر */
        --loop: 12s;               /* طول چرخه کامل - 2 ثانیه برای هر ضلع */
    }

    /* استایل دایره لوگو */
    .logo-dot {
        position: absolute;
        width: var(--dot-size);
        height: var(--dot-size);
        left: var(--p1x);
        top: var(--p1y);
        transform: translate(-50%, -50%);
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 10px 24px rgba(0, 0, 0, .16);
        display: grid;
        place-items: center;
        animation: orbit-3 var(--loop) linear infinite;
        will-change: left, top;
        outline: 2px solid rgba(0, 0, 0, .06);
        outline-offset: -1px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        z-index: 10;
        overflow: hidden;
    }

    /* تصویر داخل دایره */
    .logo-dot > img {
        width: 80%;
        height: 80%;
        object-fit: contain;
        user-select: none;
        pointer-events: none;
        transition: transform 0.3s ease;
    }

    /* اختلاف فاز شروع */
    .logo-dot:nth-child(1) {
        animation-delay: 0s;
    }
    .logo-dot:nth-child(2) {
        animation-delay: -4s;
    }
    .logo-dot:nth-child(3) {
        animation-delay: -8s;
    }

    /* انیمیشن بین سه رأس */
    @keyframes orbit-3 {
        0%        { left: var(--p1x); top: var(--p1y); }
        33.333%   { left: var(--p2x); top: var(--p2y); }
        66.666%   { left: var(--p3x); top: var(--p3y); }
        100%      { left: var(--p1x); top: var(--p1y); }
    }

    /* توقف انیمیشن روی هاور */
    .tri-stage:hover .logo-dot {
        animation-play-state: paused;
    }

    /* احترام به prefers-reduced-motion */
    @media (prefers-reduced-motion: reduce) {
        .logo-dot {
            animation: none;
        }
    }

    /* Hover effects */
    .logo-dot:hover {
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .25);
        z-index: 15;
    }

    .logo-dot:hover > img {
        transform: scale(1.05);
    }

    /* Active state for selected logo */
    .logo-dot.active {
        outline: 3px solid var(--primary);
        outline-offset: -2px;
        box-shadow: 0 0 0 8px rgba(13, 110, 253, 0.2), 0 10px 24px rgba(0, 0, 0, .16);
        transform: translate(-50%, -50%) scale(1.05);
        z-index: 20;
    }

    /* Active logo image */
    .logo-dot.active > img {
        transform: scale(1.1);
    }
    /* Company Info Container */
    .company-info-container {
        position: relative;
        min-height: 300px;
    }

    .company-info {
        display: none;
        animation: fadeIn 0.5s ease-in-out;
    }

    .company-info.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Company Gallery Styles */
    .company-gallery-container {
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        margin-top: 20px;
    }

    .company-gallery-container h4 {
        color: white;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Owl Carousel Customization */
    .owl-carousel {
        border-radius: 10px;
        overflow: hidden;
    }

    .owl-carousel .item {
        height: 360px;
        padding: 10px;
    }

    .owl-carousel .item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .owl-nav {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: 30;
        pointer-events: none;
    }

    .owl-nav button {
        position: absolute !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 60px !important;
        height: 60px !important;
        background: rgba(0, 0, 0, 0.8) !important;
        border: 2px solid rgba(255, 255, 255, 0.8) !important;
        border-radius: 50% !important;
        color: white !important;
        font-size: 20px !important;
        z-index: 35 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        pointer-events: auto !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .owl-nav .owl-prev {
        left: 20px !important;
    }

    .owl-nav .owl-next {
        right: 20px !important;
    }

    .owl-nav button:hover {
        background: rgba(0, 0, 0, 0.95) !important;
        border-color: white !important;
        transform: translateY(-50%) scale(1.1) !important;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5) !important;
    }

    .owl-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 25;
    }

    .owl-dots button {
        width: 12px;
        height: 12px;
        margin: 0 5px;
        background: rgba(255, 255, 255, 0.5);
        border: none;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .owl-dots button.active {
        background: white;
        transform: scale(1.2);
    }
</style>
@endpush

@push('scripts')
<script>
function showCompanyInfo(company) {
    // Hide all company info
    const allInfo = document.querySelectorAll('.company-info');
    allInfo.forEach(info => {
        info.classList.remove('active');
    });

    // Remove active class from all logos
    const allLogos = document.querySelectorAll('.logo-dot');
    allLogos.forEach(logo => {
        logo.classList.remove('active');
    });

    // Show selected company info
    const selectedInfo = document.getElementById(company + '-info');
    if (selectedInfo) {
        selectedInfo.classList.add('active');
    }

    // Add active class to selected logo
    const selectedLogo = document.querySelector('.logo-dot[aria-label="' + company + ' Logo"]');
    if (selectedLogo) {
        selectedLogo.classList.add('active');
    }
}

// Function to preload images
function preloadImages(images, callback) {
    let loadedCount = 0;
    const totalImages = images.length;

    if (totalImages === 0) {
        callback();
        return;
    }

    images.forEach((image, index) => {
        const img = new Image();
        img.onload = function() {
            loadedCount++;
            if (loadedCount === totalImages) {
                callback();
            }
        };
        img.onerror = function() {
            loadedCount++;
            if (loadedCount === totalImages) {
                callback();
            }
        };
        img.src = image.full_path;
    });
}

// Function to show placeholder content if images fail to load
function showPlaceholderContent() {
    const companies = ['kobelco', 'tci', 'xiya'];
    companies.forEach(company => {
        const carouselContainer = document.getElementById(company + '-carousel');
        if (carouselContainer) {
            carouselContainer.innerHTML = `
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="text-center text-muted">
                        <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                        <p>Failed to load gallery for ${company}</p>
                        <small>Please check the console for details</small>
                    </div>
                </div>
            `;
        }
    });
}

// Initialize galleries when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadCompanyGalleries();
});

// Enhanced loadCompanyGalleries function with conflict checking
async function loadCompanyGalleries() {
    try {
        const response = await fetch('/company-gallery');
        const companiesData = await response.json();

        let totalImages = 0;
        let loadedGalleries = 0;

        // Build carousel for each company
        Object.keys(companiesData).forEach(company => {
            const images = companiesData[company];
            totalImages += images.length;
            buildCompanyCarousel(company, images);
            loadedGalleries++;
        });

        console.log(`✅ All galleries loaded: ${loadedGalleries} companies, ${totalImages} total images`);

    } catch (error) {
        console.error('❌ Error loading company galleries:', error);
        // Show placeholder content if images fail to load
        showPlaceholderContent();

    }
}

// Function to build company carousel with Owl Carousel
function buildCompanyCarousel(company, images) {
    const carouselContainer = document.getElementById(company + '-carousel');
    if (!carouselContainer) {
        console.error(`❌ Carousel container not found: ${company}`);
        return;
    }

    // Clear existing content
    carouselContainer.innerHTML = '';

    if (images.length === 0) {
        // Show placeholder if no images
        carouselContainer.innerHTML = `
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>No images available for ${company}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return;
    }

    // Show loading state briefly
    carouselContainer.innerHTML = `
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="text-center text-primary">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Loading ${company} gallery...</p>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Preload images first, then build carousel
    preloadImages(images, () => {
        carouselContainer.innerHTML = '';

        console.log(`🔨 Building ${company} Owl Carousel with ${images.length} images`);

        // Create owl carousel container
        const owlContainer = document.createElement('div');
        owlContainer.className = 'owl-carousel owl-theme';
        owlContainer.id = `${company}-owl-carousel`;

        // Build carousel items
        images.forEach((image, index) => {
            const item = document.createElement('div');
            item.className = 'item';

            // Create image element
            const img = document.createElement('img');
            img.src = image.full_path;
            img.alt = image.filename;
            img.className = 'img-fluid';
            img.style.cssText = 'width: 100%; height: 400px; object-fit: cover; object-position: center;';

            // Add image load event for debugging
            img.onload = function() {
                console.log(`📸 ${company} image ${index} loaded:`, {
                    src: this.src,
                    naturalWidth: this.naturalWidth,
                    naturalHeight: this.naturalHeight,
                    offsetWidth: this.offsetWidth,
                    offsetHeight: this.offsetHeight
                });
            };

            img.onerror = function() {
                console.error(`❌ ${company} image ${index} failed to load:`, this.src);
            };

            item.appendChild(img);
            owlContainer.appendChild(item);
        });

        carouselContainer.appendChild(owlContainer);

        console.log(`✅ ${company} Owl Carousel built with ${owlContainer.children.length} items`);

        // Initialize Owl Carousel
        setTimeout(() => {
            try {
                // Check if Owl Carousel is available
                if (typeof $.fn.owlCarousel !== 'undefined') {
                    const owlCarousel = $(`#${company}-owl-carousel`).owlCarousel({
                        loop: true,
                        margin: 0,
                        nav: true,
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        },
                        navText: [
                            '<i class="fas fa-chevron-left"></i>',
                            '<i class="fas fa-chevron-right"></i>'
                        ],
                        onInitialized: function() {
                            console.log(`${company} Owl Carousel initialized successfully`);

                            // Force navigation button positioning after initialization
                            setTimeout(() => {
                                const navContainer = this.$element.find('.owl-nav');
                                const navButtons = this.$element.find('.owl-nav button');

                                // Force container positioning
                                navContainer.css({
                                    'position': 'absolute',
                                    'top': '0',
                                    'left': '0',
                                    'right': '0',
                                    'bottom': '0',
                                    'width': '100%',
                                    'height': '100%',
                                    'z-index': '30',
                                    'pointer-events': 'none'
                                });

                                // Force button positioning
                                navButtons.each(function(index) {
                                    const $button = $(this);
                                    const isPrev = $button.hasClass('owl-prev');

                                    $button.css({
                                        'position': 'absolute',
                                        'top': '50%',
                                        'transform': 'translateY(-50%)',
                                        'left': isPrev ? '20px' : 'auto',
                                        'right': isPrev ? 'auto' : '20px',
                                        'width': '60px',
                                        'height': '60px',
                                        'background': 'rgba(0, 0, 0, 0.8)',
                                        'border': '2px solid rgba(255, 255, 255, 0.8)',
                                        'border-radius': '50%',
                                        'color': 'white',
                                        'font-size': '20px',
                                        'z-index': '35',
                                        'display': 'flex',
                                        'align-items': 'center',
                                        'justify-content': 'center',
                                        'cursor': 'pointer',
                                        'pointer-events': 'auto',
                                        'box-shadow': '0 4px 12px rgba(0, 0, 0, 0.3)'
                                    });

                                    // Add hover effects
                                    $button.hover(
                                        function() {
                                            $(this).css({
                                                'background': 'rgba(0, 0, 0, 0.95)',
                                                'border-color': 'white',
                                                'transform': 'translateY(-50%) scale(1.1)',
                                                'box-shadow': '0 6px 20px rgba(0, 0, 0, 0.5)'
                                            });
                                        },
                                        function() {
                                            $(this).css({
                                                'background': 'rgba(0, 0, 0, 0.8)',
                                                'border-color': 'rgba(255, 255, 255, 0.8)',
                                                'transform': 'translateY(-50%) scale(1)',
                                                'box-shadow': '0 4px 12px rgba(0, 0, 0, 0.3)'
                                            });
                                        }
                                    );

                                    // Add click event listener
                                    $button.on('click', function(e) {
                                        e.preventDefault();
                                        e.stopPropagation();
                                        console.log(`${company} navigation button clicked:`, isPrev ? 'prev' : 'next');

                                        if (isPrev) {
                                            this.closest('.owl-carousel').owlCarousel('prev');
                                        } else {
                                            this.closest('.owl-carousel').owlCarousel('next');
                                        }
                                    });
                                });

                                console.log(`${company} navigation buttons positioned and configured`);
                            }, 100);
                        }
                    });

                    // Store reference to owl carousel instance
                    carouselContainer._owlCarousel = owlCarousel.data('owl.carousel');

                } else {
                    console.error(`❌ Owl Carousel not available for ${company}`);
                    // Fallback to simple image display
                    showSimpleImageDisplay(company, images);
                }

            } catch (error) {
                console.error(`Error initializing ${company} Owl Carousel:`, error);
                // Fallback to simple image display
                showSimpleImageDisplay(company, images);
            }
        }, 200);
    });
}

// Fallback function for simple image display
function showSimpleImageDisplay(company, images) {
    const carouselContainer = document.getElementById(company + '-carousel');
    if (!carouselContainer) return;

    console.log(`🔧 Using fallback display for ${company}`);

    carouselContainer.innerHTML = `
        <div class="simple-image-display">
            <div class="current-image-container text-center">
                <img id="${company}-current-image" src="${images[0].full_path}" alt="${images[0].filename}"
                     class="img-fluid" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="image-navigation mt-3 text-center">
                <button class="btn btn-sm btn-outline-primary me-2" onclick="changeImage('${company}', ${images.length}, -1)">
                    <i class="fas fa-chevron-left"></i> Previous
                </button>
                <span class="mx-3">
                    <span id="${company}-image-counter">1</span> / ${images.length}
                </span>
                <button class="btn btn-sm btn-outline-primary ms-2" onclick="changeImage('${company}', ${images.length}, 1)">
                    Next <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    `;

    // Store current image index
    carouselContainer._currentImageIndex = 0;
    carouselContainer._images = images;
}

// Function to change image in fallback display
function changeImage(company, totalImages, direction) {
    const carouselContainer = document.getElementById(company + '-carousel');
    if (!carouselContainer || !carouselContainer._images) return;

    let newIndex = carouselContainer._currentImageIndex + direction;

    // Handle loop
    if (newIndex < 0) newIndex = totalImages - 1;
    if (newIndex >= totalImages) newIndex = 0;

    carouselContainer._currentImageIndex = newIndex;

    const currentImage = carouselContainer.querySelector(`#${company}-current-image`);
    const imageCounter = carouselContainer.querySelector(`#${company}-image-counter`);

    if (currentImage && imageCounter) {
        const image = carouselContainer._images[newIndex];
        currentImage.src = image.full_path;
        currentImage.alt = image.filename;
        imageCounter.textContent = newIndex + 1;

        console.log(`🔄 ${company} image changed to index ${newIndex}: ${image.filename}`);
    }
}

// Logo Rotation System - CSS-Only Animation
let isRotating = true; // CSS animation is always running
let companyInfoInterval = null; // Interval for company info rotation

// Function to automatically rotate company information
function rotateCompanyInfo() {
    // ترتیب اطلاعات باید با جهت چرخش لوگوها هماهنگ باشد
    // لوگوها خلاف ساعت می‌چرخند: Kobelco → TCI → Xiya → Kobelco
    // اما اطلاعات باید ساعتگرد تغییر کند تا با موقعیت رأس‌ها هماهنگ باشد
    const companies = ['xiya', 'tci', 'kobelco']; // ترتیب معکوس برای هماهنگی
    const currentTime = Date.now();
    const cycleTime = 12000; // 12 seconds total cycle
    const segmentTime = cycleTime / 3; // 4 seconds per company

    // Calculate which company should be active based on time
    const currentSegment = Math.floor((currentTime % cycleTime) / segmentTime);
    const activeCompany = companies[currentSegment];

    // Show the active company info
    showCompanyInfo(activeCompany);

    // Update active logo styling
    updateActiveLogo(activeCompany);

    console.log(`🔄 Company info rotated to: ${activeCompany} (segment ${currentSegment + 1}/3)`);
}

// Function to update active logo styling
function updateActiveLogo(activeCompany) {
    // Remove active class from all logos
    const allLogos = document.querySelectorAll('.logo-dot');
    allLogos.forEach(logo => {
        logo.classList.remove('active');
    });

    // Add active class to the current company logo
    const activeLogo = document.querySelector(`.logo-dot[aria-label="${activeCompany} Logo"]`);
    if (activeLogo) {
        activeLogo.classList.add('active');
    }
}

// Function to start company info rotation
function startCompanyInfoRotation() {
    if (companyInfoInterval) return;

    console.log('🚀 Starting company info rotation...');
    companyInfoInterval = setInterval(rotateCompanyInfo, 4000); // Change every 4 seconds

    // Initial rotation
    rotateCompanyInfo();
}

// Function to stop company info rotation
function stopCompanyInfoRotation() {
    if (!companyInfoInterval) return;

    console.log('⏹️ Stopping company info rotation...');
    clearInterval(companyInfoInterval);
    companyInfoInterval = null;
}

// Function to toggle animation (pause/resume)
function toggleAnimation() {
    const logos = document.querySelectorAll('.logo-dot');
    const statusIndicator = document.getElementById('rotation-status');

    if (isRotating) {
        // Pause animation
        logos.forEach(logo => {
            logo.style.animationPlayState = 'paused';
        });
        isRotating = false;
        stopCompanyInfoRotation(); // Also stop company info rotation

        if (statusIndicator) {
            statusIndicator.textContent = 'Auto: OFF';
            statusIndicator.style.background = 'rgba(255, 255, 255, 0.9)';
            statusIndicator.style.color = 'var(--primary)';
        }
        console.log('⏸️ Animation and company info rotation paused');
    } else {
        // Resume animation
        logos.forEach(logo => {
            logo.style.animationPlayState = 'running';
        });
        isRotating = true;
        startCompanyInfoRotation(); // Also start company info rotation

        if (statusIndicator) {
            statusIndicator.textContent = 'Auto: ON';
            statusIndicator.style.background = 'var(--primary)';
            statusIndicator.style.color = 'white';
        }
        console.log('▶️ Animation and company info rotation resumed');
    }
}

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    switch(e.key) {
        case ' ': // Spacebar
            e.preventDefault();
            toggleAnimation();
            break;
    }
});

// Initialize with first company active
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 DOM loaded, initializing CSS-only triangle animation with company info rotation...');

    // Load company galleries
    loadCompanyGalleries();

    // Verify logo elements exist
    const logos = document.querySelectorAll('.logo-dot');
    console.log(`🔍 Found ${logos.length} logo elements:`, logos);

    logos.forEach((logo, index) => {
        const ariaLabel = logo.getAttribute('aria-label');
        console.log(`📍 Logo ${index + 1}: aria-label="${ariaLabel}"`);
    });

    // Start company info rotation automatically
    startCompanyInfoRotation();

    // Add animation info to console
    console.log('🎯 Triangle Animation Controls:');
    console.log('   - Spacebar: Toggle animation (pause/resume)');
    console.log('   - Hover over triangle: Pause animation');
    console.log('   - Click logos: Show company info manually');
    console.log('🎯 CSS Animation Features:');
    console.log('   - Pure CSS animation (no JavaScript rotation)');
    console.log('   - 12-second loop (4 seconds per side)');
    console.log('   - Staggered start: Logo 1 (0s), Logo 2 (-4s), Logo 3 (-8s)');
    console.log('   - Smooth movement between triangle vertices');
    console.log('   - Responsive design with CSS variables');
    console.log('🎯 Company Info Rotation:');
    console.log('   - Automatic rotation every 4 seconds');
    console.log('   - Perfectly synchronized with logo positions');
    console.log('   - Manual override with logo clicks');
    console.log('   - Active logo highlighting');
    console.log('🎯 Synchronization:');
    console.log('   - Logo at top vertex → Kobelco info (0-4s)');
    console.log('   - Logo at right vertex → Xiya info (4-8s)');
    console.log('   - Logo at left vertex → TCI info (8-12s)');
    console.log('🚀 CSS animation and company info rotation are running automatically!');
});

</script>
@endpush
