@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Job Application Details</h3>
                    <div>
                        <a href="{{ route('admin.job-applications.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Applicant Information -->
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>Applicant Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <strong>Full Name:</strong><br>
                                                {{ $jobApplication->first_name }} {{ $jobApplication->last_name }}
                                            </div>
                                            <div class="mb-3">
                                                <strong>Email:</strong><br>
                                                <a href="mailto:{{ $jobApplication->email }}">{{ $jobApplication->email }}</a>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Phone:</strong><br>
                                                {{ $jobApplication->phone_code }} {{ $jobApplication->phone }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <strong>Gender:</strong><br>
                                                {{ ucfirst($jobApplication->gender) }}
                                            </div>
                                            <div class="mb-3">
                                                <strong>Nationality:</strong><br>
                                                {{ $jobApplication->nationality }}
                                            </div>
                                            <div class="mb-3">
                                                <strong>Current Location:</strong><br>
                                                {{ $jobApplication->current_location }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Experience:</strong><br>
                                        {{ $jobApplication->experience_years }}
                                    </div>
                                    @if($jobApplication->cover_letter)
                                        <div class="mb-3">
                                            <strong>Cover Letter:</strong><br>
                                            <div class="bg-white p-3 rounded mt-2" style="white-space: pre-line;">
                                                {{ $jobApplication->cover_letter }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Position Information -->
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>Position Information</h5>
                                </div>
                                <div class="card-body">
                                    @if($jobApplication->careerOpportunity)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <strong>Position:</strong><br>
                                                    {{ $jobApplication->careerOpportunity->title }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Department:</strong><br>
                                                    {{ $jobApplication->careerOpportunity->department }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <strong>Location:</strong><br>
                                                    {{ $jobApplication->careerOpportunity->location }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Experience Required:</strong><br>
                                                    {{ $jobApplication->careerOpportunity->experience_level }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-muted">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Position information not available (may have been deleted)
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Resume Section -->
                            @if($jobApplication->resume_path)
                                <div class="card bg-light mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Resume/CV</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-pdf fa-2x text-danger me-3"></i>
                                            <div class="flex-grow-1">
                                                <strong>Resume File</strong><br>
                                                <small class="text-muted">Uploaded on {{ $jobApplication->created_at->format('M d, Y H:i') }}</small>
                                            </div>
                                            <a href="{{ route('admin.job-applications.downloadResume', $jobApplication) }}"
                                               class="btn btn-success">
                                                <i class="fas fa-download me-2"></i>Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <!-- Application Status -->
                            <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Application Status</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Status:</strong><br>
                                        @if($jobApplication->is_rejected)
                                            <span class="badge bg-danger">Rejected</span>
                                        @elseif($jobApplication->is_shortlisted)
                                            <span class="badge bg-success">Shortlisted</span>
                                        @elseif($jobApplication->is_reviewed)
                                            <span class="badge bg-info">Reviewed</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <strong>Applied Date:</strong><br>
                                        <small class="text-muted">{{ $jobApplication->created_at->format('M d, Y H:i') }}</small>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Last Updated:</strong><br>
                                        <small class="text-muted">{{ $jobApplication->updated_at->format('M d, Y H:i') }}</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-tools me-2"></i>Actions</h6>
                                </div>
                                <div class="card-body">
                                    @if(!$jobApplication->is_reviewed)
                                        <form action="{{ route('admin.job-applications.markReviewed', $jobApplication) }}"
                                              method="POST" class="mb-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                                <i class="fas fa-check me-2"></i>Mark as Reviewed
                                            </button>
                                        </form>
                                    @endif

                                    @if(!$jobApplication->is_shortlisted && !$jobApplication->is_rejected)
                                        <form action="{{ route('admin.job-applications.markShortlisted', $jobApplication) }}"
                                              method="POST" class="mb-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm w-100">
                                                <i class="fas fa-star me-2"></i>Mark as Shortlisted
                                            </button>
                                        </form>
                                    @endif

                                    @if(!$jobApplication->is_rejected)
                                        <form action="{{ route('admin.job-applications.markRejected', $jobApplication) }}"
                                              method="POST" class="mb-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning btn-sm w-100">
                                                <i class="fas fa-times me-2"></i>Mark as Rejected
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.job-applications.destroy', $jobApplication) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this application?')">
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
