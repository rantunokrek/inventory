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

Route::get('/getting/product/{id}','Api\PosController@GetProduct');

Route::post('/salary/{id}', 'Api\SalaryController@PaidSaraly');
Route::get('/salary', 'Api\SalaryController@allSalary');
Route::get('/salary/view/{id}', 'Api\SalaryController@Salary_view');
Route::get('/salary-edit/{id}', 'Api\SalaryController@Salary_edit');
Route::post('/salary/update/{id}', 'Api\SalaryController@Salary_update');
Route::post('/stock/update/{id}', 'Api\StockController@Stock_update');
// product theke ene insert in pos
Route::get('/addTocart/{id}', 'Api\CartController@addTocart');

// get carts
Route::get('/cart/product', 'Api\CartController@cartProduct');
// cart remove
Route::get('/remove/cart/{id}', 'Api\CartController@removeCart');
Route::get('/cart/increment/{id}', 'Api\CartController@cartIncrement');
Route::get('/cart/decrement/{id}', 'Api\CartController@cartDecrement');
//Extra vat
Route::get('/vats', 'Api\CartController@Vats');
Route::post('/orderdone', 'Api\PosController@order_Done');
// order
Route::get('/order', 'Api\OrderController@todaysOrder');
Route::get('/order/details/{id}', 'Api\OrderController@OrderDetails');
Route::get('/order/orderdetails/{id}', 'Api\OrderController@OrderDetailsAll');
// search
Route::post('/search/order', 'Api\OrderController@searchByDate');
Route::post('/search/month', 'Api\OrderController@searchByMonth');
// home 
Route::get('/today/sell', 'Api\PosController@todaySell');
Route::get('/today/income', 'Api\PosController@todayIncome');
Route::get('/today/due', 'Api\PosController@todayDue');
Route::get('/today/expense', 'Api\PosController@todayExpense');
Route::get('today/stocksout', 'Api\PosController@StocksOut');

