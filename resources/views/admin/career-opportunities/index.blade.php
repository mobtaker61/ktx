@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Career Opportunities</h3>
                    <a href="{{ route('admin.career-opportunities.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Opportunity
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>Experience</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($careerOpportunities as $opportunity)
                                    <tr>
                                        <td>{{ $opportunity->id }}</td>
                                        <td>
                                            <strong>{{ $opportunity->title }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $opportunity->employment_type }}</small>
                                        </td>
                                        <td>{{ $opportunity->department }}</td>
                                        <td>{{ $opportunity->location }}</td>
                                        <td>{{ $opportunity->experience_level }}</td>
                                        <td>
                                            @if($opportunity->expiry_date->isPast())
                                                <span class="badge bg-danger">Expired</span>
                                            @elseif($opportunity->expiry_date->diffInDays(now()) <= 7)
                                                <span class="badge bg-warning">{{ $opportunity->expiry_date->diffInDays(now()) }} days left</span>
                                            @else
                                                <span class="badge bg-success">{{ $opportunity->expiry_date->format('M d, Y') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($opportunity->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.career-opportunities.show', $opportunity) }}"
                                                   class="btn btn-sm btn-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.career-opportunities.edit', $opportunity) }}"
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.career-opportunities.toggleStatus', $opportunity) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-{{ $opportunity->is_active ? 'warning' : 'success' }}"
                                                            title="{{ $opportunity->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i class="fas fa-{{ $opportunity->is_active ? 'pause' : 'play' }}"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.career-opportunities.destroy', $opportunity) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this opportunity?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-briefcase fa-3x mb-3"></i>
                                                <h5>No career opportunities found</h5>
                                                <p>Start by creating your first career opportunity.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($careerOpportunities->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $careerOpportunities->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
