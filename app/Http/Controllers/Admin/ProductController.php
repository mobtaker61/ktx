<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'specifications' => 'nullable|array',
            'features' => 'nullable|array',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_url' => 'nullable|url|max:500',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['featured'] = $request->has('featured');

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];

            // Add new uploaded images
            foreach ($request->file('gallery') as $galleryImage) {
                if ($galleryImage->isValid()) {
                    $galleryPath = $galleryImage->store('products/gallery', 'public');
                    $galleryPaths[] = 'storage/' . $galleryPath;
                }
            }

            if (!empty($galleryPaths)) {
                $data['gallery'] = $galleryPaths;
            }
        }

        // Handle specifications and features as JSON
        if ($request->has('specifications')) {
            $specs = [];
            foreach ($request->specifications as $spec) {
                if (!empty($spec['key']) && !empty($spec['value'])) {
                    $specs[$spec['key']] = $spec['value'];
                }
            }
            $data['specifications'] = $specs;
        }

        if ($request->has('features')) {
            $features = [];
            foreach ($request->features as $feature) {
                if (!empty($feature)) {
                    $features[] = $feature;
                }
            }
            $data['features'] = $features;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'specifications' => 'nullable|array',
            'features' => 'nullable|array',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_url' => 'nullable|url|max:500',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['featured'] = $request->has('featured');

        // Handle main image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];

            // Keep existing gallery images
            if ($product->gallery && is_array($product->gallery)) {
                $galleryPaths = $product->gallery;
            }

            // Add new uploaded images
            foreach ($request->file('gallery') as $galleryImage) {
                if ($galleryImage->isValid()) {
                    $galleryPath = $galleryImage->store('products/gallery', 'public');
                    $galleryPaths[] = 'storage/' . $galleryPath;
                }
            }

            if (!empty($galleryPaths)) {
                $data['gallery'] = $galleryPaths;
            }
        }

        // Handle specifications and features as JSON
        if ($request->has('specifications')) {
            $specs = [];
            foreach ($request->specifications as $spec) {
                if (!empty($spec['key']) && !empty($spec['value'])) {
                    $specs[$spec['key']] = $spec['value'];
                }
            }
            $data['specifications'] = $specs;
        }

        if ($request->has('features')) {
            $features = [];
            foreach ($request->features as $feature) {
                if (!empty($feature)) {
                    $features[] = $feature;
                }
            }
            $data['features'] = $features;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function removeGalleryImage(Request $request, Product $product)
    {
        $request->validate([
            'image_path' => 'required|string'
        ]);

        $imagePath = $request->input('image_path');

        // Check if image exists in gallery
        if ($product->gallery && in_array($imagePath, $product->gallery)) {
            // Remove image from gallery array
            $gallery = $product->gallery;
            $key = array_search($imagePath, $gallery);
            if ($key !== false) {
                unset($gallery[$key]);
                $gallery = array_values($gallery); // Re-index array

                // Update product
                $product->update(['gallery' => $gallery]);

                // Delete physical file
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }

                return response()->json(['success' => true, 'message' => 'Image removed successfully']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Image not found in gallery'], 404);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
