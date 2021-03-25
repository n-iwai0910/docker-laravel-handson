
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


Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/shop/{item}','App\Http\Controllers\ShopController@show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index');
    Route::get('/cart_item', 'App\Http\Controllers\ShopController@cart_item');
    Route::post('/shop/cartitem', 'App\Http\Controllers\CartItemController@store');
	Route::post('/cartdelete', 'App\Http\Controllers\ShopController@deleteCart');
	Route::post('/thanks', 'App\Http\Controllers\ShopController@thanks');
	Route::post('/cartitem', 'App\Http\Controllers\CartItemController@store');
	Route::get('/cartitem', 'App\Http\Controllers\CartItemController@index');
	Route::delete('/cartitem/{cartItem}', 'App\Http\Controllers\CartItemController@destroy');
	Route::put('/cartitem/{cartItem}', 'App\Http\Controllers\CartItemController@update');
	Route::get('/order', 'App\Http\Controllers\OrderController@index');
	Route::post('/order', 'App\Http\Controllers\OrderController@store');
});

Auth::routes();

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin.')->group(function(){

    Auth::routes(['register' => false]);

    Route::group(['middleware' => ['auth']], function () {
    	Route::get('/home', 'AdminHomeController@index')->name('admin_home');
    	Route::get('/item', 'AdminItemController@index');
    	Route::get('/item/{item}','AdminItemController@show');
    	Route::match(['GET', 'POST'], '/create', 'AdminItemController@create');
    	Route::put('/item/{item}', 'AdminItemController@update');
    	Route::delete('/item/{item}', 'AdminItemController@destroy');
    	Route::get('/order', 'AdminOrderController@index');	
    });
});


Route::get('test', function () {
    return view('test');
});