<?php

namespace App\Http\Controllers;

use App\Models\TimeTracker;
use App\Models\Admin\TimeTrackerSettings;
use Illuminate\Http\Request;

class TimeTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = TimeTrackerSettings::all()->first();
        return view('pages.time-tracker', compact('setting'));
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
     * @param  \App\Models\TimeTracker  $timeTracker
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTracker $timeTracker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeTracker  $timeTracker
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTracker $timeTracker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeTracker  $timeTracker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeTracker $timeTracker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeTracker  $timeTracker
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTracker $timeTracker)
    {
        //
    }
}
