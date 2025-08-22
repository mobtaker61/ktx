@extends('layouts.admin')

@section('title', 'Create Product - KTX Admin')

@section('page-title', 'Create Product')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name *</label>
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
                        <small class="text-muted">Leave empty to auto-generate from product name</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <x-ckeditor
                            id="description"
                            name="description"
                            value="{!! old('description') !!}"
                            placeholder="Enter product description"
                            :required="true"
                            :error="$errors->first('description')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <x-ckeditor-simple
                            id="short_description"
                            name="short_description"
                            value="{!! old('short_description') !!}"
                            placeholder="Enter short product description"
                            :required="false"
                            :error="$errors->first('short_description')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Main Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Upload main product image (JPEG, PNG, JPG, GIF, WebP, max 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="url" class="form-control @error('video_url') is-invalid @enderror"
                               id="video_url" name="video_url" value="{{ old('video_url') }}" placeholder="e.g., https://www.youtube.com/watch?v=...">
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">YouTube video URL (optional)</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category *</label>
                        <select class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
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
                            <input class="form-check-input" type="checkbox" id="featured" name="featured"
                                   value="1" {{ old('featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured">
                                Featured Product
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specifications Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="mb-3">Specifications</h5>
                    <div id="specifications-container">
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="specifications[0][key]" placeholder="Specification name" value="{{ old('specifications.0.key') }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="specifications[0][value]" placeholder="Specification value" value="{{ old('specifications.0.value') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-outline-danger remove-specification" style="display: none;">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-specification">
                        <i class="fas fa-plus me-1"></i>Add Specification
                    </button>
                </div>
            </div>

            <!-- Features Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="mb-3">Features</h5>
                    <div id="features-container">
                        <div class="row mb-2">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="features[0]" placeholder="Feature description" value="{{ old('features.0') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-outline-danger remove-feature" style="display: none;">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-feature">
                        <i class="fas fa-plus me-1"></i>Add Feature
                    </button>
                </div>
            </div>

            <!-- Gallery Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="mb-3">Gallery Images</h5>
                    <div id="gallery-container">
                        <div class="row mb-2">
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="gallery[]" accept="image/*">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-outline-danger remove-gallery" style="display: none;">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-gallery">
                        <i class="fas fa-plus me-1"></i>Add Gallery Image
                    </button>
                    <small class="text-muted d-block mt-2">Upload multiple images for product gallery (JPEG, PNG, JPG, GIF, WebP, max 2MB each)</small>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Products
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Product
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

    // Specifications management
    let specIndex = 1;
    document.getElementById('add-specification').addEventListener('click', function() {
        const container = document.getElementById('specifications-container');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2';
        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="specifications[${specIndex}][key]" placeholder="Specification name">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="specifications[${specIndex}][value]" placeholder="Specification value">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-outline-danger remove-specification">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
        specIndex++;

        // Show remove button for first row if there are multiple rows
        if (container.children.length > 1) {
            container.children[0].querySelector('.remove-specification').style.display = 'block';
        }
    });

    // Features management
    let featureIndex = 1;
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2';
        newRow.innerHTML = `
            <div class="col-md-10">
                <input type="text" class="form-control" name="features[${featureIndex}]" placeholder="Feature description">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-outline-danger remove-feature">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
        featureIndex++;

        // Show remove button for first row if there are multiple rows
        if (container.children.length > 1) {
            container.children[0].querySelector('.remove-feature').style.display = 'block';
        }
    });

        // Gallery management
    let galleryIndex = 1;
    document.getElementById('add-gallery').addEventListener('click', function() {
        const container = document.getElementById('gallery-container');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2';
        newRow.innerHTML = `
            <div class="col-md-10">
                <input type="file" class="form-control" name="gallery[]" accept="image/*">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-outline-danger remove-gallery">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
        galleryIndex++;

        // Show remove button for first row if there are multiple rows
        if (container.children.length > 1) {
            container.children[0].querySelector('.remove-gallery').style.display = 'block';
        }
    });

    // Remove buttons event delegation
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-specification')) {
            const row = e.target.closest('.row');
            const container = document.getElementById('specifications-container');
            row.remove();

            // Hide remove button for first row if only one row remains
            if (container.children.length === 1) {
                container.children[0].querySelector('.remove-specification').style.display = 'none';
            }
        }

        if (e.target.classList.contains('remove-feature')) {
            const row = e.target.closest('.row');
            const container = document.getElementById('features-container');
            row.remove();

            // Hide remove button for first row if only one row remains
            if (container.children.length === 1) {
                container.children[0].querySelector('.remove-feature').style.display = 'none';
            }
        }

        if (e.target.classList.contains('remove-gallery')) {
            const row = e.target.closest('.row');
            const container = document.getElementById('gallery-container');
            row.remove();

            // Hide remove button for first row if only one row remains
            if (container.children.length === 1) {
                container.children[0].querySelector('.remove-gallery').style.display = 'none';
            }
        }
    });
</script>
@endpush
@endsection
