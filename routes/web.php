<?php

Route::get('/', 'SiteController@index'); //page index

Route::group(['prefix' => 'admin', /* 'middleware' => ['auth', 'admin'] */ ], function(){
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
Route::group(['prefix' =>'agency', /* 'middleware' => ['auth', 'agency'] */ ], function(){
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
        Route::post('/today/store', 'AssignedRouteController@todayStore')->name('assigned-routes.today.store');
        Route::get('/yesterday', 'AssignedRouteController@yesterday')->name('assigned-routes.yesterday');
        Route::get('/tomorrow', 'AssignedRouteController@tomorrow')->name('assigned-routes.tomorrow');
        Route::get('/filter', 'AssignedRouteController@filter')->name('assigned-routes.filter');
    });

    //Routes for bookings
    Route::group(['prefix' => 'bookings'], function(){
        Route::get('/', 'BookingsController@today')->name('bookings.today');
    });
});

//api routes
Route::group(['prefix' => 'api'], function(){
    Route::get('/', 'UserBookingController@empty');
    Route::post('/book', 'UserBookingController@book')->name('api.book');
    Route::get('/verify/email/{email}', 'UserApiController@verifyEmail')->name('verify.email');
    Route::get('/verify/tel/{tel}', 'UserApiController@verifyTel')->name('verify.tel');
    Route::get('/verify/username/{username}', 'UserApiController@verifyUsername')->name('verify.username');

    Route::post('/payment/momo', 'PaymentProcessor@momo');
    Route::post('/payment/orange', 'PaymentProcessor@orange');
    Route::post('/payment/visa', 'PaymentProcessor@visa');
});


Auth::routes();

//custom auth routes
Route::post('/mylogin', 'MyLoginController@login')->name('mylogin');
Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
Route::post('/user/signup', 'MyLoginController@userSignUp')->name('user.signup');
Route::post('/user/login', 'MyLoginController@userLogin')->name('user.login');

Route::get('/home', 'HomeController@index')->name('home');

//website routes
Route::post('/subscribe', 'SiteController@subscribe')->name('email.subscribe');
Route::get('/book', 'UserBookingController@bookCreate')->name('book');
Route::get('/bus/search', 'UserBookingController@searchBus')->name('bus.search');
Route::get('book/{id}', 'UserBookingController@busBook')->name('bus.book');
Route::get('/book/{id}/confirm', 'UserBookingController@confirm')->name('bus.book.confirm');
Route::get('/booking/{code}', 'UserBookingController@confirm')->name('booking.confirmation');
Route::get('/booking/{code}/payment', 'BookingPaymentController@selectPaymentMethod')->name('booking.payment');
Route::get('/booking/{code}/payment/momo', 'BookingPaymentController@momoPayment')->name('booking.payment.momo');
Route::get('/booking/{code}/payment/orange', 'BookingPaymentController@orangePayment')->name('booking.payment.orange');
Route::get('/booking/{code}/payment/visa', 'BookingPaymentController@visaPayment')->name('booking.payment.visa');

Route::get('/log', 'SiteController@log');

Route::get('/cookie', 'HomeController@cookie');

Route::get('/temp', function(){
});
