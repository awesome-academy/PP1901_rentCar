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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@home')->name('welcome');

Route::get('/ajax','HomeController@ajax')->name('ajaxGetVehicle');

Route::get('/profile/{id}','ProfileController@edit')->name('editProfile');
Route::post('/profile/{id}','ProfileController@update')->name('updateProfile');

Route::get('/admin/renting', 'AdminController@home_renting')->name('home_renting');
Route::get('/admin/user', 'AdminController@home_user')->name('home_user');
Route::get('/admin/vehicle', 'AdminController@home_vehicle')->name('home_vehicle');


