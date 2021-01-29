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
                        S.Y. {{ $config->school_year }} (
                        <select name="quarter">
                            <option value="1" {{ $config->quarter == '1' ? 'selected' : '' }}>1st</option>
                            <option value="2" {{ $config->quarter == '2' ? 'selected' : '' }}>2nd</option>
                            <option value="3" {{ $config->quarter == '3' ? 'selected' : '' }}>3rd</option>
                            <option value="4" {{ $config->quarter == '4' ? 'selected' : '' }}>4th</option>
                        </select>
                        Quarter)
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i></button>
                    </form>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/announcement">Announcements</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="/classess">Classes</a>
                </li>
            </ul>
        </div>
        
        <div class="col-md-12 mt-3">
            <table class="table bg-white text-center">
                <thead>
                    <tr>
                        <th scope="col">Grade</th>
                        <th scope="col" colspan="7" class="text-left">Section</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col" class="text-center">Students</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classrooms as $classroom)
                    <tr>
                        <td>
                            <div class="m-3">
                                {{ $classroom->level }}
                            </div>
                        </td>
                        <td colspan="7" class="text-left">
                            <div class="m-3">
                                {{ $classroom->name }}
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="m-3">
                                {{ count($classroom->students) }}
                            </div>
                        </td>
                        <td>
                            <div class="row m-2">
                                <div class="col-md-6 text-right">
                                    <a href="/students/view/{{ $classroom->id }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                </div>

                                <div class="col-md-6 text-left">
                                    <form action="/confirm" method="GET">
                                        @csrf
                                        <input type="hidden" name="endpoint" value="/classroom/delete/{{ $classroom->id }}">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection