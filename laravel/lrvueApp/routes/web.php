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

// Route::resource('datas', 'DataController');
Route::post('datas', 'DataController@store');
Route::get('datas', 'DataController@index');
Route::delete('datas/{id}', 'DataController@destroy');
Route::put('datas/{id}', 'DataController@update');
Route::get('datas/{data}', 'DataController@show');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
