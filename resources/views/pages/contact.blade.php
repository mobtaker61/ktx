@extends('layouts.app')

@section('title', 'Contact Us - KTX')

@section('hero_title', 'Contact Us')

@section('hero_breadcrumb')
<li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
@endsection

@section('hero_image', asset('img/base/ktx_contact.png'))

@section('content')
<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Get In Touch</div>
            <h1 class="mb-4">We'd Love to Hear From You</h1>
            <p class="mb-5">Ready to discuss your industrial compressor needs? Our expert team is here to help you find the perfect solution for your business.</p>
        </div>

        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 h-100">
                        <h4 class="text-primary mb-4">Contact Information</h4>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Our Location</h6>
                                <p class="mb-0 text-muted">624, Business Village B block, Clock Tower, Deira, Dubai, UAE</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone Numbers</h6>
                                <p class="mb-0 text-muted">
                                    <a href="tel:+97142207531" class="text-decoration-none">+971 4 220 7531</a><br>
                                    <a href="tel:+971507242884" class="text-decoration-none">+971 50 724 2884</a>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email Address</h6>
                                <p class="mb-0 text-muted">
                                    <a href="mailto:info@ktxcompressor.com" class="text-decoration-none">info@ktxcompressor.com</a><br>
                                    <a href="mailto:sales@ktxcompressor.com" class="text-decoration-none">sales@ktxcompressor.com</a>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Business Hours</h6>
                                <p class="mb-0 text-muted">
                                    Sunday - Thursday: 8:00 AM - 6:00 PM<br>
                                    Friday: 9:00 AM - 1:00 PM<br>
                                    Saturday: Closed
                                </p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%;">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Website</h6>
                                <p class="mb-0 text-muted">
                                    <a href="https://ktxcompressor.com" class="text-decoration-none" target="_blank">www.ktxcompressor.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4">
                        <h4 class="text-primary mb-4">Send Us a Message</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name">Your Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Your Company">
                                        <label for="company">Your Company</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email">Your Email *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select class="form-select" id="phone_code" name="phone_code" style="max-width: 120px;">
                                            @foreach(\App\Models\Country::active()->orderBy('name')->get() as $country)
                                                <option value="{{ $country->phone_code }}" {{ $country->code === 'ARE' ? 'selected' : '' }}>
                                                    {{ $country->flag }} ({{ $country->phone_code }}) {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="subject" name="subject" required>
                                            <option value="">Select a subject</option>
                                            <option value="General Inquiry">General Inquiry</option>
                                            <option value="Product Information">Product Information</option>
                                            <option value="Technical Support">Technical Support</option>
                                            <option value="Sales Quote">Sales Quote</option>
                                            <option value="Service Request">Service Request</option>
                                            <option value="Partnership">Partnership</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label for="subject">Subject *</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 150px" required></textarea>
                                        <label for="message">Message *</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- reCAPTCHA Widget -->
                                    <div class="mb-3">
                                        <x-recaptcha-widget />
                                    </div>

                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Map Section Start -->
<div class="container-fluid py-5">
    <div class="container py-2">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h5 class="text-primary">Our Location</h5>
            <h1 class="mb-3">Find Us Here</h1>
            <p >Visit our facility or get in touch for a consultation about your industrial compressor needs.</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-light rounded p-4" style="height: 400px;">
                    <div id="map" style="height: 100%; width: 100%; border-radius: 8px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Map Section End -->
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    .contact-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }

    #map {
        z-index: 1;
    }

    .newsletter-check {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .newsletter-check .btn {
        width: 30px;
        height: 30px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

            /* Phone input group styling */
    .input-group .form-select {
        max-width: 120px;
    }

    .input-group .form-control {
        flex: 1;
    }

    /* Ensure consistent height with form-floating inputs */
    .input-group .form-select,
    .input-group .form-control {
        height: 58px;
        padding: 0.75rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize map
    const map = L.map('map').setView([25.257192, 55.326793], 13); // Dubai coordinates

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Add marker for KTX location
    const marker = L.marker([25.257192, 55.326793]).addTo(map);
    marker.bindPopup("<b>KTX Nova Compressor Group</b><br>Dubai, UAE<br>624, Business Village B block, Clock Tower, Deira, Dubai, UAE").openPopup();

    // Add custom popup styling
    const popup = marker.getPopup();
    popup.setContent(`
        <div style="text-align: center;">
            <h6 style="margin: 0 0 10px 0; color: var(--primary-color);">KTX Nova Compressor Group</h6>
            <p style="margin: 0; font-size: 14px;">624, Business Village B block, Clock Tower, Deira, Dubai, UAE</p>
        </div>
    `);

    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;

            // Show success message
            const button = this.querySelector('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check me-2"></i>Subscribed!';
            button.classList.remove('btn-primary');
            button.classList.add('btn-success');

            // Reset form
            this.reset();

            // Reset button after 3 seconds
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('btn-success');
                button.classList.add('btn-primary');
            }, 3000);
        });
    }
});
</script>
@endpush
