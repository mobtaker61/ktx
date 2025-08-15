@extends('layouts.admin')

@section('title', 'Service Details - KTX Admin')

@section('page-title', 'Service Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $service->title }}</h4>
    <div>
        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Services
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Service Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Title:</th>
                                <td>{{ $service->title }}</td>
                            </tr>
                            <tr>
                                <th>Slug:</th>
                                <td><code>{{ $service->slug }}</code></td>
                            </tr>
                            <tr>
                                <th>Icon:</th>
                                <td>
                                    <i class="{{ $service->icon }} fa-2x text-primary"></i>
                                    <code class="ms-2">{{ $service->icon }}</code>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $service->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($service->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Order:</th>
                                <td>{{ $service->order ?? 'Not set' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $service->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $service->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td>{{ $service->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($service->description)
                <hr>
                <div class="mb-3">
                    <h6>Description:</h6>
                    <p>{{ $service->description }}</p>
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
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Service
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">
                            <i class="fas fa-trash me-2"></i>Delete Service
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Service Preview</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="{{ $service->icon }} fa-4x text-primary"></i>
                </div>
                <h6>{{ $service->title }}</h6>
                @if($service->description)
                    <p class="text-muted small">{{ Str::limit($service->description, 100) }}</p>
                @endif
                <span class="badge bg-{{ $service->status === 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($service->status) }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
