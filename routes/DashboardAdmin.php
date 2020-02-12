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

                // Users Resources
                Route::resource('users', 'UserController')->except('destroy');
                // Users Ajax
                Route::get('ajax/users/info','UserController@info');

                // Documents Resources
                Route::resource('documents', 'DocumentController')->except(['show', 'edit', 'update', 'destroy']);
                // Documents Ajax
                Route::post('ajax/documents/accept','DocumentController@accept');
                Route::post('ajax/documents/reject','DocumentController@reject');
        });
});
