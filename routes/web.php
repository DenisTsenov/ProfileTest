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

Route::resource('/', 'ProfileController');
Route::get('/{id}', 'ProfileController@show');
Route::get('/{id}/edit', 'ProfileController@edit');
Route::put('/{id}', 'ProfileController@update');
Route::delete('/{id}', 'ProfileController@destroy');






