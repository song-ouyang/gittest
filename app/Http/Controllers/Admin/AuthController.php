<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function login(){

        $data = request(['user_name','user_pwd']);

        if($token = auth('api')->attempt($data)){

            return $this->respondWithToken($token);
        }

        return response()->json(['error'=>'Unauthorized'],401);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout(){

        $data = auth('api')->logout();

        return response()->json(['msg'=>'success','data'=>$data]);
    }
}
