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

Route::get('/ajax', 'HomeController@ajax')->name('ajaxGetVehicle');

Route::get('/profile/{id}', 'ProfileController@edit')->name('editProfile');
Route::post('/profile/{id}', 'ProfileController@update')->name('updateProfile');

Route::get('/admin/renting', 'AdminController@home_renting')->name('home_renting');
Route::get('/admin/user', 'AdminController@home_user')->name('home_user');
Route::get('/admin/vehicle', 'AdminController@home_vehicle')->name('home_vehicle');

Route::get('/admin/user/edit/{id}', 'AdminController@edit_user')->name('editUser');
Route::post('/admin/user/edit/{id}', 'AdminController@update_user')->name('updateUser');

Route::post('/admin/user/delete', 'AdminController@delete_user')->name('deleteUser');

Route::get('/admin/vehicel/edit/{id}','AdminController@edit_vehicle')->name('editVehicle');
Route::post('/admin/vehicel/edit/{id}','AdminController@update_vehicle')->name('updateVehicle');

Route::get('/admin/vehicel/add','AdminController@create_vehicle')->name('createVehicle');
Route::post('/admin/vehicel/add','AdminController@store_vehicle')->name('storeVehicle');



Route::post('/admin/vehicle/delete', 'AdminController@delete_vehicle')->name('deleteVehicle');


