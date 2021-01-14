<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\SchoolYearConfig;
use App\Models\Student;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $student = Student::with('grades')->where('id', $id)->first();
        $config = SchoolYearConfig::first();

        $grades = [];
        foreach(config('constants.subjects') as $subject)
        {
            $grades[strtoupper($subject)] = [];
            foreach(config('constants.quarters') as $quarter)
            {
                $grades[strtoupper($subject)][$quarter] = '-';
            }
        }        

        foreach($student->grades as $grade)
        {
            if(isset($grade->grade))
            $grades[strtoupper($grade->subject)][$grade->quarter] = $grade->grade;
        }

        return view('grades.view')
            ->with('student', $student)
            ->with('grades', $grades)
            ->with('config', $config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function show(Grades $grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function edit(Grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grades $grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grades $grades)
    {
        //
    }
}
