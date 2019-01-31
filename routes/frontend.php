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

Auth::routes(['verify' => true]);

// City monitor following routes. 

Route::get('/monitor/following', 'Monitor\FollowController@index')->name('monitor.following');
Route::get('/monitor/follow/{city}', 'Monitor\FollowController@follow')->name('city.follow'); 
Route::get('/monitor/unfollow/{city}', 'Monitor\FollowController@unfollow')->name('city.unfollow');

// Comment routes
Route::get('comments/report/{comment}', 'Articles\Comments\ReportController@create')->name('comment.report');
Route::post('comments/report/{comment}', 'Articles\Comments\ReportController@store')->name('comment.report.store');

// City monitor routes
Route::get('/monitor', 'Monitor\FrontendController@index')->name('monitor.web.dashboard');
Route::get('/monitor/{city}', 'Monitor\FrontendController@show')->name('monitor.web.city');

// Contact routes
Route::view('/contact', 'contact.index')->name('contact');
Route::post('/contact/send', 'ContactController')->name('contact.send');

// Article routes
Route::get('/article/{article}', 'Articles\FrontendController@show')->name('article.show');
Route::post('/article/{article}/comment', 'Articles\Comments\CommentController@comment')->name('article.comment');

// Issue routes 
Route::get('/issue/report', 'IssueController@create')->name('issue.report');
Route::post('/issue/report', 'IssueController@store')->name('issue.report.store');

// Comment routes
Route::get('comment/delete/{comment}', 'Articles\Comments\CommentController@destroy')->name('comment.delete');
Route::get('comment/edit/{comment}', 'Articles\Comments\CommentController@edit')->name('comment.edit');
Route::patch('comment/edit/{comment}', 'Articles\Comments\CommentController@update')->name('comment.update');

// Account settings routes
Route::get('/profile-settings/{type?}', 'Account\SettingsController@index')->name('account.settings');
Route::patch('/profile-settings/info', 'Account\SettingsController@updateInformation')->name('account.settings.info');
Route::patch('/profile/settings/security', 'Account\SettingsController@updateSecurity')->name('account.settings.security');

// Notification routes
Route::get('/notifications/read/{notification}', 'NotificationController@markAsRead')->name('notifications.markAsRead');
Route::get('/notifications/mark-as-read', 'NotificationController@markAll')->name('notifications.markAll');
Route::get('/notifications/{type?}', 'NotificationController@index')->name('notifications.index');
