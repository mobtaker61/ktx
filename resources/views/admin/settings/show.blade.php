@extends('layouts.admin')

@section('title', 'Setting Details - KTX Admin')

@section('page-title', 'Setting Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>{{ $setting->key }}</h4>
    <div>
        <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Settings
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Setting Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Key:</th>
                                <td><code>{{ $setting->key }}</code></td>
                            </tr>
                            <tr>
                                <th>Type:</th>
                                <td>
                                    <span class="badge bg-info">{{ ucfirst($setting->type) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Group:</th>
                                <td>{{ $setting->group ?? 'No group' }}</td>
                            </tr>
                            <tr>
                                <th>Public:</th>
                                <td>
                                    <span class="badge bg-{{ $setting->is_public ? 'success' : 'secondary' }}">
                                        {{ $setting->is_public ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Order:</th>
                                <td>{{ $setting->order ?? 'Not set' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $setting->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $setting->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td>{{ $setting->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($setting->description)
                <hr>
                <div class="mb-3">
                    <h6>Description:</h6>
                    <p>{{ $setting->description }}</p>
                </div>
                @endif

                <hr>
                <div class="mb-3">
                    <h6>Value:</h6>
                    <div class="border rounded p-3 bg-light">
                        @if($setting->type === 'boolean')
                            <span class="badge bg-{{ $setting->value ? 'success' : 'secondary' }}">
                                {{ $setting->value ? 'Yes' : 'No' }}
                            </span>
                        @elseif($setting->type === 'color')
                            <div class="d-flex align-items-center">
                                <div class="color-preview me-2" style="width: 30px; height: 30px; background-color: {{ $setting->value }}; border: 1px solid #ddd;"></div>
                                <code>{{ $setting->value }}</code>
                            </div>
                        @elseif($setting->type === 'url')
                            <a href="{{ $setting->value }}" target="_blank" class="text-decoration-none">
                                {{ $setting->value }}
                                <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        @elseif($setting->type === 'email')
                            <a href="mailto:{{ $setting->value }}" class="text-decoration-none">
                                {{ $setting->value }}
                            </a>
                        @else
                            <pre class="mb-0">{{ $setting->value }}</pre>
                        @endif
                    </div>
                </div>
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
                    <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Setting
                    </a>
                    <form action="{{ route('admin.settings.destroy', $setting) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this setting?')">
                            <i class="fas fa-trash me-2"></i>Delete Setting
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Setting Preview</h5>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <strong>Key:</strong> <code>{{ $setting->key }}</code>
                </div>
                <div class="mb-2">
                    <strong>Type:</strong>
                    <span class="badge bg-info">{{ ucfirst($setting->type) }}</span>
                </div>
                <div class="mb-2">
                    <strong>Value:</strong>
                    <div class="mt-1">
                        @if($setting->type === 'boolean')
                            <span class="badge bg-{{ $setting->value ? 'success' : 'secondary' }}">
                                {{ $setting->value ? 'Yes' : 'No' }}
                            </span>
                        @elseif($setting->type === 'color')
                            <div class="d-flex align-items-center">
                                <div class="color-preview me-2" style="width: 20px; height: 20px; background-color: {{ $setting->value }}; border: 1px solid #ddd;"></div>
                                <small>{{ $setting->value }}</small>
                            </div>
                        @else
                            <small class="text-muted">{{ Str::limit($setting->value, 50) }}</small>
                        @endif
                    </div>
                </div>
                <div class="mb-2">
                    <strong>Public:</strong>
                    <span class="badge bg-{{ $setting->is_public ? 'success' : 'secondary' }}">
                        {{ $setting->is_public ? 'Yes' : 'No' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
