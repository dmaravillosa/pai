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
                    <h4>{{ $student->name }}</h4> <small>(Adviser: {{ $teacher }})</small>
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
                        <td>
                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Teacher: {{ config('constants.teachers')[ucwords(strtolower($key))] }}">
                            {{ $key }}
                        </button>
                        </td>
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

            <hr class="m-4">
        </div>

        <div class="col-md-8">
            <table class="table table-bordered text-center bg-white">
                <thead>
                    <tr>
                        <th rowspan="2">Core Values</th>
                        <th rowspan="2">Behavior Statements</th>
                        <th colspan="4">Quarter</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(config('constants.core_values') as $core_value => $description)
                    <tr>
                        @if(substr($core_value, -1) == 1)
                            <td rowspan="{{ $core_value == 'makakalikasan1' ? 1 : 2 }}">{{ ucfirst(substr($core_value, 0, -1)) }}</td>
                        @endif
                        <td>{{ $description }}</td>
                        <td>
                            @guest
                                {{ isset($core_values[$core_value . '1']) ? strtoupper($core_values[$core_value . '1']) : '-' }}
                            @else
                                <select onchange="updateCore(this);" name="{{ $core_value . '1'}}">
                                    <option value=""></option>
                                    <option value="ao" {{ isset($core_values[$core_value . '1']) ? ($core_values[$core_value . '1'] == 'ao' ? 'selected' : '') : '-' }}>AO</option>
                                    <option value="so" {{ isset($core_values[$core_value . '1']) ? ($core_values[$core_value . '1'] == 'so' ? 'selected' : '') : '-' }}>SO</option>
                                    <option value="ro" {{ isset($core_values[$core_value . '1']) ? ($core_values[$core_value . '1'] == 'ro' ? 'selected' : '') : '-' }}>RO</option>
                                    <option value="no" {{ isset($core_values[$core_value . '1']) ? ($core_values[$core_value . '1'] == 'no' ? 'selected' : '') : '-' }}>NO</option>
                                </select>
                            @endguest
                        </td>
                        <td>
                            @guest
                                {{ isset($core_values[$core_value . '2']) ? strtoupper($core_values[$core_value . '2']) : '-' }}
                            @else
                                <select onchange="updateCore(this);" name="{{ $core_value . '2'}}">
                                    <option value=""></option>
                                    <option value="ao" {{ isset($core_values[$core_value . '2']) ? ($core_values[$core_value . '2'] == 'ao' ? 'selected' : '') : '-' }}>AO</option>
                                    <option value="so" {{ isset($core_values[$core_value . '2']) ? ($core_values[$core_value . '2'] == 'so' ? 'selected' : '') : '-' }}>SO</option>
                                    <option value="ro" {{ isset($core_values[$core_value . '2']) ? ($core_values[$core_value . '2'] == 'ro' ? 'selected' : '') : '-' }}>RO</option>
                                    <option value="no" {{ isset($core_values[$core_value . '2']) ? ($core_values[$core_value . '2'] == 'no' ? 'selected' : '') : '-' }}>NO</option>
                                </select>
                            @endguest
                        </td>
                        <td>
                            @guest
                                {{ isset($core_values[$core_value . '3']) ? strtoupper($core_values[$core_value . '3']) : '-' }}
                            @else
                                <select onchange="updateCore(this);" name="{{ $core_value . '3'}}">
                                    <option value=""></option>
                                    <option value="ao" {{ isset($core_values[$core_value . '3']) ? ($core_values[$core_value . '3'] == 'ao' ? 'selected' : '') : '-' }}>AO</option>
                                    <option value="so" {{ isset($core_values[$core_value . '3']) ? ($core_values[$core_value . '3'] == 'so' ? 'selected' : '') : '-' }}>SO</option>
                                    <option value="ro" {{ isset($core_values[$core_value . '3']) ? ($core_values[$core_value . '3'] == 'ro' ? 'selected' : '') : '-' }}>RO</option>
                                    <option value="no" {{ isset($core_values[$core_value . '3']) ? ($core_values[$core_value . '3'] == 'no' ? 'selected' : '') : '-' }}>NO</option>
                                </select>
                            @endguest
                        </td>
                        <td>
                            @guest
                                {{ isset($core_values[$core_value . '4']) ? strtoupper($core_values[$core_value . '4']) : '-' }}
                            @else
                                <select onchange="updateCore(this);" name="{{ $core_value . '4'}}">
                                    <option value=""></option>
                                    <option value="ao" {{ isset($core_values[$core_value . '4']) ? ($core_values[$core_value . '4'] == 'ao' ? 'selected' : '') : '-' }}>AO</option>
                                    <option value="so" {{ isset($core_values[$core_value . '4']) ? ($core_values[$core_value . '4'] == 'so' ? 'selected' : '') : '-' }}>SO</option>
                                    <option value="ro" {{ isset($core_values[$core_value . '4']) ? ($core_values[$core_value . '4'] == 'ro' ? 'selected' : '') : '-' }}>RO</option>
                                    <option value="no" {{ isset($core_values[$core_value . '4']) ? ($core_values[$core_value . '4'] == 'no' ? 'selected' : '') : '-' }}>NO</option>
                                </select>
                            @endguest
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Marking</th>
                        <th scope="col">Non-numerical rating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>AO</td>
                        <td>Always Observed</td>
                    </tr>
                    <tr>
                        <td>SO</td>
                        <td>Sometimes Observed</td>
                    </tr>
                    <tr>
                        <td>RO</td>
                        <td>Rarely Observed</td>
                    </tr>
                    <tr>
                        <td>NO</td>
                        <td>Not Observed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <hr class="m-4">
        </div>

        <div class="col-md-12">
            <table class="table table-bordered text-center bg-white">
                <thead>
                    <tr>
                        <th></th>
                        @foreach(config('constants.months') as $month)
                            <th>{{ $month }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>No. of school days</td>
                        @foreach(config('constants.months') as $month)
                            @guest
                                <td> {{ isset($attendances[$month . '-days']) ? $attendances[$month . '-days'] : '-' }} </td>
                            @else
                                <td><input onchange="updateAttendance(this);" type="number" name="{{ $month . '-' . 'days'}}" value="{{ isset($attendances[$month . '-days']) ? $attendances[$month . '-days'] : '-' }}"></td>
                            @endguest
                        @endforeach
                    </tr>
                    <tr>
                        <td>No. of days present</td>
                        @foreach(config('constants.months') as $month)
                            @guest
                                <td> {{ isset($attendances[$month . '-present']) ? $attendances[$month . '-present'] : '-' }} </td>  
                            @else
                                <td><input onchange="updateAttendance(this);" type="number" name="{{ $month . '-' . 'present'}}" value="{{ isset($attendances[$month . '-present']) ? $attendances[$month . '-present'] : '' }}"></td>
                            @endguest
                        @endforeach
                    </tr>
                    <tr>
                        <td>No. of days absent</td>
                        @foreach(config('constants.months') as $month)
                            @guest
                                <td> {{ isset($attendances[$month . '-absent']) ? $attendances[$month . '-absent'] : '-' }} </td>
                            @else
                                <td><input onchange="updateAttendance(this);" type="number" name="{{ $month . '-' . 'absent'}}" value="{{ isset($attendances[$month . '-absent']) ? $attendances[$month . '-absent'] : '' }}"></td>
                                
                            @endguest
                        @endforeach
                    </tr>
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

        <hr style="margin-bottom: 500px;">
        <input type="hidden" id="student_id" value="{{ $student->id }}">
        
    </div>
</div>

<script>

    $(document).ready(function(){
        
        
    });

    function updateCore(select)
    {
        var student_id = $('#student_id').val();
        $.post("/api/core/update", {student_id: student_id, name: select.name, value: select.value}, function(data, status){
            
        });
    }

    function updateAttendance(input)
    {
        var student_id = $('#student_id').val();
        $.post("/api/attendance/update", {student_id: student_id, name: input.name, value: input.value}, function(data, status){
            
        });
    }

</script>
@endsection
