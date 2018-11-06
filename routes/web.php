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
    return view('admin.index');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name("admin-dashboard");

    //route group for agencies
    Route::group(['prefix' => 'agency'], function(){
        Route::get('/', 'AdminAgencyController@index')->name('agencies');
        Route::get('/add', 'AdminAgencyController@create')->name('agency.add');
        Route::post('/store', 'AdminAgencyController@store')->name('agency.store');
        Route::get('/manage', 'AdminAgencyController@mange')->name('agencies.manage');

    });

});
