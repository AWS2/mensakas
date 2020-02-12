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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('comandas', 'ComandaController@index')->name('comandas.index');

Route::get('comandas/{comanda}', 'ComandaController@show')->name('comandas.show');

Route::get('comandas/{comanda}/edit', 'ComandaController@edit')->name('comandas.edit');

Route::put('comandas/{comanda}', 'ComandaController@update')->name('comandas.update');
