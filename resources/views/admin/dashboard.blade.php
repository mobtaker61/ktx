@extends('layouts.admin')

@section('title', 'Dashboard - KTX Admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Stats Cards -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-primary me-3">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['products'] }}</h3>
                    <p class="text-muted mb-0">Products</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-success me-3">
                    <i class="fas fa-cogs"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['services'] }}</h3>
                    <p class="text-muted mb-0">Services</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-warning me-3">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['portfolios'] }}</h3>
                    <p class="text-muted mb-0">Portfolio</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-info me-3">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['new_contacts'] }}</h3>
                    <p class="text-muted mb-0">New Messages</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Contacts -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Contact Messages</h5>
            </div>
            <div class="card-body">
                @if($recent_contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary btn-sm">View All</a>
                    </div>
                @else
                    <p class="text-muted text-center">No recent contact messages.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Products</h5>
            </div>
            <div class="card-body">
                @if($recent_products->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($product->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $product->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm">View All</a>
                    </div>
                @else
                    <p class="text-muted text-center">No recent products.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Quick Actions -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>Add Product
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.services.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-plus me-2"></i>Add Service
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-warning w-100">
                            <i class="fas fa-plus me-2"></i>Add Portfolio
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.team.create') }}" class="btn btn-info w-100">
                            <i class="fas fa-plus me-2"></i>Add Team Member
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
