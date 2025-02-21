<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // This method allows users to login
    // THis is empty because we will implement it in the next step
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->validated();
        $token = JWTAuth::attempt($credentials);

        if ($token) {
            return $this->successResponse(
                message: 'User Authenticated Successfully',
                data: [
                    'token' => $token,
                    'token_type' => 'bearer',
                    'user' => new UserResource(Auth::user())
                ],
                code: 200
            );
        }
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $token = JWTAuth::fromUser($user);

        return $this->successResponse(
            message: 'User Registered Successfully',
            data: [
                'token' => $token,
                'token_type' => 'bearer',
                'user' => new UserResource($user)
            ]
        );
    }
}
