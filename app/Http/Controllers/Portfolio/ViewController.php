<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Services\GithubService;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function __construct(GithubService $github)
    {
        $this->github = $github;
    }

    public function index()
    {
        $user = auth()->user();
        $getUser = $this->github->getUser($user);
        $userRepos = $this->github->getUserRepos($user);
        $languageColors = $this->github->getLanguageColors();

        return view('portfolio', compact(
            'user', 
            'getUser', 
            'userRepos',
            'languageColors',
        ));
    }

    public function edit()
    {
        $user = auth()->user();
        $getUser = $this->github->getUser($user);
        $userRepos = $this->github->getUserRepos($user);
        $languageColors = $this->github->getLanguageColors();

        return view('edit', compact(
            'user', 
            'getUser', 
            'userRepos',
            'languageColors',
        ));
    }
}
