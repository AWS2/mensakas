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
        $order = OrderStatus::find($id);

        if ($request->message == "") {
            return 'Message null.0';
        }

        if (is_null($order)) {
            return 'OrderStatus not found.1';
        }

        if ($order->message == NULL) {
            $order->message = $request->message;
            $order->save();
            return 'OrderStatus updated successfully.2';
        }

        $order->message = $order->message." / ".$request->message;
        $order->save();
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
