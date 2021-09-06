<?php

namespace App\Core\Traits;

use App\Models\Users\UserMazii;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

trait Authorization {

    use AuthenticatesUsers;

    /**
     * @return guard
     */
    public function guard(){
        return Auth::guard('admin');
    }

//    public function getUserMazii(){
//        $token = request()->header('Authorization');
//        return UserMazii::findToken($token);
//    }
}