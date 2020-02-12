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

Route::get('/pruebas', function () {
    $business = App\Business::all();
    // return ("test");
    return view('pruebaCarpeta.index', ["businesses"=>$business]);
});

Auth::routes();

Route::resource('businesses', 'BusinessController');
