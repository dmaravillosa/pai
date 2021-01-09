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
                    <a class="btn btn-success" href="/classroom/view"><i class="fas fa-plus"></i> Create Classroom</a>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-12 border mt-3 p-3 rounded">
            <div class="row">
                <div class="col-md-11">
                    <h2> Grade 2 - Mangga</h2>
                </div>
                <div class="col-md-1">
                    <a href="/delete" class="btn btn-block btn-primary"><i class="fas fa-edit"></i></a>
                </div>
                <div class="col-md-11">
                    <h5> 20 Students </h5>
                </div>
                <div class="col-md-1">
                    <a href="/delete" class="btn btn-block btn-danger"><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
