<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function () {
    $namespace = '\Website\Http\Controllers\\';

    Route::get('/', $namespace.'MainController@index');
    Route::post('/contact-us', $namespace.'ContactController@store');
    Route::post('/login', $namespace.'LoginController@login');

    Route::get('/create-account', $namespace.'MainController@createAccount');

    Route::get('/create-student-account', $namespace.'MainController@createStudentAccount');
    Route::post('/store-student-account', $namespace.'MainController@storeStudentAccount');

    Route::get('/create-listener-account', $namespace.'MainController@createListenerAccount');
    Route::post('/store-listener-account', $namespace.'MainController@storeListenerAccount');
});

