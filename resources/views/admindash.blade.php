@extends('layouts.master-3')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col mt-5">
                <h3 class="text-center">
                    Welcome, {{Auth::user()->name}}
                </h3>
            </div>
        </div>
    </div>
@endsection
