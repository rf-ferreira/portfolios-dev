<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider(string $provider) 
    {
        return Socialite::driver($provider)->redirect();
    }
     
    public function handleProviderCallback(string $provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::firstOrCreate(["email" => $providerUser->email],[
            "access_token" => $providerUser->token,
            "avatar" => $providerUser->avatar,
            "social" => "github.com/{$providerUser->user['login']}",
            "login" => $providerUser->user['login'],
            "bio" => $providerUser->user['bio'],
            "name" => $providerUser->name,
            "about" => "My name is {$providerUser->name}, I'm a software developer."
        ]);

        Auth::login($user, true);

        return redirect()->route('portfolio.index');
    }
}
