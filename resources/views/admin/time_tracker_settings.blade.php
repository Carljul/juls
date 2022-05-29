@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Time Tracker Settings') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $setting == null ? route('time_tracker_settings.store') : route('time_tracker_settings.update', $setting->id) }}">
                        @csrf
                        {{ $setting == null ? '':method_field('PUT') }}
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="morning_break" id="morning_break" {{ old('morning_break') || ($setting != null && $setting->morning_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="morning_break">
                                        {{ __('Morning Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="morning_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Morning break time') }}</label>

                            <div class="col-md-6">
                                <input id="morning_break_time" type="number" value="{{$setting != null ? $setting->morning_time : ''}}" class="form-control @error('morning_break_time') is-invalid @enderror" name="morning_break_time" placeholder="Time in minutes" autocomplete="morning_break_time">

                                @error('morning_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="lunch_break" id="lunch_break" {{ old('lunch_break') || ($setting != null && $setting->lunch_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="lunch_break">
                                        {{ __('Lunch Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lunch_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Lunch break time') }}</label>

                            <div class="col-md-6">
                                <input id="lunch_break_time" type="number" value="{{$setting != null ? $setting->lunch_time : ''}}" class="form-control @error('lunch_break_time') is-invalid @enderror" name="lunch_break_time" placeholder="Time in minutes" autocomplete="lunch_break_time">

                                @error('lunch_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="afternoon_break" id="afternoon_break" {{ old('afternoon_break') || ($setting != null && $setting->afternoon_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="afternoon_break">
                                        {{ __('Afternoon Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="afternoon_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Afternoon break time') }}</label>

                            <div class="col-md-6">
                                <input id="afternoon_break_time" type="number" value="{{$setting != null ? $setting->afternoon_time : ''}}" class="form-control @error('afternoon_break_time') is-invalid @enderror" name="afternoon_break_time" placeholder="Time in minutes" autocomplete="afternoon_break_time">

                                @error('afternoon_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="bio_break" id="bio_break" {{ old('bio_break') || ($setting != null && $setting->bio_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="bio_break">
                                        {{ __('Bio Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bio_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Bio break time') }}</label>

                            <div class="col-md-6">
                                <input id="bio_break_time" type="number" value="{{$setting != null ? $setting->bio_time : ''}}" class="form-control @error('bio_break_time') is-invalid @enderror" name="bio_break_time" placeholder="Time in minutes" autocomplete="bio_break_time">

                                @error('bio_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="dinner_break" id="dinner_break" {{ old('dinner_break') || ($setting != null && $setting->dinner_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="dinner_break">
                                        {{ __('Dinner Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dinner_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Dinner break time') }}</label>

                            <div class="col-md-6">
                                <input id="dinner_break_time" type="number" value="{{$setting != null ? $setting->dinner_time : ''}}" class="form-control @error('dinner_break_time') is-invalid @enderror" name="dinner_break_time" placeholder="Time in minutes" autocomplete="dinner_break_time">

                                @error('dinner_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="night_break" id="night_break" {{ old('night_break') || ($setting != null && $setting->night_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="night_break">
                                        {{ __('Night Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="night_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Night break time') }}</label>

                            <div class="col-md-6">
                                <input id="night_break_time" type="number" value="{{$setting != null ? $setting->night_time : ''}}" class="form-control @error('night_break_time') is-invalid @enderror" name="night_break_time" placeholder="Time in minutes" autocomplete="night_break_time">

                                @error('night_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="dawn_break" id="dawn_break" {{ old('dawn_break') || ($setting != null && $setting->dawn_break) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="dawn_break">
                                        {{ __('Dawn Break') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dawn_break_time" class="col-md-4 col-form-label text-md-end">{{ __('Dawn break time') }}</label>

                            <div class="col-md-6">
                                <input id="dawn_break_time" type="number" value="{{$setting != null ? $setting->dawn_time : ''}}" class="form-control @error('dawn_break_time') is-invalid @enderror" name="dawn_break_time" placeholder="Time in minutes" autocomplete="dawn_break_time">

                                @error('dawn_break_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ is_null($setting) ? __('Add') : __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
