<?php

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

// Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

// Admin routes
Route::group(['middleware' => 'auth'], function () {
	Route::get('/blogposts', 'BlogpostController@index');
	Route::get('/blogpost/create', 'BlogpostController@create');
	Route::get('/blogpost/{id}/edit', 'BlogpostController@edit');

	Route::post('/blogpost/store', 'BlogpostController@store');
	Route::post('/blogpost/{id}/update', 'BlogpostController@update');
	Route::post('/blogpost/{id}/delete', 'BlogpostController@destroy');
});