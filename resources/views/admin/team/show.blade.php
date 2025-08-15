@extends('layouts.admin')

@section('title', 'Team Member Details - KTX Admin')

@section('page-title', 'Team Member Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $team->name }}</h4>
    <div>
        <a href="{{ route('admin.team.edit', $team) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Team
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Team Member Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Name:</th>
                                <td>{{ $team->name }}</td>
                            </tr>
                            <tr>
                                <th>Position:</th>
                                <td>{{ $team->position }}</td>
                            </tr>
                            <tr>
                                <th>Level:</th>
                                <td>
                                    <span class="badge bg-{{ $team->level == 1 ? 'danger' : ($team->level == 2 ? 'warning' : ($team->level == 3 ? 'info' : 'secondary')) }}">
                                        Level {{ $team->level }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $team->email ?? 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $team->phone ?? 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $team->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($team->status) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Order:</th>
                                <td>{{ $team->order ?? 'Not set' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $team->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $team->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td>{{ $team->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($team->bio)
                <hr>
                <div class="mb-3">
                    <h6>Bio:</h6>
                    <p>{{ $team->bio }}</p>
                </div>
                @endif

                @if($team->linkedin_url || $team->twitter_url || $team->facebook_url)
                <hr>
                <div class="mb-3">
                    <h6>Social Media Links:</h6>
                    <div class="d-flex gap-2">
                        @if($team->linkedin_url)
                            <a href="{{ $team->linkedin_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-linkedin me-2"></i>LinkedIn
                            </a>
                        @endif
                        @if($team->twitter_url)
                            <a href="{{ $team->twitter_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="fab fa-twitter me-2"></i>Twitter
                            </a>
                        @endif
                        @if($team->facebook_url)
                            <a href="{{ $team->facebook_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-facebook me-2"></i>Facebook
                            </a>
                        @endif
                    </div>
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
                    <a href="{{ route('admin.team.edit', $team) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Team Member
                    </a>
                    <form action="{{ route('admin.team.destroy', $team) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team member?')">
                            <i class="fas fa-trash me-2"></i>Delete Team Member
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Preview</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    @if($team->image)
                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                             class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                        <i class="fas fa-user fa-4x text-primary"></i>
                    @endif
                </div>
                <h6>{{ $team->name }}</h6>
                <p class="text-muted small">{{ $team->position }}</p>
                @if($team->bio)
                    <p class="text-muted small">{{ Str::limit($team->bio, 100) }}</p>
                @endif
                <span class="badge bg-{{ $team->status === 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($team->status) }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
