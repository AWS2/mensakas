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

//API RIDER
Route::get('mensakas', 'API\MensakasAPI@getAllMensakas');
Route::get('mensakas/{id}', 'API\MensakasAPI@show');
Route::post('mensakas', 'API\MensakasAPI@store');
Route::put('mensakas/{id}', 'API\MensakasAPI@update');
Route::delete('mensakas/{id}', 'API\MensakasAPI@delete');


//API DELIVERY 
Route::get('delivery', 'API\DeliveryAPI@getAllDataDelivery');
Route::get('delivery/{id}', 'API\DeliveryAPI@show');
Route::post('delivery', 'API\DeliveryAPI@createDelivery');
Route::put('delivery/{id}', 'API\DeliveryAPI@updateDelivery');
Route::delete('delivery/{id}', 'API\DeliveryAPI@delete');



//API LOCATION
//Routes to see the locations of the riders
//All locations: (http://localhost:8000/api/geolocation)
Route::get('geolocation', 'API\GeolocationAPI@locationRiderAll');
//A specific location (http://localhost:8000/api/geolocation/[id_rider])
Route::get('geolocation/{id}', 'API\GeolocationAPI@locationRiderOne');