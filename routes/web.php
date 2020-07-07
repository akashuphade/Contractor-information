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

Route::get('/', 'ContractController@index');

// Contracts routes
Route::put('contracts/restore/{id}', 'ContractController@restore');
Route::get('contracts/records/{status}', 'ContractController@index');
Route::resource('contracts', 'ContractController');

// works routes
Route::put('works/restore/{id}', 'WorkController@restore');
Route::get('works/records/{status}', 'WorkController@index');
Route::get('contracts/{contractId}/{action}', 'WorkController@getWorks');
Route::resource('works', 'WorkController');

