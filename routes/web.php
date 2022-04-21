<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// to display signup page
Route::get('/signup',[UserController::class,'showsignup'])->name('showsignup');

//for signup
Route::post('/signup/signupUser',[UserController::class,'postSignUp'])->name('signup');

//to display  signin page
Route::get('/',[UserController::class,'showsignin'])->name('showsignin');

// for signin
Route::post('/signinUser',[UserController::class,'postSignIn'])->name('signin');

//for welcome page
Route::get('/welcome',[PostController::class,'getHome'])->name('welcome');

//for homepage
Route::get('/home',[PostController::class,'getownpost'])->name('home');

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

//to see other users post
Route::get('/otheruserspost',[PostController::class,'getallposts'])->name('othersposts');

//to see other users post details
Route::get('/otheruserspost/otheruserspostdetails/{soid}',[PostController::class,'showotherspostdetails'])->name('showotherspostdetails');

//to show add comment
Route::get('/comments/{cid}',[CommentController::class,'showcommentform'])->name('showcommentform');

//for addcomment
Route::post('/addcomments',[CommentController::class,'addcomment'])->name('addcomment');

//for post filter
// Route::get('/filterpost',[PostController::class,'filterpost'])->name('filterpost');

Route::get('/like/{id}',[PostController::class,'save_like'])->name('reply.like');
Route::get('/dislike/{id}',[PostController::class,'save_dislike'])->name('reply.dislike');

// for logout
Route::get('/logout',[UserController::class,'getLogout'])->name('logout');



