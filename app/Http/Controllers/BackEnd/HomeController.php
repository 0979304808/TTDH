<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // View dashboard
    public function index()
    {
        return view('backend.dashboard.index');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('backend.login');
    }
}
