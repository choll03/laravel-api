<?php

Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'jwt.verify'], function ($router) {
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');
    
});