<div class="row g-4">
    @foreach($products as $product)
    <div class="col-lg-4 col-md-6">
        <div class="product-card h-100" onclick="window.location.href='{{ route('product.detail', $product->slug) }}'">
            <div class="product-image-wrapper">
                <img src="{{ asset($product->image ?: 'img/service-1.jpg') }}" alt="{{ $product->name }}" class="product-image">
            </div>
            <div class="product-content">
                <h5 class="product-title">{{ $product->name }}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($products->hasPages())
<div class="mt-5">
    {{ $products->links() }}
</div>
@endif
