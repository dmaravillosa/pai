@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-1 mt-2">
                    <a href="/students/view/{{ $student->classroom_id }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 mt-2 text-center">
                    <h4>{{ $student->name }}</h4>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-12 mt-2">
            <table class="table table-bordered text-center bg-white">
                <thead>
                    <tr>
                        <th rowspan="2">Learning Areas</th>
                        <th colspan="4">Quarter</th>
                        <th rowspan="2">Final Grade</th>
                        <th rowspan="2">Remarks</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grades as $key => $quarters)
                    <tr>
                        <td>{{ $key }}</td>
                        @foreach($quarters as $key => $grade)
                            @if(substr($key, 0, 1) <= $config->quarter) <!-- dont display grades for future quarters -->
                                @if($key == 'GRADE' && $config->quarter != 4) <!-- dont display final grade if quarter is not 4th -->
                                    <td>-</td>
                                @else
                                    <td>{{ $grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @endforeach
                        @if($config->quarter == 4)
                            <td class="{{ $quarters['GRADE'] >= 75 ? 'text-success' : 'text-danger' }}"><b>{{ $quarters["GRADE"] >= 75 ? 'PASSED' : 'FAILED' }}</b></td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="col-md-12 mt-2">
            <hr>
            @auth
                <form action="/students/remark/{{ $student->id }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 mt-2">
                            <h4>Remarks</h4>
                        </div>
                        
                        <div class="col-md-2 text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
                        </div>
                    </div>
            
                    <textarea class="form-control" name="remarks">{{ $student->remarks }}</textarea>
                </form>
            @else
                <div class="row">
                    <div class="col-md-10 mt-2">
                        <h4>Remarks</h4>
                    </div>

                    <div class="col-md-12 mt-2 bg-white">
                        <h5 class="mt-2">{{ $student->remarks ? $student->remarks : 'No teacher remarks.' }}</h5>
                    </div>
                </div>

            @endauth
        </div>

        <hr>
    </div>
</div>
@endsection
