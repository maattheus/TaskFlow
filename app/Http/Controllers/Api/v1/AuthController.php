<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();
            $token = $user->createToken('taskflow')->plainTextToken;

            return responseHandler([

                'message' => 'User login successfully',
                'status'  => 200,
                'data'    => $token

            ]);

        }

        return responseHandler([

            'message' => 'Invalid credentials.',
            'status'  => 401

        ]);
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return responseHandler([

            'message' => 'User logout successfully',
            'status'  => 200

        ]);
    }
}
