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

Route::get('/', 'TodoController@index')->name('index');
Route::post('/store', 'TodoController@store')->name('store');
Route::post('/update/{id}', 'TodoController@update')->name('update');
Route::delete('/destroy/{id}', 'TodoController@destroy')->name('destroy');
