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

/** ホーム */
Route::get('/', 'HomeController@index')
    ->name('home');

/** プロフィール */
Route::get('/profile/edit', 'ProfileController@edit')
    ->name('profile.edit');

Route::put('/profile/update', 'ProfileController@update')
    ->name('profile.update');

/** ユーザー */
Route::get('/users', 'UserController@index')
    ->name('users');

Route::get('/users/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

/** スキル */
Route::post('/skill/store', 'SkillController@store')
    ->name('skill.store');

Route::delete('/skill/{skill}/destroy', 'SkillController@destroy')
    ->where('skill', '[0-9]+')
    ->name('skill.destroy');

/** 経歴 */
Route::get('/career/new', 'CareerController@new')
    ->name('career.new');

Route::post('/career/store', 'CareerController@store')
    ->name('career.store');

Route::get('/career/{career}/edit', 'CareerController@edit')
    ->where('career', '[0-9]+')
    ->name('career.edit');

Route::put('/career/{career}', 'CareerController@update')
    ->where('career', '[0-9]+')
    ->name('career.update');

Route::delete('/career/{career}', 'CareerController@destroy')
    ->where('career', '[0-9]+')
    ->name('career.destroy');
