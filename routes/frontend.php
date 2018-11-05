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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Account settings routes
Route::get('/profile-settings/{type?}', 'Account\SettingsController@index')->name('account.settings');
Route::patch('/profile-settings/info', 'Account\SettingsController@updateInformation')->name('account.settings.info');
Route::patch('/profile/settings/security', 'Account\SettingsController@updateSecurity')->name('account.settings.security');
