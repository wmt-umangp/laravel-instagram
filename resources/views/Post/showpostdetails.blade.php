@extends('layouts.master-2')

@section('title')
    Show Post
@endsection

@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card mb-3 mt-5" style="width: 540px;">
                    <h3 class="text-center card-header">Post Details</h3>
                    <div class="row g-0">
                        <div class="col-md-6 showposts">
                            @if ($post->media_type == 1)
                                <img src="{{ asset('storage/post_images/User-' . Auth::user()->id . '_' . Auth::user()->uname . '/' . $post->post_media) }}"
                                    alt="post_image" width="200" height="200">
                            @elseif ($post->media_type == 0)
                                <video autoplay loop muted width="200" height="200" style="line-height:0;object-fit:cover;">
                                    <source
                                        src="{{ asset('storage/post_images/User-' . Auth::user()->id . '_' . Auth::user()->uname . '/' . $post->post_media) }}">
                                </video>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->post_title }}</h5>
                                <p class="card-text"><span class="post-desc">{{ $post->post_desc }}</span></p>
                                <p class="card-text"><span class="post-creation">{{ $post->created_at->format('d/m/Y h:i:s') }}</span></p>
                                <div class="d-flex flex-row justify-content-start">
                                    <span><a href="{{route('editpost',['eid'=>$post->id])}}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a></span>
                                    <form method="POST" action="{{ route('deletepost', ['did' => $post->id]) }}"
                                        style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE" style="display: inline !important;">
                                        <button type="submit" class="btn show_confirm border-0"
                                            style="display: inline !important; " data-toggle="tooltip" title='Delete'>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.show_confirm').click(function(event) {

            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
