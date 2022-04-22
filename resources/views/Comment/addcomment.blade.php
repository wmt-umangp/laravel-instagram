@extends('layouts.master-2')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Comments</h3>
                    <br/>
                    <h2>{{ $post->post_title }}</h2>
                    <p>
                        {{ $post->post_desc }}
                    </p>
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{route('addcomment')}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment_body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                            <a href="{{route('othersposts')}}" type="button" class="btn btn-danger">cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
