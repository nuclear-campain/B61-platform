<?php

/*
|--------------------------------------------------------------------------
| Web Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'HomeController@index')->name('home');

// User Dashboard routes
Route::get('/users', 'Account\UsersController@index')->name('users.web.dashboard');
Route::get('/users/create', 'Account\UsersController@create')->name('users.create');