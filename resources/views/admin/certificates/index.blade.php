@extends('layouts.admin')

@section('title', 'Manage Certificates')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Certificates</h1>
        <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Certificate
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Certificates</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="certificatesTable">
                    <thead>
                        <tr>
                            <th style="width: 50px;">Order</th>
                            <th style="width: 100px;">Image</th>
                            <th>Title</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="sortableCertificates">
                        @forelse($certificates as $certificate)
                        <tr data-id="{{ $certificate->id }}">
                            <td class="text-center">
                                <i class="fas fa-grip-vertical text-muted handle" style="cursor: move;"></i>
                                <span class="order-number ms-2">{{ $certificate->order }}</span>
                            </td>
                            <td>
                                @if($certificate->image)
                                    <img src="{{ asset('storage/' . $certificate->image) }}"
                                         alt="{{ $certificate->title }}"
                                         class="img-thumbnail"
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $certificate->title }}</strong>
                            </td>
                            <td>
                                @if($certificate->issue_date)
                                    {{ $certificate->issue_date->format('M d, Y') }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($certificate->expiry_date)
                                    <div class="d-flex align-items-center">
                                        {{ $certificate->expiry_date->format('M d, Y') }}
                                        {!! $certificate->expiry_badge !!}
                                    </div>
                                @else
                                    <span class="badge bg-info">No Expiry</span>
                                @endif
                            </td>
                            <td>
                                {!! $certificate->status_badge !!}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.certificates.show', $certificate) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.certificates.edit', $certificate) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.certificates.toggleStatus', $certificate) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-secondary" title="Toggle Status">
                                            <i class="fas fa-toggle-{{ $certificate->status ? 'on' : 'off' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.certificates.destroy', $certificate) }}"
                                          method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this certificate?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-certificate fa-3x mb-3"></i>
                                    <h5>No certificates found</h5>
                                    <p>Start by adding your first certificate.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.css">
<style>
    .handle {
        cursor: move;
        color: #6c757d;
    }

    .handle:hover {
        color: var(--primary-color);
    }

    .sortable-ghost {
        opacity: 0.5;
        background: #f8f9fa;
    }

    .sortable-chosen {
        background: #e3f2fd;
    }

    .order-number {
        font-weight: bold;
        color: var(--primary-color);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize sortable
    const tbody = document.getElementById('sortableCertificates');
    if (tbody) {
        new Sortable(tbody, {
            handle: '.handle',
            animation: 150,
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            onEnd: function(evt) {
                updateOrder();
            }
        });
    }

    function updateOrder() {
        const rows = document.querySelectorAll('#sortableCertificates tr[data-id]');
        const certificates = [];

        rows.forEach((row, index) => {
            const id = row.getAttribute('data-id');
            const orderNumber = row.querySelector('.order-number');
            if (orderNumber) {
                orderNumber.textContent = index + 1;
            }

            certificates.push({
                id: id,
                order: index + 1
            });
        });

        // Send update to server
        fetch('{{ route("admin.certificates.reorder") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ certificates: certificates })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                const alert = document.createElement('div');
                alert.className = 'alert alert-success alert-dismissible fade show position-fixed';
                alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                alert.innerHTML = `
                    <i class="fas fa-check-circle me-2"></i>Order updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                document.body.appendChild(alert);

                // Auto remove after 3 seconds
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.parentNode.removeChild(alert);
                    }
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Error updating order:', error);
        });
    }

    // Delete confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete this certificate? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endpush
