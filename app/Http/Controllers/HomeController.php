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
    public function admin()
    {
        $users = User::whereNotIn('id', ['1', '2'])->orderBy('created_at', 'desc')->get();
        $events = Update::all();
        $config = SchoolYearConfig::first();

        // dd($users->toArray());
        return view('admin')
            ->with('users', $users)
            ->with('events', $events)
            ->with('config', $config);
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
}
