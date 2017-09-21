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

/***********************
 * Admin routes
 ***********************/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // Show Dashboard (url: http://downloader.com/admin)
    Route::get('/', array(
        'as' => 'dashboard',
        'uses' => 'DashBoardController@index',
    ));

    // Resource Controller for user management
    Route::resource('download', 'DownloadController', ['except' => ['store', 'update', 'destroy']]);
    Route::resource('artist', 'ArtistController', ['except' => ['store', 'update', 'destroy']]);
    Route::resource('release', 'ReleaseController', ['except' => ['store', 'update', 'destroy']]);
    Route::resource('card', 'CardController', ['except' => ['store', 'update', 'destroy']]);
    Route::resource('cardLayout', 'CardLayoutController', ['except' => ['store', 'update', 'destroy']]);
    Route::resource('config', 'ConfigController', ['except' => ['store', 'update', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['store', 'update', 'destroy']]);
});

Auth::routes();

/**
 * Downloader front-end
 **/
Route::get('/', array(
    'as' => 'downloaderForm',
    'uses' => 'DownloadProcessController@index',
));

Route::group(array('before' => 'csrf'), function () {
    Route::post('/', array(
        'as' => 'processDownloadCode',
        'uses' => 'DownloadProcessController@postDownloadForm',
    ));
});
