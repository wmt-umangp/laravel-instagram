<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth, Session;
class CommentController extends Controller
{
    public function showcommentform($id){
        // echo "Hello".$id;
        $post=Post::find($id);
        // dd($post);
        return view('Comment.addcomment',['post'=>$post]);
    }
    public function addcomment(Request $request){
        // echo "Hello";
        $request->validate([
            'comment_body'=>'required',
        ]);

        $input = $request->all();
        // dd($input);
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}
