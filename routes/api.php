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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('v1/user',['as' => 'getUsers', 'uses' =>'UserController@getUsers']);
Route::post('v1/user',['as' => 'createUser', 'uses' =>'UserController@createUser']);
Route::put('v1/user/{id}',['as' => 'editUser', 'uses' =>'UserController@editUser']);
