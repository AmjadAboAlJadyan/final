<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@index');

Route::post('store','ProductController@store');

Route::delete('delete/{id}','ProductController@destory');

Route::post('edit/{id}','ProductController@edit');

route::post('update/{id}','ProductController@update');

