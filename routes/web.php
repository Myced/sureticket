<?php

Route::get('/', function () {
    return view('agency.index');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name("admin-dashboard");

    //route group for agencies
    Route::group(['prefix' => 'agency'], function(){
        Route::get('/', 'AdminAgencyController@index')->name('agencies');
        Route::get('/add', 'AdminAgencyController@create')->name('agency.add');
        Route::post('/store', 'AdminAgencyController@store')->name('agency.store');
        Route::get('/manage', 'AdminAgencyController@index')->name('agencies.manage');
        Route::get('/{id}/edit', 'AdminAgencyController@edit')->name('agency.edit');
        Route::get('/{id}/suspend', 'AdminAgencyController@suspend')->name("agency.suspend");
        Route::get('/{id}/activate', 'AdminAgencyController@activate')->name('agency.activate');
        Route::post('/{id}/update', 'AdminAgencyController@update')->name("agency.update");
        Route::get('/{id}/destroy', 'AdminAgencyController@destroy')->name('agency.destroy');
    });

});

//Route group to for agencies administrators
Route::group(['prefix' =>'agency'], function(){
    Route::get('/', 'AgencyController@dashboard')->name('agency.dashboard');

    Route::group(['prefix' => 'location'], function(){
        Route::get('/', 'LocationsController@index')->name('locations');
        Route::get('/add', 'LocationsController@create')->name('locations.add');
        Route::post('/store', 'LocationsController@store')->name('locations.store');
    });

    //routes to control agency buses
    Route::group(['prefix' => 'bus'], function(){
        Route::get('/', 'BusController@index')->name('buses');
        Route::get('/add', 'BusController@create')->name('bus.add');
        Route::post('/store', 'BusController@store')->name('bus.store');
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
