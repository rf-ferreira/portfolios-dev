<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function portfolio()
    {
        $user = Auth::user();

        return view('portfolio', compact(
            'user'
        ));
    }
}
