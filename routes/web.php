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



Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'FrontController@index')->name('home');

Route::get('/category/{id}','FrontController@show_category')->name('category');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
       Route::post('toggoledeliver/{orderId}','OrderController@toggledeliver')->name('toggle.deliver');
       Route::get('/',function (){
           return view('admin.index');
       })->name('admin.index');
       Route::resource('product','ProductsController');
       Route::resource('category','CategoriesController');
      

});
