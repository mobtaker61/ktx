@extends('layouts.admin')

@section('title', 'Create News Article - Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create News Article</h1>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to News
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Article Information</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required
                                   placeholder="Enter article title">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                                                <x-ckeditor
                            id="content"
                            name="content"
                            value="{!! old('content') !!}"
                            placeholder="Enter article content"
                            :required="true"
                            :error="$errors->first('content')"
                        />

                                                <!-- Excerpt -->
                        <x-ckeditor-simple
                            id="excerpt"
                            name="excerpt"
                            value="{!! old('excerpt') !!}"
                            placeholder="Enter article excerpt (optional)"
                            :required="false"
                            :error="$errors->first('excerpt')"
                        />
                        <div class="form-text">A brief summary of the article. If left empty, it will be auto-generated from content.</div>
                    </div>

                    <div class="col-md-4">
                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Featured Image</label>
                            <input type="file"
                                   class="form-control @error('image') is-invalid @enderror"
                                   id="image"
                                   name="image"
                                   accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Recommended size: 800x600px. Max size: 2MB.</div>
                        </div>

                        <!-- Author -->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text"
                                   class="form-control @error('author') is-invalid @enderror"
                                   id="author"
                                   name="author"
                                   value="{{ old('author') }}"
                                   placeholder="Enter author name">
                            @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror"
                                    id="status"
                                    name="status"
                                    required>
                                <option value="">Select Status</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Published At -->
                        <div class="mb-3">
                            <label for="published_at" class="form-label">Publish Date</label>
                            <input type="datetime-local"
                                   class="form-control @error('published_at') is-invalid @enderror"
                                   id="published_at"
                                   name="published_at"
                                   value="{{ old('published_at') }}">
                            @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to publish immediately when status is set to published.</div>
                        </div>

                        <!-- Preview -->
                        <div class="mb-3">
                            <label class="form-label">Image Preview</label>
                            <div id="imagePreview" class="border rounded p-3 text-center" style="min-height: 150px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                                <p class="text-muted mt-2">No image selected</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Article
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Image preview functionality
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 150px;">
                <p class="text-muted mt-2">${file.name}</p>
            `;
        };
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = `
            <i class="fas fa-image fa-3x text-muted"></i>
            <p class="text-muted mt-2">No image selected</p>
        `;
    }
});

// Auto-generate excerpt from content
document.getElementById('content').addEventListener('input', function() {
    const content = this.value;
    const excerptField = document.getElementById('excerpt');

    if (!excerptField.value && content.length > 50) {
        const excerpt = content.substring(0, 150).replace(/<[^>]*>/g, '');
        excerptField.value = excerpt + (excerpt.length === 150 ? '...' : '');
    }
});
</script>
@endpush
