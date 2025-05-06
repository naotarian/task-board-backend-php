<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken('AccessToken')->delete();
        return response()->json(['message' => 'ログアウトしました。'], 200);
    }
}
