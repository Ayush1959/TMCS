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
Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

// Route::resource('project', 'ProjectController');
Route::get('project', 'ProjectController@index');
Route::get('projectuser', 'ProjectController@users');
Route::get('projectuserdata', 'ProjectController@userdata');
Route::get('projects', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
Route::put('projectuser/{id}', 'ProjectController@usersupdate');
// Route::post('projectuser', 'ProjectController@userslog');
Route::post('projectde', 'ProjectController@delay');
Route::delete('projectde/{id}', 'ProjectController@destroy');
Route::get('projectid/{id}', 'ProjectController@edit');
Route::get('projectuserdatedata/{id}', 'ProjectController@datechangeread');
// Route::get('project', 'ProjectController@show');


Route::get('projectcontroller', 'CronController@index');
Route::get('projectmonthly', 'MonthlyCronController@index');

Route::get('/home', 'HomeController@index')->name('home');



Route::get('sendbasicemail', 'MailController@basic_email');
Route::get('sendhtmlemail', 'MailController@html_email');
Route::get('sendattachmentemail', 'MailController@attachment_email');