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
        //
        $order = Order::find($id);
        $orderMessage = OrderStatus::find($order->order_status_id);
        if ($request->message == "") {
            return 'Message null.0';
        }

        if (is_null($orderMessage)) {
            return 'OrderStatus not found.1';
        }

        if ($orderMessage->message == NULL) {
            $orderMessage->message = $request->message;
            $orderMessage->save();
            return 'OrderStatus updated successfully.2';
        }

        $orderMessage->message = $orderMessage->message." / ".$request->message;
        $orderMessage->save();
        return 'OrderStatus updated successfully.3';
    }

    public function deleteMessage($id)
    {
        //
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
