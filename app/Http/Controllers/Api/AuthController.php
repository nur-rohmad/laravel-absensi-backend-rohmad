<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        // validasi input email dan password
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        // get dat user by email
        $user = User::where('email', $loginData['email'])->first();
        // cek user exits
        if (!$user) {
            return response(['message' => 'Invalid credential'], 401);
        }
        // check pasword
        if (!Hash::check($loginData['password'], $user->password)) {
            return response(['message' => 'Invalid credential'], 401);
        }

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;
        // return response
        return response(['user' => $user, 'token' => $token], 201);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response(['message' => 'Logged out'], 200);
    }
}
