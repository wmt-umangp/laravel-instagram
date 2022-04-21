@foreach($comments as $comment)
    <div class="row">
        <div class="col-6">
            <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->comment_body }}</p>
            </div>
        </div>
    </div>
@endforeach
