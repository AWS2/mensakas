<?php

namespace App\Http\Controllers\API;

class ApiResponse
{
    public static function OKResponse($data)
    {
        $data = is_null($data) ? "{}" : $data;

        return response()->json([
            'status' => '200',
            'message' => 'OK',
            'data' => $data,
        ])->header('Content-Type', 'application/json');;
    }

    public static function NotFoundResponse($message = "Not found")
    {
        return response()->json([
            'status' => '404',
            'message' => $message,
            'data' => "{}"
        ], 404)->header('Content-Type', 'application/json');
    }

    public static function BadRequestResponse($errors, $message = "Bad Request")
    {
        return response()->json([
            'status' => '400',
            'message' => $message,
            'data' => $errors
        ], 400)->header('Content-Type', 'application/json');
    }
}
