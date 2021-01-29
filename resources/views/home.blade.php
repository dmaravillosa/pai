@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h4>Home Panel</h4>
                </div>
                <div class="col-md-6 text-right">
                    @if($user_id != 1 && $user_id != 2)
                        <a class="btn btn-success" href="/classroom/view"><i class="fas fa-plus"></i> Create Classes</a>
                    @endif
                </div>
            </div>

            <hr>
        </div>

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
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-archive"></i></button>
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
@endsection
