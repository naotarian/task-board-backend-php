<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|regex:/^[a-zA-Z0-9]+$/',
            'last_name' => 'nullable|string|max:50',
            'first_name' => 'nullable|string|max:50',
        ]);

        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            // 'last_name' => $validated['last_name'] ?? null,
            // 'first_name' => $validated['first_name'] ?? null,
        ]);

        // メール送信（仮登録メール）
        $user->sendEmailVerificationNotification();

        return response()->json(['message' => '確認メールを送信しました。'], 201);
    }
}
