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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HomeController@index');

Route::get('/passport','HomeController@passport1');

Route::get('/mcustomer','HomeController@customers');

Route::get('/proles','HomeController@roles');

Route::get('/cpeople','HomeController@people');

//How to create a route with inbuilt function
Route::get('/about',function()
{
    $data = ['this','is','bitfumes'];
    return view('about')->with(['data'=>$data]);
}
);

Route::get('/aboutpage','PagesController@about');

//conventional way of making controllers
// Route::get('songs','SongsController@index');
// Route::get('songs/id/edit','SongsController@edit');
// Route::get('songs/id/delete','SongsController@delete');
// Route::post('songs/store','SongsController@store');

//Better way is to create a resource controller
Route::resource('/songs','SongsControllerres');

// Route::resource('/songsmodel','SongsControllerres@songs');

//Route for middleware
// Route::get('/middlewarep',function()
// {
//     return view('middleware');
// }
// )->middleware('test');
//
// Route::get('/contact',function()
// {
//     return view('contact');
// }
// )->middleware('test');

//How to assign same middlewares to different routes
Route::get('aboutm','TestController@about');
Route::get('contact','TestController@contact');

//only if the user is same as the name given, we give them access
Route::get('checkuser','TestController@about')->middleware('test:jatin');

//Route for Pagination
Route::get('users','Pagination@users');

//Route for sending email
Route::get('send','mailController@send');
