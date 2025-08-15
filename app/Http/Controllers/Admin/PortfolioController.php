<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = PortfolioCategory::active()->ordered()->get();
        return view('admin.portfolios.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios',
            'description' => 'required|string',
            'client' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:portfolio_categories,id',
            'completion_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['featured'] = $request->has('featured');

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
            $data['image'] = $imagePath;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                $galleryPaths[] = $image->store('portfolios/gallery', 'public');
            }
            $data['gallery'] = $galleryPaths;
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio item created successfully.');
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('category');
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = PortfolioCategory::active()->ordered()->get();
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug,' . $portfolio->id,
            'description' => 'required|string',
            'client' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:portfolio_categories,id',
            'completion_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['featured'] = $request->has('featured');

        // Handle main image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $imagePath = $request->file('image')->store('portfolios', 'public');
            $data['image'] = $imagePath;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            // Delete old gallery images if exist
            if ($portfolio->gallery) {
                foreach ($portfolio->gallery as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                $galleryPaths[] = $image->store('portfolios/gallery', 'public');
            }
            $data['gallery'] = $galleryPaths;
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Delete associated images
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        if ($portfolio->gallery) {
            foreach ($portfolio->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio item deleted successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Portfolio $portfolio)
    {
        $portfolio->update(['featured' => !$portfolio->featured]);

        $status = $portfolio->featured ? 'featured' : 'unfeatured';
        return redirect()->back()->with('success', "Portfolio {$status} successfully.");
    }

    /**
     * Update order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'portfolios' => 'required|array',
            'portfolios.*.id' => 'required|exists:portfolios,id',
            'portfolios.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->portfolios as $item) {
            Portfolio::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
