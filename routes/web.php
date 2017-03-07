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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', 'flavorController@vote');

Route::get('register', 'userController@register');

Route::post('register', 'userController@save_user');

Route::get('login_form', 'userController@login_form');

Route::post('login', 'userController@login');