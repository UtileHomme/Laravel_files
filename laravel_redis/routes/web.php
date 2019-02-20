<?php

Route::get('/', 'BlogController@showBlog');

// -------------------
// Twitter Feed

Route::get('/{id}/userlist', 'UserController@showUserList')->where('id', '[0-9]+');

Route::get('/{id}/following', 'UserController@showFollowingList')->where('id', '[0-9]+');

Route::get('/{id}/follow/{userID}', 'UserController@followUser')->where('id', '[0-9]+');

Route::get('/{id}/unfollow/{userID}', 'UserController@unfollowUser')->where('id', '[0-9]+');


Route::get('/{id}/postupdate', 'UserController@showAddUpdate')->where('id', '[0-9]+');

Route::post('/{id}/postupdate', 'UserController@doAddUpdate')->where('id', '[0-9]+');

Route::get('/{id}/feed', 'UserController@showFeed')->where('id', '[0-9]+');

// # End Twitter Feed
// -------------------

// Article Routes

Route::get('/article/{id}', 'BlogController@showArticle')->where('id', '[0-9]+');

Route::get('/filter/{tag}', 'BlogController@showFilteredArticles');


// Admin Routes

Route::get('/admin/addarticle', 'AdminController@showAddPost');
Route::post('/admin/addarticle', 'AdminController@doAddPost');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
