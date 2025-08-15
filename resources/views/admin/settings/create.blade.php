@extends('layouts.admin')

@section('title', 'Create Setting - KTX Admin')

@section('page-title', 'Create Setting')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.settings.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="key" class="form-label">Setting Key *</label>
                        <input type="text" class="form-control @error('key') is-invalid @enderror"
                               id="key" name="key" value="{{ old('key') }}" required>
                        @error('key')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Unique identifier for this setting (e.g., site_title, contact_email)</small>
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Value *</label>
                        <textarea class="form-control @error('value') is-invalid @enderror"
                                  id="value" name="value" rows="4" required>{{ old('value') }}</textarea>
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Brief description of what this setting controls</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type *</label>
                        <select class="form-select @error('type') is-invalid @enderror"
                                id="type" name="type" required>
                            <option value="">Select Type</option>
                            <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                            <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Textarea</option>
                            <option value="number" {{ old('type') == 'number' ? 'selected' : '' }}>Number</option>
                            <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="url" {{ old('type') == 'url' ? 'selected' : '' }}>URL</option>
                            <option value="boolean" {{ old('type') == 'boolean' ? 'selected' : '' }}>Boolean (Yes/No)</option>
                            <option value="select" {{ old('type') == 'select' ? 'selected' : '' }}>Select</option>
                            <option value="color" {{ old('type') == 'color' ? 'selected' : '' }}>Color</option>
                            <option value="file" {{ old('type') == 'file' ? 'selected' : '' }}>File</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="group" class="form-label">Group</label>
                        <input type="text" class="form-control @error('group') is-invalid @enderror"
                               id="group" name="group" value="{{ old('group') }}" placeholder="e.g., General, Contact, Social">
                        @error('group')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Group settings together (optional)</small>
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                               id="order" name="order" value="{{ old('order', 0) }}" min="0">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_public" name="is_public" value="1" {{ old('is_public') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_public">
                                Public Setting
                            </label>
                        </div>
                        <small class="text-muted">Public settings can be accessed from frontend</small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Settings
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Setting
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
