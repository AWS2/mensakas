<?php

namespace App\Http\Controllers\Simulator\Business;

use App\Business;
use App\BusinessAddress;
use Illuminate\Http\Request;

class BusinessSimulatorController extends \App\Http\Controllers\Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function businessesInZipCode(Request $request)
    {
        $b = Business::filter($request->all())->get();
        return view('simulators.business.businesses')->with(['b' => $b, 'r' => $request]);
    }
}
