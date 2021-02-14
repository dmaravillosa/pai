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
                    <h4>Upload Core Value</h4>
                </div>
            </div>

            <hr>
        </div>
        
        <div class="col-md-12 text-center">
            <form method="post" action="/corevalue/import" enctype="multipart/form-data">
            <input type="hidden" name="student_id" value="{{$student_id}}">
            <p class="text-primary">*Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            @csrf
                <div class="row bg-white border rounded p-3">
                    <div class="col-md-12 text-center mb-2">
                        <img src="{{ asset('upload.png') }}" width="250" class="mb-3">
                    </div>
                    <div class="col-md-11 offset-md-1 text-center">
                        <input type="file" name="excel">
                    </div>
                
                </div>
                
                <button type="submit" class="btn btn-primary mt-2 btn-large">Submit</button>
            </form>
            
        </div>
            
    </div>
</div>
@endsection
