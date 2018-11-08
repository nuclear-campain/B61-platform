<?php

/*
|--------------------------------------------------------------------------
| Web Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

// Contact routes 
Route::view('/contact', 'contact.index')->name('contact');
Route::post('/contact/send', 'ContactController')->name('contact.send');

// Article routes
Route::get('/article/{article}', 'Articles\FrontendController@show')->name('article.show');

// Account settings routes
Route::get('/profile-settings/{type?}', 'Account\SettingsController@index')->name('account.settings');
Route::patch('/profile-settings/info', 'Account\SettingsController@updateInformation')->name('account.settings.info');
Route::patch('/profile/settings/security', 'Account\SettingsController@updateSecurity')->name('account.settings.security');

// Notification routes
Route::get('/notifications/mark-as-read', 'NotificationController@markAsRead')->name('notifications.markAll');
Route::get('/notifications/{type?}', 'NotificationController@index')->name('notifications.index');