<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Repository;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function update(Request $request)
    {
        $this->updateUser($request);
        $this->updateRepos($request);

        return redirect()->route('portfolio.index');
    }

    private function updateUser($request)
    {
        return User::where('id', auth()->user()->id)
        ->update([
            "avatar" => $request->input("user-pic"),
            "name" => $request->input("user-name"),
            "bio" => $request->input("user-desc"),
            "social" => $request->input("user-social"),
            "about" => $request->input("about-me-desc")
        ]);
    }

    private function updateRepos($request)
    {
        $projectIds = $request->input('project-ids');
        $projectUrls = $request->input('project-urls');
        $projectNames = $request->input('project-names');
        $projectDescriptions = $request->input('project-descs');
        $projectLanguages = $request->input('project-langs');
        
        for($i = 0; $i < count($projectNames); $i++) {
            Repository::updateOrCreate(['id' => $projectIds[$i], 'user_id' => auth()->user()->id],[
                "user_id" => auth()->user()->id,
                "html_url" => $projectUrls[$i],
                "name" => $projectNames[$i],
                "description" => $projectDescriptions[$i],
                "language" => $projectLanguages[$i]
            ]);
        }

        return true;
    }
}
