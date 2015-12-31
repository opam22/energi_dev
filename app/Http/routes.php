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



Route::get('dataebt', ['as' => 'dataebt', 'uses' => 'DataEbtController@index']);
Route::get('dataebt/create', ['as' => 'create-dataebt', 'uses' => 'DataEbtController@create']);
Route::post('dataebt/store', ['as' => 'store-dataebt', 'uses' => 'DataEbtController@store']);
Route::get('prov/{id}', ['as' => 'dataebt-prov', 'uses' => 'DataEbtController@getKab']);
Route::get('kab/{id}', ['as' => 'dataebt-kab', 'uses' => 'DataEbtController@getKec']);
Route::get('kec/{id}', ['as' => 'dataebt-kec', 'uses' => 'DataEbtController@getKel']);


Route::get('provinsi', ['as' => 'provinsi', 'uses' => 'ProvinsiController@index']);
Route::post('provinsi/update', ['as' => 'provinsi-update', 'uses' => 'ProvinsiController@update']);
Route::get('provinsi/create', ['as' => 'provinsi-create', 'uses' => 'ProvinsiController@create']);
Route::get('provinsi/{id}/edit', ['as' => 'provinsi-edit', 'uses' => 'ProvinsiController@edit']);
Route::get('provinsi/store', ['as' => 'provinsi-store', 'uses' => 'ProvinsiController@store']);
Route::get('provinsi/destroy', ['as' => 'provinsi-destroy', 'uses' => 'ProvinsiController@destroy']);


Route::get('kabupaten', ['as' => 'kabupaten', 'uses' => 'KabupatenController@index']);
Route::post('kabupaten/update', ['as' => 'kabupaten-update', 'uses' => 'KabupatenController@update']);
Route::get('kabupaten/create', ['as' => 'kabupaten-create', 'uses' => 'KabupatenController@create']);
Route::get('kabupaten/{id}/edit', ['as' => 'kabupaten-edit', 'uses' => 'KabupatenController@edit']);
Route::get('kabupaten/store', ['as' => 'kabupaten-store', 'uses' => 'KabupatenController@store']);
Route::get('kabupaten/destroy', ['as' => 'kabupaten-destroy', 'uses' => 'KabupatenController@destroy']);



Route::get('kecamatan', ['as' => 'kecamatan', 'uses' => 'KecamatanController@index']);
Route::post('kecamatan/update', ['as' => 'kecamatan-update', 'uses' => 'KecamatanController@update']);
Route::get('kecamatan/create', ['as' => 'kecamatan-create', 'uses' => 'KecamatanController@create']);
Route::get('kecamatan/{id}/edit', ['as' => 'kecamatan-edit', 'uses' => 'KecamatanController@edit']);
Route::get('kecamatan/store', ['as' => 'kecamatan-store', 'uses' => 'KecamatanController@store']);
Route::get('kecamatan/destroy', ['as' => 'kecamatan-destroy', 'uses' => 'KecamatanController@destroy']);


Route::get('kelurahan', ['as' => 'kelurahan', 'uses' => 'KelurahanController@index']);
Route::post('kelurahan/update', ['as' => 'kelurahan-update', 'uses' => 'KelurahanController@update']);
Route::get('kelurahan/create', ['as' => 'kelurahan-create', 'uses' => 'KelurahanController@create']);
Route::get('kelurahan/{id}/edit', ['as' => 'kelurahan-edit', 'uses' => 'KelurahanController@edit']);
Route::get('kelurahan/store', ['as' => 'kelurahan-store', 'uses' => 'KelurahanController@store']);
Route::get('kelurahan/destroy', ['as' => 'kelurahan-destroy', 'uses' => 'KelurahanController@destroy']);