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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
/*Route::get('/v', function () {
 $info=[[
     'version'=>1,
     'd'=>'1',
 ]];
 return response($info,200);
});*/
Route::get('users','UserController@index');
Route::get('user/{id}','UserController@show');
Route::post('store-user','UserController@store');
Route::put('update-user/{id}','UserController@update');
Route::delete('delete-user/{id}','UserController@destroy');
Route::post('credentials','UserController@credentials');

