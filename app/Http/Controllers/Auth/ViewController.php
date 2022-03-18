<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\GithubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function __construct(GithubService $github)
    {
        $this->github = $github;
    }

    public function portfolio()
    {
        $user = Auth::user();
        $getUser = $this->github->getUser($user);
        $userRepos = $this->github->getUserRepos($user);
        $languageColors = $this->github->getLanguageColors();

        return view('portfolio', compact(
            'user', 
            'getUser', 
            'userRepos',
            'languageColors'
        ));
    }
}
