<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __invoke(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!auth()->attempt($fields)) {
            return response()->json([
                'status' => 'error',
                'data' => [
                    'message' => 'There are no valid user based on request params'
                ]
            ]);
        }

        return $request->user()->createToken($request->device_name ?? 'api')->plainTextToken;
    }
}
