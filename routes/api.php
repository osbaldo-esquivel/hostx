<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('users', 'Api\UserController@index');
Route::get('users/{ id }', 'Api\UserController@show');
Route::post('users', 'Api\UserController@store');
Route::put('users', 'Api\UserController@update');
Route::delete('users', 'Api\UserController@delete');

Route::get('hostnames', 'Api\HostnameController@index');
Route::get('hostnames/{ id }', 'Api\HostnameController@show');
Route::post('hostnames', 'Api\HostnameController@store');
Route::put('hostnames', 'Api\HostnameController@update');
Route::delete('hostnames', 'Api\HostnameController@delete');