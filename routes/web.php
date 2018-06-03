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
Route::group(['prefix' => 'admin', 'as' => 'admin.' , 'namespace' => 'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController')->parameters(['products' => 'id']);
    Route::resource('posts', 'PostController')->parameters(['posts' => 'id']);
    Route::get('posts/comments' , 'PostController@showComments')->name('posts.comments');
    Route::get('posts/reviews' , 'PostController@showReviews')->name('posts.reviews');
    Route::post('avatar/{id}', 'UserController@deleteAvt')->name('avatar.update');
    Route::resource('users', 'UserController');
    Route::resource('orders', 'OrderController')->parameters(['orders' => 'id']);
});
