<?php

$namespace = '\AdminDashboard\\';

Route::get('/admin', $namespace.'MainController@index');
Route::get('/admin/login', $namespace.'MainController@index');
Route::get('/admin/dashboard', $namespace.'MainController@index');
