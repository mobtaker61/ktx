@if($products->count() > 0)
<div class="row g-4">
    @foreach($products as $product)
    <div class="col-lg-4 col-md-6">
        <div class="product-card h-100" onclick="window.location.href='{{ route('product.detail', $product->slug) }}'">
            <div class="product-image-wrapper">
                <img src="{{ asset($product->image ?: 'img/service-1.jpg') }}" alt="{{ $product->name }}" class="product-image">
                <div class="product-overlay">
                    <div class="product-overlay-content">
                        <i class="fas fa-eye fa-2x text-white"></i>
                        <p class="text-white mt-2 mb-0">View Details</p>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h5 class="product-title">{{ $product->name }}</h5>
                @if($product->category)
                <div class="product-category-badge">
                    <span class="badge bg-light text-primary border border-primary">
                        <i class="fas fa-tag me-1"></i>
                        {{ $product->category->name }}
                    </span>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($products->hasPages())
<div class="mt-5">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endif
@else
<div class="text-center py-5">
    <div class="empty-state-icon mb-3">
        <i class="fas fa-box-open fa-4x text-muted"></i>
    </div>
    <h4 class="text-muted">No Products Found</h4>
    <p class="text-muted">No products available in this category at the moment.</p>
    <button onclick="clearCategoryFilter()" class="btn btn-primary">
        <i class="fas fa-arrow-left me-1"></i>
        View All Products
    </button>
</div>
@endif
