@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/time-tracker.css')}}">
@endpush

@php
    $breakTimeoutDisable = empty($timelog) ? 'disabled' : '';
    $timeInDisable = !empty($timelog) ? 'disabled' : '';
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><span>{{ __('Time tracker') }}</span></div>
                        <div class="col-md-6"><span class="float-end"><b>{{date('Y-m-d')}}</b></span></div>
                    </div>
                </div>
                @dump($timelog)
                <div class="card-body">
                    <table id="time-tracker">
                        <tr>
                            <th>Time IN</th>
                            <td>
                                <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity" value="time_in">
                                    <button type="submit" class="btn btn-primary" {{$timeInDisable}}>{{ __('Time IN') }}</button>
                                </form>
                            </td>
                            <td colspan="3"><span id="time_in">{{empty($timelog) ? '-' : date_format($timelog->time_in, 'H:i')}}</span></td>
                            <td><span id="time_out_undertime">ON TIME</span></td>
                        </tr>
                        @if(!empty($setting) && $setting->morning_break && ($user->employee->shift == config('const.employee_shift.values.Morning') || $user->employee->shift == config('const.employee_shift.values.Graveyard') || $user->employee->shift == config('const.employee_shift.values.Flex')))
                            <tr>
                                <th>Morning Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="morning_in">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="morning_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="morning_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="morning_time_out">-</span></td>
                                <td><span id="morning_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if(!empty($setting) && $setting->lunch_break)
                            <tr>
                                <th>Lunch Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="lunch_in">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="lunch_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="lunch_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="lunch_time_out">-</span></td>
                                <td><span id="lunch_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if(!empty($setting) && ($setting->afternoon_break && $user->employee->shift == config('const.employee_shift.values.Morning') || $user->employee->shift == config('const.employee_shift.values.Afternoon') || $user->employee->shift == config('const.employee_shift.values.Flex')))
                            <tr>
                                <th>Afternoon Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="afternoon_in">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="afternoon_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="afternoon_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="afternoon_time_out">-</span></td>
                                <td><span id="afternoon_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if(!empty($setting) && $setting->bio_break)
                            <tr>
                                <th>Bio Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="bio_in">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="bio_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="bio_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="bio_time_out">-</span></td>
                                <td><span id="bio_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if(!empty($setting) && $setting->dinner_break && $user->employee->shift == config('const.employee_shift.values.Afternoon'))
                            <tr>
                                <th>Dinner Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="dinner_in">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="dinner_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="dinner_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="dinner_time_out">-</span></td>
                                <td><span id="dinner_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if(!empty($setting) && $setting->night_break && ($user->employee->shift == config('const.employee_shift.values.Afternoon') || $user->employee->shift == config('const.employee_shift.values.Night') || $user->employee->shift == config('const.employee_shift.values.Flex')))
                            <tr>
                                <th>Night Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="night_in">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="night_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="night_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="night_time_out">-</span></td>
                                <td><span id="night_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        @if(!empty($setting) && $setting->dawn_break && ($user->employee->shift == config('const.employee_shift.values.Graveyard') ||  $user->employee->shift == config('const.employee_shift.values.Flex')))
                            <tr>
                                <th>Dawn Break</th>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="dawn_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Start') }}</button>
                                    </form>
                                </td>
                                <td><span id="dawn_time_in">-</span></td>
                                <td>
                                    <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="activity" value="dawn_out">
                                        <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Stop') }}</button>
                                    </form>
                                </td>
                                <td><span id="dawn_time_out">-</span></td>
                                <td><span id="dawn_overbreak">GOOD</span></td>
                            </tr>
                        @endif
                        <tr>
                            <th>Time OUT</th>
                            <td>
                                <form action="{{route('time_tracker.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity" value="time_out">
                                    <button type="submit" class="btn btn-primary" {{$breakTimeoutDisable}}>{{ __('Time OUT') }}</button>
                                </form>
                            </td>
                            <td colspan="3"><span id="time_out">-</span></td>
                            <td><span id="time_out_undertime">NOT UNDERTIME</span></td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <span><b>Employee No:</b> {{$user->employee->employee_no}}</span>
                        </div>
                        <div class="col-md-3">
                            <span><b>Name:</b> <a href="#profile">{{$user->person->firstname}} {{$user->person->lastname}}</a></span>
                        </div>
                        <div class="col-md-3">
                            @php
                                $schedule = config('const.employee_shift.schedule')[config('const.employee_shift.index')[$user->employee->shift]];
                            @endphp
                            <b>Shift:</b> <span title="{{$schedule['in']}} - {{$schedule['out']}}">{{config('const.employee_shift.index')[$user->employee->shift]}}</span>
                        </div>
                        <div class="col-md-3">
                            <b>Total Break: </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
