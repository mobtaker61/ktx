@extends('layouts.admin')

@section('title', 'Portfolio - KTX Admin')

@section('page-title', 'Portfolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Portfolio Items</h4>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Portfolio Item
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($portfolios->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $portfolio->id }}</td>
                            <td>
                                <strong>{{ $portfolio->title }}</strong>
                                @if($portfolio->slug)
                                    <br><small class="text-muted">{{ $portfolio->slug }}</small>
                                @endif
                            </td>
                            <td>
                                @if($portfolio->category)
                                    <span class="badge bg-info">{{ $portfolio->category->name }}</span>
                                @else
                                    <span class="badge bg-secondary">Uncategorized</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($portfolio->status) }}
                                </span>
                            </td>
                            <td>
                                @if($portfolio->featured)
                                    <span class="badge bg-warning"><i class="fas fa-star"></i> Featured</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>{{ $portfolio->order ?? 0 }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this portfolio item?')">
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
                {{ $portfolios->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No portfolio items found</h5>
                <p class="text-muted">Start by adding your first portfolio item.</p>
                <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Portfolio Item
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
