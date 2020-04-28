<?php

use Illuminate\Support\Facades\Route;

Route::namespace("Dashboard\\Admin")
    ->name("dashboard.admin")
    ->prefix("dashboard/admin")
    ->group(function () {
        Route::get("", "MainController@index");

        Route::name(".")->group(function () {
            // Login
            Route::post("login", "LoginController@login")->name("login");

            // Users
            Route::namespace("User")->group(function () {
                // Resources
                Route::resource("users", "UserController");
                // Api
                Route::post("api/users/show","ApiUserController@show");
                Route::post("api/users/destroy","ApiUserController@destroy");
            });

            // Documents
            Route::namespace("Document")->group(function () {
                // Resources
                Route::resource("documents", "DocumentController")->except(["show", "edit", "update", "destroy"]);
                // Api
                Route::post("api/documents/store","ApiDocumentController@store");
                Route::post("api/documents/build-modal","ApiDocumentController@buildModal");
                Route::post("api/documents/action","ApiDocumentController@action");
            });

            // Announcements
            Route::namespace("Announcement")->group(function () {
                // Resources
                Route::resource("announcements", "AnnouncementController");
                // Api
                Route::post("api/announcements/show","ApiAnnouncementController@show");
                Route::post("api/announcements/destroy","ApiAnnouncementController@destroy");
                    Route::post("api/announcements/change-state","ApiAnnouncementController@changeState");
            });

            // Lecturers
            Route::namespace("Lecturer")->group(function () {
                // Resources
                Route::resource("lecturers", "LecturerController");
                Route::post("lecturers/change-state","LecturerController@changeState");
                // Api
                Route::post("api/lecturers/show","ApiLecturerController@show");
                Route::post("api/lecturers/change-state","ApiLecturerController@changeState");
            });

            // Study Courses
            Route::namespace("StudyCourse")->group(function () {
                // Resources
                Route::resource("study-courses", "StudyCourseController");
                // Api
                Route::post("api/study-courses/f","ApiStudyCourseController@f");
            });

            // General Course Headers
            Route::namespace("GeneralCourseHeader")->group(function () {
                // Resources
                Route::resource("general-course-headers", "GeneralCourseHeaderController");
                // Api
                Route::post("api/general-course-headers/f","ApiGeneralCourseHeaderController@f");
            });

            // General Courses
            Route::namespace("GeneralCourse")->group(function () {
                // Resources
                Route::resource("general-courses", "GeneralCourseController");
                // Api
                Route::post("api/general-courses/f","ApiGeneralCourseController@f");
            });
        });
    });
