<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);

        return view('portfolio', compact(
            'user', 
            'userRepos',
            'styles'
        ));
    }

    public function preview($user)
    {
        $user = User::where('login', trim($user))->first();

        if(!$user) {
            return redirect('/')->withErrors(["userNotFound" => "User not found."]);
        }

        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);
        $preview = true;

        return view('preview', compact(
            'user', 
            'userRepos',
            'styles',
            'preview'
        ));
    }
    
    public function edit()
    {
        $user = auth()->user();
        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);
        $maxRepos = count($userRepos) > 8 ? true : false;

        return view('edit', compact(
            'user', 
            'userRepos',
            'styles',
            'maxRepos'
        ));
    }
}
