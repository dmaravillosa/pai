<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
