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

//This is the for contact page
// Route::get('contact', function () {
//     return view('contact');
// });

//Routes for Contact page
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact')->name('contact.email');


//This is the for about page
// Route::get('about', function () {
//     return view('about');
// });

Route::get('about','PagesController@getAbout');

//This is for the welcome page
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','PagesController@getIndex')->name('main');

//Routes for PostController using Resource
Route::resource('posts','PostController');

//Route for incorporating the slug
Route::get('blog/{slug}',['as'=>'blog.single', 'uses'=>'BlogController@getSingle' ])
          ->where('slug','[\w\d\-\_]+');

//for regex , w = alphabets, d = number, - = dash, _ = underscore are allowed

Route::get('blog', ['uses'=> 'BlogController@getIndex','as'=>'blog.index']);

//Routes for login
Route::get('auth/login','Auth\LoginController@showLoginForm');
Route::post('auth/login','Auth\LoginController@login')->name('login');      //naming the route according to middleware
Route::get('auth/logout','Auth\LoginController@logout')->name('logout');

//Routes for Registration
Route::post('auth/register', 'Auth\RegisterController@register');

// Routes for Password Reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//Routes for Categories
Route::resource('categories','CategoryController',['except'=>'create']);

//Routes for Tags
Route::resource('tags','TagController',['except'=>'create']);

// Routes for comments
Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}', 'CommentsController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
Route::get('comments/{id}/delete', 'CommentsController@delete')->name('comments.delete');
