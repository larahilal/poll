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

Route::get('/', 'PollController@home')->name('home');

Route::get('/poll/{poll_id}', 'PollController@displayPoll')->name('displayPoll');
Route::post('/vote', 'PollController@cast_vote');
Route::get('/results/{poll_id}', 'PollController@viewResults')->name('results');


Route::get('register', 'userController@register')->name('registerForm');
Route::post('register', 'userController@save_user');


Route::get('login_form', 'userController@login_form')->name('loginForm');
Route::post('login', 'userController@login');


Route::get('user_with_flavor', 'userController@get_user_with_flavor');


Route::get('create_poll', 'PollController@create_poll_form')->name('createPollForm');
Route::post('insert_poll', 'PollController@insert_poll')->name('insert_poll');


Route::get('view_my_polls', 'PollController@view_my_polls')->name('viewMyPolls');

Route::get('/edit_poll/{poll_id}', 'PollController@edit_my_poll')->name('editMyPoll');
Route::post('/save_edited_poll', 'PollController@save_edited_poll')->name('saveEditedPoll');

Route::get('/delete_poll/{poll_id}', 'PollController@delete_my_poll')->name('deleteMyPoll');


Route::get('logout', 'userController@logout')->name('logout');
