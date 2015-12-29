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

Route::get('/', [
		'as' => 'index', 'uses' => 'IndexController@index'
	]);
Route::post('login/do', [
		'as' => 'do-login', 'uses' => 'Auth\LoginController@doLogin'
	]);
Route::get('logout', [
		'as' => 'do-logout', 'uses' => 'Auth\LogoutController@doLogout'
	]);

Route::group(['prefix' => 'admin'], function(){
    
    Route::get('/', [
            'as' => 'admin-index', 'uses' => 'AdminIndexController@index'
        ]);

});
