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
                    <div class="row">
                        <div class="col-md-6">
                            @if(auth()->user()->role == 'Administrator' || auth()->user()->role == 'Principal' || auth()->user()->role == 'Registrar')
                                <a href="{{ route('admin') }}" class="text-sm text-gray-700 underline"> Go back to Dashboard</a>
                            @else
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"> Go back to Dashboard</a>
                            @endif
                        </div>
                        <div class="col-md-6 text-right">
                            <form action="{{ $endpoint }}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-success">Proceed</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
