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
Route::resource('/expense', 'Api\ExpenseController');
Route::resource('/customer', 'Api\CustomerController');

Route::post('/salary/{id}', 'Api\SalaryController@PaidSaraly');
Route::get('/salary', 'Api\SalaryController@allSalary');
Route::get('/salary/view/{id}', 'Api\SalaryController@Salary_view');
Route::get('/salary-edit/{id}', 'Api\SalaryController@Salary_edit');
Route::post('/salary/update/{id}', 'Api\SalaryController@Salary_update');
Route::post('/stock/update/{id}', 'Api\StockController@Stock_update');
