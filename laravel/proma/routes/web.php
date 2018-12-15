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

// Score Read -- DataRead.vue
Route::get('projectuserdata', 'ProjectController@userdata'); //username and score
Route::get('projectuserdatedata/{id}', 'ProjectController@datechangeread'); //username and score after datechange

// Score Change -- DataScore.vue 
Route::get('projectuser', 'ProjectController@users'); //gets users list
Route::put('projectuser/{id}', 'ProjectController@usersupdate'); //change user score

// Project Display -- DataCreate.vue
Route::get('projects', 'ProjectController@show'); //Non Monitored Data
Route::get('project', 'ProjectController@index'); //Monitored data
Route::put('project/{id}', 'ProjectController@update'); //Monitor or stop Monitoring



// Model Popup --DataCreate.vue
Route::get('projectid/{id}', 'ProjectController@edit'); //single project details
Route::post('projectdelay', 'ProjectController@delay'); //add users to delay table
Route::delete('projectde/{id}', 'ProjectController@destroy'); //delete users from delaY table

// Search query
Route::get('projectSearch/{id}', 'ProjectController@search'); //single project details
Route::post('projectSearch', 'ProjectController@search'); //monitored project details
Route::post('projectSearchNonMonitor', 'ProjectController@searchNm'); //single project details



// CRON CONTROLLERS
Route::get('projectcontroller', 'CronController@index');
Route::get('projectmonthly', 'MonthlyCronController@index');

// INDEX
Route::get('/home', 'HomeController@index')->name('home');

// MAIL CONTROLLERS

Route::get('sendbasicemail', 'MailController@basic_email');
Route::get('sendhtmlemail', 'MailController@html_email');
Route::get('sendattachmentemail', 'MailController@attachment_email');