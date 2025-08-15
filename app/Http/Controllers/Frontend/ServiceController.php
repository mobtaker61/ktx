<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('order')->get();
        return view('pages.services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::active()->where('slug', $slug)->firstOrFail();
        $otherServices = Service::active()
                               ->where('id', '!=', $service->id)
                               ->limit(3)
                               ->get();

        return view('pages.service-detail', compact('service', 'otherServices'));
    }
}
