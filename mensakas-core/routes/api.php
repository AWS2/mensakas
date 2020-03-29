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

Route::get('business/{business}/invoice', 'API\facturacion\BusinessinvoiceController@retriveBusinessInvoicesByBusinessId');
Route::get('invoice/{invoice}', 'API\facturacion\BusinessinvoiceController@retriveBusinessInvoicesById');
Route::patch('invoice/{invoice}', 'API\facturacion\BusinessinvoiceController@changeInvoiceStatus');
Route::post('business/{business}/invoice', 'API\facturacion\BusinessinvoiceController@genereteInvoiceToBusiness');
Route::get('invoice/{invoice}/download','API\facturacion\BusinessinvoiceController@downloadInvoice');