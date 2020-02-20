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

Auth::routes();

//Menus
Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', function () {
    return  redirect()->route('home');
});

Route::get('/users', function () {
    return view('users');
})->middleware('auth');


//Cruds
Route::get('comandas', 'ComandaController@index')->name('comandas.index')->middleware('auth');

Route::get('comandas/{comanda}', 'ComandaController@show')->name('comandas.show')->middleware('auth');

Route::get('comandas/{comanda}/edit', 'ComandaController@edit')->name('comandas.edit')->middleware('auth');

Route::put('comandas/{comanda}', 'ComandaController@update')->name('comandas.update')->middleware('auth');

Route::resource('adminUsers', 'AdminUserController')->middleware('auth');

Route::resource('riders', 'RiderController')->middleware('auth');

Route::resource('customers', 'CustomerController')->middleware('auth');

Route::resource('businesses', 'BusinessController')->middleware('auth');

Route::resource('products', 'ProductController')->middleware('auth');

//simulator menu
Route::view('/simulators', 'simulatorsMenu');

//Simulator comanda
Route::get('simulator/comanda', 'Simulator\Business\BusinessSimulatorController@customerForm')->name('simulator.comanda.customerForm');

Route::get('simulator/comanda/{zip}', 'Simulator\Business\BusinessSimulatorController@businessesInZipCode')->name('simulator.comanda.businessesInZipCode');

Route::get('simulator/comanda/{business}/menu', 'Simulator\Business\BusinessSimulatorController@businessMenu')->name('simulator.comanda.businessMenu');

//Route::post('simulator/comanda/store', 'Simulator\Business\BusinessSimulatorController@customerStore')->name('simulator.comanda.customerStore');

Route::get('simulator/business/{order}/status', 'Simulator\Business\BusinessSimulatorController@orderStatus')->name('simulator.comanda.orderStatus');

//Simulator rider
Route::get('simulator/rider', 'Simulator\Rider\RiderSimulatorController@selectRider')->name('simulator.rider.selectRider');

Route::get('simulator/rider/{rider}/jobs', 'Simulator\Rider\RiderSimulatorController@jobs')->name('simulator.rider.jobs');

Route::post('simulator/rider', 'Simulator\Rider\RiderSimulatorController@setJob')->name('simulator.rider.setjob');

Route::patch('simulator/rider', 'Simulator\Rider\RiderSimulatorController@changeStatus')->name('simulator.rider.changeStatus');

Route::get('simulator/rider/{order}/order', 'Simulator\Rider\RiderSimulatorController@status')->name('simulator.rider.status');

//Simulator business/restaurant
Route::get('simulator/restaurants', 'Simulator\RestaurantSimulatorController@listBusinesses')->name('simulator.restaurant.listBusinesses');

Route::get('simulator/restaurants/{business}', 'Simulator\RestaurantSimulatorController@ordersInRestaurant')->name('simulator.restaurant.ordersInRestaurant');

Route::get('simulator/restaurants/{business}/order/{order}', 'Simulator\RestaurantSimulatorController@order')->name('simulator.restaurant.order');

Route::patch('simulator/restaurants/{business}/order/{order}', 'Simulator\RestaurantSimulatorController@preparingOrder')->name('simulator.restaurant.preparing');
