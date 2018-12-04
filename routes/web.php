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

Route::get('/server', 'ServerController@index');
Route::get('/server/{id}', 'ServerController@show');
Route::post('/server', 'ServerController@store');
Route::delete('/server', 'ServerController@destroy');
Route::patch('/server', 'ServerController@update');

Route::get('/home', 'HomeController@index')->name('home');
