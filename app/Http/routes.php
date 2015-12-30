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

    Route::get('management/users', [
            'as' => 'management-user', 'uses' => 'ManagementUserController@index'
        ]);
    Route::get('management/users/add', [
            'as' => 'management-user-add', 'uses' => 'ManagementUserController@add'
        ]);
    Route::post('management/users/store', [
            'as' => 'management-user-store', 'uses' => 'ManagementUserController@store'
        ]);



});


Route::get('dataebt/create', [
		'as' => 'create-dataebt', 'uses' => 'DataEbtController@create'
	]);
Route::post('dataebt/store', [
		'as' => 'store-dataebt', 'uses' => 'DataEbtController@store'
	]);
Route::get('prov/{id}', [
		'as' => 'dataebt-prov', 'uses' => 'DataEbtController@getKab'
	]);
Route::get('kab/{id}', [
		'as' => 'dataebt-kab', 'uses' => 'DataEbtController@getKec'
	]);
Route::get('kec/{id}', [
		'as' => 'dataebt-kec', 'uses' => 'DataEbtController@getKel'
	]);
