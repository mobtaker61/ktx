<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $team = Team::active()->ordered()->get()->groupBy('level');

        return view('pages.about', compact('team'));
    }
}
