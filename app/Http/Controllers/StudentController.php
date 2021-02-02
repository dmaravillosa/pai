<?php

namespace App\Http\Controllers;

use App\Models\SchoolYearConfig;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $students = Student::where('classroom_id', $id)->get();

        return view('student.view')
            ->with('students', $students);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $config = SchoolYearConfig::where('is_active', 1)->first();
        $students = Student::with('classroom')->get();
        foreach($students as $key => $student)
        {
            if($student->classroom->school_year != $config->school_year)
            {
                $students->forget($key);
            }
        }
        
        $students = $students->filter(function ($item) use ($request) 
        {
             return strtolower(preg_replace("/[\W\d_]/i", '', $item->name)) == strtolower(preg_replace("/[\W\d_]/i", '', $request->filter));
        });

        return view('student.view')
            ->with('students', $students);
    }

    public function lock($id, $unlock = 0)
    {
        if(auth()->user() != null){
            if((auth()->user()->role != 'Administrator' && auth()->user()->role != 'Principal'))
            {
                return redirect('/grades/view/' . $id);
            }
        }

        return view('student.lock')
            ->with('student_id', $id)
            ->with('unlock', $unlock);
        
    }


    public function unlock(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();


        if(Hash::check($request->password, $student->password, []))
        {
            return redirect('/grades/view/' . $id);
        }
        
        return view('status')->with('message', 'Incorrect Password!');
    }

    public function remark(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        $student->remarks = $request->remarks;
        $student->save();

        return redirect('/grades/view/' . $id);
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, $id)
    {
        if($request->password == $request->password_confirmation){
            $student = Student::where('id', $id)->first();
            $student->password = bcrypt($request->password);
            $student->save();

            return view('status')->with('message', 'Password successfully created');
        }
        
        return view('status')->with('message', 'Password does not match');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
