@extends('layouts.admin')

@section('title', 'Portfolio Details - KTX Admin')

@section('page-title', 'Portfolio Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $portfolio->title }}</h4>
    <div>
        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Portfolio
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Portfolio Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Title:</th>
                                <td>{{ $portfolio->title }}</td>
                            </tr>
                            <tr>
                                <th>Slug:</th>
                                <td><code>{{ $portfolio->slug }}</code></td>
                            </tr>
                            <tr>
                                <th>Client:</th>
                                <td>{{ $portfolio->client ?? 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <th>Category:</th>
                                <td>
                                    @if($portfolio->category)
                                        <span class="badge bg-info">{{ $portfolio->category->name }}</span>
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($portfolio->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Featured:</th>
                                <td>
                                    @if($portfolio->featured)
                                        <span class="badge bg-warning"><i class="fas fa-star"></i> Featured</span>
                                    @else
                                        <span class="badge bg-secondary">Not Featured</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Order:</th>
                                <td>{{ $portfolio->order ?? 'Not set' }}</td>
                            </tr>
                            <tr>
                                <th>Completion Date:</th>
                                <td>{{ $portfolio->completion_date ? $portfolio->completion_date->format('M d, Y') : 'Not specified' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $portfolio->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $portfolio->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td>{{ $portfolio->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($portfolio->description)
                <hr>
                <div class="mb-3">
                    <h6>Description:</h6>
                    <p>{{ $portfolio->description }}</p>
                </div>
                @endif

                @if($portfolio->project_url)
                <hr>
                <div class="mb-3">
                    <h6>Project URL:</h6>
                    <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt me-2"></i>View Project
                    </a>
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
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Portfolio
                    </a>
                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio?')">
                            <i class="fas fa-trash me-2"></i>Delete Portfolio
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Portfolio Preview</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="fas fa-briefcase fa-4x text-primary"></i>
                </div>
                <h6>{{ $portfolio->title }}</h6>
                @if($portfolio->client)
                    <p class="text-muted small">Client: {{ $portfolio->client }}</p>
                @endif
                @if($portfolio->category)
                    <span class="badge bg-info">{{ $portfolio->category }}</span>
                @endif
                <br>
                <span class="badge bg-{{ $portfolio->status === 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($portfolio->status) }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
