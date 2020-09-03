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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/products')->group(function (){
    Route::get('', 'ProductsController@index');
    Route::get('/{id}', 'ProductsController@show');
    Route::delete('/{id}', 'ProductsController@delete');
});

Route::prefix('/quality')->group(function (){
    Route::get('', 'QualityController@index');
});

Route::prefix('/type')->group(function (){
    Route::get('', 'TypesController@index');
});

Route::prefix('/unit')->group(function (){
    Route::get('', 'UnitsController@index');
});
