@extends('layouts.home')

@section('content')
<div class="col-md-10 mt-3 bg-white">
    <div class="row m-2 justify-content-center">
        <div class="col-md-3">
            <a class="text-dark" href="{{ url('/') }}">Events</a>
        </div>
        <div class="col-md-3">
            <u><a class="text-dark" href="{{ route('about') }}">About</a></u>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('contact') }}">Contact Us</a>
        </div>
    </div>
</div>

<div class="col-md-10 mt-3">

    <img src="http://via.placeholder.com/900x200">
    
    <br><br>

    <h4>Papaya Academy School</h4>

    <h5>
        In 2013, Papaya Academy School was found by the Kalinga Foundation which offers
        free education in every children from the Payatas, Quezon City. The school offers these
        children a chance to make their life better.
    </h5>
</div>
@endsection
