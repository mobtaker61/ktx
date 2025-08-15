@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Job Applications</h3>
                    <div>
                        <a href="{{ route('admin.job-applications.export') }}" class="btn btn-success me-2">
                            <i class="fas fa-download me-2"></i>Export CSV
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Filters -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="reviewed">Reviewed</option>
                                <option value="shortlisted">Shortlisted</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="positionFilter">
                                <option value="">All Positions</option>
                                @foreach(\App\Models\CareerOpportunity::active()->get() as $position)
                                    <option value="{{ $position->id }}">{{ $position->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant</th>
                                    <th>Position</th>
                                    <th>Contact Info</th>
                                    <th>Experience</th>
                                    <th>Applied Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>
                                            <strong>{{ $application->first_name }} {{ $application->last_name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $application->nationality }}</small>
                                        </td>
                                        <td>
                                            <strong>{{ $application->careerOpportunity->title ?? 'N/A' }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $application->careerOpportunity->department ?? 'N/A' }}</small>
                                        </td>
                                        <td>
                                            <div><i class="fas fa-envelope me-1"></i>{{ $application->email }}</div>
                                            <div><i class="fas fa-phone me-1"></i>{{ $application->phone_code }} {{ $application->phone }}</div>
                                            <div><i class="fas fa-map-marker-alt me-1"></i>{{ $application->current_location }}</div>
                                        </td>
                                        <td>{{ $application->experience_years }}</td>
                                        <td>{{ $application->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($application->is_rejected)
                                                <span class="badge bg-danger">Rejected</span>
                                            @elseif($application->is_shortlisted)
                                                <span class="badge bg-success">Shortlisted</span>
                                            @elseif($application->is_reviewed)
                                                <span class="badge bg-info">Reviewed</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.job-applications.show', $application) }}"
                                                   class="btn btn-sm btn-info" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                @if($application->resume_path)
                                                    <a href="{{ route('admin.job-applications.downloadResume', $application) }}"
                                                       class="btn btn-sm btn-success" title="Download Resume">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                @endif

                                                @if(!$application->is_reviewed)
                                                    <form action="{{ route('admin.job-applications.markReviewed', $application) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-primary" title="Mark as Reviewed">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                @if(!$application->is_shortlisted && !$application->is_rejected)
                                                    <form action="{{ route('admin.job-applications.markShortlisted', $application) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success" title="Mark as Shortlisted">
                                                            <i class="fas fa-star"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                @if(!$application->is_rejected)
                                                    <form action="{{ route('admin.job-applications.markRejected', $application) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-warning" title="Mark as Rejected">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                <form action="{{ route('admin.job-applications.destroy', $application) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this application?')">
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
                                                <i class="fas fa-file-alt fa-3x mb-3"></i>
                                                <h5>No job applications found</h5>
                                                <p>Applications will appear here when candidates submit them.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($applications->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $applications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Status filter
    document.getElementById('statusFilter').addEventListener('change', function() {
        const status = this.value;
        const url = new URL(window.location);
        if (status) {
            url.searchParams.set('status', status);
        } else {
            url.searchParams.delete('status');
        }
        window.location.href = url.toString();
    });

    // Position filter
    document.getElementById('positionFilter').addEventListener('change', function() {
        const position = this.value;
        const url = new URL(window.location);
        if (position) {
            url.searchParams.set('career_opportunity_id', position);
        } else {
            url.searchParams.delete('career_opportunity_id');
        }
        window.location.href = url.toString();
    });

    // Set current filter values
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status')) {
        document.getElementById('statusFilter').value = urlParams.get('status');
    }
    if (urlParams.get('career_opportunity_id')) {
        document.getElementById('positionFilter').value = urlParams.get('career_opportunity_id');
    }
});
</script>
@endsection
