<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(LoginRequest $request){


        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;



        return response()->json([
            'message' => 'Connected',
            'user' => $user,
            'access_token' => $token,
        ]);
    }
}


