<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('/register', ['as' => 'register', 'uses' => 'UsersController@create']);
Route::post('/register', 'UsersController@store');

Route::get('/login', ['as' => 'login', 'uses' => 'UsersController@loginForm']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);
Route::post('/login', 'UsersController@login');

Route::get('/users/confirm', ['as' => 'confirm', 'uses' => 'UsersController@confirm']);
