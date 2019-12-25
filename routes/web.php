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

Route::get('/', 'HomeController@index');
Route::post('/showInvoiceId', 'HomeController@showInvoiceId');


Route::get('/invoice', 'InvoiceController@index');
Route::get('/invoice/create', 'InvoiceController@create');
Route::post('/invoice/store', 'InvoiceController@store');


Route::get('/invoice/detail/{id}', 'InvoiceController@detail');
Route::get('/invoice/detail/hapus/{id}', 'InvoiceController@hapusDetail');
Route::get('/invoice/detail/edit/{id}', 'InvoiceController@editDetail');
Route::put('/invoice/detail/update/{id}', 'InvoiceController@updateDetail');