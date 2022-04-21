@extends('layouts.master-2')

@section('title')
    Show Other Post
@endsection

@section('content')
    {{-- <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head> --}}
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card mb-3 mt-5" style="width: 540px;">
                    <h3 class="text-center card-header">Post Details</h3>
                    <div class="row g-0">
                        <div class="col-md-6 showposts">
                            @if ($post->media_type == 1)
                                <img src="{{ asset('storage/post_images/User-' .$post->user->id . '_' .$post->user->uname . '/' . $post->post_media) }}"
                                    alt="post_image" width="200" height="200">
                            @elseif ($post->media_type == 0)
                                <video autoplay loop muted width="200" height="200" style="line-height:0;object-fit:cover;">
                                    <source
                                        src="{{ asset('storage/post_images/User-' .$post->user->id . '_'  .$post->user->uname . '/' . $post->post_media) }}">
                                </video>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->post_title }}</h5>
                                <p class="card-text"><span class="post-desc">{{ $post->post_desc }}</span></p>
                                <p class="card-text"><span class="post-creation">{{ $post->created_at->format('d/m/Y h:i:s') }}</span></p>
                                <div class="d-flex flex-row justify-content-start">
                                    @if($post->is_liked_by_auth_user())
                                        <a href="{{route('reply.dislike',['id'=>$post->id])}}" class="fa-solid fa-thumbs-down text-decoration-none  text-dark mt-2 ms-1 me-1" style="font-size:20px"></a>
                                    @else
                                        <a href="{{route('reply.like',['id'=>$post->id])}}" class="fa-solid fa-thumbs-up text-decoration-none  text-dark mt-2 ms-1 me-1" style="font-size:20px"></a>
                                    @endif
                                    <a href="{{route('showcommentform',['cid'=>$post->id])}}" class="btn ms-3"><i class="fa-solid fa-comments"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
