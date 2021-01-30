<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\SchoolYearConfig;
use App\Models\Update;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin(Request $request)
    {
        if($request->archived)
        {
            $users = User::whereNotIn('id', ['1', '2'])->orderBy('created_at', 'desc')->onlyTrashed()->get();
        }
        else
        {
            $users = User::whereNotIn('id', ['1', '2'])->orderBy('created_at', 'desc')->get();
        }
        
        $config = SchoolYearConfig::where('is_active', 1)->first();
        $school_years = SchoolYearConfig::all();

        // dd($users->toArray());
        return view('admin')
            ->with('users', $users)
            ->with('config', $config)
            ->with('school_years', $school_years)
            ->with('archived', $request->archived);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function announcement(Request $request)
    {
        $config = SchoolYearConfig::where('is_active', 1)->first();
        $school_years = SchoolYearConfig::all();

        if($request->archived)
        {
            $events = Update::where('school_year', $config->school_year)->onlyTrashed()->get();
        }
        else
        {
            $events = Update::where('school_year', $config->school_year)->get();
        }
        

        // dd($users->toArray());
        return view('announcement')
            ->with('events', $events)
            ->with('config', $config)
            ->with('school_years', $school_years)
            ->with('archived', $request->archived);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function classess(Request $request)
    {
        $config = SchoolYearConfig::where('is_active', 1)->first();
        $school_years = SchoolYearConfig::all();

        if(auth()->user()->id == 1 || auth()->user()->id == 2)
        {
            if($request->archived)
            {
                $classrooms = Classroom::with('students')->where('school_year', $config->school_year)->onlyTrashed()->get();
            }
            else
            {
                $classrooms = Classroom::with('students')->where('school_year', $config->school_year)->get();
            }
        }
        else
        {
            if($request->archived)
            {
                $classrooms = Classroom::with('students')->where('school_year', $config->school_year)->where('user_id', auth()->user()->id)->onlyTrashed()->get();
            }
            else
            {
                $classrooms = Classroom::with('students')->where('school_year', $config->school_year)->where('user_id', auth()->user()->id)->get();
            }
        }

        // dd($users->toArray());
        return view('classess')
            ->with('config', $config)
            ->with('classrooms', $classrooms)
            ->with('user_id', auth()->user()->id)
            ->with('school_years', $school_years)
            ->with('archived', $request->archived);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->id == 1 || auth()->user()->id == 2)
        {
            $classrooms = Classroom::with('students')->get();
        }
        else
        {
            $classrooms = Classroom::with('students')->where('user_id', auth()->user()->id)->get();
        }

        return view('home')
            ->with('classrooms', $classrooms)
            ->with('user_id', auth()->user()->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function status()
    {
        return view('status');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function confirm(Request $request)
    {
        return view('confirm')
            ->with('endpoint', $request->endpoint)
            ->with('message', 'Are you sure you want to ' . (!$request->archived ? 'archive' : 'restore') . ' this record?');
    }
}
