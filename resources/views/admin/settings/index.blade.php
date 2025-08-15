@extends('layouts.admin')

@section('title', 'Site Settings - KTX Admin')

@section('page-title', 'Site Settings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Site Settings</h4>
    <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Setting
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.settings.updateAll') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">General Settings</h5>

                    <div class="mb-3">
                        <label for="site_name" class="form-label">Site Name</label>
                        <input type="text" class="form-control" id="site_name" name="site_name"
                               value="{{ $settings['site_name']->value ?? 'KTX.Tech' }}">
                    </div>

                    <div class="mb-3">
                        <label for="site_description" class="form-label">Site Description</label>
                        <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ $settings['site_description']->value ?? 'Leading industrial compressor solutions' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="site_email" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" id="site_email" name="site_email"
                               value="{{ $settings['site_email']->value ?? 'info@ktx.tech' }}">
                    </div>

                    <div class="mb-3">
                        <label for="site_phone" class="form-label">Contact Phone</label>
                        <input type="text" class="form-control" id="site_phone" name="site_phone"
                               value="{{ $settings['site_phone']->value ?? '+966 11 123 4567' }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mb-3">Address & Social</h5>

                    <div class="mb-3">
                        <label for="site_address" class="form-label">Address</label>
                        <textarea class="form-control" id="site_address" name="site_address" rows="3">{{ $settings['site_address']->value ?? 'Riyadh, Saudi Arabia' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="facebook_url" class="form-label">Facebook URL</label>
                        <input type="url" class="form-control" id="facebook_url" name="facebook_url"
                               value="{{ $settings['facebook_url']->value ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="twitter_url" class="form-label">Twitter URL</label>
                        <input type="url" class="form-control" id="twitter_url" name="twitter_url"
                               value="{{ $settings['twitter_url']->value ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control" id="linkedin_url" name="linkedin_url"
                               value="{{ $settings['linkedin_url']->value ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5 class="mb-3">SEO Settings</h5>

                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                               value="{{ $settings['meta_title']->value ?? 'KTX.Tech - Industrial Compressors' }}">
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ $settings['meta_description']->value ?? 'Leading provider of industrial compressor solutions in Saudi Arabia' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                               value="{{ $settings['meta_keywords']->value ?? 'industrial compressors, air compressors, Saudi Arabia' }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mb-3">Business Settings</h5>

                    <div class="mb-3">
                        <label for="business_hours" class="form-label">Business Hours</label>
                        <input type="text" class="form-control" id="business_hours" name="business_hours"
                               value="{{ $settings['business_hours']->value ?? 'Sunday - Thursday: 8:00 AM - 6:00 PM' }}">
                    </div>

                    <div class="mb-3">
                        <label for="emergency_phone" class="form-label">Emergency Phone</label>
                        <input type="text" class="form-control" id="emergency_phone" name="emergency_phone"
                               value="{{ $settings['emergency_phone']->value ?? '+966 50 123 4567' }}">
                    </div>

                    <div class="mb-3">
                        <label for="support_email" class="form-label">Support Email</label>
                        <input type="email" class="form-control" id="support_email" name="support_email"
                               value="{{ $settings['support_email']->value ?? 'support@ktx.tech' }}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save All Settings
                </button>
            </div>
        </form>
    </div>
</div>

@if(isset($settings) && $settings->count() > 0)
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title mb-0">All Settings</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $setting)
                    <tr>
                        <td><code>{{ $setting->key }}</code></td>
                        <td>{{ Str::limit($setting->value, 50) }}</td>
                        <td>
                            <span class="badge bg-info">{{ $setting->type }}</span>
                        </td>
                        <td>{{ $setting->description ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.settings.show', $setting) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.settings.destroy', $setting) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this setting?')">
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
    </div>
</div>
@endif
@endsection
