<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiUserController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // Validate inputs
        $formFields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Create Token
        $token = $user->createToken('userToken')->plainTextToken;

        // response
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    // Login user
    public function login(Request $request)
    {
        // Validate inputs
        $formFields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(auth()->attempt($formFields)) {
            if(auth()->check()) {
                // Create Token
                $user = User::where('email', $formFields['email'])->first();
                $token = $user->createToken('userToken')->plainTextToken;

                // response
                $response = [
                    'user' => $user,
                    'token' => $token,
                ];
                return response($response, 200);
            }
        }

        return response([
            'message' => 'invalid User'
        ], 401);
    }

    // Logout user
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
