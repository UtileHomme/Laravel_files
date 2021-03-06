<?php

use App\User;
use App\Notifications\taskCompleted;
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

    $data = ["username"=>'Yathisha', "designation"=>"Vertical Head"];
    User::find(2)->notify(new taskCompleted($data));
    User::find(2)->notify(new taskCompleted($data));

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
