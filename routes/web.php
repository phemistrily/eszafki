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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});


Route::resource('category', 'ProductCategoryController')->only([
    'index'
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('category/{product_category:slug}', 'ProductCategoryController@show');

Route::get('subcategory/{product_subcategory:slug}', 'ProductSubcategoryController@show');

Route::get('product/{product:id}', 'ProductController@show');

Route::get('basket', 'BasketController@index')->name('basket');

Route::post('basket/product', 'BasketController@store')->name('addProductToBasket');

Route::delete('basket/product/{basket_product:id}', 'BasketController@deleteProduct')->name('deleteProductFromBasket');

Route::post('basket/product/increment/{basket_product:id}', 'BasketController@incrementProduct')->name('incrementProduct');
Route::post('basket/product/decrement/{basket_product:id}', 'BasketController@decrementProduct')->name('decrementProduct');

Route::get('/product/{productId}/price', 'ProductController@getProductPrice')->name('refreshPrice');

Route::post('order/{basket}', 'BasketController@sendOrder');

