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

// Route::middleware('api')->post('/personne','PersonneController@store');
// Route::middleware('api')->get('/personnes','PersonneController@index');
Route::middleware('api')->resource('/personne','PersonneController')->only(['index','show','store','create']);
Route::middleware('api')->resource('/personneInfo','PersonneInfoController')->only(['index','show','store','create']);
Route::middleware('api')->resource('/personneType','TypeActiviteController')->only(['index','show','store','create']);
Route::middleware('api')->resource('/personneTypeDomaine','DomaineController')->only(['index','show','store','create']);