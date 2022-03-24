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
        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);

        return view('portfolio', compact(
            'user', 
            'userRepos',
            'styles'
        ));
    }

    public function download()
    {
        $user = auth()->user();
        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);

        return response()->view('download', compact(
            'user', 
            'userRepos',
            'styles'
        ))->header("Content-Disposition", " attachment; filename=portfolio.html");
    }

    public function css()
    {
        header("Content-Disposition: attachment; filename=styles.css");
        readfile(public_path('css/styles.css'));
    }

    public function edit()
    {
        $user = auth()->user();
        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);

        return view('edit', compact(
            'user', 
            'userRepos',
            'styles'
        ));
    }

    public function preview($userLogin)
    {
        if($userLogin !== auth()->user()->login) {
            return redirect()->route('portfolio.index');
        }

        $user = auth()->user();
        $userRepos = $this->github->getUserRepos($user);
        $styles = json_decode($user->styles);
        $preview = true;

        return view('download', compact(
            'user', 
            'userRepos',
            'styles',
            'preview'
        ));
    }
}
