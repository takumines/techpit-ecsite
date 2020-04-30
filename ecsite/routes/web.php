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

/*
|--------------------------------------------------------------------------
| User 認証不要
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| User ログイン済み
|--------------------------------------------------------------------------
*/

route::group(['middleware' => 'auth:user'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'ItemController@index');
    Route::get('/item/{item}', 'ItemController@show');
    Route::post('/cartitem', 'CartItemController@store');
    Route::get('/cartitem', 'CartItemController@index');
    Route::delete('/cartitem/{cartItem}', 'CartItemController@destroy');
    Route::put('/cartitem/{cartItem}', 'CartItemController@update');
    Route::get('/buy', 'BuyController@index');
    Route::post('/buy', 'BuyController@store');

});

/*
|--------------------------------------------------------------------------
| Admin 認証不要
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->group(function() {

    Route::get('/', function(){ redirect('/admin/home');}); // なくて良いかも
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login');

/*
|--------------------------------------------------------------------------
| Admin ログイン済
|--------------------------------------------------------------------------
*/

    Route::group(['middleware' => 'auth:admin'], function() {
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');
        Route::get('/home', 'HomeController@index')->name('admin.home');
    });

});

/*
|--------------------------------------------------------------------------
| supplier ログイン済
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| supplier ログイン済
|--------------------------------------------------------------------------
*/