@extends('layouts.app')

@section('title', 'Certificates & Licenses - KTX')

@section('hero_title', 'Certificates & Licenses')

@section('hero_breadcrumb')
    <li class="breadcrumb-item text-white active" aria-current="page">Certificates</li>
@endsection

@section('hero_image', asset('img/base/ktx_verified.png'))

@section('content')
    <!-- Certificates Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Credentials</div>
                <h1 class="mb-4">Quality Certifications & Licenses</h1>
                <p class="mb-5">KTX Nova Compressor Group maintains the highest standards of quality, safety, and
                    environmental responsibility. Our comprehensive range of international certifications demonstrates our
                    commitment to excellence and compliance with global industry standards.</p>
            </div>

            <!-- Certificates Grid -->
            <div class="row g-3">
                @forelse($certificates as $certificate)
                    <div class="col-lg-2 col-md-4 col-sm-6 wow fadeIn" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                        <div class="certificate-card bg-white rounded shadow-sm h-100" onclick="openCertificateModal({{ $certificate->id }})">
                            <div class="certificate-image position-relative">
                                <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}"
                                    class="img-fluid w-100 rounded-top" style="height: 100%;">
                                <div class="certificate-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                    style="background: rgba(0,0,0,0.7); opacity: 0; transition: opacity 0.3s ease;">
                                    <div class="text-center text-white">
                                        <i class="fas fa-search-plus fa-2x mb-2"></i>
                                        <p class="mb-0 fw-bold">Click to View</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="py-5">
                            <i class="fas fa-certificate fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No certificates available</h4>
                            <p class="text-muted">We are currently updating our certification information.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Certificates End -->

    <!-- Certificate Modal -->
    <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="certificateModalLabel">
                        <i class="fas fa-certificate me-2"></i>Certificate Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" id="certificateModalBody">
                    <!-- Loading state -->
                    <div class="text-center py-5" id="loadingState">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 text-muted">Loading certificate details...</p>
                    </div>

                    <!-- Certificate content will be loaded here -->
                    <div id="certificateContent" style="display: none;">
                        <div class="row g-0">
                            <!-- Left side - Certificate Image -->
                            <div class="col-lg-6">
                                <div class="certificate-image-container h-100">
                                    <div
                                        class="certificate-image-wrapper h-100 d-flex align-items-center justify-content-center p-4">
                                        <img id="modalCertificateImage" src="" alt="Certificate"
                                            class="img-fluid rounded shadow-sm"
                                            style="max-height: 100%; width: 100%; object-fit: contain;">
                                    </div>
                                </div>
                            </div>

                            <!-- Right side - Certificate Information -->
                            <div class="col-lg-6">
                                <div class="certificate-info-container p-4">
                                    <div class="certificate-header mb-4">
                                        <h4 id="modalCertificateTitle" class="text-primary mb-2"></h4>
                                        <div id="modalCertificateStatus" class="mb-3"></div>
                                    </div>

                                    <div class="certificate-description mb-4">
                                        <h6 class="fw-bold mb-2">Description</h6>
                                        <p id="modalCertificateDescription" class="text-muted"></p>
                                    </div>

                                    <div class="certificate-details">
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Certificate
                                                    Number</label>
                                                <p id="modalCertificateNumber" class="mb-0 fw-semibold"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="detail-item">
                                                <label class="form-label fw-bold text-muted small">Issuing
                                                    Authority</label>
                                                <p id="modalIssuingAuthority" class="mb-0 fw-semibold"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <label class="form-label fw-bold text-muted small">Issue Date</label>
                                                    <p id="modalIssueDate" class="mb-0 fw-semibold"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <label class="form-label fw-bold text-muted small">Expiry Date</label>
                                                    <p id="modalExpiryDate" class="mb-0 fw-semibold"></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="expiry-status mt-3">
                                            <label class="form-label fw-bold text-muted small">Validity Status</label>
                                            <div id="modalExpiryStatus" class="mt-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .certificate-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            border: 1px solid #e9ecef;
            height: 100%;
        }

        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
            border-color: #0d6efd;
        }

        .certificate-card:hover .certificate-overlay {
            opacity: 1 !important;
        }

        .certificate-image {
            overflow: hidden;
            border-radius: 0.375rem;
            height: 100%;
        }

        .certificate-image img {
            transition: transform 0.3s ease;
            width: 100%;
            height: 100%;
            object-fit: scale-down;
        }

        .certificate-card:hover .certificate-image img {
            transform: scale(1.05);
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--primary-color);
        }

        .timeline-item {
            position: relative;
        }

        .timeline-marker {
            position: absolute;
            left: -22px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        .certificate-meta small {
            font-size: 0.85rem;
        }

        /* Modal specific styles */
        .modal-xl {
            max-width: 1200px;
        }

        .certificate-image-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-right: 1px solid #dee2e6;
            height: 100%;
            min-height: 500px;
        }

        .certificate-info-container {
            background: #ffffff;
            height: 100%;
            min-height: 500px;
            overflow-y: auto;
        }

        .certificate-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .certificate-image-wrapper img {
            transition: transform 0.3s ease;
            max-height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .certificate-image-wrapper:hover img {
            transform: scale(1.02);
        }

        .detail-item label {
            color: #6c757d;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .detail-item p {
            color: #212529;
            font-size: 1rem;
        }

        .certificate-header h4 {
            color: #0d6efd;
            font-weight: 600;
            line-height: 1.3;
        }

        .certificate-description h6 {
            color: #495057;
            font-weight: 600;
        }

        .certificate-description p {
            line-height: 1.6;
            color: #6c757d;
        }

        .expiry-status label {
            color: #6c757d;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .certificate-actions {
            background: #f8f9fa;
            margin: 0 -1.5rem -1.5rem -1.5rem;
            padding: 1rem 1.5rem;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .certificate-image-container {
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .certificate-info-container {
                padding-top: 1rem !important;
            }
        }

        @media (max-width: 575.98px) {
            .modal-xl {
                margin: 0.5rem;
                max-width: calc(100% - 1rem);
            }

            .certificate-image-container,
            .certificate-info-container {
                padding: 1rem !important;
            }
        }

        /* Loading animation */
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        /* Badge enhancements */
        .badge {
            font-size: 0.75rem;
            padding: 0.5em 0.75em;
            border-radius: 0.375rem;
        }

        /* Button enhancements */
        .btn-outline-primary:hover,
        .btn-outline-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-primary,
        .btn-outline-secondary {
            transition: all 0.2s ease;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function openCertificateModal(certificateId) {
            // Show loading state
            document.getElementById('loadingState').style.display = 'block';
            document.getElementById('certificateContent').style.display = 'none';

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('certificateModal'));
            modal.show();

            // Get certificate data from the clicked card
            const certificateCard = document.querySelector(`[onclick="openCertificateModal(${certificateId})"]`);
            const certificateImage = certificateCard.querySelector('img');
            const certificateTitle = certificateImage.alt;

            // Create certificate data object
            const certificateData = {
                id: certificateId,
                title: certificateTitle,
                description: 'This is a comprehensive description of the certificate that demonstrates our compliance with international standards and quality management systems.',
                image: certificateImage.src,
                certificate_number: 'CERT-' + String(certificateId).padStart(4, '0'),
                issuing_authority: 'China National Intellectual Property Administration',
                issue_date: '2024-01-15',
                expiry_date: '2027-01-15',
                status: true
            };

            // Load certificate data
            loadCertificateData(certificateData);
        }

        function loadCertificateData(certificateData) {
            // In a real application, you would make an AJAX call here
            // For now, we'll simulate the data loading

            // Hide loading state and show content
            document.getElementById('loadingState').style.display = 'none';
            document.getElementById('certificateContent').style.display = 'block';

            // Populate modal with certificate data
            populateModalData(certificateData);
        }

        function populateModalData(data) {
            // Set certificate image
            document.getElementById('modalCertificateImage').src = data.image;
            document.getElementById('modalCertificateImage').alt = data.title;

            // Set certificate title
            document.getElementById('modalCertificateTitle').textContent = data.title;

            // Set certificate status
            const statusHtml = data.status ?
                '<span class="badge bg-success">Active</span>' :
                '<span class="badge bg-secondary">Inactive</span>';
            document.getElementById('modalCertificateStatus').innerHTML = statusHtml;

            // Set description
            document.getElementById('modalCertificateDescription').textContent = data.description;

            // Set certificate details
            document.getElementById('modalCertificateNumber').textContent = data.certificate_number;
            document.getElementById('modalIssuingAuthority').textContent = data.issuing_authority;
            document.getElementById('modalIssueDate').textContent = formatDate(data.issue_date);
            document.getElementById('modalExpiryDate').textContent = data.expiry_date ? formatDate(data.expiry_date) :
                'No Expiry';

            // Set expiry status
            const expiryStatus = calculateExpiryStatus(data.expiry_date);
            document.getElementById('modalExpiryStatus').innerHTML = expiryStatus;
        }

        function formatDate(dateString) {
            if (!dateString) return 'N/A';

            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        function calculateExpiryStatus(expiryDate) {
            if (!expiryDate) {
                return '<span class="badge bg-info">No Expiry</span>';
            }

            const expiry = new Date(expiryDate);
            const now = new Date();
            const daysUntilExpiry = Math.ceil((expiry - now) / (1000 * 60 * 60 * 24));

            if (daysUntilExpiry < 0) {
                return '<span class="badge bg-danger">Expired</span>';
            } else if (daysUntilExpiry <= 30) {
                return '<span class="badge bg-warning">Expiring Soon</span>';
            } else {
                return '<span class="badge bg-success">Valid</span>';
            }
        }

        // Add hover effect for certificate cards
        document.addEventListener('DOMContentLoaded', function() {
            const certificateCards = document.querySelectorAll('.certificate-card');

            certificateCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Reset modal state when modal is hidden
            document.getElementById('certificateModal').addEventListener('hidden.bs.modal', function() {
                document.getElementById('loadingState').style.display = 'block';
                document.getElementById('certificateContent').style.display = 'none';
            });
        });
    </script>
@endpush
