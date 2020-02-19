<?php

namespace App\Http\Controllers\Simulator\Rider;

use App\Delivery;
use App\Order;
use App\Rider;
use Illuminate\Http\Request;

class RiderSimulatorController extends \App\Http\Controllers\Controller
{
    public function selectRider()
    {
        $riders = Rider::all();
        return view('simulators.rider.riders')->with(['riders' => $riders]);
    }

    public function jobs(Rider $rider)
    {
        $ordersWhithoutDeliver = Order::addSelect('order.*')
            ->leftJoin('delivery', 'delivery.order_id', '=', 'order.id')
            ->whereNull('delivery.order_id')->get();

        return view('simulators.rider.jobs')->with(['orders' => $ordersWhithoutDeliver, 'rider' => $rider]);
    }

    public function setJob(Request $request)
    {
        $delivery = new Delivery();
        $delivery->riders_id = $request->rider_id;
        $delivery->order_id = $request->order_id;
        $delivery->save();

        return view('simulators.rider.status')->with('order', $delivery->order);
    }

    public function changeStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->orderStatus->status_id = $request->status_id;
        $order->push();

        return view('simulators.rider.status')->with('order', $order);
    }

    public function status($orderId)
    {
        $order = Order::find($orderId);
        return view('simulators.rider.status')->with('order', $order);
    }
}
