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

<div class="col-md-10">
<br><br>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <!--<img class="d-block w-100" src="https://via.placeholder.com/600x200" alt="First slide">-->
        <img class="d-block w-100" src="{{ asset('home1.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('home2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('home3.jpg') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="col-md-12">
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
<br><br><br><br>

@endsection
