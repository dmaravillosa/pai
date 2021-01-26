@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Status') }}</div>

                <div class="card-body">

                    {{ $message }}

                </div>

                <div class="card-footer">
                @guest
                    <a href="{{ url('/students/list') }}" class="text-sm text-gray-700 underline"> Go back to Dashboard</a>
                @else
                    @if(auth()->user()->id == 1 || auth()->user()->id == 2)
                        <a href="{{ route('admin') }}" class="text-sm text-gray-700 underline"> Go back to Dashboard</a>
                    @else
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"> Go back to Dashboard</a>
                    @endif
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
