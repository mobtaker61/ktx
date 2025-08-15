@extends('layouts.app')

@section('title', 'Our Products - KTX')

@section('hero_title', 'Our Products')

@section('hero_breadcrumb')
<li class="breadcrumb-item text-white active" aria-current="page">Our Products</li>
@endsection

@section('hero_image', asset('img/base/ktx_engine.png'))

@section('content')
<!-- Categories Filter -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h4 class="mb-4">Categories</h4>
                <div class="list-group">
                    <a href="#" data-category="" class="list-group-item list-group-item-action category-filter active">
                        <i class="fas fa-th-large me-2"></i>All Products
                    </a>
                    @foreach($categories as $category)
                        @if($category->children->count() > 0)
                            <div class="category-item">
                                <div class="list-group-item list-group-item-action category-filter parent-category">
                                    <span class="category-name" data-category="{{ $category->id }}">
                                        <i class="fas fa-folder me-2"></i>{{ $category->name }}
                                    </span>
                                    <i class="fas fa-chevron-down ms-auto toggle-icon" style="cursor: pointer;"></i>
                                </div>
                                <div class="subcategories" style="display: none;">
                                    @foreach($category->children as $subcategory)
                                        <a href="#" data-category="{{ $subcategory->id }}" class="list-group-item list-group-item-action category-filter subcategory">
                                            <i class="fas fa-chevron-right me-2"></i>{{ $subcategory->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="#" data-category="{{ $category->id }}" class="list-group-item list-group-item-action category-filter">
                                <i class="fas fa-tag me-2"></i>{{ $category->name }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-lg-9">
                <div id="products-container">
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
                </div>

                <!-- Loading spinner -->
                <div id="loading" class="text-center py-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.product-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    border: 1px solid #e9ecef;
    cursor: pointer;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.product-image-wrapper {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.product-content {
    padding: 1.25rem;
}

.product-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
    color: #2c3e50;
    line-height: 1.3;
}

.product-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0;
    color: #2c3e50;
    line-height: 1.3;
    text-align: center;
}

/* Category sidebar styles */

.parent-category {
    position: relative;
    font-weight: 500;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.category-name {
    cursor: pointer;
    flex: 1;
}

.toggle-icon {
    transition: transform 0.3s ease;
    font-size: 0.8rem;
    flex-shrink: 0;
}

.parent-category.expanded .toggle-icon {
    transform: rotate(180deg);
}

.subcategories {
    margin-left: 0;
    border-left: 3px solid #e9ecef;
}

.subcategory {
    margin-left: 0;
    border-left: none;
    font-size: 0.9rem;
    padding-left: 1.5rem;
    border-radius: 0;
    border-top: none;
    border-bottom: 1px solid #e9ecef;
}

.subcategory:last-child {
    border-bottom: none;
}

.subcategory:hover {
    background-color: #f8f9fa;
    border-left-color: #007bff;
}

.subcategory i {
    font-size: 0.8rem;
    color: #6c757d;
}

.category-filter i:first-child {
    width: 16px;
    text-align: center;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .col-lg-4 {
        margin-bottom: 1rem;
    }

    .product-image-wrapper {
        height: 180px;
    }

    .product-content {
        padding: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const productsContainer = document.getElementById('products-container');
    const loading = document.getElementById('loading');

    // Handle category filter clicks
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all filters
            categoryFilters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');

            const categoryId = this.getAttribute('data-category');
            loadProducts(categoryId);
        });
    });

    // Handle parent category name clicks for filtering
    document.querySelectorAll('.category-name').forEach(categoryName => {
        categoryName.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all filters
            categoryFilters.forEach(f => f.classList.remove('active'));
            // Add active class to parent category
            this.closest('.parent-category').classList.add('active');

            const categoryId = this.getAttribute('data-category');
            loadProducts(categoryId);
        });
    });

    // Handle toggle icon clicks for expanding/collapsing subcategories
    document.querySelectorAll('.toggle-icon').forEach(toggleIcon => {
        toggleIcon.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const categoryItem = this.closest('.category-item');
            const parentCategory = this.closest('.parent-category');
            const subcategories = categoryItem.querySelector('.subcategories');
            const isExpanded = parentCategory.classList.contains('expanded');

            if (isExpanded) {
                parentCategory.classList.remove('expanded');
                subcategories.style.display = 'none';
            } else {
                parentCategory.classList.add('expanded');
                subcategories.style.display = 'block';
            }
        });
    });

    function loadProducts(categoryId) {
        loading.style.display = 'block';
        productsContainer.style.display = 'none';

        // Create form data
        const formData = new FormData();
        formData.append('category', categoryId);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ route("products.ajax") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            productsContainer.innerHTML = data.html;
            productsContainer.style.display = 'block';
            loading.style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
            loading.style.display = 'none';
            productsContainer.style.display = 'block';
        });
    }
});
</script>
@endsection
