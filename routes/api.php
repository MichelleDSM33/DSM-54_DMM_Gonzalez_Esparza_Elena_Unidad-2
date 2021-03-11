<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Routes category
//Routes category
Route::apiResource('category','\App\Http\Controllers\categoryController');
//post
Route::apiResource('post','\App\Http\Controllers\PostController');
//// examen 
Route::get('Examen','\App\Http\Controllers\PostController@Examen');

Route::get('postByCategory/{id}','\App\Http\Controllers\PostController@postByCategory');

Route::get('postforteen/{min?}','\App\Http\Controllers\PostController@postforteen');
Route::get('lastsquerys/{id}','\App\Http\Controllers\PostController@lastsquerys');


 