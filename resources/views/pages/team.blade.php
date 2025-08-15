@extends('layouts.app')

@section('title', 'Our Team - KTX')

@section('hero_title', 'Our Team')

@section('hero_breadcrumb')
    <li class="breadcrumb-item text-white active" aria-current="page">Our Team</li>
@endsection

@section('hero_image', asset('img/base/ktx_office_ct.png'))

@section('content')
    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h5 class="text-primary">Our Team</h5>
                <h1 class="mb-3">Meet Our Experienced Team Members</h1>
                <p class="mb-5">Our team consists of highly skilled professionals with extensive experience in industrial
                    compressor technology.</p>
            </div>
            @foreach ($team as $level => $members)
                <div class="mb-5" id="team-{{ $level }}">
                    <h3 class="text-center mb-4">
                        @switch($level)
                            @case(1)
                                <span class="text-danger">Executive Leadership</span>
                            @break

                            @case(2)
                                <span class="text-warning">Management Team</span>
                            @break

                            @case(3)
                                <span class="text-info">Senior Staff</span>
                            @break

                            @case(4)
                                <span class="text-secondary">Staff Members</span>
                            @break

                            @default
                                <span class="text-primary">Team Level {{ $level }}</span>
                        @endswitch
                    </h3>
                    <div class="row g-4 justify-content-center">
                        @foreach ($members as $member)
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-card-container">
                                    <div class="team-card">
                                        <div class="team-card-front">
                                            <div class="team-front-content">
                                                <img class="img-fluid rounded-circle p-4"
                                                    src="{{ asset('team/' . $member->image) }}" alt="{{ $member->name }}">
                                                <h5 class="mb-0">{{ $member->name }}</h5>
                                                <small class="text-muted">{{ $member->position }}</small>
                                            </div>
                                        </div>
                                        <div class="team-card-back">
                                            <div class="team-card-back-content">
                                                <h5 class="mb-3">{{ $member->name }}</h5>
                                                <h6 class="text-warning mb-3">{{ $member->position }}</h6>
                                                @if ($member->bio)
                                                    <div class="bio-scroll">
                                                        <p class="mb-3">{{ $member->bio }}</p>
                                                    </div>
                                                @endif
                                                <div class="contact-info d-none">
                                                    @if ($member->email)
                                                        <div class="mb-2">
                                                            <i class="fas fa-envelope me-2"></i>
                                                            <a href="mailto:{{ $member->email }}"
                                                                class="text-white">{{ $member->email }}</a>
                                                        </div>
                                                    @endif
                                                    @if ($member->phone)
                                                        <div class="mb-2">
                                                            <i class="fas fa-phone me-2"></i>
                                                            <span class="text-white">{{ $member->phone }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="social-links mt-3">
                                                    @if ($member->email)
                                                        <a href="mailto:{{ $member->email }}" target="_blank"
                                                            class="btn btn-outline-light btn-sm me-2">
                                                            <i class="fas fa-envelope"></i>
                                                        </a>
                                                    @endif
                                                    @if ($member->linkedin)
                                                        <a href="{{ $member->linkedin }}" target="_blank"
                                                            class="btn btn-outline-light btn-sm me-2">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </a>
                                                    @endif
                                                    @if ($member->twitter)
                                                        <a href="{{ $member->twitter }}" target="_blank"
                                                            class="btn btn-outline-light btn-sm">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    @endif
                                                    @if ($member->facebook)
                                                        <a href="{{ $member->facebook }}" target="_blank"
                                                            class="btn btn-outline-light btn-sm">
                                                            <i class="fab fa-facebook"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Team End -->

    <!-- Career Opportunities Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h5 class="text-primary">Career Opportunities</h5>
                <h1 class="mb-3">Join Our Dynamic Team</h1>
                <p class="mb-5">Explore exciting career opportunities and be part of our innovative team in the industrial
                    compressor industry.</p>
            </div>
            <!-- Jobs Lists Box -->
            @if ($careerOpportunities && $careerOpportunities->count() > 0)
                <div class="jobs-container bg-white rounded shadow-sm">
                    <div class="row g-0">
                        <!-- Jobs List (1/3) -->
                        <div class="col-md-4">
                            <div class="jobs-list p-3" style="height: 600px; overflow-y: auto;">
                                @foreach ($careerOpportunities as $index => $job)
                                    <div class="job-item p-3 border-bottom {{ $index === 0 ? 'active' : '' }}"
                                        data-job-id="{{ $job->id }}" onclick="loadJobDetails({{ $job->id }})">
                                        <div class="job-item-title fw-bold text-primary">{{ $job->title }}</div>
                                        <div class="job-item-meta text-muted small">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $job->location }} • {{ ucfirst($job->gender) }}
                                        </div>
                                        <div class="job-item-expiry text-danger small">
                                            <i class="fas fa-clock me-1"></i>
                                            Expires: {{ $job->expiry_date->format('M d, Y') }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Job Details (2/3) -->
                        <div class="col-md-8">
                            <div class="job-details p-4" id="jobDetails" style="height: 600px; overflow-y: auto;">
                                <!-- Job details will be loaded here via AJAX -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Form Section -->
                <div class="application-section bg-white rounded shadow-sm mt-5 p-4">
                    <h3 class="text-center mb-4">Apply for Position</h3>
                    <form id="applicationForm" method="POST" action="{{ route('job-applications.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="career_opportunity_id" id="career_opportunity_id"
                            value="{{ $careerOpportunities->first()->id }}">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="career_opportunity_select" class="form-label">Select Position *</label>
                                <select class="form-select" id="career_opportunity_select" name="career_opportunity_id"
                                    required>
                                    <option value="">Choose a position</option>
                                    @foreach ($careerOpportunities as $job)
                                        <option value="{{ $job->id }}">{{ $job->title }} - {{ $job->department }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="gender" class="form-label">Gender *</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone *</label>
                                <div class="input-group">
                                    <select class="form-select" id="phone_code" name="phone_code"
                                        style="max-width: 120px;">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->phone_code }}"
                                                {{ $country->code === 'ARE' ? 'selected' : '' }}>
                                                {{ $country->flag }} ({{ $country->phone_code }}) {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Phone number" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nationality" class="form-label">Nationality *</label>
                                <select class="form-select" id="nationality" name="nationality" required>
                                    <option value="">Select your nationality</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}">{{ $country->flag }} {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="current_location" class="form-label">Current Location *</label>
                                <input type="text" class="form-control" id="current_location" name="current_location"
                                    required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
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
                            <div class="col-md-6 mb-3">
                                <label for="resume" class="form-label">Resume/CV *</label>
                                <input type="file" class="form-control" id="resume" name="resume"
                                    accept=".pdf,.doc,.docx" required>
                                <div class="form-text">Accepted formats: PDF, DOC, DOCX (Max 5MB)</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="cover_letter" class="form-label">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4"
                                    placeholder="Tell us why you're interested in this position..."></textarea>
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
            @else
                <div class="text-center py-5">
                    <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No positions available at the moment</h4>
                    <p class="text-muted">Please check back later for new opportunities or contact us directly.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                </div>
            @endif
        </div>
    </div>
    <!-- Career Opportunities End -->

    @push('styles')
        <style>
            .team-card-container {
                perspective: 1000px;
                margin-bottom: 20px;
            }

            .team-card {
                position: relative;
                width: 100%;
                min-height: 400px;
                text-align: center;
                transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
                transform-style: preserve-3d;
                cursor: pointer;
            }

            .team-card-front,
            .team-card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                backface-visibility: hidden;
                border-radius: 0.5rem;
                padding: 1rem;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                top: 0;
                left: 0;
                overflow: hidden;
            }

            .team-card-front {
                background: white;
                color: #333;
                z-index: 2;
            }

            .team-card-back {
                background: linear-gradient(135deg, #007bff, #0056b3);
                color: white;
                transform: rotateY(180deg);
                z-index: 1;
            }

            .team-card-back-content {
                padding: 1rem;
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .team-card-back h5 {
                color: white;
                margin-bottom: 0.5rem;
                font-weight: bold;
                text-align: center;
            }

            .team-card-back h6 {
                color: #ffc107;
                margin-bottom: 1rem;
                font-weight: 600;
                text-align: center;
            }

            .team-card-back p {
                font-size: 0.9rem;
                line-height: 1.4;
                margin-bottom: 1rem;
                text-align: center;
                max-height: 120px;
                overflow-y: auto;
            }

            .team-card-back a {
                color: white;
                text-decoration: none;
            }

            .team-card-back a:hover {
                color: #ffc107;
            }

            .team-card-back .btn-outline-light:hover {
                background-color: #ffc107;
                border-color: #ffc107;
                color: #333;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .team-card {
                    min-height: 450px;
                }

                .team-card-back-content {
                    padding: 0.5rem;
                }

                .team-card-back h5 {
                    font-size: 1.1rem;
                }

                .team-card-back h6 {
                    font-size: 1rem;
                }

                .team-card-back p {
                    font-size: 0.8rem;
                    max-height: 100px;
                }
            }

            /* Ensure proper 3D rendering */
            .team-card-container * {
                transform-style: preserve-3d;
            }

            /* Ensure images don't interfere with 3D */
            .team-card img {
                transform: translateZ(0);
            }

            /* Hover effect */
            .team-card:hover {
                transform: rotateY(180deg);
            }

            /* Fix for content overflow */
            .team-card-front {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .team-front-content {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .team-social-links {
                margin-top: auto;
                padding-top: 1rem;
            }

            .bio-scroll {
                height: auto;
                max-height: 150px;
                overflow-y: auto;
                padding-right: 5px;
            }

            .bio-scroll::-webkit-scrollbar {
                width: 4px;
            }

            .bio-scroll::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 2px;
            }

            .bio-scroll::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.3);
                border-radius: 2px;
            }

            .bio-scroll::-webkit-scrollbar-thumb:hover {
                background: rgba(255, 255, 255, 0.5);
            }

            .contact-info {
                text-align: center;
            }

            .social-links {
                text-align: center;
            }

            /* Ensure proper spacing */
            .team-card-front img {
                margin-bottom: 1rem;
            }

            .team-card-front h5 {
                margin-bottom: 0.5rem;
            }

            .team-card-front small {
                margin-bottom: 1rem;
            }

            .team-card-front p {
                margin-bottom: 1rem;
            }

            /* Career Opportunities Styles */
            .jobs-container {
                border: 1px solid #e9ecef;
                border-radius: 12px;
                overflow: hidden;
            }

            .jobs-list {
                border-right: 1px solid #e9ecef;
            }

            .job-item {
                cursor: pointer;
                transition: all 0.3s ease;
                border-radius: 8px;
                margin: 5px;
            }

            .job-item:hover {
                background-color: #f8f9fa;
                transform: translateX(5px);
            }

            .job-item.active {
                background-color: #e7f1ff;
                border-left: 4px solid var(--primary);
            }

            .job-item-title {
                font-size: 1.1rem;
                margin-bottom: 8px;
                line-height: 1.3;
            }

            .job-item-meta {
                margin-bottom: 5px;
            }

            .job-item-expiry {
                font-weight: 500;
            }

            .job-details {
                background-color: #f8f9fa;
                border-radius: 8px;
            }

            .application-section {
                border: 1px solid #e9ecef;
                border-radius: 12px;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 0.2rem rgba(0, 114, 179, 0.25);
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--primary), #0056b3);
                border: none;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                background: linear-gradient(135deg, #0056b3, #004085);
                transform: translateY(-2px);
            }

            /* Responsive adjustments for career section */
            @media (max-width: 768px) {
                .jobs-list {
                    height: 300px !important;
                    border-right: none;
                    border-bottom: 1px solid #e9ecef;
                }

                .job-details {
                    height: 400px !important;
                }

                .application-section {
                    padding: 20px !important;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add touch support for mobile devices
                const teamCards = document.querySelectorAll('.team-card');

                teamCards.forEach(card => {
                    let isFlipped = false;

                    // Touch events for mobile
                    card.addEventListener('touchstart', function(e) {
                        e.preventDefault();
                        isFlipped = !isFlipped;

                        if (isFlipped) {
                            this.style.transform = 'rotateY(180deg)';
                        } else {
                            this.style.transform = 'rotateY(0deg)';
                        }
                    });

                    // Mouse events for desktop
                    card.addEventListener('mouseenter', function() {
                        if (!('ontouchstart' in window)) {
                            this.style.transform = 'rotateY(180deg)';
                        }
                    });

                    card.addEventListener('mouseleave', function() {
                        if (!('ontouchstart' in window)) {
                            this.style.transform = 'rotateY(0deg)';
                        }
                    });
                });
            });

            // Career Opportunities JavaScript
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
                        <div class="job-details-header mb-4 pb-3 border-bottom">
                            <h2 class="text-primary mb-3">${job.title}</h2>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <span>${job.location}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-building text-primary me-2"></i>
                                        <span>${job.department}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-clock text-primary me-2"></i>
                                        <span>${job.employment_type}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-user text-primary me-2"></i>
                                        <span>${job.gender}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span class="badge bg-success fs-6">${job.experience_level}</span>
                                ${job.salary_min && job.salary_max ? `
                                            <span class="badge bg-warning text-dark fs-6 ms-2">
                                                $${Number(job.salary_min).toLocaleString()} - $${Number(job.salary_max).toLocaleString()}
                                            </span>
                                        ` : ''}
                            </div>
                        </div>

                        <div class="job-description mb-4">
                            <h5 class="text-dark mb-3">Job Description</h5>
                            <p class="text-muted">${job.description}</p>
                        </div>

                        ${job.requirements ? `
                                    <div class="job-section bg-white p-3 rounded mb-4">
                                        <h5 class="text-primary mb-3">
                                            <i class="fas fa-list-check me-2"></i>Requirements
                                        </h5>
                                        <div class="text-muted" style="white-space: pre-line;">${job.requirements}</div>
                                    </div>
                                ` : ''}

                        ${job.benefits ? `
                                    <div class="job-section bg-white p-3 rounded mb-4">
                                        <h5 class="text-primary mb-3">
                                            <i class="fas fa-gift me-2"></i>Benefits
                                        </h5>
                                        <div class="text-muted" style="white-space: pre-line;">${job.benefits}</div>
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
                        document.getElementById('jobDetails').innerHTML =
                            '<p class="text-center text-muted">Error loading job details</p>';
                    });
            }

            // Handle form submission
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

                fetch('{{ route('job-applications.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification('Application submitted successfully! We will contact you soon.',
                                'success');
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
                // Create notification element
                const notification = document.createElement('div');
                notification.className =
                    `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
                notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
                notification.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

                document.body.appendChild(notification);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 5000);
            }
        </script>
    @endpush
@endsection
