<?php

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

Route::get('/', 'PublicController@index');

Route::post('register', 'AuthController@register');

Route::get('link/{link}', 'GameController@index');

Route::get('deactivate/{link}', 'GameController@deactivate');

Route::post('rate', 'GameController@rate');

Route::post('regenerate-link', 'GameController@regenerateLink');

Route::post('history', 'GameController@history');

Route::get('admin/login', 'Admin\AdminController@login')
    ->name('admin.login');

Route::post('admin/handlerLogin', 'Admin\AdminController@handlerLogin')
    ->name('admin.handlerLogin');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::resource('users', 'Admin\UserController', ['as' => 'admin']);
});