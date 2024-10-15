@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($status === 'Not registered')
                    <p>Status: Not registered. <a href="{{ route('register') }}">Register here</a></p>
                @else
                    <p>Name: {{ $user->name }}</p>
                    <p>Status: {{ $status }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
