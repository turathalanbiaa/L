<?php

use Illuminate\Support\Facades\Route;

Route::namespace("Dashboard\\Admin")
    ->name('dashboard.admin')
    ->prefix('dashboard/admin')
    ->group(function () {
        Route::get('', 'MainController@index');
        Route::name('.')
            ->group(function () {
                Route::post('login', 'LoginController@login')
                    ->name('login');

                // Users
                Route::namespace('User')
                    ->group(function () {
                        // Resources
                        Route::resource('users', 'UserController')->except('destroy');
                        // Api
                        Route::post('api/users/show','ApiUserController@show');
                    });

                // Documents
                Route::namespace('Document')
                    ->group(function () {
                        // Resources
                        Route::resource('documents', 'DocumentController')->except(['show', 'edit', 'update', 'destroy']);
                        // Api
                        Route::post('api/documents/store','ApiDocumentController@store');
                        Route::get('api/documents/build-modal','ApiDocumentController@buildModal');
                        Route::get('api/documents/action','ApiDocumentController@action');
                    });

                // Announcements
                Route::namespace('Announcement')
                    ->group(function () {
                        // Resources
                        Route::resource('announcements', 'AnnouncementController');
                        // Api
                        Route::post('api/announcements/show','ApiAnnouncementController@show');
                        Route::post('api/announcements/destroy','ApiAnnouncementController@destroy');
                        Route::post('api/announcements/change-state','ApiAnnouncementController@changeState');
                    });
            });
    });
