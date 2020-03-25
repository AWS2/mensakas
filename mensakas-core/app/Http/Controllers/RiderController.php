<?php

namespace App\Http\Controllers;

use App\Rider;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestAPIGetAllMensakas = Request::create('api/rider', 'GET');
        $requestAPIGetAllMensakas = json_decode(Route::dispatch($requestAPIGetAllMensakas)->getContent(),true);
        $getOnlyDataMensakas = $requestAPIGetAllMensakas['data'];

        return view('riders.index')
            ->with('riders', $getOnlyDataMensakas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('riders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rider = new Rider();
        $rider->first_name = $request->first_name;
        $rider->last_name = $request->last_name;
        $rider->active = 1;
        $rider->username = $request->username;
        $rider->phone = $request->phone;
        $rider->save();

        return redirect(route('riders.index'))->with('success', 'Rider created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {

        return view('riders.show')
            ->with('rider', $rider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit(Rider $rider)
    {
        return view('riders.edit')
            ->with('rider', $rider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rider $rider)
    {
        $rider->first_name = $request->first_name;
        $rider->last_name = $request->last_name;
        $rider->active = 1;
        $rider->username = $request->username;
        $rider->phone = $request->phone;
        $rider->save();

        return redirect()->action(
            'RiderController@show',
            ['rider' => $rider->id]
        )->with('success', 'Rider edited successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {
        $rider->delete();
        return redirect(route('riders.index'))->with('success', 'Rider deleted successfully!');
    }
}
