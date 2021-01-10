@extends('layouts.home')

@section('content')
<div class="col-md-10 mt-3 bg-white">
    <div class="row m-2 justify-content-center">
        <div class="col-md-3">
            <u><a class="text-dark" href="{{ url('/') }}">Events</a></u>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('about') }}">About</a>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('contact') }}">Contact Us</a>
        </div>
    </div>
</div>

@endsection
