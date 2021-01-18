<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(Request $request) {
        if (Auth::user() != null){
            $canVoteT = $request->user()->tracks()->where('genre', 'Trance')->count() < 3;
            $canVotePr = $request->user()->tracks()->where('genre', 'Progressive')->count() < 3;
            $canVoteD = $request->user()->tracks()->where('genre', 'DnB')->count() < 3;
            $canVoteB = $request->user()->tracks()->where('genre', 'BigRoom')->count() < 3;
            $canVoteH = $request->user()->tracks()->where('genre', 'Hardstyle')->count() < 3;
            $canVotePs = $request->user()->tracks()->where('genre', 'PsyTrance')->count() < 3;
            return view('pages.homepage', [
                'canvoteT' => $canVoteT,
                'canvotePr' => $canVotePr,
                'canvoteD' => $canVoteD,
                'canvoteB' => $canVoteB,
                'canvoteH' => $canVoteH,
                'canvotePs' => $canVotePs
                ]);
        }
        return view('pages.homepage', [
            'canvoteT' => true, 
            'canvotePr' => true, 
            'canvoteD' => true, 
            'canvoteB' => true, 
            'canvoteH' => true, 
            'canvotePs' => true, 
            ]);
    }
}



