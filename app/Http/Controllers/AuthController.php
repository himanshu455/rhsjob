<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api',['except' => ['login','register']]);
    }

    public function register(Request $request)
    {
    	$data = $request->validate([

    			'name' => 'required|min:5',
    			'email' => 'required|email|unique:users',
    			'password' => 'required|min:6'
    		]);
    	
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);

    	$user->save();

    	return response()->json(['message' => 'registered successfully']);

    }

    public function login()
    {
    	$credentials = request(['email','password']);

    	if (! $token = auth()->attempt($credentials) ) {
    		
    		return response()->json(['error' => 'Unauthorized'],401);
    	}

    	return $this->respondWithToken($token);
    }

    public function respondWithToken($token)
    {
    	return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
    	auth()->logout();
    	return response()->json(['message' => 'logged out successfully']);
    }

     public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function profile()
    {
    	return response()->json(auth()->user());
    }
}
