<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Exception;

use App\Models\TimeTracker;
use App\Models\Admin\Employees;
use App\Models\Admin\TimeTrackerSettings;

use Illuminate\Http\Request;
use App\Http\Requests\TimeTrackerRequest;

class TimeTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->with('person')->with('employee')->first();
        $setting = TimeTrackerSettings::all()->first();
        $timelog = TimeTracker::where('user_id', $user->id)
            ->whereDate('time_in', '=', date('Y-m-d'))
            ->first();
        
        if (empty(Employees::where('user_id', $user->id)->first())) {
            return redirect()->route('not-employeed');
        }

        return view('pages.time-tracker', compact('setting', 'timelog', 'user'));
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
     * @param  App\Http\Requests\TimeTrackerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeTrackerRequest $request)
    {
        $params = $request->all();

        DB::beginTransaction();
        try {
            if ($params['activity'] != 'time_in') {
                return redirect()->back()->withErrors(['error' => true, 'message' => 'Something Went Wrong!']);
            }

            TimeTracker::create([
                'user_id' => Auth::user()->id,
                'time_in' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();

            return redirect()->back()->withErrors(['error' => false, 'message' => 'Saved']);
        } catch (Exception $e) {
            \Log::error($e->getMessage());

            DB::rollback();

            return redirect()->back()->withErrors(['error' => true, 'message' => 'Something Went Wrong!']);
        }

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
