@extends('layouts.home')

@section('content')
<div class="col-md-10 mt-3 bg-white">
    <div class="row m-2 justify-content-center">
        <div class="col-md-3">
            <a class="text-dark" href="{{ url('/') }}">Announcements</a>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('about') }}">About</a>
        </div>
        <div class="col-md-3">
            <u><a class="text-dark" href="{{ route('contact') }}">Contact Us</a></u>
        </div>
    </div>
</div>

<div class="col-md-10 mt-3">
    <h3>Contact Us</h3>
    <br>

    <p>
        Papaya Academy is a privately owned school founded upon Humanitarian and Christian beliefs and values. 
        It is dedicated to providing access to a quality education for the impoverished children in the local community
        and suburbs, believing that all children have this right.
    </p>

    <br>
    
    <h3>
        Want to contact Papaya Academy, Inc.?
    </h3>

    <p>
        Email Address: <span class="text-primary"> papayaacademy@yahoo.com</span> <br>
        Telephone #: (02) 997-2894 <br>
        Facebook Page: <span class="text-primary"> <a target="_blank" href="https://www.facebook.com/papayaacademy">https://www.facebook.com/papayaacademy</a></span>
    </p>
</div>

@endsection
