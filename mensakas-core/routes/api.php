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

Route::get('business/{business}/rate', 'API\facturacion\BusinessRateController@retriveBusinessRateByBusinessId');
Route::put('business/rate', 'API\facturacion\BusinessRateController@modifyOrCreateBusinessRate');

Route::get('business/{business}/invoice', 'API\facturacion\BusinessInvoiceController@retriveBusinessInvoicesByBusinessId');
Route::get('invoice/{invoice}', 'API\facturacion\BusinessInvoiceController@retriveBusinessInvoicesById');
Route::patch('invoice/{invoice}', 'API\facturacion\BusinessInvoiceController@changeInvoiceStatus');
Route::post('business/{business}/invoice', 'API\facturacion\BusinessInvoiceController@genereteInvoiceToBusiness');
Route::get('invoice/{invoice}/download','API\facturacion\BusinessInvoiceController@downloadInvoice');