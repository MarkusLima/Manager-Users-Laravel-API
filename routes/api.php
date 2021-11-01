<?php

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

use App\Http\Middleware\CheckPermission;
//use Illuminate\Support\Facades\Route;


Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {

    //Auth
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout');

    //Permissions
    Route::get('permissions/find/{id}', 'PermissionController@findPermission')->middleware(CheckPermission::class);
    Route::get('permissions/me', 'PermissionController@showPermission')->middleware(CheckPermission::class);
    Route::get('permissions', 'PermissionController@showAllPermission')->middleware(CheckPermission::class);
    Route::post('permissions/create', 'PermissionController@createPermission')->middleware(CheckPermission::class);
    Route::patch('permissions/update/{id}', 'PermissionController@updatePermission')->middleware(CheckPermission::class);
    Route::delete('permissions/delete/{id}', 'PermissionController@deletePermission')->middleware(CheckPermission::class);

    //Permissions User
    Route::post('permissions/user/create/{user_id}', 'PermissionController@createPermissionUser')->middleware(CheckPermission::class);
    Route::delete('permissions/user/delete/{id}', 'PermissionController@deletePermissionUser')->middleware(CheckPermission::class);
    
    //User
    Route::get('users/find/{id}', 'UserController@findUser')->middleware(CheckPermission::class);
    Route::get('users/me', 'UserController@showUser')->middleware(CheckPermission::class);
    Route::get('users', 'UserController@showAllUser')->middleware(CheckPermission::class);
    Route::patch('users/update/{id}', 'UserController@updateUser')->middleware(CheckPermission::class);
    Route::delete('users/delete/{id}', 'UserController@deleteUSer')->middleware(CheckPermission::class);
    
    //Address
    Route::get('addresses/find/{id}', 'AddressController@findAddress')->middleware(CheckPermission::class);
    Route::get('addresses/me', 'AddressController@showAddress')->middleware(CheckPermission::class);
    Route::get('addresses', 'AddressController@showAllAddress')->middleware(CheckPermission::class);
    Route::post('addresses/create', 'AddressController@createAddress')->middleware(CheckPermission::class);
    Route::patch('addresses/update/{id}', 'AddressController@updateAddress')->middleware(CheckPermission::class);
    Route::delete('addresses/delete/{id}', 'AddressController@deleteAddress')->middleware(CheckPermission::class);
    
    //User Address
    Route::post('users/address/create/{user_id}', 'UserController@createUserAddress')->middleware(CheckPermission::class);
});
