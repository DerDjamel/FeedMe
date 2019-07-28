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

Route::middleware('auth:api')->group(function () {
    // these routes are protected by the api guard
    Route::get('/user', 'api\UserController@getUser');
});



Route::get('/user/auth', 'AuthController@checkAuth');

/* Recipes Routes */
Route::get('/recipes',          'api\RecipeController@index');
Route::post('/recipe',          'api\RecipeController@store');
Route::put('/recipe/{id}',      'api\RecipeController@update');
Route::get('/recipe/{id}',      'api\RecipeController@show');
Route::delete('/recipe/{id}',   'api\RecipeController@destroy');

/* Reviews Routes */
Route::get('/reviews',          'api\ReviewController@index');
Route::post('/review',          'api\ReviewController@store');
Route::put('/review/{id}',      'api\ReviewController@update');
Route::get('/review/{id}',      'api\ReviewController@show');
Route::delete('/review/{id}',   'api\ReviewController@destroy');


