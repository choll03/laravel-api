<?php


/**
 * ----------------------------------------------------------
 * Auth
 * ----------------------------------------------------------
 * Untuk Authentication User internal
 * 
 */
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'jwt.verify:internal'], function ($router) {
        Route::get('me', 'AuthController@me');
        Route::post('logout', 'AuthController@logout');
    });
});
