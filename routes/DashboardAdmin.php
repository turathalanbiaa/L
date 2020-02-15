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
                    ->group(function (){
                        // Resources
                        Route::resource('users', 'UserController')->except('destroy');
                        // Api
                        Route::get('api/users/info','ApiUserController@info');
                    });




                // Documents Resources
                Route::resource('documents', 'DocumentController')->except(['show', 'edit', 'update', 'destroy']);
                // Documents Ajax
                Route::post('ajax/documents/accept','DocumentController@accept');
                Route::post('ajax/documents/reject','DocumentController@reject');
            });
    });
