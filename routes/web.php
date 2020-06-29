<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
});