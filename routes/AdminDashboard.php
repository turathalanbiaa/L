<?php

$namespace = 'AdminDashboard\\';

Route::get('/admin', $namespace.'MainController@welcome')->name('adminWelcome');
Route::get('/admin/change-language', $namespace.'MainController@changeLanguage')->name('adminChangeLanguage');
Route::get('/admin/login', $namespace.'MainController@login')->name('adminLogin');
Route::get('/admin/dashboard', $namespace.'MainController@index')->name('adminDashboard');
