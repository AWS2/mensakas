<?php

namespace App\Http\Controllers\Simulator\Business;

use App\Business;
use App\BusinessAddress;
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
}
