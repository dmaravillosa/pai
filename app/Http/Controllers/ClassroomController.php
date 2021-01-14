<?php

namespace App\Http\Controllers;

use App\Imports\ClassroomImport;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Student;
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

    public function delete($id)
    {
        $classroom = Classroom::where('id', $id)->first();
        $classroom->delete();

        return view('status')->with('message', 'Classroom successfully deleted.');
    }

    public function import(Request $request)
    {
        $collection = Excel::toArray(new ClassroomImport,  $request->file('excel'));

        $grade_section = explode("-", str_replace(' ', '', $collection[5][7]["10"]));

        //create classroom
        $classroom = Classroom::firstOrCreate([
            'level' => $grade_section[0],
            'name' => $grade_section[1],
            'school_year' => $collection[5][7]["22"],
            'user_id' => auth()->user()->id
        ]);

        for($x = 0; $x < count($collection[5]); ++$x){
            if($x >= 12) //if row is on students data
            {
                if(!isset($collection[5][$x][1]) || !$collection[5][$x][1] || $collection[5][$x][1] == 'FEMALE '){
                    break;
                }
                else
                {
                    $student = Student::firstOrCreate([
                        'name' => $collection[5][$x][1],
                        'classroom_id' => $classroom->id
                    ]);

                    //first quarter
                    $first_quarter = Grade::firstOrNew([
                        'student_id' => $student->id,
                        'quarter' => $collection[5][10][5],
                        'subject' => $collection[5][8][22],
                        'school_year' => $collection[5][7][22]
                    ]);
                    $first_quarter->student_id = $student->id;
                    $first_quarter->quarter = $collection[5][10][5];
                    $first_quarter->subject = $collection[5][8][22];
                    $first_quarter->school_year = $collection[5][7][22];
                    $first_quarter->grade = $collection[5][$x][5];
                    $first_quarter->save();    

                    //second quarter
                    $second_quarter = Grade::firstOrNew([
                        'student_id' => $student->id,
                        'quarter' => $collection[5][10][9],
                        'subject' => $collection[5][8][22],
                        'school_year' => $collection[5][7][22]
                    ]);
                    $second_quarter->student_id = $student->id;
                    $second_quarter->quarter = $collection[5][10][9];
                    $second_quarter->subject = $collection[5][8][22];
                    $second_quarter->school_year = $collection[5][7][22];
                    $second_quarter->grade = $collection[5][$x][9];
                    $second_quarter->save();   

                    //third quarter
                    $third_quarter = Grade::firstOrNew([
                        'student_id' => $student->id,
                        'quarter' => $collection[5][10][13],
                        'subject' => $collection[5][8][22],
                        'school_year' => $collection[5][7][22]
                    ]);
                    $third_quarter->student_id = $student->id;
                    $third_quarter->quarter = $collection[5][10][13];
                    $third_quarter->subject = $collection[5][8][22];
                    $third_quarter->school_year = $collection[5][7][22];
                    $third_quarter->grade = $collection[5][$x][13];
                    $third_quarter->save();   


                    //fourth quarter
                    $fourth_quarter = Grade::firstOrNew([
                        'student_id' => $student->id,
                        'quarter' => $collection[5][10][17],
                        'subject' => $collection[5][8][22],
                        'school_year' => $collection[5][7][22]
                    ]);
                    $fourth_quarter->student_id = $student->id;
                    $fourth_quarter->quarter = $collection[5][10][17];
                    $fourth_quarter->subject = $collection[5][8][22];
                    $fourth_quarter->school_year = $collection[5][7][22];
                    $fourth_quarter->grade = $collection[5][$x][17];
                    $fourth_quarter->save();  
                    
                    //final grade
                    $final_grade = Grade::firstOrNew([
                        'student_id' => $student->id,
                        'quarter' => $collection[5][10][21],
                        'subject' => $collection[5][8][22],
                        'school_year' => $collection[5][7][22]
                    ]);
                    $final_grade->student_id = $student->id;
                    $final_grade->quarter = $collection[5][10][21];
                    $final_grade->subject = $collection[5][8][22];
                    $final_grade->school_year = $collection[5][7][22];
                    $final_grade->grade = $collection[5][$x][21];
                    $final_grade->save();  
                }

            } 
        }

        return view('status')->with('message', 'Excel grade upload successful!');

        // for viewing excel return
        // $new = array();
        // foreach($collection[5] as $grades)
        // {
        //     array_push($new, array_filter($grades));
        // }
        // return $new;
    }

   
}
