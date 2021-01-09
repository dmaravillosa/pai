<?php

namespace App\Http\Controllers;

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
        $update = new Update();
        $update->title = $request->title;
        $update->description = $request->description;
        $update->event_date = $request->event_date;
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
        $updates = Update::findOrFail($id);
        $updates->title = $request->title;
        $updates->description = $request->description;
        $updates->event_date = $request->event_date;
        $updates->save();

        return view('status')->with('message', 'Event Successfully Updated!');
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

        return view('status')->with('message', 'Event Successfully Deleted!');
    }
}
