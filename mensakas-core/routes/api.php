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

Route::get('businesses/zipcode/{zipcode}', 'BusinessAPIController@getBusinessesByZipcode');

Route::get('businesses/{id}/products', 'BusinessAPIController@getProductsOfBusiness');

Route::get('businesses', 'BusinessAPIController@getBusinessesSimalation');


//API Business 
Route::apiResource('business','BusinessAPIController');
Route::get('business', 'BusinessAPIController@indexBusinessAll');
Route::get('business/{id}', 'BusinessAPIController@showBusiness');
Route::post('business', 'BusinessAPIController@createBusiness');
Route::put('business/{id}', 'BusinessAPIController@updateBusiness');
Route::delete('business/{id}', 'BusinessAPIController@delete');
