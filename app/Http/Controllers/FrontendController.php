<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FrontendController extends Controller
{
    public function activities(): View
    {
        return view('activities');
    }

    public function participants(): View
    {
        return view('participants');
    }

    public function activityTypes(): View
    {
        return view('activity-types');
    }
}
