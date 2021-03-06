@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h4>Admin Panel</h4>
                </div>

                <div class="col-md-6 mt-2 text-right">
                    <form action="/syc/update/{{ $config->id }}" method="POST">
                        @csrf
                        S.Y.
                        <select name="school_year">
                            @foreach($school_years as $school_year)
                                <option value="{{ $school_year->id }}" {{ $config->school_year == $school_year->school_year ? 'selected' : '' }}>{{$school_year->school_year}}</option>
                            @endforeach
                        </select>
                         (
                        <select name="quarter">
                            <option value="1" {{ $config->quarter == '1' ? 'selected' : '' }}>1st</option>
                            <option value="2" {{ $config->quarter == '2' ? 'selected' : '' }}>2nd</option>
                            <option value="3" {{ $config->quarter == '3' ? 'selected' : '' }}>3rd</option>
                            <option value="4" {{ $config->quarter == '4' ? 'selected' : '' }}>4th</option>
                        </select>
                        Quarter)

                        <input type="hidden" name="page" value="classess">

                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i></button>
                        <a href="/syc/create/{{$config->id}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

                        <span class="border border-dark mr-1"></span>

                        <a href="/classess?archived={{ !$archived }}" class="btn btn-sm {{ !$archived ? 'btn-secondary' : 'btn-primary' }}"><i class="fas fa-{{ !$archived ? 'archive' : 'sync-alt' }}"></i></a>
                    </form>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/announcement">Announcements</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="/classess">Classes</a>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <form action="/classess" method="GET">
                <div class="input-group">
                    <input type="text" name="filter" class="form-control" style="border-radius: 50px;" placeholder="Classroom">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded ml-2"><i class="fas fa-search"></i></button>
                        &nbsp;
                    </div>
                    <a class="btn btn-danger" href="/classess"><i class="fas fa-sync-alt"></i></a>
                    &nbsp;
                    <a class="btn btn-success" href="/classroom/view"><i class="fas fa-plus"></i> Create Classes</a>
                </div>
            </form>
        </div>
        
        <div class="col-md-12 mt-3">
            <table class="table bg-white text-center">
                <thead>
                    <tr>
                        <th scope="col">Grade</th>
                        <th scope="col" class="text-left">Section</th>
                        <th scope="col" colspan="3" class="text-center">Teacher</th>
                        <th></th>
                        <th></th>
                        <th scope="col" class="text-center">Last Updated</th>
                        <th scope="col" class="text-center">Students</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!isset($classrooms[0]))
                        </tbody></table>
                        <div class="mt-4 text-center">
                            <p>No saved classes.</p>
                        </div>
                    @else
                        @foreach($classrooms as $classroom)
                            <tr>
                                <td>
                                    <div class="m-3">
                                        {{ $classroom->level }}
                                    </div>
                                </td>
                                <td class="text-left">
                                    <div class="mt-3">
                                        {{ $classroom->name }}
                                    </div>
                                </td>
                                <td colspan="3" class="text-center">
                                    <div class="m-3">
                                        {{ $classroom->user->name }}
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="m-3">
                                        {{ $classroom->last_update ? date("F j, Y g:i:a", strtotime($classroom->last_update)) : '-' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="m-3">
                                        {{ count($classroom->students) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="row m-2">
                                        <div class="col-md-4 text-right">
                                            <a href="/students/view/{{ $classroom->id }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        </div>

                                        <div class="col-md-4">
                                            <form action="/confirm" method="GET">
                                                <input type="hidden" name="archived" value="{{ $archived }}">

                                                @csrf
                                                
                                                @if(!$archived)
                                                    <input type="hidden" name="endpoint" value="/classroom/delete/{{ $classroom->id }}">
                                                    <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i></button>
                                                @else
                                                    <input type="hidden" name="endpoint" value="/classroom/restore/{{ $classroom->id }}">
                                                    <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i></button>
                                                @endif
                                            </form>
                                        </div>

                                        <div class="col-md-4 text-left">
                                        
                                            <form action="/confirm" method="GET">

                                                <input type="hidden" name="approved" value="{{ $classroom->approved }}">
                                                <input type="hidden" name="endpoint" value="/classroom/approve/{{ $classroom->id }}?approved={{ !$classroom->approved }}">

                                                <button type="submit" class="btn btn-{{ !$classroom->approved ? 'success' : 'danger' }}"><i class="fas fa-{{ !$classroom->approved ? 'check' : 'ban' }}"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
