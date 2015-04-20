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
Route::get('weekly-report', 'SnippetController@weeklyReportTemplate');
Route::get('mypage', 'SnippetController@mypage');
Route::resource('snippet', 'SnippetController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
	Route::post('preview', 'SnippetController@preview');
	Route::get('tag', 'TagController@all');
});
