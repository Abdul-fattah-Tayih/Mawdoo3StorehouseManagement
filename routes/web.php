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
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::middleware(['auth'])->group(function(){
    Route::resource('products', 'ProductController');
    Route::patch('products/decrement/{id}', 'ProductController@decrement')->name('products.decrement');

    Route::resource('categories', 'CategoryController');

    Route::resource('users', 'UserController');
    Route::get('users/{user}/edit/password', 'UserController@editPassword')->name('users.editPassword');
    Route::patch('users/password/{user}', 'UserController@updatePassword')->name('users.updatePassword');
});

