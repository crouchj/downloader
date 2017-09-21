<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function() {
  Route::resource('download', 'DownloadController', ['except' => ['index', 'show', 'create', 'edit']]);
  Route::resource('artist', 'ArtistController', ['except' => ['index', 'show', 'create', 'edit']]);
  Route::resource('release', 'ReleaseController', ['except' => ['index', 'show', 'create', 'edit']]);
  Route::resource('card', 'CardController', ['except' => ['index', 'show', 'create', 'edit']]);
  Route::resource('cardLayout', 'CardLayoutController', ['except' => ['index', 'show', 'create', 'edit']]);
  Route::resource('config', 'ConfigController', ['except' => ['index', 'show', 'create', 'edit']]);
  Route::resource('user', 'UserController', ['except' => ['index', 'show', 'create', 'edit']]);
});
