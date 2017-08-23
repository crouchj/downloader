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
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function () {

    // Show Dashboard (url: http://downloader.com/admin)
    Route::get('/', array(
        'as' => 'dashboard',
        'uses' => 'DashBoardController@index',
    ));

    // Resource Controller for user management
    // Route::resource('user', 'SessionsController');
    Route::resource('download', 'DownloadController');
    Route::resource('artist', 'ArtistController');
    Route::resource('release', 'ReleaseController');
    Route::resource('card', 'CardController');
    Route::resource('cardLayout', 'CardLayoutController');
    Route::resource('config', 'ConfigController');

    // /*******************
    // ** AJAX endpoints
    // ********************/
    // //~~~ Releases ~~~
    // Route::post('api/releases/store', array(
    //     'as'    => 'ajax.releases.store',
    //     'uses'    => 'ReleaseController@store'
    // ));
    // Route::post('api/releases/{releases}/update', array(
    //     'as'    => 'ajax.releases.update',
    //     'uses'    => 'ReleaseController@update'
    // ));
    // Route::delete('api/releases/{releases}/destroy', array(
    //     'as'    => 'ajax.releases.destroy',
    //     'uses'    => 'ReleaseController@destroy'
    // ));
    // //~~~ Artists ~~~
    // Route::post('api/artists/store', array(
    //     'as'    => 'ajax.artists.store',
    //     'uses'    => 'ArtistController@store'
    // ));
    // Route::post('api/artists/{artists}/update', array(
    //     'as'    => 'ajax.artists.update',
    //     'uses'    => 'ArtistController@update'
    // ));
    // Route::delete('api/artists/{artists}/destroy', array(
    //     'as'    => 'ajax.artists.destroy',
    //     'uses'    => 'ArtistController@destroy'
    // ));
    // //~~~ DL Cards ~~~
    // Route::post('api/cards/store', array(
    //     'as'    => 'ajax.cards.store',
    //     'uses'    => 'CardController@store'
    // ));
    // Route::post('api/cards/{cards}/update', array(
    //     'as'    => 'ajax.cards.update',
    //     'uses'    => 'CardController@update'
    // ));
    // Route::delete('api/cards/{cards}/destroy', array(
    //     'as'    => 'ajax.cards.destroy',
    //     'uses'    => 'CardController@destroy'
    // ));
    // //~~~ DL Card Layouts ~~~
    // Route::post('api/cardLayouts/store', array(
    //     'as'    => 'ajax.cardLayouts.store',
    //     'uses'    => 'CardLayoutController@store'
    // ));
    // Route::post('api/cardLayouts/{cardLayouts}/update', array(
    //     'as'    => 'ajax.cardLayouts.update',
    //     'uses'    => 'CardLayoutController@update'
    // ));
    // Route::delete('api/cardLayouts/{cardLayouts}/destroy', array(
    //     'as'    => 'ajax.cardLayouts.destroy',
    //     'uses'    => 'CardLayoutController@destroy'
    // ));
});

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

// Sessions management
// Route::get('/logout', array(
//     'as' => 'logout',
//     'uses' => 'SessionsController@destroy',
// ));
//
// Route::get('/login', array(
//     'as' => 'loginForm',
//     'uses' => 'SessionsController@create',
// ));

// Route::resource('sessions', 'SessionsController');
