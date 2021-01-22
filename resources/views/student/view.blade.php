@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <a href="{{ isset(auth()->user()->id) ? (auth()->user()->id == 1 || auth()->user()->id == 2 ? '/admin' : '/home') : '/' }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-md-6 mt-2 text-center">
                    <h4>Student List</h4>
                </div>
                
                @auth
                    @if(auth()->user()->id != 1 && auth()->user()->id != 2)
                        <div class="col-md-3 mt-2 text-right">
                            <a class="btn btn-success" href="/classroom/view"><i class="fas fa-plus"></i> Update Grades</a>
                        </div>
                    @else
                        <div class="col-md-3 mt-2 text-right">
                            <form action="/students/list" method="GET">
                                <div class="input-group">
                                    <input type="text" name="filter" class="form-control" style="border-radius: 50px;" placeholder="Student Name">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded ml-2"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                @endauth

                @guest
                    <div class="col-md-3 mt-2 text-right">
                        <form action="/students/list" method="GET">
                            <div class="input-group">
                                <input type="text" name="filter" class="form-control" style="border-radius: 50px;" placeholder="Student Name">
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded ml-2"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endguest
            </div>

            <hr>
        </div>

        @foreach($students as $student)
        <div class="col-md-12 border mt-3 p-3 rounded {{ $student->password ? 'bg-secondary text-white' : 'bg-white' }}">
            <div class="row">
                @auth
                    @if(auth()->user()->id == 1 || auth()->user()->id == 2)
                        <div class="col-md-10 mt-1">
                            <span>
                                (<i class="fas fa-{{ $student->password ? 'lock' : 'unlock' }} fa-sm"></i>)
                                @if($student->seen)
                                    (<i class="fas fa-eye fa-sm"></i>)
                                @endif
                            </span>
                            <h2>{{ $student->name }}</h2>
                        </div>
                        <div class="col-md-1 mt-3">
                            <a href="/grades/view/{{ $student->id }}" class="btn btn-block btn-primary"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="col-md-1 mt-3">
                            <a href="/students/lock/{{ $student->id }}" class="btn btn-block btn-warning"><i class="fas fa-lock"></i></a>
                        </div>
                    @else
                        <div class="col-md-11 mt-1">
                            (<i class="fas fa-{{ $student->password ? 'lock' : 'unlock' }} fa-sm"></i>) <h2>{{ $student->name }}</h2>
                        </div>
                        <div class="col-md-1 mt-3">
                            @if($student->password)
                                <a href="/students/lock/{{ $student->id }}/1" class="btn btn-block btn-primary"><i class="fas fa-edit"></i></a>
                            @else
                                <a href="/grades/view/{{ $student->id }}" class="btn btn-block btn-primary"><i class="fas fa-edit"></i></a>
                            @endif
                        </div>
                    @endif
                @else
                    <div class="col-md-11 mt-1">
                        (<i class="fas fa-{{ $student->password ? 'lock' : 'unlock' }} fa-sm"></i>) <h2>{{ $student->name }}</h2>
                    </div>
                    <div class="col-md-1 mt-3">
                        @if($student->password)
                            <a href="/students/lock/{{ $student->id }}/1" class="btn btn-block btn-primary"><i class="fas fa-id-card-alt"></i></a>
                        @else
                            <a href="/grades/view/{{ $student->id }}" class="btn btn-block btn-primary"><i class="fas fa-id-card-alt"></i></a>
                        @endif
                    </div>
                @endauth
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
