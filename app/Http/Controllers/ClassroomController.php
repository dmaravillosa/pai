<?php

namespace App\Http\Controllers;

use App\Imports\ClassroomImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
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

    public function view()
    {
        return view('classroom.view');
    }

    public function import(Request $request)
    {
        $collection = Excel::toArray(new ClassroomImport,  $request->file('excel'));
        dd($collection);
        // Excel::import(new ClassroomImport, $request()->file());
    }

   
}
