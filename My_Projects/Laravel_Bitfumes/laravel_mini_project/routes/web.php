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

Route::resource('todo','todocontroller');

// This is a closer function
Route::get('/file',function()
{
        return view('file.home');
}
);

Route::get('logsf', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
