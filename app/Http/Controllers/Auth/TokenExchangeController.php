<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Auth\UserResource;

class TokenExchangeController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        // 旧トークンを削除（1回使い捨てのつもりで）
        $request->user()->currentAccessToken()?->delete();

        // 新しいトークン発行
        $newToken = $user->createToken('AccessToken')->plainTextToken;


        $user->load('organizationUsers');

        // 応答にユーザー情報も付けて返す（Resource化してもOK）
        return response()->json([
            'token' => $newToken,
            'user' => new UserResource($user),
        ]);
    }
}
