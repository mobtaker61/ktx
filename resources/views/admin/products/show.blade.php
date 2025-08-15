@extends('layouts.admin')

@section('title', 'Product Details - KTX Admin')

@section('page-title', 'Product Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $product->name }}</h4>
    <div>
        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Products
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Product Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Name:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug:</th>
                                <td><code>{{ $product->slug }}</code></td>
                            </tr>
                            <tr>
                                <th>Category:</th>
                                <td>
                                    @if($product->category)
                                        <span class="badge bg-info">{{ $product->category->name }}</span>
                                    @else
                                        <span class="text-muted">No Category</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Featured:</th>
                                <td>
                                    @if($product->featured)
                                        <span class="badge bg-warning">Yes</span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Order:</th>
                                <td>{{ $product->order ?? 'Not set' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $product->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $product->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <h6>Description:</h6>
                    <p>{{ $product->description }}</p>
                </div>

                @if($product->short_description)
                <div class="mb-3">
                    <h6>Short Description:</h6>
                    <p>{{ $product->short_description }}</p>
                </div>
                @endif

                @if($product->image)
                <div class="mb-3">
                    <h6>Main Image:</h6>
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-width: 300px;">
                    <br><small class="text-muted">{{ $product->image }}</small>
                </div>
                @endif

                @if($product->gallery && count($product->gallery) > 0)
                <div class="mb-3">
                    <h6>Gallery Images:</h6>
                    <div class="row g-2">
                        @foreach($product->gallery as $image)
                        <div class="col-md-3">
                            <img src="{{ asset($image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                            <br><small class="text-muted">{{ $image }}</small>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($product->video_url)
                <div class="mb-3">
                    <h6>Video URL:</h6>
                    <p><a href="{{ $product->video_url }}" target="_blank">{{ $product->video_url }}</a></p>
                </div>
                @endif

                @if($product->specifications)
                <div class="mb-3">
                    <h6>Specifications:</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tbody>
                                @foreach($product->specifications as $key => $value)
                                <tr>
                                    <th>{{ $key }}:</th>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                @if($product->features)
                <div class="mb-3">
                    <h6>Features:</h6>
                    <ul>
                        @foreach($product->features as $feature)
                        <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('product.detail', $product->slug) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i>View on Frontend
                    </a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Product
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                            <i class="fas fa-trash me-2"></i>Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Product Statistics</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-primary">{{ $product->id }}</h4>
                        <small class="text-muted">Product ID</small>
                    </div>
                    <div class="col-6">
                        <h4 class="text-success">{{ $product->created_at->diffForHumans() }}</h4>
                        <small class="text-muted">Created</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
