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
            ->join('order_status', 'order_status.id', '=', 'order.order_status_id')
            ->whereNull('delivery.order_id')
            ->where('order_status.status_id', '=', 3)->get();

        return view('simulators.rider.jobs')->with(['orders' => $ordersWhithoutDeliver, 'rider' => $rider]);
    }

    public function setJob(Request $request)
    {
        if($request->ajax()){
            $order = Order::find($request->id_order);
            $order->orderStatus->status_id = 4;
            $order->push();

            $delivery = new Delivery();
            $delivery->riders_id = $request->id_rider;
            $delivery->order_id = $request->id_order;
            $delivery->save();
            return redirect()->route('simulator.rider.status', ['order' => $delivery->order]);
        } else {
            return back();
        }
    }

    public function changeStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->orderStatus->status_id = $request->status_id;
        $order->push();

        return redirect()->route('simulator.rider.status', ['order' => $order]);
    }

    public function status($orderId)
    {
        $order = Order::find($orderId);
        return view('simulators.rider.status')->with('order', $order);
    }
}
