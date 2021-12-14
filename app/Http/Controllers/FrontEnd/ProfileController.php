<?php

namespace App\Http\Controllers\FrontEnd;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $view = view('frontend.profile.index');
        $view->with('user',$user);
        return $view;
    }
}
