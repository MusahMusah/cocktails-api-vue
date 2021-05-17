<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth:api'])->except('login');
    // }

    public function login (Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
            'email' => 'required|email',
        ]);
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['success' => false, 'message' => 'Invalid Credentials'], 401);
        }
        return response()->json(['success' => true, 'token' =>$token], 200);
    }

    public function checkToken ()
    {
        return response()->json(['success' => true], 200);
    }

    public function logout ()
    {
        $logout = Auth::logout();
        return response()->json(['success' => true], 200);
    }
}
