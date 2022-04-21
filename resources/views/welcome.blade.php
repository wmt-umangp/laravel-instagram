@extends('layouts.master-2')
@section('title')
    Welcome
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div style="position: absolute;top:50%;">
            <h1>Welcome, {{Auth::user()->name}}</h1>
        </div>
    </div>
@endsection
