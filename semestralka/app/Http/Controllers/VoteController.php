<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;


class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tracks = Track::withCount('users')->get();
        // return view('results.voting', ['tracks' => $tracks,]);
        $tracks = Track::withCount('users')->get();
        return view('results.voting', [
            'action' => route('vote.store'),
            'method' => 'post',
            'tracks' => $tracks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        //dd($request->input('id'));
        $track =  Track::findOrFail($id);
        $genre = $track->genre;

        //existuje song

        //
        //if ($request->user()->tracks()->
        if ($request->user()->tracks()->where('tracks.id', $id)->exists()) {
            // $tracks = Track::withCount('users')->get();
            return view('pages.error', [
                'notify' => '1'
            ]);
            // abort(400,"Bad request");
        }

        if ($request->user()->tracks()->count() >= 3) {
            // $tracks = Track::withCount('users')->get();
            return view('pages.error', [
                'notify' => '2'
            ]);
            //abort(400,"Bad requestik");
        }

        $request->user()->tracks()->attach($id);
        $tracks = Track::withCount('users')->orderBy('users_count', 'desc')->where('genre','=', $genre)->get();

        return view('results.reslayout', ['tracks' => $tracks, 'genre' => $genre]);  


        // $track = Track::create($request->all());
        // $track->save();
        // return redirect()->route('track.notify');   
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($genre)
    {
        $tracks = Track::withCount('users')->get();
        return view('results.voting', [
            'action' => route('vote.store'),
            'method' => 'post',
            'tracks' => $tracks,
            'genre' => $genre,
            'notify' => '0'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if ($request->user()->tracks()->where('tracks.id', $id)->exists()) {
            $request->user()->tracks()->detach($id);
            $tracks = $request->user()->tracks;
            return view('home', ['tracks' => $tracks]);
    
        } else 
        {
             return view('pages.error', [
                 'notify' => '3'
             ]);
        }

    }
}