<?php

namespace App\Http\Controllers\Simulator;

use App\Business;
use App\Order;
use Illuminate\Http\Request;

class RestaurantSimulatorController extends \App\Http\Controllers\Controller
{
    public function listBusinesses()
    {
        $businesses = Business::all();

        return view('simulators.restaurants.listBusinesses')->with('businesses', $businesses);
    }

    public function ordersInRestaurant(Business $business)
    {
        $orders = Order::select('order.*')
            ->join('comanda', 'comanda.id', '=', 'order.comanda_id')
            ->join('comanda_product',  'comanda_product.comanda_id', '=', 'comanda.id')
            ->join('product', 'product.id', '=', 'comanda_product.product_id')
            ->join('business', 'business.id', '=', 'product.business_id')
            ->join('order_status', 'order_status.id', '=', 'order.order_status_id')
            ->where('business_id', '=', $business->id)
            ->whereIn('order_status.status_id', array(1, 2))->get();

        return view('simulators.restaurants.jobs')->with(['business' => $business, 'orders' => $orders]);
    }

    public function order(Business $business, Order $order)
    {
        return view('simulators.restaurants.order')->with(['business' => $business, 'order' => $order]);
    }

    public function preparingOrder(Request $request, Business $business, Order $order)
    {
        if ($order->orderStatus->status_id < 4) {
            $order->orderStatus->status_id = 3;
            $order->estimate_time = $request->time;
            $order->push();
        }
        return view('simulators.restaurants.order')->with(['business' => $business, 'order' => $order]);
    }
}
