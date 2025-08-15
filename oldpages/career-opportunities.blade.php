@extends('layouts.app')
@section('title', 'Career Opportunities - TCI Petrochemical Group')
@section('styles')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }
        .logo { max-height: 50px; }
        .hero-section { background: linear-gradient(135deg, #0d223f 0%, #0d6efd 100%); color: white; padding: 60px 0; margin-bottom: 40px; }
        .hero-title { font-size: 2.5rem; font-weight: 700; margin-bottom: 20px; }
        .hero-desc { font-size: 1.1rem; opacity: 0.9; margin-bottom: 30px; }
        .section-title { font-size: 1.8rem; font-weight: 600; color: #0d223f; margin-bottom: 25px; }
        .jobs-container { background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); margin-bottom: 40px; overflow: hidden; }
        .jobs-list { height: 600px; overflow-y: auto; border-right: 1px solid #e9ecef; }
        .job-item { padding: 20px; border-bottom: 1px solid #e9ecef; cursor: pointer; transition: all 0.3s ease; }
        .job-item:hover { background-color: #f8f9fa; }
        .job-item.active { background-color: #e7f1ff; border-left: 4px solid #0d6efd; }
        .job-item-title { font-size: 1.1rem; font-weight: 600; color: #0d223f; margin-bottom: 8px; line-height: 1.3; }
        .job-item-meta { font-size: 0.9rem; color: #666; margin-bottom: 5px; }
        .job-item-expiry { font-size: 0.85rem; color: #dc3545; font-weight: 500; }
        .job-details { height: 600px; overflow-y: auto; padding: 30px; }
        .job-details-header { margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid #e9ecef; }
        .job-details-title { font-size: 1.8rem; font-weight: 600; color: #0d223f; margin-bottom: 15px; }
        .job-details-meta { display: flex; flex-wrap: wrap; gap: 20px; }
        .job-meta-item { display: flex; align-items: center; gap: 8px; color: #666; font-size: 0.95rem; }
        .job-meta-icon { color: #0d6efd; width: 16px; }
        .salary-badge { background: linear-gradient(135deg, #28a745, #20c997); color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 500; }
        .job-description { color: #555; line-height: 1.7; margin-bottom: 25px; }
        .job-section { background: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 20px; }
        .job-section h5 { color: #0d223f; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px; }
        .job-section-content { color: #555; line-height: 1.6; }
        .application-section { background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); padding: 40px; margin-bottom: 40px; }
        .form-section-title { font-size: 1.5rem; font-weight: 600; color: #0d223f; margin-bottom: 30px; text-align: center; }
        .form-control:focus { border-color: #0d6efd; box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25); }
        .btn-primary { background: linear-gradient(135deg, #0d6efd, #0a58ca); border: none; padding: 12px 30px; font-weight: 500; transition: all 0.3s ease; }
        .btn-primary:hover { background: linear-gradient(135deg, #0a58ca, #084298); transform: translateY(-2px); }
        .btn-primary:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
        .fa-spinner { animation: spin 1s linear infinite; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .back-btn { background: #6c757d; border: none; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; }
        .back-btn:hover { background: #5a6268; color: white; text-decoration: none; }
        .notification { position: fixed; top: 20px; right: 20px; z-index: 9999; max-width: 400px; border-radius: 12px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15); transform: translateX(100%); transition: transform 0.3s ease; }
        .notification.show { transform: translateX(0); }
        .notification-success { background: linear-gradient(135deg, #28a745, #20c997); color: white; border-left: 4px solid #1e7e34; }
        .notification-error { background: linear-gradient(135deg, #dc3545, #fd7e14); color: white; border-left: 4px solid #c82333; }
        .notification-content { padding: 16px 20px; display: flex; align-items: center; gap: 12px; }
        .notification-icon { font-size: 1.5rem; flex-shrink: 0; }
        .notification-message { flex-grow: 1; font-weight: 500; }
        .no-jobs { text-align: center; padding: 60px 20px; color: #666; }
        .no-jobs i { font-size: 4rem; color: #dee2e6; margin-bottom: 20px; }
        @media (max-width: 768px) { .hero-title { font-size: 2rem; } .jobs-list { height: 300px; border-right: none; border-bottom: 1px solid #e9ecef; } .job-details { height: 400px; } .job-details-meta { flex-direction: column; gap: 10px; } .application-section { padding: 20px; } }
    </style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title">Career Opportunities</h1>
            <p class="hero-desc">Join our dynamic team and be part of the future of petrochemical trading</p>
            <a href="/" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Home
            </a>
        </div>
    </section>
    <!-- Jobs Section -->
    <section class="container">
        <h2 class="section-title">Available Positions</h2>
        @if($careerOpportunities->count() > 0)
            <div class="jobs-container">
                <div class="row g-0">
                    <!-- Jobs List (1/4) -->
                    <div class="col-md-3">
                        <div class="jobs-list">
                            @foreach($careerOpportunities as $index => $job)
                                <div class="job-item {{ $index === 0 ? 'active' : '' }}"
                                     data-job-id="{{ $job->id }}"
                                     onclick="loadJobDetails({{ $job->id }})">
                                    <div class="job-item-title">{{ $job->title }}</div>
                                    <div class="job-item-meta">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        {{ $job->location }} • {{ ucfirst($job->gender) }}
                                    </div>
                                    <div class="job-item-expiry">
                                        <i class="fas fa-clock me-1"></i>
                                        Expires: {{ $job->expiry_date->format('M d, Y') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Job Details (3/4) -->
                    <div class="col-md-9">
                        <div class="job-details" id="jobDetails">
                            <!-- Job details will be loaded here via AJAX -->
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="no-jobs">
                <i class="fas fa-briefcase"></i>
                <h4>No positions available at the moment</h4>
                <p>Please check back later for new opportunities or contact us directly.</p>
                <a href="/#contact" class="btn btn-primary">Contact Us</a>
            </div>
        @endif
    </section>
    <!-- Application Form Section -->
    @if($careerOpportunities->count() > 0)
        <section class="container">
            <div class="application-section">
                <h3 class="form-section-title">Apply for Position</h3>
                <form id="applicationForm" method="POST" action="{{ route('job-applications.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="career_opportunity_id" id="career_opportunity_id" value="{{ $careerOpportunities->first()->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="career_opportunity_select" class="form-label">Select Position *</label>
                                <select class="form-select" id="career_opportunity_select" name="career_opportunity_id" required>
                                    <option value="">Choose a position</option>
                                    @foreach($careerOpportunities as $job)
                                        <option value="{{ $job->id }}">{{ $job->title }} - {{ $job->department }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender *</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone *</label>
                                        <div class="input-group">
                                            <select class="form-select" id="phone_code" name="phone_code" style="max-width: 100px;">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->phone_code }}" {{ $country->code === 'ARE' ? 'selected' : '' }}>
                                                        {{ $country->phone_code }} {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nationality" class="form-label">Nationality *</label>
                                        <select class="form-select" id="nationality" name="nationality" required>
                                            <option value="">Select your nationality</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="current_location" class="form-label">Current Location *</label>
                                        <input type="text" class="form-control" id="current_location" name="current_location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="experience_years" class="form-label">Years of Experience *</label>
                                        <select class="form-select" id="experience_years" name="experience_years" required>
                                            <option value="">Select experience level</option>
                                            <option value="0-1">0-1 years</option>
                                            <option value="1-3">1-3 years</option>
                                            <option value="3-5">3-5 years</option>
                                            <option value="5-8">5-8 years</option>
                                            <option value="8-10">8-10 years</option>
                                            <option value="10+">10+ years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="resume" class="form-label">Resume/CV *</label>
                                        <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                                        <div class="form-text">Accepted formats: PDF, DOC, DOCX (Max 5MB)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="cover_letter" class="form-label">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="8" placeholder="Tell us why you're interested in this position..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-4" id="submitBtn">
                            <i class="fas fa-paper-plane me-2" id="submitIcon"></i>
                            <span id="submitText">Submit Application</span>
                            <span id="submitLoading" style="display: none;">
                                <i class="fas fa-spinner fa-spin me-2"></i>
                                Submitting...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    @endif
    <!-- Notification -->
    <div id="notification" class="notification" style="display: none;">
        <div class="notification-content">
            <div class="notification-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-message" id="notificationMessage"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Load first job details on page load
        document.addEventListener('DOMContentLoaded', function() {
            const firstJob = document.querySelector('.job-item');
            if (firstJob) {
                const jobId = firstJob.dataset.jobId;
                loadJobDetails(jobId);
            }
        });
        function loadJobDetails(jobId) {
            // Update active state
            document.querySelectorAll('.job-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector(`[data-job-id="${jobId}"]`).classList.add('active');
            // Update form career opportunity ID
            document.getElementById('career_opportunity_id').value = jobId;
            // Load job details via AJAX
            fetch(`/career-opportunities/${jobId}`)
                .then(response => response.json())
                .then(job => {
                    const jobDetailsHtml = `
                        <div class="job-details-header">
                            <h2 class="job-details-title">${job.title}</h2>
                            <div class="job-details-meta">
                                <div class="job-meta-item">
                                    <i class="fas fa-map-marker-alt job-meta-icon"></i>
                                    <span>${job.location}</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="fas fa-building job-meta-icon"></i>
                                    <span>${job.department}</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="fas fa-clock job-meta-icon"></i>
                                    <span>${job.employment_type}</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="fas fa-user job-meta-icon"></i>
                                    <span>${job.gender}</span>
                                </div>
                                <div class="job-meta-item">
                                    <i class="fas fa-briefcase job-meta-icon"></i>
                                    <span>${job.experience_level}</span>
                                </div>
                                ${job.salary_min && job.salary_max ? `
                                    <div class="job-meta-item">
                                        <span class="salary-badge">$${Number(job.salary_min).toLocaleString()} - $${Number(job.salary_max).toLocaleString()}</span>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                        <div class="job-description">
                            ${job.description}
                        </div>
                        ${job.requirements ? `
                            <div class="job-section">
                                <h5><i class="fas fa-list-check"></i>Requirements</h5>
                                <div class="job-section-content" style="white-space: pre-line;">${job.requirements}</div>
                            </div>
                        ` : ''}
                                                ${job.benefits ? `
                            <div class="job-section">
                                <h5><i class="fas fa-gift"></i>Benefits</h5>
                                <div class="job-section-content" style="white-space: pre-line;">${job.benefits}</div>
                            </div>
                        ` : ''}
                        <div class="text-center mt-4">
                            <button class="btn btn-primary btn-lg" onclick="scrollToApplicationForm(${job.id})">
                                <i class="fas fa-paper-plane me-2"></i>
                                Apply for this Position
                            </button>
                        </div>
                    `;
                    document.getElementById('jobDetails').innerHTML = jobDetailsHtml;
                })
                .catch(error => {
                    console.error('Error loading job details:', error);
                    document.getElementById('jobDetails').innerHTML = '<p class="text-center text-muted">Error loading job details</p>';
                });
        }
        document.getElementById('applicationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Prevent multiple submissions
            const submitBtn = document.getElementById('submitBtn');
            const submitIcon = document.getElementById('submitIcon');
            const submitText = document.getElementById('submitText');
            const submitLoading = document.getElementById('submitLoading');
            if (submitBtn.disabled) {
                return; // Already submitting
            }
            // Show loading state
            submitBtn.disabled = true;
            submitIcon.style.display = 'none';
            submitText.style.display = 'none';
            submitLoading.style.display = 'inline';
            const formData = new FormData(this);
            fetch('{{ route("job-applications.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Application submitted successfully! We will contact you soon.', 'success');
                    document.getElementById('applicationForm').reset();
                } else {
                    showNotification(data.message || 'An error occurred. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred. Please try again.', 'error');
            })
            .finally(() => {
                // Reset button state
                submitBtn.disabled = false;
                submitIcon.style.display = 'inline';
                submitText.style.display = 'inline';
                submitLoading.style.display = 'none';
            });
        });
        function scrollToApplicationForm(jobId) {
            // Update the career opportunity select
            document.getElementById('career_opportunity_select').value = jobId;
            // Scroll to the application form
            document.querySelector('.application-section').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            const messageElement = document.getElementById('notificationMessage');
            messageElement.textContent = message;
            notification.className = `notification notification-${type}`;
            notification.style.display = 'block';
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 300);
            }, 5000);
        }
    </script>
@endsection
