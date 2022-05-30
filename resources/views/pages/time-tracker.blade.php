@extends('layouts.app')

@section('content')
<style>
    #time-tracker {
        border-collapse: separate;
        border-spacing: 0 15px;
        width: 100%;
    }
    #time-tracker th, #time-tracker td {
        border-top: 1px solid rgba(0, 0, 0, 0.125);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        padding: 15px 10px;
    }
    #time-tracker th {
        border-left: 1px solid rgba(0, 0, 0, 0.125);
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }
    #time-tracker td:last-child {
        border-right: 1px solid rgba(0, 0, 0, 0.125);
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Time tracker') }}</div>

                <div class="card-body">
                    <table id="time-tracker">
                        <tr>
                            <th>Time IN</th>
                            <td><button type="submit" class="btn btn-primary">{{ __('Time IN') }}</button></td>
                            <td colspan="3"><span id="time_in">07:00 AM</span></td>
                            <td><span id="time_out_undertime">ON TIME</span></td>
                        </tr>
                        @if($setting->morning_break)
                            <tr>
                                <th>Morning Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="morning_time_in">09:00 AM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="morning_time_out">09:15 AM</span></td>
                                <td><span id="morning_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if($setting->lunch_break)
                            <tr>
                                <th>Lunch Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="lunch_time_in">12:00 PM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="lunch_time_out">01:00 PM</span></td>
                                <td><span id="lunch_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if($setting->afternoon_break)
                            <tr>
                                <th>Afternoon Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="afternoon_time_in">03:00 PM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="afternoon_time_out">03:15 PM</span></td>
                                <td><span id="afternoon_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if($setting->bio_break)
                            <tr>
                                <th>Bio Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="bio_time_in">08:00 AM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="bio_time_out">08:15 AM</span></td>
                                <td><span id="bio_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if($setting->dinner_break)
                            <tr>
                                <th>Dinner Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="dinner_time_in">06:00 PM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="dinner_time_out">06:15 PM</span></td>
                                <td><span id="dinner_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if($setting->night_break)
                            <tr>
                                <th>Night Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="night_time_in">09:00 PM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="night_time_out">09:15 PM</span></td>
                                <td><span id="night_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if($setting->dawn_break)
                            <tr>
                                <th>Dawn Break</th>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break IN') }}</button></td>
                                <td><span id="dawn_time_in">03:00 AM</span></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Break OUT') }}</button></td>
                                <td><span id="dawn_time_out">03:15 AM</span></td>
                                <td><span id="dawn_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        <tr>
                            <th>Time OUT</th>
                            <td><button type="submit" class="btn btn-primary">{{ __('Time OUT') }}</button></td>
                            <td colspan="3"><span id="time_out">06:00 PM</span></td>
                            <td><span id="time_out_undertime">NOT UNDERTIME</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
