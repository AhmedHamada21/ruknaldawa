<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);
            $user = User::where('email', $request->email)->first();

            if ($user->is_admin == 1) {
                return responseFail('You Don\'t have permission to login', 403);
            }

            if ($validator->fails()) {
                return responseFail($validator->errors(), 422);
            }

            if (!$token = JWTAuth::attempt($validator->validated())) {
                return responseFail('Unauthorized', 401);
            }
            return $this->createNewToken($token);

        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }
    }


    public function register(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|confirmed|min:6',
            ]);
            if ($validator->fails()) {
                return responseFail($validator->errors(), 400);
            }
            $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)],
                ['is_admin' => 0],
            ));

            return responseSuccess([new UserResource($user)], 'User successfully registered', 201);
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }


    }

    public function logout()
    {
        try {
            JWTAuth::invalidate();
            return responseSuccess([], 'Successfully logged out');
        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }

    }

    public function refresh()
    {
        try {
            return $this->createNewToken(auth('api')->refresh());

        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }
    }

    public function userProfile()
    {
        try {
            return responseSuccess(['user' => new UserResource(\auth()->user())], 'successfully Return Profile');

        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }

    }

    protected function createNewToken($token)
    {
        try{
            return responseSuccess(['user' => new UserResource(\auth()->user()), 'access_token' => $token, 'token_type' => 'bearer', 'expires_in' => auth('api')->factory()->getTTL() * 60], 'successfully');

        } catch (\Exception $e) {
            return responseFail('some thing error', 400, 'some thing error');

        }


    }
}
