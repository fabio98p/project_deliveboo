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

Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
  ->group(function () {
    Route::resource('/restaurants', 'RestaurantController');
    //Route::resource('/categories', 'CategoryController');
    Route::resource('/dishes', 'DishController')->except([
      'create'
    ]);
    Route::get('/dishes/create/{restaurant}', 'DishController@create')->name('dishes.create');
    Route::resource('/orders', 'OrderController');
  });
