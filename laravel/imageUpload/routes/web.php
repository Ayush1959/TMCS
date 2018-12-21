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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// UPLOAD BASE +64
Route::post('upload', 'ImageController@upload')->name('upload');


//Save image with name
Route::view('saveImage', 'showsaveImage');
Route::post('saveImage', 'ImageController@saveImage');

// AVATAR Editor
Route::get('avatar', 'AvatarController@vueAvatar'); 