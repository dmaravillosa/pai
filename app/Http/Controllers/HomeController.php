<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\SchoolYearConfig;
use App\Models\Update;
use App\Models\Grade;
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
            $users = User::where('role', '!=', 'Administrator')->orderBy('created_at', 'desc')->onlyTrashed()->get();
        }
        else
        {
            $users = User::where('role', '!=', 'Administrator')->orderBy('created_at', 'desc')->get();
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

        if(auth()->user()->role == 'Administrator' || auth()->user()->role == 'Principal')
        {
            if($request->archived)
            {
                $classrooms = Classroom::with(['students', 'user'])->where('school_year', $config->school_year)->onlyTrashed()->get();
            }
            else
            {
                $classrooms = Classroom::with(['students', 'user'])->where('school_year', $config->school_year)->get();
            }
        }
        else
        {
            if($request->archived)
            {
                $classrooms = Classroom::with(['students', 'user'])->where('school_year', $config->school_year)->where('user_id', auth()->user()->id)->onlyTrashed()->get();
            }
            else
            {
                $classrooms = Classroom::with(['students', 'user'])->where('school_year', $config->school_year)->where('user_id', auth()->user()->id)->get();
            }
        }

        foreach($classrooms as $classroom)
        {
            if($classroom){
                if($classroom->students()->first()){
                    $classroom->last_update = Grade::whereIn('student_id', $classroom->students()->pluck('id'))->orderBy('updated_at', 'desc')->first()->updated_at;
                }
                else
                {
                    $classroom->last_update = $classroom->updated_at;
                }
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
        $config = SchoolYearConfig::where('is_active', 1)->first();
        if(auth()->user()->role == 'Administrator' || auth()->user()->role == 'Principal')
        {
            $classrooms = Classroom::with('students')->where('school_year', $config->school_year)->get();
        }
        else
        {
            $classrooms = Classroom::with('students')->where('school_year', $config->school_year)->where('user_id', auth()->user()->id)->get();
        }

        foreach($classrooms as $classroom)
        {
            if($classroom){
                if($classroom->students()->first()){
                    $classroom->last_update = Grade::whereIn('student_id', $classroom->students()->pluck('id'))->orderBy('updated_at', 'desc')->first()->updated_at;
                }
                else
                {
                    $classroom->last_update = $classroom->updated_at;
                }
            }
        }
        
            
        return view('home')
            ->with('classrooms', $classrooms)
            ->with('school_year', $config->school_year)
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
        if(isset($request->approved))
        {
            return view('confirm')
                ->with('endpoint', $request->endpoint)
                ->with('message', 'Are you sure you want to ' . (!$request->approved ? 'approve' : 'disable') . ' this classroom?');
        }
        
        return view('confirm')
            ->with('endpoint', $request->endpoint)
            ->with('message', 'Are you sure you want to ' . (!$request->archived ? 'archive' : 'restore') . ' this record?');
    }
}
