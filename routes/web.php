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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'JokesController@index');

Route::get('/jokes/create','JokesController@create');
Route::post('/jokes','JokesController@store');

Route::get('/jokes/{id}','JokesController@show');

Route::delete('/jokes/{id}','JokesController@destroy');
Route::get('/jokes/{id}/edit','JokesController@edit');

Route::patch('/jokes/{id}','JokesController@update');
