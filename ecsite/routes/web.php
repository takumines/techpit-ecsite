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
Route::get('/', 'ItemController@index');
/*
|--------------------------------------------------------------------------
| User ログイン済み
|--------------------------------------------------------------------------
*/

route::group(['middleware' => 'auth:user'], function() {

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

Route::namespace('Supplier')->prefix('supplier')->group(function() {

    Route::get('/login', 'LoginController@showLoginForm')->name('supplier.login');
    Route::post('/login', 'LoginController@login');


/*
|--------------------------------------------------------------------------
| supplier ログイン済
|--------------------------------------------------------------------------
*/
    Route::group(['middleware' => 'auth:supplier'], function() {

        Route::post('/logout', 'LoginController@logout')->name('supplier.logout');
        Route::get('/home', 'HomeController@index')->name('supplier.home');
        Route::get('/item/add', 'ItemController@create')->name('supplier.add');
        Route::post('/item/add', 'ItemController@store');
    });

});