<?php

namespace App\Http\Controllers\API;

use App\Rider;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeolocationAPI extends Controller {


    public function locationRiderAll() {
        $dbLocation = Location::all();

        if (is_null($dbLocation)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'No data found'
            ];
            return response()->json($response, 404);
        } else {
            $response = [
                'success' => true,
                'data' => $dbLocation,
                'message' => 'The location of all riders'
            ];
            return response()->json($response, 200)->header('Content-Type', 'application/json');
        }
    }

    public function locationRiderOne($id) {
        $dbLocation = Location::where('rider_id' , $id)->get();
        $countLocation = count($dbLocation);

        if ($countLocation==0) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'The rider has no location'
            ];
            return response()->json($response, 404);
        } else {
            $response = [
                'success' => true,
                'data' => $dbLocation,
                'message' => 'The rider has location'
            ];
            return response()->json($response, 200)->header('Content-Type', 'application/json');
        }
    }



}
