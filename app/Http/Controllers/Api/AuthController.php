<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function request(Request $request){
        $request->validated([
            'name' => 'string|required|min:6',
            'username' => 'string|required|min:8|unique:users',
            'password' => 'string|required|confirmed',
            'email' => 'string|required|unique:users'
        ]);
        $user = new User([
            'name' => request->name,
            'username' => request->username,
            'password' => Hash::make($request->password),
            'email' => request->email
        ]);
        $user->save();
        return response()->json([
            'success'=>true,
            'message'=>'Successful user created'
        ],201);
    }
}
