<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        // Get all active portfolios
        $portfolios = Portfolio::with('category')->active()->latest()->paginate(12);

        // Get all active portfolio categories
        $categories = PortfolioCategory::active()->ordered()->get();

        // Filter by category if requested
        if ($request->category && $request->category !== 'all') {
            $portfolios = Portfolio::with('category')
                                 ->active()
                                 ->whereHas('category', function($query) use ($request) {
                                     $query->where('slug', $request->category);
                                 })
                                 ->latest()
                                 ->paginate(12);
        }

        return view('pages.portfolio', compact('portfolios', 'categories'));
    }

    public function show($slug)
    {
        $portfolio = Portfolio::with('category')->active()->where('slug', $slug)->firstOrFail();
        $relatedPortfolios = Portfolio::with('category')
                                    ->active()
                                    ->where('category_id', $portfolio->category_id)
                                    ->where('id', '!=', $portfolio->id)
                                    ->limit(4)
                                    ->get();

        return view('pages.portfolio-detail', compact('portfolio', 'relatedPortfolios'));
    }

    /**
     * Get portfolio gallery images
     */
        public function getGallery($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $gallery = [];
        if ($portfolio->image) {
            $gallery[] = asset('storage/' . $portfolio->image);
        }

        if ($portfolio->gallery && is_array($portfolio->gallery)) {
            foreach ($portfolio->gallery as $image) {
                $gallery[] = asset('storage/' . $image);
            }
        }

        return response()->json([
            'success' => true,
            'gallery' => $gallery
        ]);
    }

    public function getDetails($id)
    {
        $portfolio = Portfolio::with('category')->findOrFail($id);

        $gallery = [];
        if ($portfolio->image) {
            $gallery[] = asset('storage/' . $portfolio->image);
        }

        if ($portfolio->gallery && is_array($portfolio->gallery)) {
            foreach ($portfolio->gallery as $image) {
                $gallery[] = asset('storage/' . $image);
            }
        }

        return response()->json([
            'success' => true,
            'portfolio' => [
                'id' => $portfolio->id,
                'title' => $portfolio->title,
                'description' => $portfolio->description,
                'client' => $portfolio->client,
                'location' => $portfolio->location,
                'completion_date' => $portfolio->completion_date,
                'status' => $portfolio->status ?? 'Completed',
                'featured' => $portfolio->featured,
                'category' => $portfolio->category ? $portfolio->category->name : 'Uncategorized'
            ],
            'gallery' => $gallery
        ]);
    }
}
