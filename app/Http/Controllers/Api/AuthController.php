<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kafe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);


        $data['password'] = bcrypt($data['password']);

        // Create the user in the database
        User::create($data);

        return response()->json([
            'message' => 'User registered successfully',
        ], 201);
    }
    function login(Request $req) {
        $data = $req->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::where('email', $data['email'])->first();
        if ($user && $user->password == $data['password']) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
   
}