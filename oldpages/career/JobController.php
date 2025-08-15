<?php

namespace App\Http\Controllers;

use App\Models\CareerOpportunity;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $careerOpportunities = CareerOpportunity::where('is_active', true)
            ->where('expiry_date', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();

        $countries = \App\Models\Country::active()->orderBy('name')->get();

        return view('career-opportunities', compact('careerOpportunities', 'countries'));
    }

    public function show($id)
    {
        $job = CareerOpportunity::findOrFail($id);
        return response()->json($job);
    }

    public function list()
    {
        $jobs = CareerOpportunity::active()->orderBy('created_at', 'desc')->get();
        return response()->json($jobs);
    }
}
