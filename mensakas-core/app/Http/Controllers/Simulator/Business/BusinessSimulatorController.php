<?php

namespace App\Http\Controllers\Simulator\Business;

use App\Customer;
use App\CustomerAddress;
use App\Business;
use App\Comanda;
use App\ComandaProduct;
use App\Order;
use App\OrderStatus;
use App\Payment;
use Illuminate\Http\Request;

class BusinessSimulatorController extends \App\Http\Controllers\Controller
{
    public function customerStore(Request $request)
    {
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        $customerAddress = new CustomerAddress();
        $customerAddress->city = $request->city;
        $customerAddress->zip_code = $request->zip_code;
        $customerAddress->street = $request->street;
        $customerAddress->number = $request->number;
        $customerAddress->customer_id = $customer->id;
        $customerAddress->save();

        return redirect()->route('simulator.comanda.businessesInZipCode', ['customer' => $customer, 'zip' => $request->zip_code]);
    }

    public function businessesInZipCode(Customer $customer, $zip)
    {
        $busisnesses = Business::addSelect('*')
            ->join('business_address', 'business.id', '=', 'business_address.business_id')
            ->where('zip_code', '=', $zip)->get();

        return view('simulators.business.businesses')
            ->with(['customer' => $customer, 'busisnesses' => $busisnesses]);
    }

    public function businessMenu(Customer $customer, Business $business)
    {
        return view('simulators.business.menu')->with(['customer' => $customer, 'business' => $business]);
    }

    public function saveOrder(Request $request, Customer $customer, Business $business)
    {
        $comanda = new Comanda();
        $comanda->address_id = $customer->customerAddresse->id;
        $comanda->ticket_json = '{"business": {"name": "restaurante2", "address": "c/123"}, "customer": {"mail": "test@test.com", "address": "C/324"}, "products": [{"product": {"name": "hamburguesa", "price": "10", "extras": [{"product": {"name": "queso", "price": "1"}}, {"product": {"name": "tomate", "price": "1"}}]}}, {"product": {"name": "agua", "price": "1"}}]}';
        $comanda->save();

        $comandaProduct = new ComandaProduct();
        $comandaProduct->comanda_id = $comanda->id;
        $comandaProduct->product_id = $business->products[0]->id;
        $comandaProduct->quantity = 1;
        $comandaProduct->save();

        $orderStatus = new OrderStatus();
        $orderStatus->status_id = 1;
        $orderStatus->save();

        $payment = new Payment();
        $payment->amount = $request->totalShopping;
        $payment->save();

        $order = new Order();
        $order->order_status_id = $orderStatus->id;
        $order->payment_id = $payment->id;
        $order->comanda_id = $comanda->id;
        $order->save();

        return redirect()->route('simulator.comanda.pay', ['order' => $order]);
    }

    public function pay(Order $order)
    {
        return view('simulators.business.pay')
            ->with(['order' => $order]);
    }

    public function makePaid(Order $order)
    {
        $order->orderStatus->status_id = 2;
        $order->push();

        return redirect()->route('simulator.comanda.orderStatus', ['order' => $order]);
    }

    public function orderStatus(Order $order)
    {
        return view('simulators.business.status')->with(['order' => $order]);
    }
}
