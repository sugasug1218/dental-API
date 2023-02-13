<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!auth()->attempt($credentials)) {
            return response()->error(['error' => 'ログインに失敗しました。']);
        }

        // アクセストークン
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response()->success(['access_token' => $accessToken]);
    }
}
