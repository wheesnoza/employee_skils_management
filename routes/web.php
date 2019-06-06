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

Auth::routes();

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/profile/edit', 'ProfileController@edit')
    ->name('profile.edit');

Route::put('/profile', 'ProfileController@update')
    ->name('profile.update');

Route::get('users', 'UserController@index')
    ->name('users');

Route::get('users/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');
