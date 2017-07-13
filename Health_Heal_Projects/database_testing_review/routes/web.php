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

/* Routes are used to set the URL for our application. Inside brackets first parameter you give the name of URL you want and
next parameter you give the name of controller associated with that URL. we have use something called resource, what does this resource will do?
Resource will help us to create all CURD operation Classes in controller automatically. Classes like create, update, delete, update and destroy.
*/

Route::get('/', function () {               // This route will redirect our application to home page.
    return view('welcome');
});
Route::resource('lang','langsController');             //This route will redirect our page to langugae page where all details are shown. 

Route::resource('references','referencesController');  // This route our application to reference page

Route::resource('clients','clientsController');         // this route our appliaction to clients details page.
