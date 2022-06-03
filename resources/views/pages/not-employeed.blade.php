@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sorry User!') }}</div>

                <div class="card-body">
                    <p>You are not employeed in this company</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
