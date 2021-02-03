<?php

namespace App\Http\Controllers;

use App\Models\SchoolYearConfig;
use App\Models\Update;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events()
    {
        $config = SchoolYearConfig::where('is_active', 1)->first();

        $events = Update::where('school_year', $config->school_year)->get();
        return view('welcome')->with('events', $events);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function terms()
    {
        return view('terms');
    }
}
