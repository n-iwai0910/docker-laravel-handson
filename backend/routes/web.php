
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

Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/shop/{item}','App\Http\Controllers\ShopController@show');
Route::get('/cart_item', 'App\Http\Controllers\ShopController@cart_item')->middleware('auth');
Route::post('/cart_item', 'App\Http\Controllers\ShopController@addCart_item');
Route::post('/shop/cart_item', 'App\Http\Controllers\ShopController@addCart_item');
Route::post('/cartdelete', 'App\Http\Controllers\ShopController@deleteCart');
Route::post('/thanks', 'App\Http\Controllers\ShopController@thanks');
Route::post('/cartitem', 'App\Http\Controllers\CartItemController@store');
Route::get('/cartitem', 'App\Http\Controllers\CartItemController@index');
Route::delete('/cartitem/{cartItem}', 'App\Http\Controllers\CartItemController@destroy');
Route::put('/cartitem/{cartItem}', 'App\Http\Controllers\CartItemController@update');
Route::get('/order', 'App\Http\Controllers\OrderController@index');
Route::post('/order', 'App\Http\Controllers\OrderController@store');

Auth::routes();
