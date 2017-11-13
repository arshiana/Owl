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


Route::get('/', 'FrontController@index')->name('home');
Route::get('/books', 'FrontController@books')->name('books');
Route::get('/book/{id}', 'FrontController@book')->name('book');
Route::post('/search','FrontController@search')->name('search');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'FrontController@index')->name('home');
Route::resource('/cart', 'CartController');
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');

Route::get('/category/{id}','FrontController@show_category')->name('category');
Route::post('/contactUs', 'ContactUsController@store')->name('contact_us.store');
Route::get('/contactUs','ContactUsController@index')->name('contactUs');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
       Route::post('toggoledeliver/{orderId}','OrderController@toggledeliver')->name('toggle.deliver');
       Route::get('/',function (){
           return view('admin.index');
       })->name('admin.index');
       Route::resource('product','ProductsController');
       Route::resource('category','CategoriesController');
       Route::get('orders/{type?}','OrderController@Orders');

});
Route::resource('address','AddressController');


Route::group(['middleware'=>'auth'],function (){
    Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
});

Route::get('payment', 'CheckoutController@payment')->name('checkout.payment');

Route::post('store-payment', 'CheckoutController@storePayment')->name('payment.store');