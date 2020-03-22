<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rider;
class MensakasAPI extends Controller
{
    /**
    * API function that returns a JSON with all mensakas
    * @return JSON
    */
    public function getAllMensakas()
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

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
