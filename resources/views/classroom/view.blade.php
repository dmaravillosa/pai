@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-1 mt-2">
                    <a href="/home" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 mt-2 text-center">
                    <h4>Upload Grade Sheet</h4>
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
