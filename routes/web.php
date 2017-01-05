<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function()
{
    return Redirect::to('/books');
});

Route::get('books/search', 'BookController@search');
Route::resource('books', 'BookController');

Route::resource('users', 'UserController', ['only' => ['show', 'edit', 'update']]);

Route::post('book_user/add', 'Book_userController@add');
Route::resource('book_user', 'Book_userController', ['only' => ['show', 'destroy']]);

Auth::routes();

//Route::get('/home', 'HomeController@index');
