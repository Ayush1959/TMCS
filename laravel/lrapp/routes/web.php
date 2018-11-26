<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $user = App\user::find(1)->passport;
    $role = App\user::find(1)->roles;
    $user1 = App\role::find(2)->users;
    $post = App\country::find(1)->posts;
    $vcomments = App\video::first()->comments;
    // $pcomments = App\post::first()->comments;
    $pcomments = App\post::all()->first()->comments;
    $postt = App\post::first();
    $posttv = App\video::first();

    return $posttv->tags;
    // return $postt->tags;
    // return $pcomments;
    // return $vcomments;
    // return $post;
    // return $user; 
    // return $role;
    // return $user1;
    // return view('welcome', compact('user'));
    // return view('welcome', compact('postt'));
});

// Route::get('/1', function () {
//     $user = App\user::find(1)->passport;
//     return view('welcome', compact('user'));
// });
