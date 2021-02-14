<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;    
use App\Imports\CoreValueImport;

class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($student_id)
    {

        return view('corevalue.add')->with('student_id', $student_id);
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
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function show(CoreValue $coreValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function edit(CoreValue $coreValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoreValue $coreValue)
    {
        $core = substr($request->name, 0, -2);
        $type = substr($request->name, -2, 1);
        $quarter = substr($request->name, -1);


        $coreValue = CoreValue::where('student_id', $request->student_id)
                            ->where('core_value', $core)
                            ->where('type', $type)
                            ->where('quarter', $quarter)
                            ->first();

        if($coreValue)
        {
            $coreValue->score = $request->value;
            $coreValue->save();
        }
        else
        {
            $coreValue = CoreValue::create([
                'student_id' => $request->student_id,
                'core_value' => $core,
                'type' => $type,
                'score' => $request->value,
                'quarter' => $quarter
            ]);
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoreValue $coreValue)
    {
        //
    }

    public function import(Request $request)
    {
        $file = $request->file('excel');

        if($file->getMimeType() != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
        {
            return view('status')->with('message', 'Wrong grade sheet please check your excel.  File: (' . $file->getClientOriginalName() . ')'); 
        }
        
        $collection = Excel::toArray(new CoreValueImport,  $file);

        $corevalues = array_slice($collection[0], 2);

        for($index = 0; $index < count($corevalues); $index++)
        {
            // echo  $corevalues[$index][0] ? $corevalues[$index][0] : $corevalues[($index - 1)][0];
            for($quarter = 0; $quarter < 4; $quarter++){
                $coreValue = CoreValue::where('student_id', $request->student_id)
                                ->where('core_value', $corevalues[$index][0] ? strtolower($corevalues[$index][0]) : strtolower($corevalues[($index - 1)][0]))
                                ->where('type', $corevalues[$index][0] ? 1 : 2)
                                ->where('quarter', ($quarter + 1))
                                ->first();

                if($coreValue)
                {
                    $coreValue->score = strtolower($corevalues[$index][($quarter + 2)]);
                    $coreValue->save();
                }
                else
                {
                    $coreValue = CoreValue::create([
                        'student_id' => $request->student_id,
                        'core_value' => $corevalues[$index][0] ? strtolower($corevalues[$index][0]) : strtolower($corevalues[($index - 1)][0]),
                        'type' => $corevalues[$index][0] ? 1 : 2,
                        'score' => strtolower($corevalues[$index][($quarter + 2)]),
                        'quarter' => ($quarter + 1)
                    ]);
                }   
            }
            
        }

        return view('status')->with('message', 'Core Values uploaded successfully!');
        // return redirect('/grades/view/'.$request->student_id);
    }
}
