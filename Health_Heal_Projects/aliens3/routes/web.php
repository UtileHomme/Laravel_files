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

Route::resource('languages','languagesController');
Route::resource('genders','gendersController');
Route::resource('city','cityController');
Route::resource('leadtypes','leadtypesController');
Route::resource('ptconditions','ptconditionsController');
Route::resource('references','referencesController');
Route::resource('relationships','relationshipsController');
Route::resource('shiftrequireds','shiftrequiredsController');
Route::resource('verticals','verticalsController');
Route::resource('cc','ccController');
Route::resource('vh','vhController');
Route::resource('Verticalhead','VerticalheadController');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin/home','AdminController@index');
Route::get('admin/vertical','VerticalController@index');
Route::get('admin/customercare','CustomercareController@index');
Route::get('admin/management','ManagementController@index');
Route::get('admin/careprovider','CareproviderController@index');
Route::get('admin/coordinator','CoordinatorController@index');
Route::get('admin/superuser','SuperuserController@index');

Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login'); 
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');  
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::GET('admin-register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::POST('admin-register','Admin\RegisterController@register'); 





Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');






