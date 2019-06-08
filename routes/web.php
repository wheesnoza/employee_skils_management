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

Route::put('/profile/update', 'ProfileController@update')
    ->name('profile.update');

Route::get('/users', 'UserController@index')
    ->name('users');

Route::get('/users/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::post('/skill/store', 'SkillController@store')
    ->name('skill.store');

Route::delete('/skill/{skill}/destroy', 'SkillController@destroy')
    ->where('skill', '[0-9]+')
    ->name('skill.destroy');

Route::get('/career/new', 'CareerController@new')
    ->name('career.new');

Route::post('/career/store', 'CareerController@store')
    ->name('career.store');

Route::delete('/career/{career}/destroy', 'CareerController@destroy')
    ->where('career', '[0-9]+')
    ->name('career.destroy');
