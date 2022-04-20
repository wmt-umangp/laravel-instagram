<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AddPostFormRequest;
use App\Http\Requests\EditPostFormRequest;
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

        if(substr($files->getMimeType(), 0, 5) == 'image') {
            $post->media_type=1;
        }
        elseif(substr($files->getMimeType(), 0, 5) == 'video'){
            $post->media_type=0;
        }
        // dd($request->user()->posts());
        if($request->user()->posts()->save($post)){
            return redirect()->route('home')->with('success','Post created Successfully!!');
        }
    }
    public function showpostdetails($id){
        $post=Post::find($id);
        return view('Post.showpostdetails',['post'=>$post]);
    }
    public function deletepost($id){
        $post=Post::find($id);
        $folder='public/post_images/User-'.Auth::user()->id."_".Auth::user()->uname.'/';
        if($post->post_media != ''  && $post->post_media != null){
            $file_old = $folder.$post->post_media;
            // dd($file_old);
            if(Storage::exists($file_old)){
                Storage::delete($file_old);
            }else{
                dd('File not found.');
            }
        }
        $post->delete();
        return redirect()->route('home')->with('success','Post Deleted Successfully!!');
    }
    public function editPost($id){
        $post=Post::find($id);
        return view('Post.editpost',['post'=>$post]);
    }
    public function updatePost(EditPostFormRequest $request, $id){
        // echo $id;
        $post=Post::find($id);
        $folder='public/post_images/User-'.Auth::user()->id."_".Auth::user()->uname.'/';
        $files = $request->file('post_image');
        $filename=$files->getClientOriginalName();
        $files->storeAs($folder,$filename);
        $post->post_title=$request->title;
        $post->post_desc=$request->desc;
        $post->post_media=$filename;

        if(substr($files->getMimeType(), 0, 5) == 'image') {
            $post->media_type=1;
        }
        elseif(substr($files->getMimeType(), 0, 5) == 'video'){
            $post->media_type=0;
        }
        $post->update();
        return redirect()->route('home')->with('success','Post Details Updated Successfully!!');
    }
    public function filterpost(Request $request){
        // if($request['filter_type']=='all'){
        //     $post=new Post;
        //     $post->get('post_media');
        // }
        // return response()->json('hello bye');
        // $hello= "Hello";
        // return response()->json($hello);
        if($request['filter_type']=='all'){
            $post=Post::all('post_media');
            return response()->json($post);
        }
        else if($request['filter_type']=='image'){
            $post1=Post::all('post_media')->where('media_type',1);
            return response()->json($post1);
        }

        // return response()->json($post);
    }
}
