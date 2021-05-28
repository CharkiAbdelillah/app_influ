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
    return view('/auth/login');
});

Route::prefix('admin')->group(function() {
    Route::get('/home','HomeController@handleAdmin')->name('admin.route')->middleware('admin');
    Route::get('/gestion_manger','Admin\gstManagerController@all_liste')->middleware('admin');
    Route::post('/gestion_manger','Admin\gstManagerController@store')->middleware('admin');
    Route::get('/managers/{q?}','Admin\gstManagerController@index')->middleware('admin');
    // Route::get('/personne/{q?}','PersonneController@index');
    Route::get('/manager-edit/{id}','Admin\gstManagerController@edit');
    Route::post('/manager-update/{id}','Admin\gstManagerController@update');
    Route::delete('/manager-delete/{id}','Admin\gstManagerController@destroy');
    //client 
    Route::get('/gestion_user','Admin\gstClientController@all_liste')->middleware('admin');
    Route::post('/gestion_user','Admin\gstClientController@store')->middleware('admin');
    Route::get('/users/{q?}','Admin\gstClientController@index')->middleware('admin');
    Route::get('/user-edit/{id}','Admin\gstClientController@edit');
    Route::post('/user-update/{id}','Admin\gstClientController@update');
    Route::delete('/user-delete/{id}','Admin\gstClientController@destroy');
    Route::get('/gestion_client','Admin\gstClientController@all_liste')->middleware('admin');

   }) ;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/test', 'PersonneController@test');
// Route::get('/test2', 'TypeActiviteController@getTypeDomaine');
// Route::get('/test3', 'TypeActiviteController@getDomaineType');
// Route::view('/add', 'admin.dashboard');
// Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('manager/home', 'HomeController@handleManager')->name('manager.route')->middleware('manager');
Route::get('user/home', 'HomeController@handleUser')->name('user.route')->middleware('user');
Route::get('user/home2', 'HomeController@handleUser2')->name('user.route2');
Route::get('user/details', 'HomeController@handleUser2')->name('user.details');//->middleware('user')
Route::get('user/instagram', 'HomeController@handleUser2')->name('user.details');//->middleware('user')
Route::get('user/facebook', 'HomeController@handleUser2')->name('user.details');//->middleware('user')
Route::get('user/youtube', 'HomeController@handleUser2')->name('user.details');//->middleware('user')
Route::get('user/snapchat', 'HomeController@handleUser2')->name('user.details');//->middleware('user')


// Route::group(['prefix'=>'user','middleware' => ['manager']], function () {
//     //
//     Route::get('home2', 'HomeController@handleUser2')->name('user.route2');
// });