<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string'
            ]);

            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => Hash::make($fields['password'])
            ]);

            $token = $user->createToken('userToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);

        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }

    public function login(Request $request)
    {
        try {

            $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);

            $user = User::where('email', $fields['email'])->first();

            if (!$user || !Hash::check($fields['password'], $user->password)) {
                return response([
                    'message' => 'Bad credentials'
                ], 401);
            }

            $token = $user->createToken('userToken')->plainTextToken;

            return response([
                'user' => $user,
                'token' => $token
            ], 200);

        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }

    public function logout(Request $request)
    {
        try {

            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Logged out'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }

    }
}
