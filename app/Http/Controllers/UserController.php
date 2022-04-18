<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SignUpFormRequest;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\EditUserAccountFormRequest;
use App\Models\User;
use Hash, Auth, Session, Storage;

class UserController extends Controller
{
   public function showsignup(){
        return view('User.signup');
   }
   public function showsignin(){
        return view('User.signin');
   }
   public function postSignUp(SignUpFormRequest $request){
    $user=new User;
    $name=$request->name;
    $uname=$request->uname;
    $email=$request->email;
    $dob=$request->dob;
    $password=$request->password;

    $user->name=$name;
    $user->uname=$uname;
    $user->email=$email;
    $user->dob=$dob;
    $user->password=Hash::make($password);
    $files = $request->file('profile');
    $folder='public/user_images/';
    $filename=date('y_m_d_').$uname.'.'.$files->getClientOriginalExtension();
    if (!Storage::exists($folder)) {
        Storage::makeDirectory($folder, 0775, true, true);
    }
    $files->storeAs($folder,$filename);
    $user->profile_image=$filename;
    $user->save();
    Auth::login($user);
    Session::put('log',$uname);
    // echo "Registered Successfully";
    return redirect()->route('home')->with('rmsg','Great! You have Successfully loggedin');
    }
    public function postSignIn(SignInFormRequest $req){
        $uname=$req->input('uname');
        $password=$req->input('password');
        if(Auth::attempt(['uname' => $uname, 'password' => $password])){
            Session::put('log',$uname);
            echo "Logined Successfully!!";
            return redirect()->route('home')->with('logined','You have Successfully loggedin');
        }
        return redirect()->back()->with('logerror','Invalid User Credentials');

    }
    public function getHome(){
        return view('homepage');
    }
    public function getAccount(){
        return view('User.account',['user'=>Auth::user()]);
    }
    public function editAccountDisplay(){
        return view('User.editaccount',['user'=>Auth::user()]);
    }
    public function postSaveAccount(EditUserAccountFormRequest $request){
        $user=Auth::user();
        $user->name=$request->name;
        $user->uname=$request->uname;
        $user->email=$request->email;
        $files = $request->file('profile');
        $folder='public/user_images/';
        $file_old=$folder.$user->profile_image;
        // dd($file_old);
        if(Storage::exists($file_old)){
            Storage::delete($file_old);
        }else{
            dd('File not found.');
        }
        $filename=date('y_m_d_').$request->uname.'.'.$files->getClientOriginalExtension();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $files->storeAs($folder,$filename);
        $user->profile_image=$filename;
        $user->update();
        return redirect()->route('account');
    }
    public function getLogout(){
        Auth::logout();
        session::flush();
        return redirect()->route('showsignin');
    }
}
