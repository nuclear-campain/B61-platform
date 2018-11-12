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

Route::get('/home', 'HomeController@dashboard')->name('home');

// Monitor routes 
Route::get('/monitor', 'Monitor\DashboardController@dashboard')->name('monitor.admin.dashboard');

// User Dashboard routes
Route::get('/users', 'Account\UsersController@index')->name('users.web.dashboard');
Route::get('/users/create', 'Account\UsersController@create')->name('users.create');
Route::post('/users/create', 'Account\UsersController@store')->name('users.store');
Route::match(['get', 'delete'], '/users/delete/{user}', 'Account\UsersController@destroy')->name('users.delete');
Route::get('/users/delete/undo/{user}', 'Account\UsersController@undoDeleteRoute')->name('users.delete.undo');

// Article routes
Route::get('/articles/search', 'Articles\BackendController@search')->name('articles.search');
Route::get('/articles/dashboard', 'Articles\BackendController@index')->name('articles.dashboard');
Route::get('/articles/create', 'Articles\BackendController@create')->name('articles.create');
Route::post('/articles/create', 'Articles\BackendController@store')->name('articles.store');
