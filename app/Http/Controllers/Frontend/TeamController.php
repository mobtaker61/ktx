<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\CareerOpportunity;
use App\Models\Country;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::active()->ordered()->get()->groupBy('level');
        $careerOpportunities = CareerOpportunity::active()->orderBy('created_at', 'desc')->get();
        $countries = Country::active()->orderBy('name')->get();

        return view('pages.team', compact('team', 'careerOpportunities', 'countries'));
    }
}
