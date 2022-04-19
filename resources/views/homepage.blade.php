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
    <div class="container px-5">
        <div class="row px-5 mt-5">
            <div class="col-4 mt-5 text-end">
                <img src="{{ asset('storage/user_images/' . $user->profile_image) }}" alt="User_profile" width="150"
                    height="150" class="rounded-circle">
            </div>

            <div class="col-6 mt-5">
                <p class="display-6 ms-5">{{ $user->uname }}</p>
                <p class="ms-5">{{ $user->name }}</p>
            </div>
            <div class="col-2 mt-5">
                <a href="{{ route('showaddpost') }}" class="btn btn-primary mt-5">Add Post</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#post-image" type="button" role="tab" aria-controls="post-image"
                            aria-selected="true">Images</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#post-video" type="button" role="tab" aria-controls="post-video"
                            aria-selected="false">Video</button>
                    </li>

                </ul>
            </div>
        </div>
        <div class="tab-content mb-5">
            <div class="tab-pane fade show active" id="post-image" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row g-5">
                    <div class="col-12">
                        @foreach ($post as $pm)
                            <img src="{{ asset('storage/post_images/User-' . $user->id . '_' . $user->uname . '/' . $pm->post_media) }}"
                                alt="" width="200" height="200" class="me-5 mt-5">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="post-video" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row mt-5">
                    <div class="col-12">
                        hello
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
