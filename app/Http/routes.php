<?php

Route::group(['middleware' => 'web'], function () {
//sites routes
    Route::get('/', 'SitesController@home');
    Route::post('/pay', 'SitesController@pay')->middleware(['throttle:1:5']);
    Route::get('/privacy', 'SitesController@privacy');
    Route::get('/involve', 'SitesController@involve');
    Route::get('/login', 'SitesController@login');
//oauth routes
    Route::get('/oauth/{provider}', 'Auth\AuthController@redirectToProvider')
        ->where(['provider' => 'github']);
    Route::get('/oauth/{provider}/callback', 'Auth\AuthController@handleProviderCallback')
        ->where(['provider' => 'github']);

//users routes
    Route::get('/logout', 'UsersController@logout');

//repos routes
    Route::resource('/repo', 'RepostoryController');

//members routes
    Route::get('members', 'SitesController@members');

// donation routes
    Route::get('donations', 'SitesController@donations');

    Route::get('/api/repos', 'ApiController@repos');
    Route::get('/api/languages', 'ApiController@languages');
    // payments return redirect
    Route::get('/payment/done', 'PaymentsController@paymentRedirect');
    

});

Route::post('/payment/notify', 'PaymentsController@notify');

