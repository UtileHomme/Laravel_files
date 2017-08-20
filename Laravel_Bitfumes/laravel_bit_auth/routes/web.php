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

//All routes for login and registration are in here
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::GET('admin/home','AdminController@index');
Route::GET('admin/editor','EditorController@index');
Route::GET('admin/test','EditorController@test');

Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::GET('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::GET('verify/{email}/{verifytoken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::GET('custom-register','CustomAuthController@showRegisterForm')->name('custom.register');
Route::POST('custom-register','CustomAuthController@register');

Route::GET('custom-login','CustomAuthController@showLoginForm')->name('custom.login');
Route::POST('custom-login','CustomAuthController@login');
