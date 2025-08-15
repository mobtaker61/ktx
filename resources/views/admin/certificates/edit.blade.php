@extends('layouts.admin')

@section('title', 'Edit Certificate')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Certificate</h1>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Certificate: {{ $certificate->title }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title', $certificate->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="4">{{ old('description', $certificate->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="certificate_number" class="form-label">Certificate Number</label>
                                    <input type="text" class="form-control @error('certificate_number') is-invalid @enderror"
                                           id="certificate_number" name="certificate_number"
                                           value="{{ old('certificate_number', $certificate->certificate_number) }}">
                                    @error('certificate_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="issuing_authority" class="form-label">Issuing Authority</label>
                                    <input type="text" class="form-control @error('issuing_authority') is-invalid @enderror"
                                           id="issuing_authority" name="issuing_authority"
                                           value="{{ old('issuing_authority', $certificate->issuing_authority) }}">
                                    @error('issuing_authority')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="issue_date" class="form-label">Issue Date</label>
                                    <input type="date" class="form-control @error('issue_date') is-invalid @enderror"
                                           id="issue_date" name="issue_date"
                                           value="{{ old('issue_date', $certificate->issue_date?->format('Y-m-d')) }}">
                                    @error('issue_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control @error('expiry_date') is-invalid @enderror"
                                           id="expiry_date" name="expiry_date"
                                           value="{{ old('expiry_date', $certificate->expiry_date?->format('Y-m-d')) }}">
                                    @error('expiry_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Display Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                           id="order" name="order" value="{{ old('order', $certificate->order) }}" min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" id="status" name="status"
                                               {{ old('status', $certificate->status) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">
                                            Active Certificate
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Certificate Image</label>
                            <div class="image-upload-container">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if($certificate->image)
                                    <div class="current-image mt-3">
                                        <h6 class="text-muted mb-2">Current Image:</h6>
                                        <img src="{{ asset('storage/' . $certificate->image) }}"
                                             alt="{{ $certificate->title }}"
                                             class="img-fluid rounded border">
                                        <small class="text-muted d-block mt-2">
                                            Leave empty to keep current image
                                        </small>
                                    </div>
                                @endif

                                <div class="image-preview mt-3" id="imagePreview" style="display: none;">
                                    <h6 class="text-muted mb-2">New Image Preview:</h6>
                                    <img id="previewImg" src="" alt="Preview" class="img-fluid rounded">
                                </div>

                                <div class="mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Supported formats: JPEG, PNG, JPG, GIF<br>
                                        Maximum size: 2MB<br>
                                        Recommended dimensions: 800x600px or larger
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-primary">
                                    <i class="fas fa-lightbulb me-2"></i>Tips
                                </h6>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Use high-quality, clear images
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Ensure text is readable
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Keep file sizes reasonable
                                    </li>
                                    <li>
                                        <i class="fas fa-check text-success me-2"></i>
                                        Use consistent aspect ratios
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .image-upload-container {
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: border-color 0.3s ease;
    }

    .image-upload-container:hover {
        border-color: var(--primary-color);
    }

    .current-image {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 15px;
        background: #f8f9fa;
    }

    .current-image img {
        max-width: 100%;
        height: auto;
    }

    .image-preview {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 15px;
        background: #e3f2fd;
    }

    .image-preview img {
        max-width: 100%;
        height: auto;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    });

    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();

        if (!title) {
            e.preventDefault();
            alert('Please enter a certificate title.');
            return;
        }
    });
});
</script>
@endpush
