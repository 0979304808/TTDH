<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function handler($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $provider = $provider . '_id';
            $finduser = User::where($provider, $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home');
            } else {
                $checkEmail = isset($user->email) ? User::whereEmail($user->email)->first() : null;
                if ($checkEmail) {
                    $User = $checkEmail->update([
                        'name' => $checkEmail->name ?? ($user->name ?? null),
                        'avatar' => $checkEmail->avatar ?? ($user->avatar ?? null),
                        $provider => $user->id,
                    ]);
                    if ($User) {
                        Auth::login($checkEmail);
                        return redirect()->route('home');
                    }
                } else {
                    $User = User::create([
                        'name' => $user->name,
                        'email' => $user->email ?? null,
                        'avatar' => $user->avatar ?? null,
                        $provider => $user->id,
                    ]);
                    if ($User) {
                        Auth::login($User);
                        return redirect()->route('home');
                    }
                }
                return redirect()->route('login');
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
