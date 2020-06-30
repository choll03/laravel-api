<?php

Route::post('login', 'AuthController@login');
Route::get('me', 'AuthController@me');

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    
});