@extends('layouts.app')

@section('title', $service->title . ' - KTX Nova Compressor Group | Service Details')

@section('meta_description', $service->description ?: 'Learn about ' . $service->title . ' service from KTX Nova Compressor Group. Professional industrial compressor solutions and support services.')
@section('meta_keywords', 'KTX service, ' . $service->title . ', industrial compressor service, compressor maintenance, technical support, Dubai compressor service')

@section('og_title', $service->title . ' - KTX Nova Compressor Group')
@section('og_description', $service->description ?: 'Learn about ' . $service->title . ' service from KTX Nova Compressor Group.')
@section('og_image', asset('img/service-1.jpg'))
@section('og_type', 'website')

@section('twitter_title', $service->title . ' - KTX Nova Compressor Group')
@section('twitter_description', $service->description ?: 'Learn about ' . $service->title . ' service from KTX Nova Compressor Group.')
@section('twitter_card', 'summary_large_image')

@section('content')
<!-- GTM Service Detail Page Tracking -->
<x-gtm-tracking event="page_view" :data="['page_title' => $service->title, 'page_type' => 'service_detail', 'user_type' => 'visitor', 'service_category' => 'industrial_compressor']" />

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">{{ $service->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('services') }}">Services</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $service->title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('img/hero-img.png') }}" alt="" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Service Detail Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Service Info -->
            <div class="col-lg-8">
                <div class="service-detail">
                    <div class="d-flex align-items-center mb-4">
                        <div class="btn-sm-square bg-primary rounded-circle me-3">
                            <i class="fa {{ $service->icon }} text-white"></i>
                        </div>
                        <h2 class="mb-0">{{ $service->title }}</h2>
                    </div>

                    <div class="mb-4">
                        <p class="lead">{{ $service->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Service Overview</h4>
                        <p>Our {{ $service->title }} service is designed to meet the highest standards of quality and efficiency. We provide comprehensive solutions tailored to your specific industrial needs.</p>
                    </div>

                    <div class="mb-4">
                        <h4>What We Offer</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-primary me-2"></i>Expert consultation and planning</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Professional installation and setup</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Ongoing maintenance and support</li>
                            <li><i class="fa fa-check text-primary me-2"></i>24/7 emergency response</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Training and certification programs</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h4>Why Choose Our Service</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="btn-sm-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-star text-white"></i>
                                    </div>
                                    <span>20+ Years Experience</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="btn-sm-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-users text-white"></i>
                                    </div>
                                    <span>Expert Team</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="btn-sm-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-clock text-white"></i>
                                    </div>
                                    <span>24/7 Support</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="btn-sm-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-shield text-white"></i>
                                    </div>
                                    <span>Quality Guarantee</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-primary px-4">Request Quote</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary px-4">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Other Services</h5>
                            <div class="list-group list-group-flush">
                                @foreach($otherServices as $otherService)
                                <a href="{{ route('service.detail', $otherService->slug) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex align-items-center">
                                        <div class="btn-sm-square bg-primary rounded-circle me-3">
                                            <i class="fa {{ $otherService->icon }} text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">{{ $otherService->title }}</h6>
                                            <small class="text-muted">{{ Str::limit($otherService->description, 60) }}</small>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Detail End -->

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
