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
                <tr>
                    <td>Mother Tongue</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'mothertongue'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Filipino</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'filipino'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    @if($config->quarter == 4 && $grade->quarter == 'GRADE')
                        <td class="{{ $grade->grade >= 75 ? 'text-success' : 'text-danger' }}"><strong>{{ $grade->grade >= 75 ? 'PASSED' : 'FAILED' }}</strong></td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <td>English</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'english'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'mathematics'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Araling Panlipunan (AP)</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'aralingpanlipunan'))
                            @if($grade->grade != '60')
                                <td>{{ $grade->grade }}</td>
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Edukasyon sa Pagpapakatao (EsP)</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'edukasyonsapagpapakatao'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Music</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'music'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Arts</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'arts'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>P.E.</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'pe'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
                <tr>
                    <td>Health</td>
                    @foreach($student->grades as $grade)
                        @if(str_contains(str_replace(' ', '', strtolower($grade->subject)), 'health'))
                            @if($grade->grade != '60')
                                @if($grade->quarter == 'GRADE' && $config->quarter != 4)
                                    <td>-</td>
                                @else
                                    <td>{{ $grade->grade }}</td>
                                @endif
                            @else
                                <td>-</td>
                            @endif
                        @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>-</td>
                </tr>
            </tbody>
            
        
        </table>

        <!-- @foreach($student->grades as $grade)
        <div class="col-md-6 border mt-3 p-3 rounded bg-white">
            <div class="row">
                <div class="col-md-10">
                    <h2></h2>
                </div>
            </div>
        </div>
        @endforeach -->
    </div>
</div>
@endsection
