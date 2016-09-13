<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as' => 'index',
    'uses' => 'MiscController@index'
]);

Route::get('/auth/login', [
    'as' => 'auth.login',
    'uses' => 'AuthController@login'
])->middleware('guest');
Route::post('/auth/login', 'AuthController@doLogin')->middleware('guest');

Route::get('/auth/logout', [
    'as' => 'auth.logout',
    'uses' => 'AuthController@logout'
])->middleware('auth');

Route::get('/auth/create', [
    'as' => 'auth.create-account',
    'uses' => 'AuthController@createAccount'
])->middleware('guest');
Route::post('/auth/create', 'AuthController@doCreateAccount')->middleware('guest');

Route::get('/auth/email/verify/{userId}/{email}/{token}', [
    'as' => 'auth.emails.verify',
    'uses' => 'AuthController@doVerifyEmail'
]);

Route::get('/auth/email/preferences', [
    'as' => 'auth.emails.preferences',
    'uses' => function() { return 'Not yet implemented'; }
]);

Route::get('/jsdict', [
    'as' => 'jsdict',
    'uses' => 'MiscController@jsDict'
]);
