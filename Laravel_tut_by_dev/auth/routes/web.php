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

Route::get('/', function () {
    return view('welcome');
});

//after authentication we'll be redirected to this uri

Route::get('home',function()
{
    echo 'Welcome home';
}
);

//Authentication Routes
Route::get('auth/login','Auth\LoginController');
Route::post('auth/login','Auth\LoginController@postLogin');
Route::get('auth/logout','Auth\LoginController@getLogout');

//Registration routes
Route::get('auth/register','Auth\RegisterController@create');
Route::post('auth/register','Auth\RegisterController@getRegister');
