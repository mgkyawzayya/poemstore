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
Route::get('/dashboard', 'HomeController@home')->name('dashboard');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::resource('orders', 'OrderController');
Route::get('orders/{$id}/confirm', 'OrderController@confirm')->name('orders.confirm');
Route::get('pending-orders', 'OrderController@pending')->name('pending-orders.index');
