<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                "message" => "Credentials are not corrects"
            ], 401);
        }

        return
            response()->json([
                "message" => "Credentials are corrects, user founded",
                "user_id" => Auth::user()->id
            ], 200);
    }
}
