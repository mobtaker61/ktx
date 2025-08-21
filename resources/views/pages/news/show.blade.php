@extends('layouts.app')

@section('title', $news->title . ' - KTX Compressor')

@section('meta_description', $news->excerpt)
@section('meta_keywords', 'KTX news, ' . $news->title . ', compressor industry, industrial equipment')

@section('og_title', $news->title . ' - KTX Compressor')
@section('og_description', $news->excerpt)
@section('og_image', $news->image ? asset('storage/' . $news->image) : asset('img/base/ktx_logo.png'))

@section('hero_title', $news->title)

@section('hero_breadcrumb')
    <li class="breadcrumb-item"><a class="text-white" href="{{ route('news.index') }}">News</a></li>
    <li class="breadcrumb-item text-white active" aria-current="page">{{ Str::limit($news->title, 30) }}</li>
@endsection

@section('content')
<!-- News Detail Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="news-detail bg-white rounded shadow-sm p-4">
                    @if($news->excerpt)
                    <div class="news-excerpt mb-4 bg-light rounded p-3">
                        <p class="lead">{{ $news->excerpt }}</p>
                    </div>
                    @endif

                    <div class="news-content">
                        {!! $news->content !!}
                    </div>

                    <div class="news-footer mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-2">
                                <span class="badge bg-primary">{{ $news->status }}</span>
                                @if($news->published_at)
                                <span class="badge bg-success">Published</span>
                                @endif
                            </div>
                            <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                                <i class="fa fa-arrow-left me-1"></i>
                                Back to News
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                @if($news->image)
                <div class="news-image mb-4">
                    <img src="{{ asset('storage/' . $news->image) }}"
                         alt="{{ $news->title }}"
                         class="img-fluid w-100 rounded"
                         style="max-height: 400px; object-fit: cover;">
                </div>
                @endif
                <div class="news-meta mb-4 bg-light rounded p-3 mt-4">
                    <div class="d-flex flex-wrap gap-3 align-items-center text-muted">
                        <div>
                            <i class="fa fa-calendar me-1"></i>
                            {{ $news->formatted_published_date }}
                        </div>
                        @if($news->author)
                        <div>
                            <i class="fa fa-user me-1"></i>
                            {{ $news->author }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Related News -->
                @if($relatedNews->count() > 0)
                <div class="bg-white rounded shadow-sm p-4 mb-4">
                    <h4 class="mb-3">Related Articles</h4>
                    @foreach($relatedNews as $related)
                    <div class="related-news-item mb-3 pb-3 border-bottom">
                        @if($related->image)
                        <div class="d-flex gap-3">
                            <img src="{{ asset('storage/' . $related->image) }}"
                                 alt="{{ $related->title }}"
                                 class="rounded"
                                 style="width: 80px; height: 60px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('news.show', $related->slug) }}" class="text-decoration-none">
                                        {{ Str::limit($related->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ $related->formatted_published_date }}</small>
                            </div>
                        </div>
                        @else
                        <div>
                            <h6 class="mb-1">
                                <a href="{{ route('news.show', $related->slug) }}" class="text-decoration-none">
                                    {{ Str::limit($related->title, 50) }}
                                </a>
                            </h6>
                            <small class="text-muted">{{ $related->formatted_published_date }}</small>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Share Article -->
                <div class="bg-white rounded shadow-sm p-4">
                    <h4 class="mb-3">Share Article</h4>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm"
                           title="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm"
                           title="Share on Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm"
                           title="Share on LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . request()->url()) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm"
                           title="Share on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <button onclick="copyToClipboard('{{ request()->url() }}')"
                                class="btn btn-outline-primary btn-sm"
                                title="Copy Link">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>

                <script>
                function copyToClipboard(url) {
                    navigator.clipboard.writeText(url).then(function() {
                        alert('Link copied to clipboard!');
                    }).catch(function(err) {
                        console.error('Could not copy text: ', err);
                    });
                }
                </script>
            </div>
        </div>
    </div>
</div>
<!-- News Detail End -->
@endsection
