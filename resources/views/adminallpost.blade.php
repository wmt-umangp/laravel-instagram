@extends('layouts.master-3')

@section('title')
    All Posts
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center">
            @foreach ($post as $pm)
                @if ($pm->media_type == 1)
                    <div class="col-3 mt-5">
                        <div>
                            <h3>{{ $pm->post_title }}</h3>
                        </div>
                        <div>{{ $pm->post_desc }}</div>
                            <img src="{{ asset('storage/post_images/User-' . $pm->user->id . '_' . $pm->user->uname . '/' . $pm->post_media) }}"
                                alt="post-images" class="imgpost1" width="200" height="200">
                        <div><small>Posted By{{ ' ' . $pm->user->name }} {!! '<br>On ' . $pm->created_at->format('d-m-Y h:i:s') !!}</small></div>
                    </div>
                @elseif ($pm->media_type == 0)
                    <div class="col-3 mt-5">
                        <div>
                            <h3>{{ $pm->post_title }}</h3>
                        </div>
                        <div>{{ $pm->post_desc }}</div>
                            <video autoplay loop muted width="200" height="200" style="line-height:0;object-fit:cover;">
                                <source
                                    src="{{ asset('storage/post_images/User-' . $pm->user->id . '_' . $pm->user->uname . '/' . $pm->post_media) }}">
                            </video>
                        <div><small>Posted By{{ ' ' . $pm->user->name }} {!! '<br>On ' . $pm->created_at->format('d-m-Y h:i:s') !!}</small></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
