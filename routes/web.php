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

// Route::get('/admin', function () {
//     return view('admin.pages.index');
// })->name('index');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::resource('category', 'Admin\CategoryController')->parameters(['category' => 'id']);
    Route::resource('product', 'Admin\ProductController')->parameters(['product' => 'id']);
    Route::resource('post', 'Admin\PostController')->parameters(['post' => 'id']);
    Route::resource('user', 'Admin\UserController')->parameters(['user' => 'id']);
});
