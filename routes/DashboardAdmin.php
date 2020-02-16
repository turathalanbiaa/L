<?php

use Illuminate\Support\Facades\Route;

Route::namespace("Dashboard\\Admin")
    ->name('dashboard.admin')
    ->prefix('dashboard/admin')
    ->group(function () {
        Route::get('', 'MainController@index');
        Route::name('.')
            ->group(function () {
                Route::post('login', 'MainController@login')
                    ->name('login');

                // Users
                Route::namespace('User')
                    ->group(function () {
                        // Resources
                        Route::resource('users', 'UserController')->except('destroy');
                        // Api
                        Route::get('api/users/info','ApiUserController@info');
                    });

                // Documents
                Route::namespace('Document')
                    ->group(function () {
                        // Resources
                        Route::resource('documents', 'DocumentController')->except(['show', 'edit', 'update', 'destroy']);
                        // Apis
                        Route::post('api/documents/store','ApiDocumentController@store');
                        Route::post('api/documents/accept','ApiDocumentController@accept');
                        Route::post('api/documents/reject','ApiDocumentController@reject');
                    });
            });
    });
