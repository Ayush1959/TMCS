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
Route::get('projectuser', 'ProjectController@users');
Route::get('projects', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
Route::put('projectuser/{id}', 'ProjectController@usersupdate');
// Route::post('projectuser', 'ProjectController@userslog');
Route::post('projectde/{id}', 'ProjectController@delay');
Route::delete('projectde/{id}', 'ProjectController@destroy');
Route::get('projectid/{id}', 'ProjectController@edit');
// Route::get('project', 'ProjectController@show');


Route::get('projectcontroller', 'CronController@index');

Route::get('/home', 'HomeController@index')->name('home');
