<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only(['email', 'password']);
        $remember = false;
        if ($request->remember) {
            $remember = true;
        }
        if (Auth::attempt($data, $remember)) {
            return response()->json(['msg' => 'Login thành công'], 200);
        }
        return response()->json(['msg' => 'Login thất bại'], 400);
    }

    public function register(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $data['active'] = 1;
        if (User::create($data)) {
            return response()->json(['msg' => 'Đăng ký thành công'], 200);
        }
        return response()->json(['msg' => 'Đăng ký thất bại'], 400);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
