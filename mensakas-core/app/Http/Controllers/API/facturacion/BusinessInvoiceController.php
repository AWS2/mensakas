<?php

namespace App\Http\Controllers\API\facturacion;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Business;
use App\BusinessInvoice;
use App\Http\Controllers\API\ApiResponse;


class BusinessInvoiceController extends Controller
{
    public function retriveBusinessInvoicesByBusinessId(Business $business)
    {
        return ApiResponse::OKResponse($business->businessInvoices);
    }

    public function retriveBusinessInvoicesById(BusinessInvoice $invoice)
    {
        return ApiResponse::OKResponse($invoice);
    }

    public function genereteInvoiceToBusiness(Business $business, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "orderAmount" => "required|numeric|max:99",
        ]);
        if ($validator->fails()) {
            return ApiResponse::BadRequestResponse($validator->errors());
        }

        if (is_null($business->businessRate)) {
            return ApiResponse::NotFoundResponse("This Business dont have any rante yet");
        }

        $invoiceAmount = self::getInvoiceAmount($business->businessRate, $request["orderAmount"]);

        return ApiResponse::OKResponse(self::genereateInvoice($business, $invoiceAmount));
    }

    public function changeInvoiceStatus(BusinessInvoice $invoice, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "status" => "required|in:UNPAID,PAID",
        ]);
        if ($validator->fails()) {
            return ApiResponse::BadRequestResponse($validator->errors());
        }

        return ApiResponse::OKResponse(self::changeStatus($invoice, $request["status"]));
    }

    public function downloadInvoice(BusinessInvoice $invoice)
    {   
        $invoiceId  = $invoice->id;
        $businessName = $invoice->business->name;
        $businessPhone = $invoice->business->phone;
        $businessAdress = $invoice->business->businessAddresses->street;
        $amount = $invoice->amount;
        $status = $invoice->status;
        $pdf = \PDF::loadView('pdfTemplate.businessInvoice',array(
            'amount' => $amount,
            'status' => $status,
            'businessName' => $businessName,
            'businessPhone' => $businessPhone,
            'businessAdress' => $businessAdress,
            'invoiceId' => $invoiceId));
        $fileName = $businessName.$invoiceId;
        return $pdf->download("$fileName.pdf");
        
    }

    private function genereateInvoice($business, $amount)
    {
        $businessInvoice = new BusinessInvoice();
        $businessInvoice->business_id = $business->id;
        $businessInvoice->amount = $amount;
        $businessInvoice->status = "UNPAID";

        $businessInvoice->save();

        return $businessInvoice;
    }

    private function getInvoiceAmount($businessRate, $orderAmount)
    {
        return $businessRate->fixed_rate + ($businessRate->percentage_rate / 100) * $orderAmount;
    }

    private function changeStatus($businessInvoice, $status)
    {
        $businessInvoice->status = $status;
        $businessInvoice->save();

        return $businessInvoice;
    }
}
