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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getC', 'categoryController@getCategory');
Route::get('getC/{id}', 'categoryController@show');
Route::post('insertC', 'categoryController@insertCategory');
Route::delete('deleteC', 'categoryController@deleteCategory');
Route::put('updateC', 'categoryController@updateCategory');


Route::get('items', 'itemController@getItems');
Route::get('items/{id}', 'itemController@show');
Route::post('insert', 'itemController@insertItems');
Route::delete('delete', 'itemController@deleteItems');
Route::put('update', 'itemController@updateItems');
