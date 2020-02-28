<?php

use Illuminate\Http\Request;
use App\Business;
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

Route::get('businesses', function () {
    $businessJson = Business::all()->toJson();
    return '{"Status":"ok", "msg":"ok","data":{ "businesses":' . $businessJson . '}}';
});

Route::get('businesses/{zip}', function ($zip) {
    $businessJson = Business::join('business_address', 'business.id', '=', 'business_address.business_id')
        ->where('zip_code', '=', $zip)->get()->toJson();
    return '{"Status":"ok", "msg":"ok","data":{ "businesses":' . $businessJson . '}}';
});

Route::get('businesses/{businessId}/products', function ($businessId) {
    $business = Business::find($businessId);
    $productsJson = $business->products->toJson();
    return '{"Status":"ok", "msg":"ok","data":{ "products":' . $productsJson . '}}';
});
