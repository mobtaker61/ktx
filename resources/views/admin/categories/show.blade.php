@extends('layouts.admin')

@section('title', 'Category Details - KTX Admin')

@section('page-title', 'Category Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $category->name }}</h4>
    <div>
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
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
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug:</th>
                                <td><code>{{ $category->slug }}</code></td>
                            </tr>
                            <tr>
                                <th>Parent:</th>
                                <td>
                                    @if($category->parent)
                                        <span class="badge bg-info">{{ $category->parent->name }}</span>
                                    @else
                                        <span class="text-muted">Top Level Category</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $category->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($category->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Order:</th>
                                <td>{{ $category->order ?? 'Not set' }}</td>
                            </tr>
                            <tr>
                                <th>Products Count:</th>
                                <td>
                                    <span class="badge bg-primary">{{ $category->products->count() }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $category->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $category->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($category->description)
                <hr>
                <div class="mb-3">
                    <h6>Description:</h6>
                    <p>{{ $category->description }}</p>
                </div>
                @endif
            </div>
        </div>

        @if($category->products->count() > 0)
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Products in this Category</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <strong>{{ $product->name }}</strong>
                                    <br><small class="text-muted">{{ $product->slug }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($product->featured)
                                        <span class="badge bg-warning">Featured</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $product->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
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
        <!-- Category Image Card -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Category Image</h5>
            </div>
            <div class="card-body text-center">
                @if($category->image)
                    <img src="{{ asset('storage/'.$category->image) }}" 
                         alt="{{ $category->name }}" 
                         class="category-show-image"
                         style="max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="mt-3">
                        <small class="text-muted">Image stored at: {{ $category->image }}</small>
                    </div>
                @else
                    <div class="category-no-image">
                        <i class="fas fa-image fa-4x text-muted mb-3"></i>
                        <p class="text-muted mb-0">No image uploaded</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create', ['category_id' => $category->id]) }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus me-2"></i>Add Product to Category
                    </a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Category
                    </a>
                    @if($category->products->count() == 0)
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-grid">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fas fa-trash me-2"></i>Delete Category
                            </button>
                        </form>
                    @else
                        <button class="btn btn-danger" disabled title="Cannot delete category with products">
                            <i class="fas fa-trash me-2"></i>Delete Category
                        </button>
                        <small class="text-muted">Cannot delete category with products</small>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Category Statistics</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-primary">{{ $category->id }}</h4>
                        <small class="text-muted">Category ID</small>
                    </div>
                    <div class="col-6">
                        <h4 class="text-success">{{ $category->products->count() }}</h4>
                        <small class="text-muted">Products</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.category-show-image {
    transition: transform 0.3s ease;
}

.category-show-image:hover {
    transform: scale(1.05);
}

.category-no-image {
    padding: 2rem 1rem;
    background: #f8f9fa;
    border-radius: 12px;
    border: 2px dashed #dee2e6;
}

.category-no-image i {
    opacity: 0.5;
}
</style>
@endpush
@endsection
