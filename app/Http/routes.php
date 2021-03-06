<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');
//Route::get('weekly-report', 'SnippetController@weeklyReportTemplate');
Route::post('/feedback', 'MailController@feedback');
Route::get('/search', 'SnippetController@searchOnES');
Route::get('/info', 'NewsController@getIndex');

//Route::get('mypage', 'SnippetController@mypage');
Route::resource('comment', 'CommentController');
Route::resource('snippet', 'SnippetController');
Route::resource('events', 'EventController');
Route::resource('users', 'Auth\UserController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
	Route::post('preview', 'SnippetController@preview');
	Route::post('stock', 'SnippetController@stock');
	Route::post('unstock', 'SnippetController@unstock');
    Route::get('stocked', 'SnippetController@stocked');
	Route::get('tag', 'TagController@all');
    Route::get('notifications', 'NotificationController@checkNotifications');
	Route::resource('activity', 'UserController');
});
Route::group(['prefix' => 'users/{id}'], function() {
    Route::get('stocks', 'Auth\UserController@stockList');
	Route::get('items', 'Auth\UserController@mySnippetList');
});
Route::group(['prefix' => 'tags'], function() {
	Route::get('/', 'TagController@all');
	Route::get('{tag}', 'TagController@tag');
});
Route::group(['prefix' => 'settings'], function () {
	Route::get('account', 'SettingController@account');
	Route::post('account-update', 'SettingController@accountUpdate');
});
