<?php

namespace App\Http\Controllers\Simulator\Business;

use App\Customer;
use App\CustomerAddress;
use App\Business;
use App\Order;
use App\Product;
use App\ProductDescription;
use Illuminate\Http\Request;

class BusinessSimulatorController extends \App\Http\Controllers\Controller
{
    public function businessesInZipCode($zip)
    {
        $busisnesses = Business::addSelect('*')
            ->join('business_address', 'business.id', '=', 'business_address.business_id')
            ->where('zip_code', '=', $zip)->get();

        return view('simulators.business.businesses')->with(['busisnesses' => $busisnesses]);
    }

    public function businessMenu(Business $business)
    {
        return view('simulators.business.menu')->with(['business' => $business]);
    }

    public function customerForm()
    {
        return view('simulators.business.form');
    }

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
        $customerAddress->house_number = $request->house_number;
        $customerAddress->customer_id = $customer->id;
        $customerAddress->save();

        return businessesInZipCode($request->zip_code);
        // return redirect(route('customers.index'));
    }

    public function orderStatus(Order $order)
    {
        return view('simulators.business.status')->with(['order' => $order]);
    }
}
