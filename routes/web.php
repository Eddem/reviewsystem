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

Route::get('subjects', 'subjectsController@index');

Route::get('subjects/{id}','subjectsController@show');

Route::put('subjects/{id}/comment','commentsController@comment');



Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
