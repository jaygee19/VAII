<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
            //$tracks = Track::with('album')->get();
            //$tracks = Album::all();
            //dd($tracks->toArray());
            $tracks = DB::table('tracks')->paginate(15);
            return view('track.allTracks', ['tracks' => $tracks]);
        }
        else 
        {
            abort(403, 'Unauthorized access');        
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        return view('track.create', [
            'action' => route('track.store'),
            'method' => 'post'
        ]);
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {

        $request->validate([
            'artist' => 'required',
            'name' => 'required|min:3|max:30',
            'genre' => 'required'
        ]);

        $track = Track::create($request->all());
        $track->save();
        return redirect()->route('track.notify');   
        
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        } 
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

        $tracks = Track::withCount('users')->orderBy('users_count', 'desc')->where('genre','=', $genre)->get();
        //$tracks = DB::select('select * from tracks where genre = :genre order by votes desc', ['genre' => $genre]);
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
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        return view('track.edit', [
            'action' => route('track.update', $track->id),
            'method' => 'put',
            'model' => $track
        ]);
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        }
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
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        $request->validate([
            'artist' => 'required',
            'name' => 'required|min:3',
            'genre' => 'required'
        ]);

        $track->update($request->all());
        return redirect()->route('track.notify');   
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        $track->delete();
        return redirect()->route('track.notify');  
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        }  
    }

    public function notify(){
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        $tracks = DB::table('tracks')->paginate(15);
        return view('track.notify', ['tracks' => $tracks] );
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        }
    }
}
