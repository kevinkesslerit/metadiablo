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
Route::domain('api.metadiablo.com')->group(function () {
    /*Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });*/
    Route::get('/items/runewords', 'runewordsController@index')->name('runewords')->middleware('auth:api');
    Route::get('/items/runes', 'runesController@index')->name('runes')->middleware('auth:api');
    Route::get('/cube', 'cubeController@index')->name('cubeRecipes')->middleware('auth:api');
    Route::get('/items/gems', 'gemsController@index')->name('gems')->middleware('auth:api');
    Route::get('/items/uniques', 'uniquesController@index')->name('uniques')->middleware('auth:api');
});