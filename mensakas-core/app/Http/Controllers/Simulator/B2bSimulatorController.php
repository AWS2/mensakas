<?php

namespace App\Http\Controllers\Simulator;

use App\Business;
use App\Order;
use Illuminate\Http\Request;

class B2bSimulatorController extends \App\Http\Controllers\Controller
{
    public function listBusinesses()
    {
        $businesses = Business::all();

        return view('simulators.b2b.selectBusiness')->with('businesses', $businesses);
    }

    public function showBusiness(Business $business)
    {
        return view('simulators.b2b.business')->with('business', $business);
    }
}
