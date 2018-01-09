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


Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', 'adminController@index');
    Route::delete('/user/{id}', 'adminController@delete');
    Route::get('dashboard/user/{id}/edit', 'adminController@edit');
    
    Route::patch('dashboard/user/{id}', 'adminController@update');
    Route::post('dashboard/user/{id}', 'adminController@store');
//    Route::get('/dashboard', 'adminController@show');
    
    Route::get('/user/{id}', 'userController@index');
    
    Route::get('subjects', 'subjectsController@index');

    Route::get('subjects/{id}','subjectsController@show');

    Route::post('subjects/{id}','commentsController@store');

    Route::get('comments/{id}/edit','commentsController@edit');
    Route::patch('comments/{id}','commentsController@update');


    Route::get('subjects/{user}', 'commentsController@store');


    Auth::routes();
});


//
//Route::get('/home', 'HomeController@index')->name('home');
