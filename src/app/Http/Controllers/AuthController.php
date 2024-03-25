<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {

        $validated = $request->validated();

        if (!auth()->attempt($validated)) {
            return response()->json([
                'status' => 401,
                'message' => 'Wrong Credentials',
                'data' => null
            ], 401);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Logged In',
            'data' => auth()->user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ], 200);

    }

    public function logout(Request $request) {

        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Logged Out',
            'data' => null
        ], 200);

    }
}
