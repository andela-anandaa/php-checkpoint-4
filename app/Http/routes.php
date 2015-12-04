<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Resource\\DashboardController@getIndex');

// Native login
Route::post('/auth/login', 'Auth\\AuthController@postLogin');
Route::get('auth/login', 'Auth\\AuthController@getLogin');

// Global logout
Route::get('/auth/logout', 'Auth\\AuthController@getLogout');

// Native Registration
Route::get('auth/register', 'Auth\\AuthController@getRegister');
Route::post('auth/register', 'Auth\\AuthController@postRegister');

// Social login
Route::get('/auth/{provider}/', 'Auth\\SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\\SocialAuthController@handleProviderCallback');

Route::resource('/api/resources', 'ResourceController');

Route::group(['prefix' => '/resources'], function () {
    Route::get('/', 'Resource\\DashboardController@getIndex');
    Route::get('/personal', 'Resource\\DashboardController@getPersonal');
    Route::get('/create', 'Resource\\DashboardController@getCreate');
    Route::post('/create', 'Resource\\DashboardController@postCreate');
    Route::get('/{resource_id}', 'Resource\\DashboardController@getResource');
    Route::post('/{resource_id}', 'Resource\\DashboardController@postResource');
    Route::get('/{resource_id}/edit', 'Resource\\DashboardController@getEditor');
    Route::post('/{resource_id}/delete', 'Resource\\DashboardController@postDelete');
    Route::get('/category/{category_id}', 'Resource\\DashboardController@getIndexByCategory');
});


Route::group(['prefix' => '/categories'], function () {
    Route::get('/create', 'Resource\\CategoryController@getCreator');
    Route::post('/create', 'Resource\\CategoryController@postCreateCategory');
});
