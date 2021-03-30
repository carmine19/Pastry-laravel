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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@show')->name('single-products');

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/user','UserController');
    Route::resource('/pastry','PastryController');
    Route::resource('/sweets','SweetController');

});
