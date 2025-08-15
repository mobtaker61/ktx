@extends('layouts.app')

@section('title', 'Our Services - KTX')

@section('hero_title', 'Our Services')

@section('hero_breadcrumb')
<li class="breadcrumb-item text-white active" aria-current="page">Our Services</li>
@endsection

@section('content')
<!-- Services Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h5 class="text-primary">Our Services</h5>
            <h1 class="mb-3">Industrial Compressor Solutions</h1>
            <p class="mb-5">We provide comprehensive industrial compressor solutions tailored to your specific needs.</p>
        </div>
        <div class="row g-5">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('img/service-1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="service-text">
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-sm-square bg-primary rounded-circle me-3">
                                <i class="fa {{ $service->icon }} text-white"></i>
                            </div>
                            <h5 class="mb-0">{{ $service->title }}</h5>
                        </div>
                        <p class="mb-4">{{ $service->description }}</p>
                        <a href="{{ route('service.detail', $service->slug) }}" class="btn btn-primary px-3">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Feature Start -->
<div class="container-fluid bg-primary feature pt-5">
    <div class="container pt-5">
        <div class="row g-5">
            <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Why Choose Us</div>
                <h1 class="text-white mb-4">We're Best in Industrial Compressor Industry with 20 Years of Experience</h1>
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
                            <i class="fa fa-home fa-3x text-white"></i>
                            <div class="ms-3">
                                <h2 class="text-white mb-0" data-toggle="counter-up">500</h2>
                                <p class="text-white mb-0">Happy Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                            <i class="fa fa-home fa-3x text-white"></i>
                            <div class="ms-3">
                                <h2 class="text-white mb-0" data-toggle="counter-up">1000</h2>
                                <p class="text-white mb-0">Projects Completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end wow fadeIn" data-wow-delay="0.5s">
                <img class="img-fluid" src="{{ asset('img/feature.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->
@endsection
