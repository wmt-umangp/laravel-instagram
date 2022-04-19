<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AddPostFormRequest;
use App\Models\Post;
use Auth, Controllers, Session, Storage;
class PostController extends Controller
{
    public function getHome(){
        $user=Auth::user();
        $post=Post::orderBy('created_at','desc')->get()->where('user_id',$user->id);
        return view('homepage',array('user' => $user,'post'=>$post));
    }
    public function getaddForm(){
        return view('Post.addpost');
    }
    public function addPost(AddPostFormRequest $request){
        $post= new Post;
        // $post->user();
        // dd($post->user()->id);
        $post->post_title=$request->title;
        $post->post_desc=$request->desc;
        $files = $request->file('post_image');
        $folder='public/post_images/User-'.Auth::user()->id."_".Auth::user()->uname.'/';
        $filename=$files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $files->storeAs($folder,$filename);
        $post->post_media=$filename;
        // dd($request->user()->posts());
        if($request->user()->posts()->save($post)){
            return redirect()->route('home')->with('success','Post created Successfully!!');
        }
    }
}
