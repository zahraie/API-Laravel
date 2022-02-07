<?php
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

//api های دسترسی کابری
Route::group([], function () {
    Route::post('/login', [
        'as' => 'login',
        'uses' => 'AuthController@login'
    ]);

    Route::post('/logout', [
        'as' => 'logout',
        'uses' => 'AuthController@logout',
        'middleware' => 'auth:api'
    ]);

    Route::get('/user', [
        'as' => 'current-user',
        'uses' => 'AuthController@user',
        'middleware' => 'auth:api'
    ]);
});

//api های مدیریت کاربران
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [
        'as' => 'users',
        'uses' => 'UserController@index',
        'middleware' => 'auth:api'
    ]);

    Route::get('/{userId}', [
        'as' => 'users.show',
        'uses' => 'UserController@show',
        'middleware' => 'auth:api'
    ]);

    Route::post('/', [
        'as' => 'users.create',
        'uses' => 'UserController@create'
    ]);

    Route::put('/{userId}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
        'middleware' => 'auth:api'
    ]);

    Route::delete('/{userId}', [
        'as' => 'users.remove',
        'uses' => 'UserController@remove',
        'middleware' => 'auth:api'
    ]);
});

//api های مدیریت مقالات یا پست ها
Route::group(['prefix' => 'articles'], function () {
    Route::get('', [
        'as' => 'articles',
        'uses' => 'ArticleController@index',
        'middleware' => 'auth:api'
    ]);

    Route::get('/{articleId}', [
        'as' => 'articles.show',
        'uses' => 'ArticleController@show',
        'middleware' => 'auth:api'
    ]);

    Route::post('/', [
        'as' => 'articles.create',
        'uses' => 'ArticleController@create',
        'middleware' => 'auth:api'
    ]);

    Route::put('/{articleId}', [
        'as' => 'articles.update',
        'uses' => 'ArticleController@update',
        'middleware' => 'auth:api'
    ]);

    Route::delete('/{articleId}', [
        'as' => 'articles.remove',
        'uses' => 'ArticleController@remove',
        'middleware' => 'auth:api'
    ]);
});
