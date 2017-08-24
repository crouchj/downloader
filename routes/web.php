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
    Route::resource('download', 'DownloadController');
    Route::resource('artist', 'ArtistController');
    Route::resource('release', 'ReleaseController');
    Route::resource('card', 'CardController');
    Route::resource('cardLayout', 'CardLayoutController');
    Route::resource('config', 'ConfigController');
    Route::resource('user', 'UserController');
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
