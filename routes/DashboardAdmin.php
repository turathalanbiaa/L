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
                Route::get('change-language', 'MainController@changeLanguage')
                    ->name('change-language');

                // Users
                Route::resource('users', 'UserController');
                Route::resource('users', 'UserController', [
                    'only' => [
                        'index'
                    ]
                ])->middleware('filter:user-type');

        });
});
