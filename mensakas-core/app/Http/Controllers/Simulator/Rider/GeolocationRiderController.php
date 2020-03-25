<?php

namespace App\Http\Controllers\Simulator\Rider;

use App\Rider;
use App\Location;
use Illuminate\Http\Request;
use DB;

class GeolocationRiderController extends \App\Http\Controllers\Controller
{

    public function geolocation(Rider $rider)
    {
        return view('simulators.rider.geo')
            ->with('rider', $rider);
    }

    public function createGeolocation(Request $request, Rider $rider)
    {
        $location = new Location();
        $location->rider_id = $rider->id;
        $location->latitude = $request->lat;
        $location->longitude = $request->lon;
        $location->accuracy = 39.90;
        $location->speed = 60;
        $location->save();

        return redirect(route('simulator.rider.geo', ['rider'=>$rider['id']]));
    }

    public function updateGeolocation(Request $request, Rider $rider)
    {
        $rider = Rider::find($rider->id);
        $location = Location::where('rider_id','=',$rider->id)->first();
        $location->latitude = $request->lat;
        $location->longitude = $request->lon;
        $location->save();

        return redirect(route('simulator.rider.geo', ['rider'=>$rider['id']]));
    }

    public function destroyGeolocation(Request $request, Rider $rider)
    {
        $location = Location::where($rider->id == $request->rider_id_delete);
        $location->delete();
        return redirect(route('simulator.rider.selectRider'));
    }


}
