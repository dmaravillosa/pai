@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-1 mt-2">
                    <a href="{{ auth()->user()->role == 'Registrar' ? '/admin' : '/home' }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 mt-2 text-center">
                    <h4>Upload Grade Sheet</h4>
                </div>
            </div>

            <hr>
        </div>
        
        <div class="col-md-12 text-center">
            <form method="post" action="/classroom/import" enctype="multipart/form-data">
            <p class="text-primary"><b>Uploading the Students' Grading Sheet:</b>
                <br> 1. Advisers must have a soft copy of the School Form (Downloaded from LIS).
                <br> 2. Click the <i>Choose Files</i> button to select the file you want to upload. (the electronic file must be in xlsx file format)
                <br> 3. After selecting the file/s you wand to upload, click the <i>submit</i> button.
                <br> 4. A message notification that says "Excel grade upload successful" will appear once the grade sheet is uploaded successfully.
            </p>
            @csrf
                <div class="row bg-white border rounded p-3">
                    <div class="col-md-12 text-center mb-2">
                        <img src="{{ asset('upload.png') }}" width="250" class="mb-3">
                    </div>
                    <div class="col-md-11 offset-md-1 text-center">
                        @if(auth()->user()->role == 'Registrar')
                            Adviser: 
                            <select name="teacher" class="ml-2">
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <input type="file" name="excel[]" multiple>
                    </div>
                
                </div>
                
                <button type="submit" class="btn btn-primary mt-2 btn-large">Submit</button>
            </form>
            
        </div>
            
    </div>
</div>
@endsection
