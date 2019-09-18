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

Route::get('/', 'HomeController@home')->middleware('checkNotUserAndGuest')->name('welcome');
Route::get('/ajax', 'HomeController@ajax')->middleware('checkNotUserAndGuest')->name('ajaxGetVehicle');

/*Profile page*/

Route::get('/profile/{id}', 'ProfileController@edit')->middleware('checkGuest')->name('editProfile');
Route::post('/profile/{id}', 'ProfileController@update')->middleware('checkGuest')->name('updateProfile');

/*Admin home page*/

Route::get('/admin', 'AdminController@home_renting')->middleware('checkAdmin')->name('dashboard');

/*Admin home page*/

Route::get('/dashboard', 'AdminController@home_renting')->name('dashboard');

/*Renting page*/

Route::get('/admin/renting', 'AdminController@home_renting')->middleware('checkAdmin')->name('homeRenting');

/*User page*/

Route::get('/admin/user', 'AdminController@home_user')->middleware('checkAdmin')->name('homeUser');

Route::get('/admin/user/edit/{id}', 'AdminController@edit_user')->middleware('checkAdmin')->name('editUser');
Route::post('/admin/user/edit/{id}', 'AdminController@update_user')->middleware('checkAdmin')->name('updateUser');

Route::post('/admin/user/delete', 'AdminController@delete_user')->middleware('checkAdmin')->name('deleteUser');

/*Vehicle page*/

Route::get('/admin/vehicle', 'AdminController@home_vehicle')->middleware('checkAdmin')->name('homeVehicle');

Route::get('/admin/vehicle/edit/{id}', 'AdminController@edit_vehicle')->middleware('checkAdmin')->name('editVehicle');
Route::post('/admin/vehicle/edit/{id}', 'AdminController@update_vehicle')->middleware('checkAdmin')->name('updateVehicle');

Route::get('/admin/vehicle/add', 'AdminController@create_vehicle')->middleware('checkAdmin')->name('createVehicle');
Route::post('/admin/vehicle/add', 'AdminController@store_vehicle')->middleware('checkAdmin')->name('storeVehicle');

Route::post('/admin/vehicle/delete', 'AdminController@delete_vehicle')->middleware('checkAdmin')->name('deleteVehicle');

/*Brand page*/

Route::get('/admin/brand', 'TableController@home_brand')->middleware('checkAdmin')->name('homeBrand');

Route::get('/admin/brand/add', 'TableController@create_brand')->middleware('checkAdmin')->name('createBrand');
Route::post('/admin/brand/add', 'TableController@store_brand')->middleware('checkAdmin')->name('storeBrand');

Route::get('/admin/brand/edit/{id}', 'TableController@edit_brand')->middleware('checkAdmin')->name('editBrand');
Route::post('/admin/brand/edit/{id}', 'TableController@update_brand')->middleware('checkAdmin')->name('updateBrand');

Route::post('/admin/brand/delete', 'TableController@delete_brand')->middleware('checkAdmin')->name('deleteBrand');

/*Type page*/

Route::get('/admin/type', 'TableController@home_type')->middleware('checkAdmin')->name('homeType');

Route::get('/admin/type/add', 'TableController@create_type')->middleware('checkAdmin')->name('createType');
Route::post('/admin/type/add', 'TableController@store_type')->middleware('checkAdmin')->name('storeType');

Route::get('/admin/type/edit/{id}', 'TableController@edit_type')->middleware('checkAdmin')->name('editType');
Route::post('/admin/type/edit/{id}', 'TableController@update_type')->middleware('checkAdmin')->name('updateType');

Route::post('/admin/type/delete', 'TableController@delete_type')->middleware('checkAdmin')->name('deleteType');

/*Color page*/

Route::get('/admin/color', 'TableController@home_color')->middleware('checkAdmin')->name('homeColor');

Route::get('/admin/color/add', 'TableController@create_color')->middleware('checkAdmin')->name('createColor');
Route::post('/admin/color/add', 'TableController@store_color')->middleware('checkAdmin')->name('storeColor');

Route::get('/admin/color/edit/{id}', 'TableController@edit_color')->middleware('checkAdmin')->name('editColor');
Route::post('/admin/color/edit/{id}', 'TableController@update_color')->middleware('checkAdmin')->name('updateColor');

Route::post('/admin/color/delete', 'TableController@delete_color')->middleware('checkAdmin')->name('deleteColor');

/*Status page*/

Route::get('/admin/status', 'TableController@home_status')->middleware('checkAdmin')->name('homeStatus');

Route::get('/admin/status/add', 'TableController@create_status')->middleware('checkAdmin')->name('createStatus');
Route::post('/admin/status/add', 'TableController@store_status')->middleware('checkAdmin')->name('storeStatus');

Route::get('/admin/status/edit/{id}', 'TableController@edit_status')->middleware('checkAdmin')->name('editStatus');
Route::post('/admin/status/edit/{id}', 'TableController@update_status')->middleware('checkAdmin')->name('updateStatus');

Route::post('/admin/status/delete', 'TableController@delete_status')->middleware('checkAdmin')->name('deleteStatus');

/*Vehicle status page*/

Route::get('/admin/ve_status', 'TableController@home_ve_status')->middleware('checkAdmin')->name('homeVe_status');

Route::get('/admin/ve_status/add', 'TableController@create_ve_status')->middleware('checkAdmin')->name('createVe_status');
Route::post('/admin/ve_status/add', 'TableController@store_ve_status')->middleware('checkAdmin')->name('storeVe_status');

Route::get('/admin/ve_status/edit/{id}', 'TableController@edit_ve_status')->middleware('checkAdmin')->name('editVe_status');
Route::post('/admin/ve_status/edit/{id}', 'TableController@update_ve_status')->middleware('checkAdmin')->name('updateVe_status');

Route::post('/admin/ve_status/delete', 'TableController@delete_ve_status')->middleware('checkAdmin')->name('deleteVe_status');

/*Role page*/

Route::get('/admin/role', 'TableController@home_role')->middleware('checkAdmin')->name('homeRole');

Route::get('/admin/role/add', 'TableController@create_role')->middleware('checkAdmin')->name('createRole');
Route::post('/admin/role/add', 'TableController@store_role')->middleware('checkAdmin')->name('storeRole');

Route::get('/admin/role/edit/{id}', 'TableController@edit_role')->middleware('checkAdmin')->name('editRole');
Route::post('/admin/role/edit/{id}', 'TableController@update_role')->middleware('checkAdmin')->name('updateRole');

Route::post('/admin/role/delete', 'TableController@delete_role')->middleware('checkAdmin')->name('deleteRole');

/*Cart page*/

Route::post('/add cart', 'BookingController@add_cart')->name('addCart');
Route::get('/checkout', 'BookingController@checkout')->middleware('checkUser')->name('checkout');
Route::post('/checkout', 'BookingController@caculator')->middleware('checkUser')->name('caculator');
Route::post('/checkout/delete/{id}', 'BookingController@delete_cart')->middleware('checkUser')->name('deleteCart');
Route::get('/checkout/confirm', 'BookingController@confirm')->middleware('checkUser')->name('confirm');
Route::get('/checkout/successfully', 'BookingController@store_cart')->middleware('checkUser')->name('storeCart');
Route::get('/renting info', 'BookingController@renting_info')->middleware('checkUser')->name('rentingInfo');

/*Vehicle detail page*/

Route::get('/vehicle/{id}', 'HomeController@vehicle_detail')->name('vehicleDetail');

/*Search page*/

Route::get('/search', 'HomeController@searchInfo')->name('searchInfo');

/*Change Password*/

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

