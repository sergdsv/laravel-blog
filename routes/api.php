<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
    Route::resource('/posts', 'PostsController');
	Route::resource('/categories', 'ApiCategoriesController');
});

Route::get('/getlikes/{user_id}/{post_id}', 'ApiLikeController@getlike');
Route::get('/togglelikes/{user_id}/{post_id}', 'ApiLikeController@togglelike');



