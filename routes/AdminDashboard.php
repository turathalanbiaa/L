<?php

$namespace = 'AdminDashboard\\';

Route::get('/admin', $namespace.'MainController@index')->name('adminIndex');
Route::post('/admin/login', $namespace.'MainController@login')->name('adminLogin');
Route::get('/admin/change-language', $namespace.'MainController@changeLanguage')->name('adminChangeLanguage');
Route::get('/admin/dashboard', $namespace.'DashboardController@index')->name('adminDashboard');
