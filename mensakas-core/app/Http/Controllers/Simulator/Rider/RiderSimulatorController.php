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
        $ordersWhithoutDeliver = Order::leftJoin('delivery', 'delivery.order_id', '=', 'order.id')
            ->whereNull('delivery.order_id')->get();
        return view('simulators.rider.jobs')->with(['orders' => $ordersWhithoutDeliver, 'rider' => $rider]);
    }

    public function setJob(Order $order, Rider $rider)
    {
        $delivery = new Delivery();
        $delivery->riders_id = $rider->id;
        $delivery->order_id = $order->id;
        $delivery->save();

        return redirect()->route('simulator.rider.deliverStatus');
    }

    public function deliverStatus(Order $order)
    {
        return view('simulators.rider.status')->with(['order' => $order]);
    }
}
