<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::resource('/employee', 'Api\EmployeeController');
Route::resource('/supplier', 'Api\SupplierController');
Route::resource('/category', 'Api\CategoryController');
Route::resource('/product', 'Api\ProductController');
