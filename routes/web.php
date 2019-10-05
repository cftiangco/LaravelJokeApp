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

Route::get('/jokes/{joke}','JokesController@show');

Route::delete('/jokes/{joke}','JokesController@destroy');
Route::get('/jokes/{id}/edit','JokesController@edit');

Route::patch('/jokes/{joke}','JokesController@update');

// =========== COMMENTS ROUTE =============== //

Route::post('/jokes/{joke}/comments','CommentsController@store');
Route::delete('/jokes/comments/{comment}','CommentsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
