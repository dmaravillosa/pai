@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h4>Admin Panel</h4>
                </div>

                <div class="col-md-6 mt-2 text-right">
                    <form action="/syc/update/{{ $config->id }}" method="POST">
                        @csrf
                        S.Y. {{ $config->school_year }} (
                        <select name="quarter">
                            <option value="1" {{ $config->quarter == '1' ? 'selected' : '' }}>1st</option>
                            <option value="2" {{ $config->quarter == '2' ? 'selected' : '' }}>2nd</option>
                            <option value="3" {{ $config->quarter == '3' ? 'selected' : '' }}>3rd</option>
                            <option value="4" {{ $config->quarter == '4' ? 'selected' : '' }}>4th</option>
                        </select>
                        Quarter)
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i></button>
                    </form>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-6">
            <div class="border mt-2 p-3 rounded bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <h5><strong>Teachers</strong></h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success btn-sm" href="/register"><i class="fas fa-plus"></i> Create Teacher</a>
                    </div>
                </div>
                
                <hr>

                @if(!isset($users[0]))
                    <p>No saved teachers.</p>
                @else
                    @foreach($users as $user)
                        <div class="row m-1 p-2 border">
                            <div class="col-md-10">
                                <h5 class="mt-2">{{ $user->name }} </h5>
                                <h6>{{ $user->email }}</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="/teachers/edit/{{ $user->id }}" class="btn btn-sm btn-block btn-primary m-0"><i class="fas fa-edit"></i></a>

                                <form action="/teachers/delete/{{ $user->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-block btn-danger mt-1"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="border mt-2 p-3 rounded bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <h5><strong>Events</strong></h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success btn-sm" href="/updates/create"><i class="fas fa-plus"></i> Create Updates</a>
                    </div>
                </div>

                <hr>

                @if(!isset($events[0]))
                    <p>No saved events.</p>
                @else
                    @foreach($events as $event)
                        <div class="row m-1 p-2 border">
                            <div class="col-md-10">
                                <h5 class="mt-2">{{ $event->title }} </h5>
                                <h6>{{ $event->description }}</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="/updates/edit/{{ $event->id }}" class="btn btn-sm btn-block btn-primary m-0"><i class="fas fa-edit"></i></a>

                                <form action="/updates/delete/{{ $event->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-block btn-danger mt-1"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
