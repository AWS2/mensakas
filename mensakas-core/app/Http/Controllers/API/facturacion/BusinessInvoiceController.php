<?php

namespace App\Http\Controllers\API\facturacion;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Business;
use App\BusinessInvoice;
use App\BusinessRate;
use App\Http\Controllers\API\ApiResponse;


class BusinessInvoiceController extends Controller
{
    public function retriveBusinessRateByBusinessId(Business $business)
    {
        return ApiResponse::OKResponse($business->businessRate);
    }

    public function modifyOrCreateBusinessRate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "business_id" => "required",
            "fixed_rate" => "required|float|max:99",
            "percentage_rate"  => "required|float|max:99",
        ]);
        if ($validator->fails()) {
            return ApiResponse::BadRequestResponse($validator->errors());
        }

        if (!self::existsBusinessById($request["business_id"])) {
            ApiResponse::NotFoundResponse("There is no business with this ID");
        }

        return ApiResponse::OKResponse(self::createOrModifyBusinessRate($request["business_id"], $request["fixed_rate"], $request["percentage_rate"]));
    }

    private function existsBusinessById($businessId)
    {
        return !is_null(Business::find($businessId));
    }

    private function createOrModifyBusinessRate($businessId, $fixedRate, $percentageRate)
    {
        $businessRate = BusinessRate::firstOrNew(['business_id' => $businessId]);
        $businessRate->fixed_rate = $fixedRate;
        $businessRate->percentage_rate = $percentageRate;

        $businessRate->save();
        return $businessRate;
    }
}
