<?php

namespace App\Services;

class GithubService
{
    public function getUserRepos($user)
    {
        $reposUrl = 'https://api.github.com/users/' .$user->login. '/repos';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $reposUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders($user));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        return $response;
    }

    public function getUser($user)
    {
        $userUrl = 'https://api.github.com/users/' .$user->login;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders($user));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        return $response;
    }

    public function getLanguageColors()
    {
        $url = "https://raw.githubusercontent.com/ozh/github-colors/master/colors.json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);

        return $response;
    }

    private function getHeaders($user): array
    {
        return [
            "User-agent: Portfolio Generator",
            "Accept: application/vnd.github.v3+json",
            "Authorization: token {$user->access_token}"
        ];
    }
}