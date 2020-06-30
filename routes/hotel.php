<?php


Route::post('login', 'AuthController@login');

Route::post('refresh', 'AuthController@refresh');
Route::group(['middleware' => 'jwt.verify'], function ($router) {
    Route::get('me', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');
});