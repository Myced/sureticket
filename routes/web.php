<?php

Route::get('/', function () {
    return view('agency.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
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

    Route::group(['prefix' => 'account'], function(){
        Route::get('/', 'AdminAccountsController@index')->name('accounts');
        Route::get('/create', 'AdminAccountsController@create')->name('account.create');
        Route::post('/store', 'AdminAccountsController@store')->name('account.store');
        Route::get('/{id}/edit', 'AdminAccountsController@edit')->name('account.edit');
        Route::post('/{id}/update', 'AdminAccountsController@update')->name('account.update');
    });

});

//Route group to for agencies administrators
Route::group(['prefix' =>'agency', 'middleware' => ['auth', 'agency']], function(){
    Route::get('/', 'AgencyController@dashboard')->name('agency.dashboard');

    Route::group(['prefix' => 'location'], function(){
        Route::get('/', 'LocationsController@index')->name('locations');
        Route::get('/add', 'LocationsController@create')->name('locations.add');
        Route::post('/store', 'LocationsController@store')->name('locations.store');
    });

    Route::group(['prefix' => 'route'], function(){
        Route::get('/', 'RouteController@index')->name('route.manage');
        Route::get('/add', 'RouteController@create')->name('route.add');
        Route::post('/store', 'RouteController@store')->name('route.store');
        Route::get('/{id}/edit', 'RouteController@edit')->name('route.edit');
        Route::post('/{id}/update', 'RouteController@update')->name('route.update');
        Route::get('/{id}/destroy', 'RouteController@destroy')->name('route.destroy');

    });

    //routes to control agency buses
    Route::group(['prefix' => 'bus'], function(){
        Route::get('/', 'BusController@index')->name('buses');
        Route::get('/add', 'BusController@create')->name('bus.add');
        Route::post('/store', 'BusController@store')->name('bus.store');
        Route::get('/{id}/edit', 'BusController@edit')->name('bus.edit');
        Route::post('/{id}/update', 'BusController@update')->name('bus.update');
        Route::get('/{id}/destroy', 'BusController@destroy')->name('bus.destroy');
    });

    //routes for assinged bus routes
    Route::group(['prefix' => 'assigned-route'], function(){
        Route::get('/', 'AssignedRouteController@index')->name('assigned-routes');
        Route::get('/today', 'AssignedRouteController@today')->name('assigned-routes.today');
        Route::get('/yesterday', 'AssignedRouteController@yesterday')->name('assigned-routes.yesterday');
        Route::get('/tomorrow', 'AssignedRouteController@tomorrow')->name('assigned-routes.tomorrow');
        Route::get('/filter', 'AssignedRouteController@filter')->name('assigned-routes.filter');
    });
});


Auth::routes();

//custom auth routes
Route::post('/mylogin', 'MyLoginController@login')->name('mylogin');
Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');

Route::get('/home', 'HomeController@index')->name('home');
