<?php

namespace App\Http\Controllers\BackEnd\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Repositories\Users\Contract\UserRepositoryInterface;

class RegisterController extends Controller
{
    private $user; 
    public function __construct(UserRepositoryInterface $user){
        $this->user = $user;
    }
    // View register
    public function index(){
        return view('backend.auth.register');
    }

    // Register 
    public function register(RegisterRequest $request)
    {
        $params = $request->only('name', 'email', 'password');
            if ($params['password'] === $request->get('password_confirmation')) {
                $this->user->create($params);
            };
            return redirect()->back()->with('msg', 'dang ky thanh cong');
    }
}
