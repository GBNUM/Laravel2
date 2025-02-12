<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthCOntroller extends Controller
{
    public function register(RegisterRequest $request){
            $data = $request->validated();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
            
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user' => $user, 
                'token' => $token
            ]);

    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        if(!Auth::attempt($data)){
            return response([
                'message' => 'Username or password is wrong'
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user, 
            'token' => $token
        ]);
    }
}
