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
                Route::resource('users', 'UserController');
                // Users Ajax
                Route::get('users/ajax/simple-show','UserController@simpleShow');
        });
});
