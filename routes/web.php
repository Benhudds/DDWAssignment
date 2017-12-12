<?php
Use \App\User;
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

Route::get('/', 'PagesController@index');

Route::get('register', 'LoginController@register');
Route::post('register', 'LoginController@registeruser');
Route::post('users/checkavailability', 'LoginController@checkavailability');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@loginuser');

Route::get('logout', 'LoginController@logout');

Route::resource('posts', 'PostsController');
Route::get('myposts', 'PostsController@userindex');

Route::resource('users', 'UserController');
Route::get('filteredUsers', 'UserController@filter');