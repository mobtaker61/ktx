@extends('layouts.admin')

@section('title', 'Services - KTX Admin')

@section('page-title', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Services</h4>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Service
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($services->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>
                                <i class="fa {{ $service->icon }} fa-2x text-primary"></i>
                            </td>
                            <td>
                                <strong>{{ $service->title }}</strong>
                                @if($service->slug)
                                    <br><small class="text-muted">{{ $service->slug }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $service->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($service->status) }}
                                </span>
                            </td>
                            <td>{{ $service->order ?? 'Not set' }}</td>
                            <td>{{ $service->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.services.show', $service) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this service?')">
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
                {{ $services->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-cogs fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No services found</h5>
                <p class="text-muted">Start by adding your first service.</p>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Service
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
