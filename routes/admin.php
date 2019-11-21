<?php

    Route::group(['namespace'=>'admin'], function () {
        Route::get('login', 'LoginController@index');
    });

    Route::group(['namespace'=>'admin','middleware'=>'token'], function () {
        Route::get('logout', 'LoginOutController@index');
        //User
        Route::post('user', 'UserController@store');
        Route::get('user', 'UserController@index');
        //Role
        Route::get('role', 'RoleController@index');
        //Permission
        //Article
    });
