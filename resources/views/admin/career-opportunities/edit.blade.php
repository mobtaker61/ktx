@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Career Opportunity</h3>
                    <a href="{{ route('admin.career-opportunities.index') }}" class="btn btn-secondary float-end">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.career-opportunities.update', $careerOpportunity) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Job Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title" name="title" value="{{ old('title', $careerOpportunity->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Job Description *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description" rows="6" required>{{ old('description', $careerOpportunity->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="requirements" class="form-label">Requirements</label>
                                            <textarea class="form-control @error('requirements') is-invalid @enderror"
                                                      id="requirements" name="requirements" rows="4">{{ old('requirements', $careerOpportunity->requirements) }}</textarea>
                                            @error('requirements')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="benefits" class="form-label">Benefits</label>
                                            <textarea class="form-control @error('benefits') is-invalid @enderror"
                                                      id="benefits" name="benefits" rows="4">{{ old('benefits', $careerOpportunity->benefits) }}</textarea>
                                            @error('benefits')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department *</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror"
                                           id="department" name="department" value="{{ old('department', $careerOpportunity->department) }}" required>
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Location *</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                           id="location" name="location" value="{{ old('location', $careerOpportunity->location) }}" required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience_level" class="form-label">Experience Level *</label>
                                    <select class="form-select @error('experience_level') is-invalid @enderror"
                                            id="experience_level" name="experience_level" required>
                                        <option value="">Select experience level</option>
                                        <option value="0-1" {{ old('experience_level', $careerOpportunity->experience_level) == '0-1' ? 'selected' : '' }}>0-1 years</option>
                                        <option value="1-3" {{ old('experience_level', $careerOpportunity->experience_level) == '1-3' ? 'selected' : '' }}>1-3 years</option>
                                        <option value="3-5" {{ old('experience_level', $careerOpportunity->experience_level) == '3-5' ? 'selected' : '' }}>3-5 years</option>
                                        <option value="5-8" {{ old('experience_level', $careerOpportunity->experience_level) == '5-8' ? 'selected' : '' }}>5-8 years</option>
                                        <option value="8-10" {{ old('experience_level', $careerOpportunity->experience_level) == '8-10' ? 'selected' : '' }}>8-10 years</option>
                                        <option value="10+" {{ old('experience_level', $careerOpportunity->experience_level) == '10+' ? 'selected' : '' }}>10+ years</option>
                                    </select>
                                    @error('experience_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="employment_type" class="form-label">Employment Type *</label>
                                    <select class="form-select @error('employment_type') is-invalid @enderror"
                                            id="employment_type" name="employment_type" required>
                                        <option value="">Select employment type</option>
                                        <option value="full-time" {{ old('employment_type', $careerOpportunity->employment_type) == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                        <option value="part-time" {{ old('employment_type', $careerOpportunity->employment_type) == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                        <option value="contract" {{ old('employment_type', $careerOpportunity->employment_type) == 'contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="internship" {{ old('employment_type', $careerOpportunity->employment_type) == 'internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                    @error('employment_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender *</label>
                                    <select class="form-select @error('gender') is-invalid @enderror"
                                            id="gender" name="gender" required>
                                        <option value="">Select gender</option>
                                        <option value="male" {{ old('gender', $careerOpportunity->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $careerOpportunity->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="both" {{ old('gender', $careerOpportunity->gender) == 'both' ? 'selected' : '' }}>Both</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="salary_min" class="form-label">Min Salary</label>
                                            <input type="number" class="form-control @error('salary_min') is-invalid @enderror"
                                                   id="salary_min" name="salary_min" value="{{ old('salary_min', $careerOpportunity->salary_min) }}" min="0">
                                            @error('salary_min')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="salary_max" class="form-label">Max Salary</label>
                                            <input type="number" class="form-control @error('salary_max') is-invalid @enderror"
                                                   id="salary_max" name="salary_max" value="{{ old('salary_max', $careerOpportunity->salary_max) }}" min="0">
                                            @error('salary_max')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date *</label>
                                    <input type="date" class="form-control @error('expiry_date') is-invalid @enderror"
                                           id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $careerOpportunity->expiry_date->format('Y-m-d')) }}" required>
                                    @error('expiry_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                               {{ old('is_active', $careerOpportunity->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update Opportunity
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
