<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function successResponse(string $message, $data, int $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
