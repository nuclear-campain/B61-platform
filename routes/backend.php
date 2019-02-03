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
Route::get('/monitor', 'Monitor\BackendController@index')->name('monitor.admin.dashboard');
Route::get('/monitor/{city}', 'Monitor\BackendController@show')->name('monitor.admin.show');
Route::patch('/monitor/{city}', 'Monitor\BackendController@update')->name('monitor.admin.update');

// City monitor status routes 
Route::get('/{city}/accept', 'Monitor\Status\AcceptController@index')->name('charter.accept');
Route::post('/{city}/accept', 'Monitor\Status\AcceptController@store')->name('charter.accept.store');

// Notation routes
Route::get('/{city}/notations', 'Monitor\NotationController@index')->name('monitor.notations');
Route::get('/{city}/notations/create', 'Monitor\NotationController@create')->name('monitor.notations.create');
Route::post('/{city}/notations/create', 'Monitor\NotationController@store')->name('monitor.notations.store');
Route::get('/notations/{notation}/{status}', 'Monitor\NotationController@status')->name('monitor.notations.status');
Route::get('/notations/delete/{notation}', 'Monitor\NotationController@destroy')->name('monitor.notations.delete');

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
Route::get('/articles/status/{article}/{status}', 'Articles\BackendController@status')->name('articles.status');
Route::post('/articles/create', 'Articles\BackendController@store')->name('articles.store');
Route::get('/articles/{article}/{status}', 'Articles\BackendController@status')->name('articles.status');
