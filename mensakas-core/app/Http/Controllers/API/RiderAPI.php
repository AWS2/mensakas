<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rider;
class RiderAPI extends Controller
{
    /**
    * API function that returns a JSON with all mensakas
    * @return JSON
    */
    public function getAllRider()
    {
        $dbMensakasAll = Rider::all();

        if (is_null($dbMensakasAll)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Comanda not found.'
            ];
            return response()->json($response, 404);
        }

        $dataMensakasArray = $dbMensakasAll->toArray();

        $response = [
            'success' => true,
            'data' => $dataMensakasArray,
            'message' => 'Mensakas retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    public function showRider($id)
    {
        $dbMensaka = Rider::find($id);

        if (is_null($dbMensaka)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Mensaka not found.'
            ];
            return response()->json($response, 404);
        }

        $dbMensakaArray = $dbMensaka->toArray();

        $response = [
            'success' => true,
            'data' => $dbMensakaArray,
            'message' => 'Mensaka retrieved successfully.'
        ];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }
}