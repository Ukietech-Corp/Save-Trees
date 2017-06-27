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

Route::group(array('prefix' => '/v1/'), function() {
    Route::resource('restful-apis','ProblemController');  
    Route::resource('acticles',  'ArticleController');
    Route::resource('categories','CategoryController');
    Route::resource('comments',  'CommentController');
    Route::resource('files',		 'FileController');
    Route::resource('photos',		 'PhotoController');
});
