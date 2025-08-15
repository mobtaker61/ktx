@extends('layouts.admin')

@section('title', 'Certificate Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Certificate Details</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.certificates.edit', $certificate) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Certificate Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Title</label>
                                <p class="mb-0">{{ $certificate->title }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Status</label>
                                <div class="mb-0">{!! $certificate->status_badge !!}</div>
                            </div>
                        </div>
                    </div>

                    @if($certificate->description)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <p class="mb-0">{{ $certificate->description }}</p>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Certificate Number</label>
                                <p class="mb-0">
                                    @if($certificate->certificate_number)
                                        <span class="badge bg-info">{{ $certificate->certificate_number }}</span>
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Issuing Authority</label>
                                <p class="mb-0">
                                    @if($certificate->issuing_authority)
                                        {{ $certificate->issuing_authority }}
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Issue Date</label>
                                <p class="mb-0">
                                    @if($certificate->issue_date)
                                        {{ $certificate->issue_date->format('F d, Y') }}
                                        <br><small class="text-muted">{{ $certificate->issue_date->diffForHumans() }}</small>
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Expiry Date</label>
                                <p class="mb-0">
                                    @if($certificate->expiry_date)
                                        {{ $certificate->expiry_date->format('F d, Y') }}
                                        <br><small class="text-muted">{{ $certificate->expiry_date->diffForHumans() }}</small>
                                        <br>{!! $certificate->expiry_badge !!}
                                    @else
                                        <span class="badge bg-info">No Expiry</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Display Order</label>
                                <p class="mb-0">
                                    <span class="badge bg-primary">{{ $certificate->order }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Created</label>
                                <p class="mb-0">
                                    {{ $certificate->created_at->format('F d, Y \a\t g:i A') }}
                                    <br><small class="text-muted">{{ $certificate->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($certificate->updated_at != $certificate->created_at)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Last Updated</label>
                        <p class="mb-0">
                            {{ $certificate->updated_at->format('F d, Y \a\t g:i A') }}
                            <br><small class="text-muted">{{ $certificate->updated_at->diffForHumans() }}</small>
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('admin.certificates.toggleStatus', $certificate) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-{{ $certificate->status ? 'warning' : 'success' }} w-100 mb-2">
                                    <i class="fas fa-toggle-{{ $certificate->status ? 'off' : 'on' }} me-2"></i>
                                    {{ $certificate->status ? 'Deactivate' : 'Activate' }} Certificate
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 mb-2"
                                        onclick="return confirm('Are you sure you want to delete this certificate? This action cannot be undone.')">
                                    <i class="fas fa-trash me-2"></i>Delete Certificate
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Certificate Image -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Certificate Image</h6>
                </div>
                <div class="card-body text-center">
                    @if($certificate->image)
                        <img src="{{ asset('storage/' . $certificate->image) }}"
                             alt="{{ $certificate->title }}"
                             class="img-fluid rounded shadow-sm mb-3"
                             style="max-width: 100%; height: auto;">

                        <div class="d-grid gap-2">
                            <a href="{{ asset('storage/' . $certificate->image) }}"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-external-link-alt me-2"></i>View Full Size
                            </a>
                        </div>
                    @else
                        <div class="py-5">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No image available</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Status Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Current Status</label>
                        <div class="mb-2">{!! $certificate->status_badge !!}</div>
                        <small class="text-muted">
                            @if($certificate->status)
                                This certificate is currently visible on the frontend
                            @else
                                This certificate is hidden from the frontend
                            @endif
                        </small>
                    </div>

                    @if($certificate->expiry_date)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Expiry Status</label>
                        <div class="mb-2">{!! $certificate->expiry_badge !!}</div>
                        @if($certificate->expiry_date->isPast())
                            <small class="text-danger">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                This certificate has expired
                            </small>
                        @elseif($certificate->expiry_date->diffInDays(now()) <= 30)
                            <small class="text-warning">
                                <i class="fas fa-clock me-1"></i>
                                This certificate expires soon
                            </small>
                        @else
                            <small class="text-success">
                                <i class="fas fa-check-circle me-1"></i>
                                This certificate is valid
                            </small>
                        @endif
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold">Display Position</label>
                        <p class="mb-0">
                            <span class="badge bg-primary">{{ $certificate->order }}</span>
                            <br><small class="text-muted">Position in the certificates list</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-label.fw-bold {
        color: #495057;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .card-body p {
        color: #212529;
        font-size: 1rem;
    }

    .badge {
        font-size: 0.875rem;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete this certificate? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endpush
