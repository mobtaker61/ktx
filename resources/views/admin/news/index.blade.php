@extends('layouts.admin')

@section('title', 'Manage News - Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage News</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Article
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">News Articles</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Published At</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($news as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>
                                @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}"
                                     alt="{{ $article->title }}"
                                     style="width: 50px; height: 50px; object-fit: cover;"
                                     class="rounded">
                                @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($article->title, 50) }}</strong>
                                <br>
                                <small class="text-muted">{{ $article->slug }}</small>
                            </td>
                            <td>
                                @if($article->status === 'published')
                                <span class="badge bg-success">Published</span>
                                @else
                                <span class="badge bg-warning">Draft</span>
                                @endif
                            </td>
                            <td>{{ $article->author ?? 'N/A' }}</td>
                            <td>
                                @if($article->published_at)
                                {{ $article->published_at->format('M d, Y H:i') }}
                                @else
                                <span class="text-muted">Not published</span>
                                @endif
                            </td>
                            <td>{{ $article->created_at->format('M d, Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.news.show', $article) }}"
                                       class="btn btn-sm btn-info"
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $article) }}"
                                       class="btn btn-sm btn-warning"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $article) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Delete">
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
                                    <i class="fas fa-newspaper fa-3x mb-3"></i>
                                    <h5>No News Articles Found</h5>
                                    <p>Start by creating your first news article.</p>
                                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Create First Article
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($news->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $news->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [[0, "desc"]],
        "pageLength": 25,
        "language": {
            "search": "Search articles:",
            "lengthMenu": "Show _MENU_ articles per page",
            "info": "Showing _START_ to _END_ of _TOTAL_ articles",
            "infoEmpty": "Showing 0 to 0 of 0 articles",
            "infoFiltered": "(filtered from _MAX_ total articles)"
        }
    });
});
</script>
@endpush
