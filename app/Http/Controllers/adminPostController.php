<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class adminPostController extends Controller
{

    public function getadminhome(){
       return view('admindash');
    }
    public function admingetallposts(){
        $post=Post::all();
        return view('adminallpost',['post'=>$post]);
    }
    public function alogout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            session::flush();
            return redirect()->route('showsignin');
        }
    }
}
