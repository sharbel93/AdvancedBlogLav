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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'manage', 'middleware' =>
    ['auth','role:superadministrator|administrator|editor|author|contributor']], function() {
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/permissions', 'PermissionController', ['except' =>
    'destroy']);
    Route::resource('/roles', 'RoleController', ['except' =>
    'destroy']);
});
//Route::group(['prefix' => 'manage', 'middleware' =>
//    ['role:superadministrator|administrator|editor|author|contributor']], function() {
//    Route::get('/', 'ManageController@index');
//    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
//    Route::resource('/users', 'UserController');
//});
//Route::prefix('manage')->middleware('auth','role:superadministrator|administrator|editor|author|contributor')->group
//(function () {
//    Route::get('/', 'ManageController@index');
//    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
//    Route::resource('/users', 'UserController');
//    Route::resource('/permissions', 'PermissionController', ['except' =>
//        'destroy']);
//});

//Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
//{
//    Route::get('dashboard', function() {} );
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
