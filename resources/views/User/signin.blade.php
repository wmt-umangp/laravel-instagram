@extends('layouts.master')
@section('title')
   Login
@endsection

@section('content')
<div class="body-1 d-md-flex align-items-center justify-content-between">
    <div class="box-1 mt-md-0 mt-5"> <img src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="img-fluid" alt="main image"> </div>
    <div class=" box-2 d-flex flex-column h-100">
        <div class="mt-2">
            <div class="d-flex justify-content-around">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/2560px-Instagram_logo.svg.png" alt="instagram logo" width="200" height="200" class="img-fluid">
            </div>

            <div class="px-3">
                <p class="mb-1 h-1">{{ isset($url) ? ucwords($url) : '' }} Login</p>
                <div>
                    @isset($url)
                        <form action='{{url("login/$url")}}' method="POST" id="signin">
                    @else
                    <form action="{{route('signin')}}" method="POST" id="signin">
                    @endisset
                        @csrf
                        <div class="mb-3 mt-3 pmd-textfield">
                            <label for="uname" class="form-label">Username</label>
                            <input type="text" class="form-control border-1 rounded-0" name="uname" id="uname" placeholder="Enter Username">
                            @if ($errors->has('uname'))
                                <span class="text-danger">*{{ $errors->first('uname') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 mt-3 pmd-textfield">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control border-1 rounded-0" id="password" placeholder="Enter Password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">*{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <button class="btn-1" type="submit">Signin</button>
                    </form>
                </div>
                <div class="mt-3">
                    <p class="mb-0 text-muted">Create account</p>
                    <a class="btn btn-primary" href="{{route('showsignup')}}">Sign up<span class="fas fa-chevron-right ms-1"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
@endsection
