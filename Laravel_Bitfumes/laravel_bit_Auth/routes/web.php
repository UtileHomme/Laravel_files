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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes for "Muti Auth"

//Route for showing the admin's dashboard after login
Route::get('admin/home','AdminController@index');

//Route for showing the Login form
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');

//Route for submitting the Login form
Route::post('admin','Admin\LoginController@login');

// Route for showing the Email the link  request form
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');

// Rooute for submitting the send link page
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

// Route for showing the reset password form along with the token
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm');

//Route ofr submitting the Reset password form
Route::post('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.reset');
