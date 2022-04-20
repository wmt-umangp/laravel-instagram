<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

// to display signup page
Route::get('/signup',[UserController::class,'showsignup'])->name('showsignup');

//for signup
Route::post('/signup/signupUser',[UserController::class,'postSignUp'])->name('signup');

//to display  signin page
Route::get('/',[UserController::class,'showsignin'])->name('showsignin');

// for signin
Route::post('/signinUser',[UserController::class,'postSignIn'])->name('signin');

//for homepage
Route::get('/home',[PostController::class,'getHome'])->name('home');

//to display user account details
Route::get('/home/account',[UserController::class,'getAccount'])->name('account');

//to display edit account page
Route::get('/home/account/showeditform',[UserController::class,'editAccountDisplay'])->name('showeditaccount');

//for edit account
Route::post('/home/account/editaccount',[UserController::class,'postSaveAccount'])->name('editUserAccount');


//to show create post page
Route::get('/addpost',[PostController::class,'getaddForm'])->name('showaddpost');

//for add post
Route::post('/addpost/savepost',[PostController::class,'addPost'])->name('addpost');

//for show post details
Route::get('/showpost/{sid}',[PostController::class,'showpostdetails'])->name('showpostdetails');

//for post delete
Route::delete('/showpost/deletepost/{did}', [PostController::class, 'deletepost'])->name('deletepost');

//for post edit
Route::get('/showpost/editpost/{eid}',[PostController::class,'editPost'])->name('editpost');

//for post update
Route::post('/showpost/updatepost/{uid}',[PostController::class,'updatePost'])->name('updatepost');


//for post filter
Route::get('/filterpost',[PostController::class,'filterpost'])->name('filterpost');

// for logout
Route::get('/logout',[UserController::class,'getLogout'])->name('logout');



