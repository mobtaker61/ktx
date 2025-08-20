@extends('layouts.app')

@section('title', 'KTX - Industrial Compressors for Your Projects')

@section('meta_description', 'KTX specializes in industrial compressors with unique and innovative technology. We provide cutting-edge solutions for industrial applications worldwide including air compressors, screw compressors, and compressor parts.')
@section('meta_keywords', 'industrial compressor, air compressor, screw compressor, compressor parts, compressor service, KTX, industrial equipment, compressor technology, industrial solutions, manufacturing equipment')

@section('og_title', 'KTX - Industrial Compressors for Your Projects')
@section('og_description', 'Leading provider of industrial compressors with unique and innovative technology. Expert engineering and reliable solutions worldwide.')
@section('og_image', asset('img/base/ktx_logo.png'))

@section('twitter_title', 'KTX - Industrial Compressors for Your Projects')
@section('twitter_description', 'Leading provider of industrial compressors with unique and innovative technology. Expert engineering and reliable solutions worldwide.')

@section('content')
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

<!-- Feature Start -->
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
<!-- Feature End -->

<!-- FAQs Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Popular FAQs</div>
            <h1 class="mb-4">Frequently Asked Questions</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="accordion" id="accordionFAQ1">
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                What types of compressors do you offer?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                We offer a wide range of industrial compressors including air compressors, gas compressors, and specialized compressors for various industrial applications. Our products are designed for high performance and energy efficiency.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Do you provide maintenance services?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Yes, we provide comprehensive maintenance and repair services for all our compressor systems. Our team of experts ensures optimal performance and longevity of your equipment.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion" id="accordionFAQ2">
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can you customize compressors for specific needs?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Absolutely! We specialize in customizing compressor solutions to meet your specific industrial requirements. Our engineering team works closely with you to design the perfect solution.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                What industries do you serve?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                We serve a wide range of industries including manufacturing, oil & gas, chemical processing, food & beverage, pharmaceuticals, and many others requiring industrial compressor solutions.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs End -->


@endsection
