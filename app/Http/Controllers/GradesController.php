<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\SchoolYearConfig;
use App\Models\Student;
use App\Models\User;
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
        $student = Student::with(['grades', 'classroom', 'core_values', 'attendance'])->where('id', $id)->first();
        if(auth()->user() == null)
        {
            $student->seen = 1;
            $student->save();
        }
        
        $teacher = User::where('id', $student->classroom()->first()->user_id)->first()->name;

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

        $core_values = [];
        foreach($student->core_values as $core_value)
        {
            $core_values[$core_value->core_value . $core_value->type . $core_value->quarter] = $core_value->score;
        }

        $attendances = [];
        foreach($student->attendance as $attendance)
        {
            $attendances[$attendance->month . '-' . $attendance->type] = $attendance->score;
        }

        $attendances['days_total'] = $student->attendance->where('type', 'days')->sum('score');
        $attendances['present_total'] = $student->attendance->where('type', 'present')->sum('score');
        $attendances['absent_total'] = $student->attendance->where('type', 'absent')->sum('score');


        return view('grades.view')
            ->with('teacher', $teacher)
            ->with('student', $student)
            ->with('grades', $grades)
            ->with('core_values', $core_values)
            ->with('attendances', $attendances)
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
