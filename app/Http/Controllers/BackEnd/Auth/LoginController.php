<?php

namespace App\Http\Controllers\BackEnd\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;

class LoginController extends Controller
{
    // View login
    public function index(){
        return view('backend.auth.login');
    }

    // Login
    public function login(LoginRequest $request)
    {
        $params = $request->only('email', 'password');
        if (Auth::attempt($params, true)) {
            return redirect()->route('backend.dashboard');
        }
        return redirect()->back()->withErrors(['msg' => 'Sai tài khoản hoặc mật khẩu']);
    }
}
