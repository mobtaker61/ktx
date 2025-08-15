@extends('layouts.admin')

@section('title', 'Create Portfolio Category - KTX Admin')

@section('page-title', 'Create Portfolio Category')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.portfolio-categories.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                               id="slug" name="slug" value="{{ old('slug') }}" placeholder="Leave empty for auto-generation">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Leave empty to auto-generate from category name</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-icons"></i></span>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                   id="icon" name="icon" value="{{ old('icon') }}" placeholder="e.g., industry, cogs">
                        </div>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">FontAwesome icon name (without 'fa-' prefix)</small>

                        <div class="mt-2">
                            <label class="form-label">Popular Icons:</label>
                            <div class="d-flex flex-wrap gap-1">
                                @php
                                    $popularIcons = ['industry', 'cogs', 'oil-can', 'flask', 'compress-arrows-alt', 'wrench', 'hard-hat', 'tools', 'plug', 'headset', 'comments', 'graduation-cap'];
                                @endphp
                                @foreach($popularIcons as $icon)
                                <button type="button" class="btn btn-sm btn-outline-secondary icon-selector" data-icon="{{ $icon }}">
                                    <i class="fas fa-{{ $icon }}"></i>
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <div class="input-group">
                            <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror"
                                   id="color" name="color" value="{{ old('color', '#0d6efd') }}" title="Choose color">
                            <input type="text" class="form-control @error('color') is-invalid @enderror"
                                   id="colorHex" value="{{ old('color', '#0d6efd') }}" placeholder="#0d6efd">
                        </div>
                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.portfolio-categories.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Categories
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Category
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });

    // Icon selector
    document.querySelectorAll('.icon-selector').forEach(button => {
        button.addEventListener('click', function() {
            const icon = this.dataset.icon;
            document.getElementById('icon').value = icon;
        });
    });

    // Color picker synchronization
    document.getElementById('color').addEventListener('input', function() {
        document.getElementById('colorHex').value = this.value;
    });

    document.getElementById('colorHex').addEventListener('input', function() {
        const color = this.value;
        if (/^#[0-9A-F]{6}$/i.test(color)) {
            document.getElementById('color').value = color;
        }
    });
</script>
@endpush
@endsection
