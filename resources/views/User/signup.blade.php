@extends('layouts.master')
@section('title')
    Signup
@endsection

@section('content')
<div class="body d-md-flex">
    <div class="box-1 mt-md-0 mt-5"> <img src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="img-fluid" alt="main image"> </div>
    <div class=" box-2 d-flex flex-column h-100">
        <div class="mt-2">
            <div class="d-flex justify-content-around">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/2560px-Instagram_logo.svg.png" alt="instagram logo" width="250" height="200" class="img-fluid">
            </div>

            <div class="px-3">
                <p class="mb-1 h-1">Create Account.</p>
                <p class="text-muted mb-2">Share your thoughts with the world from today.</p>
                <div>
                    <form action="{{route('signup')}}" id="signup" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control border-1 rounded-0" name="name" id="name" placeholder="Enter Your Name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="text-danger">*{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="uname" class="form-label">Username</label>
                            <input type="text" class="form-control border-1 rounded-0" name="uname" id="uname" placeholder="Enter Username" value="{{old('uname')}}">
                            @if ($errors->has('uname'))
                                <span class="text-danger">*{{ $errors->first('uname') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control border-1 rounded-0" id="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">*{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="dob" class="form-label">DoB</label>
                            <input type="date" class="form-control border-1 rounded-0" id="dob" placeholder="Enter Date of Birth" name="dob" min="1925-01-01" max="2005-01-01" value="{{old('dob')}}">
                            @if ($errors->has('dob'))
                                <span class="text-danger">*{{ $errors->first('dob') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="profile" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control border-1 rounded-0" id="profile" placeholder="Upload profile picture" name="profile">
                            @if ($errors->has('profile'))
                                <span class="text-danger">*{{ $errors->first('profile') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control border-1 rounded-0" id="password" placeholder="Enter Password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">*{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control border-1 rounded-0" id="cpassword" placeholder="Enter Password Again" name="cpassword">
                            @if ($errors->has('cpassword'))
                                <span class="text-danger">*{{ $errors->first('cpassword') }}</span>
                            @endif
                        </div>
                        <button class="btn-1" type="submit">Signup</button>
                    </form>
                </div>
                <div class="mt-3">
                    <p class="mb-0 text-muted">Already have an account?</p>
                    <a href="{{route('showsignin')}}" class="btn btn-primary">Log in<span class="fas fa-chevron-right ms-1"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
