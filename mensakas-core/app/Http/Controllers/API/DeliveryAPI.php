<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Delivery;
use Validator;

class DeliveryAPI extends Controller
{
    /**
    * API function that returns a JSON with all delivery
    * @return JSON
    */
    public function getAllDataDelivery()
    {
        //
        $dbDeliveryAll = Delivery::all();

        if (is_null($dbDeliveryAll)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Delivery not found.'
            ];
            return response()->json($response, 404);
        }

        $dataDeliveryArray = $dbDeliveryAll->toArray();

        $response = [
            'success' => true,
            'data' => $dataDeliveryArray,
            'message' => 'Delivery retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    /**
    * API function that create a delivery
    * @return JSON
    */
    public function createDelivery(Request $request)
    {
        $delivery = new Delivery;
        $delivery->riders_id = $request->riders_id;
        $delivery->order_id = $request->order_id;
        $delivery->save();
        return 'Delivery created successfully.';
    }

    public function showDelivery($id)
    {
        $dbDelivery = Delivery::find($id);

        if (is_null($dbDelivery)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Delivery not found.'
            ];
            return response()->json($response, 404);
        }

        $dbDeliveryArray = $dbDelivery->toArray();

        $response = [
            'success' => true,
            'data' => $dbDeliveryArray,
            'message' => 'Delivery retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    /**
    * API function that update a delivery
    * @return JSON
    */
    public function updateDelivery(Request $request, $id)
    {
        //
        $delivery = Delivery::find($id);

        if (is_null($delivery)) {
            return 'Delivery not found.';
        }

        $delivery->riders_id = $request->riders_id;
        $delivery->order_id = $request->order_id;
        $delivery->save();
        return 'Delivery updated successfully.';
    }
}
