<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Route::get('/home','HomeController@handleAdmin')->name('admin.route')->middleware('admin');
    Route::get('/gestion_manger','Admin\gstManagerController@all_liste')->middleware('admin');
    Route::post('/gestion_manger','Admin\gstManagerController@store')->middleware('admin');
    Route::get('/managers/{q?}','Admin\gstManagerController@index')->middleware('admin');
    // Route::get('/manager-edit','Admin\gstManagerController@update')->middleware('admin');//{id}
    Route::get('/manager-edit/{id}','Admin\gstManagerController@edit');
    Route::post('/manager-update/{id}','Admin\gstManagerController@update');
    // Route::post('/manager-update/{id}','Admin\gstManagerController@update');
    Route::delete('/manager-delete/{id}','Admin\gstManagerController@destroy');
    // Route::post('/manager-add','Admin\gstManagerController@add');
    // Route::get('/manager-search/{data}','Admin\gstManagerController@searchData')->name('api.datat');
    Route::get('/gestion_client','Admin\gstClientController@all_liste')->middleware('admin');

   }) ;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/add', 'admin.dashboard');
// Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('manager/home', 'HomeController@handleManager')->name('manager.route')->middleware('manager');
Route::get('user/home', 'HomeController@handleUser')->name('user.route')->middleware('user');

