<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()
            ->parentOnly()
            ->withProductCount()
            ->orderBy('order')
            ->take(6)
            ->get();

        $latestNews = News::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.home', compact('categories', 'latestNews'));
    }
}
