@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h4>Create Classroom</h4>
                </div>
            </div>

            <hr>
        </div>
        
        <div class="col-md-12">
            <form method="post" action="/classroom/import" enctype="multipart/form-data">
            @csrf
                <input type="file" name="excel">
                <br><br>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
            
    </div>
</div>
@endsection
