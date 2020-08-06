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

use Illuminate\Support\Facades\Route;

Route::get("static", "StaticController@index");

// User
Route::post("users/register","UserController@register");
Route::post("users/login","UserController@login");

// Documents
Route::post("documents/create-or-update","DocumentController@createOrUpdate");
Route::get("documents/my-documents","DocumentController@myDocuments");

// Lecturers
Route::get("lecturers", "LecturerController@all");
Route::get("lecturers/{lecturer}", "LecturerController@single");
Route::get("lecturers/{lecturer}/study-courses", "LecturerController@studyCourses");
Route::get("lecturers/{lecturer}/general-courses", "LecturerController@GeneralCourses");

// Courses
Route::get("general-courses", "CourseController@allGeneralCourses");
Route::get("general-courses/{generalCourse}", "CourseController@singleGeneralCourse");
Route::get("study-courses", "CourseController@studyCourses");
Route::get("study-courses/{studyCourse}", "CourseController@singleStudyCourse");
Route::get("general-course-headers/{generalCourseHeader}/general-courses", "CourseController@generalCoursesByHeader");

// Enrollments
Route::post("enrollments/create-or-update", "EnrollmentController@createOrUpdate");

// Reviews
Route::get("reviews", "ReviewController@all");
Route::post("reviews/create-or-update", "ReviewController@createOrUpdate");
Route::get("reviews/get-review", "ReviewController@getReview");

// Lessons
Route::get("lessons/{lesson}/watched", "LessonController@watchedLesson");
Route::get("watch-later-lessons", "LessonController@watchLaterLessons");
Route::post("watch-later-lessons/store", "LessonController@addLessonToWatchLater");
Route::post("watch-later-lessons/delete", "LessonController@deleteLessonFromWatchLater");
Route::get("timetables/today-lessons", "LessonController@todayLessons");
Route::get("timetables/missed-lessons", "LessonController@missedlessons");
