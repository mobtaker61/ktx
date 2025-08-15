<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::ordered()->paginate(10);
        return view('admin.portfolio-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.portfolio-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_categories',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['color'] = $request->color ?: '#0d6efd';

        PortfolioCategory::create($data);

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Portfolio category created successfully.');
    }

    public function show(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->load('portfolios');
        return view('admin.portfolio-categories.show', compact('portfolioCategory'));
    }

    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-categories.edit', compact('portfolioCategory'));
    }

    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_categories,slug,' . $portfolioCategory->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['color'] = $request->color ?: '#0d6efd';

        $portfolioCategory->update($data);

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Portfolio category updated successfully.');
    }

    public function destroy(PortfolioCategory $portfolioCategory)
    {
        if ($portfolioCategory->portfolios()->count() > 0) {
            return redirect()->route('admin.portfolio-categories.index')->with('error', 'Cannot delete category with portfolios.');
        }

        $portfolioCategory->delete();
        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Portfolio category deleted successfully.');
    }

    /**
     * Toggle status
     */
    public function toggleStatus(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->update(['status' => $portfolioCategory->status === 'active' ? 'inactive' : 'active']);

        $status = $portfolioCategory->status === 'active' ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Portfolio category {$status} successfully.");
    }

    /**
     * Update order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'categories' => 'required|array',
            'categories.*.id' => 'required|exists:portfolio_categories,id',
            'categories.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->categories as $item) {
            PortfolioCategory::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
