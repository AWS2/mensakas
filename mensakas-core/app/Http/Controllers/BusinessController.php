<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessAddress;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::all();

        return view('businesses.index')
            ->with('businesses', $businesses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business = new Business();
        $business->name = $request->name;
        $business->phone = $request->phone;

        $businessAddress = new BusinessAddress();
        $businessAddress->city = $request->city;
        $businessAddress->zip_code = $request->zip_code;
        $businessAddress->street = $request->street;
        $businessAddress->number = $request->number;

        $business->businessAddresses = $businessAddress;

        $business->save();

        return redirect(route('businesses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('businesses.show')
            ->with('business', $business);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('businesses.edit')
            ->with('business', $business);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $business->name = $request->name;
        $business->phone = $request->phone;

        $businessAddress = $business->businessAddresses;
        $businessAddress->city = $request->city;
        $businessAddress->zip_code = $request->zip_code;
        $businessAddress->street = $request->street;
        $businessAddress->number = $request->number;

        $business->save();

        return redirect()->action(
            'BusinessController@show',
            ['business' => $business->id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect(route('businesses.index'));
    }
}
