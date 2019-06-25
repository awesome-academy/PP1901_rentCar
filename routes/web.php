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

/*Welcome page*/

Route::get('/', 'HomeController@home')->name('welcome');
Route::get('/ajax', 'HomeController@ajax')->name('ajaxGetVehicle');

/*Profile page*/

Route::get('/profile/{id}', 'ProfileController@edit')->name('editProfile');
Route::post('/profile/{id}', 'ProfileController@update')->name('updateProfile');

/*Renting page*/

Route::get('/admin/renting', 'AdminController@home_renting')->name('homeRenting');

/*User page*/

Route::get('/admin/user', 'AdminController@home_user')->name('homeUser');

Route::get('/admin/user/edit/{id}', 'AdminController@edit_user')->name('editUser');
Route::post('/admin/user/edit/{id}', 'AdminController@update_user')->name('updateUser');

Route::post('/admin/user/delete', 'AdminController@delete_user')->name('deleteUser');

/*Vehicle page*/

Route::get('/admin/vehicle', 'AdminController@home_vehicle')->name('homeVehicle');

Route::get('/admin/vehicle/edit/{id}', 'AdminController@edit_vehicle')->name('editVehicle');
Route::post('/admin/vehicle/edit/{id}', 'AdminController@update_vehicle')->name('updateVehicle');

Route::get('/admin/vehicle/add', 'AdminController@create_vehicle')->name('createVehicle');
Route::post('/admin/vehicle/add', 'AdminController@store_vehicle')->name('storeVehicle');

Route::post('/admin/vehicle/delete', 'AdminController@delete_vehicle')->name('deleteVehicle');

/*Brand page*/

Route::get('/admin/brand', 'TableController@home_brand')->name('homeBrand');

Route::get('/admin/brand/add', 'TableController@create_brand')->name('createBrand');
Route::post('/admin/brand/add', 'TableController@store_brand')->name('storeBrand');

Route::get('/admin/brand/edit/{id}', 'TableController@edit_brand')->name('editBrand');
Route::post('/admin/brand/edit/{id}', 'TableController@update_brand')->name('updateBrand');

Route::post('/admin/brand/delete', 'TableController@delete_brand')->name('deleteBrand');

/*Type page*/

Route::get('/admin/type', 'TableController@home_type')->name('homeType');

Route::get('/admin/type/add', 'TableController@create_type')->name('createType');
Route::post('/admin/type/add', 'TableController@store_type')->name('storeType');

Route::get('/admin/type/edit/{id}', 'TableController@edit_type')->name('editType');
Route::post('/admin/type/edit/{id}', 'TableController@update_type')->name('updateType');

Route::post('/admin/type/delete', 'TableController@delete_type')->name('deleteType');

/*Color page*/

Route::get('/admin/color', 'TableController@home_color')->name('homeColor');

Route::get('/admin/color/add', 'TableController@create_color')->name('createColor');
Route::post('/admin/color/add', 'TableController@store_color')->name('storeColor');

Route::get('/admin/color/edit/{id}', 'TableController@edit_color')->name('editColor');
Route::post('/admin/color/edit/{id}', 'TableController@update_color')->name('updateColor');

Route::post('/admin/color/delete', 'TableController@delete_color')->name('deleteColor');

/*Status page*/

Route::get('/admin/status', 'TableController@home_status')->name('homeStatus');

Route::get('/admin/status/add', 'TableController@create_status')->name('createStatus');
Route::post('/admin/status/add', 'TableController@store_status')->name('storeStatus');

Route::get('/admin/status/edit/{id}', 'TableController@edit_status')->name('editStatus');
Route::post('/admin/status/edit/{id}', 'TableController@update_status')->name('updateStatus');

Route::post('/admin/status/delete', 'TableController@delete_status')->name('deleteStatus');

/*Vehicle status page*/

Route::get('/admin/ve_status', 'TableController@home_ve_status')->name('homeVe_status');

Route::get('/admin/ve_status/add', 'TableController@create_ve_status')->name('createVe_status');
Route::post('/admin/ve_status/add', 'TableController@store_ve_status')->name('storeVe_status');

Route::get('/admin/ve_status/edit/{id}', 'TableController@edit_ve_status')->name('editVe_status');
Route::post('/admin/ve_status/edit/{id}', 'TableController@update_ve_status')->name('updateVe_status');

Route::post('/admin/ve_status/delete', 'TableController@delete_ve_status')->name('deleteVe_status');

/*Role page*/

Route::get('/admin/role', 'TableController@home_role')->name('homeRole');

Route::get('/admin/role/add', 'TableController@create_role')->name('createRole');
Route::post('/admin/role/add', 'TableController@store_role')->name('storeRole');

Route::get('/admin/role/edit/{id}', 'TableController@edit_role')->name('editRole');
Route::post('/admin/role/edit/{id}', 'TableController@update_role')->name('updateRole');

Route::post('/admin/role/delete', 'TableController@delete_role')->name('deleteRole');

/*Add Cart*/

Route::post('/add cart', 'HomeController@add_cart')->name('addCart');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');

