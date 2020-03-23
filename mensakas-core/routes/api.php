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

//Route for get all data of the Mensakas (http://localhost:8000/api/mensakas)
Route::get('mensakas', 'API\MensakasAPI@getAllMensakas');

//Routes to see the locations of the riders
//All locations: (http://localhost:8000/api/geolocation)
Route::get('geolocation', 'API\GeolocationAPI@locationRiderAll');
//A specific location (http://localhost:8000/api/geolocation/[id_rider])
Route::get('geolocation/{id}', 'API\GeolocationAPI@locationRiderOne');
