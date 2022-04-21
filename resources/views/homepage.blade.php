@extends('layouts.master-2')

@section('title')
    Home Page
@endsection

@section('content')


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
                {{-- <form action="{{route('filterpost')}}" method="get">
                    <select name="filter" id="filter" class="form-control">
                        <option value="" selected disabled>Select Filter</option>
                        {{-- <option value="all">All Post</option> --}}
                        {{-- <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form> --}}
            </div>
            @foreach ($post as $pm)
                @if ($pm->media_type == 1)
                    <div class="col-12 col-md-3">
                        <a href="{{route('showpostdetails',['sid'=>$pm->id])}}"  class="show-post">
                            <img src="{{ asset('storage/post_images/User-' . $user->id . '_' . $user->uname . '/' . $pm->post_media) }}"
                                alt="post-images" class="imgpost1" width="200" height="200">
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

  {{-- <script>
      $('#filter').on('change',function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // console.log('Hello');
        var type=$('#filter').val();
        // console.log(type);
        var url="{{route('filterpost')}}";
        var bookimgpath="{{asset(Storage::disk('local')->url('public/bookimg/'))}}"+"/"
        var imgpath="{{asset('storage/post_images/User-'.Auth::user()->id.'_'.Auth::user()->uname)}}"+"/"
        console.log(imgpath);
        // console.log(url,type);

        $.ajax({
            type: "GET",
            url: url,
            data: {
                filter_type:type,
            },
            success: function(data){
                // console.log(data);
                // console.log(imgpath+data['post_media']);
                $.each(data, function(key,val) {
                    // console.log(val);
                    // console.log(key,val['post_media']);
                    // console.log(imgpath+val['post_media']);
                    // $('.imgpost1').attr('src',imgpath+val['post_media']);
                    // $('source').attr('src',imgpath+val['post_media']);
                });
            }
        });
        // console.log("Hello");
      });
  </script> --}}
@endsection



