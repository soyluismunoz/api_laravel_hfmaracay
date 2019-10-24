<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
  Route::post('login', 'AuthController@login');
  Route::post('signup', 'AuthController@signup');

  Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('usuarios', 'Admin\UserController@index');
    Route::get('usuario/{user}', 'Admin\UserController@show');
    Route::patch('/usuarios/{user}/trash', 'Admin\UserController@delete')->where('user', '[0-9]+');
    Route::delete('usuarios/{id}/destroy','Admin\UserController@destroy')->where('id', '[0-9]+');

    // Areas
    Route::get('/areas', 'Admin\AreaController@index');
    Route::post('/areas/create', 'Admin\AreaController@store');
    Route::get('/areas/{area}', 'Admin\AreaController@show')->where('area', '[0-9]+');
    Route::put('/areas/{area}', 'Admin\AreaController@update')->where('area', '[0-9]+');
    Route::patch('/areas/{area}/delete', 'Admin\AreaController@delete')->where('area', '[0-9]+');
    Route::delete('/areas/{id}/destroy', 'Admin\AreaController@destroy')->where('id', '[0-9]+');

    // Pictures
    Route::get('/pictures', 'Admin\PictureController@get');
    Route::post('/pictures', 'Admin\PictureController@post');
    Route::get('/pictures/{id}', 'Admin\PictureController@show')->where('id', '\d+');
    Route::patch('/pictures/{id}', 'Admin\PictureController@patch')->where('id', '\d+');
    Route::delete('/pictures/{id}', 'Admin\PictureController@delete')->where('id', '\d+');
  });
});
