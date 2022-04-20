@extends('layouts.master-2')

@section('title')
    Edit Post
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col mt-5">
                <h3 class="text-center">Edit Post</h3>
                <form action="{{route('updatepost',['uid'=>$post->id])}}" method="POST" id="addpost" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" class="form-control border-1 rounded-0" name="title" id="title" placeholder="Enter Post Title" value="{{$post->post_title}}">
                        @if ($errors->has('title'))
                        <span class="text-danger">*{{ $errors->first('title') }}</span>
                    @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea name="desc" class="form-control border-1 rounded-0" id="desc" cols="30" rows="2">{{$post->post_title}}</textarea>
                        @if ($errors->has('desc'))
                            <span class="text-danger">*{{ $errors->first('desc') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="post_image" class="form-label">Post Image</label>
                        <input type="file" class="form-control border-1 rounded-0" name="post_image" id="post_image">
                        @if ($errors->has('post_image'))
                            <span class="text-danger">*{{ $errors->first('post_image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
