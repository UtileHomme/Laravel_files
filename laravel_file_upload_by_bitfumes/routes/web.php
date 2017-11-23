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

Route::get('upload','uploadController@index');
Route::post('store','uploadController@store');
Route::get('show','uploadController@show');
Route::get('size','uploadController@size');
Route::get('create','uploadController@create');

Route::get('file','FileController@showUploadForm')->name('upload.file');
Route::post('file','FileController@storeFile')->name('upload.files');

Route::get('multifile','FileController@MutipleUpload')->name('multipleupload.file');
Route::post('multifile','FileController@storeMultiFile')->name('multipleupload.file');
