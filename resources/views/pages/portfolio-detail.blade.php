@extends('layouts.app')

@section('title', $portfolio->title . ' - KTX')

@section('content')
<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">{{ $portfolio->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('portfolio') }}">Portfolio</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $portfolio->title }}</li>
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

<!-- Portfolio Detail Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Portfolio Info -->
            <div class="col-lg-8">
                <div class="portfolio-detail">
                    <h2 class="mb-4">{{ $portfolio->title }}</h2>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Project Details</h5>
                                    <ul class="list-unstyled">
                                        <li><strong>Client:</strong> {{ $portfolio->client }}</li>
                                        <li><strong>Location:</strong> {{ $portfolio->location }}</li>
                                        <li><strong>Category:</strong> {{ $portfolio->category }}</li>
                                        <li><strong>Completion Date:</strong> {{ \Carbon\Carbon::parse($portfolio->completion_date)->format('F Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Project Overview</h5>
                                    <p class="card-text">{{ $portfolio->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4>Project Description</h4>
                        <p>{{ $portfolio->description }}</p>
                        <p>This project demonstrates our expertise in industrial compressor solutions and our commitment to delivering high-quality results for our clients. We worked closely with {{ $portfolio->client }} to ensure all requirements were met and exceeded expectations.</p>
                    </div>

                    <div class="mb-4">
                        <h4>Key Achievements</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-primary me-2"></i>Successfully completed within timeline</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Exceeded performance expectations</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Implemented energy-efficient solutions</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Provided comprehensive training</li>
                            <li><i class="fa fa-check text-primary me-2"></i>Established long-term support relationship</li>
                        </ul>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-primary px-4">Request Similar Project</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary px-4">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="portfolio-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Related Projects</h5>
                            <div class="list-group list-group-flush">
                                @foreach($relatedPortfolios as $relatedPortfolio)
                                <a href="{{ route('portfolio.detail', $relatedPortfolio->slug) }}" class="list-group-item list-group-item-action">
                                    <div>
                                        <h6 class="mb-1">{{ $relatedPortfolio->title }}</h6>
                                        <small class="text-muted">{{ $relatedPortfolio->client }} - {{ $relatedPortfolio->location }}</small>
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
<!-- Portfolio Detail End -->

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
