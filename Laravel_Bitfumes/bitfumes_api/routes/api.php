<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//we don't need the api for create or edit part since we already have the data with us
Route::apiResource('/products','ProductController');

//we don't need the api for create or edit part since we already have the data with us
Route::group(['prefix'=>'products'], function()
{
    Route::apiResource('/{product}/reviews','ReviewController');
}
);