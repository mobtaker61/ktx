@extends('layouts.admin')

@section('title', 'Portfolio Categories - KTX Admin')

@section('page-title', 'Portfolio Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Portfolio Categories</h4>
    <a href="{{ route('admin.portfolio-categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Category
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($categories->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Icon</th>
                            <th>Color</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Portfolios Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <strong>{{ $category->name }}</strong>
                                @if($category->description)
                                    <br><small class="text-muted">{{ Str::limit($category->description, 50) }}</small>
                                @endif
                            </td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>
                                <i class="fas fa-{{ $category->icon_class }} fa-lg" style="color: {{ $category->color }};"></i>
                                <br><small class="text-muted">{{ $category->icon }}</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="color-preview me-2" style="width: 20px; height: 20px; background-color: {{ $category->color }}; border-radius: 4px; border: 1px solid #dee2e6;"></div>
                                    <code>{{ $category->color }}</code>
                                </div>
                            </td>
                            <td>{{ $category->order }}</td>
                            <td>
                                <span class="badge bg-{{ $category->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($category->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $category->portfolios_count ?? 0 }}</span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.portfolio-categories.show', $category) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.portfolio-categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-folder fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No portfolio categories found</h5>
                <p class="text-muted">Start by adding your first portfolio category.</p>
                <a href="{{ route('admin.portfolio-categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Category
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
