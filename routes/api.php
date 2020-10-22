<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
* RUTAS DE AUTENFICACION
*/
Route::group(['prefix' => 'auth' ], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signUp');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
    });
});

//Recuperacion de contraseña
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');


/**
* RUTA DE TIPOS DE PREGUNTA
*/
Route::group(['prefix' => 'question/types' ], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/', 'App\Http\Controllers\QuestionTypeController@index');
    });
});


/**
* RUTAS DE FORMULARIOS
*/
Route::group(['prefix' => 'forms' ], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/', 'App\Http\Controllers\FormController@index');
        Route::post('/', 'App\Http\Controllers\FormController@store');
        Route::get('/{id}', 'App\Http\Controllers\FormController@show');
        Route::put('/{id}', 'App\Http\Controllers\FormController@update');
        Route::delete('/{id}', 'App\Http\Controllers\FormController@destroy');
    });
});


/**
* RUTAS DE PREGUNTAS
*/
Route::group(['prefix' => 'questions' ], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('/', 'App\Http\Controllers\QuestionController@store');
        Route::get('/{id}', 'App\Http\Controllers\QuestionController@show');
        Route::put('/{id}', 'App\Http\Controllers\QuestionController@update');
        Route::delete('/{id}', 'App\Http\Controllers\QuestionController@destroy');
    });
});