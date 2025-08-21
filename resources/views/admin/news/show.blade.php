@extends('layouts.admin')

@section('title', 'View News Article - Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">View News Article</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit Article
            </a>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to News
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Article Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Article Content</h6>
                    <div class="d-flex gap-2">
                        @if($news->status === 'published')
                        <span class="badge bg-success">Published</span>
                        @else
                        <span class="badge bg-warning">Draft</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="mb-3">{{ $news->title }}</h2>

                    @if($news->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $news->image) }}"
                             alt="{{ $news->title }}"
                             class="img-fluid rounded w-100"
                             style="max-height: 400px; object-fit: cover;">
                    </div>
                    @endif

                    @if($news->excerpt)
                    <div class="mb-4">
                        <div class="alert alert-info">
                            <strong>Excerpt:</strong> {{ $news->excerpt }}
                        </div>
                    </div>
                    @endif

                    <div class="news-content">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Article Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Article Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td>{{ $news->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Slug:</strong></td>
                            <td><code>{{ $news->slug }}</code></td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                @if($news->status === 'published')
                                <span class="badge bg-success">Published</span>
                                @else
                                <span class="badge bg-warning">Draft</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Author:</strong></td>
                            <td>{{ $news->author ?? 'Not specified' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Published At:</strong></td>
                            <td>
                                @if($news->published_at)
                                {{ $news->published_at->format('M d, Y H:i') }}
                                @else
                                <span class="text-muted">Not published yet</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Created At:</strong></td>
                            <td>{{ $news->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated At:</strong></td>
                            <td>{{ $news->updated_at->format('M d, Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Article
                        </a>

                        @if($news->status === 'draft')
                        <form action="{{ route('admin.news.update', $news) }}" method="POST" class="d-grid">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="published">
                            <input type="hidden" name="title" value="{{ $news->title }}">
                            <input type="hidden" name="content" value="{{ $news->content }}">
                            <input type="hidden" name="excerpt" value="{{ $news->excerpt }}">
                            <input type="hidden" name="author" value="{{ $news->author }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i> Publish Now
                            </button>
                        </form>
                        @endif

                        <form action="{{ route('admin.news.destroy', $news) }}"
                              method="POST"
                              class="d-grid"
                              onsubmit="return confirm('Are you sure you want to delete this article? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete Article
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Public Links -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Public Links</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($news->status === 'published')
                        <a href="{{ route('news.show', $news->slug) }}"
                           target="_blank"
                           class="btn btn-info">
                            <i class="fas fa-external-link-alt"></i> View Public Page
                        </a>
                        @else
                        <div class="alert alert-warning mb-0">
                            <small>Article must be published to view public page</small>
                        </div>
                        @endif

                        <a href="{{ route('news.index') }}"
                           target="_blank"
                           class="btn btn-outline-info">
                            <i class="fas fa-newspaper"></i> View News Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
