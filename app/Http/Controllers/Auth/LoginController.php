<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Resources\Auth\UserResource;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        \Log::info('LoginController@login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);
        $request->validate([
            'username' => ['required',],
            'password' => ['required'],
        ]);
        $user = User::where('name', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => '認証失敗'], 401);
        }

        $token = $user->createToken('AccessToken')->plainTextToken;
        $user->load('organizationUsers');

        return response()->json([
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }

}
