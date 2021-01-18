<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\Track;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $tracks = $request->user()->tracks()->get();
        return view('home', ['tracks' => $tracks]);
    }

    public function getPosition(Request $request, $id)
    {
        $genre = Track::find($id)->genre;
        $all = Track::withCount('users')->where('genre', $genre)->orderBy('users_count', 'desc')->get();
        $counter = 0;
        foreach ($all as $track)
        {
            $counter++;
            if ($track->id == $id)
            {
                $position=$counter;
            }
        } 
        $tracks = $request->user()->tracks()->withCount('users')->get();
        return response()->json(['tracks' => $tracks, 'position' => $position, 'id' => $id]);       
    }
}
