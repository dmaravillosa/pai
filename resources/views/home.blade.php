@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h4>Home Panel</h4>
                </div>
                <div class="col-md-6 text-right">
                    @if($user_id != 1 && $user_id != 2)
                        <a class="btn btn-success" href="/classroom/view"><i class="fas fa-plus"></i> Create Classroom</a>
                    @endif
                </div>
            </div>

            <hr>
        </div>

        @foreach($classrooms as $classroom)
        <div class="col-md-12 border mt-3 p-3 rounded bg-white">
            <div class="row">
                <div class="col-md-11 mt-1">
                    <h2>Grade {{ $classroom->level }}- {{ $classroom->name }}</h2>
                </div>
                <div class="col-md-1">
                    <a href="/students/view/{{ $classroom->id }}" class="btn btn-block btn-primary"><i class="fas fa-edit"></i></a>
                </div>
                <div class="col-md-11">
                    <h5> {{ count($classroom->students) }} Students </h5>
                </div>
                <div class="col-md-1">
                    <form action="/confirm" method="GET">
                        @csrf
                        <input type="hidden" name="endpoint" value="/classroom/delete/{{ $classroom->id }}">
                        <button type="submit" class="btn btn-sm btn-block btn-danger mt-1"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
