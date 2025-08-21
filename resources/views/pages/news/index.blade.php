@extends('layouts.app')

@section('title', 'News & Articles - KTX Nova Compressor Group | Industry Insights & Updates')

@section('meta_description', 'Stay updated with the latest news, industry insights, and technological advancements in the industrial compressor industry from KTX Nova Compressor Group.')
@section('meta_keywords', 'compressor news, industrial compressor articles, KTX news, compressor industry updates, industrial equipment news, Dubai compressor company')

@section('og_title', 'News & Articles - KTX Nova Compressor Group | Industry Insights')
@section('og_description', 'Stay updated with the latest news, industry insights, and technological advancements in the industrial compressor industry from KTX Nova Compressor Group.')
@section('og_image', asset('img/ktx_logo_sq.jpg'))
@section('og_type', 'website')

@section('twitter_title', 'News & Articles - KTX Nova Compressor Group | Industry Insights')
@section('twitter_description', 'Stay updated with the latest news, industry insights, and technological advancements in the industrial compressor industry.')
@section('twitter_card', 'summary_large_image')

@section('hero_title', 'News & Articles')

@section('hero_breadcrumb')
    <li class="breadcrumb-item text-white active" aria-current="page">News</li>
@endsection

@section('content')
<!-- GTM News Index Page Tracking -->
<x-gtm-tracking event="page_view" :data="['page_title' => 'News & Articles', 'page_type' => 'news_listing', 'user_type' => 'visitor', 'articles_count' => count($news)]" />

<!-- News List Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="row g-4">
            @forelse($news as $article)
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="news-item rounded overflow-hidden shadow-sm h-100">
                    @if($article->image)
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $article->image) }}"
                             alt="{{ $article->title }}"
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
                                {{ $article->formatted_published_date }}
                            </small>
                            @if($article->author)
                            <small class="text-muted">
                                <i class="fa fa-user me-1"></i>
                                {{ $article->author }}
                            </small>
                            @endif
                        </div>
                        <h5 class="mb-3">{{ Str::limit($article->title, 60) }}</h5>
                        <p class="mb-3">{{ Str::limit($article->excerpt, 120) }}</p>
                        <a href="{{ route('news.show', $article->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="py-5">
                    <i class="fa fa-newspaper-o fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">No News Articles Available</h4>
                    <p class="text-muted">We're working on bringing you the latest updates. Please check back soon!</p>
                </div>
            </div>
            @endforelse
        </div>

        @if($news->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</div>
<!-- News List End -->
@endsection
