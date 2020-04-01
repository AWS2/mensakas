<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;
use Validator;

class OrderAPI extends Controller
{

    public function updateMessage(Request $request,$id)
    {
        $order = Order::find($id);
        $orderMessage = OrderStatus::find($order->order_status_id);
        if ($request->message == "") {
            return 'Message null.';
        }

        if (is_null($orderMessage)) {
            return 'OrderStatus not found.';
        }

        if ($orderMessage->message == NULL) {
            $orderMessage->message = $request->message;
            $orderMessage->save();
            return 'Added successfully.';
        }

        $orderMessage->message = $orderMessage->message." / ".$request->message;
        $orderMessage->save();
        return 'Updated successfully.';
    }

    public function deleteMessage(Request $request,$id)
    {
        $order = Order::find($id);
        $orderMessage = OrderStatus::find($order->order_status_id);
        
        if (is_null($orderMessage)) {
            return ['Message not found.'];
        }

        if ($orderMessage->message == NULL) {
            return ['Message already empty.'];
        }
        
        $new_string = explode("/", $orderMessage->message);
        if (count($new_string)<=1) {
            $orderMessage->message = NULL;
            $message = "Empty";
        }else{
            $last_part = $new_string[count($new_string)-1];
            $last_part = "/".$last_part;
            $message = str_replace($last_part, "", $orderMessage->message);
            $orderMessage->message = $message;
        }

        $orderMessage->save();
        return ['Message deleted successfully.',$message];
    }

    public function getAllOrders()
    {
        $dbOrderAll = Order::all();

        if (is_null($dbOrderAll)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Order not found.'
            ];
            return response()->json($response, 404);
        }

        $dbOrderArray = $dbOrderAll->toArray();

        $response = [
            'success' => true,
            'data' => $dbOrderArray,
            'message' => 'Order retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function showOrder($id)
    {
        $dbOrder = Order::find($id);

        if (is_null($dbOrder)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Order not found.'
            ];
            return response()->json($response, 404);
        }

        $dbOrderArray = $dbOrder->toArray();

        $response = [
            'success' => true,
            'data' => $dbOrderArray,
            'message' => 'Order retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function getMessage($id)
    {
        $dbOrder = Order::find($id);
        $orderMessage = OrderStatus::find($dbOrder->order_status_id);

        if (is_null($dbOrder)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Order not found.'
            ];
            return response()->json($response, 404);
        }

        $dbOrderArray = $dbOrder->toArray();

        $response = [
            'success' => true,
            'data' => $dbOrderArray,
            'message_order' => $orderMessage->message,
            'message' => 'Order retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }
}