<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/adm1n/auth', 'AdminsController@auth');

Route::prefix('/products')->group(function (){
    Route::get('/getByPriceMax', 'ProductsController@getByPriceMax');
    Route::get('/getByPriceMin', 'ProductsController@getByPriceMin');
    Route::get('', 'ProductsController@index');
    Route::get('/{id}', 'ProductsController@show');
    Route::post('', 'ProductsController@create');
    Route::put('/{id}', 'ProductsController@edit');
    Route::delete('/{id}', 'ProductsController@delete');
});

Route::prefix('/quality')->group(function (){
    Route::get('', 'QualityController@index');
    Route::post('', 'QualityController@create');
});

Route::prefix('/type')->group(function (){
    Route::get('', 'TypesController@index');
});

Route::prefix('/unit')->group(function (){
    Route::get('', 'UnitsController@index');
});

Route::prefix('/provincy')->group(function (){
    Route::get('', 'IndonesiaController@provincy');
    Route::get('/{id}', 'IndonesiaController@provincydetail');
});

Route::prefix('/regency')->group(function (){
    Route::get('/{id}', 'IndonesiaController@regencydetail');
});

Route::prefix('/markets')->group(function (){
    Route::get('/category', 'MarketsController@category');
    Route::get('', 'MarketsController@index');
    Route::get('/{id}', 'MarketsController@show');
    Route::post('', 'MarketsController@create');
    Route::post('/{id}', 'MarketsController@edit');
    Route::delete('/{id}', 'MarketsController@delete');
});
