<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
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

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/hostnames', 'HostnameController@index')->name('hostnames')
        ->middleware('can:view,App\Hostname');
    Route::get('/hostnames/create', 'HostnameController@create')
        ->middleware('can:create,App\Hostname');
    Route::get('/hostnames/edit', 'HostnameController@edit')
        ->middleware('can:update,App\Hostname');

    Route::get('/billing', 'BillingController@index')->name('billing');

    Route::get('/admin', 'AdminController@index')->name('admin')
        ->middleware('can:view,App\Admin');
    Route::get('/admin/user/create', 'AdminController@create')
        ->middleware('can:create,App\Admin');
    Route::get('/admin/user/edit', 'AdminController@edit')
        ->middleware('can:edit, App\Admin');
});
