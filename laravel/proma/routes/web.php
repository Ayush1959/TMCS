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

// Route::resource('project', 'ProjectController');
Route::get('project', 'ProjectController@index');
Route::get('projects', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
// Route::get('project', 'ProjectController@show');

Route::get('/home', 'HomeController@index')->name('home');
