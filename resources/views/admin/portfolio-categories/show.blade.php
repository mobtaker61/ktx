@extends('layouts.admin')

@section('title', 'Portfolio Category Details - KTX Admin')

@section('page-title', 'Portfolio Category Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $portfolioCategory->name }}</h4>
    <div>
        <a href="{{ route('admin.portfolio-categories.edit', $portfolioCategory) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.portfolio-categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Categories
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Category Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Name:</th>
                                <td>{{ $portfolioCategory->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug:</th>
                                <td><code>{{ $portfolioCategory->slug }}</code></td>
                            </tr>
                            <tr>
                                <th>Icon:</th>
                                <td>
                                    <i class="fas fa-{{ $portfolioCategory->icon_class }} fa-lg" style="color: {{ $portfolioCategory->color }};"></i>
                                    <span class="ms-2">{{ $portfolioCategory->icon }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Color:</th>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="color-preview me-2" style="width: 30px; height: 30px; background-color: {{ $portfolioCategory->color }}; border-radius: 6px; border: 2px solid #dee2e6;"></div>
                                        <code>{{ $portfolioCategory->color }}</code>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $portfolioCategory->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($portfolioCategory->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Order:</th>
                                <td>{{ $portfolioCategory->order }}</td>
                            </tr>
                            <tr>
                                <th>Portfolios Count:</th>
                                <td>
                                    <span class="badge bg-info">{{ $portfolioCategory->portfolios->count() }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $portfolioCategory->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $portfolioCategory->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td>{{ $portfolioCategory->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($portfolioCategory->description)
                <hr>
                <div class="mb-3">
                    <h6>Description:</h6>
                    <p>{{ $portfolioCategory->description }}</p>
                </div>
                @endif
            </div>
        </div>

        @if($portfolioCategory->portfolios->count() > 0)
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Portfolios in this Category</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioCategory->portfolios as $portfolio)
                            <tr>
                                <td>{{ $portfolio->title }}</td>
                                <td>{{ $portfolio->client }}</td>
                                <td>
                                    <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($portfolio->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.portfolio-categories.edit', $portfolioCategory) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Category
                    </a>
                    <form action="{{ route('admin.portfolio-categories.destroy', $portfolioCategory) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                            <i class="fas fa-trash me-2"></i>Delete Category
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Category Preview</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="fas fa-{{ $portfolioCategory->icon_class }} fa-4x" style="color: {{ $portfolioCategory->color }};"></i>
                </div>
                <h6>{{ $portfolioCategory->name }}</h6>
                @if($portfolioCategory->description)
                    <p class="text-muted small">{{ Str::limit($portfolioCategory->description, 100) }}</p>
                @endif
                <span class="badge bg-{{ $portfolioCategory->status === 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($portfolioCategory->status) }}
                </span>
                <br>
                <small class="text-muted">Order: {{ $portfolioCategory->order }}</small>
            </div>
        </div>
    </div>
</div>
@endsection
