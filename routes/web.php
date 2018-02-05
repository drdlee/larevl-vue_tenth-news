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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post/trash', 'PostController@trash')->name('post.trash');
    Route::delete('/post/trash/{post}', 'PostController@kill')->name('post.kill');
    Route::put('/post/restore/{post}', 'PostController@restore')->name('post.restore');
    Route::resource('post', 'PostController');
});
