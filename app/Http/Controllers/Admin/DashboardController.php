<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'categories' => Category::count(),
            'services' => Service::count(),
            'portfolios' => Portfolio::count(),
            'team' => Team::count(),
            'contacts' => Contact::count(),
            'new_contacts' => Contact::where('status', 'new')->count(),
        ];

        $recent_contacts = Contact::latest()->take(5)->get();
        $recent_products = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_products'));
    }
}
