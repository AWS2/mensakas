<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API Order
Route::get('order', 'API\OrderAPI@getAllOrders');
Route::get('order/{id}', 'API\OrderAPI@showOrder');
//Route::post('order', 'API\OrderAPI@store');
//Route::put('order/{id}', 'API\OrderAPI@update');
//Route::delete('order/{id}', 'API\OrderAPI@delete');

//API Order Ticket
Route::get('order/{id}/ticket', 'API\OrderAPI@getTicket');

//API Order for messages
Route::get('order/{id}/message', 'API\OrderAPI@getMessage');
Route::put('order/{id}/message', 'API\OrderAPI@updateMessage');
Route::put('order/{id}/deletemessage', 'API\OrderAPI@deleteMessage');

//API RIDER
Route::get('rider', 'API\RiderAPI@getAllRider');
Route::get('rider/{id}', 'API\RiderAPI@showRider');
//Route::post('rider', 'API\RiderAPI@store');
//Route::put('rider/{id}', 'API\RiderAPI@update');
//Route::delete('rider/{id}', 'API\RiderAPI@delete');

//API DELIVERY
Route::get('delivery', 'API\DeliveryAPI@getAllDataDelivery');
Route::get('delivery/{id}', 'API\DeliveryAPI@showDelivery');
Route::post('delivery', 'API\DeliveryAPI@createDelivery');
Route::put('delivery/{id}', 'API\DeliveryAPI@updateDelivery');
//Route::delete('delivery/{id}', 'API\DeliveryAPI@delete');

//API LOCATION
//All locations: (http://localhost:8000/api/geolocation)
Route::get('geolocation', 'API\GeolocationAPI@locationRiderAll');
//A specific location (http://localhost:8000/api/geolocation/[id_rider])
Route::get('geolocation/{id}', 'API\GeolocationAPI@locationRiderOne');
