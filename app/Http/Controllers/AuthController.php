<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'lname' => 'required|string',
            'fname' => 'required|string',
            'email' => 'required|email|unique:auths',
            'password' => 'required|string|confirmed'
        ]);

        $auth = new Auth([
            'lname' => $request->lname,
            'fname' => $request->fname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $auth->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
}
