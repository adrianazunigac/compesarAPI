<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//Rutas de autentificacion
Auth::routes(['register' => false]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')
	->name('home');

/*GRUPO DE RUTA PARA EL MIDDLEWARE AUTH (AUTENTIFICACION) */
Route::middleware(['auth'])->group(function () {
	//users
	Route::get('users', 'App\Http\Controllers\UserController@index')
		->name('users.index');

	Route::get('users/create', 'App\Http\Controllers\UserController@create')
		->name('users.create');

	Route::post('users', 'App\Http\Controllers\UserController@store')
		->name('users.store');

	Route::get('users/{user}', 'App\Http\Controllers\UserController@show')
		->name('users.show');

	Route::get('users/{user}/edit','App\Http\Controllers\UserController@edit')
		->name('users.edit');

	Route::put('users/{user}', 'App\Http\Controllers\UserController@update')
		->name('users.update');

	Route::delete('users/{user}', 'App\Http\Controllers\UserController@destroy')
		->name('users.destroy');
});