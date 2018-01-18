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

// Ścieżki do logowania
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// Publiczne ścieżki
Route::get('/', 'PublicController@index');
Route::get('/works', 'PublicController@works')->name('works');
Route::get('/policy', 'PublicController@policy')->name('policy');
Route::get('/awards', 'PublicController@awards')->name('awards');
Route::get('/settings', 'AppController@settings')->name('settings');
Route::get('/home', 'AppController@index')->name('home');


Route::group(['middleware' => 'admin'], function()
{
    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('admin/awards/{award}/give', 'AwardController@give')->name('awards.give');
    Route::patch('admin/awards/{award}/setWork', 'AwardController@setWork')->name('awards.setWork');
    Route::resource('admin/awards', 'AwardController');

    Route::patch('admin/users/{user}/flipUser', 'UserController@flipActive')->name('users.flipActive');
    Route::patch('admin/users/{user}/flipAdmin', 'UserController@flipAdmin')->name('users.flipAdmin');
    Route::resource('admin/users', 'UserController', ['except' => [
        'create'
    ]]);
});
