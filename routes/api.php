<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
/
*/

//User
use Illuminate\Support\Facades\Route;

Route::get('users','UserController@index');
Route::get('user/{id}','UserController@show');
Route::post('listener-account','UserController@listener_store');
Route::post('student-account','UserController@student_store');
Route::put('update-user/{id}','UserController@update');
Route::delete('delete-user/{id}','UserController@destroy');
Route::post('credentials','UserController@credentials');
Route::post('image-store','ImageController@store');
Route::post('image-update','ImageController@updateimage');
Route::post('my-images','ImageController@allimages');
Route::post('get-countries','UserController@countries');
Route::post('get-certificates','UserController@certificate');
Route::post('last-announcement','AnnouncementController@lastAnnouncments');
Route::post('get-all-announcment','AnnouncementController@getallAnnouncment');
Route::post('single-announcment','AnnouncementController@show');



// Lecturers
Route::get("lecturers", "LecturerController@all");
Route::get("lecturers/{lecturer}", "LecturerController@single");
Route::get("lecturers/{lecturer}/study-courses", "LecturerController@studyCourses");
Route::get("lecturers/{lecturer}/general-courses", "LecturerController@GeneralCourses");

// Courses
Route::get("general-courses", "courseController@allGeneralCourses");
Route::get("general-courses/{generalCourse}", "courseController@singleGeneralCourse");

Route::get("study-courses", "courseController@studyCourses");
Route::get("study-courses/{studyCourse}", "courseController@singleStudyCourse");

Route::get("general-courses-header/{generalCourseHeader}", "courseController@singleGeneralCourseHeader");
Route::get("general-courses-header/{generalCourseHeader}/general-courses", "courseController@generalCoursesByHeader");

