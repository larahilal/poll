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

Route::get('/', 'PollController@home');

Route::get('/poll/{poll_id}', 'PollController@displayPoll')->name('displayPoll');
Route::post('/vote', 'PollController@vote');
Route::get('/results', 'PollController@viewResults')->name('results');


Route::get('register', 'userController@register')->name('registerForm');

Route::post('register', 'userController@save_user');

Route::get('login_form', 'userController@login_form')->name('loginForm');

Route::post('login', 'userController@login');

Route::get('user_with_flavor', 'userController@get_user_with_flavor');