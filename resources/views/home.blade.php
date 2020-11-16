@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Portal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Create Teacher Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
