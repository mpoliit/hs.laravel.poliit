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

Route::get('/', 'HomeController');

Auth::routes();

Route::prefix('ajax')->name('ajax.')->namespace('Ajax')->group(function (){
    Route::delete('images/{image}/remove', 'ImageController@remove')->name('image.remove');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('categories', 'CategoriesController')->except(['show']);
    Route::resource('products', 'ProductsController')->except(['show']);
    Route::resource('orders', 'OrdersController')->except(['show']);
});
Route::resource('categories','CategoriesController');

Route::resource('products', 'ProductsController');

Route::middleware(['auth'])->group(function (){
    Route::get('cart','CartController@index')->name('cart.index');
    Route::post('cart/{product}/add','CartController@add')->name('cart.add');
    Route::post('cart/{product}/count/update','CartController@update')->name('cart.count.update');
    Route::delete('cart/{product}/delete','CartController@delete')->name('cart.delete');

    Route::get('account/index', 'AccountController@index')->name('account.index');
    Route::post('account/update','AccountController@update')->name('account.update');

});
