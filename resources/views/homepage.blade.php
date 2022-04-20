@extends('layouts.master-2')

@section('title')
    Home Page
@endsection

@section('content')
    {{-- <div class="d-flex justify-content-center">
    <div style="position: absolute;top:50%;">
        <h1>Welcome, {{Auth::user()->name}}</h1>
    </div>
</div> --}}

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <div class="container px-5">
        <div class="row px-5 mt-5">
            <div class="col-12 col-md-4 mt-5 text-end">
                <img src="{{ asset('storage/user_images/' . $user->profile_image) }}" alt="User_profile" width="150"
                    height="150" class="rounded-circle">
            </div>

            <div class="col-12 col-md-6 mt-5">
                <p class="display-6 ms-md-5">{{ $user->uname }}</p>
                <p class="ms-md-5 text-center text-md-start">{{ $user->name }}</p>
            </div>
            <div class="col-12 col-md-2 mt-md-5 text-center">
                <a href="{{ route('showaddpost') }}" class="btn btn-primary mt-5">Add Post</a>
            </div>
        </div>

        <div class="row g-5 mt-5 justify-content-center">
            <div class="col-12">
                <form method="GET">
                    @csrf
                    <select name="filter" id="filter" class="form-control" >
                        <option value="" selected>Select Filter</option>
                        <option value="all">All Post</option>
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                </form>
            </div>
            @if (Request::input('filter'))
                {{dd(Request::input('filter'))}}
            @endif
            @foreach ($post as $pm)
                @if ($pm->media_type == 1)
                    <div class="col-12 col-md-3">
                        <a href="{{route('showpostdetails',['sid'=>$pm->id])}}"  class="show-post">
                            <img src="{{ asset('storage/post_images/User-' . $user->id . '_' . $user->uname . '/' . $pm->post_media) }}"
                                alt="post-images" width="200" height="200">
                        </a>
                    </div>
                @elseif ($pm->media_type == 0)
                    <div class="col-12 col-md-3">
                        <a href="{{route('showpostdetails',['sid'=>$pm->id])}}" data-showid={{ $pm->id }} class="show-post">
                            <video autoplay loop muted width="200" height="200" style="line-height:0;object-fit:cover;">
                                <source
                                    src="{{ asset('storage/post_images/User-' . $user->id . '_' . $user->uname . '/' . $pm->post_media) }}">
                            </video>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

  <script>
      function filterpost(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // console.log('Hello');
        var type=$('#filter').val();
        // console.log(type);
        var url="{{route('filterpost')}}";

        $.ajax({
            type: "GET",
            url: url,
            data: {
                filter_type:type,
            },
            success: function(data){
              console.log(data)
            }
        });
    }
  </script>
@endsection



