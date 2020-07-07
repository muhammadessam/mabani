<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return redirect()->route('home');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // roles users and permissions
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');
    Route::post('add-role-permissions/{role}', 'RoleController@addPermissions')->name('store.role.permissions');
    Route::post('sync-user-role/{user}', 'UserController@syncRoles')->name('sync.user.roles');
    //owners
    Route::resource('owners', 'OwnerController');
    //building
    Route::resource('buildings', 'BuildingController');
    Route::post('{building}/add-owner', 'BuildingController@addOwner')->name('building.attach.owners');
    Route::post('{building}/{owner}/remove', 'BuildingController@removeOwner')->name('buildings.owners.detach');

    //floors
    Route::resource('floors', 'FloorController');

    //unit_types
    Route::resource('unit-types', 'UnitTypeController');

    //settings
    Route::resource('settings', 'SettingController')->except('store', 'show', 'destroy');

    //units
    Route::resource('units', 'UnitController');

    //tenants
    Route::resource('tenants', 'TenantController');

    //contracts
    Route::resource('contracts', 'ContractController');
});