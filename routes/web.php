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

Route::get('/', function () {
    return view('welcome');
});

// Todo: add middleware for admin authenticate
Route::group(['prefix' => 'admin', 'as' => 'admin.' , 'namespace' => 'Admin', 'middleware' => ['auth:web', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController')->parameters(['products' => 'id']);
    Route::resource('posts', 'PostController')->parameters(['posts' => 'id']);
    Route::resource('users', 'UserController');
    Route::resource('orders', 'OrderController')->parameters(['orders' => 'id']);

});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->middleware(['auth:web', 'admin'])->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');
});
