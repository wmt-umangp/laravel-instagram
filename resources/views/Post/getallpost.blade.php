@extends('layouts.master-2')

@section('title')
    Other Users Post
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            @foreach ($post as $pm)
                @if ($pm->media_type == 1)
                    <div class="col-3 mt-5">
                        <div>
                            <h3>{{ $pm->post_title }}</h3>
                        </div>
                        <div>{{ $pm->post_desc }}</div>
                        <a href="{{route('showotherspostdetails',['soid'=>$pm->id])}}"  class="show-post">
                            <img src="{{ asset('storage/post_images/User-' . $pm->user->id . '_' . $pm->user->uname . '/' . $pm->post_media) }}"
                            alt="post-images" class="imgpost1" width="200" height="200">
                        </a>
                        <div><small>Posted By{{' '.$pm->user->name}} {!!'<br>On '.$pm->created_at->format('d-m-Y h:i:s')!!}</small></div>
                    </div>
                @elseif ($pm->media_type == 0)
                    <div class="col-3 mt-5">
                        <div>
                            <h3>{{ $pm->post_title }}</h3>
                        </div>
                        <div>{{ $pm->post_desc }}</div>
                        <a href="{{route('showotherspostdetails',['soid'=>$pm->id])}}"  class="show-post">
                            <video autoplay loop muted width="200" height="200" style="line-height:0;object-fit:cover;">
                                <source
                                    src="{{ asset('storage/post_images/User-' . $pm->user->id . '_' . $pm->user->uname . '/' . $pm->post_media) }}">
                            </video>
                        </a>
                        <div><small>Posted By{{' '.$pm->user->name}} {!!'<br>On '.$pm->created_at->format('d-m-Y h:i:s')!!}</small></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
