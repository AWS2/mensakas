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

Route::get('/adminPanel', function () {
    return view('adminPanel');
})->middleware('auth');

Route::get('/users', function () {
    return view('users');
})->middleware('auth');

Route::get('/products', function () {
    return view('products');
})->middleware('auth');

Route::get('/orders', function () {
    return view('orders');
})->middleware('auth');

Route::get('/businesses', function () {
    return view('businesses');
})->middleware('auth');

Route::get('/delivers', function () {
    return view('delivers');
})->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
