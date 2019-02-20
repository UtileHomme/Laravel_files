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

// Route::get('/', function () {

//     // User::find(1)->notify(new taskCompleted);

//         $users = User::find(1);
//     Notification::send($users, new taskCompleted());
//     return view('welcome');
// });

Route::get('/', function () {

    // User::find(1)->notify(new taskCompleted);

    User::find(1)->notify(new taskCompleted());
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
