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

                        <input type="hidden" name="page" value="admin">

                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i></button>
                        <a href="/syc/create/{{$config->id}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                        <span class="border border-dark mr-1"></span>

                        <a href="/admin?archived={{ !$archived }}" class="btn btn-sm {{ !$archived ? 'btn-secondary' : 'btn-primary' }}"><i class="fas fa-{{ !$archived ? 'archive' : 'sync-alt' }}"></i></a>
                    </form>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="/admin">
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/announcement">Announcements</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/classess">Classes</a>
                </li>
            </ul>
        </div>
        
        <div class="col-md-4">
            <form action="/admin" method="GET">
                <div class="input-group">
                    <input type="text" name="filter" class="form-control" style="border-radius: 50px;" placeholder="Classroom">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded ml-2"><i class="fas fa-search"></i></button>
                        &nbsp;
                    </div>
                    <a class="btn btn-danger" href="/admin"><i class="fas fa-sync-alt"></i></a>
                    &nbsp;
                    <a class="btn btn-success" href="/register"><i class="fas fa-plus"></i> Create User</a>
                </div>
            </form>
        </div>

        
        <div class="col-md-12 mt-3">
            <table class="table bg-white text-center">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col" colspan="7" class="text-left">Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center">Last Login</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!isset($users[0]))
                        <div class="mt-4 text-center">
                            <p>No saved users.</p>
                        </div>
                    @else
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="m-3">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td colspan="7">
                                <div class="m-3 text-left">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> {{ $user->role }} </td>
                            <td> {{ $user->last_login ? $user->last_login : '-' }} </td>
                            <td>
                                <div class="row m-2">
                                    <div class="col-md-6 text-right">
                                        <a href="/teachers/edit/{{ $user->id }}" class="btn btn-primary m-0"><i class="fas fa-edit"></i></a>
                                    </div>

                                    <div class="col-md-6 text-left">
                                        <form action="/confirm" method="GET">
                                            @csrf
                                            <input type="hidden" name="archived" value="{{ $archived }}">

                                            @if(!$archived)
                                                <input type="hidden" name="endpoint" value="/teachers/delete/{{ $user->id }}">
                                                <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i></button>
                                            @else
                                                <input type="hidden" name="endpoint" value="/teachers/restore/{{ $user->id }}">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i></button>
                                            @endif
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
