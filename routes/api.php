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
//User
Route::get('users','UserController@index');
Route::get('user/{id}','UserController@show');
Route::post('listener-account','UserController@listener_store');
Route::post('student-account','UserController@student_store');
Route::put('update-user/{id}','UserController@update');
Route::delete('delete-user/{id}','UserController@destroy');
Route::post('credentials','UserController@credentials');
//Course
Route::get('general-courses','GeneralCourseController@index');
Route::get('general-courses/{lang}','GeneralCourseController@getCoursesByLang');
Route::get('general-course/{id}','GeneralCourseController@show');
Route::post('image-store','ImageController@store');
Route::post('image-update','ImageController@updateimage');
Route::post('my-images','ImageController@allimages');
//Route::get('users','UserController@index');
Route::post('get-countries','UserController@countries');
Route::post('get-certificates','UserController@certificate');
Route::post('last-announcement','AnnouncementController@last_one');
Route::post('get-all-announcment','AnnouncementController@getallAnnouncment');
Route::post('singl-announcment','AnnouncementController@show');

