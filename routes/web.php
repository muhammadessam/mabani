<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return redirect()->route('admin.home');
});
Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');
    Route::post('add-role-permissions/{role}', 'RoleController@addPermissions')->name('store.role.permissions');
    Route::post('sync-user-role/{user}', 'UserController@syncRoles')->name('sync.user.roles');
});