@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('time_tracker_settings.index')}}" class="card-menu">
                        <div class="card">
                            <div class="card-body">
                                <p>Time Tracker Settings</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{route('time_tracker.index')}}" class="card-menu">
                        <div class="card">
                            <div class="card-body">
                                <p>Time Tracker</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{route('employees.index')}}" class="card-menu">
                        <div class="card">
                            <div class="card-body">
                                <p>Employees</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
