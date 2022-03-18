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
            "login" => $providerUser->user['login'],
            "access_token" => $providerUser->token,
            "name" => $providerUser->name
        ]);

        Auth::login($user, true);

        return redirect()->route('portfolio');
    }
}
