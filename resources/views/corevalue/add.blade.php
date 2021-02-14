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
            <p class="text-primary">
                <br> 1. Advisers must have the excel file of the core values rating of the student selected.
                <br> 2. Click the <i>Choose File</i> button to select the file you want to upload. (the electronic file must be in xlsx file format)
                <br> 3. After selecting the file you wand to upload, click the <i>submit</i> button. (select only one file)
                <br> 4. A message notification that says "Core Values uploaded successfully!" will appear once the grade sheet is uploaded successfully.
            </p>
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
