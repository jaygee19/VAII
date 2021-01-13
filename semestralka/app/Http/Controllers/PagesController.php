<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(Request $request) {
        if (Auth::user() != null){
            $canVote = $request->user()->tracks()->count() < 3;
            return view('pages.homepage', ['canvote' => $canVote]);
        }
        return view('pages.homepage', ['canvote' => true]);
    }
}



