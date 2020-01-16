<?php

use Illuminate\Support\Facades\Route;


Route::namespace("Dashboard\\Admin")
    ->name('dashboard.admin')
    ->prefix('dashboard/admin')
    ->group(function () {
        Route::get('', 'MainController@index');
        Route::name('.')
            ->group(function () {
                Route::post('/login', 'MainController@login')
                    ->name('login');
                Route::get('/change-language', 'MainController@changeLanguage')
                    ->name('change-language');

                Route::get('users', array('before' => 'userType', 'uses' => 'UserController@index'));
                Route::resources([
                    'users' => 'UserController',
                ]);
        });
});
