<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Admin\TimeTrackerSettings;
use Illuminate\Http\Request;
use App\Http\Requests\TimeTrackerSettingRequest;

class TimeTrackerSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = TimeTrackerSettings::all()->first();

        return view('admin.time_tracker_settings', compact('setting'));
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
     * @param  \Illuminate\Http\TimeTrackerSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeTrackerSettingRequest $request)
    {
        $params = $request->all();

        DB::beginTransaction();
        try {
            TimeTrackerSettings::create([
                'morning_break'   => array_key_exists('morning_break', $params) ? $params['morning_break']:0,
                'morning_time'    => array_key_exists('morning_break_time', $params) ? $params['morning_break_time']:null,
                'lunch_break'     => array_key_exists('lunch_break', $params) ? $params['lunch_break']:0,
                'lunch_time'      => array_key_exists('lunch_break_time', $params) ? $params['lunch_break_time']:null,
                'afternoon_break' => array_key_exists('afternoon_break', $params) ? $params['afternoon_break']:0,
                'afternoon_time'  => array_key_exists('afternoon_break_time', $params) ? $params['afternoon_break_time']:null,
                'bio_break'       => array_key_exists('bio_break', $params) ? $params['bio_break']:0,
                'bio_time'        => array_key_exists('bio_break_time', $params) ? $params['bio_break_time']:null,
                'dinner_break'    => array_key_exists('dinner_break', $params) ? $params['dinner_break']:0,
                'dinner_time'     => array_key_exists('dinner_break_time', $params) ? $params['dinner_break_time']:null,
                'night_break'     => array_key_exists('night_break', $params) ? $params['night_break']:0,
                'night_time'      => array_key_exists('night_break_time', $params) ? $params['night_break_time']:null,
                'dawn_break'      => array_key_exists('dawn_break', $params) ? $params['dawn_break']:0,
                'dawn_time'       => array_key_exists('dawn_break_time', $params) ? $params['dawn_break_time']:null,
            ]);

            DB::commit();
            return redirect()->back();
        } catch(Exception $e) {
            \Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\TimeTrackerSettings  $timeTrackerSettings
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTrackerSettings $timeTrackerSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\TimeTrackerSettings  $timeTrackerSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTrackerSettings $timeTrackerSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TimeTrackerSettingRequest  $request
     * @param  \App\Models\Admin\TimeTrackerSettings  $timeTrackerSettings
     * @return \Illuminate\Http\Response
     */
    public function update(TimeTrackerSettingRequest $request, TimeTrackerSettings $time_tracker_setting)
    {
        $params = $request->all();

        DB::beginTransaction();
        try {
            $time_tracker_setting->morning_break   = array_key_exists('morning_break', $params) ? $params['morning_break']:0;
            $time_tracker_setting->morning_time    = array_key_exists('morning_break_time', $params) ? $params['morning_break_time']:null;
            $time_tracker_setting->lunch_break     = array_key_exists('lunch_break', $params) ? $params['lunch_break']:0;
            $time_tracker_setting->lunch_time      = array_key_exists('lunch_break_time', $params) ? $params['lunch_break_time']:null;
            $time_tracker_setting->afternoon_break = array_key_exists('afternoon_break', $params) ? $params['afternoon_break']:0;
            $time_tracker_setting->afternoon_time  = array_key_exists('afternoon_break_time', $params) ? $params['afternoon_break_time']:null;
            $time_tracker_setting->bio_break       = array_key_exists('bio_break', $params) ? $params['bio_break']:0;
            $time_tracker_setting->bio_time        = array_key_exists('bio_break_time', $params) ? $params['bio_break_time']:null;
            $time_tracker_setting->dinner_break    = array_key_exists('dinner_break', $params) ? $params['dinner_break']:0;
            $time_tracker_setting->dinner_time     = array_key_exists('dinner_break_time', $params) ? $params['dinner_break_time']:null;
            $time_tracker_setting->night_break     = array_key_exists('night_break', $params) ? $params['night_break']:0;
            $time_tracker_setting->night_time      = array_key_exists('night_break_time', $params) ? $params['night_break_time']:null;
            $time_tracker_setting->dawn_break      = array_key_exists('dawn_break', $params) ? $params['dawn_break']:0;
            $time_tracker_setting->dawn_time       = array_key_exists('dawn_break_time', $params) ? $params['dawn_break_time']:null;
            $time_tracker_setting->save();

            DB::commit();
            return redirect()->back();
        } catch(Exception $e) {
            \Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\TimeTrackerSettings  $timeTrackerSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTrackerSettings $timeTrackerSettings)
    {
        //
    }
}
