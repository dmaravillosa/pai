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

                        <input type="hidden" name="page" value="announcement">

                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i></button>
                        <a href="/syc/create/{{$config->id}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

                        <span class="border border-dark mr-1"></span>

                        <a href="/announcement?archived={{ !$archived }}" class="btn btn-sm {{ !$archived ? 'btn-secondary' : 'btn-primary' }}"><i class="fas fa-{{ !$archived ? 'archive' : 'sync-alt' }}"></i></a>
                    </form>
                </div>
            </div>

            <hr>
        </div>

        <div class="col-md-10">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/announcement">Announcements</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/classess">Classes</a>
                </li>
            </ul>
        </div>

        <div class="col-md-2 text-right">
            <a class="btn btn-success btn-sm" href="/updates/create"><i class="fas fa-plus"></i> Create Announcements</a>
        </div>
        
        <div class="col-md-12 mt-3">
            <table class="table bg-white text-center">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col" colspan="7" class="text-left">Description</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!isset($events[0]))
                        </tbody></table>
                        <div class="mt-4 text-center">
                            <p>No saved announcements.</p>
                        </div>
                    @else
                        @foreach($events as $event)
                        <tr>
                            <td>
                                <div class="m-3">
                                    {{ $event->title }}
                                </div>
                            </td>
                            <td colspan="7">
                                <div class="m-3 text-left">
                                    {{ $event->description }}
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="row m-2">
                                    <div class="col-md-6 text-right">
                                        <a href="/updates/edit/{{ $event->id }}" class="btn btn-primary m-0"><i class="fas fa-edit"></i></a>
                                    </div>

                                    <div class="col-md-6 text-left">
                                        <form action="/confirm" method="GET">
                                            @csrf
                                            <input type="hidden" name="archived" value="{{ $archived }}">
                                            
                                            @if(!$archived)
                                                <input type="hidden" name="endpoint" value="/updates/delete/{{ $event->id }}">
                                                <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i></button>
                                            @else
                                                <input type="hidden" name="endpoint" value="/updates/restore/{{ $event->id }}">
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
