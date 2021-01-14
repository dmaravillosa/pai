@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-2 mt-2">
                    <a href="{{ isset(auth()->user()->id) ? '/home' : '/' }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-md-8 mt-2 text-center">
                    <h4>Student List</h4>
                </div>
                <div class="col-md-2 mt-2 text-right">
                    <a class="btn btn-success" href="/classroom/view"><i class="fas fa-plus"></i> Update Grades</a>
                </div>
            </div>

            <hr>
        </div>

        @foreach($students as $student)
        <div class="col-md-12 border mt-3 p-3 rounded bg-white">
            <div class="row">
                <div class="col-md-11">
                    <h2>{{ $student->name }}</h2>
                </div>
                <div class="col-md-1">
                    <a href="/grades/view/{{ $student->id }}" class="btn btn-block btn-primary"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
