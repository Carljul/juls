@extends('layouts.app')

@section('content')
<style>
    #users {
        /* display: none; */
    }

    #users p,
    #employees p{
        margin-bottom: 0;
    }

    #employees .action-buttons {
        text-align: center;
        position: relative;
        top: 35px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <select name="user_employee_toggle" id="user_employee_toggle" class="form-control">
                                <option value="user">Users</option>
                                <option value="employees">Employees</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    @dump(config('const.employee_shift.index'))
                    <div class="card" id="users">
                        <div class="card-header">{{__('Users')}}</div>
                        <div class="card-body">
                            @if($errors->any())
                                <ul style="color: red;">
                                    @forelse ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            @endif
                                
                            @forelse ($users as $user)
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('employees.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <small><i>Name:</i></small>
                                                    <p>{{$user->person->firstname}} {{$user->person->middlename}} {{$user->person->lastname}}</p>
                                                </div>
                                                <div class="col-sm-2">
                                                    <small><i>Mobile No:</i></small>
                                                    <p>{{$user->mobile_no}}</p>
                                                </div>
                                                <div class="col-sm-3">
                                                    <small><i>Email:</i></small>
                                                    <p>{{$user->email}}</p>
                                                </div>
                                                <div class="col-sm-2">
                                                    <small><i>Shift:</i></small>
                                                    <select name="shift" id="" class="form-control">
                                                        <option value="" disabled selected>Select Shift</option>
                                                        @foreach(config('const.employee_shift.index') as $index => $shifts)
                                                        <option value="{{$index}}">{{$shifts}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-primary" type="submit">Hired</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>No Record Found</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="card" id="employees">
                        <div class="card-header">{{__('Employees')}}</div>
                        <div class="card-body">
                            @dump($employees)
                            @forelse ($employees as $employee)
                                <div class="card">
                                    <div class="card-body">
                                        <form action="">
                                            @csrf
                                            {{method_field('PUT')}}
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <small><i>Employee No:</i></small>
                                                                    <p>{{$employee->employee_no}}</p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <small><i>SSS No:</i></small><br>
                                                                    <p>{{$employee->sss_no ?? '-'}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <small><i>Name:</i></small>
                                                                    <p>{{$employee->user->person->firstname}} {{$employee->user->person->middlename}} {{$employee->user->person->lastname}}</p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <small><i>TIN No:</i></small><br>
                                                                    <p>{{$employee->tin_no ?? '-'}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <small><i>Shift:</i></small>
                                                                    <p>{{config('const.employee_shift.index')[$employee->shift]}}</p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <small><i>Pagibig No:</i></small><br>
                                                                    <p>{{$employee->pagibig_no ?? '-'}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <small><i>Date Hired:</i></small>
                                                                    <p>08-12-2021</p>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <small><i>Philhealth No:</i></small><br>
                                                                    <p>{{$employee->philhealth_no ?? '-'}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 action-buttons">
                                                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary left">U</a>
                                                            <a href="#" class="btn btn-primary left">D</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>No Record Found</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
