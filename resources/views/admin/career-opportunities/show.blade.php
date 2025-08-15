@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Career Opportunity Details</h3>
                    <div>
                        <a href="{{ route('admin.career-opportunities.edit', $careerOpportunity) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <a href="{{ route('admin.career-opportunities.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h2 class="text-primary mb-3">{{ $careerOpportunity->title }}</h2>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-building text-primary me-2"></i>
                                            <strong>Department:</strong> {{ $careerOpportunity->department }}
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                            <strong>Location:</strong> {{ $careerOpportunity->location }}
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-clock text-primary me-2"></i>
                                            <strong>Employment Type:</strong> {{ ucfirst(str_replace('-', ' ', $careerOpportunity->employment_type)) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-user text-primary me-2"></i>
                                            <strong>Gender:</strong> {{ ucfirst($careerOpportunity->gender) }}
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-chart-line text-primary me-2"></i>
                                            <strong>Experience:</strong> {{ $careerOpportunity->experience_level }}
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar text-primary me-2"></i>
                                            <strong>Expiry Date:</strong> {{ $careerOpportunity->expiry_date->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    @if($careerOpportunity->salary_min && $careerOpportunity->salary_max)
                                        <span class="badge bg-success fs-6">
                                            ${{ number_format($careerOpportunity->salary_min) }} - ${{ number_format($careerOpportunity->salary_max) }}
                                        </span>
                                    @endif
                                    <span class="badge bg-{{ $careerOpportunity->is_active ? 'success' : 'secondary' }} fs-6 ms-2">
                                        {{ $careerOpportunity->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    @if($careerOpportunity->expiry_date->isPast())
                                        <span class="badge bg-danger fs-6 ms-2">Expired</span>
                                    @elseif($careerOpportunity->expiry_date->diffInDays(now()) <= 7)
                                        <span class="badge bg-warning text-dark fs-6 ms-2">
                                            {{ $careerOpportunity->expiry_date->diffInDays(now()) }} days left
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-dark mb-3">Job Description</h5>
                                <div class="bg-light p-3 rounded">
                                    <p class="mb-0">{{ $careerOpportunity->description }}</p>
                                </div>
                            </div>

                            @if($careerOpportunity->requirements)
                                <div class="mb-4">
                                    <h5 class="text-primary mb-3">
                                        <i class="fas fa-list-check me-2"></i>Requirements
                                    </h5>
                                    <div class="bg-light p-3 rounded">
                                        <div style="white-space: pre-line;">{{ $careerOpportunity->requirements }}</div>
                                    </div>
                                </div>
                            @endif

                            @if($careerOpportunity->benefits)
                                <div class="mb-4">
                                    <h5 class="text-primary mb-3">
                                        <i class="fas fa-gift me-2"></i>Benefits
                                    </h5>
                                    <div class="bg-light p-3 rounded">
                                        <div style="white-space: pre-line;">{{ $careerOpportunity->benefits }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Quick Info</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Created:</strong><br>
                                        <small class="text-muted">{{ $careerOpportunity->created_at->format('M d, Y H:i') }}</small>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Last Updated:</strong><br>
                                        <small class="text-muted">{{ $careerOpportunity->updated_at->format('M d, Y H:i') }}</small>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Days Until Expiry:</strong><br>
                                        @if($careerOpportunity->expiry_date->isPast())
                                            <span class="text-danger">Expired</span>
                                        @else
                                            <span class="text-{{ $careerOpportunity->expiry_date->diffInDays(now()) <= 7 ? 'warning' : 'success' }}">
                                                {{ $careerOpportunity->expiry_date->diffInDays(now()) }} days
                                            </span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <strong>Status:</strong><br>
                                        @if($careerOpportunity->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-light mt-3">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-tools me-2"></i>Actions</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.career-opportunities.toggleStatus', $careerOpportunity) }}"
                                          method="POST" class="mb-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-{{ $careerOpportunity->is_active ? 'warning' : 'success' }} btn-sm w-100">
                                            <i class="fas fa-{{ $careerOpportunity->is_active ? 'pause' : 'play' }} me-2"></i>
                                            {{ $careerOpportunity->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.career-opportunities.destroy', $careerOpportunity) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this opportunity?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100">
                                            <i class="fas fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
