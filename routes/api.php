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
Route::get('/recipes',      'api\RecipeController@index');
Route::post('/recipe',      'api\RecipeController@store');
Route::get('/recipe/{id}',  'api\RecipeController@show');
Route::delete('/recipe/{id}',  'api\RecipeController@destroy');

