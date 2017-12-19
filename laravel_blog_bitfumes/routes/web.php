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

// User routes

//since they belong inside the app/User folder
Route::group(['namespace' => 'User'], function()
{

Route::get('/','HomeController@index');

Route::get('post/{slug?}','PostController@post')->name('post');

Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
Route::get('post/category/{category}','HomeController@category')->name('category');
});

Route::group(['namespace' => 'Admin'], function()
{

Route::get('admin/home','HomeController@home')->name('admin.home');
Route::resource('admin/user','UserController');
Route::resource('admin/post','PostController');
Route::resource('admin/tag','TagController');
Route::resource('admin/category','CategoryController');
});
