<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AddPostFormRequest;
use App\Http\Requests\EditPostFormRequest;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Country;
use Auth, Controllers, Session, Storage;
class PostController extends Controller
{
    public function getHome(){
        return  view('welcome');
    }
    public function getownpost(Request $request){
        $user=Auth::user();
        if($request->filter=="all"){
            $post=Post::orderBy('created_at','desc')->get()->where('user_id',$user->id);
        }else if($request->filter=="image"){
            $post=Post::orderBy('created_at','desc')->where('user_id',$user->id)->where('media_type',1)->get();
        }else{
            $post=Post::orderBy('created_at','desc')->where('user_id',$user->id)->where('media_type',0)->get();
        }
        return view('homepage',array('user' => $user,'post'=>$post));

    }
public function getaddForm(){
    $country=Country::all();
    return view('Post.addpost',['country'=>$country]);
}
    public function getallposts(Request $request){
        $post=Post::with('country')->groupBy('country_id')->get();
        // dd($post);
        if($request->country=="all"){
            $post1=Post::all();
        }else{
            $post1=Post::all()->where('country_id',$request->country);
        }
        return view('Post.getallpost',array('post'=>$post,'post1'=>$post1));
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
        $post->country_id=$request->post_country;
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
        $country=Country::all();
        return view('Post.editpost',array('post'=>$post,'country'=>$country));
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
        $post->country_id=$request->post_country;
        $post->update();
        return redirect()->route('home')->with('success','Post Details Updated Successfully!!');
    }
    // public function filterpost(Request $request){

    //     // if($request['filter_type']=='all'){
    //     //     $post=Post::all('post_media');
    //     //     return response()->json($post);
    //     // }
    //     // elseif($request['filter_type']=='image'){
    //     //     $post1=Post::where('media_type',1)->get('post_media');
    //     //     return response()->json($post1);
    //     // }
    //     // elseif($request['filter_type']=='video'){
    //     //     $post2=Post::where('media_type',0)->get('post_media');
    //     //     return response()->json($post2);
    //     // }
    //     // if($request->filter=='image'){
    //     //     // dd($request->filter);
    //     //     $user=Auth::user();
    //     //     $post1=Post::where('media_type',1)->get('post_media');
    //     //     return view('homepage',array('user' => $user,'post'=>$post1));
    //     // }
    //     // else if($request->filter=='video'){
    //     //     $user=Auth::user();
    //     //     $post2=Post::where('media_type',0)->get('post_media');
    //     //     return view('homepage',array('user' => $user,'post'=>$post2));
    //     // }
    // }

    public function save_like(Request $request,$id){
        $like= new Like;
        $like->post_id=$id;
        $like->user_id=Auth::id();
        $like->like_dislike=1;
        $like->save();
        Session::flash('success','you liked the post');
        return redirect()->back();
    }
    //delete desilikes
    public function save_dislike($id){
        $like=Like::where('post_id',$id)->where('user_id', Auth::id())->first();
        $like->delete();
        Session::flash('success','You Disliked The Post');
        return redirect()->back();
    }
    public function showotherspostdetails($id){
        $post=Post::find($id);
        return view('Post.showotherspostdetails',['post'=>$post]);
    }
}
