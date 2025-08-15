@extends('layouts.admin')

@section('title', 'Contact Messages - KTX Admin')

@section('page-title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Contact Messages</h4>
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Message
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($contacts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr class="{{ $contact->status === 'new' ? 'table-warning' : '' }}">
                            <td>{{ $contact->id }}</td>
                            <td>
                                <strong>{{ $contact->name }}</strong>
                                @if($contact->company)
                                    <br><small class="text-muted">{{ $contact->company }}</small>
                                @endif
                            </td>
                            <td>
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                @if($contact->phone)
                                    <br><small class="text-muted">{{ $contact->phone }}</small>
                                @endif
                            </td>
                            <td>{{ Str::limit($contact->subject, 50) }}</td>
                            <td>
                                @if($contact->status === 'new')
                                    <span class="badge bg-warning">New</span>
                                @elseif($contact->status === 'read')
                                    <span class="badge bg-info">Read</span>
                                @else
                                    <span class="badge bg-success">Replied</span>
                                @endif
                            </td>
                            <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($contact->status === 'new')
                                        <form action="{{ route('admin.contacts.markAsRead', $contact) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-info" title="Mark as Read">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if($contact->status !== 'replied')
                                        <form action="{{ route('admin.contacts.markAsReplied', $contact) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" title="Mark as Replied">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this message?')">
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
                {{ $contacts->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No contact messages found</h5>
                <p class="text-muted">No messages have been received yet.</p>
                <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Test Message
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
