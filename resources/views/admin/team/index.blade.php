@extends('layouts.admin')

@section('title', 'Team - KTX Admin')

@section('page-title', 'Team')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Team Members</h4>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Team Member
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($team->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Level</th>
                            <th>Contact</th>
                            <th>Social Media</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($team as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>
                                <strong>{{ $member->name }}</strong>
                                @if($member->bio)
                                    <br><small class="text-muted">{{ Str::limit($member->bio, 50) }}</small>
                                @endif
                            </td>
                            <td>{{ $member->position }}</td>
                            <td>
                                <span class="badge bg-{{ $member->level == 1 ? 'danger' : ($member->level == 2 ? 'warning' : ($member->level == 3 ? 'info' : 'secondary')) }}">
                                    Level {{ $member->level }}
                                </span>
                            </td>
                            <td>
                                @if($member->email)
                                    <div><a href="mailto:{{ $member->email }}">{{ $member->email }}</a></div>
                                @endif
                                @if($member->phone)
                                    <div><small class="text-muted">{{ $member->phone }}</small></div>
                                @endif
                            </td>
                            <td>
                                @if($member->linkedin || $member->twitter || $member->facebook || $member->instagram)
                                    <div class="btn-group btn-group-sm" role="group">
                                        @if($member->linkedin)
                                            <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        @endif
                                        @if($member->twitter)
                                            <a href="{{ $member->twitter }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        @endif
                                        @if($member->facebook)
                                            <a href="{{ $member->facebook }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if($member->instagram)
                                            <a href="{{ $member->instagram }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted">No social links</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $member->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($member->status) }}
                                </span>
                            </td>
                            <td>{{ $member->order ?? 'Not set' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.team.show', $member) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this team member?')">
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
                {{ $team->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No team members found</h5>
                <p class="text-muted">Start by adding your first team member.</p>
                <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Team Member
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
