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



Route::get('/create', 'BlogController@create')->name('blog.create');
Route::post('/store', 'BlogController@store')->name('blog.store');

Route::get('/edit/{id}', 'BlogController@edit')->name('blog.edit');
Route::put('/update/{id}', 'BlogController@update')->name('blog.update');

Route::delete('/destroy/{id}', 'BlogController@destroy')->name('blog.destroy');

Route::get('/list/{id}', 'BlogController@listing')->name('blog.list');

Route::get('/show/{id}', 'BlogController@show')->name('blog.show');