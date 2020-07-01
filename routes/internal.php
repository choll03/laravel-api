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

/**
 * untuk User internal
 * 
 * @var App\Model\Internal
 */
Route::group(['prefix' => 'users', 'middleware' => 'jwt.verify:internal'], function() {
    Route::get('/', 'InternalController@getUser');
    Route::get('/{id}', 'InternalController@findUser');
    Route::post('/', 'InternalController@createUser');
    Route::put('/{id}', 'InternalController@updateUser');
});

/**
 * untuk Role user
 * 
 * @var Role
 */
Route::group(['prefix' => 'roles', 'middleware' => 'jwt.verify:internal'], function() {
    Route::get('/', 'RoleController@getRole');
    Route::get('/{id}', 'RoleController@findRole');
    Route::post('/', 'RoleController@createRole');
    Route::put('/{id}', 'RoleController@updateRole');
});
