<?php

namespace App\Http\Controllers;

use App\Models\SchoolYearConfig;
use App\Models\Update;
use Illuminate\Http\Request;

class UpdatesController extends Controller
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
        return view('update.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = SchoolYearConfig::where('is_active', 1)->first();

        $update = new Update();
        $update->title = $request->title;
        $update->description = $request->description;
        $update->event_date = $request->event_date;
        $update->school_year = $config->school_year;
        $update->save();

        return view('status')->with('message', 'Event Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update, $id)
    {
        $updates = Update::where('id', $id)->first();

        return view('update.view')->with('update', $updates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update, $id)
    {
        $config = SchoolYearConfig::where('is_active', 1)->first();

        $updates = Update::findOrFail($id);
        $updates->title = $request->title;
        $updates->description = $request->description;
        $updates->event_date = $request->event_date;
        $updates->school_year = $config->school_year;
        $updates->save();

        return view('status')->with('message', 'Announcement Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update, $id)
    {
        $updates = Update::findOrfail($id);
        $updates->delete();

        return view('status')->with('message', 'Announcement Successfully Archived!');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function restore(Update $update, $id)
    {
        $updates = Update::where('id', $id)->withTrashed()->first();
        $updates->deleted_at = null;
        $updates->save();

        return view('status')->with('message', 'Announcement Successfully Restored!');
    }
}
