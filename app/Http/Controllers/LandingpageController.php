<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebColours;

class LandingpageController extends Controller
{

    public function LandingPage()
    {
        $colours = WebColours::all();

        return view('landingpage.index', compact('colours'));
    }
}
