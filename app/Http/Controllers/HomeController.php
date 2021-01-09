<?php

namespace App\Http\Controllers;

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
        $users = User::whereNotIn('name', ['Administrator', 'Principal'])->orderBy('created_at', 'desc')->get();
        $events = Update::all();
        // dd($users->toArray());
        return view('admin')
            ->with('users', $users)
            ->with('events', $events);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
