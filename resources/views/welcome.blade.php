@extends('layouts.home')

@section('content')
<div class="col-md-10 mt-3 bg-white">
    <div class="row m-2 justify-content-center">
        <div class="col-md-3">
            <u><a class="text-dark" href="{{ url('/') }}">Announcements</a></u>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('about') }}">About</a>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('contact') }}">Contact Us</a>
        </div>
    </div>
</div>

<div class="col-md-10 ">
    <div class="row justify-content-center">
        @if(!isset($events[0]))
            <h5 class="mt-3">No current announcements.</h5>
        @else
            @foreach($events as $event)
                <div class="col-md-5 mt-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ date_format(date_create($event->event_date), 'M j,      Y (l)') }}</h6>
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>  

@endsection
