@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Status') }}</div>

                <div class="card-body">

                    {{ __('Account successfully created!') }}

                </div>

                <div class="card-footer">
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"> Go back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
