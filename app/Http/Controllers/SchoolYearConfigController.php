<?php

namespace App\Http\Controllers;

use App\Models\SchoolYearConfig;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolYearConfigController extends Controller
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
    public function create($id)
    {
        $endpoint = '/syc/store/' . $id;
        return view('confirm')
            ->with('endpoint', $endpoint)
            ->with('message', 'Are you sure you want to generate a new school year?');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $syc = SchoolYearConfig::where('id', $id)->first();
        $school_year = explode('-', $syc->school_year);
        $syc->is_active = 0;
        $syc->save();

        $latest_syc = SchoolYearConfig::orderBy('school_year', 'DESC')->first();
        $latest_syc = explode('-', $latest_syc->school_year);

        $new_syc = SchoolYearConfig::create([
            'school_year' => ($latest_syc[0] + 1) . '-' . ($latest_syc[1] + 1),
            'quarter' => 1,
            'is_active' => 1
        ]);

        return redirect()->route('admin');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school_years = DB::table('school_year_configs')->update([
            'is_active' => 0
        ]);

        $syc = SchoolYearConfig::where('id' , $request->school_year)->first();
        $syc->is_active = 1;
        $syc->quarter = $request->quarter;
        $syc->save();

        $students = DB::table('students')->update([
            'seen' => 0
        ]);

        return redirect()->route(isset($request->page) ? $request->page : 'admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
