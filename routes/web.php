<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return redirect()->route('admin.home');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // roles users and permissions
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');
    Route::post('add-role-permissions/{role}', 'RoleController@addPermissions')->name('store.role.permissions');
    Route::post('sync-user-role/{user}', 'UserController@syncRoles')->name('sync.user.roles');


    // Gov states
    Route::get('{gov}/stats', 'GovController@states')->name('gov.states');


    Route::resource('owners', 'OwnerController');
    Route::resource('buildings', 'BuildingController');

});