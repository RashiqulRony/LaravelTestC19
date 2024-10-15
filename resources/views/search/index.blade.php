@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('search-result') }}" method="GET">
                    <div class="row">
                        <div class="col-10">
                            <label for="nid">Enter NID to check status:</label>
                            <input class="form-control" type="text" name="nid" required>
                        </div>
                        <div class="col-2">
                            <br/>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
