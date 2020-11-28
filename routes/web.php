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

Route::get('/', 'HomeController@index')->name('index');
Route::resource('order', 'OrderController');
Route::post('order/{product}', 'OrderController@store')->name('order.store');
Route::get('order/{id}', 'OrderController@show')->name('order.show');
Route::get('order/product/{product}', 'OrderController@order')->name('orderProduct');
Route::get('/order/retry/{order}', 'OrderController@retry')->name('order.retry');
Route::get('orders', 'OrderController@list' )->name('orders.list');