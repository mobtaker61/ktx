<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerOpportunityController extends Controller
{
    public function index()
    {
        $careerOpportunities = CareerOpportunity::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.career-opportunities.index', compact('careerOpportunities'));
    }

    public function create()
    {
        return view('admin.career-opportunities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'gender' => 'required|in:male,female,both',
            'department' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
            'employment_type' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'expiry_date' => 'required|date|after:today',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        CareerOpportunity::create($request->all());

        return redirect()->route('admin.career-opportunities.index')
            ->with('success', 'Career opportunity created successfully.');
    }

    public function show(CareerOpportunity $careerOpportunity)
    {
        return view('admin.career-opportunities.show', compact('careerOpportunity'));
    }

    public function edit(CareerOpportunity $careerOpportunity)
    {
        return view('admin.career-opportunities.edit', compact('careerOpportunity'));
    }

    public function update(Request $request, CareerOpportunity $careerOpportunity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'gender' => 'required|in:male,female,both',
            'department' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
            'employment_type' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'expiry_date' => 'required|date',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $careerOpportunity->update($request->all());

        return redirect()->route('admin.career-opportunities.index')
            ->with('success', 'Career opportunity updated successfully.');
    }

    public function destroy(CareerOpportunity $careerOpportunity)
    {
        $careerOpportunity->delete();

        return redirect()->route('admin.career-opportunities.index')
            ->with('success', 'Career opportunity deleted successfully.');
    }

    public function toggleStatus(CareerOpportunity $careerOpportunity)
    {
        $careerOpportunity->update([
            'is_active' => !$careerOpportunity->is_active
        ]);

        $status = $careerOpportunity->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.career-opportunities.index')
            ->with('success', "Career opportunity {$status} successfully.");
    }
}
