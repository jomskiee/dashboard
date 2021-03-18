@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong>Details: </strong>{{ Auth::user()->name }}</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p>Name:</p>
                        <p>Email Address:</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{ Auth::user()->name }}</p>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection