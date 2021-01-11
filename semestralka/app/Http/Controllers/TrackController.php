<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tracks = DB::select('select * from tracks', [1]);
        //$tracks = DB::select('select * from tracks where artist = :artist', ['artist' => 'Bran']);
        $tracks = Track::all();
        return view('track.allTracks', ['tracks' => $tracks]);

        // if ($param == '1')
        // {
        //     $param = '1';
        //     return view('track.allTracks', ['tracks' => $tracks, 'param' => $param]);
        // }
        // else {
        //     $param = '0';
        //     return view('track.allTracks', ['tracks' => $tracks, 'param' => $param]);
        // }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('track.create', [
            'action' => route('track.store'),
            'method' => 'post'
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
        $request->validate([
            'artist' => 'required',
            'name' => 'required|min:6',
            'genre' => 'required'
        ]);

        $track = Track::create($request->all());
        $track->save();
        return redirect()->route('track.notify');    
    }

    /**
     * Display the specified resource.
     *
     * @param  string $genre
     * @return \Illuminate\Http\Response
     */
    public function show($genre)
    {
        // $tr = new Track();  
        // $tr->artist = 'Aahd';
        // $tr->save();             insert
        // $tr = Track::find(PK);   update
        //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
        //$tr = DB::update('update users set votes = 100 where name = ?', ['John']);
        // Track::delete(PK);

        $tracks = DB::select('select * from tracks where genre = :genre order by votes desc', ['genre' => $genre]);
        return view('results.reslayout', ['tracks' => $tracks, 'genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('track.edit', [
            'action' => route('track.update', $track->id),
            'method' => 'put',
            'model' => $track
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'artist' => 'required',
            'name' => 'required|min:6',
            'genre' => 'required'
        ]);

        $track->update($request->all());
        return redirect()->route('track.notify');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('track.notify');    
    }

    public function notify(){
        $tracks = Track::all();
        return view('track.notify', ['tracks' => $tracks] );
    }
}
