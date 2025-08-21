<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Load categories with their children (subcategories)
        $categories = Category::active()
            ->whereNull('parent_id') // Only parent categories
            ->with(['children' => function ($query) {
                $query->active()->orderBy('order', 'asc');
            }])
            ->orderBy('order', 'asc')
            ->get();

        $selectedCategory = null;
        $products = null;

        if ($request->category) {
            // Try to find category by slug first, then by ID
            $selectedCategory = Category::where('slug', $request->category)
                ->orWhere('id', $request->category)
                ->with(['children' => function ($query) {
                    $query->active()->orderBy('order', 'asc');
                }])
                ->withCount('products')
                ->first();

            if ($selectedCategory) {
                if ($selectedCategory->children->count() > 0) {
                    // If it's a parent category, get products from parent and all children
                    $categoryIds = $selectedCategory->children->pluck('id')->push($selectedCategory->id);
                    $products = Product::active()
                        ->whereIn('category_id', $categoryIds)
                        ->with('category')
                        ->paginate(12);
                } else {
                    // If it's a subcategory or has no children, get products from that category only
                    $products = Product::active()
                        ->where('category_id', $selectedCategory->id)
                        ->with('category')
                        ->paginate(12);
                }
            } else {
                // Category not found, show all products
                $products = Product::active()->with('category')->paginate(12);
            }
        } else {
            $products = Product::active()->with('category')->paginate(12);
        }

        return view('pages.products', compact('products', 'categories', 'selectedCategory'));
    }

    public function ajaxFilter(Request $request)
    {
        $categoryId = $request->category;

        if ($categoryId) {
            $category = Category::find($categoryId);

            if ($category && $category->children->count() > 0) {
                // If it's a parent category, get products from parent and all children
                $categoryIds = $category->children->pluck('id')->push($category->id);
                $products = Product::active()
                    ->whereIn('category_id', $categoryIds)
                    ->with('category')
                    ->paginate(12);
            } else {
                // If it's a subcategory or has no children, get products from that category only
                $products = Product::active()
                    ->where('category_id', $categoryId)
                    ->with('category')
                    ->paginate(12);
            }
        } else {
            $products = Product::active()->with('category')->paginate(12);
        }

        $view = view('pages.partials.products-list', compact('products'))->render();

        return response()->json([
            'html' => $view,
            'category' => $categoryId ? Category::with(['children' => function ($query) {
                $query->active()->orderBy('order', 'asc');
            }])->withCount('products')->find($categoryId) : null,
        ]);
    }

    public function show($slug)
    {
        $product = Product::active()->where('slug', $slug)->with('category')->firstOrFail();
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('category')
            ->limit(4)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }
}
